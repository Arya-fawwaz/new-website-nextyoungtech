@extends('layouts.app')

@section('title', 'Profil Perusahaan | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       ELEGANT CORPORATE PROFILE THEME
       ========================================================== */
    .elegant-wrapper {
        min-height: 100vh;
        background-color: #ffffff; /* Clean white background */
        color: #111111;
        font-family: var(--font-body);
        padding: 120px 0 60px 0;
    }

    /* Elegant Hero */
    .elegant-hero {
        text-align: center;
        margin-bottom: 50px;
    }
    .elegant-badge {
        display: inline-block;
        padding: 4px 12px;
        background: #000000;
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    .elegant-hero-title {
        font-family: var(--font-heading);
        font-size: 52px;
        font-weight: 800;
        letter-spacing: -1px;
        color: #111111;
        max-width: 800px;
        margin: 0 auto 16px auto;
        line-height: 1.1;
    }
    .elegant-hero-desc {
        font-size: 18px;
        color: #444444;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.5;
        font-weight: 500;
    }

    /* Core Section Grid */
    .elegant-section {
        background: #f8f9fa;
        border: 1px solid #eeeeee;
        border-radius: 8px;
        padding: 40px;
        margin-bottom: 40px;
    }

    /* Team Layout */
    .elegant-team-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 40px;
        align-items: center;
    }
    .elegant-image-wrapper {
        border-radius: 4px;
        overflow: hidden;
        border: 1px solid #dddddd;
    }
    .elegant-image-wrapper img {
        width: 100%;
        display: block;
        filter: contrast(1.05); /* Slight contrast boost for professional look */
    }
    .elegant-text-content h2 {
        font-family: var(--font-heading);
        font-size: 32px;
        font-weight: 800;
        color: #111111;
        margin-bottom: 16px;
        line-height: 1.2;
    }
    .elegant-text-content p {
        font-size: 16px;
        color: #333333;
        line-height: 1.6;
        margin-bottom: 16px;
        font-weight: 500;
    }
    .elegant-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #dddddd;
    }
    .elegant-stat-item h4 {
        font-size: 28px;
        font-weight: 800;
        color: #111111;
        margin-bottom: 2px;
        font-family: var(--font-heading);
    }
    .elegant-stat-item span {
        font-size: 11px;
        font-weight: 700;
        color: #666666;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Vision Mission Grid */
    .elegant-vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    .elegant-vm-card {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        padding: 30px;
        border-radius: 4px;
    }
    .elegant-vm-card h3 {
        font-size: 20px;
        font-weight: 800;
        color: #111111;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .elegant-vm-card h3 i {
        color: #000000;
    }
    .elegant-vm-card p {
        font-size: 15px;
        color: #444444;
        line-height: 1.6;
        font-weight: 500;
        margin-bottom: 12px;
    }
    .elegant-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .elegant-list li {
        position: relative;
        padding-left: 24px;
        margin-bottom: 12px;
        font-size: 15px;
        color: #444444;
        line-height: 1.5;
        font-weight: 500;
    }
    .elegant-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        color: #111111;
        font-size: 13px;
    }
    .elegant-list li strong {
        color: #111111;
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .elegant-team-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .elegant-vm-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
    @media (max-width: 768px) {
        .elegant-hero {
            padding-top: 20px;
        }
        .elegant-hero-title {
            font-size: 36px;
        }
        .elegant-stats {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }
</style>

<div class="elegant-wrapper">
    <div class="container">
        
        <!-- Hero Section -->
        <div class="elegant-hero">
            <span class="elegant-badge">Profil Perusahaan</span>
            <h1 class="elegant-hero-title">Inovator Digital. Arsitek Masa Depan.</h1>
            <p class="elegant-hero-desc">Membangun ekosistem teknologi premium dan solusi web tingkat lanjut untuk korporasi dan bisnis modern yang mengutamakan kecepatan, keamanan, dan presisi.</p>
        </div>

        <!-- Main Team Showcase -->
        <div class="elegant-section">
            <div class="elegant-team-grid">
                
                <div class="elegant-image-wrapper">
                    <img src="{{ asset('images/team.jpg') }}" alt="Tim Profesional Next Young Tech">
                </div>

                <div class="elegant-text-content">
                    <span style="font-size: 11px; font-weight: 800; color: #666666; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px; display: block;">Struktur Tim Profesional</span>
                    <h2>Kolaborasi Dedikasi Tinggi</h2>
                    <p>Di balik setiap infrastruktur web yang andal dan antarmuka pengguna yang premium, terdapat barisan profesional yang berdedikasi tinggi. Kami beroperasi layaknya firma teknologi berstandar internasional, mengutamakan presisi kode dan arsitektur sistem yang solid.</p>
                    <p>Dipimpin oleh <strong>Nazmi Dwiputra Effendi</strong>, struktur tim kami terdiri dari rekayasawan perangkat lunak, desainer produk, dan analis sistem yang berkolaborasi untuk memberikan hasil berkualitas tinggi secara konsisten.</p>
                    
                    <div class="elegant-stats">
                        <div class="elegant-stat-item">
                            <h4>100%</h4>
                            <span>Kepuasan Klien</span>
                        </div>
                        <div class="elegant-stat-item">
                            <h4>24/7</h4>
                            <span>Dukungan Teknis</span>
                        </div>
                        <div class="elegant-stat-item">
                            <h4>10+</h4>
                            <span>Klien Enterprise</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="elegant-vm-grid">
            
            <div class="elegant-vm-card">
                <h3><i class="fa-solid fa-eye"></i> Visi Strategis</h3>
                <p>Menjadi penyedia solusi arsitektur web interaktif dan perangkat lunak terbaik di Indonesia, menetapkan standar tertinggi dalam desain UI/UX, performa sistem, dan keandalan skala enterprise.</p>
                <p>Kami meyakini bahwa bisnis modern membutuhkan infrastruktur digital yang tidak hanya fungsional, tetapi memberikan pengalaman premium dan kredibilitas maksimal di mata pengguna.</p>
            </div>

            <div class="elegant-vm-card">
                <h3><i class="fa-solid fa-bullseye"></i> Misi Operasional</h3>
                <ul class="elegant-list">
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <strong>Inovasi Desain:</strong> Menghadirkan antarmuka elegan, bersih, dan profesional yang menunjang identitas korporat.
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <strong>Rekayasa Berkualitas:</strong> Membangun infrastruktur berkinerja tinggi, aman, skalabel, dan teroptimasi secara presisi.
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <strong>Kemitraan Jangka Panjang:</strong> Berkolaborasi erat dengan klien untuk menghasilkan nilai ekonomi nyata melalui teknologi.
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>
@endsection
