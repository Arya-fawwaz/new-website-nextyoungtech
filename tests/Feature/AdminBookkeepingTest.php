<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Inquiry;
use App\Models\QuotationRequest;
use App\Models\Layanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminBookkeepingTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a root admin
        $this->admin = User::create([
            'nama' => 'Super Admin',
            'email' => 'admin@youngtech.com',
            'kata_sandi' => Hash::make('secret123'),
            'is_admin' => true,
        ]);
    }

    /**
     * Test admin can access export routes and get beautiful XLS HTML output.
     */
    public function test_admin_can_export_beautiful_xls_reports(): void
    {
        // Add sample data
        Inquiry::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'telepon' => '081234567890',
            'subjek' => 'Tanya Web',
            'pesan' => 'Halo, mau tanya harga website portfolio.',
            'status' => 'new',
        ]);

        QuotationRequest::create([
            'nama_klien' => 'PT Semesta Indah',
            'email_klien' => 'contact@semesta.com',
            'telepon_klien' => '08987654321',
            'tipe_proyek' => 'web_premium',
            'fitur' => ['multilingual'],
            'estimasi_harga' => 3500000,
            'catatan' => 'Butuh seo',
            'status' => 'pending',
        ]);

        // 1. Test Inquiries Export
        $response = $this->withSession(['admin_logged_in' => true])
            ->actingAs($this->admin)
            ->get(route('admin.export', 'inquiries'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        
        $content = $response->streamedContent();
        $this->assertStringContainsString('LAPORAN KOTAK PESAN KLIEN', $content);
        $this->assertStringContainsString('table.main-table', $content);
        $this->assertStringContainsString('Budi Santoso', $content);
        $this->assertStringContainsString('081234567890', $content);
        $this->assertStringContainsString('Baru (Belum Dibaca):', $content);
        $this->assertStringContainsString('TOTAL KESELURUHAN PESAN', $content);

        // 2. Test Quotes Export
        $responseQuotes = $this->withSession(['admin_logged_in' => true])
            ->actingAs($this->admin)
            ->get(route('admin.export', 'quotes'));

        $responseQuotes->assertStatus(200);
        $responseQuotes->assertHeader('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        
        $contentQuotes = $responseQuotes->streamedContent();
        $this->assertStringContainsString('LAPORAN ESTIMASI PROYEK', $contentQuotes);
        $this->assertStringContainsString('PT Semesta Indah', $contentQuotes);
        $this->assertStringContainsString('3.500.000', $contentQuotes);
        $this->assertStringContainsString('TOTAL KESELURUHAN', $contentQuotes);
        $this->assertStringContainsString('Status Tertunda:', $contentQuotes);
    }

    /**
     * Test admin cannot close bookkeeping with incorrect confirmation phrase.
     */
    public function test_admin_cannot_close_bookkeeping_with_invalid_confirmation(): void
    {
        // Add sample inquiry
        Inquiry::create([
            'nama' => 'Andi',
            'email' => 'andi@gmail.com',
            'telepon' => '0811223344',
            'subjek' => 'Tanya Web',
            'pesan' => 'Testing',
            'status' => 'new',
        ]);

        $response = $this->withSession(['admin_logged_in' => true])
            ->actingAs($this->admin)
            ->post(route('admin.tutup-pembukuan'), [
                'konfirmasi' => 'RESET SALAH'
            ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['tutup_error']);
        $this->assertEquals(1, Inquiry::count());
    }

    /**
     * Test admin can successfully close bookkeeping with exact confirmation.
     */
    public function test_admin_can_close_bookkeeping_successfully_and_wipe_records(): void
    {
        // Create sample records
        Inquiry::create([
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'telepon' => '081234567890',
            'subjek' => 'Tanya Web',
            'pesan' => 'Isi pesan',
            'status' => 'new',
        ]);

        QuotationRequest::create([
            'nama_klien' => 'PT Makmur Jaya',
            'email_klien' => 'info@makmurjaya.com',
            'telepon_klien' => '082199887766',
            'tipe_proyek' => 'web_premium',
            'fitur' => ['multilingual', 'seo_opt'],
            'estimasi_harga' => 5000000,
            'catatan' => 'Butuh integrasi e-commerce',
            'status' => 'pending',
        ]);

        $this->assertEquals(1, Inquiry::count());
        $this->assertEquals(1, QuotationRequest::count());

        $response = $this->withSession(['admin_logged_in' => true])
            ->actingAs($this->admin)
            ->post(route('admin.tutup-pembukuan'), [
                'konfirmasi' => 'TUTUP PEMBUKUAN'
            ]);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('success');

        // Confirm database tables are truncated/wiped
        $this->assertEquals(0, Inquiry::count());
        $this->assertEquals(0, QuotationRequest::count());
    }
}
