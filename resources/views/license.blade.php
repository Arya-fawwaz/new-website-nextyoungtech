@extends('layouts.app')

@section('title', 'Lisensi | Next Young Tech')

@section('content')
    <style>
        /* Hide Nova AI Chatbot on License Page */
        .nova-chatbot-container {
            display: none !important;
        }
        
        .license-wrapper {
            padding-bottom: 80px;
        }
        .license-header {
            padding: 80px 20px 40px;
            text-align: center;
        }
        .license-header h1 {
            font-size: 42px;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 16px;
            letter-spacing: -1px;
        }
        .license-header p {
            font-size: 18px;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .license-content {
            padding: 20px 20px 40px;
        }
        .license-card {
            padding: 20px 40px;
            max-width: 850px;
            margin: 0 auto;
        }
        .license-section {
            margin-bottom: 40px;
        }
        .license-section:last-child {
            margin-bottom: 0;
        }
        .license-section h2 {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .license-section p {
            font-size: 16px;
            color: var(--text-main);
            line-height: 1.8;
            margin-bottom: 15px;
        }
        .license-section ul {
            list-style-type: none;
            padding: 0;
        }
        .license-section ul li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 12px;
            font-size: 16px;
            color: var(--text-main);
            line-height: 1.6;
        }
        .license-section ul li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--success, #10b981);
            position: absolute;
            left: 0;
            top: 2px;
        }
        .license-section ul li.restricted::before {
            content: '\f00d';
            color: var(--accent, #f43f5e);
        }
    </style>

    <div class="license-wrapper">
        <div class="license-header">
            <h1 class="notranslate">Informasi Lisensi</h1>
            <p>Ketentuan penggunaan aset, desain, dan kode pada platform Next Young Tech.</p>
        </div>

    <div class="license-content">
        <div class="license-card">
            
            <div class="license-section">
                <h2><i class="fa-solid fa-scale-balanced"></i> Hak Cipta & Kepemilikan</h2>
                <p>Seluruh konten, desain antarmuka (UI/UX), basis kode (source code), teks, grafik, logo, gambar, dan kompilasi data yang terdapat di website ini adalah milik eksklusif <strong>Next Young Tech</strong> atau dilisensikan kepada kami, dan dilindungi oleh undang-undang hak cipta dan kekayaan intelektual yang berlaku.</p>
            </div>

            <div class="license-section">
                <h2><i class="fa-solid fa-check-circle"></i> Lisensi Penggunaan Klien</h2>
                <p>Untuk klien yang menggunakan layanan pembuatan website atau aplikasi dari kami, lisensi produk akhir akan diatur sesuai dengan <strong>Perjanjian Kerja Sama (SLA/Kontrak)</strong> yang disepakati bersama. Secara umum:</p>
                <ul>
                    <li>Klien memiliki hak penuh atas konten dan data pelanggan mereka.</li>
                    <li>Klien diberikan hak guna pakai (lisensi eksklusif) untuk operasional sistem yang telah dibuat.</li>
                    <li>Basis kode (source code) inti Next Young Tech tetap menjadi properti intelektual agensi, kecuali disepakati lain dalam kontrak serah terima (handover).</li>
                </ul>
            </div>

            <div class="license-section">
                <h2><i class="fa-solid fa-ban"></i> Batasan Penggunaan Publik</h2>
                <p>Bagi pengunjung publik, Anda <strong>dilarang keras</strong> melakukan tindakan berikut tanpa izin tertulis dari Next Young Tech:</p>
                <ul>
                    <li class="restricted">Menyalin, mendistribusikan, atau mempublikasikan ulang desain website kami.</li>
                    <li class="restricted">Mengeksploitasi, memodifikasi, atau melakukan rekayasa balik (reverse engineering) pada fitur dan sistem Next Young Tech.</li>
                    <li class="restricted">Menggunakan logo atau merek dagang Next Young Tech untuk tujuan komersial di luar afiliasi resmi.</li>
                </ul>
            </div>

            <div class="license-section">
                <h2><i class="fa-solid fa-code"></i> Komponen Pihak Ketiga</h2>
                <p>Website ini mungkin menggunakan library open-source atau aset desain dari pihak ketiga (seperti Font Awesome, Google Fonts, atau framework tertentu). Semua aset pihak ketiga beroperasi di bawah lisensi asli mereka masing-masing, dan kepemilikan mutlak tetap berada di tangan kreator asli.</p>
            </div>

        </div>
    </div>
</div>
@endsection
