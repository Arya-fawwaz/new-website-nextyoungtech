<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'nama' => 'Admin',
            'email' => 'admin@nextyoungtech.com',
            'kata_sandi' => \Illuminate\Support\Facades\Hash::make('nextyoungtech2026'),
            'is_admin' => true,
        ]);

        \App\Models\Layanan::create([
            'nama_layanan' => 'Web Development',
            'nama_paket' => 'Web Design Aja',
            'badge' => 'STANDAR',
            'deskripsi' => 'Desain web modern, responsif, dan elegan untuk kebutuhan branding dasar bisnis Anda.',
            'harga' => 500000,
            'fitur_list' => ['Desain Visual Responsif', 'UI/UX Glassmorphism Mewah', 'Layout 1-3 Halaman Custom', 'SEO Optimization Dasar', 'Kontak Form Terintegrasi DB'],
            'ikon' => 'fa-solid fa-compass-drafting',
            'warna_aksen' => 'primary',
            'urutan' => 1,
            'is_active' => true,
        ]);

        \App\Models\Layanan::create([
            'nama_layanan' => 'Web Development',
            'nama_paket' => 'Web Design Full Interaktif',
            'badge' => 'INTERAKTIF',
            'deskripsi' => 'Tingkatkan interaksi pengunjung dengan transisi animasi dinamis dan elemen visual yang memukau.',
            'harga' => 700000,
            'fitur_list' => ['Interaktivitas Tingkat Tinggi', 'Full GSAP & CSS Animations', 'Desain UI/UX Imersif & Fluid', 'Halaman Custom Dinamis', 'Keamanan SSL & Anti-SQL Injection'],
            'ikon' => 'fa-solid fa-wand-magic-sparkles',
            'warna_aksen' => 'secondary',
            'urutan' => 2,
            'is_active' => true,
        ]);

        \App\Models\Layanan::create([
            'nama_layanan' => 'Web Development',
            'nama_paket' => 'Web Design + Hosting',
            'badge' => 'LENGKAP',
            'deskripsi' => 'Paket lengkap desain web interaktif termewah yang sudah terintegrasi hosting dengan kuota terbatas.',
            'harga' => 1500000,
            'fitur_list' => ['Desain Web Interaktif Lengkap', 'Hosting Cepat (Kuota Terbatas)', 'Domain .com / .id Gratis (1 Tahun)', 'Setup Email Bisnis Profesional', 'Support & Pemeliharaan Server'],
            'ikon' => 'fa-solid fa-server',
            'warna_aksen' => 'accent',
            'urutan' => 3,
            'is_active' => true,
        ]);

        \App\Models\Inquiry::create([
            'nama' => 'Budiman Santoso',
            'email' => 'budiman.s@gmail.com',
            'subjek' => 'Kerjasama Agency Profile PT Maju Bersama',
            'pesan' => 'Halo Next Young Tech! Kami dari PT Maju Bersama ingin mendiskusikan pembuatan website profile dengan efek 3D mewah untuk peluncuran gedung baru kami bulan depan. Mohon kirimkan portofolio terperinci.',
            'status' => 'completed',
        ]);

        \App\Models\Inquiry::create([
            'nama' => 'Riska Amelia',
            'email' => 'riska.amelia@outlook.com',
            'subjek' => 'Tanya Paket E-commerce Royalty',
            'pesan' => 'Selamat siang. Apakah paket e-commerce Royalty sudah termasuk integrasi otomatis dengan gerbang pembayaran Midtrans dan ekspedisi RajaOngkir secara default? Terima kasih banyak.',
            'status' => 'completed',
        ]);

        \App\Models\QuotationRequest::create([
            'nama_klien' => 'Hendra Wijaya',
            'email_klien' => 'hendra.w@wijayatech.id',
            'telepon_klien' => '+62 822-1111-2222',
            'tipe_proyek' => 'web_design_interactive',
            'fitur' => ['seo_opt', 'high_anim', 'secure_core'],
            'estimasi_harga' => 1200000.00,
            'catatan' => 'Kami butuh website portofolio interaktif untuk memamerkan proyek arsitektur high-end kami. Pengunjung harus bisa berputar 3D melihat cetak biru bangunan.',
            'status' => 'approved',
        ]);

        \App\Models\QuotationRequest::create([
            'nama_klien' => 'Clara Sinta',
            'email_klien' => 'clara@tokocantik.co.id',
            'telepon_klien' => '+62 878-3333-4444',
            'tipe_proyek' => 'web_design_hosting',
            'fitur' => ['payment_gateway', 'secure_core', 'cms_integrated'],
            'estimasi_harga' => 2200000.00,
            'catatan' => 'Kami ingin mendesain ulang toko kosmetik online kami dengan sentuhan warna ungu metalik yang futuristik.',
            'status' => 'approved',
        ]);

        \App\Models\Ulasan::create([
            'nama' => 'Budiman Santoso',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Luar biasa! Next Young Tech mendesain website profile perusahaan kami dengan visual 3D yang memukau. Klien kami sangat terpukau dengan performanya yang mulus di 60 FPS.',
        ]);

        \App\Models\Ulasan::create([
            'nama' => 'Riska Amelia',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Sangat puas dengan pembuatan e-commerce kami. Tampilan glassmorphism yang futuristik dan responsif di semua perangkat meningkatkan penjualan kami secara signifikan!',
        ]);

        \App\Models\Ulasan::create([
            'nama' => 'Hendra Wijaya',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Website portofolio interaktif kami berputar 3D memamerkan cetak biru bangunan dengan kecepatan ultra-tinggi. Tim Next Young Tech benar-benar berkelas dunia!',
        ]);

        \App\Models\Ulasan::create([
            'nama' => 'Clara Sinta',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Pengalaman berkolaborasi yang luar biasa. Integrasi pembayaran aman dan antarmuka premium melampaui ekspektasi kami. Sangat direkomendasikan!',
        ]);

        \App\Models\Ulasan::create([
            'nama' => 'Aris Nugroho',
            'foto_profil' => null,
            'bintang' => 5,
            'komentar' => 'Kecepatan loading website dengan rendering Three.js sungguh mengesankan. Layanan purnajualnya juga luar biasa tanggap.',
        ]);
    }
}
