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
                <p class="section-desc" style="color: var(--text-muted);">Jelajahi hasil karya premium dengan integrasi visual interaktif, arsitektur kokoh, dan kinerja ultra-responsif yang telah kami luncurkan untuk para mitra kami.</p>
            </div>

            <!-- Portfolio Grid -->
            <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; margin-top: 40px;">
                
                <!-- Project 1: UG Force -->
                <div class="glass-card portfolio-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; height: 100%; border: 1px solid var(--border-color); border-radius: 20px; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div style="width: 100%; height: 220px; overflow: hidden; position: relative; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/portfolio_ugforce.png" alt="UG Force Classroom Booking" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);" class="portfolio-img">
                        <div class="portfolio-overlay" style="position: absolute; top: 12px; right: 12px; z-index: 3;">
                            <span class="badge" style="background: rgba(168, 85, 247, 0.15); border: 1px solid rgba(168, 85, 247, 0.3); color: #c084fc; padding: 6px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">Pemesanan Kelas & Kampus</span>
                        </div>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="font-size: 22px; font-weight: 800; margin-bottom: 15px; color: var(--text-main); font-family: var(--font-heading); display: flex; align-items: center; gap: 8px;">
                            UG Force Room Booking <span style="font-size: 14px; opacity: 0.5; font-weight: 400;">(v1.0)</span>
                        </h3>
                        <p style="font-size: 13.5px; color: var(--text-muted); opacity: 0.95; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">
                            Sistem informasi manajemen dan pemesanan ruang kelas perkuliahan berbasis web untuk civitas akademika. Memudahkan dosen dan mahasiswa dalam menjadwalkan kelas, memesan ruang rapat, dan memantau ketersediaan ruangan secara real-time.
                        </p>
                        
                        <!-- Tech Tags -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 30px;">
                            <span class="tech-tag">Laravel 11</span>
                            <span class="tech-tag">PostgreSQL</span>
                            <span class="tech-tag">Tailwind CSS</span>
                            <span class="tech-tag">Interactive Map</span>
                        </div>

                        <!-- Action Button -->
                        <a href="https://ugforce.vercel.app/" target="_blank" class="btn-primary" style="margin-top: auto; display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; background: linear-gradient(135deg, #a855f7 0%, #6366f1 100%); border: none; box-shadow: 0 0 15px rgba(168, 85, 247, 0.3); color: #ffffff !important;">
                            <span>Kunjungi Website</span> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 12px;"></i>
                        </a>
                    </div>
                </div>

                <!-- Project 2: ParkSmart GPS -->
                <div class="glass-card portfolio-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; height: 100%; border: 1px solid var(--border-color); border-radius: 20px; transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div style="width: 100%; height: 220px; overflow: hidden; position: relative; border-bottom: 1px solid var(--border-color);">
                        <img src="/images/portfolio_parksmart.png" alt="ParkSmart GPS AI Parking" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);" class="portfolio-img">
                        <div class="portfolio-overlay" style="position: absolute; top: 12px; right: 12px; z-index: 3;">
                            <span class="badge" style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 6px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;">AI Computer Vision</span>
                        </div>
                    </div>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="font-size: 22px; font-weight: 800; margin-bottom: 15px; color: var(--text-main); font-family: var(--font-heading); display: flex; align-items: center; gap: 8px;">
                            ParkSmart GPS AI <span style="font-size: 14px; opacity: 0.5; font-weight: 400;">(v2.1)</span>
                        </h3>
                        <p style="font-size: 13.5px; color: var(--text-muted); opacity: 0.95; line-height: 1.6; margin-bottom: 24px; flex-grow: 1;">
                            Sistem manajemen parkir pintar terintegrasi menggunakan teknologi Computer Vision AI untuk mendeteksi ketersediaan slot parkir secara real-time melalui kamera pengawas. Diimplementasikan di kawasan Summarecon Mall untuk mengoptimalkan mobilitas.
                        </p>
                        
                        <!-- Tech Tags -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 30px;">
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">Python (OpenCV)</span>
                            <span class="tech-tag">FastAPI</span>
                            <span class="tech-tag">IoT Analytics</span>
                        </div>

                        <!-- Action Button -->
                        <a href="https://parksmart-gps.vercel.app/" target="_blank" class="btn-primary" style="margin-top: auto; display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none; box-shadow: 0 0 15px rgba(16, 185, 129, 0.3); color: #ffffff !important;">
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
            font-size: 11px;
            padding: 5px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
            font-weight: 600;
            transition: all 0.3s ease;
        }
        html[data-theme="light"] .tech-tag {
            background: rgba(15, 23, 42, 0.04);
            color: var(--text-muted);
        }
        .portfolio-card:hover .tech-tag {
            border-color: rgba(14, 165, 233, 0.3) !important;
            background: rgba(14, 165, 233, 0.08) !important;
            color: var(--primary) !important;
        }
    </style>

@endsection
