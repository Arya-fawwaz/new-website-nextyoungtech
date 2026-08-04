@extends('layouts.app')

@section('title', 'Layanan & Paket')

@section('content')

    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">LAYANAN & PAKET</span>
                <h2 class="section-title">Layanan Pembuatan Website Premium</h2>
                <p class="section-desc">Pilihlah tingkat kecanggihan digital yang sesuai dengan skala bisnis Anda. Seluruh paket kami dibangun menggunakan standar visual mewah tinggi.</p>
            </div>

            <div class="services-grid">
                @if(empty($services) || count($services) === 0)
                    <div style="grid-column: 1/-1; text-align: center; padding: 60px 0; color: var(--text-muted); background: rgba(255,255,255,0.02); border-radius: 16px; border: 2px dashed var(--border-color);">
                        <i class="fa-solid fa-face-frown" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                        <p style="font-size: 16px; font-weight: 600;">Belum ada layanan yang ditawarkan saat ini.</p>
                    </div>
                @else
                    @foreach($services as $service)
                        @php
                            $color = in_array($service->warna_aksen, ['primary', 'secondary', 'accent', 'success', 'warning']) 
                                ? 'var(--' . $service->warna_aksen . ')' 
                                : $service->warna_aksen;
                        @endphp
                        <div class="glass-card" style="border-color: rgba(56, 189, 248, 0.15); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); transform-style: preserve-3d; perspective: 1000px;" onmouseover="this.style.transform='translateY(-10px) rotateX(2deg) rotateY(2deg) scale(1.02)'; this.style.boxShadow='0 30px 60px rgba(0,0,0,0.15), 0 0 20px {{ $color }}40'; this.style.borderColor='{{ $color }}';" onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.borderColor='rgba(56, 189, 248, 0.15)';">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                    <span class="section-badge" style="color: {{ $color }}; margin: 0; background: rgba(56, 189, 248, 0.05); padding: 4px 12px; border-radius: 8px; font-size: 11px;">
                                        {{ $service->badge ?: strtoupper($service->nama_layanan) }}
                                    </span>
                                    @if($service->ikon)
                                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(128,128,128,0.05); display: flex; align-items: center; justify-content: center; border: 1px solid var(--border-color);">
                                            <i class="{{ $service->ikon }}" style="color: {{ $color }}; font-size: 16px;"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="feature-title" style="margin-top: 10px; font-size: 20px;">{{ $service->nama_paket }}</h3>
                                <p class="feature-desc" style="opacity: 0.7; font-size: 14px; line-height: 1.6; min-height: 60px;">{{ $service->deskripsi }}</p>
                                
                                <div class="service-price" style="color: {{ $color }}; font-size: 22px; margin: 20px 0; font-weight: 800;">
                                    Rp {{ number_format($service->harga, 0, ',', '.') }} <span style="font-size: 12px; opacity: 0.6; font-weight: 500;">/ mulai dari</span>
                                </div>

                                <ul class="service-list" style="margin-bottom: 25px; padding-left: 0; list-style: none;">
                                    @if(is_array($service->fitur_list))
                                        @foreach($service->fitur_list as $fitur)
                                            <li class="service-item" style="font-size: 13.5px; display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                                <i class="fa-solid fa-circle-check" style="color: {{ $color }}; font-size: 14px;"></i> {{ $fitur }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <a href="{{ route('quotation.index') }}" class="btn-primary" style="width: 100%; justify-content: center; background: {{ $color }}; box-shadow: 0 4px 15px {{ $color }}20; border: none; color: #ffffff;">
                                <i class="fa-solid fa-paper-plane"></i> Pesan / Estimasi
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
