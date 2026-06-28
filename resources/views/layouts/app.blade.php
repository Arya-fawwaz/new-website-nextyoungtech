<!DOCTYPE html>
<html lang="id" data-theme="light">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/app.css?v={{ time() }}">
    
    <!-- PWA Configuration -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#0ea5e9">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" href="/favicon.ico">
    
    <!-- Three.js untuk Efek 3D -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    

    
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
                column-gap: 16px !important;
                row-gap: 6px !important;
            }
            .nav-link {
                font-size: 13px !important;
            }
        }

        @media (max-width: 1200px) {
            .nav-menu {
                column-gap: 10px !important;
                row-gap: 6px !important;
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
                column-gap: 8px !important;
                row-gap: 6px !important;
            }
            .nav-link {
                font-size: 12px !important;
            }
            .profile-nav-name {
                /* Let it be visible on mobile */
            }
        }
    </style>
    
    @if(request()->is('admin*'))
    <style>
        /* Fix double scrollbar: Only .admin-main-panel scrolls */
        html, body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden !important;
        }
        body > main {
            height: 100% !important;
            overflow: hidden !important;
        }
        .admin-dashboard-layout {
            height: 100vh !important;
            min-height: unset !important;
            overflow: hidden !important;
        }
        .admin-main-panel {
            height: 100vh !important;
            min-height: unset !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }
    </style>
    @endif
</head>
<body>

    @if(Route::is('home'))
        <!-- Custom micro-JS check to immediately hide loader if already loaded -->
        <script>
            if (sessionStorage.getItem('welcome_loaded')) {
                document.documentElement.classList.add('no-loader');
            }
        </script>

        <!-- Cinematic Movie Intro Loading Screen -->
        <div id="loading-screen" class="cinematic-loader">
            <div class="cinematic-bg">
                <div class="cinematic-bar top" id="cine-bar-top"></div>
                <div class="cinematic-bar bottom" id="cine-bar-bottom"></div>
            </div>
            
            <div class="cinematic-content">
                <div class="cinematic-number" id="loader-percentage">0%</div>
                <div class="cinematic-text">NEXT YOUNG TECH</div>
                <div class="cinematic-sub">DIGITAL EXCELLENCE</div>
            </div>
        </div>

        <style>
            .cinematic-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 99999;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none; /* Let clicks pass through when fading out */
            }

            html.no-loader #loading-screen {
                display: none !important;
            }

            .cinematic-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                z-index: 1;
                pointer-events: auto;
            }

            .cinematic-bar {
                width: 100%;
                height: 50vh;
                background-color: #030305; /* Pitch black for movie feel */
                transition: transform 1.2s cubic-bezier(0.77, 0, 0.175, 1);
            }

            .cinematic-bar.top {
                transform-origin: top;
            }

            .cinematic-bar.bottom {
                transform-origin: bottom;
            }

            .cinematic-content {
                position: relative;
                z-index: 2;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .cinematic-number {
                font-family: var(--font-heading);
                font-size: 8vw;
                font-weight: 900;
                color: #ffffff;
                letter-spacing: -2px;
                line-height: 1;
                margin-bottom: 20px;
                text-shadow: 0 0 30px rgba(255, 255, 255, 0.15);
            }

            @media (max-width: 768px) {
                .cinematic-number {
                    font-size: 70px;
                }
            }

            .cinematic-text {
                font-family: var(--font-body);
                font-size: 14px;
                font-weight: 700;
                color: #a0a0a0;
                letter-spacing: 12px;
                text-transform: uppercase;
                margin-left: 12px; /* Balance letter spacing */
            }

            .cinematic-sub {
                font-family: var(--font-body);
                font-size: 9px;
                font-weight: 500;
                color: var(--primary);
                letter-spacing: 6px;
                text-transform: uppercase;
                margin-top: 8px;
                margin-left: 6px;
            }

            /* Opening Animation Classes */
            .cinematic-loader.opening .cinematic-bar.top {
                transform: scaleY(0);
            }

            .cinematic-loader.opening .cinematic-bar.bottom {
                transform: scaleY(0);
            }

            .cinematic-loader.opening .cinematic-content {
                opacity: 0;
                transform: scale(1.1);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (sessionStorage.getItem('welcome_loaded')) {
                    const loader = document.getElementById('loading-screen');
                    if (loader) loader.remove();
                    return;
                }

                const percentageNum = document.getElementById('loader-percentage');
                const loader = document.getElementById('loading-screen');
                
                let progress = 0;
                
                const updateCounter = () => {
                    // Movie style counting: irregular intervals
                    let increment = Math.random() > 0.4 ? Math.floor(Math.random() * 4) + 1 : Math.floor(Math.random() * 12) + 4;
                    progress += increment;
                    
                    if (progress >= 100) {
                        progress = 100;
                        if (percentageNum) percentageNum.innerText = progress + '%';
                        
                        sessionStorage.setItem('welcome_loaded', 'true');
                        
                        // Hold at 100% for a dramatic second, then open curtains
                        setTimeout(() => {
                            if (loader) {
                                loader.classList.add('opening');
                                
                                // Remove from DOM after animation completes
                                setTimeout(() => {
                                    loader.remove();
                                }, 1200);
                            }
                        }, 600);
                    } else {
                        if (percentageNum) percentageNum.innerText = progress + '%';
                        // Slower at the beginning, faster in middle, slow at the end
                        let nextTick;
                        if (progress < 30) nextTick = Math.random() * 80 + 40;
                        else if (progress < 80) nextTick = Math.random() * 40 + 20;
                        else nextTick = Math.random() * 120 + 80;
                        
                        setTimeout(updateCounter, nextTick);
                    }
                };
                
                // Start after a tiny delay
                setTimeout(updateCounter, 150);
            });
        </script>
    @endif

    @if(!Route::is('admin.dashboard'))
    <!-- Mobile App Bar (Only visible on screens <= 820px) -->
    <div class="mobile-app-bar">
        <a href="{{ route('home') }}" class="mobile-app-logo">
            <img src="{{ asset('images/logo-n-trans.png') }}?v={{ time() }}" alt="Next Young Tech Logo" style="height: 28px; width: auto; object-fit: contain;">
            NEXT YOUNG <span style="color: var(--primary); font-weight: 800;">TECH</span>
        </a>
        <div class="mobile-app-actions">
            <!-- PWA install & Theme toggle -->
            <button id="mobile-pwa-install-btn" class="mobile-action-btn" style="display: none;" title="Unduh Aplikasi Mobile">
                <i class="fa-solid fa-mobile-screen-button" style="color: var(--accent); animation: pwaPulseBtn 2s infinite alternate;"></i>
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
                <img src="{{ asset('images/logo-n-trans.png') }}?v={{ time() }}" alt="Next Young Tech Logo" style="height: 38px; width: auto; filter: drop-shadow(0 2px 8px rgba(0, 242, 254, 0.5)); transition: transform 0.3s ease; object-fit: contain;">
                NEXT YOUNG <span>TECH</span>
            </a>
            
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ Route::is('about') ? 'active' : '' }}">Profil</a></li>
                <li><a href="{{ route('services') }}" class="nav-link {{ Route::is('services') ? 'active' : '' }}">Layanan</a></li>
                <li><a href="{{ route('features') }}" class="nav-link {{ Route::is('features') ? 'active' : '' }}">Fitur</a></li>
                <li><a href="{{ route('portfolio') }}" class="nav-link {{ Route::is('portfolio') ? 'active' : '' }}">Portofolio</a></li>
                @auth
                    <li><a href="{{ route('quotation.index') }}" class="nav-link {{ Route::is('quotation.index') ? 'active' : '' }}">Estimasi</a></li>
                    <li><a href="{{ route('review.create') }}" class="nav-link {{ Route::is('review.create') ? 'active' : '' }}">Ulasan</a></li>
                @endauth
            </ul>

            <div class="nav-actions">
                @auth
                    <a href="{{ route('profile') }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none; font-size: 13px; color: var(--text-main); font-weight: 500; transition: all 0.3s ease; flex-shrink: 0;" class="profile-nav-link">
                        @if(auth()->user()->foto_profil)
                            <img src="{{ auth()->user()->foto_profil_url }}" alt="{{ auth()->user()->nama }}" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--primary); box-shadow: 0 0 8px var(--primary-glow); flex-shrink: 0;">
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
                    <img src="{{ asset('images/logo-n-trans.png') }}" alt="Next Young Tech Logo" style="width: 28px; height: 28px; object-fit: contain; filter: drop-shadow(0 0 4px var(--primary-glow));">
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
                    <li><a href="{{ route('portfolio') }}"><i class="fa-solid fa-chevron-right"></i> Portofolio Kami</a></li>
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
        <a href="{{ route('portfolio') }}" class="mobile-nav-item {{ Route::is('portfolio') ? 'active' : '' }}">
            <div class="mobile-icon-wrapper">
                <i class="fa-solid fa-folder-open"></i>
            </div>
            <span>Karya</span>
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
                    <i class="fa-solid fa-robot"></i>
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
            <i class="fa-solid fa-user-tie"></i>
            <span class="nova-chat-tooltip">Tanya Nova AI</span>
        </button>

        <!-- Chat Window -->
        <div id="nova-chat-window" class="nova-chat-box">
            <!-- Header -->
            <div class="nova-chat-header">
                <div class="nova-chat-header-info">
                    <div class="nova-chat-avatar">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="nova-status-dot"></span>
                    </div>
                    <div>
                        <h4 class="nova-bot-name">Nova AI</h4>
                        <span class="nova-bot-status">Online • Virtual Assistant</span>
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
                        Halo! Saya <strong>Nova</strong>, asisten virtual Anda di <strong>Next Young Tech</strong>. Saya hadir untuk membantu mendiskusikan kebutuhan digital dan pengembangan website Anda secara profesional. Ada hal yang bisa saya bantu hari ini?
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
                        appendBotMessage("Baik, saya sedang mengarahkan Anda ke portal login...");
                        window.location.href = "{{ route('login') }}";
                    }, 800);
                    return;
                }

                // If user is guest and tries to order or click WhatsApp sales or calculation
                if (text === 'Hubungkan ke WA Sekarang' || text === 'Hubungi Sales WA' || text === 'Estimasi Biaya Proyek' || text === 'Buka Kalkulator Biaya' || text === 'Pesan') {
                    if (!userIsLoggedIn) {
                        setTimeout(() => {
                            typingIndicator.style.display = 'none';
                            appendBotMessage("Mohon maaf, untuk melakukan pemesanan proyek digital atau kalkulasi biaya, Anda perlu masuk (login) atau mendaftar akun terlebih dahulu.\n\nSilakan klik tautan di bawah ini untuk masuk ke portal akun Anda. Setelah masuk, Anda dapat menggunakan fitur estimasi biaya dan berkonsultasi secara resmi.\n\n👉 **[Masuk ke Portal / Daftar Akun]({{ route('login') }})**", [
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
                        appendBotMessage("Baik, saya sedang mengarahkan Anda ke WhatsApp tim sales kami. Jika tab baru tidak terbuka otomatis, silakan klik tautan berikut:\n\n👉 **[WhatsApp Sales Tim Ahli](https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20konsultasi%20pembuatan%20website%20premium.)**");
                        window.open("https://wa.me/628881023038?text=Halo%20Next%20Young%20Tech,%20saya%20tertarik%20konsultasi%20pembuatan%20website%20premium.", '_blank');
                    }, 1000);
                    return;
                } else if (text === 'Buka Kalkulator Biaya' || text === 'Estimasi Biaya Proyek') {
                    setTimeout(() => {
                        typingIndicator.style.display = 'none';
                        appendBotMessage("Tentu. Silakan akses Halaman Kalkulator Estimasi Biaya kami melalui tautan di bawah ini:\n\n👉 **[Kalkulator Estimasi Biaya]({{ route('quotation.index') }})**");
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
                    window.location.href = "{{ session('whatsapp_redirect') }}";
                }, 800);
            });
        </script>
    @endif

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Main Javascript File -->
    <script src="/js/app.js?v={{ time() }}"></script>
</body>
</html>
