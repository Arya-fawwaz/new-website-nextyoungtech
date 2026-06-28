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

            <!-- Swiper Container Wrapper -->
            <div class="features-slider-wrapper" style="position: relative; padding: 0 40px;">
                <div class="swiper features-swiper" style="margin-top: 50px; padding-bottom: 60px;">
                    <div class="swiper-wrapper">
                    <!-- Feature 1 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(14, 165, 233, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--primary); box-shadow: 0 10px 25px var(--primary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-solid fa-cubes" style="font-size: 32px; color: var(--primary);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Animasi 3D Imersif (WebGL)</h3>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(79, 70, 229, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--secondary); box-shadow: 0 10px 25px var(--secondary-glow); background: rgba(79, 70, 229, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-solid fa-gauge-high" style="font-size: 32px; color: var(--secondary);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Kinerja Kecepatan Tinggi (FPS Tinggi)</h3>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(0, 242, 254, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--accent); box-shadow: 0 10px 25px var(--accent-glow); background: rgba(0, 242, 254, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-solid fa-shield-halved" style="font-size: 32px; color: var(--accent);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Sistem Keamanan Laravel Core</h3>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(14, 165, 233, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--primary); box-shadow: 0 10px 25px var(--primary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-solid fa-magnifying-glass-chart" style="font-size: 32px; color: var(--primary);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Optimasi SEO & Ramah Google</h3>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(79, 70, 229, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--secondary); box-shadow: 0 10px 25px var(--secondary-glow); background: rgba(79, 70, 229, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-solid fa-mobile-screen-button" style="font-size: 32px; color: var(--secondary);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Desain Responsif & Adaptif</h3>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="swiper-slide">
                        <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100%; border: 1px solid rgba(0, 242, 254, 0.15);">
                            <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--accent); box-shadow: 0 10px 25px var(--accent-glow); background: rgba(0, 242, 254, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                                <i class="fa-brands fa-whatsapp" style="font-size: 32px; color: var(--accent);"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 0px; color: var(--text-main);">Integrasi WhatsApp Consultation</h3>
                        </div>
                    </div>
                </div>
                
                <!-- Custom Swiper Navigation -->
                <div class="swiper-button-prev features-prev desktop-nav-arrow"><i class="fa-solid fa-chevron-left" style="font-size: 20px;"></i></div>
                <div class="swiper-button-next features-next desktop-nav-arrow"><i class="fa-solid fa-chevron-right" style="font-size: 20px;"></i></div>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-nav-container">
                <div class="swiper-pagination features-pagination"></div>
            </div>
        </div>
    </section>

@endsection
