<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page or setup page.
     */
    public function redirectToGoogle()
    {
        $clientId = config('services.google.client_id');
        $clientSecret = config('services.google.client_secret');

        // Check if credentials are missing
        if (empty($clientId) || empty($clientSecret)) {
            return view('auth.google-setup');
        }

        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            // Fallback to setup view if Socialite redirect crashes due to bad configuration
            return view('auth.google-setup', ['error' => 'Gagal menginisialisasi Socialite: ' . $e->getMessage()]);
        }
    }

    /**
     * Handle the callback from Google.
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'auth_error' => 'Gagal masuk menggunakan Google: ' . $e->getMessage()
            ]);
        }

        // Find user by google_id or by email address
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if ($user) {
            // Link google_id if matched by email only, or update tokens
            $user->update([
                'google_id' => $googleUser->getId(),
                'google_token' => $googleUser->token,
            ]);
        } else {
            // Auto register a new account under this Google account details
            $user = User::create([
                'nama' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'google_token' => $googleUser->token,
                'kata_sandi' => Hash::make(Str::random(16)), // Secure randomized password
            ]);
        }

        // Login user into Laravel session
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Autentikasi via Google berhasil! Selamat datang ' . $user->nama . '.');
    }

    /**
     * Show the Material Design Google accounts chooser simulation.
     */
    public function showSimulationPage()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.google-simulate');
    }

    /**
     * Handle simulated demo callback to log in/register users.
     */
    public function handleDemoCallback(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
            'google_id' => 'required|string|max:255',
        ]);

        $user = User::where('google_id', $validated['google_id'])
            ->orWhere('email', $validated['email'])
            ->first();

        if ($user) {
            if (empty($user->google_id)) {
                $user->update([
                    'google_id' => $validated['google_id'],
                ]);
            }
        } else {
            $user = User::create([
                'nama' => $validated['name'],
                'email' => $validated['email'],
                'google_id' => $validated['google_id'],
                'kata_sandi' => Hash::make(Str::random(16)),
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Autentikasi via Google (Mode Demo) berhasil! Selamat datang ' . $user->nama . '.');
    }

    /**
     * Save Google Client ID & Secret to .env and clear configuration cache.
     */
    public function saveCredentials(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|string|max:500',
            'client_secret' => 'required|string|max:500',
        ]);

        $clientId = trim($validated['client_id']);
        $clientSecret = trim($validated['client_secret']);

        try {
            $this->updateEnvFile('GOOGLE_CLIENT_ID', $clientId);
            $this->updateEnvFile('GOOGLE_CLIENT_SECRET', $clientSecret);

            if (!app()->environment('testing')) {
                // Dynamically clear Laravel configuration cache
                Artisan::call('config:clear');
                Artisan::call('cache:clear');
                Artisan::call('view:clear');
            }

            return redirect()->route('auth.google')->with('success', 'Kredensial Google berhasil disimpan ke .env dan konfigurasi telah dimuat ulang! Mencoba mengalihkan...');
        } catch (\Exception $e) {
            return back()->withErrors(['setup_error' => 'Gagal menulis kredensial ke .env: ' . $e->getMessage()]);
        }
    }

    /**
     * Write or replace dynamic keys in .env.
     */
    protected function updateEnvFile($key, $value)
    {
        if (app()->environment('testing')) {
            return; // Bypass writing to real .env during automated tests
        }

        $path = base_path('.env');
        if (!file_exists($path)) {
            throw new \Exception('Berkas .env tidak ditemukan.');
        }

        $content = file_get_contents($path);

        if (str_contains($content, "{$key}=")) {
            // Replace key line
            $content = preg_replace("/{$key}=.*/", "{$key}=\"{$value}\"", $content);
        } else {
            // Append key line
            $content .= "\n{$key}=\"{$value}\"";
        }

        file_put_contents($path, $content);
    }
}
