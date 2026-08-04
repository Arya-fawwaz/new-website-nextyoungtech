@extends('layouts.app')

@section('title', 'Next Young Tech | Joki Website & Joki Tugas Coding Premium')

@section('content')

    <!-- 3D Interactive Hero Section -->
    <section class="hero-section" style="position: relative; overflow: hidden; z-index: 1;">
        <!-- Dynamic Hero Backgrounds -->
        <div id="hero-light-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; background-image: url('https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; opacity: 0; transition: opacity 0.8s ease; pointer-events: none;">
            <div class="hero-light-overlay"></div>
        </div>
        <!-- Three.js Canvas Element -->
        <div id="three-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; opacity: 1; transition: opacity 0.8s ease;"></div>
        
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

        /* Style for Interactive Star Rating */
        .star-rating input:checked ~ .star-label,
        .star-rating .star-label:hover,
        .star-rating .star-label:hover ~ .star-label {
            color: #ffb703 !important;
            text-shadow: 0 0 10px rgba(255, 183, 3, 0.8);
        }

        /* Theme specific hero backgrounds */
        html[data-theme="dark"] #three-canvas-container {
            opacity: 1 !important;
        }
        html[data-theme="dark"] #hero-light-bg {
            opacity: 0 !important;
        }

        html[data-theme="light"] #three-canvas-container {
            opacity: 0 !important;
        }
        html[data-theme="light"] #hero-light-bg {
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
                    <div class="feature-icon" style="width: 60px; height: 60px; border-radius: 16px; border: 2px solid var(--secondary); box-shadow: 0 5px 15px var(--secondary-glow); background: rgba(56, 189, 248, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 24px; color: var(--secondary);"></i>
                    </div>
                    <h3 class="feature-title" style="font-size: 18px; font-weight: 800; margin-bottom: 12px; color: var(--text-main);">Joki Tugas Programming</h3>
                    <p class="feature-desc" style="font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin: 0; flex-grow: 1;">
                        Menyelesaikan joki tugas kuliah programming Anda dari tingkat dasar hingga lanjut. Kami menguasai berbagai bahasa pemrograman seperti Python, Java, C++, PHP, JavaScript, SQL, Go, dan Dart lengkap dengan dokumentasi/laporan.
                    </p>
                </div>

                <!-- Card 3: Joki Perbaikan & Integrasi -->
                <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: left; display: flex; flex-direction: column; border: 1px solid transparent; height: 100%;">
                    <div class="feature-icon" style="width: 60px; height: 60px; border-radius: 16px; border: 2px solid var(--accent); box-shadow: 0 5px 15px var(--accent-glow); background: rgba(0, 242, 254, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
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
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--secondary); box-shadow: 0 10px 25px var(--secondary-glow); background: rgba(56, 189, 248, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-gauge-high" style="font-size: 32px; color: var(--secondary);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Ultra Performance</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Optimalisasi kode tingkat tinggi untuk memastikan transisi visual 3D yang sangat mulus pada 60 FPS baik di perangkat seluler maupun desktop.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="glass-card premium-feature-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid transparent;">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--accent); box-shadow: 0 10px 25px var(--accent-glow); background: rgba(0, 242, 254, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
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
