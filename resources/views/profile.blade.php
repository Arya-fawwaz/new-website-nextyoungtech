@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('content')

    <section class="section" style="padding-top: 130px; min-height: 90vh; background: var(--bg-body);">
        <div class="container" style="max-width: 1100px;">
            
            <div class="section-header" style="text-align: left; margin-bottom: 30px;">
                <h2 class="section-title" style="font-size: 32px; margin-bottom: 8px;">Pengaturan Akun</h2>
                <p class="section-desc" style="max-width: 100%; font-size: 15px;">Kelola informasi profil dan pengaturan keamanan akun Anda.</p>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert-glass" style="margin-bottom: 25px; border-left: 4px solid #38b000; background: rgba(56, 176, 0, 0.05); padding: 16px 20px; border-radius: 8px; display: flex; align-items: center; gap: 12px;">
                    <i class="fa-solid fa-circle-check" style="color: #38b000; font-size: 18px;"></i>
                    <span style="color: var(--text-main); font-weight: 500; font-size: 14px;">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-glass" style="margin-bottom: 25px; border-left: 4px solid #ff5e62; background: rgba(255, 94, 98, 0.05); padding: 16px 20px; border-radius: 8px;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                        <i class="fa-solid fa-circle-xmark" style="color: #ff5e62; font-size: 18px;"></i>
                        <span style="color: #ff5e62; font-weight: 600; font-size: 14px;">Terjadi Kesalahan</span>
                    </div>
                    <ul style="margin: 0; padding-left: 30px; color: var(--text-main); font-size: 13.5px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-dashboard-layout" style="display: grid; grid-template-columns: 320px 1fr; gap: 30px; align-items: start;">
                
                <!-- Left Sidebar: Profile Summary -->
                <div class="glass-card" style="padding: 30px 25px; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                    
                    <div style="text-align: center; margin-bottom: 25px;">
                        <!-- Avatar Display -->
                        <div style="position: relative; width: 120px; height: 120px; margin: 0 auto 20px auto;">
                            @if(auth()->user()->foto_profil)
                                <img src="{{ auth()->user()->foto_profil_url }}" alt="{{ auth()->user()->nama }}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover; border: 3px solid var(--primary); box-shadow: 0 8px 20px var(--primary-glow);" id="avatar-preview">
                            @else
                                <div style="width: 100%; height: 100%; border-radius: 50%; background: rgba(128, 128, 128, 0.05); display: flex; align-items: center; justify-content: center; border: 1px solid var(--dashed-border); box-shadow: inset 0 2px 10px rgba(0,0,0,0.02);">
                                    <i class="fa-solid fa-user-tie" style="font-size: 48px; color: var(--primary);"></i>
                                </div>
                            @endif
                        </div>

                        <h3 style="font-family: var(--font-heading); font-size: 20px; font-weight: 800; color: var(--text-main); margin-bottom: 4px;">{{ auth()->user()->nama }}</h3>
                        <p style="font-size: 13px; color: var(--text-muted);">{{ auth()->user()->email }}</p>
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" id="avatar-form">
                        @csrf
                        <label for="foto_profil" class="btn-secondary" style="display: flex; width: 100%; justify-content: center; align-items: center; gap: 8px; cursor: pointer; padding: 10px; font-size: 13px; border-radius: 8px; margin-bottom: 12px; background: rgba(14, 165, 233, 0.05); border: 1px solid rgba(14, 165, 233, 0.2); color: var(--primary);">
                            <i class="fa-solid fa-camera"></i> Ubah Foto Profil
                        </label>
                        <input type="file" name="foto_profil" id="foto_profil" style="display: none;" onchange="document.getElementById('avatar-form').submit()">
                    </form>

                    <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 24px 0;">

                    <!-- Account Metadata -->
                    <div style="font-size: 13px; margin-bottom: 24px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                            <span style="color: var(--text-muted);"><i class="fa-regular fa-calendar" style="width: 18px;"></i> Bergabung</span>
                            <span style="font-weight: 600; color: var(--text-main);">{{ auth()->user()->created_at->format('d M Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: var(--text-muted);"><i class="fa-solid fa-shield-halved" style="width: 18px;"></i> Status</span>
                            <span style="font-weight: 600; color: #10b981;">Aktif Terverifikasi</span>
                        </div>
                    </div>

                    @if(auth()->user()->is_admin)
                        <div style="background: rgba(14, 165, 233, 0.05); border-left: 3px solid var(--primary); padding: 15px; border-radius: 4px 8px 8px 4px; margin-bottom: 24px;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fa-solid fa-user-shield" style="color: var(--primary);"></i>
                                <span style="font-weight: 700; font-size: 13px; color: var(--text-main);">Hak Akses Admin</span>
                            </div>
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary" style="display: flex; width: 100%; justify-content: center; padding: 8px; font-size: 12px; border-radius: 6px; text-decoration: none; margin-top: 10px;">
                                <i class="fa-solid fa-gauge-high"></i> Panel Admin
                            </a>
                        </div>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="width: 100%; padding: 10px; font-size: 13px; cursor: pointer; border-radius: 8px; background: transparent; border: 1px solid rgba(255, 94, 98, 0.3); color: #ff5e62; font-weight: 600; transition: all 0.3s ease;" onmouseover="this.style.background='rgba(255,94,98,0.1)'" onmouseout="this.style.background='transparent'">
                            <i class="fa-solid fa-right-from-bracket"></i> Keluar
                        </button>
                    </form>
                </div>

                <!-- Right Area: Settings Forms -->
                <div style="display: flex; flex-direction: column; gap: 30px;">
                    
                    <!-- Panel: Informasi Pribadi -->
                    <div class="glass-card" style="padding: 35px 40px; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px; border-bottom: 1px solid var(--border-color); padding-bottom: 15px;">
                            <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(14, 165, 233, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                <i class="fa-solid fa-user-pen"></i>
                            </div>
                            <h3 style="font-family: var(--font-heading); font-size: 18px; font-weight: 700; color: var(--text-main); margin: 0;">Informasi Dasar</h3>
                        </div>
                        
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="nama" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-dark); margin-bottom: 8px;">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="input-glass" style="width: 100%; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);" value="{{ old('nama', auth()->user()->nama) }}" required>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-dark); margin-bottom: 8px;">Alamat Email</label>
                                    <input type="email" name="email" id="email" class="input-glass" style="width: 100%; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);" value="{{ old('email', auth()->user()->email) }}" required>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" class="btn-primary" style="padding: 10px 24px; font-size: 13.5px; border-radius: 8px;">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Panel: Ganti Password -->
                    <div class="glass-card" style="padding: 35px 40px; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 25px; border-bottom: 1px solid var(--border-color); padding-bottom: 15px;">
                            <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(79, 70, 229, 0.1); color: var(--secondary); display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <h3 style="font-family: var(--font-heading); font-size: 18px; font-weight: 700; color: var(--text-main); margin: 0;">Keamanan & Kata Sandi</h3>
                        </div>
                        
                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="current_password" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-dark); margin-bottom: 8px;">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password" id="current_password" class="input-glass" style="width: 100%; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main); max-width: 400px;" placeholder="Masukkan sandi saat ini" required>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="password" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-dark); margin-bottom: 8px;">Kata Sandi Baru</label>
                                    <input type="password" name="password" id="password" class="input-glass" style="width: 100%; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);" placeholder="Minimal 6 karakter" required>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="password_confirmation" style="display: block; font-size: 13px; font-weight: 600; color: var(--text-dark); margin-bottom: 8px;">Konfirmasi Sandi Baru</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-glass" style="width: 100%; padding: 12px 16px; border-radius: 8px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);" placeholder="Ulangi sandi baru" required>
                                </div>
                            </div>

                            <div style="text-align: right;">
                                <button type="submit" class="btn-primary" style="padding: 10px 24px; font-size: 13.5px; border-radius: 8px; background: var(--primary); color: #ffffff; box-shadow: 0 0 20px var(--primary-glow); border: none;">
                                    Perbarui Kata Sandi
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            
            <style>
                @media (max-width: 768px) {
                    .profile-dashboard-layout {
                        grid-template-columns: 1fr !important;
                    }
                    .profile-dashboard-layout form > div[style*="grid-template-columns"] {
                        grid-template-columns: 1fr !important;
                    }
                }
            </style>

        </div>
    </section>

@endsection
