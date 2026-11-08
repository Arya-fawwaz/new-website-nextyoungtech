@extends('layouts.app')

@section('title', 'Berita & Liputan Media | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       NEWS PAGE THEME & LAYOUT (Consistent with Next Young Tech)
       ========================================================== */
    .news-page-wrapper {
        min-height: 100vh;
        padding-top: 130px;
        padding-bottom: 90px;
        position: relative;
    }

    /* Ambient background glows */
    .news-glow-1 {
        position: absolute;
        top: 100px;
        right: 10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.12), transparent 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .news-glow-2 {
        position: absolute;
        top: 400px;
        left: 5%;
        width: 450px;
        height: 450px;
        background: radial-gradient(circle, rgba(255, 107, 0, 0.12), transparent 70%);
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
        color: var(--text-muted);
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .news-breadcrumb a {
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .news-breadcrumb a:hover {
        color: var(--primary);
    }

    .news-breadcrumb .sep {
        font-size: 11px;
        opacity: 0.6;
    }

    .news-breadcrumb .current {
        color: var(--primary);
        font-weight: 600;
    }

    /* News Article Card Layout */
    .article-header {
        margin-bottom: 35px;
    }

    .article-badge-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 18px;
    }

    .article-badge-primary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, rgba(255, 107, 0, 0.18), rgba(255, 140, 0, 0.1));
        border: 1px solid #ff7700;
        color: #ff6b00;
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
        background: rgba(14, 165, 233, 0.12);
        border: 1px solid rgba(14, 165, 233, 0.3);
        color: var(--primary);
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 11.5px;
    }

    .article-main-title {
        font-family: var(--font-heading);
        font-size: clamp(30px, 4.5vw, 46px);
        font-weight: 900;
        color: var(--text-main);
        line-height: 1.22;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .article-meta-bar {
        display: flex;
        align-items: center;
        gap: 24px;
        flex-wrap: wrap;
        padding: 14px 20px;
        background: rgba(14, 165, 233, 0.05);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        font-size: 13px;
        color: var(--text-muted);
    }

    .article-meta-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .article-meta-item i {
        color: var(--primary);
    }

    /* Media Showcase Grid */
    .news-media-showcase {
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 28px;
        margin: 35px 0 45px 0;
        align-items: stretch;
    }

    .moment-photo-card {
        background: #0f172a;
        border-radius: 20px;
        overflow: hidden;
        border: 1.5px solid var(--border-color);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .moment-photo-card:hover {
        border-color: rgba(14, 165, 233, 0.5);
        transform: translateY(-3px);
    }

    .moment-photo-img-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        background: #090e1a;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .moment-photo-img-wrapper img {
        width: 100%;
        height: auto;
        max-height: 480px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .moment-photo-card:hover .moment-photo-img-wrapper img {
        transform: scale(1.02);
    }

    .moment-photo-caption {
        padding: 16px 20px;
        background: #090e1a;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        color: #cbd5e1;
        font-size: 13px;
        line-height: 1.55;
    }

    .moment-photo-caption strong {
        color: #ffffff;
    }

    /* Partner Logo Shield Card */
    .partner-info-box {
        background: linear-gradient(155deg, #090e1a 0%, #0d1629 60%, #121e38 100%);
        border: 1.5px solid rgba(255, 107, 0, 0.35);
        border-radius: 20px;
        padding: 30px 26px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: #ffffff;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15), 0 0 30px rgba(255, 107, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .partner-info-box::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 130px;
        height: 130px;
        background: radial-gradient(circle, rgba(255, 107, 0, 0.3), transparent 70%);
        pointer-events: none;
    }

    .partner-logo-container {
        background: rgba(255, 255, 255, 0.04);
        border: 1.5px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 26px 20px;
        text-align: center;
        backdrop-filter: blur(8px);
    }

    .partner-logo-container img {
        max-width: 220px;
        width: 85%;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 4px 15px rgba(255, 107, 0, 0.4));
    }

    /* Article Content Prose */
    .article-body {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 24px;
        padding: 45px 50px;
        margin-bottom: 50px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
    }

    .article-prose {
        font-size: 16.5px;
        line-height: 1.85;
        color: var(--text-main);
    }

    .article-prose p {
        margin-bottom: 22px;
    }

    .article-prose h3 {
        font-family: var(--font-heading);
        font-size: 24px;
        font-weight: 800;
        color: var(--text-main);
        margin: 36px 0 16px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .article-prose h3 i {
        color: var(--primary);
        font-size: 20px;
    }

    .article-quote-box {
        margin: 30px 0;
        padding: 24px 30px;
        background: rgba(14, 165, 233, 0.06);
        border-left: 4px solid var(--primary);
        border-radius: 0 16px 16px 0;
        font-style: italic;
        font-size: 17px;
        line-height: 1.7;
        color: var(--text-main);
    }

    .article-quote-author {
        margin-top: 12px;
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        color: var(--primary);
    }

    .feature-list-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 18px;
        margin: 25px 0 35px 0;
    }

    .feature-list-item {
        background: rgba(14, 165, 233, 0.04);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        padding: 18px 20px;
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .feature-list-item i {
        font-size: 20px;
        color: var(--primary);
        margin-top: 3px;
    }

    .feature-list-item h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 4px;
    }

    .feature-list-item p {
        font-size: 13.5px;
        color: var(--text-muted);
        margin: 0;
        line-height: 1.5;
    }

    /* Bottom Share and Back Bar */
    .article-footer-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 30px;
        border-top: 1px solid var(--border-color);
        flex-wrap: wrap;
        gap: 20px;
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
        background: rgba(14, 165, 233, 0.08);
        border: 1px solid var(--border-color);
        color: var(--text-main);
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .share-btn:hover {
        background: var(--primary);
        color: #ffffff;
        transform: translateY(-2px);
    }

    /* CTA Banner on News Page */
    .news-cta-banner {
        background: linear-gradient(135deg, #090e1a 0%, #0f172a 100%);
        border: 1.5px solid var(--border-color);
        border-radius: 24px;
        padding: 40px 45px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #ffffff;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.2);
        gap: 30px;
        flex-wrap: wrap;
    }

    @media (max-width: 900px) {
        .news-media-showcase {
            grid-template-columns: 1fr;
        }
        .article-body {
            padding: 30px 24px;
        }
        .news-cta-banner {
            padding: 30px 24px;
        }
        .related-news-card {
            grid-template-columns: 1fr !important;
        }
    }

    /* Dark Mode Adjustments */
    html[data-theme="dark"] .article-body {
        background: #0f172a !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
    }
    html[data-theme="dark"] .article-main-title {
        color: #f8fafc !important;
    }
    html[data-theme="dark"] .article-prose {
        color: #e2e8f0 !important;
    }
    html[data-theme="dark"] .article-prose h3 {
        color: #f8fafc !important;
    }
    html[data-theme="dark"] .article-quote-box {
        background: rgba(14, 165, 233, 0.12) !important;
        color: #f1f5f9 !important;
    }
    html[data-theme="dark"] .feature-list-item {
        background: rgba(255, 255, 255, 0.03) !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
    }
    html[data-theme="dark"] .feature-list-item h4 {
        color: #f8fafc !important;
    }
    html[data-theme="dark"] .share-btn {
        background: rgba(255, 255, 255, 0.06) !important;
        color: #f8fafc !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
</style>

<div class="news-page-wrapper">
    <!-- Ambient Orbs -->
    <div class="news-glow-1"></div>
    <div class="news-glow-2"></div>

    <div class="container" style="position: relative; z-index: 2;">
        
        <!-- Breadcrumb Navigation -->
        <nav class="news-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Beranda</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">News & Liputan Media</span>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">Kemitraan PT TRSJ</span>
        </nav>

        <!-- Article Header -->
        <header class="article-header">
            <div class="article-badge-row">
                <span class="article-badge-primary">
                    <i class="fa-solid fa-bullhorn"></i> SIARAN PERS RESMI
                </span>
                <span class="article-badge-secondary">
                    <i class="fa-solid fa-handshake"></i> KEMITRAAN ENTERPRISE
                </span>
                <span class="article-badge-secondary" style="color: #10b981; border-color: rgba(16, 185, 129, 0.3); background: rgba(16, 185, 129, 0.08);">
                    <i class="fa-solid fa-circle-check"></i> PROYEK SELESAI & DEPLOYED
                </span>
            </div>

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

        <!-- Media Showcase: Photo Handover + Official Logo -->
        <div class="news-media-showcase">
            <!-- Left: Handover Moment Photo -->
            <div class="moment-photo-card">
                <div class="moment-photo-img-wrapper">
                    <img src="{{ asset('images/trsj_partner_moment.jpeg') }}" alt="Momen Serah Terima Website PT TRSJ International Indonesia oleh Next Young Tech">
                </div>
                <div class="moment-photo-caption">
                    <i class="fa-solid fa-camera-retro" style="color: var(--primary); margin-right: 6px;"></i>
                    <strong>Dokumentasi Handover:</strong> Pimpinan operasional PT TRSJ International Indonesia memberikan apresiasi langsung atas penyelesaian website korporat berarsitektur mutakhir yang dikembangkan oleh tim <strong>Next Young Tech</strong>.
                </div>
            </div>

            <!-- Right: Partner Information Box & Logo -->
            <div class="partner-info-box">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                        <span style="font-size: 11px; font-weight: 800; color: #ff8c00; letter-spacing: 1.5px; text-transform: uppercase;">
                            <i class="fa-solid fa-award"></i> Strategic Corporate Partner
                        </span>
                        <span style="background: rgba(16, 185, 129, 0.2); color: #34d399; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px;">
                            Aktif
                        </span>
                    </div>

                    <!-- TRSJ Logo Shield -->
                    <div class="partner-logo-container">
                        <img src="{{ asset('images/logo_transparent_4k.webp') }}" alt="Logo PT TRSJ International Indonesia (TR Digital Construction)">
                    </div>

                    <div style="margin-top: 20px;">
                        <h3 style="font-size: 20px; font-weight: 800; color: #ffffff; margin-bottom: 6px;">
                            PT TRSJ International Indonesia
                        </h3>
                        <div style="font-size: 13px; color: #94a3b8; margin-bottom: 14px;">
                            TR Digital Construction &bull; 唐人数建
                        </div>
                        <p style="font-size: 13.5px; color: #cbd5e1; line-height: 1.6; margin: 0;">
                            Perusahaan berstandar internasional yang bergerak di bidang pembangunan konstruksi digital, telekomunikasi makro-mikro, dan rekayasa sipil modern.
                        </p>
                    </div>
                </div>

                <div style="margin-top: 24px; padding-top: 18px; border-top: 1px dashed rgba(255, 255, 255, 0.15);">
                    <div style="font-size: 12px; color: #94a3b8; margin-bottom: 8px;">Cakupan Kerjasama:</div>
                    <div style="display: flex; flex-direction: column; gap: 6px; font-size: 12.5px; color: #e2e8f0;">
                        <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 8px;"></i> Desain UI/UX Korporat Enterprise</div>
                        <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 8px;"></i> Arsitektur Platform Web Laravel</div>
                        <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 8px;"></i> Optimasi Performa & Cloud Hosting</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Body -->
        <article class="article-body">
            <div class="article-prose">
                <p>
                    <strong>Jakarta, 8 November 2026</strong> — Era transformasi digital menuntut seluruh sektor industri untuk memiliki representasi dan efisiensi sistem berbasis teknologi modern. Menjawab tantangan tersebut, <strong>Next Young Tech</strong> dengan bangga mengumumkan keberhasilan deployment dan serah terima platform website korporat enterprise untuk <strong>PT TRSJ International Indonesia</strong> (juga dikenal sebagai <em>TR Digital Construction / 唐人数建</em>).
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

                <!-- Quote Box -->
                <div class="article-quote-box">
                    "Kepercayaan yang diberikan oleh PT TRSJ International Indonesia adalah pengakuan atas standar kualitas pengerjaan Next Young Tech. Kami bangga dapat menyediakan infrastruktur web yang cepat, responsif, dan siap mendukung ekspansi bisnis mereka ke tingkat global."
                    <div class="article-quote-author">
                        — Arya Fawwaz & Tim Manajemen Next Young Tech
                    </div>
                </div>

                <h3><i class="fa-solid fa-microchip"></i> Solusi Rekayasa yang Dibangun oleh Next Young Tech</h3>
                <p>
                    Tim engineer Next Young Tech merancang sistem web PT TRSJ dengan pendekatan arsitektur teknologi yang kokoh dan berorientasi masa depan:
                </p>

                <div class="feature-list-grid">
                    <div class="feature-list-item">
                        <i class="fa-solid fa-bolt-lightning"></i>
                        <div>
                            <h4>Performa Kecepatan Tinggi</h4>
                            <p>Arsitektur caching cerdas dan kompresi asset modern yang memastikan halaman dimuat dalam hitungan milidetik.</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <i class="fa-solid fa-palette"></i>
                        <div>
                            <h4>Desain UI/UX Eksklusif</h4>
                            <p>Tampilan visual modern berwibawa dengan identitas warna korporat yang harmonis dan tipografi yang elegan.</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <h4>Keamanan Berstandar Enterprise</h4>
                            <p>Proteksi terhadap ancaman siber, enkripsi data SSL penuh, dan struktur kode yang telah melalui uji keamanan ketat.</p>
                        </div>
                    </div>
                    <div class="feature-list-item">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <div>
                            <h4>Responsivitas Multi-Device</h4>
                            <p>Tampilan tetap sempurna di semua ukuran layar, mulai dari monitor kantor, tablet lapangan, hingga ponsel pintar.</p>
                        </div>
                    </div>
                </div>

                <h3><i class="fa-solid fa-thumbs-up"></i> Kepuasan Klien dan Masa Depan Kolaborasi</h3>
                <p>
                    Momen serah terima ditandai dengan antusiasme penuh dari pimpinan proyek PT TRSJ International Indonesia. Simbol dua jempol yang terekam pada dokumentasi resmi mencerminkan kepuasan terhadap hasil kerja, ketepatan waktu pengerjaan, dan kemudahan navigasi sistem yang dihadirkan.
                </p>
                <p>
                    Ke depan, Next Young Tech dan PT TRSJ International Indonesia berkomitmen untuk terus menjalin sinergi strategis dalam pengembangan digitalisasi operasional dan integrasi sistem korporat yang lebih luas lagi.
                </p>
            </div>

            <!-- Footer Bar with Sharing & Navigation -->
            <div class="article-footer-bar">
                <div class="share-group">
                    <span style="font-size: 13px; font-weight: 700; color: var(--text-muted); margin-right: 4px;">Bagikan Berita:</span>
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
                    <a href="{{ route('portfolio') }}" class="btn-primary" style="font-size: 13px; padding: 10px 20px; border-radius: 10px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-folder-open"></i> Lihat Portofolio Lainnya
                    </a>
                </div>
            </div>
        </article>

        <!-- Related News / Project Card -->
        <div style="margin-bottom: 45px;">
            <h3 style="font-size: 20px; font-weight: 800; margin-bottom: 20px; color: var(--text-main); display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-newspaper" style="color: var(--primary);"></i> Berita & Rilis Terkait Lainnya
            </h3>
            <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 18px; padding: 24px; display: grid; grid-template-columns: 200px 1fr auto; gap: 24px; align-items: center;" class="related-news-card">
                <img src="https://the-road-game.vercel.app/hero_corridor.png" alt="THE ROAD Game" style="width: 100%; height: 120px; object-fit: cover; border-radius: 12px; border: 1px solid var(--border-color);">
                <div>
                    <span style="font-size: 11px; font-weight: 800; color: #ff0000; letter-spacing: 1px; text-transform: uppercase;">GAME RELEASE &bull; ROBLOX 3D</span>
                    <h4 style="font-size: 17px; font-weight: 800; color: var(--text-main); margin: 4px 0 6px 0;">THE ROAD - Co-Op Multiplayer Terror</h4>
                    <p style="font-size: 13.5px; color: var(--text-muted); margin: 0; line-height: 1.5;">Rilis game horor 3D interaktif di Roblox oleh Next Young Tech Studio dengan mekanik shift malam minimarket dan sistem CCTV terintegrasi.</p>
                </div>
                <div>
                    <a href="https://the-road-game.vercel.app" target="_blank" class="btn-secondary" style="font-size: 12.5px; padding: 10px 18px; border-radius: 8px; text-decoration: none; white-space: nowrap; display: inline-flex; align-items: center; gap: 6px;">
                        <span>Kunjungi Web</span> <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- CTA Banner -->
        <div class="news-cta-banner">
            <div>
                <span style="font-size: 12px; font-weight: 800; color: #ff8c00; letter-spacing: 1.5px; text-transform: uppercase;">
                    <i class="fa-solid fa-lightbulb"></i> Butuh Solusi Serupa?
                </span>
                <h3 style="font-size: 26px; font-weight: 800; margin: 8px 0 10px 0; color: #ffffff;">
                    Siap Mengembangkan Platform Web Korporat Anda?
                </h3>
                <p style="font-size: 14.5px; color: #94a3b8; margin: 0; max-width: 600px; line-height: 1.6;">
                    Konsultasikan kebutuhan pembuatan website, sistem enterprise, atau transformasi digital bisnis Anda bersama tim engineer ahli Next Young Tech.
                </p>
            </div>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <a href="https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20untuk%20konsultasi%20pembuatan%20website%20korporat%20seperti%20kemitraan%20PT%20TRSJ." target="_blank" class="btn-primary" style="background: linear-gradient(135deg, #25d366, #128c7e); border: none; padding: 14px 26px; border-radius: 12px; font-weight: 700; font-size: 14px; text-decoration: none; color: #ffffff; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.35);">
                    <i class="fa-brands fa-whatsapp" style="font-size: 18px;"></i> Hubungi via WhatsApp
                </a>
                <a href="{{ route('quotation.index') }}" class="btn-secondary" style="border: 1px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.08); padding: 14px 24px; border-radius: 12px; font-weight: 700; font-size: 14px; text-decoration: none; color: #ffffff; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-calculator"></i> Estimasi Biaya
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
