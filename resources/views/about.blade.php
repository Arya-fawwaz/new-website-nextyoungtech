@extends('layouts.app')

@section('title', 'Profil Komunitas | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       MODERN CORPORATE PROFILE THEME
       ========================================================== */
    .corporate-wrapper {
        min-height: 100vh;
        background-color: var(--bg-body);
        color: var(--text-main);
        font-family: var(--font-body);
        overflow: hidden;
    }

    /* Hero Section */
    .corp-hero {
        padding: 160px 0 80px 0;
        text-align: center;
        background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.08) 0%, transparent 70%);
    }
    .corp-badge {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-radius: 4px;
        margin-bottom: 24px;
        border-left: 3px solid var(--primary);
    }
    .corp-hero-title {
        font-family: var(--font-heading);
        font-size: 56px;
        font-weight: 900;
        letter-spacing: -1.5px;
        color: var(--text-main);
        max-width: 900px;
        margin: 0 auto 24px auto;
        line-height: 1.1;
    }
    .corp-hero-title span {
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .corp-hero-desc {
        font-size: 18px;
        color: var(--text-muted);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Main Team Showcase */
    .corp-showcase {
        padding: 40px 0 100px 0;
        position: relative;
    }
    .corp-showcase-inner {
        display: flex;
        align-items: center;
        gap: 60px;
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        padding: 60px;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
    }
    .corp-image-col {
        flex: 1;
        position: relative;
    }
    .corp-image-wrapper {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 25px 50px rgba(0,0,0,0.1);
    }
    .corp-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        transform: scale(1.02);
        transition: transform 0.5s ease;
    }
    .corp-image-wrapper:hover img {
        transform: scale(1.05);
    }
    .corp-image-accent {
        position: absolute;
        top: -15px;
        left: -15px;
        width: 100px;
        height: 100px;
        border-top: 4px solid var(--primary);
        border-left: 4px solid var(--primary);
        z-index: -1;
    }
    .corp-image-accent-bottom {
        position: absolute;
        bottom: -15px;
        right: -15px;
        width: 100px;
        height: 100px;
        border-bottom: 4px solid var(--secondary);
        border-right: 4px solid var(--secondary);
        z-index: -1;
    }
    
    .corp-text-col {
        flex: 1;
    }
    .corp-section-subtitle {
        font-size: 11px;
        font-weight: 800;
        color: var(--text-muted);
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }
    .corp-section-title {
        font-family: var(--font-heading);
        font-size: 36px;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 24px;
        line-height: 1.2;
    }
    .corp-text-col p {
        font-size: 15px;
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .corp-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid var(--border-color);
    }
    .corp-stat-item h4 {
        font-size: 32px;
        font-weight: 900;
        color: var(--text-main);
        margin-bottom: 4px;
        font-family: var(--font-heading);
    }
    .corp-stat-item span {
        font-size: 11px;
        font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Vision & Mission Grid */
    .corp-vm-section {
        padding: 60px 0 100px 0;
        background: rgba(0,0,0,0.01);
        border-top: 1px solid var(--border-color);
    }
    .corp-vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .corp-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        padding: 50px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .corp-card:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.04);
        border-color: rgba(99, 102, 241, 0.3);
    }
    .corp-icon-box {
        width: 50px;
        height: 50px;
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 20px;
        margin-bottom: 24px;
    }
    .corp-card h3 {
        font-size: 24px;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 16px;
    }
    .corp-card p {
        font-size: 15px;
        color: var(--text-muted);
        line-height: 1.7;
    }
    .corp-list {
        list-style: none;
        padding: 0;
        margin: 20px 0 0 0;
    }
    .corp-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 16px;
        font-size: 14.5px;
        color: var(--text-muted);
        line-height: 1.6;
    }
    .corp-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        color: var(--secondary);
        font-size: 14px;
    }
    .corp-list li strong {
        color: var(--text-main);
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .corp-showcase-inner {
            flex-direction: column;
            padding: 40px 20px;
        }
        .corp-hero-title {
            font-size: 42px;
        }
        .corp-vm-grid {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 768px) {
        .corp-stats {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .corp-card {
            padding: 30px 20px;
        }
    }
</style>

<div class="corporate-wrapper">
    
    <!-- Hero Section -->
    <section class="corp-hero">
        <div class="container">
            <span class="corp-badge">Profil Perusahaan</span>
            <h1 class="corp-hero-title">Inovator Digital. <span>Arsitek Masa Depan.</span></h1>
            <p class="corp-hero-desc">Membangun ekosistem teknologi premium dan solusi web tingkat lanjut untuk korporasi dan bisnis modern yang mengutamakan kecepatan, keamanan, dan estetika visual.</p>
        </div>
    </section>

    <!-- Main Showcase / Team -->
    <section class="corp-showcase">
        <div class="container">
            <div class="corp-showcase-inner">
                
                <div class="corp-image-col">
                    <div class="corp-image-accent"></div>
                    <div class="corp-image-wrapper">
                        <img src="{{ asset('images/team.jpg') }}" alt="Tim Profesional Next Young Tech">
                    </div>
                    <div class="corp-image-accent-bottom"></div>
                </div>

                <div class="corp-text-col">
                    <span class="corp-section-subtitle">Struktur Tim Profesional</span>
                    <h2 class="corp-section-title">Kolaborasi Dedikasi Tinggi</h2>
                    <p>Di balik setiap infrastruktur web yang andal dan antarmuka pengguna yang imersif, terdapat barisan profesional yang berdedikasi tinggi. Kami beroperasi layaknya firma teknologi modern, mengutamakan presisi kode dan arsitektur sistem yang solid.</p>
                    <p>Dipimpin oleh <strong>Nazmi Dwiputra Effendi</strong>, struktur tim kami terdiri dari rekayasawan perangkat lunak, desainer produk, dan analis sistem yang berkolaborasi untuk memberikan hasil di luar ekspektasi industri standar.</p>
                    
                    <div class="corp-stats">
                        <div class="corp-stat-item">
                            <h4>100%</h4>
                            <span>Rasio Kepuasan</span>
                        </div>
                        <div class="corp-stat-item">
                            <h4>24/7</h4>
                            <span>Dukungan Teknis</span>
                        </div>
                        <div class="corp-stat-item">
                            <h4>10+</h4>
                            <span>Klien Enterprise</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="corp-vm-section">
        <div class="container">
            <div class="corp-vm-grid">
                
                <!-- Vision Card -->
                <div class="corp-card">
                    <div class="corp-icon-box">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <h3>Visi Strategis</h3>
                    <p>Menjadi pionir penyedia solusi perangkat lunak dan arsitektur web interaktif terbaik di Indonesia, menetapkan standar baru dalam hal desain UI/UX premium, performa ultra-cepat, dan keandalan sistem berskala enterprise.</p>
                    <p style="margin-top: 15px;">Kami percaya bahwa setiap bisnis modern berhak mendapatkan infrastruktur digital yang tidak hanya fungsional, tetapi juga memberikan pengalaman mewah (premium experience) bagi setiap penggunanya.</p>
                </div>

                <!-- Mission Card -->
                <div class="corp-card">
                    <div class="corp-icon-box" style="background: rgba(244, 63, 94, 0.1); color: var(--accent);">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3>Misi Operasional</h3>
                    <ul class="corp-list">
                        <li>
                            <i class="fa-solid fa-check"></i>
                            <strong>Inovasi Desain:</strong> Menghadirkan antarmuka (UI) mewah berbasis WebGL dan animasi interaktif tingkat lanjut.
                        </li>
                        <li>
                            <i class="fa-solid fa-check"></i>
                            <strong>Kualitas Rekayasa Tinggi:</strong> Membangun infrastruktur web berkinerja luar biasa cepat, aman, scalable, dan teroptimasi penuh.
                        </li>
                        <li>
                            <i class="fa-solid fa-check"></i>
                            <strong>Kemitraan Strategis:</strong> Berkolaborasi erat dengan mitra bisnis untuk mentransformasikan visi digital mereka menjadi kenyataan yang memiliki nilai ekonomi tinggi.
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
