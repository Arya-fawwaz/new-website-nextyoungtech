<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Next Young Tech') | Premium Web Design & 3D Development Agency</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Next Young Tech Technology adalah agen pengembangan website premium yang menghadirkan web aplikasi ultra-cepat dengan animasi 3D interaktif dan desain elegan kelas dunia.">
    <meta name="keywords" content="pembuatan website, website 3d, laravel, agency website, next young tech, web design mewah, agency development jakarta">
    
    <!-- Ikon & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/app.css">
    
    <!-- PWA Configuration -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0ea5e9">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" href="/favicon.ico">
    
    <!-- Three.js untuk Efek 3D -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- Blocking Script to Initialize Theme Immediately (Avoids Flash & Themes Loading Screen) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    
    <style>
        /* Fix logo text wrapping and scaling */
        .logo {
            white-space: nowrap !important;
            flex-shrink: 0 !important;
        }
        
        /* Gracefully truncate long names in header navbar */
        .profile-nav-name {
            display: inline-block !important;
            max-width: 110px !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            vertical-align: middle !important;
        }

        /* Prevent desktop nav layout clashing on various screen sizes */
        @media (max-width: 1366px) {
            .nav-menu {
                gap: 20px !important;
            }
            .nav-link {
                font-size: 13px !important;
            }
        }

        @media (max-width: 1200px) {
            .nav-menu {
                gap: 12px !important;
            }
            .nav-link {
                font-size: 12.5px !important;
            }
            .logout-text {
                display: none !important;
            }
            .profile-nav-name {
                max-width: 75px !important;
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                gap: 8px !important;
            }
            .nav-link {
                font-size: 12px !important;
            }
            .profile-nav-name {
                display: none !important; /* Hide name completely under 1024px to ensure no clashing */
            }
        }
    </style>
</head>
<body>

    @if(Route::is('home'))
        <!-- Custom micro-JS check to immediately hide loader if already loaded -->
        <script>
            if (sessionStorage.getItem('welcome_loaded')) {
                document.documentElement.classList.add('no-loader');
            }
        </script>

        <!-- Premium Loading Screen with Animated Astronaut Character -->
        <div id="loading-screen">
            <div class="loader-content">
                <!-- Animated SVG Astronaut Character -->
                <div class="astronaut-character">
                    <svg viewBox="0 0 120 120" class="astronaut-svg" style="width: 130px; height: 130px; filter: drop-shadow(0 0 15px var(--primary-glow));">
                        <!-- Space Suit Body -->
                        <path d="M40 70 C40 50, 80 50, 80 70 C80 85, 40 85, 40 70 Z" class="astro-suit-body" />
                        <!-- Legs -->
                        <rect x="44" y="80" width="10" height="15" rx="3" class="astro-suit-limb" />
                        <rect x="66" y="80" width="10" height="15" rx="3" class="astro-suit-limb" />
                        <!-- Arms -->
                        <path d="M30 65 Q20 70, 42 74" fill="none" class="astro-suit-arm" />
                        <path d="M90 65 Q100 70, 78 74" fill="none" class="astro-suit-arm" />
                        <!-- Helmet Visor -->
                        <circle cx="60" cy="58" r="18" class="astro-helmet-back" />
                        <path d="M46 56 C46 48, 74 48, 74 56 C74 64, 46 64, 46 56 Z" fill="url(#visor-grad)" />
                        <!-- Details/Control Pack -->
                        <rect x="50" y="70" width="20" height="10" rx="2" fill="var(--secondary)" />
                        <circle cx="55" cy="75" r="1.5" fill="var(--primary)" />
                        <circle cx="65" cy="75" r="1.5" fill="var(--accent)" />
                        <defs>
                            <linearGradient id="visor-grad" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="var(--primary)" />
                                <stop offset="50%" stop-color="var(--secondary)" />
                                <stop offset="100%" stop-color="var(--accent)" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <!-- Glowing digital scanning line -->
                    <div class="scanning-beam"></div>
                </div>
                
                <div class="loader-logo-container">
                    <h2 class="loader-logo">NEXT YOUNG <span>TECH</span></h2>
                    <div class="loader-sub">SYSTEM LOADING</div>
                </div>
                
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-fill" id="loader-progress-fill"></div>
                    </div>
                    <div class="progress-text">
                        <span class="status-msg"><i class="fa-solid fa-satellite fa-spin"></i> MEMULAI PORTAL WEB 3D...</span>
                        <span id="loader-percentage" class="percentage-num">0%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inline Loader Styling and Transition Logic -->
        <style>
            #loading-screen {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: var(--bg-dark);
                background-image: var(--gradient-dark);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 99999;
                transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            }
            
            html.no-loader #loading-screen {
                display: none !important;
            }

            .loader-content {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 30px;
                max-width: 400px;
                width: 100%;
                padding: 20px;
            }

            .astronaut-character {
                position: relative;
                animation: floatAstronaut 3s ease-in-out infinite;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .astronaut-character::before {
                content: '';
                position: absolute;
                width: 150px;
                height: 150px;
                background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
                border-radius: 50%;
                z-index: -1;
                filter: blur(15px);
                opacity: 0.8;
            }

            @keyframes floatAstronaut {
                0% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-12px) rotate(2deg); }
                100% { transform: translateY(0px) rotate(0deg); }
            }

            /* Astronaut Suit Theme Variants */
            .astro-suit-body {
                fill: rgba(255, 255, 255, 0.9);
                transition: all 0.3s ease;
            }
            .astro-suit-limb {
                fill: rgba(255, 255, 255, 0.95);
                transition: all 0.3s ease;
            }
            .astro-suit-arm {
                stroke: rgba(255, 255, 255, 0.95);
                stroke-width: 8px;
                stroke-linecap: round;
                transition: all 0.3s ease;
            }
            .astro-helmet-back {
                fill: rgba(6, 6, 12, 0.95);
                stroke: rgba(255, 255, 255, 0.9);
                stroke-width: 2px;
                transition: all 0.3s ease;
            }

            html[data-theme="light"] .astro-suit-body {
                fill: rgba(255, 255, 255, 0.95);
                stroke: rgba(15, 23, 42, 0.65);
                stroke-width: 2px;
            }
            html[data-theme="light"] .astro-suit-limb {
                fill: rgba(255, 255, 255, 0.95);
                stroke: rgba(15, 23, 42, 0.65);
                stroke-width: 2px;
            }
            html[data-theme="light"] .astro-suit-arm {
                stroke: rgba(15, 23, 42, 0.65);
                stroke-width: 8px;
            }
            html[data-theme="light"] .astro-helmet-back {
                fill: rgba(248, 250, 252, 0.95);
                stroke: rgba(15, 23, 42, 0.65);
                stroke-width: 2px;
            }

            .scanning-beam {
                position: absolute;
                width: 140px;
                height: 2px;
                background: linear-gradient(90deg, transparent, var(--primary), transparent);
                box-shadow: 0 0 10px var(--primary);
                animation: scanBeam 2.5s ease-in-out infinite;
                pointer-events: none;
            }

            @keyframes scanBeam {
                0% { top: 10%; opacity: 0; }
                10% { opacity: 1; }
                90% { opacity: 1; }
                100% { top: 90%; opacity: 0; }
            }

            .loader-logo-container {
                margin-top: 10px;
            }

            .loader-logo {
                font-family: var(--font-heading);
                font-size: 24px;
                font-weight: 900;
                letter-spacing: 2px;
                background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                margin-bottom: 4px;
            }

            .loader-logo span {
                color: var(--text-main);
                -webkit-text-fill-color: var(--text-main);
            }

            .loader-sub {
                font-family: var(--font-heading);
                font-size: 10px;
                color: var(--text-muted);
                letter-spacing: 4px;
                text-transform: uppercase;
                opacity: 0.7;
            }

            .progress-container {
                width: 100%;
                margin-top: 10px;
            }

            .progress-bar {
                width: 100%;
                height: 6px;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 10px;
                overflow: hidden;
                position: relative;
            }

            html[data-theme="light"] .progress-bar {
                background: rgba(15, 23, 42, 0.06);
            }

            .progress-fill {
                height: 100%;
                width: 0%;
                background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
                box-shadow: 0 0 10px var(--primary-glow);
                border-radius: 10px;
                transition: width 0.1s linear;
            }

            .progress-text {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 10px;
                font-size: 11px;
                font-weight: 600;
            }

            .status-msg {
                color: var(--text-muted);
                letter-spacing: 0.5px;
                text-transform: uppercase;
            }

            .percentage-num {
                font-family: var(--font-heading);
                color: var(--primary);
                text-shadow: 0 0 5px var(--primary-glow);
            }

            html[data-theme="light"] .percentage-num {
                text-shadow: none;
                font-weight: 800;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (sessionStorage.getItem('welcome_loaded')) {
                    const loader = document.getElementById('loading-screen');
                    if (loader) loader.remove();
                    return;
                }

                const progressFill = document.getElementById('loader-progress-fill');
                const percentageNum = document.getElementById('loader-percentage');
                const loader = document.getElementById('loading-screen');
                
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.floor(Math.random() * 8) + 4;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(interval);
                        
                        sessionStorage.setItem('welcome_loaded', 'true');
                        
                        setTimeout(() => {
                            if (loader) {
                                loader.style.opacity = '0';
                                loader.style.transform = 'scale(1.05)';
                                setTimeout(() => {
                                    loader.remove();
                                }, 800);
                            }
                        }, 400);
                    }
                    
                    if (progressFill) progressFill.style.width = progress + '%';
                    if (percentageNum) percentageNum.innerText = progress + '%';
                }, 80);
            });
        </script>
    @endif

    @if(!Route::is('admin.dashboard'))
    <!-- Mobile App Bar (Only visible on screens <= 820px) -->
    <div class="mobile-app-bar">
        <a href="{{ route('home') }}" class="mobile-app-logo">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 0 4px var(--primary-glow));">
                <path d="M16 2L2 9.5V22.5L16 30L30 22.5V9.5L16 2Z" stroke="url(#logo-grad-mob)" stroke-width="2.5" stroke-linejoin="round" />
                <path d="M16 7L7 12V20L16 25L25 20V12L16 7Z" fill="url(#logo-grad-fill-mob)" opacity="0.8" />
                <path d="M16 12L12 14.5V17.5L16 20L20 17.5V14.5L16 12Z" fill="#ffffff" />
                <defs>
                    <linearGradient id="logo-grad-mob" x1="2" y1="2" x2="30" y2="30" gradientUnits="userSpaceOnUse">
                        <stop stop-color="var(--primary)" />
                        <stop offset="0.5" stop-color="var(--secondary)" />
                        <stop offset="1" stop-color="var(--accent)" />
                    </linearGradient>
                    <linearGradient id="logo-grad-fill-mob" x1="7" y1="7" x2="25" y2="25" gradientUnits="userSpaceOnUse">
                        <stop stop-color="var(--primary)" stop-opacity="0.3" />
                        <stop offset="1" stop-color="var(--secondary)" stop-opacity="0.3" />
                    </linearGradient>
                </defs>
            </svg>
            NYTech 🚀
        </a>
        <div class="mobile-app-actions">
            <!-- PWA install & Theme toggle -->
            <button id="mobile-pwa-install-btn" class="mobile-action-btn" style="display: none;" title="Unduh Aplikasi Mobile">
                <i class="fa-solid fa-mobile-screen-button" style="color: var(--accent); animation: pwaPulseBtn 2s infinite alternate;"></i>
            </button>
            <button id="mobile-theme-toggle-btn" class="mobile-action-btn" title="Ganti Tema">
                <i id="mobile-theme-toggle-icon" class="fa-solid fa-sun" style="color: #ffb703;"></i>
            </button>
            @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="mobile-action-btn" style="border: 1px solid rgba(255, 94, 98, 0.2); background: rgba(255, 94, 98, 0.1); color: #ff5e62; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer;" title="Keluar / Log Out">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            @endauth
        </div>
    </div>

    <!-- Floating Elegant Navbar -->
    <header class="header">
        <div class="container nav-container">
            <a href="{{ route('home') }}" class="logo" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 0 6px var(--primary-glow)); transition: transform 0.3s ease;">
                    <path d="M16 2L2 9.5V22.5L16 30L30 22.5V9.5L16 2Z" stroke="url(#logo-grad)" stroke-width="2.5" stroke-linejoin="round" />
                    <path d="M16 7L7 12V20L16 25L25 20V12L16 7Z" fill="url(#logo-grad-fill)" opacity="0.8" />
                    <path d="M16 12L12 14.5V17.5L16 20L20 17.5V14.5L16 12Z" fill="#ffffff" />
                    <defs>
                        <linearGradient id="logo-grad" x1="2" y1="2" x2="30" y2="30" gradientUnits="userSpaceOnUse">
                            <stop stop-color="var(--primary)" />
                            <stop offset="0.5" stop-color="var(--secondary)" />
                            <stop offset="1" stop-color="var(--accent)" />
                        </linearGradient>
                        <linearGradient id="logo-grad-fill" x1="7" y1="7" x2="25" y2="25" gradientUnits="userSpaceOnUse">
                            <stop stop-color="var(--primary)" stop-opacity="0.3" />
                            <stop offset="1" stop-color="var(--secondary)" stop-opacity="0.3" />
                        </linearGradient>
                    </defs>
                </svg>
                NEXT YOUNG <span>TECH</span>
            </a>
            
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ Route::is('about') ? 'active' : '' }}">Profil Perusahaan</a></li>
                <li><a href="{{ route('services') }}" class="nav-link {{ Route::is('services') ? 'active' : '' }}">Layanan</a></li>
                <li><a href="{{ route('features') }}" class="nav-link {{ Route::is('features') ? 'active' : '' }}">Fitur Utama</a></li>
                @auth
                    <li><a href="{{ route('quotation.index') }}" class="nav-link {{ Route::is('quotation.index') ? 'active' : '' }}">Estimasi Biaya</a></li>
                    <li><a href="{{ route('review.create') }}" class="nav-link {{ Route::is('review.create') ? 'active' : '' }}">Tulis Ulasan</a></li>
                @endauth
            </ul>

            <div style="display: flex; align-items: center; gap: 16px;">
                <!-- PWA Install Button (Hidden by default, pulses/glows when available) -->
                <button id="pwa-install-btn" class="btn-secondary" style="display: none; padding: 8px 12px; border-radius: 50%; width: 38px; height: 38px; align-items: center; justify-content: center; background: rgba(0, 242, 254, 0.1); border: 1px solid rgba(0, 242, 254, 0.2); color: var(--accent); cursor: pointer; transition: all 0.3s ease; box-shadow: 0 0 10px rgba(0, 242, 254, 0.2);" title="Unduh Aplikasi Mobile 🚀">
                    <i class="fa-solid fa-mobile-screen-button" style="animation: pwaPulseBtn 2s infinite alternate;"></i>
                </button>

                <!-- Theme Toggle Button -->
                <button id="theme-toggle-btn" class="btn-secondary" title="Ganti Tema">
                    <i id="theme-toggle-icon" class="fa-solid fa-sun" style="color: #ffb703;"></i>
                </button>

                @auth
                    <a href="{{ route('profile') }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none; font-size: 13px; color: var(--text-main); font-weight: 500; transition: all 0.3s ease; flex-shrink: 0;" class="profile-nav-link">
                        @if(auth()->user()->foto_profil)
                            <img src="{{ '/' . ltrim(auth()->user()->foto_profil, '/') }}" alt="{{ auth()->user()->nama }}" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--primary); box-shadow: 0 0 8px var(--primary-glow); flex-shrink: 0;">
                        @else
                            <div style="width: 28px; height: 28px; border-radius: 50%; background: rgba(128, 128, 128, 0.05); display: flex; align-items: center; justify-content: center; border: 1px solid var(--dashed-border); box-shadow: 0 0 6px rgba(0,0,0,0.1); flex-shrink: 0;">
                                <i class="fa-solid fa-user-astronaut" style="font-size: 14px; color: var(--primary); text-shadow: 0 0 6px var(--primary-glow); flex-shrink: 0;"></i>
                            </div>
                        @endif
                        <span class="profile-nav-name" style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle;">{{ auth()->user()->nama }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline; flex-shrink: 0;">
                        @csrf
                        <button type="submit" class="btn-secondary" style="padding: 8px 12px; font-size: 13px; cursor: pointer; border-radius: 8px; background: rgba(255, 94, 98, 0.1); border: 1px solid rgba(255, 94, 98, 0.2); color: #ff5e62; display: flex; align-items: center; gap: 6px; flex-shrink: 0;" title="Keluar">
                            <i class="fa-solid fa-right-from-bracket"></i> <span class="logout-text">Keluar</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-nav">
                        <i class="fa-solid fa-lock"></i> Masuk / Daftar
                    </a>
                @endauth
            </div>
        </div>
    </header>
    @endif

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    @if(!Route::is('admin.dashboard'))
    <!-- Majestic Footer -->
    <footer class="footer">
        <!-- Ambient Aurora Glow Blobs -->
        <div class="footer-glow-blob blob-1"></div>
        <div class="footer-glow-blob blob-2"></div>

        <div class="container footer-grid">
            <!-- Column 1: Brand Info -->
            <div class="footer-col brand-col">
                <a href="{{ route('home') }}" class="footer-logo" style="text-decoration: none;">
                    <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow(0 0 4px var(--primary-glow));">
                        <path d="M16 2L2 9.5V22.5L16 30L30 22.5V9.5L16 2Z" stroke="url(#logo-grad-foot)" stroke-width="2.5" stroke-linejoin="round" />
                        <path d="M16 7L7 12V20L16 25L25 20V12L16 7Z" fill="url(#logo-grad-fill-foot)" opacity="0.8" />
                        <path d="M16 12L12 14.5V17.5L16 20L20 17.5V14.5L16 12Z" fill="#ffffff" />
                        <defs>
                            <linearGradient id="logo-grad-foot" x1="2" y1="2" x2="30" y2="30" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--primary)" />
                                <stop offset="0.5" stop-color="var(--secondary)" />
                                <stop offset="1" stop-color="var(--accent)" />
                            </linearGradient>
                            <linearGradient id="logo-grad-fill-foot" x1="7" y1="7" x2="25" y2="25" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--primary)" stop-opacity="0.3" />
                                <stop offset="1" stop-color="var(--secondary)" stop-opacity="0.3" />
                            </linearGradient>
                        </defs>
                    </svg>
                    NEXT YOUNG <span style="font-weight: 900;">TECH</span>
                </a>
                <p class="footer-brand-desc">
                    Menciptakan mahakarya website premium dengan arsitektur Laravel yang tangguh, desain 3D WebGL imersif, dan optimasi performa ultra-cepat untuk bisnis kelas dunia.
                </p>
                <div class="footer-socials">
                    <a href="#" class="social-icon" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="social-icon" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://wa.me/628881023038" target="_blank" class="social-icon" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Column 2: Layanan -->
            <div class="footer-col">
                <h4 class="footer-heading">Layanan Kami</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i> Pembuatan Web Custom</a></li>
                    <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i> Desain UI/UX Mewah</a></li>
                    <li><a href="{{ route('features') }}"><i class="fa-solid fa-chevron-right"></i> Interaksi 3D & WebGL</a></li>
                    <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i> Aplikasi Mobile & PWA</a></li>
                    <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i> Sistem ERP & Manajemen</a></li>
                </ul>
            </div>

            <!-- Column 3: Navigasi -->
            <div class="footer-col">
                <h4 class="footer-heading">Tautan Cepat</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> Beranda Utama</a></li>
                    <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> Tentang Kami</a></li>
                    <li><a href="{{ route('services') }}"><i class="fa-solid fa-chevron-right"></i> Portal Layanan</a></li>
                    <li><a href="{{ route('features') }}"><i class="fa-solid fa-chevron-right"></i> Fitur Andalan</a></li>
                    @auth
                        <li><a href="{{ route('quotation.index') }}"><i class="fa-solid fa-chevron-right"></i> Kalkulator Estimasi</a></li>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fa-solid fa-chevron-right"></i> Masuk / Daftar</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Column 4: Contact (Without Office location details) -->
            <div class="footer-col contact-col">
                <h4 class="footer-heading">Hubungi Kami</h4>
                <ul class="footer-contact-info">
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nextyoungcommunity@gmail.com" target="_blank" title="Kirim Email via Gmail">nextyoungcommunity@gmail.com</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+628881023038">+62 888-1023-038</a>
                    </li>
                    <li style="margin-top: 15px; display: inline-flex;">
                        <div class="footer-status-pill">
                            <span class="status-dot"></span>
                            <span>Online & Respon Cepat</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer Separator Line -->
        <div class="footer-divider"></div>

        <!-- Sub Footer -->
        <div class="container sub-footer">
            <p class="copyright">&copy; {{ date('Y') }} Next Young Tech Technology. Semua Hak Cipta Dilindungi.</p>
            <div class="sub-footer-links">
                <a href="{{ route('admin.login') }}" class="admin-portal-link"><i class="fa-solid fa-shield-halved"></i> Akses Portal Admin</a>
                <span class="sep">•</span>
                <a href="#">Kebijakan Privasi</a>
                <span class="sep">•</span>
                <a href="#">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Consultation Button -->
    <a href="https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20untuk%20konsultasi%20mengenai%20pembuatan%20website%20custom%20saya." target="_blank" class="whatsapp-float" title="Konsultasi WhatsApp">
        <i class="fa-brands fa-whatsapp"></i> Konsultasi WA
    </a>

    <!-- Mobile Bottom Navigation (Only visible on screens <= 820px) -->
    <nav class="mobile-bottom-nav">
        <a href="{{ route('home') }}" class="mobile-nav-item {{ Route::is('home') ? 'active' : '' }}">
            <div class="mobile-icon-wrapper">
                <i class="fa-solid fa-house"></i>
            </div>
            <span>Beranda</span>
        </a>
        <a href="{{ route('about') }}" class="mobile-nav-item {{ Route::is('about') ? 'active' : '' }}">
            <div class="mobile-icon-wrapper">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <span>Tentang</span>
        </a>
        <a href="{{ route('services') }}" class="mobile-nav-item {{ Route::is('services') ? 'active' : '' }}">
            <div class="mobile-icon-wrapper">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <span>Layanan</span>
        </a>
        <a href="{{ route('features') }}" class="mobile-nav-item {{ Route::is('features') ? 'active' : '' }}">
            <div class="mobile-icon-wrapper">
                <i class="fa-solid fa-cubes"></i>
            </div>
            <span>Fitur</span>
        </a>
        @auth
            <a href="{{ route('quotation.index') }}" class="mobile-nav-item {{ Route::is('quotation.index') ? 'active' : '' }} special">
                <div class="mobile-icon-wrapper">
                    <i class="fa-solid fa-wand-magic-sparkles" style="animation: pwaPulseBtn 2s infinite alternate;"></i>
                </div>
                <span>Estimasi</span>
            </a>
            <a href="{{ route('profile') }}" class="mobile-nav-item {{ Route::is('profile') ? 'active' : '' }}">
                <div class="mobile-icon-wrapper">
                    <i class="fa-solid fa-user-astronaut"></i>
                </div>
                <span>Profil</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="mobile-nav-item {{ Route::is('login') ? 'active' : '' }}">
                <div class="mobile-icon-wrapper">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </div>
                <span>Masuk</span>
            </a>
        @endauth
    </nav>

    <!-- Nova AI Chatbot Floating Widget -->
    <div id="nova-chatbot-widget" class="nova-chatbot-container">
        <!-- Chat Bubble Trigger -->
        <button id="nova-chat-trigger" class="nova-chat-bubble" title="Tanya Nova AI">
            <span class="nova-avatar-pulse"></span>
            <i class="fa-solid fa-user-astronaut"></i>
            <span class="nova-chat-tooltip">Tanya Nova AI 🚀</span>
        </button>

        <!-- Chat Window -->
        <div id="nova-chat-window" class="nova-chat-box">
            <!-- Header -->
            <div class="nova-chat-header">
                <div class="nova-chat-header-info">
                    <div class="nova-chat-avatar">
                        <i class="fa-solid fa-user-astronaut"></i>
                        <span class="nova-status-dot"></span>
                    </div>
                    <div>
                        <h4 class="nova-bot-name">Nova AI</h4>
                        <span class="nova-bot-status">Online • Virtual Astronaut</span>
                    </div>
                </div>
                <button id="nova-chat-close" class="nova-chat-close-btn" title="Tutup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Messages Area -->
            <div id="nova-chat-messages" class="nova-chat-body">
                <!-- Welcome Message -->
                <div class="nova-msg-row bot">
                    <div class="nova-msg-bubble">
                        Halo! 🚀 Saya **Nova**, asisten virtual astronot Anda di **Next Young Tech**! Senang sekali bisa menyapa Anda. Saya di sini untuk membantu mendiskusikan ide proyek website luar biasa Anda secara santai tapi profesional. Ada proyek seru apa nih yang ingin kita luncurkan bersama hari ini? 😊
                    </div>
                </div>
                <!-- Quick Options -->
                <div class="nova-quick-replies" id="nova-quick-container">
                    <button class="nova-quick-btn" onclick="sendQuickReply('Tanya Layanan Web')">Tanya Layanan Web</button>
                    <button class="nova-quick-btn" onclick="sendQuickReply('Estimasi Biaya Proyek')">Estimasi Biaya Proyek</button>
                    <button class="nova-quick-btn" onclick="sendQuickReply('Teknologi yang Dipakai')">Teknologi yang Dipakai</button>
                    <button class="nova-quick-btn" onclick="sendQuickReply('Hubungi Sales WA')">Hubungi Sales WA</button>
                </div>
            </div>

            <!-- Typing Indicator -->
            <div id="nova-typing-indicator" class="nova-msg-row bot" style="display: none;">
                <div class="nova-msg-bubble typing">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <!-- Input Area -->
            <form id="nova-chat-form" class="nova-chat-input-area" onsubmit="handleChatSubmit(event)">
                <input type="text" id="nova-user-input" class="nova-input-field" placeholder="Ketik pesan Anda disini..." required autocomplete="off">
                <button type="submit" class="nova-send-btn" title="Kirim">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Script Chatbot Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userIsLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
            const trigger = document.getElementById('nova-chat-trigger');
            const windowBox = document.getElementById('nova-chat-window');
            const closeBtn = document.getElementById('nova-chat-close');
            const chatMessages = document.getElementById('nova-chat-messages');
            const userInput = document.getElementById('nova-user-input');
            const typingIndicator = document.getElementById('nova-typing-indicator');

            // Open/Close chat box
            trigger.addEventListener('click', () => {
                windowBox.classList.toggle('active');
                if (windowBox.classList.contains('active')) {
                    userInput.focus();
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            });

            closeBtn.addEventListener('click', () => {
                windowBox.classList.remove('active');
            });

            // Handle Quick Reply selections
            window.sendQuickReply = function(text) {
                appendUserMessage(text);
                processChatResponse(text);
            };

            // Handle manual form submissions
            window.handleChatSubmit = function(event) {
                event.preventDefault();
                const text = userInput.value.trim();
                if (!text) return;
                
                userInput.value = '';
                appendUserMessage(text);
                processChatResponse(text);
            };

            function appendUserMessage(text) {
                // Remove previous quick replies to clean stream
                const quickReplies = document.getElementById('nova-quick-container');
                if (quickReplies) quickReplies.remove();

                const row = document.createElement('div');
                row.className = 'nova-msg-row user';
                row.innerHTML = `<div class="nova-msg-bubble">${escapeHtml(text)}</div>`;
                chatMessages.appendChild(row);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function processChatResponse(text) {
                // Show typing indicator
                typingIndicator.style.display = 'flex';
                chatMessages.appendChild(typingIndicator);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Handle Masuk / Daftar Akun redirect instantly
                if (text === 'Masuk / Daftar Akun') {
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage("Siap kosmik! 🚀 Saya sedang membuka portal login...");
                        window.location.href = "{{ route('login') }}";
                    }, 800);
                    return;
                }

                // If user is guest and tries to order or click WhatsApp sales or calculation
                if (text === 'Hubungkan ke WA Sekarang' || text === 'Hubungi Sales WA' || text === 'Estimasi Biaya Proyek' || text === 'Buka Kalkulator Biaya' || text === 'Pesan') {
                    if (!userIsLoggedIn) {
                        setTimeout(() => {
                            typingIndicator.style.display = 'none';
                            appendBotMessage("Waduh! Untuk melakukan pemesanan proyek digital atau kalkulasi biaya di **Next Young Tech**, **Anda harus masuk (login) atau mendaftar akun terlebih dahulu** ya! 😊\n\nSilakan klik tautan di bawah ini untuk masuk ke portal akun Anda. Setelah masuk, Anda bisa bebas menggunakan fitur estimasi biaya dan berkonsultasi langsung secara resmi.\n\n👉 **[Masuk ke Portal / Daftar Akun]({{ route('login') }})**", [
                                "Masuk / Daftar Akun",
                                "Tanya Layanan Web",
                                "Teknologi yang Dipakai"
                            ]);
                        }, 1000);
                        return;
                    }
                }

                // Handle instant specific actions on client-side to be super responsive for logged in users
                if (text === 'Hubungkan ke WA Sekarang' || text === 'Hubungi Sales WA') {
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage("Siap kosmik! 🚀 Saya sedang membuka WhatsApp sales kami. Jika tab baru tidak terbuka otomatis, silakan klik tautan berikut:\n\n👉 **[WhatsApp Sales Tim Ahli](https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20konsultasi%20pembuatan%20website%20premium.)**");
                        window.open("https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20konsultasi%20pembuatan%20website%20premium.", '_blank');
                    }, 1000);
                    return;
                } else if (text === 'Buka Kalkulator Biaya' || text === 'Estimasi Biaya Proyek') {
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage("Tentu saja! 💰 Halaman Kalkulator Estimasi Biaya kami sangat canggih dan interaktif. Silakan klik tautan di bawah ini untuk menuju ke sana:\n\n👉 **[Kalkulator Estimasi Biaya]({{ route('quotation.index') }})**");
                    }, 1000);
                    return;
                }

                // Send AJAX request to our Laravel ChatbotController
                fetch("{{ route('chatbot.message') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: text })
                })
                .then(response => response.json())
                .then(data => {
                    // Hide typing indicator after a simulated short delay to feel human (tidak kaku!)
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage(data.reply, data.options);
                    }, 800 + Math.random() * 600);
                })
                .catch(error => {
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage("Aduh maaf ya, jaringan satelit komunikasi saya terganggu sejenak. 🛰️ Tapi Anda tetap bisa langsung menghubungi tim ahli kami lewat WhatsApp di **[+62 888-1023-038](https://wa.me/628881023038)**!");
                    }, 1000);
                });
            }

            function appendBotMessage(text, options = []) {
                const row = document.createElement('div');
                row.className = 'nova-msg-row bot';
                
                // Convert Markdown-like text from controller (like **bold** or [links]) to HTML dynamically for rich premium text!
                let formattedText = escapeHtml(text)
                    .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                    .replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" style="color:var(--primary);text-decoration:underline;">$1</a>')
                    .replace(/\n/g, '<br>');

                row.innerHTML = `<div class="nova-msg-bubble">${formattedText}</div>`;
                chatMessages.appendChild(row);

                // If options are returned, append them as new quick reply bubble pills
                if (options && options.length > 0) {
                    const quickDiv = document.createElement('div');
                    quickDiv.className = 'nova-quick-replies';
                    quickDiv.id = 'nova-quick-container';
                    options.forEach(opt => {
                        const btn = document.createElement('button');
                        btn.className = 'nova-quick-btn';
                        btn.innerText = opt;
                        btn.addEventListener('click', () => sendQuickReply(opt));
                        quickDiv.appendChild(btn);
                    });
                    chatMessages.appendChild(quickDiv);
                }

                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function escapeHtml(string) {
                return String(string).replace(/[&<>"']/g, function (s) {
                    return {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#39;'
                    }[s];
                });
            }

            // ==========================================================================
            // PWA Installation & Service Worker Logic (Unduh Aplikasi Mobile)
            // ==========================================================================
            let deferredPrompt;
            const pwaInstallBtn = document.getElementById('pwa-install-btn');
            const mobilePwaInstallBtn = document.getElementById('mobile-pwa-install-btn');

            // 1. Register Service Worker
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/service-worker.js')
                        .then(reg => console.log('[PWA] Service Worker registered successfully:', reg.scope))
                        .catch(err => console.warn('[PWA] Service Worker registration failed:', err));
                });
            }

            // 2. Intercept install prompt event
            window.addEventListener('beforeinstallprompt', (e) => {
                // Prevent standard mini-infobar from appearing on mobile
                e.preventDefault();
                // Stash the event so it can be triggered later
                deferredPrompt = e;
                // Show our gorgeous install button in the header / mobile top bar
                if (pwaInstallBtn) {
                    pwaInstallBtn.style.display = 'flex';
                }
                if (mobilePwaInstallBtn) {
                    mobilePwaInstallBtn.style.display = 'flex';
                }
            });

            // 3. Handle install button click
            const handleInstallClick = () => {
                if (!deferredPrompt) return;
                
                // Show native install prompt
                deferredPrompt.prompt();
                
                // Wait for the user to respond to the prompt
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('[PWA] User accepted the install prompt');
                        if (pwaInstallBtn) pwaInstallBtn.style.display = 'none';
                        if (mobilePwaInstallBtn) mobilePwaInstallBtn.style.display = 'none';
                    } else {
                        console.log('[PWA] User dismissed the install prompt');
                    }
                    deferredPrompt = null;
                });
            };

            if (pwaInstallBtn) {
                pwaInstallBtn.addEventListener('click', handleInstallClick);
            }
            if (mobilePwaInstallBtn) {
                mobilePwaInstallBtn.addEventListener('click', handleInstallClick);
            }

            // 4. Hide button once installed successfully
            window.addEventListener('appinstalled', (evt) => {
                console.log('[PWA] Next Young Tech app was installed successfully!');
                if (pwaInstallBtn) {
                    pwaInstallBtn.style.display = 'none';
                }
                if (mobilePwaInstallBtn) {
                    mobilePwaInstallBtn.style.display = 'none';
                }
            });
        });
    </script>
    @endif

    <!-- Session WhatsApp Redirect Handler -->
    @if(session('whatsapp_redirect'))
        <script>
            window.addEventListener('load', () => {
                setTimeout(() => {
                    window.open("{{ session('whatsapp_redirect') }}", '_blank');
                }, 800);
            });
        </script>
    @endif

    <!-- Main Javascript File -->
    <script src="/js/app.js"></script>
</body>
</html>
