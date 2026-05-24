@extends('layouts.app')

@section('title', 'Tulis Ulasan')

@section('content')
    <section class="section" style="padding-top: 150px; min-height: 90vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 680px; margin: 0 auto;">
            
            <div class="section-header" style="margin-bottom: 30px;">
                <span class="section-badge" style="background: rgba(255, 183, 3, 0.1); border-color: rgba(255, 183, 3, 0.2); color: #ffb703;">TESTIMONI KLIEN</span>
                <h2 class="section-title">Bagikan Pengalaman Anda</h2>
                <p class="section-desc">Ulasan Anda sangat berharga bagi kami. Tuliskan testimoni jujur Anda dan bantu kami terus menghadirkan mahakarya digital kelas dunia.</p>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert-glass" style="margin-bottom: 24px; border-color: rgba(56, 176, 0, 0.4); background: rgba(56, 176, 0, 0.05);">
                    <i class="fa-solid fa-circle-check" style="color: #38b000; text-shadow: 0 0 10px rgba(56, 176, 0, 0.5); font-size: 20px;"></i>
                    <span style="color: var(--text-main); font-weight: 500; font-size: 14px; margin-left: 10px;">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-glass" style="margin-bottom: 24px; border-color: rgba(255, 94, 98, 0.4); background: rgba(255, 94, 98, 0.05);">
                    <i class="fa-solid fa-circle-xmark" style="color: #ff5e62; text-shadow: 0 0 10px rgba(255, 94, 98, 0.5); font-size: 20px;"></i>
                    <ul style="margin: 0; padding-left: 20px; color: var(--text-main); font-size: 13px; text-align: left;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Dedicated Review Card -->
            <div class="glass-card" style="padding: 40px; border-radius: 16px; border: 1px solid var(--border-color); background: var(--bg-card);">
                
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; border-bottom: 1px solid var(--border-color); padding-bottom: 20px;">
                    @if(auth()->user()->foto_profil)
                        <img src="{{ auth()->user()->foto_profil_url }}" alt="{{ auth()->user()->nama }}" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2.5px solid var(--primary); box-shadow: 0 0 15px var(--primary-glow);">
                    @else
                        <div style="width: 60px; height: 60px; border-radius: 50%; background: rgba(128, 128, 128, 0.05); display: flex; align-items: center; justify-content: center; border: 2px dashed var(--dashed-border);">
                            <i class="fa-solid fa-user-astronaut" style="font-size: 24px; color: var(--primary); text-shadow: 0 0 8px var(--primary-glow);"></i>
                        </div>
                    @endif
                    <div>
                        <h4 style="font-family: var(--font-heading); font-size: 16px; color: var(--text-main); margin: 0; font-weight: 700;">{{ auth()->user()->nama }}</h4>
                        <p style="font-size: 12px; color: var(--text-dark); opacity: 0.6; margin: 2px 0 0 0;"><i class="fa-solid fa-circle-check" style="color: var(--primary);"></i> Klien Terverifikasi Next Young Tech</p>
                    </div>
                </div>

                <form action="{{ route('profile.review') }}" method="POST">
                    @csrf
                    
                    <!-- Star Interactive Selector -->
                    <div class="form-group" style="margin-bottom: 28px; text-align: center;">
                        <label style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 12px; letter-spacing: 0.5px;">Pilih Rating Bintang Anda</label>
                        
                        <div class="star-rating" style="display: flex; flex-direction: row-reverse; justify-content: center; gap: 14px; margin-bottom: 10px;">
                            <input type="radio" id="star5" name="bintang" value="5" style="display: none;" {{ old('bintang', auth()->user()->ulasan?->bintang ?? 5) == 5 ? 'checked' : '' }} />
                            <label for="star5" class="fa-solid fa-star star-label" style="font-size: 32px; color: var(--star-empty); cursor: pointer; transition: all 0.2s ease;"></label>
                            
                            <input type="radio" id="star4" name="bintang" value="4" style="display: none;" {{ old('bintang', auth()->user()->ulasan?->bintang ?? 5) == 4 ? 'checked' : '' }} />
                            <label for="star4" class="fa-solid fa-star star-label" style="font-size: 32px; color: var(--star-empty); cursor: pointer; transition: all 0.2s ease;"></label>
 
                            <input type="radio" id="star3" name="bintang" value="3" style="display: none;" {{ old('bintang', auth()->user()->ulasan?->bintang ?? 5) == 3 ? 'checked' : '' }} />
                            <label for="star3" class="fa-solid fa-star star-label" style="font-size: 32px; color: var(--star-empty); cursor: pointer; transition: all 0.2s ease;"></label>
 
                            <input type="radio" id="star2" name="bintang" value="2" style="display: none;" {{ old('bintang', auth()->user()->ulasan?->bintang ?? 5) == 2 ? 'checked' : '' }} />
                            <label for="star2" class="fa-solid fa-star star-label" style="font-size: 32px; color: var(--star-empty); cursor: pointer; transition: all 0.2s ease;"></label>
 
                            <input type="radio" id="star1" name="bintang" value="1" style="display: none;" {{ old('bintang', auth()->user()->ulasan?->bintang ?? 5) == 1 ? 'checked' : '' }} />
                            <label for="star1" class="fa-solid fa-star star-label" style="font-size: 32px; color: var(--star-empty); cursor: pointer; transition: all 0.2s ease;"></label>
                        </div>
                    </div>
 
                    <!-- Comment Text Area -->
                    <div class="form-group" style="margin-bottom: 28px;">
                        <label for="komentar" class="form-label" style="display: block; font-size: 11px; font-weight: 600; text-transform: uppercase; color: var(--text-dark); margin-bottom: 8px; text-align: left;">Kesan & Testimoni Anda</label>
                        <div class="input-wrapper" style="position: relative;">
                            <span class="input-icon" style="position: absolute; left: 16px; top: 16px; color: var(--accent); opacity: 0.8;"><i class="fa-solid fa-comment-dots" style="font-size: 16px;"></i></span>
                            <textarea name="komentar" id="komentar" class="input-glass textarea-glass" style="height: 140px; padding: 14px 16px 14px 48px; border-radius: 8px; resize: none; line-height: 1.6;" placeholder="Ceritakan pengalaman profesional Anda bekerja sama dengan tim Next Young Tech..." required>{{ old('komentar', auth()->user()->ulasan?->komentar) }}</textarea>
                        </div>
                    </div>
 
                    <div style="display: flex; gap: 16px; margin-top: 10px;">
                        <a href="{{ route('home') }}" class="btn-secondary" style="flex: 1; display: inline-flex; align-items: center; justify-content: center; padding: 14px; border-radius: 8px;">
                            <i class="fa-solid fa-house" style="margin-right: 8px;"></i> Kembali ke Beranda
                        </a>
                        <button type="submit" class="btn-primary" style="flex: 2; justify-content: center; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); box-shadow: 0 0 20px var(--primary-glow); padding: 14px; border-radius: 8px; font-weight: 700; cursor: pointer;">
                            <i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i> Publikasikan Ulasan
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>

    <!-- Custom CSS for Interactive Star Rating -->
    <style>
        .star-rating input:checked ~ .star-label,
        .star-rating .star-label:hover,
        .star-rating .star-label:hover ~ .star-label {
            color: #ffb703 !important;
            text-shadow: 0 0 12px rgba(255, 183, 3, 0.9);
        }
    </style>
@endsection
