@extends('layouts.app')

@section('title', 'Estimasi Biaya Proyek')

@section('content')

    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">ESTIMASI BIAYA INTERAKTIF</span>
                <h2 class="section-title">Estimasi Biaya Proyek</h2>
                <p class="section-desc">Sesuaikan fitur dan kompleksitas website impian Anda secara interaktif. Dapatkan transparansi biaya real-time secara instan.</p>
            </div>

            <!-- Session Alerts -->
            @if(session('success'))
                <div class="alert-glass" style="max-width: 900px; margin: 0 auto 40px auto;">
                    <i class="fa-solid fa-circle-check" style="font-size: 24px; color: var(--primary);"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-danger-glass" style="max-width: 900px; margin: 0 auto 40px auto;">
                    <i class="fa-solid fa-circle-xmark" style="font-size: 24px; color: var(--accent);"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Main Interactive Form -->
            <form id="quotation-calc-form" action="{{ route('quotation.store') }}" method="POST">
                @csrf
                <div class="calculator-container">
                    
                    <!-- Left Column: Settings -->
                    <div>
                        <!-- Section 1: Project Type -->
                        <h3 class="calc-section-title">
                            <i class="fa-solid fa-layer-group"></i> 1. Pilih Tipe Website
                        </h3>
                        <div class="calc-option-grid">
                            @if(empty($layananList) || count($layananList) === 0)
                                <p style="grid-column: 1/-1; color: var(--text-muted); font-size: 14px;">Belum ada pilihan layanan yang aktif.</p>
                            @else
                                @foreach($layananList as $index => $lay)
                                    <label class="calc-card-checkbox">
                                        <input type="radio" name="project_type" value="{{ $lay->id }}" data-price="{{ (int)$lay->harga }}" {{ $index === 0 ? 'checked' : '' }}>
                                        <div class="calc-card-inner">
                                            <div class="calc-icon"><i class="{{ $lay->ikon ?: 'fa-solid fa-code' }}"></i></div>
                                            <span class="calc-label">{{ $lay->nama_paket }}</span>
                                            <span class="calc-price-tag">Rp {{ number_format($lay->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            @endif
                        </div>

                        <!-- Section 2: Number of Pages -->
                        <h3 class="calc-section-title">
                            <i class="fa-solid fa-file-invoice"></i> 2. Estimasi Jumlah Halaman
                        </h3>
                        <div class="range-slider-group">
                            <div class="range-slider-header">
                                <span style="font-size: 14px; color: var(--text-muted);">Jumlah Halaman Website</span>
                                <span class="range-slider-value"><span id="calc-pages-value">1</span> Halaman</span>
                            </div>
                            <input type="range" id="calc-pages" name="pages" min="1" max="50" value="1" class="custom-range">
                            <div style="display: flex; justify-content: space-between; margin-top: 10px; font-size: 11px; color: var(--text-dark);">
                                <span>1 Halaman</span>
                                <span>25 Halaman</span>
                                <span>50 Halaman</span>
                            </div>
                        </div>

                        <!-- Section 3: Add-on Features -->
                        <h3 class="calc-section-title">
                            <i class="fa-solid fa-puzzle-piece"></i> 3. Fitur Tambahan Premium
                        </h3>
                        <div class="calc-option-grid">
                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="multilingual">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-language"></i></div>
                                    <span class="calc-label">Multi-Bahasa</span>
                                    <span class="calc-price-tag">+ Rp 100rb</span>
                                </div>
                            </label>

                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="seo_opt">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                                    <span class="calc-label">Super SEO</span>
                                    <span class="calc-price-tag">+ Rp 150rb</span>
                                </div>
                            </label>

                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="high_anim">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-bolt"></i></div>
                                    <span class="calc-label">GSAP Animasi</span>
                                    <span class="calc-price-tag">+ Rp 200rb</span>
                                </div>
                            </label>

                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="secure_core">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-lock"></i></div>
                                    <span class="calc-label">Secure Shield</span>
                                    <span class="calc-price-tag">+ Rp 150rb</span>
                                </div>
                            </label>

                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="payment_gateway">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-credit-card"></i></div>
                                    <span class="calc-label">Payment Gateway</span>
                                    <span class="calc-price-tag">+ Rp 300rb</span>
                                </div>
                            </label>

                            <label class="calc-card-checkbox">
                                <input type="checkbox" name="features[]" value="cms_integrated">
                                <div class="calc-card-inner">
                                    <div class="calc-icon"><i class="fa-solid fa-sliders"></i></div>
                                    <span class="calc-label">CMS Terintegrasi</span>
                                    <span class="calc-price-tag">+ Rp 250rb</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Right Column: Summary Glass Panel -->
                    <div class="glass-card receipt-summary">
                        <h3 class="receipt-title">Rincian Estimasi</h3>
                        
                        <div class="receipt-row">
                            <span>Tipe Proyek:</span>
                            <strong id="summary-project-type" style="color: var(--text-main);">Web Design Aja</strong>
                        </div>
                        <div class="receipt-row">
                            <span>Jumlah Halaman:</span>
                            <strong id="summary-pages-count" style="color: var(--text-main);">1</strong>
                        </div>
                        
                        <div class="receipt-row total">
                            <span style="font-size: 16px; font-weight: 700; display: flex; align-items: center;">Total Biaya:</span>
                            <span class="receipt-total-price" id="summary-total-price">Rp 0</span>
                        </div>

                        <!-- Hidden Pricing Fields to persist in DB -->
                        <input type="hidden" id="hidden-estimated-price" name="estimated_price" value="0">

                        <hr style="border: none; border-top: 1px solid var(--border-color); margin: 24px 0;">

                        <h3 class="receipt-title" style="font-size: 16px; margin-bottom: 16px; border: none; padding: 0;">Kontak Pengirim</h3>
                        
                        <input type="text" name="client_name" class="input-glass" placeholder="Nama Lengkap Klien" required value="{{ old('client_name') }}">
                        <input type="email" name="client_email" class="input-glass" placeholder="Alamat Email Klien" required value="{{ old('client_email') }}">
                        <input type="text" name="client_phone" class="input-glass" placeholder="Nomor Telepon / WA" required value="{{ old('client_phone') }}">
                        <textarea name="notes" class="input-glass textarea-glass" placeholder="Catatan opsional mengenai fungsionalitas khusus proyek Anda..." style="height: 80px;">{{ old('notes') }}</textarea>

                        <button type="submit" class="btn-primary btn-submit-quotation">
                            <i class="fa-solid fa-rocket"></i> Ajukan Pemesanan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </section>

@endsection
