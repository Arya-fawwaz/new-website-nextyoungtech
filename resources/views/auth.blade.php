@extends('layouts.app')

@section('title', 'Masuk / Daftar Portal')

@section('content')
    <section class="section" style="padding-top: 150px; min-height: 90vh; display: flex; align-items: center; justify-content: center; position: relative;">
        <!-- Dynamic Backgrounds -->
        <div id="auth-light-bg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; opacity: 0; transition: opacity 0.8s ease; pointer-events: none;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(5px);"></div>
        </div>
        <div id="three-canvas-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; opacity: 1; transition: opacity 0.8s ease; pointer-events: none;"></div>

        <!-- Glowing background particles and lights -->
        <div class="auth-blur-circle primary"></div>
        <div class="auth-blur-circle secondary"></div>
        
        <div class="container" style="max-width: 500px; margin: 0 auto; position: relative; z-index: 5;">
            
            <div class="glass-card" id="auth-card" style="padding: 40px 30px; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1); overflow: hidden;">
                
                <div class="text-center" style="margin-bottom: 25px;">
                    <span class="section-badge" style="background: rgba(0, 242, 254, 0.1); border-color: rgba(0, 242, 254, 0.2); color: var(--primary); font-size: 11px;">PORTAL KEAMANAN AKUN</span>
                    <h2 id="auth-title" style="font-family: var(--font-heading); color: var(--text-main); font-size: 26px; margin-top: 8px; font-weight: 800; letter-spacing: -0.5px; text-shadow: 0 0 10px rgba(255,255,255,0.1);">Selamat Datang</h2>
                    <p id="auth-desc" style="color: var(--text-muted); font-size: 13px; margin-top: 6px; line-height: 1.5;">Silakan masuk ke akun Anda atau daftarkan akun baru untuk menikmati mahakarya digital.</p>
                </div>

                <!-- Session Errors & Alerts -->
                @if($errors->has('auth_error'))
                    <div class="alert-danger-glass" style="margin-bottom: 20px; background: rgba(255, 94, 98, 0.08); border: 1px solid rgba(255, 94, 98, 0.2); padding: 12px; border-radius: 8px; display: flex; align-items: center; gap: 10px; color: #ff5e62; font-size: 13px;">
                        <i class="fa-solid fa-circle-xmark" style="font-size: 16px;"></i>
                        <span>{{ $errors->first('auth_error') }}</span>
                    </div>
                @endif

                @if($errors->has('login_error'))
                    <div class="alert-danger-glass" style="margin-bottom: 20px; background: rgba(255, 94, 98, 0.08); border: 1px solid rgba(255, 94, 98, 0.2); padding: 12px; border-radius: 8px; display: flex; align-items: center; gap: 10px; color: #ff5e62; font-size: 13px;">
                        <i class="fa-solid fa-circle-xmark" style="font-size: 16px;"></i>
                        <span>{{ $errors->first('login_error') }}</span>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if($errors->any() && !$errors->has('auth_error') && !$errors->has('login_error'))
                    <div class="alert-danger-glass" style="margin-bottom: 20px; background: rgba(255, 94, 98, 0.08); border: 1px solid rgba(255, 94, 98, 0.2); padding: 12px; border-radius: 8px; color: #ff5e62; font-size: 13px;">
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <i class="fa-solid fa-circle-xmark" style="font-size: 16px; margin-top: 2px;"></i>
                            <div style="text-align: left;">
                                @foreach ($errors->all() as $error)
                                    <p style="margin: 0;">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tab Buttons -->
                <div class="auth-tabs" style="display: flex; gap: 10px; margin-bottom: 30px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
                    <button type="button" id="tab-login" onclick="switchAuthTab('login')" style="flex: 1; background: transparent; border: none; color: var(--primary); font-size: 15px; font-weight: 700; cursor: pointer; padding: 10px; border-bottom: 2px solid var(--primary); transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                        <i class="fa-solid fa-key"></i> Masuk (Login)
                    </button>
                    <button type="button" id="tab-register" onclick="switchAuthTab('register')" style="flex: 1; background: transparent; border: none; color: var(--text-dark); opacity: 0.6; font-size: 15px; font-weight: 700; cursor: pointer; padding: 10px; border-bottom: 2px solid transparent; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                        <i class="fa-solid fa-user-plus"></i> Daftar Akun
                    </button>
                </div>

                <!-- Slider Container -->
                <div class="auth-slider-container" style="width: 100%; overflow: hidden; position: relative;">
                    <div id="auth-forms-slider" style="display: flex; width: 200%; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1); transform: translateX(0%); align-items: flex-start;">
                        
                        <!-- Login Form -->
                        <div style="width: 50%; flex-shrink: 0; padding-right: 10px;">
                            <form id="form-login" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 20px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Alamat Email</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--primary); opacity: 0.8;"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="nama@email.com" required value="{{ old('email') }}">
                        </div>
                    </div>
                    <div style="margin-bottom: 28px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Kata Sandi (Password)</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--primary); opacity: 0.8;"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; cursor: pointer; padding: 14px; border-radius: 8px; font-weight: 700; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 20px var(--primary-glow);">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
                    </button>

                    <!-- Pemisah -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin: 20px 0;">
                        <div style="flex: 1; height: 1px; background: var(--border-color); opacity: 0.15;"></div>
                        <span style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; letter-spacing: 1px;">Atau</span>
                        <div style="flex: 1; height: 1px; background: var(--border-color); opacity: 0.15;"></div>
                    </div>

                    <!-- Google Sign In Button -->
                    <a href="{{ route('auth.google') }}" class="google-sign-in-btn" style="display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; background: #ffffff; border: 1px solid rgba(0,0,0,0.1); border-radius: 8px; color: #1f2937; font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <svg viewBox="0 0 24 24" width="18" height="18" style="flex-shrink: 0;">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span style="color: #1f2937;">Masuk dengan Google</span>
                    </a>
                            </form>
                        </div>

                        <!-- Register Form -->
                        <div style="width: 50%; flex-shrink: 0; padding-left: 10px;">
                            <form id="form-register" action="{{ route('register.post') }}" method="POST">
                                @csrf
                    <div style="margin-bottom: 18px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Nama Lengkap</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="Nama Lengkap Anda" required value="{{ old('name') }}">
                        </div>
                    </div>
                    <div style="margin-bottom: 18px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Alamat Email</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="nama@email.com" required value="{{ old('email') }}">
                        </div>
                    </div>
                    <div style="margin-bottom: 18px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Kata Sandi (Password)</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="Minimal 6 karakter" required>
                        </div>
                    </div>
                    <div style="margin-bottom: 24px; text-align: left;">
                        <label style="display: block; font-size: 12px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Konfirmasi Kata Sandi</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--secondary); opacity: 0.8;"><i class="fa-solid fa-shield-halved"></i></span>
                            <input type="password" name="password_confirmation" class="input-glass" style="padding-left: 48px; margin-bottom: 0;" placeholder="Ketik ulang kata sandi" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%); box-shadow: 0 0 20px var(--secondary-glow); cursor: pointer; padding: 14px; border-radius: 8px; font-weight: 700;">
                        <i class="fa-solid fa-user-plus"></i> Daftar Akun Baru
                    </button>

                    <!-- Pemisah -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin: 20px 0;">
                        <div style="flex: 1; height: 1px; background: var(--border-color); opacity: 0.15;"></div>
                        <span style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; letter-spacing: 1px;">Atau</span>
                        <div style="flex: 1; height: 1px; background: var(--border-color); opacity: 0.15;"></div>
                    </div>

                    <!-- Google Register Button -->
                    <a href="{{ route('auth.google') }}" class="google-sign-in-btn" style="display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; background: #ffffff; border: 1px solid rgba(0,0,0,0.1); border-radius: 8px; color: #1f2937; font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <svg viewBox="0 0 24 24" width="18" height="18" style="flex-shrink: 0;">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span style="color: #1f2937;">Daftar dengan Google</span>
                    </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Visual Page Styling and Interactive Tab Script -->
    <style>
        /* Theme specific backgrounds */
        html[data-theme="dark"] #three-canvas-container {
            opacity: 1 !important;
        }
        html[data-theme="dark"] #auth-light-bg {
            opacity: 0 !important;
        }

        html[data-theme="light"] #three-canvas-container {
            opacity: 0 !important;
        }
        html[data-theme="light"] #auth-light-bg {
            opacity: 1 !important;
        }

        .auth-blur-circle {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.15;
            z-index: 1;
            pointer-events: none;
            transition: all 0.8s ease;
        }
        .auth-blur-circle.primary {
            top: 15%;
            left: 20%;
            background: var(--primary);
        }
        .auth-blur-circle.secondary {
            bottom: 15%;
            right: 20%;
            background: var(--accent);
        }
        
        .input-glass:focus {
            outline: none;
            border-color: var(--primary) !important;
            box-shadow: 0 0 15px var(--primary-glow) !important;
        }

        #form-register .input-glass:focus {
            border-color: var(--secondary) !important;
            box-shadow: 0 0 15px var(--secondary-glow) !important;
        }

        .google-sign-in-btn:hover {
            transform: translateY(-2px);
            background: #f8fafc !important;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1), 0 0 15px rgba(66, 133, 244, 0.15) !important;
            border-color: rgba(66, 133, 244, 0.3) !important;
        }
    </style>

    <script>
        function switchAuthTab(tab) {
            const tabLoginBtn = document.getElementById('tab-login');
            const tabRegisterBtn = document.getElementById('tab-register');
            const authCard = document.getElementById('auth-card');
            const authTitle = document.getElementById('auth-title');
            const authDesc = document.getElementById('auth-desc');
            const slider = document.getElementById('auth-forms-slider');

            if (!tabLoginBtn || !tabRegisterBtn || !authCard || !slider) return;

            if (tab === 'login') {
                slider.style.transform = 'translateX(0%)';
                
                tabLoginBtn.style.color = 'var(--primary)';
                tabLoginBtn.style.borderBottom = '2px solid var(--primary)';
                tabLoginBtn.style.opacity = '1';
                
                tabRegisterBtn.style.color = 'var(--text-dark)';
                tabRegisterBtn.style.borderBottom = '2px solid transparent';
                tabRegisterBtn.style.opacity = '0.6';

                authCard.style.borderColor = 'rgba(0, 168, 232, 0.2)';
                authCard.style.boxShadow = '0 20px 50px rgba(0,0,0,0.5), 0 0 35px rgba(0, 168, 232, 0.15)';
                
                authTitle.innerText = "Selamat Datang";
                authDesc.innerText = "Silakan masuk ke akun Anda atau daftarkan akun baru untuk menikmati mahakarya digital.";
            } else {
                slider.style.transform = 'translateX(-50%)';
                
                tabLoginBtn.style.color = 'var(--text-dark)';
                tabLoginBtn.style.borderBottom = '2px solid transparent';
                tabLoginBtn.style.opacity = '0.6';
                
                tabRegisterBtn.style.color = 'var(--secondary)';
                tabRegisterBtn.style.borderBottom = '2px solid var(--secondary)';
                tabRegisterBtn.style.opacity = '1';

                authCard.style.borderColor = 'rgba(6, 214, 160, 0.2)';
                authCard.style.boxShadow = '0 20px 50px rgba(0,0,0,0.5), 0 0 35px rgba(6, 214, 160, 0.15)';

                authTitle.innerText = "Buat Akun Baru";
                authDesc.innerText = "Daftarkan identitas digital Anda untuk mengakses estimasi biaya, ulasan, dan layanan premium.";
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            @if(isset($tab) && $tab === 'register' || $errors->has('name') || $errors->has('password_confirmation') || (old('name') && !$errors->has('login_error')))
                switchAuthTab('register');
            @else
                switchAuthTab('login');
            @endif
        });
    </script>
@endsection
