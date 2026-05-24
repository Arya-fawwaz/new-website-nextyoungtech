<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the profile management view.
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Update the user's personal details (nama, email).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna,email,' . $user->id,
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email ini sudah terdaftar oleh pengguna lain.',
        ]);

        $user->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
        ]);

        return redirect()->back()->with('success', 'Detail profil Anda berhasil diperbarui.');
    }

    /**
     * Upload and update the user's avatar.
     */
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'foto_profil.required' => 'File foto profil wajib dipilih.',
            'foto_profil.image' => 'File harus berupa gambar.',
            'foto_profil.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'foto_profil.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        $user = Auth::user();

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            
            try {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('uploads/avatars');
                
                // Ensure destination directory exists
                if (!file_exists($destinationPath)) {
                    @mkdir($destinationPath, 0755, true);
                }

                // Move the file
                $file->move($destinationPath, $filename);

                // Delete old avatar file if it exists and is a local file
                if ($user->foto_profil && !str_starts_with($user->foto_profil, 'data:image') && file_exists(public_path($user->foto_profil))) {
                    @unlink(public_path($user->foto_profil));
                }

                // Save new path
                $user->update([
                    'foto_profil' => 'uploads/avatars/' . $filename
                ]);
            } catch (\Exception $e) {
                // Read-only serverless filesystem fallback (e.g. Vercel)
                // Convert image directly to Base64 data URI
                $imageData = file_get_contents($file->getRealPath());
                $mimeType = $file->getMimeType();
                $base64 = 'data:' . $mimeType . ';base64,' . base64_encode($imageData);

                $user->update([
                    'foto_profil' => $base64
                ]);
            }
        }

        return redirect()->back()->with('success', 'Foto profil Anda berhasil diperbarui.');
    }

    /**
     * Update the user's password securely.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($validated['current_password'], $user->kata_sandi)) {
            return redirect()->back()->withErrors([
                'current_password' => 'Password saat ini yang Anda masukkan salah.'
            ]);
        }

        // Update the password
        $user->update([
            'kata_sandi' => Hash::make($validated['password'])
        ]);

        return redirect()->back()->with('success', 'Password Anda berhasil diperbarui secara aman.');
    }

    /**
     * Store or update the user's review.
     */
    public function storeReview(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'bintang' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ], [
            'bintang.required' => 'Rating bintang wajib dipilih.',
            'bintang.integer' => 'Format rating tidak valid.',
            'bintang.min' => 'Rating minimal adalah 1 bintang.',
            'bintang.max' => 'Rating maksimal adalah 5 bintang.',
            'komentar.required' => 'Isi komentar ulasan wajib diisi.',
            'komentar.max' => 'Komentar tidak boleh lebih dari 1000 karakter.',
        ]);

        \App\Models\Ulasan::updateOrCreate(
            ['pengguna_id' => $user->id],
            [
                'nama' => $user->nama,
                'foto_profil' => $user->foto_profil,
                'bintang' => $validated['bintang'],
                'komentar' => $validated['komentar'],
            ]
        );

        return redirect()->back()->with('success', 'Ulasan Anda berhasil disimpan dan ditampilkan di halaman utama!');
    }

    /**
     * Show the dedicated form to write/update a review.
     */
    public function showReviewForm()
    {
        return view('review');
    }
}
