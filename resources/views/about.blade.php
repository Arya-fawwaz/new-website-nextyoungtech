@extends('layouts.app')

@section('title', 'Profil Perusahaan | Next Young Tech')

@section('content')
<style>
    /* ==========================================================
       MODERN PREMIUM AGENCY THEME (Professional & Colorful but not tacky)
       ========================================================== */
    .premium-wrapper {
        min-height: 100vh;
        background-color: var(--bg-body);
        color: var(--text-main);
        font-family: var(--font-body);
    }

    /* Premium Hero Section - Dark Elegant */
    .premium-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        padding: 160px 0 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Subtle geometric accent (not glowing blob) */
    .premium-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: 
            radial-gradient(circle at 15% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 85% 30%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .premium-badge {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        border-radius: 30px;
        margin-bottom: 24px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .premium-hero-title {
        font-family: var(--font-heading);
        font-size: 54px;
        font-weight: 900;
        letter-spacing: -1px;
        color: #ffffff;
        max-width: 850px;
        margin: 0 auto 24px auto;
        line-height: 1.15;
        position: relative;
        z-index: 2;
    }
    .premium-hero-title span {
        background: linear-gradient(to right, #818cf8, #f472b6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .premium-hero-desc {
        font-size: 18px;
        color: #cbd5e1;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    /* Content Area */
    .premium-content-area {
        padding: 80px 0;
        background: #ffffff;
    }

    /* Team Layout */
    .premium-team-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 60px;
        align-items: center;
        margin-bottom: 80px;
    }
    .premium-image-wrapper {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }
    .premium-image-wrapper img {
        width: 100%;
        display: block;
        transition: transform 0.4s ease;
    }
    .premium-image-wrapper:hover img {
        transform: scale(1.03);
    }
    
    /* Elegant Solid Accent Behind Image */
    .image-solid-accent {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 20px;
        left: -20px;
        background-color: var(--primary);
        border-radius: 16px;
        z-index: -1;
        opacity: 0.1;
    }

    .premium-text-content h2 {
        font-family: var(--font-heading);
        font-size: 38px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    .premium-text-content p {
        font-size: 16px;
        color: #475569;
        line-height: 1.7;
        margin-bottom: 20px;
    }
    .premium-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #f1f5f9;
    }
    .premium-stat-item h4 {
        font-size: 36px;
        font-weight: 900;
        color: var(--primary);
        margin-bottom: 4px;
        font-family: var(--font-heading);
    }
    .premium-stat-item span {
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Vision Mission Cards */
    .premium-vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    .premium-vm-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    /* Top Border Color Line */
    .premium-vm-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
    }
    .card-visi::before { background-color: var(--primary); }
    .card-misi::before { background-color: var(--accent); }

    .premium-vm-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
    }

    .premium-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 24px;
    }
    .icon-visi {
        background: #eff6ff;
        color: var(--primary);
    }
    .icon-misi {
        background: #fff1f2;
        color: var(--accent);
    }

    .premium-vm-card h3 {
        font-size: 22px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
    }
    .premium-vm-card p {
        font-size: 15px;
        color: #475569;
        line-height: 1.7;
    }
    .premium-list {
        list-style: none;
        padding: 0;
        margin: 20px 0 0 0;
    }
    .premium-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 16px;
        font-size: 15px;
        color: #475569;
        line-height: 1.6;
    }
    .premium-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        font-size: 16px;
    }
    .icon-check-misi i { color: var(--accent); }
    
    .premium-list li strong {
        color: #0f172a;
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .premium-team-grid {
            grid-template-columns: 1fr;
            gap: 50px;
        }
        .premium-vm-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        .image-solid-accent { display: none; }
    }
    @media (max-width: 768px) {
        .premium-hero-title {
            font-size: 38px;
        }
        .premium-stats {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>

<div class="premium-wrapper">
    
    <!-- Hero Section -->
    <div class="premium-hero">
        <div class="container">
            <span class="premium-badge">Tentang Kami</span>
            <h1 class="premium-hero-title">Kami Adalah Next Young Tech. <span>Arsitek Masa Depan.</span></h1>
            <p class="premium-hero-desc">Menghadirkan harmoni antara rekayasa perangkat lunak berkelas dunia dan antarmuka desain visual yang prestisius untuk memajukan bisnis Anda.</p>
        </div>
    </div>

    <!-- Content Area -->
    <div class="premium-content-area">
        <div class="container">
            
            <!-- Main Team Showcase -->
            <div class="premium-team-grid">
                
                <div style="position: relative;">
                    <div class="image-solid-accent"></div>
                    <div class="premium-image-wrapper">
                        <img src="{{ asset('images/team.jpg') }}" alt="Tim Profesional Next Young Tech">
                    </div>
                </div>

                <div class="premium-text-content">
                    <span style="font-size: 12px; font-weight: 800; color: var(--primary); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 12px; display: block;">Kolaborasi Tingkat Tinggi</span>
                    <h2>Kualitas Industri Profesional</h2>
                    <p>Di balik sistem backend yang andal dan antarmuka pengguna yang premium, terdapat tim ahli yang berdedikasi. Kami menggabungkan keterampilan teknis tingkat lanjut dengan pemahaman estetika yang mendalam.</p>
                    <p>Dipimpin langsung oleh <strong>Nazmi Dwiputra Effendi</strong>, komitmen kami adalah menghasilkan karya digital yang solid, terukur, dan mampu mengangkat kredibilitas institusi Anda di mata dunia.</p>
                    
                    <div class="premium-stats">
                        <div class="premium-stat-item">
                            <h4>100%</h4>
                            <span>Kepuasan Klien</span>
                        </div>
                        <div class="premium-stat-item">
                            <h4>24/7</h4>
                            <span>Dukungan Ahli</span>
                        </div>
                        <div class="premium-stat-item">
                            <h4>10+</h4>
                            <span>Layanan Premium</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Vision & Mission -->
            <div class="premium-vm-grid">
                
                <!-- Vision Card -->
                <div class="premium-vm-card card-visi">
                    <div class="premium-icon-box icon-visi">
                        <i class="fa-regular fa-compass"></i>
                    </div>
                    <h3>Visi Eksekutif</h3>
                    <p>Menjadi pemimpin arsitektur web modern di Indonesia dengan menetapkan standar baru pada kualitas desain UI/UX dan keandalan sistem berkinerja tinggi.</p>
                    <p>Kami memastikan bahwa ekosistem digital yang kami rancang tidak hanya berfungsi sebagai alat, tetapi juga sebagai representasi elegan dan premium dari merek klien kami.</p>
                </div>

                <!-- Mission Card -->
                <div class="premium-vm-card card-misi">
                    <div class="premium-icon-box icon-misi">
                        <i class="fa-solid fa-flag-checkered"></i>
                    </div>
                    <h3>Misi Strategis</h3>
                    <ul class="premium-list icon-check-misi">
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
