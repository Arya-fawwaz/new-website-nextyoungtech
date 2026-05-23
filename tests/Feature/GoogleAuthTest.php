<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery;
use Tests\TestCase;

class GoogleAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * Test google redirect route goes to setup page if env is empty.
     */
    public function test_google_redirect_goes_to_setup_if_credentials_are_empty(): void
    {
        config([
            'services.google.client_id' => '',
            'services.google.client_secret' => '',
        ]);

        $response = $this->get(route('auth.google'));

        $response->assertStatus(200);
        $response->assertSee('Penataan Kredensial Google');
        $response->assertSee('Coba Dengan Mode Demonstrasi');
    }

    /**
     * Test google redirect route redirects to Google OAuth page if credentials exist.
     */
    public function test_google_redirect_redirects_to_google_if_credentials_exist(): void
    {
        config([
            'services.google.client_id' => 'real_client_id_123',
            'services.google.client_secret' => 'real_client_secret_456',
        ]);

        $redirectResponse = redirect('https://accounts.google.com/o/oauth2/v2/auth');
        
        Socialite::shouldReceive('driver')
            ->once()
            ->with('google')
            ->andReturn(Mockery::mock([
                'redirect' => $redirectResponse
            ]));

        $response = $this->get(route('auth.google'));

        $response->assertRedirect('https://accounts.google.com/o/oauth2/v2/auth');
    }

    /**
     * Test google callback registers new google user and logs them in.
     */
    public function test_google_callback_registers_new_google_user_and_logs_them_in(): void
    {
        $googleUser = Mockery::mock(SocialiteUser::class);
        $googleUser->shouldReceive('getId')->andReturn('google_test_12345');
        $googleUser->shouldReceive('getEmail')->andReturn('tester.google@example.com');
        $googleUser->shouldReceive('getName')->andReturn('Google Tester');
        $googleUser->token = 'mock_google_token_abc';

        Socialite::shouldReceive('driver')
            ->once()
            ->with('google')
            ->andReturn(Mockery::mock([
                'user' => $googleUser
            ]));

        // Assert the user doesn't exist yet
        $this->assertDatabaseMissing('pengguna', [
            'email' => 'tester.google@example.com',
        ]);

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');

        // Assert the user is now authenticated
        $this->assertAuthenticated();

        // Assert user exists in database with google_id
        $this->assertDatabaseHas('pengguna', [
            'nama' => 'Google Tester',
            'email' => 'tester.google@example.com',
            'google_id' => 'google_test_12345',
            'google_token' => 'mock_google_token_abc',
        ]);
    }

    /**
     * Test google callback logs in existing google user.
     */
    public function test_google_callback_logs_in_existing_google_user(): void
    {
        // Pre-create the user
        $user = User::create([
            'nama' => 'Existing Google User',
            'email' => 'existing.google@example.com',
            'google_id' => 'google_existing_123',
            'google_token' => 'old_token',
            'kata_sandi' => Hash::make('password123'),
        ]);

        $googleUser = Mockery::mock(SocialiteUser::class);
        $googleUser->shouldReceive('getId')->andReturn('google_existing_123');
        $googleUser->shouldReceive('getEmail')->andReturn('existing.google@example.com');
        $googleUser->token = 'new_mock_token_xyz';

        Socialite::shouldReceive('driver')
            ->once()
            ->with('google')
            ->andReturn(Mockery::mock([
                'user' => $googleUser
            ]));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);

        // Check token got updated
        $user->refresh();
        $this->assertEquals('new_mock_token_xyz', $user->google_token);

        // Check count remains 1
        $this->assertEquals(1, User::where('email', 'existing.google@example.com')->count());
    }

    /**
     * Test google callback links existing email without google_id.
     */
    public function test_google_callback_links_existing_email_without_google_id(): void
    {
        // Pre-create user without google_id
        $user = User::create([
            'nama' => 'Regular User',
            'email' => 'regular@example.com',
            'kata_sandi' => Hash::make('password123'),
        ]);

        $this->assertNull($user->google_id);

        $googleUser = Mockery::mock(SocialiteUser::class);
        $googleUser->shouldReceive('getId')->andReturn('google_linked_789');
        $googleUser->shouldReceive('getEmail')->andReturn('regular@example.com');
        $googleUser->token = 'linked_token';

        Socialite::shouldReceive('driver')
            ->once()
            ->with('google')
            ->andReturn(Mockery::mock([
                'user' => $googleUser
            ]));

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);

        // Refresh and check google_id
        $user->refresh();
        $this->assertEquals('google_linked_789', $user->google_id);
        $this->assertEquals('linked_token', $user->google_token);
    }

    /**
     * Test google callback handles socialite exceptions correctly.
     */
    public function test_google_callback_handles_socialite_exceptions_correctly(): void
    {
        $provider = Mockery::mock();
        $provider->shouldReceive('user')
            ->once()
            ->andThrow(new \Exception('Invalid OAuth State'));

        Socialite::shouldReceive('driver')
            ->once()
            ->with('google')
            ->andReturn($provider);

        $response = $this->get(route('auth.google.callback'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('auth_error');
        $this->assertGuest();
    }

    /**
     * Test simulation/chooser page renders correctly.
     */
    public function test_google_simulation_page_renders_correctly(): void
    {
        $response = $this->get(route('auth.google.simulate'));

        $response->assertStatus(200);
        $response->assertSee('Pilih akun');
        $response->assertSee('Gunakan akun lain');
        $response->assertSee('Mode Demo');
    }

    /**
     * Test demo callback registers a demo user and logs them in.
     */
    public function test_demo_callback_registers_new_demo_user(): void
    {
        $this->assertDatabaseMissing('pengguna', [
            'email' => 'demo.user@example.com',
        ]);

        $response = $this->post(route('auth.google.callback-demo'), [
            'name' => 'Demo User',
            'email' => 'demo.user@example.com',
            'google_id' => 'google_demo_123',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');

        $this->assertAuthenticated();
        $this->assertDatabaseHas('pengguna', [
            'nama' => 'Demo User',
            'email' => 'demo.user@example.com',
            'google_id' => 'google_demo_123',
        ]);
    }

    /**
     * Test save credentials handles submissions successfully.
     */
    public function test_save_credentials_handles_submissions_successfully(): void
    {
        $response = $this->post(route('auth.google.save-credentials'), [
            'client_id' => 'dummy_client_id',
            'client_secret' => 'dummy_client_secret',
        ]);

        $response->assertRedirect(route('auth.google'));
        $response->assertSessionHas('success');
    }
}
