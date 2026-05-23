@extends('layouts.app')

@section('title', 'Masuk Admin')

@section('content')

    <section class="section" style="padding-top: 150px; min-height: 85vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 480px;">
            
            <div class="glass-card" style="padding: 40px; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 30px var(--secondary-glow);">
                <div style="text-align: center; margin-bottom: 30px;">
                    <i class="fa-solid fa-user-shield text-primary" style="font-size: 48px; margin-bottom: 12px; text-shadow: 0 0 15px var(--primary-glow);"></i>
                    <h2 style="font-family: var(--font-heading); font-size: 24px; font-weight: 700; letter-spacing: 0.5px;">PORTAL ADMIN</h2>
                    <p style="font-size: 13px; color: var(--text-muted); margin-top: 6px;">Keamanan tingkat tinggi enkripsi Next Young Tech</p>
                </div>

                <!-- Session Alerts -->
                @if(session('success'))
                    <div class="alert-glass">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-danger-glass">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label style="font-size: 12px; font-family: var(--font-heading); color: var(--text-muted); display: block; margin-bottom: 8px; font-weight: 600;">USERNAME</label>
                        <input type="text" name="username" class="input-glass" style="margin-bottom: 0;" placeholder="Masukkan Username Admin" required autofocus>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <label style="font-size: 12px; font-family: var(--font-heading); color: var(--text-muted); display: block; margin-bottom: 8px; font-weight: 600;">PASSWORD</label>
                        <input type="password" name="password" class="input-glass" style="margin-bottom: 0;" placeholder="Masukkan Password Admin" required>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; cursor: pointer;">
                        <i class="fa-solid fa-key"></i> Autentikasi Masuk
                    </button>
                </form>

                <div style="text-align: center; margin-top: 24px; font-size: 11px; color: var(--text-dark);">
                    Portal masuk terenkripsi 256-bit SSL aktif.
                </div>
            </div>

        </div>
    </section>

@endsection
