@extends('layouts.app')

@section('title', 'Dashboard Admin | Next Young Tech')

@section('content')

<style>
    /* ==========================================================
       TEMA PREMIUM CANGGIH & ELEGAN (AUTO-ADAPTIVE COLOR)
       ========================================================== */
    :root {
        /* Light Mode - Elegan & Bersih */
        --bg-body: #f8fafc;
        --bg-panel: #ffffff;
        --bg-sidebar: #ffffff;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --hover-bg: #f1f5f9;
        
        /* Shadow Premium */
        --shadow-sm: 0 2px 4px rgba(0,0,0,0.02);
        --shadow-md: 0 10px 30px -10px rgba(0,0,0,0.08);
        --shadow-hover: 0 20px 40px -10px rgba(79, 70, 229, 0.15);
        
        /* Warna Aksen Tech */
        --primary: #4f46e5;
        --primary-glow: rgba(79, 70, 229, 0.15);
        --secondary: #0ea5e9;
        --accent: #f43f5e;
        --success: #10b981;
        --warning: #f59e0b;
        --grid-color: rgba(79, 70, 229, 0.03);
    }

    [data-theme="dark"] {
        /* Dark Mode - Sci-Fi / Cyberpunk Minimalis */
        --bg-body: #020617;
        --bg-panel: #0f172a;
        --bg-sidebar: #0f172a;
        --text-main: #f8fafc;
        --text-muted: #94a3b8;
        --border-color: #1e293b;
        --hover-bg: #1e293b;
        
        --shadow-sm: 0 2px 4px rgba(0,0,0,0.5);
        --shadow-md: 0 10px 30px -10px rgba(0,0,0,0.8);
        --shadow-hover: 0 20px 40px -10px rgba(99, 102, 241, 0.35);
        
        --primary: #6366f1;
        --primary-glow: rgba(99, 102, 241, 0.25);
        --grid-color: rgba(99, 102, 241, 0.05);
    }

    /* Reset Dasar */
    body, .admin-dashboard-layout {
        background-color: var(--bg-body) !important;
        color: var(--text-main);
        transition: background-color 0.4s ease, color 0.4s ease;
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    body, .admin-main-panel, .admin-sidebar-overlay {
        filter: none !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
    }

    /* Layout Panel Utama dengan Grid Cyber Futuristik */
    .admin-main-panel {
        min-height: 100vh;
        background-color: var(--bg-body) !important;
        background-image: none !important; /* Menghilangkan pola titik-titik statis lama */
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .admin-content-wrapper {
        position: relative;
        z-index: 10;
    }

    .admin-mobile-header {
        position: relative;
        z-index: 15;
    }

    /* Floating Glow Orbs for Futuristic Sci-Fi Ambient */
    .glow-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.12;
        pointer-events: none;
        z-index: 1;
        animation: floatGlow 20s infinite alternate ease-in-out;
    }
    [data-theme="dark"] .glow-orb {
        opacity: 0.22;
    }

    /* Futuristic Cyber Radar Scanning Bar */
    .cyber-scanner {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(to right, transparent, var(--primary), var(--secondary), transparent);
        opacity: 0.06;
        pointer-events: none;
        z-index: 2;
        animation: cyberScan 14s infinite linear;
    }
    [data-theme="dark"] .cyber-scanner {
        opacity: 0.12;
    }
    @keyframes cyberScan {
        0% { transform: translateY(-50px); }
        100% { transform: translateY(115vh); }
    }
    .glow-orb-1 {
        width: 450px;
        height: 450px;
        background: radial-gradient(circle, var(--primary) 0%, transparent 80%);
        top: -100px;
        right: -100px;
        animation-duration: 22s;
    }
    .glow-orb-2 {
        width: 550px;
        height: 550px;
        background: radial-gradient(circle, var(--secondary) 0%, transparent 80%);
        bottom: -150px;
        left: -100px;
        animation-duration: 30s;
        animation-delay: -5s;
    }
    .glow-orb-3 {
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, var(--accent) 0%, transparent 80%);
        top: 35%;
        left: 45%;
        animation-duration: 25s;
        animation-delay: -10s;
    }

    @keyframes floatGlow {
        0% {
            transform: translate(0, 0) scale(1) rotate(0deg);
        }
        50% {
            transform: translate(40px, 60px) scale(1.1) rotate(180deg);
        }
        100% {
            transform: translate(-30px, -40px) scale(0.9) rotate(360deg);
        }
    }

    /* Sidebar Elegan */
    .admin-sidebar {
        background: var(--bg-sidebar) !important;
        border-right: 1px solid var(--border-color) !important;
        width: 280px; height: 100vh;
        position: fixed; left: 0; top: 0;
        z-index: 100;
        display: flex; flex-direction: column;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-md);
    }

    /* Tombol Navigasi Sidebar */
    .admin-sidebar-menu { list-style: none; padding: 0 20px; margin: 0; flex-grow: 1; }
    .admin-sidebar-menu button {
        width: 100%;
        background: transparent; border: none;
        color: var(--text-muted) !important;
        padding: 14px 18px; border-radius: 12px;
        font-size: 14px; font-weight: 600;
        display: flex; align-items: center; gap: 12px;
        cursor: pointer; transition: all 0.2s ease; text-align: left;
        margin-bottom: 4px;
    }
    .admin-sidebar-menu button:hover {
        color: var(--text-main) !important;
        background: var(--hover-bg);
        transform: translateX(5px);
    }
    .admin-sidebar-menu .active button,
    .admin-sidebar-menu .active button i {
        color: #ffffff !important;
        background: var(--primary) !important;
        box-shadow: 0 8px 20px var(--primary-glow);
    }

    /* Force high-contrast white text for active sidebar items in light theme */
    [data-theme="light"] .admin-sidebar-menu .active button,
    [data-theme="light"] .admin-sidebar-menu .active button i {
        color: #ffffff !important;
        background: var(--primary) !important;
    }

    /* Kartu Konten Canggih */
    .glass-card {
        background: var(--bg-panel) !important;
        border: 1px solid var(--border-color) !important;
        box-shadow: var(--shadow-md) !important;
        border-radius: 24px;
        padding: 35px;
        transition: all 0.3s ease;
    }
    .glass-card:hover { box-shadow: var(--shadow-hover) !important; border-color: var(--primary) !important; }

    /* Header Navigasi Atas */
    .admin-mobile-header {
        background: var(--bg-panel) !important;
        border-bottom: 1px solid var(--border-color) !important;
        padding: 15px 35px;
        display: flex; justify-content: space-between; align-items: center;
        position: sticky; top: 0; z-index: 80;
        box-shadow: var(--shadow-sm);
    }

    /* Overlay Mobile */
    .admin-sidebar-overlay {
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(0, 0, 0, 0.5); z-index: 90;
        opacity: 0; visibility: hidden; transition: 0.3s ease;
    }
    .admin-sidebar-overlay.active { opacity: 1; visibility: visible; }

    /* Input & Form Premium */
    .form-control-glass {
        width: 100%; padding: 14px 18px;
        border: 2px solid var(--border-color);
        background-color: var(--bg-body);
        color: var(--text-main);
        border-radius: 14px; font-size: 14px; font-weight: 500;
        transition: all 0.2s ease;
    }
    .form-control-glass:focus {
        outline: none; border-color: var(--primary);
        background-color: var(--bg-panel);
        box-shadow: 0 0 0 4px var(--primary-glow);
    }

    /* Kartu Statistik Gradien Keren */
    .admin-stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 35px; }
    .stat-card-premium {
        border-radius: 24px; padding: 30px;
        color: #ffffff !important; position: relative; overflow: hidden;
        box-shadow: 0 15px 35px -10px rgba(0,0,0,0.2) !important; border: none !important;
        transition: transform 0.3s ease;
    }
    .stat-card-premium:hover { transform: translateY(-5px); }
    .stat-card-premium .stat-icon { position: absolute; right: -20px; bottom: -20px; font-size: 140px; opacity: 0.15; transform: rotate(-15deg); }
    .bg-grad-1 { background: linear-gradient(135deg, #4f46e5, #818cf8) !important; }
    .bg-grad-2 { background: linear-gradient(135deg, #0ea5e9, #38bdf8) !important; }
    .bg-grad-3 { background: linear-gradient(135deg, #10b981, #34d399) !important; }

    /* Desain Tabel Super Rapi */
    .admin-table { width: 100%; border-collapse: separate; border-spacing: 0; text-align: left; }
    .admin-table th { 
        background-color: var(--hover-bg) !important; 
        color: var(--text-muted); 
        padding: 16px 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
    }
    .admin-table th:first-child { border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
    .admin-table th:last-child { border-top-right-radius: 12px; border-bottom-right-radius: 12px; }
    .admin-table td { 
        padding: 20px; 
        border-bottom: 1px solid var(--border-color) !important; 
        color: var(--text-main); font-size: 14px;
        vertical-align: middle;
    }
    .admin-table tbody tr { transition: background 0.2s ease; }
    .admin-table tbody tr:hover { background-color: var(--hover-bg) !important; }

    /* Lencana Status Elegan */
    .badge-status { padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; letter-spacing: 0.5px; }
    .badge-pending { background: rgba(245, 158, 11, 0.1); color: var(--warning); border: 1px solid rgba(245, 158, 11, 0.3); }
    .badge-approved { background: rgba(16, 185, 129, 0.1); color: var(--success); border: 1px solid rgba(16, 185, 129, 0.3); }
    .badge-primary { background: var(--primary-glow); color: var(--primary); border: 1px solid rgba(79, 70, 229, 0.3); }

    /* Tombol Tema (Dark/Light) */
    .theme-toggle-btn {
        background: var(--bg-body); border: 1px solid var(--border-color);
        color: var(--text-main); font-size: 18px; width: 44px; height: 44px;
        cursor: pointer; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        box-shadow: var(--shadow-sm); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .theme-toggle-btn:hover { transform: rotate(15deg) scale(1.1); border-color: var(--primary); color: var(--primary); }

    /* Animasi Tab */
    .tab-section { display: none; }
    .tab-section.active { display: block; animation: fadeUp 0.4s ease-out forwards; }
    @keyframes fadeUp { 0% { opacity: 0; transform: translateY(15px); } 100% { opacity: 1; transform: translateY(0); } }

    /* Modal Super Rapi */
    .modal-overlay {
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
        background: rgba(2, 6, 23, 0.85); display: flex; justify-content: center; align-items: center;
        z-index: 9999; opacity: 0; visibility: hidden; transition: all 0.3s ease;
    }
    .modal-overlay.show { opacity: 1; visibility: visible; }
    .modal-content {
        background: var(--bg-panel); width: 100%; max-width: 600px;
        border-radius: 24px; padding: 40px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        transform: scale(0.95) translateY(20px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid var(--border-color);
        position: relative;
        max-height: 90vh;
        overflow-y: auto;
    }
    .modal-overlay.show .modal-content { transform: scale(1) translateY(0); }

    /* Ping Server Animation */
    .ping-container { display: flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 700; color: var(--text-muted); }
    .ping-dot { width: 8px; height: 8px; background-color: var(--success); border-radius: 50%; position: relative; }
    .ping-dot::after {
        content: ''; width: 100%; height: 100%; border-radius: 50%;
        background-color: var(--success); position: absolute; top:0; left:0;
        animation: pulsePing 1.8s infinite ease-in-out;
    }
    @keyframes pulsePing { 0% { transform: scale(1); opacity: 1; } 100% { transform: scale(3.5); opacity: 0; } }

    /* Hide mobile bottom navigation bar on desktop by default */
    .admin-mobile-nav {
        display: none;
    }

    /* ==========================================================
       MOBILE RESPONSIVE & ANDROID NATIVE LOOK (Screens <= 992px)
       ========================================================== */
    @media (max-width: 992px) {
        /* Hide side-panel by default and style as clean sliding drawer */
        .admin-sidebar {
            transform: translateX(-100%);
            height: 100vh;
            position: fixed;
            box-shadow: var(--shadow-md);
            border-right: 1px solid var(--border-color) !important;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            left: 0;
            top: 0;
            width: 280px;
            z-index: 1001;
        }
        
        .admin-sidebar.active {
            transform: translateX(0);
        }
        
        /* Adjust main panel to take full screen width */
        .admin-main-panel {
            margin-left: 0 !important;
            padding-bottom: 96px !important; /* Spacious spacing for Admin Bottom Navigation */
        }
        
        .admin-mobile-header {
            padding: 12px 20px !important;
        }

        .admin-content-wrapper {
            padding: 24px 16px !important;
        }
        
        /* Adjust stats grid */
        .admin-stats-grid {
            grid-template-columns: 1fr !important;
            gap: 15px;
        }
        
        .stat-card-premium {
            padding: 24px 20px !important;
            border-radius: 18px !important;
        }
        
        .stat-card-premium div {
            font-size: 28px !important;
        }
        
        /* Glassmorphic Grid Cards */
        .glass-card {
            padding: 20px 16px !important;
            border-radius: 20px !important;
        }

        /* Responsive Table Wrap */
        .glass-card > div[style*="overflow-x: auto"] {
            margin: 0 -16px;
            padding: 0 16px;
            -webkit-overflow-scrolling: touch;
        }

        .admin-table th, .admin-table td {
            padding: 12px 14px !important;
            font-size: 13px !important;
        }
        
        /* Floating Admin Mobile Bottom Navigation Bar */
        .admin-mobile-nav {
            display: flex !important;
            position: fixed;
            bottom: 12px;
            left: 12px;
            right: 12px;
            width: calc(100% - 24px);
            height: 64px;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            z-index: 999;
            padding: 0 4px;
            align-items: center;
            justify-content: space-around;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4), inset 0 1px 1px rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        [data-theme="light"] .admin-mobile-nav {
            background: rgba(255, 255, 255, 0.88) !important;
            border-color: rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06), inset 0 1px 1px rgba(255, 255, 255, 0.8) !important;
        }
        
        .admin-mobile-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 9px;
            font-weight: 700;
            gap: 3px;
            flex-grow: 1;
            height: 100%;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            border: none;
            background: transparent;
            padding-top: 4px;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }
        
        .admin-mobile-icon-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 26px;
            border-radius: 13px;
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        
        .admin-mobile-nav-item i {
            font-size: 16px;
            color: var(--text-muted);
            transition: transform 0.2s ease;
        }
        
        .admin-mobile-nav-item.active {
            color: var(--primary);
        }
        
        .admin-mobile-nav-item.active i {
            color: var(--primary);
            transform: scale(1.1);
        }
        
        .admin-mobile-nav-item.active .admin-mobile-icon-wrapper {
            background: var(--primary-glow);
        }
        
        [data-theme="light"] .admin-mobile-nav-item.active {
            color: var(--primary) !important;
        }
        [data-theme="light"] .admin-mobile-nav-item.active i {
            color: var(--primary) !important;
        }
    }
</style>

<div class="admin-dashboard-layout">
    
    <div class="admin-sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="admin-sidebar" id="adminSidebar">
        <div style="padding: 30px 25px; display: flex; align-items: center; gap: 12px;">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 2L2 9.5V22.5L16 30L30 22.5V9.5L16 2Z" stroke="var(--primary)" stroke-width="2.5" stroke-linejoin="round" />
                <path d="M16 12L12 14.5V17.5L16 20L20 17.5V14.5L16 12Z" fill="var(--primary)" />
            </svg>
            <span style="color: var(--text-main); font-weight: 800; font-size: 16px; letter-spacing: 0.5px;">NEXT YOUNG <span style="color: var(--primary);">TECH</span></span>
        </div>

        <div style="padding: 0 25px 20px 25px; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid var(--border-color); margin-bottom: 20px;">
            <div style="position: relative;">
                @if(auth()->check() && auth()->user()->foto_profil)
                    <img src="{{ asset(auth()->user()->foto_profil) }}" alt="Profil" style="width:48px; height:48px; border-radius:12px; object-fit:cover; border:2px solid var(--primary);">
                @else
                    <div style="width:48px; height:48px; border-radius:12px; background: var(--hover-bg); display: flex; align-items: center; justify-content: center; border: 2px solid var(--primary);">
                        <i class="fa-solid fa-user-tie" style="color: var(--primary); font-size:18px;"></i>
                    </div>
                @endif
                <div style="position: absolute; bottom: -4px; right: -4px; width: 14px; height: 14px; background: var(--success); border-radius: 50%; border: 3px solid var(--bg-sidebar);"></div>
            </div>
            <div>
                <span style="color: var(--text-main); font-weight: 700; display: block; font-size: 15px;">{{ auth()->check() ? auth()->user()->nama : 'Admin System' }}</span>
                <span style="color: var(--primary); font-size: 12px; font-weight: 600;">Super Administrator</span>
            </div>
        </div>

        <ul class="admin-sidebar-menu">
            <li class="admin-menu-item active" id="menu-btn-overview">
                <button onclick="switchAdminTab('overview')"><i class="fa-solid fa-layer-group"></i> Ringkasan Utama</button>
            </li>
            <li class="admin-menu-item" id="menu-btn-services">
                <button onclick="switchAdminTab('services')"><i class="fa-solid fa-cubes"></i> Kelola Layanan</button>
            </li>
            <li class="admin-menu-item" id="menu-btn-quotes">
                <button onclick="switchAdminTab('quotes')"><i class="fa-solid fa-file-invoice"></i> Pesanan Proyek</button>
            </li>
            <li class="admin-menu-item" id="menu-btn-inquiries">
                <button onclick="switchAdminTab('inquiries')"><i class="fa-solid fa-comments"></i> Pesan Klien</button>
            </li>
            <li class="admin-menu-item" id="menu-btn-users">
                <button onclick="switchAdminTab('users')"><i class="fa-solid fa-user-shield"></i> Kelola Pengguna</button>
            </li>
            <li class="admin-menu-item" id="menu-btn-pembukuan">
                <button onclick="switchAdminTab('pembukuan')"><i class="fa-solid fa-book-bookmark"></i> Pembukuan & Reset</button>
            </li>
        </ul>

        <div style="padding: 25px; border-top: 1px solid var(--border-color);">
            <a href="{{ route('home') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px; font-size: 13px; font-weight: 700; border-radius: 12px; text-decoration:none; color: var(--text-main); background: var(--hover-bg); border: 1px solid var(--border-color); margin-bottom: 12px; transition: 0.2s;" onmouseover="this.style.background='var(--border-color)'" onmouseout="this.style.background='var(--hover-bg)'">
                <i class="fa-solid fa-globe"></i> Lihat Website
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px; font-size: 13px; font-weight: 700; border-radius: 12px; border: 1px solid rgba(244, 63, 94, 0.3); background: rgba(244, 63, 94, 0.1); color: var(--accent); cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(244, 63, 94, 0.1)'; this.style.color='var(--accent)';">
                    <i class="fa-solid fa-power-off"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-main-panel" style="margin-left: 280px;">
        <!-- Canvas Animasi Gelombang Digital Premium -->
        <canvas id="cyber-bg-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; opacity: 0.85;"></canvas>
        
        <!-- Glowing background orbs for futuristic visual effect -->
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>
        <div class="cyber-scanner"></div>
        
        <header class="admin-mobile-header">
            <div style="display: flex; align-items: center; gap: 20px;">
                <button class="admin-sidebar-toggle" onclick="toggleSidebar()" style="background: var(--bg-body); border: 1px solid var(--border-color); color: var(--text-main); font-size: 18px; cursor: pointer; padding: 8px 12px; border-radius: 8px;">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <div class="ping-container">
                    <div class="ping-dot"></div>
                    <span class="system-ping-label">SYSTEM ONLINE (14ms)</span>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 12px; position: relative;">
                <!-- Theme Toggle Button -->
                <button id="themeToggleBtn" class="theme-toggle-btn" onclick="toggleTheme()">
                    <i class="fa-solid fa-moon"></i>
                </button>
                
                <!-- Quick User Profile Dropdown Button -->
                <button class="theme-toggle-btn" onclick="toggleQuickProfileDropdown(event)" style="cursor: pointer; overflow: hidden; padding: 0;" title="Kelola Akun">
                    @if(auth()->check() && auth()->user()->foto_profil)
                        <img src="{{ asset(auth()->user()->foto_profil) }}" alt="Profil" style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <i class="fa-solid fa-user-tie" style="font-size: 15px;"></i>
                    @endif
                </button>
                
                <!-- Quick Dropdown Content Card -->
                <div id="quickProfileDropdown" class="glass-card" style="display: none; position: absolute; top: 56px; right: 0; width: 220px; padding: 20px; z-index: 1000; border-radius: 16px; border: 1px solid var(--border-color); box-shadow: var(--shadow-md);">
                    <div style="text-align: center; margin-bottom: 15px; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">
                        <span style="font-weight: 700; font-size: 14px; color: var(--text-main); display: block;">{{ auth()->check() ? auth()->user()->nama : 'Admin System' }}</span>
                        <span style="font-size: 11px; color: var(--primary); font-weight: 600;">Super Administrator</span>
                    </div>
                    <a href="{{ route('home') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px; font-size: 12px; font-weight: 700; border-radius: 10px; text-decoration:none; color: var(--text-main); background: var(--hover-bg); border: 1px solid var(--border-color); margin-bottom: 10px; transition: 0.2s;" onmouseover="this.style.background='var(--border-color)'" onmouseout="this.style.background='var(--hover-bg)'">
                        <i class="fa-solid fa-globe"></i> Lihat Website
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 10px; font-size: 12px; font-weight: 700; border-radius: 10px; border: 1px solid rgba(244, 63, 94, 0.3); background: rgba(244, 63, 94, 0.1); color: var(--accent); cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(244, 63, 94, 0.1)'; this.style.color='var(--accent)';">
                            <i class="fa-solid fa-power-off"></i> Keluar Sistem
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="admin-content-wrapper" style="padding: 40px;">
            
            <!-- Session Success & Errors Alerts -->
            @if(session('success'))
                <div style="background: rgba(16, 185, 129, 0.12); border: 1px solid rgba(16, 185, 129, 0.3); color: var(--success); padding: 16px 24px; border-radius: 16px; margin-bottom: 30px; display: flex; align-items: center; gap: 12px; font-weight: 600; font-size: 14.5px;">
                    <i class="fa-solid fa-circle-check" style="font-size: 20px;"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div style="background: rgba(244, 63, 94, 0.12); border: 1px solid rgba(244, 63, 94, 0.3); color: var(--accent); padding: 16px 24px; border-radius: 16px; margin-bottom: 30px; display: flex; flex-direction: column; gap: 8px; font-weight: 600; font-size: 14.5px;">
                    @foreach ($errors->all() as $error)
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-triangle-exclamation" style="font-size: 18px;"></i>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <div style="margin-bottom: 40px;">
                <h2 style="font-size: 32px; font-weight: 800; color: var(--text-main); margin: 0 0 8px 0; letter-spacing: -0.5px;">Dashboard Cerdas</h2>
                <p style="color: var(--text-muted); font-size: 15px; margin: 0;">Kendali penuh atas katalog layanan dinamis, proyek masuk, dan otentikasi tim Next Young Tech.</p>
            </div>

            <!-- SECTION 1: OVERVIEW -->
            <div id="admin-section-overview" class="tab-section active">
                <div class="admin-stats-grid">
                    <div class="stat-card-premium bg-grad-1">
                        <i class="fa-solid fa-chart-line stat-icon"></i>
                        <span style="font-size: 13px; font-weight: 700; opacity: 0.9; letter-spacing: 1px;">TOTAL POTENSI OMSET</span>
                        <div style="font-size: 36px; font-weight: 900; margin: 15px 0 5px 0; letter-spacing: -1px;">Rp {{ number_format($totalEstimatedValue ?? 0, 0, ',', '.') }}</div>
                        <span style="font-size: 13px; opacity: 0.9; font-weight: 500;"><i class="fa-solid fa-bolt" style="color: #fbbf24;"></i> Estimasi nilai proyek masuk</span>
                    </div>
                    <div class="stat-card-premium bg-grad-2">
                        <i class="fa-solid fa-briefcase stat-icon"></i>
                        <span style="font-size: 13px; font-weight: 700; opacity: 0.9; letter-spacing: 1px;">PERMINTAAN PROYEK</span>
                        <div style="font-size: 36px; font-weight: 900; margin: 15px 0 5px 0;">{{ $totalQuotations ?? 0 }} <span style="font-size: 18px; font-weight: 600;">Proyek</span></div>
                        <span style="font-size: 13px; opacity: 0.9; font-weight: 500;"><i class="fa-solid fa-clock"></i> Membutuhkan validasi</span>
                    </div>
                    <div class="stat-card-premium bg-grad-3">
                        <i class="fa-solid fa-inbox stat-icon"></i>
                        <span style="font-size: 13px; font-weight: 700; opacity: 0.9; letter-spacing: 1px;">PESAN KLIEN</span>
                        <div style="font-size: 36px; font-weight: 900; margin: 15px 0 5px 0;">{{ $totalInquiries ?? 0 }} <span style="font-size: 18px; font-weight: 600;">Pesan</span></div>
                        <span style="font-size: 13px; opacity: 0.9; font-weight: 500;"><i class="fa-solid fa-circle-exclamation" style="color: #fef08a;"></i> Menunggu balasan</span>
                    </div>
                </div>

                <div class="glass-card" style="margin-top: 30px;">
                    <h3 style="font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0 0 20px 0;"><i class="fa-solid fa-bullseye" style="color:var(--primary); margin-right:8px;"></i> Pintasan Aksi Cerdas</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                        <button onclick="switchAdminTab('services')" style="background: var(--hover-bg); border: 1px solid var(--border-color); color: var(--text-main); padding: 20px; border-radius: 16px; font-weight: 700; cursor: pointer; text-align: left; transition: 0.2s; display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-cubes" style="font-size:24px; color: var(--primary);"></i>
                            <div>
                                <span style="display:block; font-size:14px;">Kelola Katalog</span>
                                <span style="font-size:11px; color: var(--text-muted); font-weight: 500;">Tambah/Ubah Layanan</span>
                            </div>
                        </button>
                        <button onclick="switchAdminTab('quotes')" style="background: var(--hover-bg); border: 1px solid var(--border-color); color: var(--text-main); padding: 20px; border-radius: 16px; font-weight: 700; cursor: pointer; text-align: left; transition: 0.2s; display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-file-invoice" style="font-size:24px; color: var(--secondary);"></i>
                            <div>
                                <span style="display:block; font-size:14px;">Pesanan Masuk</span>
                                <span style="font-size:11px; color: var(--text-muted); font-weight: 500;">Tinjau Estimasi Biaya</span>
                            </div>
                        </button>
                        <button onclick="switchAdminTab('users')" style="background: var(--hover-bg); border: 1px solid var(--border-color); color: var(--text-main); padding: 20px; border-radius: 16px; font-weight: 700; cursor: pointer; text-align: left; transition: 0.2s; display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-user-shield" style="font-size:24px; color: var(--success);"></i>
                            <div>
                                <span style="display:block; font-size:14px;">Akses Keamanan</span>
                                <span style="font-size:11px; color: var(--text-muted); font-weight: 500;">Daftar Akun Admin</span>
                            </div>
                        </button>
                        <button onclick="switchAdminTab('pembukuan')" style="background: var(--hover-bg); border: 1px solid var(--border-color); color: var(--text-main); padding: 20px; border-radius: 16px; font-weight: 700; cursor: pointer; text-align: left; transition: 0.2s; display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-book-bookmark" style="font-size:24px; color: var(--accent);"></i>
                            <div>
                                <span style="display:block; font-size:14px;">Pembukuan & Laporan</span>
                                <span style="font-size:11px; color: var(--text-muted); font-weight: 500;">Tutup Buku & Reset Data</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: DYNAMIC SERVICES (CRUD) -->
            <div id="admin-section-services" class="tab-section">
                <div class="glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                        <h3 style="font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0;"><i class="fa-solid fa-cubes" style="color: var(--primary); margin-right: 10px;"></i> Katalog Layanan Dinamis</h3>
                        <div style="display: flex; gap: 10px;">
                            <button onclick="openAddServiceModal()" style="background: var(--primary); color: white; padding: 12px 22px; border: none; border-radius: 12px; font-weight: 700; font-size: 14px; cursor: pointer; box-shadow: 0 4px 15px var(--primary-glow); transition: 0.3s; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-plus"></i> Tambah Layanan Baru
                            </button>
                        </div>
                    </div>

                    @if(empty($layanan) || count($layanan) === 0)
                        <div style="text-align: center; padding: 60px 0; color: var(--text-muted); background: var(--bg-body); border-radius: 16px; border: 2px dashed var(--border-color);">
                            <i class="fa-solid fa-box-open" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p style="font-size: 15px; font-weight: 600;">Belum ada layanan yang tersimpan di database.</p>
                        </div>
                    @else
                        <div style="overflow-x: auto;">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Urutan</th>
                                        <th>Ikon</th>
                                        <th>Nama Paket / Layanan</th>
                                        <th>Badge</th>
                                        <th>Harga Master</th>
                                        <th>Warna Aksen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($layanan as $lay)
                                        <tr>
                                            <td style="font-weight: 800; font-size: 16px; width: 60px; text-align: center;">{{ $lay->urutan }}</td>
                                            <td>
                                                <div style="width: 42px; height: 42px; border-radius: 50%; background: var(--hover-bg); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-color);">
                                                    <i class="{{ $lay->ikon }}" style="color: {{ in_array($lay->warna_aksen, ['primary', 'secondary', 'accent', 'success', 'warning']) ? 'var(--' . $lay->warna_aksen . ')' : $lay->warna_aksen }}; font-size: 18px;"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <strong style="font-size: 15px;">{{ $lay->nama_paket }}</strong><br>
                                                <span style="font-size: 12px; color: var(--text-muted);">{{ $lay->nama_layanan }}</span>
                                            </td>
                                            <td>
                                                @if($lay->badge)
                                                    <span class="badge-status badge-primary">{{ $lay->badge }}</span>
                                                @else
                                                    <span style="color: var(--text-muted); font-style: italic; font-size: 12px;">Tidak Ada</span>
                                                @endif
                                            </td>
                                            <td style="font-weight: 800;">Rp {{ number_format($lay->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <span style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 13px;">
                                                    <span style="width: 14px; height: 14px; border-radius: 50%; background-color: {{ in_array($lay->warna_aksen, ['primary', 'secondary', 'accent', 'success', 'warning']) ? 'var(--' . $lay->warna_aksen . ')' : $lay->warna_aksen }}; display: inline-block; border: 1px solid var(--border-color);"></span>
                                                    {{ $lay->warna_aksen }}
                                                </span>
                                            </td>
                                            <td>
                                                <div style="display: flex; gap: 8px;">
                                                    <button onclick="openEditServiceModal('{{ $lay->id }}', '{{ $lay->nama_layanan }}', '{{ $lay->nama_paket }}', '{{ $lay->badge }}', '{{ $lay->deskripsi }}', '{{ (int)$lay->harga }}', '{{ is_array($lay->fitur_list) ? implode(', ', $lay->fitur_list) : '' }}', '{{ $lay->ikon }}', '{{ $lay->warna_aksen }}', '{{ $lay->urutan }}')" style="background: rgba(245, 158, 11, 0.1); color: var(--warning); border: 1px solid rgba(245, 158, 11, 0.3); padding: 8px 14px; border-radius: 8px; cursor:pointer; font-weight:700; transition: 0.2s;" onmouseover="this.style.background='var(--warning)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(245, 158, 11, 0.1)'; this.style.color='var(--warning)';"><i class="fa-solid fa-pen"></i></button>
                                                    
                                                    <form action="{{ route('admin.service.delete', $lay->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini dari database?')" style="margin: 0;">
                                                        @csrf
                                                        <button type="submit" style="background: rgba(244, 63, 94, 0.1); color: var(--accent); border: 1px solid rgba(244, 63, 94, 0.3); padding: 8px 14px; border-radius: 8px; cursor:pointer; font-weight:700; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(244, 63, 94, 0.1)'; this.style.color='var(--accent)';"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- SECTION 3: PROJECT ORDERS (QUOTATION REQUESTS) -->
            <div id="admin-section-quotes" class="tab-section">
                <div class="glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
                        <h3 style="font-size: 20px; font-weight: 800; margin: 0; color: var(--text-main);"><i class="fa-solid fa-receipt" style="color: var(--secondary); margin-right: 10px;"></i> Data Estimasi Proyek</h3>
                        <a href="{{ route('admin.export', 'quotes') }}" style="background: var(--success); color: white; padding: 10px 18px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                            <i class="fa-solid fa-file-excel"></i> Unduh Laporan (CSV)
                        </a>
                    </div>
                    
                    @if(empty($quotations) || count($quotations) === 0)
                        <div style="text-align: center; padding: 60px 0; color: var(--text-muted); background: var(--bg-body); border-radius: 16px; border: 2px dashed var(--border-color);">
                            <i class="fa-solid fa-folder-open" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p style="font-size: 15px; font-weight: 600;">Belum ada pesanan proyek yang masuk.</p>
                        </div>
                    @else
                        <div style="overflow-x: auto;">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Nama Klien</th>
                                        <th>Kontak WA</th>
                                        <th>ID/Tipe Proyek</th>
                                        <th>Nilai Proyek</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotations as $quote)
                                        <tr>
                                            <td>
                                                <strong style="font-size: 15px;">{{ $quote->nama_klien }}</strong><br>
                                                <span style="font-size: 13px; color: var(--text-muted);">{{ $quote->email_klien }}</span>
                                            </td>
                                            <td>
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $quote->telepon_klien) }}" target="_blank" style="color: var(--success); text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px; background: rgba(16, 185, 129, 0.1); border-radius: 8px;">
                                                    <i class="fa-brands fa-whatsapp" style="font-size: 16px;"></i> WhatsApp
                                                </a>
                                            </td>
                                            <td>
                                                @php
                                                    $projectLayanan = \App\Models\Layanan::find($quote->tipe_proyek);
                                                @endphp
                                                <span class="badge-status badge-primary">
                                                    {{ $projectLayanan ? $projectLayanan->nama_paket : strtoupper(str_replace('_', ' ', $quote->tipe_proyek)) }}
                                                </span>
                                            </td>
                                            <td style="font-weight: 800; font-size: 15px;">Rp {{ number_format($quote->estimasi_harga, 0, ',', '.') }}</td>
                                            <td>
                                                <form action="{{ route('admin.quotation.status', $quote->id) }}" method="POST">
                                                    @csrf
                                                    <select name="status" class="form-control-glass" style="margin: 0; padding: 8px 12px; width: auto; font-weight: 700; cursor: pointer;" onchange="this.form.submit()">
                                                        <option value="pending" {{ $quote->status === 'pending' ? 'selected' : '' }}>Tertunda</option>
                                                        <option value="reviewed" {{ $quote->status === 'reviewed' ? 'selected' : '' }}>Diulas</option>
                                                        <option value="approved" {{ $quote->status === 'approved' ? 'selected' : '' }}>Disetujui</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- SECTION 4: CLIENT MESSAGES (INQUIRIES) -->
            <div id="admin-section-inquiries" class="tab-section">
                <div class="glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
                        <h3 style="font-size: 20px; font-weight: 800; margin: 0; color: var(--text-main);"><i class="fa-solid fa-comments" style="color: var(--warning); margin-right: 10px;"></i> Kotak Pesan Masuk</h3>
                        <a href="{{ route('admin.export', 'inquiries') }}" style="background: var(--success); color: white; padding: 10px 18px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                            <i class="fa-solid fa-file-excel"></i> Unduh Laporan (CSV)
                        </a>
                    </div>
                    @if(empty($inquiries) || count($inquiries) === 0)
                        <div style="text-align: center; padding: 60px 0; color: var(--text-muted); background: var(--bg-body); border-radius: 16px; border: 2px dashed var(--border-color);">
                            <i class="fa-solid fa-envelope-open" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                            <p style="font-size: 15px; font-weight: 600;">Tidak ada pertanyaan dari klien.</p>
                        </div>
                    @else
                        <div style="overflow-x: auto;">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Pengirim</th>
                                        <th>Subjek</th>
                                        <th>Isi Pesan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inquiries as $inq)
                                        <tr>
                                            <td>
                                                <strong style="font-size: 15px;">{{ $inq->nama }}</strong><br>
                                                <span style="font-size: 13px; color: var(--text-muted); display: block; margin-bottom: 4px;">{{ $inq->email }}</span>
                                                @if($inq->telepon)
                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->telepon) }}" target="_blank" style="color: var(--success); text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; padding: 4px 8px; background: rgba(16, 185, 129, 0.1); border-radius: 6px; font-size: 12px; transition: 0.2s;" onmouseover="this.style.background='rgba(16, 185, 129, 0.2)'" onmouseout="this.style.background='rgba(16, 185, 129, 0.1)'">
                                                        <i class="fa-brands fa-whatsapp" style="font-size: 14px;"></i> {{ $inq->telepon }}
                                                    </a>
                                                @else
                                                    <span style="font-size: 11px; color: var(--text-muted); font-style: italic;">Tidak ada telepon</span>
                                                @endif
                                            </td>
                                            <td><strong style="color: var(--text-main);">{{ $inq->subjek }}</strong></td>
                                            <td style="max-width: 350px; font-size: 14px; line-height: 1.6; color: var(--text-muted);">{{ $inq->pesan }}</td>
                                            <td>
                                                <form action="{{ route('admin.inquiry.status', $inq->id) }}" method="POST">
                                                    @csrf
                                                    <select name="status" class="form-control-glass" style="margin: 0; padding: 8px 12px; width: auto; font-weight: 700; cursor: pointer;" onchange="this.form.submit()">
                                                        <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>Baru</option>
                                                        <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                                                        <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- SECTION 5: USER MANAGEMENT (ADMIN USERS) -->
            <div id="admin-section-users" class="tab-section">
                <div class="glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                        <h3 style="font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0;"><i class="fa-solid fa-user-shield" style="color: var(--success); margin-right: 10px;"></i> Akses Keamanan & Tim</h3>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('admin.export', 'users') }}" style="background: var(--success); color: white; padding: 10px 18px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: 0.2s; justify-content: center; height: fit-content;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                <i class="fa-solid fa-file-excel"></i> CSV
                            </a>
                            <button onclick="openUserModal('add')" style="background: var(--primary); color: white; padding: 12px 20px; border: none; border-radius: 12px; font-weight: 700; font-size: 14px; cursor: pointer; box-shadow: 0 4px 15px var(--primary-glow); transition: 0.3s; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-plus"></i> Tambah Admin Baru
                            </button>
                        </div>
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Identitas</th>
                                    <th>Alamat Email</th>
                                    <th>Otoritas</th>
                                    <th>Konfigurasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $usr)
                                    <tr>
                                        <td><strong style="font-size: 15px;">{{ $usr->nama }}</strong></td>
                                        <td style="color: var(--text-muted); font-weight: 500;">{{ $usr->email }}</td>
                                        <td>
                                            @if($usr->is_admin)
                                                <span class="badge-status badge-primary"><i class="fa-solid fa-crown" style="margin-right: 4px;"></i> Super Admin</span>
                                            @else
                                                <span class="badge-status badge-pending"><i class="fa-solid fa-user" style="margin-right: 4px;"></i> Staff/Klien</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 8px;">
                                                <button onclick="openUserModal('edit', '{{ $usr->id }}', '{{ $usr->nama }}', '{{ $usr->email }}', '{{ $usr->is_admin ? 1 : 0 }}')" style="background: rgba(245, 158, 11, 0.1); color: var(--warning); border: 1px solid rgba(245, 158, 11, 0.3); padding: 8px 14px; border-radius: 8px; cursor:pointer; font-weight:700; transition: 0.2s;" onmouseover="this.style.background='var(--warning)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(245, 158, 11, 0.1)'; this.style.color='var(--warning)';"><i class="fa-solid fa-pen"></i></button>
                                                
                                                <form action="{{ route('admin.user.delete', $usr->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" style="margin: 0;">
                                                    @csrf
                                                    <button type="submit" style="background: rgba(244, 63, 94, 0.1); color: var(--accent); border: 1px solid rgba(244, 63, 94, 0.3); padding: 8px 14px; border-radius: 8px; cursor:pointer; font-weight:700; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';" onmouseout="this.style.background='rgba(244, 63, 94, 0.1)'; this.style.color='var(--accent)';"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- SECTION 6: PEMBUKUAN & TUTUP PEMBUKUAN -->
            <div id="admin-section-pembukuan" class="tab-section">
                <div class="glass-card" style="margin-bottom: 30px;">
                    <h3 style="font-size: 20px; font-weight: 800; color: var(--text-main); margin: 0 0 20px 0;"><i class="fa-solid fa-wallet" style="color:var(--primary); margin-right:8px;"></i> Ringkasan Pembukuan</h3>
                    <p style="color: var(--text-muted); font-size: 14.5px; margin-bottom: 25px;">Halaman ini digunakan untuk mengelola pembukuan transaksi saat ini. Anda dapat mengunduh laporan berformat Excel yang dirancang secara profesional dengan warna tema yang harmonis, dan melakukan penutupan pembukuan (wipe data) untuk memulai periode baru.</p>
                    
                    <div class="admin-stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
                        <div class="stat-card-premium bg-grad-1" style="padding: 20px;">
                            <span style="font-size: 11px; font-weight: 700; opacity: 0.9; letter-spacing: 0.5px;">POTENSI OMSET BERJALAN</span>
                            <div style="font-size: 24px; font-weight: 900; margin: 10px 0 5px 0;">Rp {{ number_format($totalEstimatedValue ?? 0, 0, ',', '.') }}</div>
                            <span style="font-size: 11px; opacity: 0.9; font-weight: 500;">Dari estimasi penawaran klien</span>
                        </div>
                        <div class="stat-card-premium bg-grad-2" style="padding: 20px;">
                            <span style="font-size: 11px; font-weight: 700; opacity: 0.9; letter-spacing: 0.5px;">TOTAL PROYEK AKTIF</span>
                            <div style="font-size: 24px; font-weight: 900; margin: 10px 0 5px 0;">{{ count($quotations) }} Proyek</div>
                            <span style="font-size: 11px; opacity: 0.9; font-weight: 500;">Permintaan estimasi biaya masuk</span>
                        </div>
                        <div class="stat-card-premium bg-grad-3" style="padding: 20px;">
                            <span style="font-size: 11px; font-weight: 700; opacity: 0.9; letter-spacing: 0.5px;">TOTAL PESAN MASUK</span>
                            <div style="font-size: 24px; font-weight: 900; margin: 10px 0 5px 0;">{{ count($inquiries) }} Pesan</div>
                            <span style="font-size: 11px; opacity: 0.9; font-weight: 500;">Pertanyaan klien di form kontak</span>
                        </div>
                    </div>
                </div>

                <div class="glass-card" style="border: 1px solid rgba(244, 63, 94, 0.2) !important;">
                    <div style="display: flex; align-items: flex-start; gap: 20px; flex-wrap: wrap;">
                        <div style="width: 60px; height: 60px; border-radius: 16px; background: rgba(244, 63, 94, 0.1); display: flex; align-items: center; justify-content: center; border: 1px solid rgba(244, 63, 94, 0.3);">
                            <i class="fa-solid fa-triangle-exclamation" style="color: var(--accent); font-size: 24px;"></i>
                        </div>
                        <div style="flex: 1; min-width: 250px;">
                            <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0 0 10px 0;">Tutup Periode Pembukuan</h3>
                            <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6; margin: 0 0 20px 0;">
                                Tindakan ini akan **menghapus secara permanen** semua data pesan masuk (inquiries) dan data permintaan penawaran proyek (quotation requests) dari database untuk memulai masa buku baru.
                                <br><br>
                                <strong style="color: var(--text-main);"><i class="fa-solid fa-circle-info" style="color:var(--secondary);"></i> Informasi Safeguard:</strong> Sistem akan **secara otomatis mengunduh laporan Excel lengkap berdesain premium** sebelum data benar-benar dihapus untuk mencegah hilangnya data penting agensi.
                            </p>
                            
                            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                                <a href="{{ route('admin.export', 'quotes') }}" style="background: var(--success); color: white; padding: 12px 20px; border-radius: 12px; font-weight: 700; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                    <i class="fa-solid fa-file-excel"></i> Unduh Laporan Excel (Quotes)
                                </a>
                                <a href="{{ route('admin.export', 'inquiries') }}" style="background: var(--success); color: white; padding: 12px 20px; border-radius: 12px; font-weight: 700; font-size: 13.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                    <i class="fa-solid fa-file-excel"></i> Unduh Laporan Excel (Inquiries)
                                </a>
                                <button onclick="openTutupPembukuanModal()" style="background: var(--accent); color: white; padding: 12px 24px; border: none; border-radius: 12px; font-weight: 700; font-size: 13.5px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 15px rgba(244, 63, 94, 0.3); transition: 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                    <i class="fa-solid fa-dumpster-fire"></i> Tutup Pembukuan & Reset Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Floating Admin Mobile Bottom Navigation Bar (Android Native Look & Feel) -->
    <nav class="admin-mobile-nav">
        <button class="admin-mobile-nav-item active" id="mob-menu-btn-overview" onclick="switchAdminTab('overview')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <span>Ringkasan</span>
        </button>
        <button class="admin-mobile-nav-item" id="mob-menu-btn-services" onclick="switchAdminTab('services')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-cubes"></i>
            </div>
            <span>Layanan</span>
        </button>
        <button class="admin-mobile-nav-item" id="mob-menu-btn-quotes" onclick="switchAdminTab('quotes')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-file-invoice"></i>
            </div>
            <span>Pesanan</span>
        </button>
        <button class="admin-mobile-nav-item" id="mob-menu-btn-inquiries" onclick="switchAdminTab('inquiries')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-comments"></i>
            </div>
            <span>Pesan</span>
        </button>
        <button class="admin-mobile-nav-item" id="mob-menu-btn-users" onclick="switchAdminTab('users')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <span>Pengguna</span>
        </button>
        <button class="admin-mobile-nav-item" id="mob-menu-btn-pembukuan" onclick="switchAdminTab('pembukuan')">
            <div class="admin-mobile-icon-wrapper">
                <i class="fa-solid fa-book-bookmark"></i>
            </div>
            <span>Laporan</span>
        </button>
    </nav>
</div>

<!-- ==========================================================================
     MODAL LAYANAN: TAMBAH LAYANAN
     ========================================================================== -->
<div id="addServiceModal" class="modal-overlay">
    <div class="modal-content">
        <button class="btn-close-modal" onclick="closeModal('addServiceModal')" style="position: absolute; right: 25px; top: 25px; background: var(--hover-bg); border: none; width: 36px; height: 36px; border-radius: 50%; color: var(--text-main); font-size: 16px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';"><i class="fa-solid fa-xmark"></i></button>
        
        <h3 style="margin: 0 0 25px 0; font-size: 22px; font-weight: 800; color: var(--text-main); border-bottom: 2px solid var(--border-color); padding-bottom: 15px;">
            <i class="fa-solid fa-plus-circle" style="color:var(--primary); margin-right:10px;"></i> Tambah Layanan Baru
        </h3>
        
        <form action="{{ route('admin.service.store') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Kategori Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control-glass" required placeholder="Contoh: Web Development">
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control-glass" required placeholder="Contoh: Web Design Premium">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Badge Promo (Opsional)</label>
                    <input type="text" name="badge" class="form-control-glass" placeholder="Contoh: POPULER, HEMAT">
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Harga Mulai Dari (Rupiah)</label>
                    <input type="number" name="harga" class="form-control-glass" required placeholder="Contoh: 1500000" style="font-weight:700;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Deskripsi Singkat</label>
                <textarea name="deskripsi" class="form-control-glass" required placeholder="Masukkan deskripsi keunggulan paket..." style="height: 80px; resize: none;"></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Fitur Checklist (Pisahkan dengan Koma)</label>
                <textarea name="fitur_list" class="form-control-glass" required placeholder="Contoh: Desain Visual Responsif, Custom Domain .com, Setup Email Bisnis" style="height: 70px; resize: none;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 80px; gap: 15px; margin-bottom: 25px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Class Ikon FontAwesome</label>
                    <input type="text" name="ikon" class="form-control-glass" required placeholder="Contoh: fa-solid fa-code" value="fa-solid fa-code">
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Warna Aksen</label>
                    <select name="warna_aksen" class="form-control-glass" style="cursor: pointer; font-weight:600;">
                        <option value="primary">Indigo / Primary</option>
                        <option value="secondary">Sky Blue / Secondary</option>
                        <option value="accent">Rose Red / Accent</option>
                        <option value="success">Green / Success</option>
                        <option value="warning">Orange / Warning</option>
                    </select>
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Urutan</label>
                    <input type="number" name="urutan" class="form-control-glass" required value="1" style="text-align: center; font-weight: 700;">
                </div>
            </div>
            
            <button type="submit" style="width:100%; background: var(--primary); color:white; border:none; padding:16px; border-radius:12px; font-size: 15px; font-weight:800; cursor:pointer; box-shadow: 0 10px 20px var(--primary-glow); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> Simpan Layanan Baru
            </button>
        </form>
    </div>
</div>

<!-- ==========================================================================
     MODAL LAYANAN: EDIT LAYANAN
     ========================================================================== -->
<div id="editServiceModal" class="modal-overlay">
    <div class="modal-content">
        <button class="btn-close-modal" onclick="closeModal('editServiceModal')" style="position: absolute; right: 25px; top: 25px; background: var(--hover-bg); border: none; width: 36px; height: 36px; border-radius: 50%; color: var(--text-main); font-size: 16px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';"><i class="fa-solid fa-xmark"></i></button>
        
        <h3 style="margin: 0 0 25px 0; font-size: 22px; font-weight: 800; color: var(--text-main); border-bottom: 2px solid var(--border-color); padding-bottom: 15px;">
            <i class="fa-solid fa-edit" style="color:var(--warning); margin-right:10px;"></i> Modifikasi Detail Layanan
        </h3>
        
        <form id="editServiceForm" action="#" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Kategori Layanan</label>
                    <input type="text" name="nama_layanan" id="editInputLayanan" class="form-control-glass" required>
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Nama Paket</label>
                    <input type="text" name="nama_paket" id="editInputPaket" class="form-control-glass" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Badge Promo</label>
                    <input type="text" name="badge" id="editInputBadge" class="form-control-glass">
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Harga Master (Rupiah)</label>
                    <input type="number" name="harga" id="editInputHarga" class="form-control-glass" required style="font-weight:700;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Deskripsi Singkat</label>
                <textarea name="deskripsi" id="editInputDesc" class="form-control-glass" required style="height: 80px; resize: none;"></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Fitur Checklist (Pisahkan dengan Koma)</label>
                <textarea name="fitur_list" id="editInputFitur" class="form-control-glass" required style="height: 70px; resize: none;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 80px; gap: 15px; margin-bottom: 25px;">
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Class Ikon FontAwesome</label>
                    <input type="text" name="ikon" id="editInputIkon" class="form-control-glass" required>
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Warna Aksen</label>
                    <select name="warna_aksen" id="editInputWarna" class="form-control-glass" style="cursor: pointer; font-weight:600;">
                        <option value="primary">Indigo / Primary</option>
                        <option value="secondary">Sky Blue / Secondary</option>
                        <option value="accent">Rose Red / Accent</option>
                        <option value="success">Green / Success</option>
                        <option value="warning">Orange / Warning</option>
                    </select>
                </div>
                <div>
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:6px;">Urutan</label>
                    <input type="number" name="urutan" id="editInputUrutan" class="form-control-glass" required style="text-align: center; font-weight: 700;">
                </div>
            </div>
            
            <button type="submit" style="width:100%; background: var(--warning); color:white; border:none; padding:16px; border-radius:12px; font-size: 15px; font-weight:800; cursor:pointer; box-shadow: 0 10px 20px rgba(245, 158, 11, 0.2); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<!-- ==========================================================================
     MODAL TIM PENGGUNA: KELOLA PENGGUNA
     ========================================================================== -->
<div id="userModal" class="modal-overlay">
    <div class="modal-content">
        <button class="btn-close-modal" onclick="closeModal('userModal')" style="position: absolute; right: 25px; top: 25px; background: var(--hover-bg); border: none; width: 36px; height: 36px; border-radius: 50%; color: var(--text-main); font-size: 16px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';"><i class="fa-solid fa-xmark"></i></button>
        
        <h3 id="modalTitle" style="margin: 0 0 30px 0; font-size: 24px; font-weight: 800; color: var(--text-main); border-bottom: 2px solid var(--border-color); padding-bottom: 15px;">Akses Kontrol</h3>
        
        <form id="userForm" action="#" method="POST">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="font-size:13px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:8px;">Nama Lengkap</label>
                <input type="text" id="modalInputNama" name="nama" class="form-control-glass" required placeholder="Contoh: John Doe">
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="font-size:13px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:8px;">Email Terverifikasi</label>
                <input type="email" id="modalInputEmail" name="email" class="form-control-glass" required placeholder="john@perusahaan.com">
            </div>
            
            <div style="margin-bottom: 20px;">
                <label style="font-size:13px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:8px;">Kode Keamanan (Password)</label>
                <input type="password" id="modalInputPassword" name="kata_sandi" class="form-control-glass" placeholder="Masukkan password...">
            </div>
            
            <div style="margin-bottom: 30px;">
                <label style="font-size:13px; font-weight:700; color:var(--text-muted); display:block; margin-bottom:8px;">Tingkatan Otoritas</label>
                <select id="modalInputRole" name="is_admin" class="form-control-glass" style="cursor: pointer; font-weight: 600;">
                    <option value="1">Root / Super Admin</option>
                    <option value="0">Staff Operasional</option>
                </select>
            </div>
            
            <button type="submit" style="width:100%; background: var(--primary); color:white; border:none; padding:16px; border-radius:12px; font-size: 15px; font-weight:800; cursor:pointer; box-shadow: 0 10px 20px var(--primary-glow); transition: 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="fa-solid fa-check-double" style="margin-right: 8px;"></i> Otentikasi & Simpan
            </button>
        </form>
    </div>
</div>

<!-- ==========================================================================
     MODAL PEMBUKUAN: TUTUP PEMBUKUAN (RESET DATA)
     ========================================================================== -->
<div id="tutupPembukuanModal" class="modal-overlay">
    <div class="modal-content" style="max-width: 500px; border: 2px solid var(--accent);">
        <button class="btn-close-modal" onclick="closeModal('tutupPembukuanModal')" style="position: absolute; right: 25px; top: 25px; background: var(--hover-bg); border: none; width: 36px; height: 36px; border-radius: 50%; color: var(--text-main); font-size: 16px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='var(--accent)'; this.style.color='#fff';"><i class="fa-solid fa-xmark"></i></button>
        
        <h3 style="margin: 0 0 20px 0; font-size: 22px; font-weight: 800; color: var(--text-main); border-bottom: 2px solid var(--border-color); padding-bottom: 15px;">
            <i class="fa-solid fa-triangle-exclamation" style="color:var(--accent); margin-right:10px;"></i> Konfirmasi Tutup Pembukuan
        </h3>
        
        <div style="background: rgba(244, 63, 94, 0.08); border: 1px solid rgba(244, 63, 94, 0.2); padding: 15px; border-radius: 12px; margin-bottom: 20px; font-size: 13.5px; color: var(--text-muted); line-height: 1.6;">
            ⚠️ <strong style="color: var(--accent);">TINDAKAN DESTRUKTIF!</strong><br>
            Seluruh data **pesan klien (inquiries)** dan **pesanan estimasi biaya (quotations)** akan dihapus selamanya. Pastikan Anda telah mengunduh laporan cadangan.
        </div>

        <form action="{{ route('admin.tutup-pembukuan') }}" method="POST" id="tutupPembukuanForm">
            @csrf
            
            <div style="margin-bottom: 25px;">
                <label style="font-size:12.5px; font-weight:700; color:var(--text-main); display:block; margin-bottom:8px; line-height: 1.4;">
                    Ketik kata <span style="color: var(--accent); font-weight: 800;">"TUTUP PEMBUKUAN"</span> di bawah ini untuk konfirmasi:
                </label>
                <input type="text" name="konfirmasi" id="inputKonfirmasiTutup" class="form-control-glass" required autocomplete="off" placeholder="TUTUP PEMBUKUAN" style="border-color: var(--accent); text-align: center; font-weight: 800; letter-spacing: 1px;">
            </div>
            
            <div style="display: flex; gap: 10px;">
                <button type="button" onclick="closeModal('tutupPembukuanModal')" style="flex: 1; background: var(--hover-bg); color: var(--text-main); border: 1px solid var(--border-color); padding: 14px; border-radius: 12px; font-size: 14px; font-weight: 700; cursor: pointer; transition: 0.2s;">
                    Batalkan
                </button>
                <button type="submit" id="btnSubmitTutupPembukuan" disabled style="flex: 1.5; background: var(--accent); color: white; border: none; padding: 14px; border-radius: 12px; font-size: 14px; font-weight: 800; cursor: not-allowed; opacity: 0.5; transition: 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <i class="fa-solid fa-trash-can"></i> Tutup & Reset Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function switchAdminTab(tabName) {
        const sections = ['overview', 'quotes', 'inquiries', 'users', 'services', 'pembukuan'];
        sections.forEach(sec => {
            const sectionEl = document.getElementById('admin-section-' + sec);
            const btnEl = document.getElementById('menu-btn-' + sec);
            const mobBtnEl = document.getElementById('mob-menu-btn-' + sec);
            if (sectionEl) sectionEl.classList.remove('active');
            if (btnEl) btnEl.classList.remove('active');
            if (mobBtnEl) mobBtnEl.classList.remove('active');
        });

        const activeSec = document.getElementById('admin-section-' + tabName);
        const activeBtn = document.getElementById('menu-btn-' + tabName);
        const activeMobBtn = document.getElementById('mob-menu-btn-' + tabName);

        if (activeSec) activeSec.classList.add('active');
        if (activeBtn) activeBtn.classList.add('active');
        if (activeMobBtn) activeMobBtn.classList.add('active');
        
        localStorage.setItem('admin_active_tab', tabName);
        
        const sidebar = document.getElementById('adminSidebar');
        if (sidebar && sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    }

    function toggleSidebar() {
        document.getElementById('adminSidebar').classList.toggle('active');
        document.getElementById('sidebarOverlay').classList.toggle('active');
    }

    function toggleTheme() {
        const htmlEl = document.documentElement;
        const iconBtn = document.querySelector('#themeToggleBtn i');
        
        if (htmlEl.getAttribute('data-theme') === 'dark') {
            htmlEl.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
            if (iconBtn) {
                iconBtn.className = 'fa-solid fa-moon';
                iconBtn.style.color = 'var(--text-main)';
            }
        } else {
            htmlEl.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            if (iconBtn) {
                iconBtn.className = 'fa-solid fa-sun';
                iconBtn.style.color = '#fbbf24';
            }
        }
    }

    function toggleQuickProfileDropdown(event) {
        event.stopPropagation();
        const dd = document.getElementById('quickProfileDropdown');
        if (dd) {
            if (dd.style.display === 'none' || dd.style.display === '') {
                dd.style.display = 'block';
                dd.style.animation = 'fadeUp 0.3s ease-out forwards';
            } else {
                dd.style.display = 'none';
            }
        }
    }

    // Close dropdown on click outside
    document.addEventListener('click', function(e) {
        const dd = document.getElementById('quickProfileDropdown');
        if (dd && dd.style.display === 'block') {
            const dropdown = e.target.closest('#quickProfileDropdown');
            const toggle = e.target.closest('button[onclick*="toggleQuickProfileDropdown"]');
            if (!dropdown && !toggle) {
                dd.style.display = 'none';
            }
        }
    });

    // MODAL OPENERS
    function openAddServiceModal() {
        document.getElementById('addServiceModal').classList.add('show');
    }

    function openEditServiceModal(id, category, name, badge, desc, price, features, icon, accent, order) {
        const modal = document.getElementById('editServiceModal');
        const form = document.getElementById('editServiceForm');
        form.action = `/admin/layanan/${id}/update`;
        document.getElementById('editInputLayanan').value = category;
        document.getElementById('editInputPaket').value = name;
        document.getElementById('editInputBadge').value = badge;
        document.getElementById('editInputDesc').value = desc;
        document.getElementById('editInputHarga').value = price;
        document.getElementById('editInputFitur').value = features;
        document.getElementById('editInputIkon').value = icon;
        document.getElementById('editInputWarna').value = accent;
        document.getElementById('editInputUrutan').value = order;
        modal.classList.add('show');
    }

    function openUserModal(actionType, id = '', name = '', email = '', is_admin = 0) {
        const modal = document.getElementById('userModal');
        const form = document.getElementById('userForm');
        if (actionType === 'edit') {
            form.action = `/admin/pengguna/${id}/update`;
            document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-fingerprint" style="color:var(--primary); margin-right:10px;"></i> Modifikasi Otoritas';
            document.getElementById('modalInputNama').value = name;
            document.getElementById('modalInputEmail').value = email;
            document.getElementById('modalInputPassword').placeholder = 'Kosongkan jika tidak ingin diubah...';
            document.getElementById('modalInputPassword').required = false;
            document.getElementById('modalInputRole').value = is_admin;
        } else {
            form.action = `{{ route('admin.user.store') }}`;
            document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-user-astronaut" style="color:var(--primary); margin-right:10px;"></i> Registrasi Identitas Baru';
            document.getElementById('modalInputNama').value = '';
            document.getElementById('modalInputEmail').value = '';
            document.getElementById('modalInputPassword').placeholder = 'Masukkan password baru...';
            document.getElementById('modalInputPassword').required = true;
            document.getElementById('modalInputRole').value = 1; // Default Admin
        }
        modal.classList.add('show');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('show');
    }

    // JS FOR TUTUP PEMBUKUAN SAFEGUARD & MODAL
    function openTutupPembukuanModal() {
        document.getElementById('tutupPembukuanModal').classList.add('show');
        const input = document.getElementById('inputKonfirmasiTutup');
        const btn = document.getElementById('btnSubmitTutupPembukuan');
        input.value = '';
        btn.disabled = true;
        btn.style.cursor = 'not-allowed';
        btn.style.opacity = '0.5';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const inputTutup = document.getElementById('inputKonfirmasiTutup');
        if (inputTutup) {
            inputTutup.addEventListener('input', function(e) {
                const btn = document.getElementById('btnSubmitTutupPembukuan');
                if (e.target.value.trim() === 'TUTUP PEMBUKUAN') {
                    btn.disabled = false;
                    btn.style.cursor = 'pointer';
                    btn.style.opacity = '1';
                } else {
                    btn.disabled = true;
                    btn.style.cursor = 'not-allowed';
                    btn.style.opacity = '0.5';
                }
            });
        }

        const formTutup = document.getElementById('tutupPembukuanForm');
        if (formTutup) {
            formTutup.addEventListener('submit', function(e) {
                // Trigger background downloads as a safeguard before database truncation
                const downloadQuotes = document.createElement('a');
                downloadQuotes.href = "{{ route('admin.export', 'quotes') }}";
                downloadQuotes.target = "_blank";
                document.body.appendChild(downloadQuotes);
                downloadQuotes.click();
                document.body.removeChild(downloadQuotes);

                setTimeout(() => {
                    const downloadInquiries = document.createElement('a');
                    downloadInquiries.href = "{{ route('admin.export', 'inquiries') }}";
                    downloadInquiries.target = "_blank";
                    document.body.appendChild(downloadInquiries);
                    downloadInquiries.click();
                    document.body.removeChild(downloadInquiries);
                }, 800);
            });
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.querySelector('#themeToggleBtn i').className = 'fa-solid fa-sun';
            document.querySelector('#themeToggleBtn i').style.color = '#fbbf24';
        }
        
        const savedTab = localStorage.getItem('admin_active_tab');
        if (savedTab && ['overview', 'quotes', 'inquiries', 'users', 'services', 'pembukuan'].includes(savedTab)) {
            switchAdminTab(savedTab);
        }
    });

    // ==========================================================
    // ANIMASI CYBER BACKGROUND DIGITAL WAVE & LIGHT DUST
    // ==========================================================
    (function() {
        const canvas = document.getElementById('cyber-bg-canvas');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        let width = canvas.width = canvas.offsetWidth;
        let height = canvas.height = canvas.offsetHeight;

        window.addEventListener('resize', () => {
            if (canvas.offsetWidth !== width || canvas.offsetHeight !== height) {
                width = canvas.width = canvas.offsetWidth;
                height = canvas.height = canvas.offsetHeight;
            }
        });

        // Setup Floating Particles / Cyber Light Dust
        const particles = [];
        const maxParticles = 35;
        
        class CyberParticle {
            constructor() {
                this.reset();
                this.y = Math.random() * height; // Start at random vertical positions initially
            }
            reset() {
                this.x = Math.random() * width;
                this.y = height + Math.random() * 80;
                this.speed = Math.random() * 0.45 + 0.15;
                this.size = Math.random() * 2.5 + 0.8;
                this.alpha = Math.random() * 0.4 + 0.1;
                this.oscillationSpeed = Math.random() * 0.015 + 0.003;
                this.oscillationDistance = Math.random() * 15 + 5;
                this.angle = Math.random() * Math.PI * 2;
            }
            update() {
                this.y -= this.speed;
                this.angle += this.oscillationSpeed;
                this.xOffset = Math.sin(this.angle) * this.oscillationDistance;
                
                if (this.y < -10) {
                    this.reset();
                }
            }
            draw() {
                const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary').trim() || '#6366f1';
                ctx.fillStyle = primaryColor;
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x + this.xOffset, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // Initialize particles
        for (let i = 0; i < maxParticles; i++) {
            particles.push(new CyberParticle());
        }

        let time = 0;
        
        function animate() {
            ctx.clearRect(0, 0, width, height);
            
            // Ambil warna tema aktual secara dinamis (mendukung perubahan dark/light mode instant)
            const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary').trim() || '#6366f1';
            const secondaryColor = getComputedStyle(document.documentElement).getPropertyValue('--secondary').trim() || '#0ea5e9';
            
            time += 0.0025;
            
            // 1. GELOMBANG NEON DIGITAL 1 (Primary Color - Lambat & Besar)
            ctx.beginPath();
            ctx.strokeStyle = primaryColor;
            ctx.lineWidth = 2;
            ctx.globalAlpha = 0.07;
            for (let x = 0; x < width; x += 8) {
                const y = Math.sin(x * 0.0018 + time) * Math.cos(x * 0.0004 - time * 0.4) * 90 + height * 0.52;
                if (x === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.stroke();

            // 2. GELOMBANG NEON DIGITAL 2 (Secondary Color - Fase Bergeser & Sedang)
            ctx.beginPath();
            ctx.strokeStyle = secondaryColor;
            ctx.lineWidth = 1.5;
            ctx.globalAlpha = 0.05;
            for (let x = 0; x < width; x += 8) {
                const y = Math.cos(x * 0.0012 - time * 0.8) * Math.sin(x * 0.0006 + time * 0.25) * 110 + height * 0.48;
                if (x === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.stroke();

            // 3. GELOMBANG NEON DIGITAL 3 (Primary Color - Cepat & Halus)
            ctx.beginPath();
            ctx.strokeStyle = primaryColor;
            ctx.lineWidth = 1;
            ctx.globalAlpha = 0.035;
            for (let x = 0; x < width; x += 8) {
                const y = Math.sin(x * 0.0035 + time * 1.5) * 35 + height * 0.62;
                if (x === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.stroke();

            // 4. GARIS DEKORATIF VEKTOR TEKNIS HUD
            ctx.strokeStyle = primaryColor;
            ctx.globalAlpha = 0.02;
            ctx.lineWidth = 0.5;
            
            // Garis laser horizontal 1 (30% tinggi layar)
            ctx.beginPath();
            ctx.moveTo(0, height * 0.3);
            ctx.lineTo(width, height * 0.3);
            ctx.stroke();

            // Garis laser horizontal 2 (70% tinggi layar)
            ctx.beginPath();
            ctx.moveTo(0, height * 0.7);
            ctx.lineTo(width, height * 0.7);
            ctx.stroke();

            // 5. UPDATE & DRAW CYBER LIGHT DUST
            particles.forEach(p => {
                p.update();
                p.draw();
            });

            ctx.globalAlpha = 1.0; // Reset globalAlpha
            requestAnimationFrame(animate);
        }

        // Jalankan loop animasi
        animate();
    })();
</script>

@endsection