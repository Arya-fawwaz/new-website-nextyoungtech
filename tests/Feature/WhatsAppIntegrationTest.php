<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Inquiry;
use App\Models\QuotationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WhatsAppIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test contact form validation and successful submission with WhatsApp redirect.
     */
    public function test_contact_form_submission_stores_data_and_redirects_to_whatsapp(): void
    {
        // 1. Simulate authentication so the user can see the contact form
        $user = User::factory()->create();
        $this->actingAs($user);

        // 2. Post invalid data
        $response = $this->post(route('contact.store'), []);
        $response->assertSessionHasErrors(['name', 'email', 'telepon', 'subject', 'message']);

        // 3. Post valid data
        $formData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'telepon' => '081234567890',
            'subject' => 'Konsultasi E-commerce',
            'message' => 'Saya ingin membuat toko online baju dengan desain interaktif.',
        ];

        $response = $this->post(route('contact.store'), $formData);

        // Assert redirect back
        $response->assertStatus(302);
        
        // Assert stored in DB
        $this->assertDatabaseHas('pertanyaan', [
            'nama' => 'John Doe',
            'email' => 'johndoe@example.com',
            'telepon' => '081234567890',
            'subjek' => 'Konsultasi E-commerce',
            'pesan' => 'Saya ingin membuat toko online baju dengan desain interaktif.',
        ]);

        // Assert success message and WhatsApp redirect session exist
        $response->assertSessionHas('success');
        $response->assertSessionHas('whatsapp_redirect');

        $whatsappUrl = session('whatsapp_redirect');
        $this->assertStringContainsString('https://wa.me/628881023038', $whatsappUrl);
        $this->assertStringContainsString(urlencode('John Doe'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('081234567890'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('Konsultasi E-commerce'), $whatsappUrl);
    }

    /**
     * Test quotation calculator redirects guest users to login page.
     */
    public function test_quotation_estimation_requires_authentication(): void
    {
        $response = $this->get(route('quotation.index'));
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors(['auth_error']);
    }

    /**
     * Test quotation form submission validation and successful submission with WhatsApp redirect.
     */
    public function test_quotation_form_submission_stores_data_and_redirects_to_whatsapp(): void
    {
        // 1. Authenticate user
        $user = User::factory()->create();
        $this->actingAs($user);

        // 2. Post invalid data
        $response = $this->post(route('quotation.store'), []);
        $response->assertSessionHasErrors(['client_name', 'client_email', 'client_phone', 'project_type', 'features', 'estimated_price', 'project_name', 'color_theme', 'target_audience', 'project_description']);

        // 3. Post valid data
        $formData = [
            'client_name' => 'Jane Smith',
            'client_email' => 'janesmith@example.com',
            'client_phone' => '081234567890',
            'project_type' => 'web_design_interactive',
            'features' => ['multilingual', 'seo_opt'],
            'estimated_price' => 950000,
            'pages' => 5,
            'notes' => 'Tolong buatkan website berkecepatan tinggi.',
            'project_name' => 'Next Young Tech Shop',
            'color_theme' => 'Dark Purple & Silver',
            'target_audience' => 'Generasi Muda & Pebisnis Retail',
            'project_description' => 'Website e-commerce canggih dengan dynamic checkout, AI search, dan fast loading page.',
        ];

        $response = $this->post(route('quotation.store'), $formData);

        // Assert redirect back
        $response->assertStatus(302);

        // Assert stored in DB (checking serialized array features)
        $request = QuotationRequest::first();
        $this->assertNotNull($request);
        $this->assertEquals('Jane Smith', $request->nama_klien);
        $this->assertEquals('janesmith@example.com', $request->email_klien);
        $this->assertEquals('081234567890', $request->telepon_klien);
        $this->assertEquals('web_design_interactive', $request->tipe_proyek);
        $this->assertEquals(['multilingual', 'seo_opt'], $request->fitur);
        $this->assertEquals(950000, $request->estimasi_harga);
        $this->assertEquals('Tolong buatkan website berkecepatan tinggi.', $request->catatan);
        $this->assertEquals('Next Young Tech Shop', $request->nama_proyek);
        $this->assertEquals('Dark Purple & Silver', $request->warna_utama);
        $this->assertEquals('Generasi Muda & Pebisnis Retail', $request->target_pengguna);
        $this->assertEquals('Website e-commerce canggih dengan dynamic checkout, AI search, dan fast loading page.', $request->deskripsi_proyek);

        // Assert success message and WhatsApp redirect session exist
        $response->assertSessionHas('success');
        $response->assertSessionHas('whatsapp_redirect');

        $whatsappUrl = session('whatsapp_redirect');
        $this->assertStringContainsString('https://wa.me/628881023038', $whatsappUrl);
        $this->assertStringContainsString(urlencode('Jane Smith'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('Full Interaktif (Mulai Rp 700rb)'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('Multi-Bahasa (+ Rp 100rb)'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('Super SEO (+ Rp 150rb)'), $whatsappUrl);
        $this->assertStringContainsString(urlencode('5 Halaman'), $whatsappUrl);
    }

    /**
     * Test features route returns success for all users (including guests).
     */
    public function test_features_accessible_for_all_users(): void
    {
        $response = $this->get(route('features'));
        $response->assertStatus(200);
        $response->assertSee('Fitur Teknologi Kelas Dunia');
    }
}
