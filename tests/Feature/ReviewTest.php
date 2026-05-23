<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Ulasan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guest users are redirected when trying to submit a review.
     */
    public function test_guest_user_cannot_submit_review(): void
    {
        $response = $this->post(route('profile.review'), [
            'bintang' => 5,
            'komentar' => 'Desain website sangat interaktif!',
        ]);

        $response->assertRedirect(route('login'));
    }

    /**
     * Test authenticated users can submit and update their reviews.
     */
    public function test_authenticated_user_can_submit_and_update_review(): void
    {
        // 1. Authenticate user
        $user = User::factory()->create([
            'nama' => 'Test Client',
            'foto_profil' => 'uploads/avatars/test.png',
        ]);
        $this->actingAs($user);

        // 2. Post a review
        $response = $this->post(route('profile.review'), [
            'bintang' => 5,
            'komentar' => 'Next Young Tech luar biasa, sangat berkinerja tinggi.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        // Assert review stored in DB
        $this->assertDatabaseHas('ulasan', [
            'pengguna_id' => $user->id,
            'nama' => 'Test Client',
            'foto_profil' => 'uploads/avatars/test.png',
            'bintang' => 5,
            'komentar' => 'Next Young Tech luar biasa, sangat berkinerja tinggi.',
        ]);

        // 3. Update the review
        $response = $this->post(route('profile.review'), [
            'bintang' => 4,
            'komentar' => 'Pembaruan ulasan: Kinerjanya luar biasa!',
        ]);

        $response->assertStatus(302);
        
        // Assert updated in DB (there should be only 1 review for this user)
        $this->assertEquals(1, Ulasan::count());
        $this->assertDatabaseHas('ulasan', [
            'pengguna_id' => $user->id,
            'bintang' => 4,
            'komentar' => 'Pembaruan ulasan: Kinerjanya luar biasa!',
        ]);
    }

    /**
     * Test review validation constraints.
     */
    public function test_review_validation_rules(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Post invalid star rating
        $response = $this->post(route('profile.review'), [
            'bintang' => 6, // maximum 5
            'komentar' => 'Tes ulasan',
        ]);
        $response->assertSessionHasErrors(['bintang']);

        // Post empty comment
        $response = $this->post(route('profile.review'), [
            'bintang' => 5,
            'komentar' => '',
        ]);
        $response->assertSessionHasErrors(['komentar']);
    }

    /**
     * Test reviews are loaded and displayed on the homepage.
     */
    public function test_reviews_displayed_on_homepage(): void
    {
        // Seed a review
        Ulasan::create([
            'nama' => 'Budi Santoso',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Sangat mengagumkan, Three.js berjalan mulus!',
        ]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Sangat mengagumkan, Three.js berjalan mulus!');
        $response->assertSee('Budi Santoso');
    }

    /**
     * Test guest cannot access dedicated review page.
     */
    public function test_guest_cannot_access_review_page(): void
    {
        $response = $this->get(route('review.create'));
        $response->assertRedirect(route('login'));
    }

    /**
     * Test authenticated user can access dedicated review page.
     */
    public function test_authenticated_user_can_access_review_page(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('review.create'));
        $response->assertStatus(200);
        $response->assertSee('Bagikan Pengalaman Anda');
    }
}
