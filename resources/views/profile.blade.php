@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('content')

    <section class="section" style="padding-top: 150px; min-height: 90vh;">
        <div class="container">
            
            <div class="section-header">
                <span class="section-badge">AKUN SAYA</span>
                <h2 class="section-title">Pengaturan Profil Pengguna</h2>
                <p class="section-desc">Kelola informasi identitas akun Anda, unggah foto profil kustom, dan perbarui kata sandi Anda demi keamanan maksimal.</p>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert-glass" style="max-width: 800px; margin: 20px auto; border-color: rgba(56, 176, 0, 0.4); background: rgba(56, 176, 0, 0.05);">
                    <i class="fa-solid fa-circle-check" style="color: #38b000; text-shadow: 0 0 10px rgba(56, 176, 0, 0.5);"></i>
                    <span style="color: var(--text-main); font-weight: 500;">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-glass" style="max-width: 800px; margin: 20px auto; border-color: rgba(255, 94, 98, 0.4); background: rgba(255, 94, 98, 0.05);">
                    <i class="fa-solid fa-circle-xmark" style="color: #ff5e62; text-shadow: 0 0 10px rgba(255, 94, 98, 0.5);"></i>
                    <ul style="margin: 0; padding-left: 20px; color: var(--text-main); font-size: 13px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-top: 40px; max-width: 1000px; margin-left: auto; margin-right: auto;">
                
                <!-- Panel 1: Avatar Upload & Details -->
                <div class="glass-card" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 40px 30px;">
                    <h3 style="font-family: var(--font-heading); font-size: 18px; margin-bottom: 24px; color: var(--primary);">Foto Profil</h3>
                    
                    <!-- Avatar Display -->
                    <div style="position: relative; margin-bottom: 24px;">
                        @if(auth()->user()->foto_profil)
                            <img src="{{ '/' . ltrim(auth()->user()->foto_profil, '/') }}" alt="{{ auth()->user()->nama }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 3px solid var(--primary); box-shadow: 0 0 25px var(--primary-glow); transition: transform 0.3s ease;" id="avatar-preview">
                        @else
                            <div style="width: 150px; height: 150px; border-radius: 50%; background: rgba(128, 128, 128, 0.05); display: flex; align-items: center; justify-content: center; border: 2px dashed var(--dashed-border); box-shadow: inset 0 0 20px rgba(0,0,0,0.1);">
                                <i class="fa-solid fa-user-astronaut" style="font-size: 64px; color: var(--primary); text-shadow: 0 0 15px var(--primary-glow);"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" style="width: 100%;" id="avatar-form">
                        @csrf
                        <div style="margin-bottom: 20px;">
                            <label for="foto_profil" class="btn-secondary" style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer; padding: 10px 20px; font-size: 13px;">
                                <i class="fa-solid fa-camera"></i> Pilih Foto Baru
                            </label>
                            <input type="file" name="foto_profil" id="foto_profil" style="display: none;" onchange="document.getElementById('avatar-form').submit()">
                        </div>
                        <p style="font-size: 11px; color: var(--text-dark); opacity: 0.6; line-height: 1.5; margin: 0;">Mendukung format JPG, PNG, atau GIF. Ukuran maksimum file adalah 2MB.</p>
                    </form>

                    <hr style="width: 100%; border: 0; border-top: 1px solid var(--border-color); margin: 30px 0;">

                    <!-- Account Metadata -->
                    <div style="width: 100%; text-align: left; background: rgba(128, 128, 128, 0.03); padding: 16px; border-radius: 8px; border: 1px solid var(--border-color);">
                        <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px;">
                            <span style="color: var(--text-dark); opacity: 0.7;">Terdaftar Sejak:</span>
                            <span style="font-weight: 600; color: var(--text-main);">{{ auth()->user()->created_at->format('d M Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 12px;">
                            <span style="color: var(--text-dark); opacity: 0.7;">Status Akun:</span>
                            <span style="font-weight: 600; color: var(--primary);"><i class="fa-solid fa-circle-check"></i> Aktif</span>
                        </div>
                    </div>

                    @if(auth()->user()->is_admin)
                        <hr style="width: 100%; border: 0; border-top: 1px dashed rgba(14, 165, 233, 0.2); margin: 20px 0;">
                        <div style="width: 100%; text-align: left; background: linear-gradient(135deg, rgba(14, 165, 233, 0.08) 0%, rgba(79, 70, 229, 0.08) 100%); padding: 20px; border-radius: 12px; border: 1px solid rgba(14, 165, 233, 0.35); box-shadow: 0 0 15px rgba(14, 165, 233, 0.1);">
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                <i class="fa-solid fa-user-shield" style="font-size: 18px; color: var(--primary); text-shadow: 0 0 8px var(--primary-glow);"></i>
                                <span style="font-family: var(--font-heading); font-size: 13px; font-weight: 700; color: var(--text-main); letter-spacing: 0.5px;">PORTAL ADMIN</span>
                            </div>
                            <p style="font-size: 11px; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">Anda memiliki hak akses administrator sistem. Masuk ke panel manajemen untuk meninjau penawaran proyek dan memproses pertanyaan masuk.</p>
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary" style="width: 100%; justify-content: center; padding: 10px 16px; font-size: 12px; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 10px var(--primary-glow); text-decoration: none;">
                                <i class="fa-solid fa-gauge-high"></i> Buka Panel Admin
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Panel 2: Profile Form -->
                <div class="glass-card" style="padding: 40px 30px;">
                    <h3 style="font-family: var(--font-heading); font-size: 18px; margin-bottom: 24px; color: var(--secondary);"><i class="fa-solid fa-user-gear"></i> Informasi Pribadi</h3>
                    
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="nama" class="form-label" style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px;">Nama Lengkap</label>
                            <div class="input-wrapper" style="position: relative;">
                                <span class="input-icon" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-id-card"></i></span>
                                <input type="text" name="nama" id="nama" class="input-glass" style="padding: 12px 16px 12px 48px; border-radius: 8px; margin-bottom: 0;" value="{{ old('nama', auth()->user()->nama) }}" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 30px;">
                            <label for="email" class="form-label" style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px;">Alamat Email</label>
                            <div class="input-wrapper" style="position: relative;">
                                <span class="input-icon" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" id="email" class="input-glass" style="padding: 12px 16px 12px 48px; border-radius: 8px; margin-bottom: 0;" value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%); box-shadow: 0 0 15px var(--secondary-glow);">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Detail Profil
                        </button>
                    </form>
                </div>

                <!-- Panel 3: Change Password -->
                <div class="glass-card" style="padding: 40px 30px;">
                    <h3 style="font-family: var(--font-heading); font-size: 18px; margin-bottom: 24px; color: var(--accent);"><i class="fa-solid fa-shield-halved"></i> Keamanan Sandi</h3>
                    
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        
                        <div class="form-group" style="margin-bottom: 16px;">
                            <label for="current_password" class="form-label" style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px;">Password Saat Ini</label>
                            <div class="input-wrapper" style="position: relative;">
                                <span class="input-icon" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--accent); opacity: 0.8;"><i class="fa-solid fa-lock-open"></i></span>
                                <input type="password" name="current_password" id="current_password" class="input-glass" style="padding: 12px 16px 12px 48px; border-radius: 8px; margin-bottom: 0;" placeholder="Masukkan sandi lama" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 16px;">
                            <label for="password" class="form-label" style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px;">Password Baru</label>
                            <div class="input-wrapper" style="position: relative;">
                                <span class="input-icon" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--accent); opacity: 0.8;"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="input-glass" style="padding: 12px 16px 12px 48px; border-radius: 8px; margin-bottom: 0;" placeholder="Minimal 6 karakter" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 24px;">
                            <label for="password_confirmation" class="form-label" style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px;">Konfirmasi Password Baru</label>
                            <div class="input-wrapper" style="position: relative;">
                                <span class="input-icon" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--accent); opacity: 0.8;"><i class="fa-solid fa-circle-check"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="input-glass" style="padding: 12px 16px 12px 48px; border-radius: 8px; margin-bottom: 0;" placeholder="Ulangi password baru" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 15px var(--primary-glow);">
                            <i class="fa-solid fa-key"></i> Perbarui Kata Sandi
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection
