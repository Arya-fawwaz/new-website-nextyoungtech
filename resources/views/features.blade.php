@extends('layouts.app')

@section('title', 'Fitur Utama')

@section('content')

    <section class="section" style="padding-top: 150px;">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">FITUR UNGGULAN</span>
                <h2 class="section-title">Fitur Teknologi Kelas Dunia</h2>
                <p class="section-desc">Next Young Tech Technology menghadirkan standar fitur premium tercanggih untuk memastikan kesuksesan digital bisnis Anda tanpa batas.</p>
            </div>

            <!-- Features Main Container (Grid Layout) -->
            <div class="glass-card" style="padding: 50px 40px; border-radius: 24px; border: 1px solid rgba(14, 165, 233, 0.2); box-shadow: 0 20px 50px rgba(0,0,0,0.05); margin-top: 50px; background: var(--bg-card); backdrop-filter: blur(20px);">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; align-items: stretch;">
                    
                    <!-- Feature 1 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(14, 165, 233, 0.1); background: rgba(14, 165, 233, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--primary)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(14, 165, 233, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(14, 165, 233, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                            <i class="fa-solid fa-cubes" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Animasi 3D Imersif (WebGL)</h3>
                    </div>

                    <!-- Feature 2 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(79, 70, 229, 0.1); background: rgba(79, 70, 229, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--secondary)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(79, 70, 229, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(79, 70, 229, 0.1); display: flex; align-items: center; justify-content: center; color: var(--secondary);">
                            <i class="fa-solid fa-gauge-high" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Kinerja Kecepatan Tinggi (FPS)</h3>
                    </div>

                    <!-- Feature 3 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(0, 242, 254, 0.1); background: rgba(0, 242, 254, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--accent)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(0, 242, 254, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(0, 242, 254, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                            <i class="fa-solid fa-shield-halved" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Sistem Keamanan Laravel Core</h3>
                    </div>

                    <!-- Feature 4 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(14, 165, 233, 0.1); background: rgba(14, 165, 233, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--primary)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(14, 165, 233, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(14, 165, 233, 0.1); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                            <i class="fa-solid fa-magnifying-glass-chart" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Optimasi SEO & Ramah Google</h3>
                    </div>

                    <!-- Feature 5 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(79, 70, 229, 0.1); background: rgba(79, 70, 229, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--secondary)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(79, 70, 229, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(79, 70, 229, 0.1); display: flex; align-items: center; justify-content: center; color: var(--secondary);">
                            <i class="fa-solid fa-mobile-screen-button" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Desain Responsif & Adaptif</h3>
                    </div>

                    <!-- Feature 6 -->
                    <div style="display: flex; align-items: center; gap: 20px; padding: 25px; border-radius: 16px; border: 1px solid rgba(0, 242, 254, 0.1); background: rgba(0, 242, 254, 0.02); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-3px)'; this.style.borderColor='var(--accent)'" onmouseout="this.style.transform='none'; this.style.borderColor='rgba(0, 242, 254, 0.1)'">
                        <div style="width: 70px; height: 70px; min-width: 70px; border-radius: 16px; background: rgba(0, 242, 254, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent);">
                            <i class="fa-brands fa-whatsapp" style="font-size: 28px;"></i>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 800; color: var(--text-main); margin: 0; line-height: 1.4;">Integrasi WhatsApp</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
