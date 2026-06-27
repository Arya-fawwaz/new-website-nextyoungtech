@extends('layouts.app')

@section('title', 'Profil Perusahaan | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       BLUE & WHITE ELEGANT THEME (Premium Corporate)
       ========================================================== */
    .bw-wrapper {
        min-height: 100vh;
        background-color: #ffffff;
        color: #1e293b; /* Very dark slate for text */
        font-family: var(--font-body);
    }

    /* Hero Section - Pure White with Blue Accents */
    .bw-hero {
        padding: 160px 0 80px 0;
        text-align: center;
        background: #ffffff;
        position: relative;
    }
    
    /* Subtle blue grid background for elegance */
    .bw-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: linear-gradient(rgba(14, 165, 233, 0.03) 1px, transparent 1px),
                          linear-gradient(90deg, rgba(14, 165, 233, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
    }

    .bw-badge {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(14, 165, 233, 0.1);
        color: var(--primary); /* Blue */
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        border-radius: 4px;
        margin-bottom: 24px;
        border: 1px solid rgba(14, 165, 233, 0.2);
    }
    .bw-hero-title {
        font-family: var(--font-heading);
        font-size: 56px;
        font-weight: 900;
        letter-spacing: -1.5px;
        color: #0f172a; /* Near black for contrast */
        max-width: 900px;
        margin: 0 auto 24px auto;
        line-height: 1.15;
        position: relative;
        z-index: 2;
    }
    .bw-hero-title span {
        color: var(--primary); /* Striking Blue */
    }
    .bw-hero-desc {
        font-size: 18px;
        color: #475569;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
        position: relative;
        z-index: 2;
        font-weight: 500;
    }

    /* Content Area */
    .bw-content-area {
        padding: 60px 0 100px 0;
        background: #ffffff;
    }

    /* Team Layout */
    .bw-team-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 60px;
        align-items: center;
        margin-bottom: 100px;
    }
    .bw-image-wrapper {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(14, 165, 233, 0.1); /* Subtle blue shadow */
        border: 1px solid rgba(14, 165, 233, 0.1);
    }
    .bw-image-wrapper img {
        width: 100%;
        display: block;
        transition: transform 0.5s ease;
    }
    .bw-image-wrapper:hover img {
        transform: scale(1.03);
    }
    
    /* Clean Blue Accent Behind Image */
    .bw-image-accent {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 25px;
        left: -25px;
        background-color: var(--primary);
        border-radius: 12px;
        z-index: -1;
        opacity: 0.05; /* Very subtle */
    }

    .bw-text-content h2 {
        font-family: var(--font-heading);
        font-size: 40px;
        font-weight: 900;
        color: #0f172a;
        margin-bottom: 24px;
        line-height: 1.15;
    }
    .bw-text-content p {
        font-size: 16px;
        color: #475569;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .bw-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 35px;
        padding-top: 30px;
        border-top: 1px solid #e2e8f0;
    }
    .bw-stat-item h4 {
        font-size: 38px;
        font-weight: 900;
        color: var(--primary);
        margin-bottom: 4px;
        font-family: var(--font-heading);
    }
    .bw-stat-item span {
        font-size: 12px;
        font-weight: 800;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Vision Mission Cards */
    .bw-vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .bw-vm-card {
        background: #ffffff;
        border: 1px solid rgba(14, 165, 233, 0.15); /* Blue tinted border */
        padding: 45px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(14, 165, 233, 0.04);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }
    
    .bw-vm-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(14, 165, 233, 0.08);
        border-color: rgba(14, 165, 233, 0.3);
    }

    .bw-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin-bottom: 24px;
        background: var(--primary);
        color: #ffffff;
        box-shadow: 0 10px 20px rgba(14, 165, 233, 0.2);
    }

    .bw-vm-card h3 {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
    }
    .bw-vm-card p {
        font-size: 16px;
        color: #475569;
        line-height: 1.7;
    }
    .bw-list {
        list-style: none;
        padding: 0;
        margin: 20px 0 0 0;
    }
    .bw-list li {
        position: relative;
        padding-left: 32px;
        margin-bottom: 16px;
        font-size: 15.5px;
        color: #475569;
        line-height: 1.6;
    }
    .bw-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        font-size: 16px;
        color: var(--primary);
    }
    
    .bw-list li strong {
        color: #0f172a;
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .bw-team-grid {
            grid-template-columns: 1fr;
            gap: 50px;
        }
        .bw-vm-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .bw-image-accent { display: none; }
    }
    @media (max-width: 768px) {
        .bw-hero-title {
            font-size: 40px;
        }
        .bw-stats {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .bw-vm-card {
            padding: 30px;
        }
    }
</style>

<div class="bw-wrapper">
    
    <!-- Hero Section -->
    <div class="bw-hero">
        <div class="container">
            <span class="bw-badge">Profil Perusahaan</span>
            <h1 class="bw-hero-title">Kami Adalah Next Young Tech. <span>Arsitek Masa Depan.</span></h1>
            <p class="bw-hero-desc">Menghadirkan harmoni antara rekayasa perangkat lunak berkelas dunia dan antarmuka desain visual yang prestisius untuk memajukan bisnis Anda.</p>
        </div>
    </div>

    <!-- Content Area -->
    <div class="bw-content-area">
        <div class="container">
            
            <!-- Main Team Showcase -->
            <div class="bw-team-grid">
                
                <div style="position: relative;">
                    <div class="bw-image-accent"></div>
                    <div class="bw-image-wrapper">
                        <img src="{{ asset('images/team.jpg') }}" alt="Tim Profesional Next Young Tech">
                    </div>
                </div>

                <div class="bw-text-content">
                    <span style="font-size: 12px; font-weight: 800; color: var(--primary); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 12px; display: block;">Kolaborasi Tingkat Tinggi</span>
                    <h2>Kualitas Industri Profesional</h2>
                    <p>Di balik sistem backend yang andal dan antarmuka pengguna yang premium, terdapat tim ahli yang berdedikasi. Kami menggabungkan keterampilan teknis tingkat lanjut dengan pemahaman estetika yang mendalam.</p>
                    <p>Dipimpin langsung oleh <strong>Nazmi Dwiputra Effendi</strong>, komitmen kami adalah menghasilkan karya digital yang solid, terukur, dan mampu mengangkat kredibilitas institusi Anda di mata dunia.</p>
                    
                    <div class="bw-stats">
                        <div class="bw-stat-item">
                            <h4>100%</h4>
                            <span>Kepuasan Klien</span>
                        </div>
                        <div class="bw-stat-item">
                            <h4>24/7</h4>
                            <span>Dukungan Ahli</span>
                        </div>
                        <div class="bw-stat-item">
                            <h4>10+</h4>
                            <span>Layanan Premium</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Vision & Mission -->
            <div class="bw-vm-grid">
                
                <!-- Vision Card -->
                <div class="bw-vm-card">
                    <div class="bw-icon-box">
                        <i class="fa-regular fa-compass"></i>
                    </div>
                    <h3>Visi Eksekutif</h3>
                    <p>Menjadi pemimpin arsitektur web modern di Indonesia dengan menetapkan standar baru pada kualitas desain UI/UX dan keandalan sistem berkinerja tinggi.</p>
                    <p style="margin-top: 15px;">Kami memastikan bahwa ekosistem digital yang kami rancang tidak hanya berfungsi sebagai alat, tetapi juga sebagai representasi elegan dan premium dari merek klien kami.</p>
                </div>

                <!-- Mission Card -->
                <div class="bw-vm-card">
                    <div class="bw-icon-box">
                        <i class="fa-solid fa-flag-checkered"></i>
                    </div>
                    <h3>Misi Strategis</h3>
                    <ul class="bw-list">
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <strong>Desain Elegan:</strong> Mengutamakan estetika rapi dan interaktif yang profesional tanpa elemen berlebih.
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <strong>Presisi Kode:</strong> Arsitektur sistem yang dioptimalkan untuk kecepatan dan keamanan tingkat lanjut.
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <strong>Fokus Hasil:</strong> Bekerja erat dengan klien untuk memberikan pengembalian investasi teknologi yang maksimal.
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
