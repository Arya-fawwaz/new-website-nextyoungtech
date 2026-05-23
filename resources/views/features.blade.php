@extends('layouts.app')

@section('title', 'Fitur Utama')

@section('content')

    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">FITUR UNGGULAN</span>
                <h2 class="section-title">Fitur Teknologi Kelas Dunia</h2>
                <p class="section-desc">Next Young Tech Technology menghadirkan standar fitur premium tercanggih untuk memastikan kesuksesan digital bisnis Anda tanpa batas.</p>
            </div>

            <div class="features-grid" style="margin-top: 50px; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                <!-- Feature 1 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_3d_webgl.png" alt="Animasi 3D Imersif (WebGL)" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--primary); box-shadow: 0 0 15px var(--primary-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-cubes"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Animasi 3D Imersif (WebGL)</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Menggunakan Three.js & WebGL yang sangat dioptimalkan untuk merender elemen interaktif 3D di browser pada 60 FPS demi menarik atensi klien secara instan.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_speed.png" alt="Kinerja Kecepatan Tinggi (FPS Tinggi)" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--secondary); box-shadow: 0 0 15px var(--secondary-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Kinerja Kecepatan Tinggi (FPS Tinggi)</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Optimasi kompresi kode, lazy-loading cerdas, dan visual rendering asinkron untuk memastikan waktu pemuatan web yang super cepat kurang dari satu detik.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_secure.png" alt="Sistem Keamanan Laravel Core" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--accent); box-shadow: 0 0 15px var(--accent-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Sistem Keamanan Laravel Core</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Proteksi data berlapis dari serangan injeksi SQL, Cross-Site Scripting (XSS), dan pemalsuan CSRF menggunakan standar arsitektur terbaik framework Laravel 11.
                        </p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_seo.png" alt="Optimasi SEO & Ramah Google" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--primary); box-shadow: 0 0 15px var(--primary-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-magnifying-glass-chart"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Optimasi SEO & Ramah Google</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Struktur markup HTML5 semantik dan integrasi metadata dinamis untuk mendongkrak peringkat visibilitas pencarian website Anda di mesin pencari Google secara organik.
                        </p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_responsive.png" alt="Desain Responsif & Adaptif" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--secondary); box-shadow: 0 0 15px var(--secondary-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Desain Responsif & Adaptif</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Layout fluid elastis yang dirancang khusus agar tampil memukau dengan transisi proporsional di semua resolusi, mulai dari smartphone seluler hingga layar desktop 4K.
                        </p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="glass-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 160px; overflow: hidden; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/feature_whatsapp.png" alt="Integrasi WhatsApp Consultation" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div style="padding: 24px;">
                        <div class="feature-icon" style="margin-top: -54px; position: relative; z-index: 2; border: 2px solid var(--accent); box-shadow: 0 0 15px var(--accent-glow); background: var(--bg-dark);">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 18px; font-weight: 700; margin-top: 10px; margin-bottom: 12px; color: var(--text-main);">Integrasi WhatsApp Consultation</h3>
                        <p class="feature-desc" style="font-size: 13px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin: 0;">
                            Tanggapan instan terpadu yang memformat isian formulir estimasi biaya dan mengirimkannya langsung ke panel konsultasi WhatsApp admin dalam hitungan detik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
