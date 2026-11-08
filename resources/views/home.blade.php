@extends('layouts.app')

@section('title', 'Next Young Tech | Joki Website & Joki Tugas Coding Premium')

@section('content')

    <!-- 3D Interactive Hero Section -->
    <section class="hero-section" style="position: relative; overflow: hidden; z-index: 1; background: #000;">
        <!-- Dynamic Hero Video Background -->
        <div id="hero-video-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; display: flex; align-items: center; justify-content: center;">
            <video autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;">
                <source src="{{ asset('uhd_25fps.mp4') }}" type="video/mp4">
            </video>
            <div class="hero-video-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6);"></div>
        </div>
        <!-- Dynamic Hero Video Background -->
        <div class="container" style="position: relative; z-index: 2;">
            <div class="hero-content">
                <div class="hero-badge">
                    <span></span> PENGALAMAN WEB 3D IMERSIF
                </div>
                <h1 class="hero-title">
                    Kami Merancang <br>
                    <span class="glow-text">Mahakarya Web 3D</span>
                </h1>
                <p class="hero-desc">
                    Next Young Tech Technology mengubah visi bisnis Anda menjadi kenyataan digital mewah kelas dunia. Kami memadukan arsitektur Laravel yang kuat dengan visualisasi 3D interaktif yang memukau dan berkecepatan tinggi.
                </p>
                <div class="hero-btns">
                    @auth
                        <a href="{{ route('quotation.index') }}" class="btn-primary">
                            <i class="fa-solid fa-wand-magic-sparkles"></i> Estimasi Biaya
                        </a>
                        <a href="{{ route('services') }}" class="btn-secondary">
                            <i class="fa-solid fa-briefcase"></i> Lihat Layanan
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary" style="background: var(--primary); box-shadow: 0 0 15px var(--primary-glow);">
                            <i class="fa-solid fa-right-to-bracket"></i> Masuk Ke Portal
                        </a>
                        <a href="https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20untuk%20konsultasi%20mengenai%20pembuatan%20website%20custom%20saya." target="_blank" class="btn-secondary">
                            <i class="fa-brands fa-whatsapp"></i> Konsultasi Gratis
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================
         OUR PARTNERS SECTION (Mencolok & High-Impact)
         ========================================================== -->
    <section class="section partners-section" id="partners" style="padding: 70px 0; position: relative; background: radial-gradient(circle at 50% 20%, rgba(255, 107, 0, 0.05) 0%, rgba(14, 165, 233, 0.04) 50%, transparent 80%); border-top: 1px solid var(--border-color); overflow: hidden;">
        <!-- Ambient decorative glow -->
        <div style="position: absolute; top: -120px; left: 50%; transform: translateX(-50%); width: 700px; height: 260px; background: radial-gradient(ellipse, rgba(255, 107, 0, 0.2), rgba(14, 165, 233, 0.15), transparent 70%); filter: blur(60px); pointer-events: none; z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <!-- Section Header (Mencolok) -->
            <div class="section-header" style="text-align: center; margin-bottom: 45px;">
                <div class="partner-top-badge" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, rgba(255, 107, 0, 0.2), rgba(255, 140, 0, 0.1)); border: 1.5px solid #ff7700; color: #ff6b00; font-weight: 800; padding: 7px 20px; border-radius: 999px; letter-spacing: 2px; font-size: 12px; text-transform: uppercase; box-shadow: 0 0 25px rgba(255, 107, 0, 0.35); margin-bottom: 16px;">
                    <i class="fa-solid fa-handshake" style="color: #ff7700; font-size: 14px;"></i>
                    <span>STRATEGIC PARTNERSHIP</span>
                </div>
                
                <h2 class="section-title" style="font-size: clamp(34px, 5.5vw, 52px); font-weight: 900; letter-spacing: -1.5px; line-height: 1.15; margin-bottom: 16px;">
                    <span style="background: linear-gradient(135deg, #ff4500 0%, #ff8c00 40%, #0ea5e9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; filter: drop-shadow(0 4px 20px rgba(255, 107, 0, 0.35));">
                        OUR PARTNERS
                    </span>
                </h2>
                
                <p class="section-desc" style="max-width: 680px; margin: 0 auto; font-size: 16px; color: var(--text-muted); line-height: 1.65;">
                    Next Young Tech bangga dipercaya oleh korporasi industri nasional dan internasional. Kami berkolaborasi menghadirkan arsitektur website enterprise yang andal, berkecepatan tinggi, dan berkelas dunia.
                </p>
            </div>

            <!-- Featured Partner Card: PT TRSJ INTERNATIONAL INDONESIA -->
            <div class="partner-showcase-container" style="max-width: 1020px; margin: 0 auto;">
                <div class="partner-card-featured" style="background: linear-gradient(145deg, #070c18 0%, #0c1529 60%, #111d38 100%); border: 2px solid rgba(255, 107, 0, 0.4); border-radius: 26px; padding: 38px 42px; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3), 0 0 40px rgba(255, 107, 0, 0.2); position: relative; overflow: hidden; display: grid; grid-template-columns: 1fr 1.3fr; gap: 36px; align-items: center;">
                    
                    <!-- Glow effect corner -->
                    <div style="position: absolute; top: -60px; right: -60px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255, 107, 0, 0.35), transparent 70%); filter: blur(35px); pointer-events: none;"></div>
                    <div style="position: absolute; bottom: -60px; left: -60px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(14, 165, 233, 0.3), transparent 70%); filter: blur(35px); pointer-events: none;"></div>

                    <!-- Left: Prominent Logo Display with Dark Background Shield -->
                    <div class="partner-logo-shield" style="display: flex; flex-direction: column; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.03); border: 1.5px solid rgba(255, 255, 255, 0.1); border-radius: 22px; padding: 34px 26px; text-align: center; position: relative; backdrop-filter: blur(12px); box-shadow: inset 0 0 25px rgba(255, 255, 255, 0.02);">
                        
                        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(16, 185, 129, 0.18); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; font-size: 11px; font-weight: 800; padding: 5px 14px; border-radius: 20px; margin-bottom: 22px; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-circle-check"></i> VERIFIED ENTERPRISE PARTNER
                        </div>

                        <!-- TRSJ Logo -->
                        <div class="trsj-logo-wrapper" style="width: 100%; display: flex; align-items: center; justify-content: center; min-height: 95px; padding: 10px 0;">
                            <img src="{{ asset('images/logo_transparent_4k.webp') }}" alt="Logo PT TRSJ International Indonesia - TR Digital Construction" style="max-width: 260px; width: 92%; height: auto; object-fit: contain; filter: drop-shadow(0 4px 18px rgba(255, 107, 0, 0.4)); transition: transform 0.3s ease;">
                        </div>

                        <div style="margin-top: 20px; border-top: 1px dashed rgba(255, 255, 255, 0.15); padding-top: 14px; width: 100%;">
                            <span style="font-size: 13.5px; font-weight: 800; color: #cbd5e1; letter-spacing: 0.8px;">TR DIGITAL CONSTRUCTION</span>
                            <div style="font-size: 12px; color: #94a3b8; margin-top: 3px;">Tangren Shujian (唐人数建)</div>
                        </div>
                    </div>

                    <!-- Right: Partner Details & Collaboration Highlights -->
                    <div style="color: #ffffff; display: flex; flex-direction: column; gap: 18px;">
                        <div>
                            <span style="font-size: 12.5px; font-weight: 800; color: #ff8c00; letter-spacing: 1.5px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-building-columns"></i> Mitra Strategis Berskala Internasional
                            </span>
                            <h3 style="font-size: 28px; font-weight: 900; color: #ffffff; margin: 8px 0 10px 0; line-height: 1.25; font-family: var(--font-heading);">
                                PT TRSJ International Indonesia
                            </h3>
                            <p style="font-size: 15px; color: #cbd5e1; line-height: 1.7; margin: 0;">
                                Korporasi terkemuka di bidang konstruksi infrastruktur telekomunikasi dan rekayasa digital berskala global. Next Young Tech dipercaya membangun arsitektur website korporat interaktif dan solusi sistem terintegrasi untuk mendukung pertumbuhan ekspansi PT TRSJ.
                            </p>
                        </div>

                        <!-- Highlights tags -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                            <span style="background: rgba(14, 165, 233, 0.18); border: 1px solid rgba(14, 165, 233, 0.35); color: #38bdf8; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 8px; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-code"></i> Arsitektur Web Enterprise
                            </span>
                            <span style="background: rgba(255, 107, 0, 0.18); border: 1px solid rgba(255, 107, 0, 0.35); color: #fb923c; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 8px; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-tower-broadcast"></i> Telekomunikasi & Sipil
                            </span>
                            <span style="background: rgba(16, 185, 129, 0.18); border: 1px solid rgba(16, 185, 129, 0.35); color: #34d399; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 8px; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-bolt"></i> Ultra Fast & Secure
                            </span>
                        </div>

                        <!-- CTA to News -->
                        <div style="margin-top: 6px; display: flex; flex-wrap: wrap; align-items: center; gap: 14px;">
                            <a href="{{ route('news') }}" class="btn-primary" style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #ff5500 0%, #ff8c00 100%); color: #ffffff; padding: 13px 26px; border-radius: 12px; font-size: 14px; font-weight: 800; text-decoration: none; box-shadow: 0 6px 20px rgba(255, 107, 0, 0.45); transition: transform 0.25s ease;">
                                <i class="fa-solid fa-newspaper"></i>
                                <span>Baca Liputan Berita Kerjasama</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <span style="font-size: 12.5px; color: #94a3b8; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-calendar-day" style="color: #ff8c00;"></i> Rilis: 8 November 2026
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Testimonials Section (Infinite Marquee) -->
    <section class="section testimonials-section" style="background: rgba(255, 255, 255, 0.01); border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); overflow: hidden; padding: 60px 0;">
        <div class="container">
            <div class="section-header" style="margin-bottom: 40px;">
                <span class="section-badge" style="background: #0f172a; border-color: #0f172a; color: #ffffff; font-weight: 800; padding: 6px 14px; border-radius: 6px; letter-spacing: 1px;">TESTIMONI KLIEN</span>
                <h2 class="section-title">Apa Kata Mereka Tentang Kami?</h2>
                <p class="section-desc">Kepuasan klien adalah kebanggaan terbesar kami. Berikut ulasan bintang 5 dan komentar nyata dari klien kami.</p>
                @auth
                    <div style="margin-top: 24px; text-align: center;">
                        <a href="{{ route('review.create') }}" class="btn-primary" style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; padding: 10px 24px; background: var(--primary); box-shadow: 0 0 15px var(--primary-glow);">
                            <i class="fa-solid fa-pen-to-square"></i> Tulis Ulasan Anda
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Testimonials Swiper -->
        <div class="testimonials-slider-wrapper" style="position: relative; max-width: 1200px; margin: 0 auto; padding: 0 40px;">
            @if(isset($ulasan) && count($ulasan) > 0)
                <div class="swiper testimonials-swiper" style="padding-bottom: 50px;">
                    <div class="swiper-wrapper">
                        @foreach($ulasan as $review)
                            <div class="swiper-slide" style="display: flex; justify-content: center; height: auto;">
                                <div class="testimonial-card" style="width: 100%; max-width: 440px; display: flex; flex-direction: column; justify-content: space-between; text-align: left; height: 100%;">
                                    
                                    <!-- Header: Stars and Rating Badge -->
                                    <div>
                                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px;">
                                            <!-- Star Rating -->
                                            <div style="display: flex; gap: 6px; color: #ffb703; filter: drop-shadow(0 2px 6px rgba(255, 183, 3, 0.4));">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->bintang)
                                                        <i class="fa-solid fa-star" style="font-size: 18px;"></i>
                                                    @else
                                                        <i class="fa-regular fa-star" style="font-size: 18px;"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span style="font-size: 11px; font-weight: 800; color: #ffb703; background: rgba(255, 183, 3, 0.12); padding: 5px 12px; border-radius: 20px; border: 1px solid rgba(255, 183, 3, 0.3); letter-spacing: 0.5px;">{{ number_format($review->bintang, 1) }} / 5.0</span>
                                        </div>
                                        
                                        <!-- Comment Text (LARGE, BOLD, MENCOLOK) -->
                                        <p class="testimonial-text">
                                            "{{ $review->komentar }}"
                                        </p>
                                    </div>

                                    <!-- Footer: User Info -->
                                    <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid var(--border-color); padding-top: 20px; margin-top: auto;">
                                        @php
                                            $userAvatarUrl = $review->pengguna ? $review->pengguna->foto_profil_url : $review->foto_profil_url;
                                            $userName = $review->pengguna && $review->pengguna->nama ? $review->pengguna->nama : $review->nama;
                                            $hasAvatar = !empty($userAvatarUrl);
                                        @endphp
                                        
                                        @if($hasAvatar)
                                            <img src="{{ $userAvatarUrl }}" alt="{{ $userName }}" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary); box-shadow: 0 0 12px var(--primary-glow);">
                                        @else
                                            <div style="width: 48px; height: 48px; border-radius: 50%; background: rgba(37, 99, 235, 0.08); display: flex; align-items: center; justify-content: center; border: 1px solid rgba(37, 99, 235, 0.25);">
                                                <i class="fa-solid fa-user-tie" style="font-size: 20px; color: var(--primary);"></i>
                                            </div>
                                        @endif

                                        <div>
                                            <h4 class="testimonial-author-name">{{ $userName }}</h4>
                                            <span style="font-size: 12px; font-weight: 600; color: var(--primary); display: inline-flex; align-items: center; gap: 5px;"><i class="fa-solid fa-circle-check"></i> Klien Terverifikasi Next Young Tech</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Custom Swiper Navigation -->
                <div class="swiper-button-prev testimonials-prev desktop-nav-arrow"><i class="fa-solid fa-chevron-left" style="font-size: 20px;"></i></div>
                <div class="swiper-button-next testimonials-next desktop-nav-arrow"><i class="fa-solid fa-chevron-right" style="font-size: 20px;"></i></div>
            @else
                <div style="color: var(--text-dark); text-align: center; width: 100%; padding: 20px;">Belum ada ulasan klien.</div>
            @endif
        </div>
    </section>

    <!-- Custom CSS for Testimonials Slider -->
    <style>
        .testimonials-slider-wrapper .swiper-button-next,
        .testimonials-slider-wrapper .swiper-button-prev {
            width: 45px;
            height: 45px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            color: var(--text-main);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .testimonials-slider-wrapper .swiper-button-next:hover,
        .testimonials-slider-wrapper .swiper-button-prev:hover {
            background: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 8px 20px var(--primary-glow);
        }

        .testimonials-slider-wrapper .swiper-button-next::after,
        .testimonials-slider-wrapper .swiper-button-prev::after {
            display: none;
        }

        .testimonial-card {
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-top: 3px solid var(--primary) !important;
            border-radius: 24px !important;
            padding: 36px 32px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        html[data-theme="dark"] .testimonial-card {
            background: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            border-top-color: var(--primary) !important;
        }
        .testimonial-card:hover {
            transform: translateY(-6px) !important;
            border-color: rgba(37, 99, 235, 0.45) !important;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.12) !important;
        }
        .testimonial-text {
            font-size: 18px !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            line-height: 1.55 !important;
            margin-bottom: 28px !important;
            letter-spacing: -0.2px !important;
            font-style: normal !important;
        }
        html[data-theme="dark"] .testimonial-text {
            color: var(--text-main) !important;
        }
        .testimonial-author-name {
            font-size: 16px !important;
            font-weight: 800 !important;
            color: #0f172a !important;
            margin: 0 0 4px 0 !important;
        }
        html[data-theme="dark"] .testimonial-author-name {
            color: var(--text-main) !important;
        }
        @media (max-width: 640px) {
            .testimonial-card {
                padding: 28px 24px !important;
            }
            .testimonial-text {
                font-size: 16px !important;
            }
        }

        @media (max-width: 768px) {
            .testimonials-slider-wrapper {
                padding: 0 15px !important;
            }
            .desktop-nav-arrow {
                display: none !important;
            }
        }

        /* Partners Section Styles */
        .partner-card-featured {
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        .partner-card-featured:hover {
            transform: translateY(-5px) !important;
            border-color: rgba(255, 107, 0, 0.75) !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.35), 0 0 50px rgba(255, 107, 0, 0.35) !important;
        }
        .partner-card-featured:hover .trsj-logo-wrapper img {
            transform: scale(1.05);
        }
        @media (max-width: 850px) {
            .partner-card-featured {
                grid-template-columns: 1fr !important;
                padding: 28px 22px !important;
                gap: 26px !important;
            }
            .partner-logo-shield {
                padding: 24px 18px !important;
            }
        }

        /* Style for Interactive Star Rating */
        .star-rating input:checked ~ .star-label,
        .star-rating .star-label:hover,
        .star-rating .star-label:hover ~ .star-label {
            color: #ffb703 !important;
            text-shadow: 0 0 10px rgba(255, 183, 3, 0.8);
        }

        /* Theme specific hero backgrounds */
        html[data-theme="dark"] #hero-video-bg {
            opacity: 1 !important;
        }

        html[data-theme="light"] #hero-video-bg {
            opacity: 1 !important;
        }
    </style>

    <!-- Joki Website & Tugas Coding Section -->
    <section class="section joki-seo-section" style="background: rgba(255, 255, 255, 0.02); border-top: 1px solid var(--border-color); padding: 80px 0;">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">JOKI CODING & WEB DEVELOPMENT</span>
                <h2 class="section-title">Joki Website & Tugas Programming Profesional</h2>
                <p class="section-desc">Solusi joki coding terpercaya dengan jaminan pengerjaan rapi, penjelasan lengkap, dan harga transparan oleh tim developer profesional.</p>
            </div>

            <div class="features-grid" style="margin-top: 40px;">
                <!-- Card 1: Joki Pembuatan Website -->
                <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: left; display: flex; flex-direction: column; border: 1px solid transparent; height: 100%;">
                    <div class="feature-icon" style="width: 60px; height: 60px; border-radius: 16px; border: 2px solid var(--primary); box-shadow: 0 5px 15px var(--primary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fa-solid fa-code" style="font-size: 24px; color: var(--primary);"></i>
                    </div>
                    <h3 class="feature-title" style="font-size: 18px; font-weight: 800; margin-bottom: 12px; color: var(--text-main);">Joki Pembuatan Website</h3>
                    <p class="feature-desc" style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0; flex-grow: 1;">
                        Butuh joki website custom? Kami mengerjakan website e-commerce, portal berita, landing page premium, sistem informasi, hingga web berbasis Laravel, React, Vue, PHP, dan Node.js dengan kode bersih dan performa maksimal.
                    </p>
                </div>

                <!-- Card 2: Joki Tugas Coding Kuliah -->
                <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: left; display: flex; flex-direction: column; border: 1px solid transparent; height: 100%;">
                    <div class="feature-icon" style="width: 60px; height: 60px; border-radius: 16px; border: 2px solid var(--secondary); box-shadow: 0 5px 15px var(--secondary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 24px; color: var(--secondary);"></i>
                    </div>
                    <h3 class="feature-title" style="font-size: 18px; font-weight: 800; margin-bottom: 12px; color: var(--text-main);">Joki Tugas Programming</h3>
                    <p class="feature-desc" style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0; flex-grow: 1;">
                        Menyelesaikan joki tugas kuliah programming Anda dari tingkat dasar hingga lanjut. Kami menguasai berbagai bahasa pemrograman seperti Python, Java, C++, PHP, JavaScript, SQL, Go, dan Dart lengkap dengan dokumentasi/laporan.
                    </p>
                </div>

                <!-- Card 3: Joki Perbaikan & Integrasi -->
                <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: left; display: flex; flex-direction: column; border: 1px solid transparent; height: 100%;">
                    <div class="feature-icon" style="width: 60px; height: 60px; border-radius: 16px; border: 2px solid var(--accent); box-shadow: 0 5px 15px var(--accent-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fa-solid fa-bug-slash" style="font-size: 24px; color: var(--accent);"></i>
                    </div>
                    <h3 class="feature-title" style="font-size: 18px; font-weight: 800; margin-bottom: 12px; color: var(--text-main);">Joki Debugging & Laravel</h3>
                    <p class="feature-desc" style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0; flex-grow: 1;">
                        Mengalami error memusingkan pada proyek web Anda? Joki coding kami siap membantu melakukan debugging, perbaikan sistem keamanan, optimasi performa database MySQL/Postgres, hingga penyempurnaan UI/UX website.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Event / Latest Project Section -->
    <section class="section latest-project-section" style="background: rgba(255, 255, 255, 0.02); border-top: 1px solid var(--border-color); padding: 80px 0;">
        <div class="container">
            <div class="section-header" style="margin-bottom: 50px;">
                <span class="section-badge">NEWS & EVENT</span>
                <h2 class="section-title">Project Rilis Terbaru Kami</h2>
                <p class="section-desc">Ikuti perkembangan project inovatif dan rilis terbaru dari tim developer Next Young Tech Studio.</p>
            </div>

            <div class="glass-card project-showcase-card" style="padding: 0; overflow: hidden; border: 1px solid transparent; display: flex; flex-wrap: wrap;">
                <!-- Image Side -->
                <div style="flex: 1 1 400px; position: relative; min-height: 350px;">
                    <img src="https://the-road-game.vercel.app/hero_corridor.png" alt="THE ROAD Game" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                    <div style="position: absolute; top: 20px; right: 20px; background: rgba(0,0,0,0.8); color: #fff; padding: 6px 14px; border-radius: 8px; font-size: 12px; font-weight: bold; border: 1px solid #ff0000; box-shadow: 0 0 15px rgba(255,0,0,0.5);">
                        <i class="fa-solid fa-gamepad"></i> ROBLOX HORROR GAME
                    </div>
                </div>
                <!-- Content Side -->
                <div style="flex: 1 1 400px; padding: 40px; display: flex; flex-direction: column; justify-content: center; background: rgba(255, 255, 255, 0.02);">
                    <h3 style="font-size: 26px; font-weight: 800; margin-bottom: 16px; color: var(--text-main);">THE ROAD - Co-Op Multiplayer Terror</h3>
                    <p style="font-size: 15px; color: var(--text-muted); line-height: 1.7; margin-bottom: 24px;">
                        Next Young Tech Studio secara resmi merilis mahakarya game horor 3D di platform Roblox: <strong>THE ROAD</strong>. 
                        Rasakan kengerian berjaga shift malam di minimarket terpencil. Tepat pukul 02:00 AM, entitas gelap yang disebut <em>The Midnight Shoppers</em> mulai berdatangan.
                        Selesaikan tugas kasir, pantau CCTV, hemat baterai senter, dan patuhi buku aturan jika Anda ingin selamat hingga fajar!
                    </p>
                    <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: auto;">
                        <a href="https://the-road-game.vercel.app" target="_blank" class="btn-primary" style="background: var(--primary); box-shadow: 0 0 15px var(--primary-glow); border: none;">
                            <i class="fa-solid fa-globe"></i> Kunjungi Website 3D
                        </a>
                        <a href="https://www.roblox.com/id/games/106161713513894/THE-ROAD" target="_blank" class="btn-secondary" style="border: 1px solid var(--border-color);">
                            <i class="fa-solid fa-play"></i> Mainkan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section faq-section" style="border-top: 1px solid var(--border-color); padding: 80px 0;">
        <div class="container" style="max-width: 800px;">
            <div class="section-header" style="margin-bottom: 50px;">
                <span class="section-badge">FAQ</span>
                <h2 class="section-title">Pertanyaan Umum (FAQ) Joki Website</h2>
                <p class="section-desc">Punya pertanyaan seputar layanan joki coding dan pembuatan website? Temukan jawabannya di bawah ini.</p>
            </div>

            <div class="faq-accordion-wrapper">
                <!-- FAQ Item 1 -->
                <div class="faq-item glass-card" style="margin-bottom: 16px; padding: 20px 24px; border-radius: 12px; transition: all 0.3s ease; border: 1px solid var(--border-color); cursor: pointer;" onclick="toggleFaq(this)">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 15px; font-weight: 800; margin: 0; color: var(--text-main);">Apakah Next Young Tech melayani joki website dan joki tugas coding?</h3>
                        <i class="fa-solid fa-chevron-down faq-arrow" style="font-size: 14px; transition: transform 0.3s ease; color: var(--text-main);"></i>
                    </div>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: all 0.3s cubic-bezier(0, 1, 0, 1); opacity: 0; margin-top: 0;">
                        <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 15px 0 0 0;">
                            Ya, benar sekali. Next Young Tech menyediakan jasa joki website premium dan joki tugas coding profesional. Kami membantu mahasiswa dan bisnis menyelesaikan pembuatan website custom, CRUD Laravel, landing page, sistem informasi, hingga tugas kuliah programming dengan kode yang bersih dan dokumentasi lengkap.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item glass-card" style="margin-bottom: 16px; padding: 20px 24px; border-radius: 12px; transition: all 0.3s ease; border: 1px solid var(--border-color); cursor: pointer;" onclick="toggleFaq(this)">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 15px; font-weight: 800; margin: 0; color: var(--text-main);">Bahasa pemrograman apa saja yang didukung oleh joki coding Next Young Tech?</h3>
                        <i class="fa-solid fa-chevron-down faq-arrow" style="font-size: 14px; transition: transform 0.3s ease; color: var(--text-main);"></i>
                    </div>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: all 0.3s cubic-bezier(0, 1, 0, 1); opacity: 0; margin-top: 0;">
                        <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 15px 0 0 0;">
                            Tim developer joki coding kami menguasai berbagai bahasa pemrograman populer meliputi PHP (termasuk Framework Laravel), Python (Django/Flask), JavaScript (Node.js, React, Vue, Next.js), Java, C++, HTML/CSS, SQL (MySQL, PostgreSQL), Go, dan Dart (Flutter).
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item glass-card" style="margin-bottom: 16px; padding: 20px 24px; border-radius: 12px; transition: all 0.3s ease; border: 1px solid var(--border-color); cursor: pointer;" onclick="toggleFaq(this)">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 15px; font-weight: 800; margin: 0; color: var(--text-main);">Berapa tarif pengerjaan joki website / joki tugas coding?</h3>
                        <i class="fa-solid fa-chevron-down faq-arrow" style="font-size: 14px; transition: transform 0.3s ease; color: var(--text-main);"></i>
                    </div>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: all 0.3s cubic-bezier(0, 1, 0, 1); opacity: 0; margin-top: 0;">
                        <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 15px 0 0 0;">
                            Tarif joki website dan joki tugas coding dihitung berdasarkan tingkat kerumitan logika sistem, tenggat waktu pengerjaan, dan jumlah fitur. Untuk perkiraan instan, Anda bisa masuk ke portal kami dan menggunakan fitur **Kalkulator Estimasi Biaya** secara gratis.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item glass-card" style="margin-bottom: 16px; padding: 20px 24px; border-radius: 12px; transition: all 0.3s ease; border: 1px solid var(--border-color); cursor: pointer;" onclick="toggleFaq(this)">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 15px; font-weight: 800; margin: 0; color: var(--text-main);">Bagaimana jaminan keamanan data dan pengerjaan joki tugas coding?</h3>
                        <i class="fa-solid fa-chevron-down faq-arrow" style="font-size: 14px; transition: transform 0.3s ease; color: var(--text-main);"></i>
                    </div>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: all 0.3s cubic-bezier(0, 1, 0, 1); opacity: 0; margin-top: 0;">
                        <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 15px 0 0 0;">
                            Kami menjamin kerahasiaan data pribadi klien 100%. Pengerjaan joki tugas coding dikerjakan secara original tanpa plagiarisme, lolos pengecekan fungsionalitas, serta kami menyediakan sesi penjelasan kode/revisi gratis jika dibutuhkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion JS Script & CSS -->
    <style>
        .faq-item:hover {
            border-color: var(--primary) !important;
            box-shadow: 0 5px 15px var(--primary-glow);
            transform: translateY(-2px);
        }
        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: var(--primary) !important;
        }
        .faq-item.active {
            border-color: var(--primary) !important;
        }
    </style>

    <script>
        function toggleFaq(element) {
            const answer = element.querySelector('.faq-answer');
            const arrow = element.querySelector('.faq-arrow');
            const isActive = element.classList.contains('active');
            
            // Close all other FAQs first
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== element) {
                    item.classList.remove('active');
                    const otherAnswer = item.querySelector('.faq-answer');
                    otherAnswer.style.maxHeight = '0';
                    otherAnswer.style.opacity = '0';
                }
            });

            if (isActive) {
                element.classList.remove('active');
                answer.style.maxHeight = '0';
                answer.style.opacity = '0';
            } else {
                element.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.opacity = '1';
            }
        }
    </script>

    <!-- FAQ Page Structured Data JSON-LD for Search Engine -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "FAQPage",
      "mainEntity": [{
        "@@type": "Question",
        "name": "Apakah Next Young Tech melayani joki website dan joki tugas coding?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Ya, benar sekali. Next Young Tech menyediakan jasa joki website premium dan joki tugas coding profesional. Kami membantu mahasiswa dan bisnis menyelesaikan pembuatan website custom, CRUD Laravel, landing page, sistem informasi, hingga tugas kuliah programming dengan kode yang bersih dan dokumentasi lengkap."
        }
      }, {
        "@@type": "Question",
        "name": "Bahasa pemrograman apa saja yang didukung oleh joki coding Next Young Tech?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Tim developer joki coding kami menguasai berbagai bahasa pemrograman populer meliputi PHP (termasuk Framework Laravel), Python (Django/Flask), JavaScript (Node.js, React, Vue, Next.js), Java, C++, HTML/CSS, SQL (MySQL, PostgreSQL), Go, dan Dart (Flutter)."
        }
      }, {
        "@@type": "Question",
        "name": "Berapa tarif pengerjaan joki website / joki tugas coding?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Tarif joki website dan joki tugas coding dihitung berdasarkan tingkat kerumitan logika sistem, tenggat waktu pengerjaan, dan jumlah fitur. Untuk perkiraan instan, Anda bisa masuk ke portal kami dan menggunakan fitur Kalkulator Estimasi Biaya secara gratis."
        }
      }, {
        "@@type": "Question",
        "name": "Bagaimana jaminan keamanan data dan pengerjaan joki tugas coding?",
        "acceptedAnswer": {
          "@@type": "Answer",
          "text": "Kami menjamin kerahasiaan data pribadi klien 100%. Pengerjaan joki tugas coding dikerjakan secara original tanpa plagiarisme, lolos pengecekan fungsionalitas, serta kami menyediakan sesi penjelasan kode/revisi gratis jika dibutuhkan."
        }
      }]
    }
    </script>

    <!-- Core Features Section -->
    <section class="section">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">CORE STRENGTHS</span>
                    <h2 class="section-title">Mengapa Next Young Tech?</h2>
                    <p class="section-desc">Kami tidak sekadar membuat website. Kami merancang identitas digital masa depan yang sangat responsif, interaktif, dan bernilai jual tinggi.</p>
                </div>

                <div class="features-grid">
                    <!-- Feature 1 -->
                    <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid transparent;">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--primary); box-shadow: 0 10px 25px var(--primary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-cubes" style="font-size: 32px; color: var(--primary);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Immersive 3D Visuals</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Teknologi Three.js WebGL yang memukau perhatian klien secara instan, meningkatkan retensi pengunjung, dan membedakan produk Anda dari kompetitor.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid transparent;">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--secondary); box-shadow: 0 10px 25px var(--secondary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-gauge-high" style="font-size: 32px; color: var(--secondary);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Ultra Performance</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Optimalisasi kode tingkat tinggi untuk memastikan transisi visual 3D yang sangat mulus pada 60 FPS baik di perangkat seluler maupun desktop.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid transparent;">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--accent); box-shadow: 0 10px 25px var(--accent-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-shield-halved" style="font-size: 32px; color: var(--accent);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Secure & Laravel Core</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Dibangun di atas framework terkemuka Laravel 11 untuk jaminan keamanan database MySQL, integrasi API, dan sistem administrasi yang kokoh.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Contact Form Section -->
        <section class="section" style="background: rgba(255, 255, 255, 0.01); border-top: 1px solid var(--border-color);">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">GET IN TOUCH</span>
                    <h2 class="section-title">Hubungi Tim Ahli Kami</h2>
                    <p class="section-desc">Miliki pertanyaan mengenai pembuatan website custom Anda? Diskusikan dengan konsultan kami sekarang.</p>
                </div>

                <div class="contact-container">
                    <!-- Contact Info Glass Panel -->
                    <div class="glass-card contact-info">
                        <div>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nextyoungcommunity@gmail.com" target="_blank" class="contact-item" style="text-decoration: none; display: flex; align-items: center; gap: 15px; color: inherit; transition: all 0.3s ease; border-radius: 12px; padding: 5px; margin-bottom: 24px;" title="Kirim Email via Gmail">
                                <div class="contact-icon" style="background: rgba(14, 165, 233, 0.15); color: var(--primary); border: 1px solid rgba(14, 165, 233, 0.3);">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>
                                <div class="contact-details">
                                    <h4>Email Penjualan</h4>
                                    <p style="color: var(--primary); font-weight: 700;">nextyoungcommunity@gmail.com</p>
                                </div>
                            </a>

                            <a href="https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20untuk%20konsultasi%20mengenai%20pembuatan%20website%20custom%20saya." target="_blank" class="contact-item" style="text-decoration: none; display: flex; align-items: center; gap: 15px; color: inherit; transition: all 0.3s ease; border-radius: 12px; padding: 5px;">
                                <div class="contact-icon" style="background: rgba(37, 211, 102, 0.15); color: #25D366; border: 1px solid rgba(37, 211, 102, 0.3);">
                                    <i class="fa-brands fa-whatsapp" style="font-size: 20px;"></i>
                                </div>
                                <div class="contact-details">
                                    <h4>Hubungi WhatsApp</h4>
                                    <p style="color: #25D366; font-weight: 700;">+62 888-1023-038</p>
                                </div>
                            </a>
                        </div>

                        <div class="social-links">
                            <a href="#" class="social-btn"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-github"></i></a>
                        </div>
                    </div>

                    <!-- Form Glass Panel -->
                    <div class="glass-card" style="min-width: 0;">
                        <!-- Session Success/Error Alert -->
                        @if(session('success'))
                            <div class="alert-glass">
                                <i class="fa-solid fa-circle-check" style="font-size: 20px;"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if($errors->any() && !auth()->check())
                            <!-- Guest validation handled above -->
                        @elseif($errors->any())
                            <div class="alert-danger-glass">
                                <i class="fa-solid fa-circle-xmark" style="font-size: 20px;"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 16px;">
                                <input type="text" name="name" class="input-glass" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                                <input type="email" name="email" class="input-glass" placeholder="Alamat Email" required value="{{ old('email') }}">
                            </div>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 16px;">
                                <input type="tel" name="telepon" class="input-glass" placeholder="Nomor Telepon / WA (e.g. 0812xxx)" required value="{{ old('telepon') }}">
                                <input type="text" name="subject" class="input-glass" placeholder="Topik Pertanyaan" required value="{{ old('subject') }}">
                            </div>
                            <textarea name="message" class="input-glass textarea-glass" placeholder="Tuliskan detail pertanyaan atau kebutuhan website Anda disini..." required>{{ old('message') }}</textarea>
                            
                            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; cursor: pointer;">
                                <i class="fa-solid fa-paper-plane"></i> Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <!-- Initialize Testimonials Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof Swiper !== 'undefined') {
                new Swiper('.testimonials-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: '.testimonials-next',
                        prevEl: '.testimonials-prev',
                    },
                    breakpoints: {
                        768: { slidesPerView: 2, spaceBetween: 30 },
                        1024: { slidesPerView: 3, spaceBetween: 30 }
                    }
                });
            }
        });
    </script>
@endsection
