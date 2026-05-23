@extends('layouts.app')

@section('title', 'Profil Perusahaan | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       TEMA PREMIUM PROFIL PERUSAHAAN (FUTURISTIK & LUXURY)
       ========================================================== */
    .about-wrapper {
        min-height: 100vh;
        background: var(--bg-body);
        color: var(--text-main);
        position: relative;
        overflow: hidden;
        padding: 120px 0 80px 0;
        transition: background 0.4s ease;
    }

    /* Floating Ambient Glowing Orbs */
    .about-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.08;
        pointer-events: none;
        z-index: 1;
        animation: floatOrb 25s infinite alternate ease-in-out;
    }
    [data-theme="dark"] .about-glow {
        opacity: 0.18;
    }
    .about-glow-1 {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, var(--primary) 0%, transparent 80%);
        top: -100px;
        left: -100px;
        animation-duration: 28s;
    }
    .about-glow-2 {
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, var(--secondary) 0%, transparent 80%);
        bottom: 10%;
        right: -150px;
        animation-duration: 35s;
        animation-delay: -7s;
    }
    .about-glow-3 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--accent) 0%, transparent 80%);
        top: 35%;
        left: 55%;
        animation-duration: 22s;
        animation-delay: -12s;
    }

    @keyframes floatOrb {
        0% { transform: translate(0, 0) scale(1) rotate(0deg); }
        50% { transform: translate(60px, 80px) scale(1.15) rotate(180deg); }
        100% { transform: translate(-40px, -60px) scale(0.9) rotate(360deg); }
    }

    .about-container {
        position: relative;
        z-index: 10;
    }

    /* Premium Header */
    .about-header {
        text-align: center;
        margin-bottom: 70px;
    }
    .about-badge {
        display: inline-block;
        padding: 8px 18px;
        background: var(--primary-glow);
        border: 1px solid rgba(99, 102, 241, 0.25);
        color: var(--primary);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        border-radius: 30px;
        text-transform: uppercase;
        margin-bottom: 20px;
        box-shadow: 0 0 15px var(--primary-glow);
    }
    .about-title {
        font-family: var(--font-heading);
        font-size: 48px;
        font-weight: 900;
        letter-spacing: -1px;
        background: linear-gradient(90deg, var(--text-main) 0%, var(--primary) 50%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
    }
    .about-desc {
        color: var(--text-muted);
        font-size: 17px;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Grid Layouts */
    .about-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 80px;
        align-items: stretch;
    }
    @media (max-width: 768px) {
        .about-grid-2 {
            grid-template-columns: 1fr;
        }
    }

    /* Glassmorphism Cards */
    .about-glass-card {
        background: rgba(255, 255, 255, 0.02);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 28px;
        padding: 40px;
        box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    [data-theme="light"] .about-glass-card {
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 15px 35px -10px rgba(79, 70, 229, 0.06);
    }
    .about-glass-card:hover {
        transform: translateY(-8px);
        border-color: rgba(99, 102, 241, 0.3);
        box-shadow: 0 25px 50px -12px var(--primary-glow);
    }

    /* Visi & Misi UI elements */
    .card-icon-glow {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        font-size: 24px;
        transition: transform 0.3s ease;
    }
    .about-glass-card:hover .card-icon-glow {
        transform: scale(1.1) rotate(5deg);
    }
    .visi-icon {
        background: rgba(14, 165, 233, 0.15);
        color: var(--secondary);
        border: 1px solid rgba(14, 165, 233, 0.3);
    }
    .misi-icon {
        background: rgba(244, 63, 94, 0.15);
        color: var(--accent);
        border: 1px solid rgba(244, 63, 94, 0.3);
    }

    .about-card-title {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 15px;
        color: var(--text-main);
    }
    .about-card-text {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.7;
    }

    .misi-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .misi-item {
        position: relative;
        padding-left: 30px;
        margin-bottom: 15px;
        font-size: 14.5px;
        line-height: 1.6;
        color: var(--text-muted);
    }
    .misi-item i {
        position: absolute;
        left: 0;
        top: 4px;
        color: var(--accent);
        font-size: 16px;
    }
    .misi-item strong {
        color: var(--text-main);
        font-weight: 700;
    }

    /* Team Section */
    .team-section {
        background: rgba(255, 255, 255, 0.01);
        border: 1px solid rgba(255, 255, 255, 0.03);
        border-radius: 32px;
        padding: 50px;
        margin-top: 40px;
    }
    [data-theme="light"] .team-section {
        background: rgba(255, 255, 255, 0.4);
        border: 1px solid rgba(0, 0, 0, 0.04);
    }
    .team-visual-container {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 50px;
        align-items: center;
    }
    @media (max-width: 992px) {
        .team-visual-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }

    /* Team Photo Glass Frame */
    .team-photo-frame {
        position: relative;
        border-radius: 24px;
        padding: 12px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        box-shadow: 0 30px 60px -15px rgba(0,0,0,0.3);
        overflow: hidden;
        transition: all 0.4s ease;
    }
    [data-theme="light"] .team-photo-frame {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0,0,0,0.08);
        box-shadow: 0 30px 60px -15px rgba(79, 70, 229, 0.1);
    }
    .team-photo-frame:hover {
        transform: scale(1.02);
        border-color: rgba(99, 102, 241, 0.4);
        box-shadow: 0 40px 80px -20px var(--primary-glow);
    }
    .team-photo {
        width: 100%;
        height: auto;
        border-radius: 16px;
        display: block;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .team-photo-frame:hover .team-photo {
        transform: scale(1.015);
    }

    /* Team Bio details */
    .team-info-content h3 {
        font-size: 28px;
        font-weight: 850;
        margin-bottom: 20px;
        color: var(--text-main);
    }
    .team-info-content p {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .team-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-top: 30px;
    }
    .stat-box {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 16px;
        padding: 20px 15px;
        text-align: center;
    }
    [data-theme="light"] .stat-box {
        background: rgba(255,255,255,0.6);
        border: 1px solid rgba(0,0,0,0.06);
    }
    .stat-number {
        font-size: 26px;
        font-weight: 900;
        color: var(--primary);
        display: block;
        margin-bottom: 5px;
    }
    .stat-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 0.5px;
    }

    /* Mobile Responsive Optimizations to prevent text/layout clipping */
    @media (max-width: 768px) {
        .about-wrapper {
            padding: 80px 0 60px 0;
        }
        .about-badge {
            padding: 6px 14px;
            font-size: 11px;
            margin-bottom: 15px;
        }
        .about-title {
            font-size: 32px;
            margin-bottom: 15px;
        }
        .about-desc {
            font-size: 15px;
        }
        .about-glass-card {
            padding: 20px !important;
            border-radius: 20px !important;
        }
        .team-section {
            padding: 20px !important;
            border-radius: 24px !important;
            margin-top: 20px !important;
        }
        .team-visual-container {
            gap: 24px !important;
        }
        .team-stats {
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 8px !important;
        }
        .stat-box {
            padding: 12px 6px !important;
            border-radius: 12px !important;
        }
        .stat-number {
            font-size: 18px !important;
        }
        .stat-label {
            font-size: 8px !important;
            letter-spacing: 0px !important;
        }
        .team-info-content h3 {
            font-size: 20px !important;
            margin-bottom: 12px !important;
            line-height: 1.3 !important;
        }
    }
</style>

<div class="about-wrapper">
    <!-- Background Glow Orbs -->
    <div class="about-glow about-glow-1"></div>
    <div class="about-glow about-glow-2"></div>
    <div class="about-glow about-glow-3"></div>

    <div class="container about-container">
        <!-- Header Halaman -->
        <header class="about-header">
            <span class="about-badge">COMPANY PROFILE</span>
            <h1 class="about-title">Next Young Tech Technology</h1>
            <p class="about-desc">Pioneering digital landscape dengan keahlian engineering kelas dunia, estetika visual termewah, dan interaktivitas 3D tanpa batas.</p>
        </header>

        <!-- Grid Visi & Misi -->
        <div class="about-grid-2">
            <!-- Kartu VISI -->
            <div class="about-glass-card">
                <div class="card-icon-glow visi-icon">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h3 class="about-card-title">Visi Perusahaan</h3>
                <p class="about-card-text">
                    Menjadi akselerator teknologi terkemuka yang merevolusi lanskap digital global melalui pengembangan web 3D interaktif, kinerja performa ultra-cepat, dan estetika desain termewah kelas dunia yang memberdayakan perkembangan bisnis di era modern.
                </p>
            </div>

            <!-- Kartu MISI -->
            <div class="about-glass-card">
                <div class="card-icon-glow misi-icon">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 class="about-card-title">Misi Perusahaan</h3>
                <ul class="misi-list">
                    <li class="misi-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <strong>Inovasi Visual 3D:</strong> Menghadirkan teknologi visual interaktif mutakhir yang memukau dan meningkatkan interaksi pengguna secara masif.
                    </li>
                    <li class="misi-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <strong>Kualitas Rekayasa Tinggi:</strong> Membangun infrastruktur web berkinerja luar biasa cepat, aman, scalable, dan teroptimasi SEO kelas dunia.
                    </li>
                    <li class="misi-item">
                        <i class="fa-solid fa-circle-check"></i>
                        <strong>Kemitraan Strategis:</strong> Berkolaborasi erat dengan mitra bisnis untuk mewujudkan visi digital mereka menjadi kenyataan yang bernilai ekonomi tinggi.
                    </li>
                </ul>
            </div>
        </div>

        <!-- Section Tim & Foto Tim -->
        <div class="about-glass-card team-section">
            <div class="team-visual-container">
                <!-- Foto Frame -->
                <div class="team-photo-frame">
                    <img src="/images/team.jpg" alt="Tim Next Young Tech" class="team-photo">
                </div>

                <!-- Informasi Tim -->
                <div class="team-info-content">
                    <span style="font-size: 11px; font-weight: 800; color: var(--secondary); letter-spacing: 1.5px; text-transform: uppercase; display: block; margin-bottom: 8px;">THE ARCHITECTS OF DIGITAL INNOVATION</span>
                    <h3>Kolaborasi Tim Terbaik Kami</h3>
                    <p>
                        Di balik setiap aplikasi web interaktif premium dan performa sistem ultra-cepat yang kami bangun, terdapat barisan talenta digital terbaik Next Young Tech. Kami adalah kolaborasi dari rekayasawan perangkat lunak (software engineers), desainer UI/UX kelas atas, dan perancang model 3D interaktif yang berdedikasi tinggi.
                    </p>
                    <p>
                        Dipimpin secara langsung oleh <strong>Nazmi Dwiputra Effendi</strong> sebagai Chief Executive Officer & Lead Systems Architect, kami bersinergi menghasilkan karya digital terdepan yang mendefinisikan kembali standar kualitas, kecepatan, dan estetika untuk kesuksesan korporasi Anda.
                    </p>

                    <div class="team-stats">
                        <div class="stat-box">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Kepuasan Klien</span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-number">5+</span>
                            <span class="stat-label">Layanan Premium</span>
                        </div>
                        <div class="stat-box">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Dukungan Konsultasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
