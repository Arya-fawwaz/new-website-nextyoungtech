@extends('layouts.app')

@section('title', 'Kolaborasi Strategis PT TRSJ International Indonesia | Next Young Tech')
@section('meta_description', 'Next Young Tech resmi menyelesaikan dan menyerahkan platform website korporat enterprise berkecepatan tinggi untuk PT TRSJ International Indonesia (TR Digital Construction).')
@section('meta_image', asset('images/trsj_partner_moment.jpeg'))

@section('content')
<style>
    /* ==========================================================
       CLEAN BORDERLESS EDITORIAL THEME (Next Young Tech News)
       ========================================================== */
    .news-page-wrapper {
        min-height: 100vh;
        background-color: #ffffff;
        color: #0f172a;
        padding-top: 95px;
        padding-bottom: 90px;
        position: relative;
    }

    @media (max-width: 768px) {
        .news-page-wrapper {
            padding-top: 16px !important;
            padding-bottom: 50px !important;
        }
        .article-header {
            margin-top: 0 !important;
            margin-bottom: 14px !important;
        }
        .article-main-title {
            margin-top: 0 !important;
            margin-bottom: 12px !important;
            font-size: clamp(21px, 5.2vw, 29px) !important;
            line-height: 1.25 !important;
        }
        .article-meta-bar {
            padding: 8px 0 !important;
            gap: 12px !important;
            font-size: 12px !important;
        }
    }

    /* Ambient background glows - subtle blue */
    .news-glow-1 {
        position: absolute;
        top: 100px;
        right: 5%;
        width: 450px;
        height: 450px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.08), transparent 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .news-glow-2 {
        position: absolute;
        top: 500px;
        left: 5%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.06), transparent 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    /* Breadcrumbs */
    .news-breadcrumb {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .news-breadcrumb a {
        color: #64748b;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .news-breadcrumb a:hover {
        color: var(--primary);
    }

    .news-breadcrumb .sep {
        font-size: 11px;
        opacity: 0.5;
    }

    .news-breadcrumb .current {
        color: var(--primary);
        font-weight: 700;
    }

    /* Header */
    .article-header {
        margin-bottom: 35px;
    }

    .article-badge-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .article-badge-primary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(14, 165, 233, 0.1);
        border: 1px solid rgba(14, 165, 233, 0.3);
        color: var(--primary);
        font-weight: 800;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 11.5px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .article-badge-secondary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.25);
        color: #059669;
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 11.5px;
    }

    .article-main-title {
        font-family: var(--font-heading);
        font-size: clamp(28px, 4.5vw, 44px);
        font-weight: 900;
        color: #0f172a;
        line-height: 1.25;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .article-meta-bar {
        display: flex;
        align-items: center;
        gap: 24px;
        flex-wrap: wrap;
        padding: 14px 0;
        background: transparent;
        border-bottom: 1px solid #e2e8f0;
        font-size: 13.5px;
        color: #64748b;
    }

    .article-meta-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .article-meta-item i {
        color: var(--primary);
    }

    /* Editorial Layout (Side by side photo & article text, NO BOX FRAME) */
    .news-editorial-grid {
        display: grid;
        grid-template-columns: 440px 1fr;
        gap: 40px;
        margin: 35px 0 30px 0;
        align-items: start;
    }

    .editorial-media-col {
        width: 100%;
    }

    .editorial-media-col img {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
    }

    .editorial-media-caption {
        padding: 14px 4px 0 4px;
        font-size: 13.5px;
        color: #64748b;
        line-height: 1.6;
    }

    .editorial-media-caption strong {
        color: #0f172a;
    }

    /* Article Content Prose (Clean Typography, No Background Box) */
    .editorial-prose {
        font-size: 16.5px;
        line-height: 1.85;
        color: #334155;
    }

    .editorial-prose p {
        margin-bottom: 20px;
    }

    .editorial-prose h3 {
        font-family: var(--font-heading);
        font-size: 23px;
        font-weight: 800;
        color: #0f172a;
        margin: 32px 0 14px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .editorial-prose h3 i {
        color: var(--primary);
        font-size: 19px;
    }

    .editorial-quote-box {
        margin: 28px 0;
        padding: 18px 24px;
        background: rgba(14, 165, 233, 0.03);
        border-left: 4px solid var(--primary);
        border-radius: 0 12px 12px 0;
        font-style: italic;
        font-size: 16.5px;
        line-height: 1.75;
        color: #0369a1;
    }

    .editorial-quote-author {
        margin-top: 10px;
        font-style: normal;
        font-weight: 700;
        font-size: 13.5px;
        color: var(--primary);
    }

    /* ==========================================================
       MODERN & STRIKING FEATURE HIGHLIGHT CARDS (Lebih Mencolok & Responsif)
       ========================================================== */
    .feature-list-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin: 26px 0 36px 0;
    }

    .feature-list-item {
        position: relative;
        background: #ffffff;
        border: 1px solid rgba(14, 165, 233, 0.2);
        border-radius: 18px;
        padding: 24px 20px 20px 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05), 0 2px 6px rgba(0, 0, 0, 0.02);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
    }

    /* Ambient glowing top accent border */
    .feature-list-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3.5px;
        opacity: 0.9;
        transition: opacity 0.3s ease, height 0.3s ease;
    }

    .feature-card-speed::before {
        background: linear-gradient(90deg, #0ea5e9, #38bdf8);
    }
    .feature-card-design::before {
        background: linear-gradient(90deg, #6366f1, #a855f7);
    }
    .feature-card-security::before {
        background: linear-gradient(90deg, #10b981, #06b6d4);
    }
    .feature-card-responsive::before {
        background: linear-gradient(90deg, #f59e0b, #ef4444);
    }

    .feature-list-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 36px -6px rgba(14, 165, 233, 0.18), 0 4px 12px rgba(0, 0, 0, 0.04);
        border-color: rgba(14, 165, 233, 0.45);
    }

    .feature-list-item:hover::before {
        height: 5px;
        opacity: 1;
    }

    /* Modern Icon Container */
    .feature-icon-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;
    }

    .feature-list-item:hover .feature-icon-wrapper {
        transform: scale(1.1) rotate(3deg);
    }

    .icon-speed {
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.15), rgba(56, 189, 248, 0.24));
        color: #0284c7;
        border: 1px solid rgba(14, 165, 233, 0.3);
        box-shadow: 0 4px 14px rgba(14, 165, 233, 0.15);
    }
    .icon-design {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(168, 85, 247, 0.24));
        color: #6366f1;
        border: 1px solid rgba(99, 102, 241, 0.3);
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.15);
    }
    .icon-security {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(6, 182, 212, 0.24));
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.3);
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.15);
    }
    .icon-responsive {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(239, 68, 68, 0.2));
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.3);
        box-shadow: 0 4px 14px rgba(245, 158, 11, 0.15);
    }

    /* Content Area */
    .feature-item-body {
        width: 100%;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .feature-header-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .feature-list-item h4 {
        font-size: 15.5px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
        letter-spacing: -0.2px;
        line-height: 1.35;
        transition: color 0.2s ease;
    }

    .feature-list-item:hover h4 {
        color: var(--primary);
    }

    /* Modern Mini Tech Badge */
    .feature-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        letter-spacing: 0.3px;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .badge-speed {
        background: rgba(14, 165, 233, 0.1);
        color: #0284c7;
        border: 1px solid rgba(14, 165, 233, 0.25);
    }
    .badge-design {
        background: rgba(99, 102, 241, 0.1);
        color: #6366f1;
        border: 1px solid rgba(99, 102, 241, 0.25);
    }
    .badge-security {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }
    .badge-responsive {
        background: rgba(245, 158, 11, 0.1);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.25);
    }

    .feature-list-item p {
        font-size: 13.5px;
        color: #475569;
        margin: 0;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Responsive Breakpoints */
    @media (max-width: 1100px) {
        .feature-list-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
    }

    @media (max-width: 640px) {
        .feature-list-grid {
            grid-template-columns: 1fr;
            gap: 14px;
            margin: 20px 0 28px 0;
        }
        .feature-list-item {
            padding: 18px 16px;
            flex-direction: row;
            align-items: flex-start;
            gap: 14px;
        }
        .feature-icon-wrapper {
            width: 44px;
            height: 44px;
            font-size: 18px;
            border-radius: 12px;
        }
        .feature-list-item h4 {
            font-size: 15px;
        }
        .feature-list-item p {
            font-size: 13px;
        }
    }

    /* Dark Mode Polish */
    html[data-theme="dark"] .feature-list-item {
        background: rgba(15, 23, 42, 0.85) !important;
        border-color: rgba(14, 165, 233, 0.25) !important;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.45) !important;
    }
    html[data-theme="dark"] .feature-list-item h4 {
        color: #f8fafc !important;
    }
    html[data-theme="dark"] .feature-list-item p {
        color: #94a3b8 !important;
    }

    /* Bottom Share and Back Bar */
    .article-footer-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 30px;
        border-top: 1px solid #e2e8f0;
        flex-wrap: wrap;
        gap: 20px;
        margin: 40px 0 50px 0;
    }

    .share-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .share-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #334155;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .share-btn:hover {
        background: var(--primary);
        color: #ffffff;
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    /* Related News Card */
    .related-news-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 24px;
        display: grid;
        grid-template-columns: 200px 1fr auto;
        gap: 24px;
        align-items: center;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    }

    /* CTA Banner Clean White & Blue */
    .news-cta-banner {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border: 1.5px solid #bae6fd;
        border-radius: 24px;
        padding: 40px 45px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #0f172a;
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.08);
        gap: 30px;
        flex-wrap: wrap;
    }

    @media (max-width: 900px) {
        .news-editorial-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .news-cta-banner {
            padding: 30px 22px;
        }
        .related-news-card {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<div class="news-page-wrapper">
    <!-- Ambient Subtle Glows -->
    <div class="news-glow-1"></div>
    <div class="news-glow-2"></div>

    <div class="container" style="position: relative; z-index: 2;">

        <!-- Article Header -->
        <header class="article-header">
            <h1 class="article-main-title">
                Next Young Tech Sukses Menghadirkan Solusi Arsitektur Web Enterprise untuk PT TRSJ International Indonesia
            </h1>

            <div class="article-meta-bar">
                <div class="article-meta-item">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span>8 November 2026</span>
                </div>
                <div class="article-meta-item">
                    <i class="fa-solid fa-user-pen"></i>
                    <span>Tim Redaksi & Media Next Young Tech</span>
                </div>
                <div class="article-meta-item">
                    <i class="fa-regular fa-clock"></i>
                    <span>3 Menit Waktu Baca</span>
                </div>
                <div class="article-meta-item">
                    <i class="fa-solid fa-tag"></i>
                    <span>Digital Construction & Telecom</span>
                </div>
            </div>
        </header>

        <!-- Editorial Layout: Foto Bapak di Kiri & Isi Teks Berita di Kanan (Tanpa Frame Background Kotak) -->
        <div class="news-editorial-grid">
            
            <!-- Kolom Kiri: Foto Bapak Utuh (Tanpa Frame Background Kotak) -->
            <div class="editorial-media-col">
                <img src="{{ asset('images/trsj_partner_moment.jpeg') }}" alt="Momen Serah Terima Website PT TRSJ International Indonesia oleh Next Young Tech">
                <div class="editorial-media-caption">
                    <i class="fa-solid fa-camera-retro" style="color: var(--primary); margin-right: 6px;"></i>
                    <strong>Dokumentasi Handover Resmi:</strong> Pimpinan operasional PT TRSJ International Indonesia memberikan apresiasi penuh atas penyelesaian platform website korporat enterprise mutakhir yang dikembangkan oleh tim <strong>Next Young Tech</strong>.
                </div>
            </div>

            <!-- Kolom Kanan: Isi Teks Berita Langsung di Samping Foto -->
            <div class="editorial-prose">
                <p style="font-size: 18px; line-height: 1.8; color: #0f172a; font-weight: 500;">
                    <strong style="color: #0f172a; font-weight: 800;">Jakarta, 8 November 2026</strong> — Era transformasi digital menuntut seluruh sektor industri untuk memiliki representasi dan efisiensi sistem berbasis teknologi modern. Menjawab tantangan tersebut, <strong>Next Young Tech</strong> dengan bangga mengumumkan keberhasilan deployment dan serah terima platform website korporat enterprise untuk <strong>PT TRSJ International Indonesia</strong> (dikenal sebagai <em>TR Digital Construction / 唐人数建</em>).
                </p>

                <p>
                    Kemitraan ini menjadi tonggak penting bagi Next Young Tech dalam membuktikan kapabilitasnya merancang solusi web enterprise bagi korporasi yang mengelola proyek infrastruktur telekomunikasi berstandar tinggi di Indonesia.
                </p>

                <h3><i class="fa-solid fa-tower-cell"></i> Sekilas Tentang PT TRSJ International Indonesia</h3>
                <p>
                    PT TRSJ International Indonesia merupakan entitas korporat terkemuka yang menangani berbagai proyek infrastruktur telekomunikasi skala masif di seluruh penjuru tanah air. Portofolio pekerjaan mereka meliputi ekspansi jaringan 5G (CJ-5G Expansion), proyek EMR (NS-EMR, SS-EMR), instalasi sistem baterai telekomunikasi, penempatan tower dan site baru (NS-NewSite), integrasi Multi-Operator Core Network (MOCN), jaringan transmisi microwave (MW), hingga instalasi perangkat DA, EHS, ATP/QC.
                </p>
                <p>
                    Dengan volume operasi yang dinamis dan berhadapan langsung dengan operator telekomunikasi multinasional ternama, PT TRSJ membutuhkan portal digital yang mampu merefleksikan kredibilitas, ketangguhan, dan profesionalisme kelas dunia.
                </p>
            </div>
        </div>

        <!-- Bagian Lanjutan Isi Berita (Mengalir Bersih ke Bawah Tanpa Kotak Frame) -->
        <div class="editorial-prose" style="margin-top: 10px;">
            <!-- Kutipan Manajemen -->
            <div class="editorial-quote-box">
                "Kepercayaan yang diberikan oleh PT TRSJ International Indonesia adalah pengakuan atas standar kualitas pengerjaan Next Young Tech. Kami bangga dapat menyediakan infrastruktur web yang cepat, responsif, dan siap mendukung ekspansi bisnis mereka ke tingkat global."
                <div class="editorial-quote-author">
                    — Arya Fawwaz & Tim Manajemen Next Young Tech
                </div>
            </div>

            <h3><i class="fa-solid fa-microchip"></i> Solusi Rekayasa yang Dibangun oleh Next Young Tech</h3>
            <p>
                Tim engineer Next Young Tech merancang sistem web PT TRSJ dengan pendekatan arsitektur teknologi yang kokoh dan berorientasi masa depan:
            </p>

            <div class="feature-list-grid">
                <!-- Card 1: Performa -->
                <div class="feature-list-item feature-card-speed">
                    <div class="feature-icon-wrapper icon-speed">
                        <i class="fa-solid fa-bolt-lightning"></i>
                    </div>
                    <div class="feature-item-body">
                        <div class="feature-header-row">
                            <h4>Performa Kecepatan Tinggi</h4>
                            <span class="feature-badge badge-speed">⚡ Ultra Cepat</span>
                        </div>
                        <p>Arsitektur caching cerdas dan kompresi asset modern yang memastikan halaman dimuat dalam hitungan milidetik.</p>
                    </div>
                </div>

                <!-- Card 2: UI/UX -->
                <div class="feature-list-item feature-card-design">
                    <div class="feature-icon-wrapper icon-design">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <div class="feature-item-body">
                        <div class="feature-header-row">
                            <h4>Desain UI/UX Eksklusif</h4>
                            <span class="feature-badge badge-design">🎨 Estetika 3D</span>
                        </div>
                        <p>Tampilan visual modern berwibawa dengan identitas warna korporat yang harmonis dan tipografi yang elegan.</p>
                    </div>
                </div>

                <!-- Card 3: Keamanan -->
                <div class="feature-list-item feature-card-security">
                    <div class="feature-icon-wrapper icon-security">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="feature-item-body">
                        <div class="feature-header-row">
                            <h4>Keamanan Berstandar Enterprise</h4>
                            <span class="feature-badge badge-security">🔒 Grade A+</span>
                        </div>
                        <p>Proteksi terhadap ancaman siber, enkripsi data SSL penuh, dan struktur kode yang telah melalui uji keamanan ketat.</p>
                    </div>
                </div>

                <!-- Card 4: Multi-Device -->
                <div class="feature-list-item feature-card-responsive">
                    <div class="feature-icon-wrapper icon-responsive">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <div class="feature-item-body">
                        <div class="feature-header-row">
                            <h4>Responsivitas Multi-Device</h4>
                            <span class="feature-badge badge-responsive">📱 100% Flex</span>
                        </div>
                        <p>Tampilan tetap sempurna di semua ukuran layar, mulai dari monitor kantor, tablet lapangan, hingga ponsel pintar.</p>
                    </div>
                </div>
            </div>

            <h3><i class="fa-solid fa-thumbs-up"></i> Kepuasan Klien dan Masa Depan Kolaborasi</h3>
            <p>
                Momen serah terima ditandai dengan antusiasme penuh dari pimpinan operasional PT TRSJ International Indonesia. Simbol dua jempol yang terekam pada dokumentasi resmi mencerminkan kepuasan terhadap hasil kerja, ketepatan waktu pengerjaan, dan kemudahan navigasi sistem yang dihadirkan.
            </p>
            <p>
                Ke depan, Next Young Tech dan PT TRSJ International Indonesia berkomitmen untuk terus menjalin sinergi strategis dalam pengembangan digitalisasi operasional dan integrasi sistem korporat yang lebih luas lagi.
            </p>

            <!-- Footer Bar with Sharing & Navigation -->
            <div class="article-footer-bar">
                <div class="share-group">
                    <span style="font-size: 13px; font-weight: 700; color: #64748b; margin-right: 4px;">Bagikan Berita:</span>
                    <a href="https://api.whatsapp.com/send?text=Simak%20kolaborasi%20strategis%20Next%20Young%20Tech%20dan%20PT%20TRSJ%20International%20Indonesia:%20{{ urlencode(url()->current()) }}" target="_blank" class="share-btn" title="Bagikan ke WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="share-btn" title="Bagikan ke LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <button class="share-btn" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin!');" title="Salin Tautan" style="cursor: pointer;">
                        <i class="fa-solid fa-link"></i>
                    </button>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('home') }}" class="btn-secondary" style="font-size: 13px; padding: 10px 20px; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn-primary" style="font-size: 13px; padding: 10px 20px; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; background: var(--primary);">
                        <i class="fa-solid fa-folder-open"></i> Lihat Portofolio Lainnya
                    </a>
                </div>
            </div>
        </div>

        <!-- Related News / Project Card (Clean Theme) -->
        <div style="margin-bottom: 45px;">
            <h3 style="font-size: 20px; font-weight: 800; margin-bottom: 20px; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-newspaper" style="color: var(--primary);"></i> Berita & Rilis Terkait Lainnya
            </h3>
            <div class="related-news-card">
                <img src="https://the-road-game.vercel.app/hero_corridor.png" alt="THE ROAD Game" style="width: 100%; height: 120px; object-fit: cover; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div>
                    <span style="font-size: 11px; font-weight: 800; color: #dc2626; letter-spacing: 1px; text-transform: uppercase;">GAME RELEASE &bull; ROBLOX 3D</span>
                    <h4 style="font-size: 17px; font-weight: 800; color: #0f172a; margin: 4px 0 6px 0;">THE ROAD - Co-Op Multiplayer Terror</h4>
                    <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.55;">Rilis game horor 3D interaktif di platform Roblox oleh Next Young Tech Studio dengan mekanik shift malam minimarket dan CCTV terintegrasi.</p>
                </div>
                <div>
                    <a href="https://the-road-game.vercel.app" target="_blank" class="btn-secondary" style="font-size: 12.5px; padding: 10px 18px; border-radius: 8px; text-decoration: none; white-space: nowrap; display: inline-flex; align-items: center; gap: 6px;">
                        <span>Kunjungi Web</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
