<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin can login with valid email credentials.
     */
    public function test_admin_can_login_with_valid_email_credentials(): void
    {
        $admin = User::create([
            'nama' => 'Admin Test',
            'email' => 'admin@test.com',
            'kata_sandi' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        $response = $this->post(route('admin.login.post'), [
            'username' => 'admin@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertTrue(session('admin_logged_in'));
    }

    /**
     * Test admin can login with valid name credentials.
     */
    public function test_admin_can_login_with_valid_name_credentials(): void
    {
        $admin = User::create([
            'nama' => 'AdminTest',
            'email' => 'admin@test.com',
            'kata_sandi' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        $response = $this->post(route('admin.login.post'), [
            'username' => 'AdminTest',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertTrue(session('admin_logged_in'));
    }

    /**
     * Test non-admin user cannot login to admin panel.
     */
    public function test_non_admin_cannot_login_to_admin_portal(): void
    {
        $user = User::create([
            'nama' => 'User Biasa',
            'email' => 'user@test.com',
            'kata_sandi' => Hash::make('password123'),
            'is_admin' => false,
        ]);

        $response = $this->post(route('admin.login.post'), [
            'username' => 'user@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect();
        $this->assertNull(session('admin_logged_in'));
    }

    /**
     * Test admin cannot login with incorrect password.
     */
    public function test_admin_cannot_login_with_invalid_password(): void
    {
        $admin = User::create([
            'nama' => 'Admin Test',
            'email' => 'admin@test.com',
            'kata_sandi' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        $response = $this->post(route('admin.login.post'), [
            'username' => 'admin@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $this->assertNull(session('admin_logged_in'));
    }
}
