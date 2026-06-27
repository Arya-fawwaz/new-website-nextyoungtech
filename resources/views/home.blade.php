@extends('layouts.app')

@section('title', 'Beranda')

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
                        <a href="{{ route('login') }}" class="btn-primary" style="background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 15px var(--primary-glow);">
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
                <span class="section-badge" style="background: var(--primary); border-color: var(--primary); color: #ffffff; font-weight: 800; box-shadow: 0 4px 15px rgba(14, 165, 233, 0.4);">TESTIMONI KLIEN</span>
                <h2 class="section-title">Apa Kata Mereka Tentang Kami?</h2>
                <p class="section-desc">Kepuasan klien adalah kebanggaan terbesar kami. Berikut ulasan bintang 5 dan komentar nyata dari klien kami.</p>
                @auth
                    <div style="margin-top: 24px; text-align: center;">
                        <a href="{{ route('review.create') }}" class="btn-primary" style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; padding: 10px 24px; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 15px var(--primary-glow);">
                            <i class="fa-solid fa-pen-to-square"></i> Tulis Ulasan Anda
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Infinite Scrolling Track Container -->
        <div class="marquee-wrapper">
            @if(isset($ulasan) && count($ulasan) > 0)
                @php
                    $shouldScroll = count($ulasan) >= 3;
                    $reviewsToDisplay = $shouldScroll ? $ulasan->concat($ulasan) : $ulasan;
                @endphp
                <div class="marquee-track" style="{{ !$shouldScroll ? 'animation: none; justify-content: center; margin: 0 auto; width: auto;' : '' }}">
                    @foreach($reviewsToDisplay as $review)
                        <div class="glass-card testimonial-card" style="width: 380px; flex-shrink: 0; padding: 25px; margin: 0 15px; border-radius: 12px; border: 1px solid var(--border-color); display: flex; flex-direction: column; justify-content: space-between; text-align: left; transition: transform 0.3s ease, border-color 0.3s ease; background: var(--bg-card); backdrop-filter: blur(10px);">
                            
                            <!-- Header: Stars and Comment -->
                            <div>
                                <!-- Star Rating -->
                                <div style="display: flex; gap: 4px; margin-bottom: 12px; color: #ffb703; filter: drop-shadow(0 0 4px rgba(255, 183, 3, 0.6));">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->bintang)
                                            <i class="fa-solid fa-star" style="font-size: 14px;"></i>
                                        @else
                                            <i class="fa-regular fa-star" style="font-size: 14px;"></i>
                                        @endif
                                    @endfor
                                </div>
                                
                                <!-- Comment Text -->
                                <p style="font-size: 13px; line-height: 1.6; color: var(--text-main); opacity: 0.85; font-style: italic; margin-bottom: 20px;">
                                    "{{ $review->komentar }}"
                                </p>
                            </div>

                            <!-- Footer: User Info -->
                            <div style="display: flex; align-items: center; gap: 12px; border-top: 1px solid var(--border-color); padding-top: 15px;">
                                @php
                                    $userAvatarUrl = $review->pengguna ? $review->pengguna->foto_profil_url : $review->foto_profil_url;
                                    $userName = $review->pengguna && $review->pengguna->nama ? $review->pengguna->nama : $review->nama;
                                    $hasAvatar = !empty($userAvatarUrl);
                                @endphp
                                
                                @if($hasAvatar)
                                    <img src="{{ $userAvatarUrl }}" alt="{{ $userName }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--primary); box-shadow: 0 0 8px var(--primary-glow);">
                                @else
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(128, 128, 128, 0.05); display: flex; align-items: center; justify-content: center; border: 1px solid var(--dashed-border);">
                                        <i class="fa-solid fa-user-tie" style="font-size: 18px; color: var(--primary); text-shadow: 0 0 6px var(--primary-glow);"></i>
                                    </div>
                                @endif

                                <div>
                                    <h4 style="font-size: 13px; font-weight: 700; color: var(--text-main); margin: 0;">{{ $userName }}</h4>
                                    <span style="font-size: 11px; color: var(--text-dark); opacity: 0.6;"><i class="fa-solid fa-shield-halved"></i> Klien Terverifikasi</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="color: var(--text-dark); text-align: center; width: 100%; padding: 20px;">Belum ada ulasan klien.</div>
            @endif
        </div>
    </section>

    <!-- Custom CSS for Infinite Marquee -->
    <style>
        .marquee-wrapper {
            position: relative;
            width: 100%;
            overflow-x: hidden;
            display: flex;
            padding: 10px 0;
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee 35s linear infinite;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary) !important;
            box-shadow: 0 5px 15px var(--primary-glow);
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
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
                    <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid rgba(14, 165, 233, 0.15);">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--primary); box-shadow: 0 10px 25px var(--primary-glow); background: rgba(14, 165, 233, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-cubes" style="font-size: 32px; color: var(--primary);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Immersive 3D Visuals</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Teknologi Three.js WebGL yang memukau perhatian klien secara instan, meningkatkan retensi pengunjung, dan membedakan produk Anda dari kompetitor.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid rgba(79, 70, 229, 0.15);">
                        <div class="feature-icon" style="width: 80px; height: 80px; border-radius: 20px; border: 2px solid var(--secondary); box-shadow: 0 10px 25px var(--secondary-glow); background: rgba(79, 70, 229, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                            <i class="fa-solid fa-gauge-high" style="font-size: 32px; color: var(--secondary);"></i>
                        </div>
                        <h3 class="feature-title" style="font-size: 20px; font-weight: 800; margin-bottom: 15px; color: var(--text-main);">Ultra Performance</h3>
                        <p class="feature-desc" style="font-size: 14px; color: var(--text-muted); line-height: 1.7; margin: 0;">
                            Optimalisasi kode tingkat tinggi untuk memastikan transisi visual 3D yang sangat mulus pada 60 FPS baik di perangkat seluler maupun desktop.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="glass-card" style="padding: 40px 30px; text-align: center; display: flex; flex-direction: column; align-items: center; border: 1px solid rgba(0, 242, 254, 0.15);">
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

                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nextyoungcommunity@gmail.com" target="_blank" class="contact-item" style="text-decoration: none; display: flex; align-items: center; gap: 15px; color: inherit; transition: all 0.3s ease; border-radius: 12px; padding: 5px;" title="Kirim Email via Gmail">
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

                        <div class="social-links">
                            <a href="#" class="social-btn"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="social-btn"><i class="fa-brands fa-github"></i></a>
                        </div>
                    </div>

                    <!-- Form Glass Panel -->
                    <div class="glass-card">
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
    </div>

@endsection
