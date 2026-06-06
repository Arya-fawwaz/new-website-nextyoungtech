@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')

    <section class="section" style="padding-top: 150px; padding-bottom: 100px; position: relative; overflow: hidden;">
        <!-- Aurora background blobs for luxurious aesthetic -->
        <div class="footer-glow-blob blob-1" style="top: 10%; left: -10%; width: 500px; height: 500px; opacity: 0.15; filter: blur(120px); background: var(--primary);"></div>
        <div class="footer-glow-blob blob-2" style="bottom: 20%; right: -10%; width: 500px; height: 500px; opacity: 0.15; filter: blur(120px); background: var(--secondary);"></div>

        <div class="container" style="position: relative; z-index: 2;">
            <div class="section-header" style="margin-bottom: 60px;">
                <span class="section-badge" style="background: rgba(14, 165, 233, 0.1); border-color: rgba(14, 165, 233, 0.2); color: var(--primary);">KARYA TERBAIK</span>
                <h2 class="section-title">Portofolio Karya & Inovasi</h2>
                <p class="section-desc">Jelajahi hasil karya premium dengan integrasi visual interaktif, arsitektur kokoh, dan kinerja ultra-responsif yang telah kami luncurkan untuk para mitra kami.</p>
            </div>

            <!-- Portfolio Grid -->
            <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; margin-top: 40px;">
                
                <!-- Project 1: UG Force -->
                <div class="glass-card portfolio-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; height: 100%; border: 1px solid var(--border-color); border-radius: 20px; background: rgba(15, 23, 42, 0.3); backdrop-filter: blur(20px); transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div style="width: 100%; height: 220px; overflow: hidden; position: relative; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/portfolio_ugforce.png" alt="UG Force Esports Portal" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);" class="portfolio-img">
                        <div class="portfolio-overlay" style="position: absolute; top: 12px; right: 12px; z-index: 3;">
                            <span class="badge" style="background: rgba(168, 85, 247, 0.2); border: 1px solid rgba(168, 85, 247, 0.4); color: #c084fc; padding: 6px 12px; border-radius: 50px; font-size: 11px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase;">Esports & Community</span>
                        </div>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="font-size: 22px; font-weight: 800; margin-bottom: 15px; color: var(--text-main); font-family: var(--font-heading); display: flex; align-items: center; gap: 8px;">
                            UG Force Portal <span style="font-size: 14px; opacity: 0.5; font-weight: 400;">(v1.0)</span>
                        </h3>
                        <p style="font-size: 13.5px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">
                            Sebuah platform landing page dan pusat komunitas gaming & esports futuristik. Dirancang dengan visual gelap bertema neon cyber-cyber, sistem peringkat turnamen, pendaftaran tim terpadu, serta navigasi super-responsif.
                        </p>
                        
                        <!-- Tech Tags -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 30px;">
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Next.js</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">React</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Tailwind CSS</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Framer Motion</span>
                        </div>

                        <!-- Action Button -->
                        <a href="https://ugforce.vercel.app/" target="_blank" class="btn-primary" style="margin-top: auto; display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; background: linear-gradient(135deg, #a855f7 0%, #6366f1 100%); border: none; box-shadow: 0 0 15px rgba(168, 85, 247, 0.3);">
                            <span>Kunjungi Website</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 12px;"></i>
                        </a>
                    </div>
                </div>

                <!-- Project 2: ParkSmart GPS -->
                <div class="glass-card portfolio-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; height: 100%; border: 1px solid var(--border-color); border-radius: 20px; background: rgba(15, 23, 42, 0.3); backdrop-filter: blur(20px); transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div style="width: 100%; height: 220px; overflow: hidden; position: relative; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/portfolio_parksmart.png" alt="ParkSmart GPS Vehicle Tracking" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);" class="portfolio-img">
                        <div class="portfolio-overlay" style="position: absolute; top: 12px; right: 12px; z-index: 3;">
                            <span class="badge" style="background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; padding: 6px 12px; border-radius: 50px; font-size: 11px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase;">IoT & Tracking</span>
                        </div>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="font-size: 22px; font-weight: 800; margin-bottom: 15px; color: var(--text-main); font-family: var(--font-heading); display: flex; align-items: center; gap: 8px;">
                            ParkSmart GPS <span style="font-size: 14px; opacity: 0.5; font-weight: 400;">(v2.1)</span>
                        </h3>
                        <p style="font-size: 13.5px; color: var(--text-dark); opacity: 0.8; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">
                            Dasbor web analitik cerdas untuk pemantauan slot parkir terintegrasi dan sistem pelacakan GPS armada kendaraan real-time. Memadukan visualisasi data interaktif, integrasi peta dinamis, dan peringatan instan (warning alert).
                        </p>
                        
                        <!-- Tech Tags -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 30px;">
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Vue.js</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Vite</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Leaflet Maps</span>
                            <span class="tech-tag" style="font-size: 11px; padding: 4px 10px; border-radius: 6px; background: rgba(255,255,255,0.03); border: 1px solid var(--border-color); color: var(--text-muted);">Chart.js</span>
                        </div>

                        <!-- Action Button -->
                        <a href="https://parksmart-gps.vercel.app/" target="_blank" class="btn-primary" style="margin-top: auto; display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none; box-shadow: 0 0 15px rgba(16, 185, 129, 0.3);">
                            <span>Kunjungi Website</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 12px;"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Custom CSS styles injected specifically for Portfolio Page interactions -->
    <style>
        .portfolio-card:hover {
            transform: translateY(-8px) scale(1.01);
            border-color: rgba(14, 165, 233, 0.4) !important;
            box-shadow: 0 12px 30px rgba(14, 165, 233, 0.15);
        }
        .portfolio-card:hover .portfolio-img {
            transform: scale(1.08);
        }
        .tech-tag {
            transition: all 0.3s ease;
        }
        .portfolio-card:hover .tech-tag {
            border-color: rgba(255, 255, 255, 0.1) !important;
            background: rgba(255, 255, 255, 0.05) !important;
            color: var(--text-main) !important;
        }
    </style>

@endsection
