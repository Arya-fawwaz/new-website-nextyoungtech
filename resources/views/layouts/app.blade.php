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

        <!-- Premium Loading Screen with Luxurious Animated Cyber Astronaut -->
        <div id="loading-screen">
            <div class="loader-content">
                <!-- Animated Floating Cyber Astronaut with Holographic concentric 3D orbits -->
                <div class="loader-character-wrapper">
                    <!-- Glow behind astronaut -->
                    <div class="loader-character-glow"></div>
                    
                    <!-- SVG Character Mark (viewBox 0 0 200 200) -->
                    <svg viewBox="0 0 200 200" class="loader-svg-character" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <!-- Visor Horizon Gradient -->
                            <linearGradient id="astro-visor-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color: var(--visor-grad-1);" />
                                <stop offset="50%" style="stop-color: var(--visor-grad-2);" />
                                <stop offset="100%" style="stop-color: var(--visor-grad-3);" />
                            </linearGradient>
                            
                            <!-- Jetpack Thruster Flame Gradients -->
                            <linearGradient id="astro-flame-grad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color: var(--flame-grad-1);" />
                                <stop offset="100%" style="stop-color: var(--flame-grad-2); stop-opacity: 0;" />
                            </linearGradient>
                            
                            <linearGradient id="astro-flame-grad-inner" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color: var(--flame-grad-inner-1);" />
                                <stop offset="100%" style="stop-color: var(--flame-grad-inner-2); stop-opacity: 0;" />
                            </linearGradient>

                            <!-- Chest Reactor Gradient -->
                            <linearGradient id="astro-reactor-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color: var(--reactor-grad-1);" />
                                <stop offset="100%" style="stop-color: var(--reactor-grad-2);" />
                            </linearGradient>

                            <!-- Concentric 3D Orbit Gradients -->
                            <linearGradient id="astro-orbit-grad-1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color: var(--orbit-grad-1a);" />
                                <stop offset="100%" style="stop-color: var(--orbit-grad-1b);" />
                            </linearGradient>
                            <linearGradient id="astro-orbit-grad-2" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color: var(--orbit-grad-2a);" />
                                <stop offset="100%" style="stop-color: var(--orbit-grad-2b);" />
                            </linearGradient>
                        </defs>

                        <!-- ================= BACK GROUP (Orbits behind astronaut) ================= -->
                        <g class="orbit-back-group">
                            <!-- Outer Orbit (Back Half) -->
                            <path d="M 15 100 A 85 24 0 0 1 185 100" fill="none" stroke="url(#astro-orbit-grad-1)" stroke-width="2.2" stroke-linecap="round" class="orbit-path orbit-1" />
                            <!-- Inner Orbit (Back Half) -->
                            <path d="M 35 100 A 65 18 0 0 1 165 100" fill="none" stroke="url(#astro-orbit-grad-2)" stroke-width="1.6" stroke-linecap="round" class="orbit-path orbit-2" />
                        </g>

                        <!-- ================= ASTRONAUT BODY (Floats) ================= -->
                        <g class="astronaut-body">
                            <!-- Jetpack Booster Backing -->
                            <rect x="73" y="86" width="12" height="32" rx="3" fill="var(--suit-dark)" stroke="var(--suit-stroke)" stroke-width="2.5" />
                            <rect x="115" y="86" width="12" height="32" rx="3" fill="var(--suit-dark)" stroke="var(--suit-stroke)" stroke-width="2.5" />
                            <!-- Nozzles -->
                            <path d="M 74 118 L 71 124 L 84 124 L 81 118 Z" fill="#475569" stroke="var(--suit-stroke)" stroke-width="2" />
                            <path d="M 116 118 L 113 124 L 126 124 L 123 118 Z" fill="#475569" stroke="var(--suit-stroke)" stroke-width="2" />
                            
                            <!-- Jetpack Flames (Outer and Inner) -->
                            <path d="M 71 124 C 64 142, 77 158, 77 158 C 77 158, 90 142, 83 124 Z" class="thruster-flame" fill="url(#astro-flame-grad)" />
                            <path d="M 113 124 C 106 142, 119 158, 119 158 C 119 158, 132 142, 125 124 Z" class="thruster-flame" fill="url(#astro-flame-grad)" />
                            <path d="M 74 124 C 71 133, 77 143, 77 143 C 77 143, 83 133, 80 124 Z" class="thruster-flame-inner" fill="url(#astro-flame-grad-inner)" />
                            <path d="M 116 124 C 113 133, 119 143, 119 143 C 119 143, 125 133, 122 124 Z" class="thruster-flame-inner" fill="url(#astro-flame-grad-inner)" />

                            <!-- Legs -->
                            <!-- Left Leg -->
                            <path d="M 84 133 C 79 146, 73 152, 76 166 L 86 166 C 84 156, 91 146, 92 133 Z" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linejoin="round" />
                            <path d="M 76 166 C 76 166, 70 170, 72 174 L 89 174 C 91 170, 86 166, 86 166 Z" fill="var(--suit-dark)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linejoin="round" />
                            <!-- Right Leg (Asymmetric float angle) -->
                            <path d="M 108 133 C 113 143, 118 147, 114 159 L 104 159 C 107 151, 102 143, 100 133 Z" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linejoin="round" />
                            <path d="M 114 159 C 114 159, 116 163, 112 167 L 96 167 C 96 163, 104 159, 104 159 Z" fill="var(--suit-dark)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linejoin="round" />

                            <!-- Suit Torso -->
                            <path d="M 80 95 C 80 95, 68 113, 84 133 L 116 133 C 132 113, 120 95, 120 95 Z" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linejoin="round" />
                            <!-- Chest Control Panel -->
                            <rect x="88" y="100" width="24" height="19" rx="3" fill="var(--suit-dark)" stroke="var(--suit-stroke)" stroke-width="1.8" />
                            <!-- Buttons on suit chest panel -->
                            <circle cx="94" cy="105" r="1.5" fill="#ef4444" />
                            <circle cx="100" cy="105" r="1.5" fill="#10b981" />
                            <circle cx="106" cy="105" r="1.5" fill="#3b82f6" />
                            <!-- Glowing Chest Reactor Core -->
                            <polygon points="100,109 106,113 106,120 100,124 94,120 94,113" class="reactor-core" fill="url(#astro-reactor-grad)" />

                            <!-- Left Arm (Waving elegantly) -->
                            <path d="M 80 97 C 64 97, 54 87, 57 74 C 59 69, 67 69, 65 75 C 63 84, 69 89, 80 89 Z" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M 57 74 C 56 72, 61 66, 65 69" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linecap="round" />
                            
                            <!-- Right Arm (Floating down) -->
                            <path d="M 120 97 C 135 101, 142 109, 138 121 C 136 127, 128 125, 130 119 C 132 111, 128 105, 120 101 Z" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M 138 121 C 139 123, 133 128, 130 125" stroke="var(--suit-stroke)" stroke-width="2.5" stroke-linecap="round" />

                            <!-- Helmet -->
                            <circle cx="100" cy="71" r="26" fill="var(--suit-main)" stroke="var(--suit-stroke)" stroke-width="2.5" />
                            <!-- Visor (Luxurious Horizon Gradient) -->
                            <path d="M 81 71 C 81 57, 119 57, 119 71 C 119 83, 81 83, 81 71 Z" fill="url(#astro-visor-grad)" stroke="var(--suit-stroke)" stroke-width="2.5" />
                            <!-- Visor Reflection Shine -->
                            <path d="M 85 67 C 91 59, 109 59, 115 67" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.65" />
                            <!-- Glow decals on helmet sides -->
                            <path d="M 74 71 L 78 71" stroke="var(--suit-glow)" stroke-width="2" stroke-linecap="round" />
                            <path d="M 122 71 L 126 71" stroke="var(--suit-glow)" stroke-width="2" stroke-linecap="round" />
                        </g>

                        <!-- ================= FRONT GROUP (Orbits in front of astronaut) ================= -->
                        <g class="orbit-front-group">
                            <!-- Outer Orbit (Front Half) -->
                            <path d="M 185 100 A 85 24 0 0 1 15 100" fill="none" stroke="url(#astro-orbit-grad-1)" stroke-width="2.2" stroke-linecap="round" class="orbit-path orbit-1" />
                            <!-- Inner Orbit (Front Half) -->
                            <path d="M 165 100 A 65 18 0 0 1 35 100" fill="none" stroke="url(#astro-orbit-grad-2)" stroke-width="1.6" stroke-linecap="round" class="orbit-path orbit-2" />
                        </g>
                    </svg>
                </div>
                
                <div class="loader-logo-container">
                    <h2 class="loader-logo">NEXT YOUNG <span>TECH</span></h2>
                    <div class="loader-sub">3D DEVELOPMENT AGENCY</div>
                </div>
                
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-fill" id="loader-progress-fill"></div>
                    </div>
                    <div class="progress-text">
                        <span class="status-msg"><i class="fa-solid fa-circle-notch fa-spin"></i> MENGINSTASIASI PORTAL 3D...</span>
                        <span id="loader-percentage" class="percentage-num">0%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inline Loader Styling and Transition Logic -->
        <style>
            :root {
                --loader-bg-dark: linear-gradient(180deg, #06060c 0%, #0c0c1b 100%);
                --loader-bg-light: linear-gradient(180deg, #f8fafc 0%, #e2e8f0 100%);
                
                /* Spacesuit cyber colors - Dark mode standard */
                --suit-main: #ffffff;
                --suit-dark: #0f172a;
                --suit-stroke: #1e293b;
                --suit-glow: #0ea5e9;
                
                --visor-grad-1: #0ea5e9;
                --visor-grad-2: #4f46e5;
                --visor-grad-3: #00f2fe;
                
                --flame-grad-1: #00f2fe;
                --flame-grad-2: rgba(0, 242, 254, 0.4);
                
                --flame-grad-inner-1: #ffffff;
                --flame-grad-inner-2: rgba(0, 242, 254, 0.8);
                
                --reactor-grad-1: #00f2fe;
                --reactor-grad-2: #0ea5e9;
                
                --orbit-grad-1a: #0ea5e9;
                --orbit-grad-1b: #4f46e5;
                --orbit-grad-2a: #00f2fe;
                --orbit-grad-2b: #0ea5e9;
            }

            html[data-theme="light"] {
                /* Spacesuit luxury metallic/rose-gold colors - Light mode overrides */
                --suit-main: #f8fafc;
                --suit-dark: #e2e8f0;
                --suit-stroke: #0f172a;
                --suit-glow: #4f46e5;
                
                --visor-grad-1: #ffb703;
                --visor-grad-2: #ff5e62;
                --visor-grad-3: #ff9f43;
                
                --flame-grad-1: #ff5e62;
                --flame-grad-2: rgba(255, 183, 3, 0.4);
                
                --flame-grad-inner-1: #ffffff;
                --flame-grad-inner-2: rgba(255, 183, 3, 0.8);
                
                --reactor-grad-1: #ffb703;
                --reactor-grad-2: #ff5e62;
                
                --orbit-grad-1a: #ff5e62;
                --orbit-grad-1b: #ffb703;
                --orbit-grad-2a: #4f46e5;
                --orbit-grad-2b: #0ea5e9;
            }

            #loading-screen {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: #06060c;
                background-image: var(--loader-bg-dark);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 99999;
                transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            }
            
            html[data-theme="light"] #loading-screen {
                background-color: #f8fafc;
                background-image: var(--loader-bg-light);
            }

            html.no-loader #loading-screen {
                display: none !important;
            }

            .loader-content {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 25px;
                max-width: 400px;
                width: 100%;
                padding: 20px;
            }

            /* Branded Character Animations */
            .loader-character-wrapper {
                position: relative;
                width: 170px;
                height: 170px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 5px;
            }

            .loader-character-glow {
                position: absolute;
                width: 180px;
                height: 180px;
                background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
                border-radius: 50%;
                z-index: -1;
                filter: blur(20px);
                animation: pulseGlow 3s ease-in-out infinite alternate;
            }

            @keyframes pulseGlow {
                0% { opacity: 0.45; transform: scale(0.9); }
                100% { opacity: 0.85; transform: scale(1.1); }
            }

            .loader-svg-character {
                width: 160px;
                height: 160px;
                overflow: visible;
            }

            /* Astronaut Floating Animation */
            .astronaut-body {
                transform-origin: 100px 100px;
                animation: floatAstronaut 3s ease-in-out infinite alternate;
            }

            @keyframes floatAstronaut {
                0% { transform: translateY(-4px) rotate(-1deg); }
                100% { transform: translateY(6px) rotate(1deg); }
            }

            /* Flame Flickering Animation */
            .thruster-flame {
                transform-origin: center top;
                animation: thrusterFire 0.15s ease-in-out infinite alternate;
            }
            .thruster-flame-inner {
                transform-origin: center top;
                animation: thrusterFireInner 0.1s ease-in-out infinite alternate;
            }
            @keyframes thrusterFire {
                0% { transform: scaleY(0.9) scaleX(0.95); opacity: 0.85; }
                100% { transform: scaleY(1.15) scaleX(1.05); opacity: 1; }
            }
            @keyframes thrusterFireInner {
                0% { transform: scaleY(0.85) scaleX(0.9); opacity: 0.9; }
                100% { transform: scaleY(1.2) scaleX(1.1); opacity: 1; }
            }

            /* Chest Reactor Pulsing Glow */
            .reactor-core {
                transform-origin: 100px 116px;
                animation: reactorPulse 1.5s ease-in-out infinite alternate;
            }
            @keyframes reactorPulse {
                0% { transform: scale(0.85); opacity: 0.7; }
                100% { transform: scale(1.15); opacity: 1; }
            }

            /* Orbit dashboard sliding dash animation (creates the illusion of rotation) */
            .orbit-1 {
                stroke-dasharray: 24 16;
                animation: slideDash1 5s linear infinite;
            }
            .orbit-2 {
                stroke-dasharray: 18 12;
                animation: slideDash2 3.8s linear infinite;
            }
            @keyframes slideDash1 {
                to { stroke-dashoffset: -80; }
            }
            @keyframes slideDash2 {
                to { stroke-dashoffset: 60; }
            }

            .loader-logo-container {
                margin-top: 5px;
            }

            .loader-logo {
                font-family: var(--font-heading);
                font-size: 24px;
                font-weight: 900;
                letter-spacing: 3px;
                color: var(--text-main);
                margin-bottom: 6px;
                text-transform: uppercase;
                transition: color 0.3s ease;
            }

            .loader-logo span {
                background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .loader-sub {
                font-family: var(--font-body);
                font-size: 11px;
                color: var(--text-muted);
                letter-spacing: 5px;
                text-transform: uppercase;
                opacity: 0.65;
                font-weight: 600;
                transition: color 0.3s ease;
            }

            .progress-container {
                width: 100%;
                max-width: 300px;
                margin-top: 15px;
            }

            .progress-bar {
                width: 100%;
                height: 3px;
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
                background: linear-gradient(90deg, var(--primary), var(--secondary));
                box-shadow: 0 0 8px var(--primary-glow);
                border-radius: 10px;
                transition: width 0.1s linear;
            }

            .progress-text {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 12px;
                font-size: 11px;
                font-weight: 500;
                font-family: var(--font-body);
            }

            .status-msg {
                color: var(--text-muted);
                letter-spacing: 0.5px;
                text-transform: uppercase;
                opacity: 0.85;
                transition: color 0.3s ease;
            }

            .percentage-num {
                font-family: var(--font-heading);
                color: var(--primary);
                text-shadow: 0 0 5px var(--primary-glow);
                font-weight: 700;
                transition: color 0.3s ease;
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
                            <img src="{{ auth()->user()->foto_profil_url }}" alt="{{ auth()->user()->nama }}" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--primary); box-shadow: 0 0 8px var(--primary-glow); flex-shrink: 0;">
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
