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
    /* Standalone Info Cards Grid & Section Header */
    .bw-info-section-wrapper {
        display: flex;
        flex-direction: column;
    }
    .bw-section-heading,
    .bw-mgmt-heading {
        margin-bottom: 36px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: none !important;
        padding-bottom: 0 !important;
    }
    .bw-section-badge,
    .bw-mgmt-badge {
        background: #0f172a;
        border: 1px solid #0f172a;
        color: #ffffff;
        font-weight: 800;
        font-size: 11px;
        padding: 6px 16px;
        border-radius: 6px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 14px;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
    }
    .bw-section-heading h3,
    .bw-mgmt-heading h3 {
        font-family: var(--font-heading);
        font-size: 36px;
        font-weight: 900;
        color: #0f172a;
        margin: 0;
        line-height: 1.25;
        text-align: center;
    }
    @media (max-width: 640px) {
        .bw-section-heading h3,
        .bw-mgmt-heading h3 {
            font-size: 26px;
        }
    }
    .bw-cards-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    @media (max-width: 640px) {
        .bw-cards-grid {
            grid-template-columns: 1fr;
        }
    }
    .bw-single-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 28px 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .bw-single-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), #60a5fa);
        opacity: 0;
        transition: opacity 0.35s ease;
    }
    .bw-single-card:hover {
        border-color: rgba(37, 99, 235, 0.35);
        box-shadow: 0 16px 35px rgba(37, 99, 235, 0.08);
        transform: translateY(-5px);
    }
    .bw-single-card:hover::before {
        opacity: 1;
    }
    .bw-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: rgba(37, 99, 235, 0.08);
        border: 1px solid rgba(37, 99, 235, 0.2);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.3s ease;
    }
    .bw-single-card:hover .bw-card-icon {
        background: var(--primary);
        color: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.25);
    }
    .bw-card-label {
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }
    .bw-card-value {
        font-size: 15px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.4;
    }

    /* Management & Executive Leadership Section (Separate Member Cards) */
    .bw-mgmt-section {
        margin-top: 70px;
        margin-bottom: 40px;
    }
    .bw-mgmt-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
    }
    @media (max-width: 900px) {
        .bw-mgmt-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 640px) {
        .bw-mgmt-grid {
            grid-template-columns: 1fr;
        }
    }
    .bw-mgmt-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-top: 3px solid var(--primary);
        border-radius: 20px;
        padding: 32px 28px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .bw-mgmt-card:hover {
        border-color: rgba(37, 99, 235, 0.4);
        box-shadow: 0 20px 40px rgba(37, 99, 235, 0.1);
        transform: translateY(-6px);
    }
    .bw-mgmt-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(37, 99, 235, 0.08);
        border: 1px solid rgba(37, 99, 235, 0.2);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 22px;
        transition: all 0.3s ease;
    }
    .bw-mgmt-card:hover .bw-mgmt-icon {
        background: var(--primary);
        color: #ffffff;
        border-color: var(--primary);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }
    .bw-mgmt-name {
        font-family: var(--font-heading);
        font-size: 19px;
        font-weight: 900;
        color: #0f172a;
        margin-bottom: 4px;
    }
    .bw-mgmt-role {
        font-size: 11.5px;
        font-weight: 800;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 16px;
    }
    .bw-mgmt-desc {
        font-size: 13.5px;
        color: #475569;
        line-height: 1.65;
        margin: 0;
    }

    /* Dark Mode Support */
    html[data-theme="dark"] .bw-wrapper {
        background-color: var(--bg-body) !important;
        color: var(--text-main) !important;
    }
    html[data-theme="dark"] .bw-hero,
    html[data-theme="dark"] .bw-content-area {
        background-color: var(--bg-body) !important;
    }
    html[data-theme="dark"] .bw-hero-title,
    html[data-theme="dark"] .bw-text-content h2,
    html[data-theme="dark"] .bw-vm-card h3,
    html[data-theme="dark"] .bw-card-value,
    html[data-theme="dark"] .bw-mgmt-name,
    html[data-theme="dark"] .bw-section-heading h3,
    html[data-theme="dark"] .bw-mgmt-heading h3,
    html[data-theme="dark"] .bw-list li strong {
        color: var(--text-main) !important;
    }
    html[data-theme="dark"] .bw-hero-desc,
    html[data-theme="dark"] .bw-text-content p,
    html[data-theme="dark"] .bw-vm-card p,
    html[data-theme="dark"] .bw-list li,
    html[data-theme="dark"] .bw-card-label,
    html[data-theme="dark"] .bw-mgmt-desc {
        color: var(--text-muted) !important;
    }
    html[data-theme="dark"] .bw-mgmt-role {
        color: #60a5fa !important;
    }
    html[data-theme="dark"] .bw-vm-card,
    html[data-theme="dark"] .bw-single-card,
    html[data-theme="dark"] .bw-mgmt-card {
        background: var(--bg-card) !important;
        border-color: var(--border-color) !important;
    }
    html[data-theme="dark"] .bw-mgmt-card {
        border-top-color: var(--primary) !important;
    }
    html[data-theme="dark"] .bw-single-card:hover,
    html[data-theme="dark"] .bw-mgmt-card:hover {
        border-color: rgba(59, 130, 246, 0.45) !important;
        box-shadow: 0 16px 35px rgba(37, 99, 235, 0.15) !important;
    }
    html[data-theme="dark"] .bw-card-icon,
    html[data-theme="dark"] .bw-mgmt-icon {
        background: rgba(59, 130, 246, 0.12) !important;
        border-color: rgba(59, 130, 246, 0.25) !important;
        color: #60a5fa !important;
    }
    html[data-theme="dark"] .bw-single-card:hover .bw-card-icon,
    html[data-theme="dark"] .bw-mgmt-card:hover .bw-mgmt-icon {
        background: var(--primary) !important;
        color: #ffffff !important;
        border-color: var(--primary) !important;
    }
    html[data-theme="dark"] .bw-stats {
        border-top-color: var(--border-color) !important;
    }
    html[data-theme="dark"] .bw-section-badge,
    html[data-theme="dark"] .bw-mgmt-badge {
        background: rgba(59, 130, 246, 0.18) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60a5fa !important;
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
    }
    @media (max-width: 768px) {
        .bw-hero {
            padding: 100px 0 40px 0;
        }
        .bw-hero-title {
            font-size: 32px;
        }
        .bw-content-area {
            padding: 40px 0 60px 0;
        }
        .bw-stats {
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
        }
        .bw-stat-item h4 {
            font-size: 24px;
        }
        .bw-stat-item span {
            font-size: 10px;
        }
        .bw-vm-card {
            padding: 24px;
        }
        .bw-info-card {
            padding: 24px 20px;
        }
        .bw-info-item {
            padding: 12px;
            gap: 12px;
        }
        .bw-info-logo {
            width: 52px;
            height: 52px;
            font-size: 22px;
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
                
                <!-- Corporate Informative Cards Grid (Replacing one big frame box) -->
                <div class="bw-info-section-wrapper">
                    <div class="bw-section-heading">
                        <span class="bw-section-badge">IDENTITAS & STANDAR INDUSTRI</span>
                        <h3>Profil & Sertifikasi Ekosistem</h3>
                    </div>
                    <div class="bw-cards-grid">
                        <div class="bw-single-card">
                            <div class="bw-card-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div>
                                <div class="bw-card-label">Nama Ekosistem Resmi</div>
                                <div class="bw-card-value">Next Young Tech</div>
                            </div>
                        </div>

                        <div class="bw-single-card">
                            <div class="bw-card-icon">
                                <i class="fa-solid fa-bullseye"></i>
                            </div>
                            <div>
                                <div class="bw-card-label">Fokus Layanan & Bisnis</div>
                                <div class="bw-card-value">Custom Web Application, UI/UX Corporate & Joki Coding</div>
                            </div>
                        </div>

                        <div class="bw-single-card">
                            <div class="bw-card-icon">
                                <i class="fa-solid fa-microchip"></i>
                            </div>
                            <div>
                                <div class="bw-card-label">Standar Arsitektur Sistem</div>
                                <div class="bw-card-value">Laravel 11, Three.js 3D WebGL & High-Performance Cloud</div>
                            </div>
                        </div>

                        <div class="bw-single-card">
                            <div class="bw-card-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <div class="bw-card-label">Standar Keamanan & Kualitas</div>
                                <div class="bw-card-value">Enterprise-Grade SSL/TLS Encryption & 100% Clean Code</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bw-text-content">
                    <span style="font-size: 12px; font-weight: 800; color: var(--primary); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 12px; display: block;">Kolaborasi Tingkat Tinggi</span>
                    <h2>Kualitas Industri Profesional</h2>
                    <p>Di balik sistem backend yang andal dan antarmuka pengguna yang premium, terdapat tim ahli yang berdedikasi. Kami menggabungkan keterampilan teknis tingkat lanjut dengan pemahaman estetika yang mendalam.</p>
                    <p>Dipimpin langsung oleh tim kepemimpinan inti: <strong>Arya Fawwaz Septyan</strong>, <strong>Nazmi Dwiputra Effendi</strong>, dan <strong>Fadhlan</strong>, komitmen kami adalah menghasilkan karya digital yang solid, terukur, dan mampu mengangkat kredibilitas institusi Anda di mata dunia.</p>
                    
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

            <!-- Management & Executive Leadership Section (Separate Member Cards) -->
            <div class="bw-mgmt-section">
                <div class="bw-mgmt-heading">
                    <span class="bw-mgmt-badge">STRUKTUR EKSEKUTIF INTI</span>
                    <h3>Kepemimpinan & Manajemen</h3>
                </div>
                <div class="bw-mgmt-grid">
                    <div class="bw-mgmt-card">
                        <div class="bw-mgmt-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="bw-mgmt-name">Nazmi Dwiputra Effendi</div>
                        <div class="bw-mgmt-role">OPERATIONS DIRECTOR</div>
                        <p class="bw-mgmt-desc">Mengawasi eksekusi operasional, manajemen proyek klien, dan kepatuhan standar kualitas layanan ekosistem.</p>
                    </div>

                    <div class="bw-mgmt-card">
                        <div class="bw-mgmt-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="bw-mgmt-name">Arya Fawwaz Septyan</div>
                        <div class="bw-mgmt-role">PRESIDENT DIRECTOR / FOUNDER</div>
                        <p class="bw-mgmt-desc">Memimpin arah strategis, visi ekosistem, dan kemitraan teknologi global Next Young Tech di seluruh Indonesia.</p>
                    </div>

                    <div class="bw-mgmt-card">
                        <div class="bw-mgmt-icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="bw-mgmt-name">Fadhlan</div>
                        <div class="bw-mgmt-role">TECHNICAL DIRECTOR</div>
                        <p class="bw-mgmt-desc">Memimpin inovasi arsitektur sistem, rekayasa perangkat lunak berkinerja tinggi, dan infrastruktur cloud.</p>
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
