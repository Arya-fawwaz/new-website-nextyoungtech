@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')
    <section class="portfolio-showcase">
        <div class="container">
            <div class="portfolio-hero">
                <div class="portfolio-hero-copy">
                    <h1>Portofolio digital yang dirancang matang, cepat, dan siap dipakai.</h1>
                    <p>
                        Beberapa produk web yang kami bangun dengan perhatian pada pengalaman pengguna,
                        performa, keamanan, dan tampilan yang tetap tajam di mode cerah maupun gelap.
                    </p>
                    <div class="portfolio-hero-actions">
                        <a href="{{ route('quotation.index') }}" class="portfolio-primary-link">
                            <span>Mulai Diskusi Proyek</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#portfolio-projects" class="portfolio-secondary-link">
                            <span>Lihat Studi Kasus</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </div>
                </div>

                <div class="portfolio-hero-panel" aria-label="Ringkasan kualitas portofolio">
                    <div class="portfolio-score">
                        <span>2</span>
                        <small>Produk aktif</small>
                    </div>
                    <div class="portfolio-proof-grid">
                        <div>
                            <i class="fa-solid fa-gauge-high"></i>
                            <strong>Fast-first</strong>
                            <span>Arsitektur ringan dan responsif.</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-shield-halved"></i>
                            <strong>Secure</strong>
                            <span>Alur data disusun rapi dan terkontrol.</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <strong>Adaptive</strong>
                            <span>Nyaman di desktop dan mobile.</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-layer-group"></i>
                            <strong>Scalable</strong>
                            <span>Siap dikembangkan bertahap.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio-section-heading" id="portfolio-projects">
                <span>Case Studies</span>
                <h2>Karya pilihan Next Young Tech</h2>
            </div>

            <!-- Swiper Container -->
            <div class="swiper portfolio-swiper">
                <div class="swiper-wrapper">
                    <!-- Portfolio Case 1 -->
                    <div class="swiper-slide">
                        <article class="portfolio-case-card is-ugforce">
                            <!-- Advanced Desktop Window Header -->
                            <div class="portfolio-window-header">
                                <div class="window-controls">
                                    <span class="control-dot dot-close" title="Close"></span>
                                    <span class="control-dot dot-minimize" title="Minimize"></span>
                                    <span class="control-dot dot-maximize" title="Maximize"></span>
                                </div>
                                <div class="window-address">
                                    <i class="fa-solid fa-shield-halved text-success"></i>
                                    <span class="address-text">showcase://ugforce.vercel.app</span>
                                </div>
                                <div class="window-meta">
                                    <span class="status-dot-pulse"></span>
                                    <span class="meta-label">LIVE_PREVIEW</span>
                                </div>
                            </div>

                            <div class="portfolio-case-body">
                                <a href="https://ugforce.vercel.app/" target="_blank" class="portfolio-media-link" aria-label="Buka UG Force Room Booking">
                                    <img src="/images/portfolio_ugforce.png" alt="Tampilan UG Force Room Booking" class="portfolio-case-image">
                                </a>
                                <div class="portfolio-case-content">
                                    <div class="portfolio-case-topline">
                                        <span>Education Platform</span>
                                        <small>v1.0</small>
                                    </div>
                                    <h3>UG Force Room Booking</h3>
                                    <p>
                                        Sistem pemesanan ruang kelas dan ruang rapat berbasis web untuk membantu civitas akademika
                                        melihat ketersediaan, membuat jadwal, dan mengelola pemakaian ruangan secara real-time.
                                    </p>
                                    <div class="portfolio-meta-row">
                                        <div>
                                            <span>Fokus</span>
                                            <strong>Operational Workflow</strong>
                                        </div>
                                        <div>
                                            <span>Output</span>
                                            <strong>Booking System</strong>
                                        </div>
                                    </div>
                                    <div class="portfolio-tech-list">
                                        <span>Laravel 11</span>
                                        <span>PostgreSQL</span>
                                        <span>Tailwind CSS</span>
                                        <span>Interactive Map</span>
                                    </div>
                                    <a href="https://ugforce.vercel.app/" target="_blank" class="portfolio-visit-link">
                                        <span>Kunjungi Website</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Portfolio Case 2 -->
                    <div class="swiper-slide">
                        <article class="portfolio-case-card is-parksmart">
                            <!-- Advanced Desktop Window Header -->
                            <div class="portfolio-window-header">
                                <div class="window-controls">
                                    <span class="control-dot dot-close" title="Close"></span>
                                    <span class="control-dot dot-minimize" title="Minimize"></span>
                                    <span class="control-dot dot-maximize" title="Maximize"></span>
                                </div>
                                <div class="window-address">
                                    <i class="fa-solid fa-shield-halved text-success"></i>
                                    <span class="address-text">showcase://parksmart.vercel.app</span>
                                </div>
                                <div class="window-meta">
                                    <span class="status-dot-pulse"></span>
                                    <span class="meta-label">LIVE_PREVIEW</span>
                                </div>
                            </div>

                            <div class="portfolio-case-body">
                                <a href="https://parksmart-gps.vercel.app/" target="_blank" class="portfolio-media-link" aria-label="Buka ParkSmart GPS AI">
                                    <img src="/images/portfolio_parksmart.png" alt="Tampilan ParkSmart GPS AI Parking" class="portfolio-case-image">
                                </a>
                                <div class="portfolio-case-content">
                                    <div class="portfolio-case-topline">
                                        <span>Smart Mobility</span>
                                        <small>v2.1</small>
                                    </div>
                                    <h3>ParkSmart GPS AI</h3>
                                    <p>
                                        Platform manajemen parkir pintar yang memanfaatkan Computer Vision AI untuk mendeteksi slot
                                        parkir kosong secara real-time melalui kamera pengawas dan analitik operasional.
                                    </p>
                                    <div class="portfolio-meta-row">
                                        <div>
                                            <span>Fokus</span>
                                            <strong>AI Monitoring</strong>
                                        </div>
                                        <div>
                                            <span>Output</span>
                                            <strong>Parking Dashboard</strong>
                                        </div>
                                    </div>
                                    <div class="portfolio-tech-list">
                                        <span>Vue.js</span>
                                        <span>Python OpenCV</span>
                                        <span>FastAPI</span>
                                        <span>IoT Analytics</span>
                                    </div>
                                    <a href="https://parksmart-gps.vercel.app/" target="_blank" class="portfolio-visit-link">
                                        <span>Kunjungi Website</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Custom Swiper Navigation -->
                <div class="swiper-nav-container portfolio-nav-container">
                    <div class="swiper-button-prev portfolio-prev"></div>
                    <div class="swiper-pagination portfolio-pagination"></div>
                    <div class="swiper-button-next portfolio-next"></div>
                </div>
            </div>

            <div class="portfolio-cta-band">
                <div>
                    <span>Need a polished product?</span>
                    <h2>Bangun website yang terasa profesional dari layar pertama.</h2>
                </div>
                <a href="{{ route('quotation.index') }}" class="portfolio-primary-link">
                    <span>Konsultasi Sekarang</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
