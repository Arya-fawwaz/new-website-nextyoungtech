@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')
    <style>
        /* Hide Nova AI Chatbot on Portfolio Page */
        .nova-chatbot-container {
            display: none !important;
        }
    </style>
    <section class="portfolio-showcase">
        <div class="container">
            <div class="portfolio-section-heading" id="portfolio-projects" style="text-align: center; margin-bottom: 40px;">
                <span>Case Studies</span>
                <h2>Karya pilihan Next Young Tech</h2>
                <p class="section-desc" style="max-width: 600px; margin: 15px auto 0; font-size: 15px; color: var(--text-muted); line-height: 1.6;">
                    Jelajahi berbagai produk digital inovatif yang telah kami bangun dengan perhatian pada pengalaman pengguna, performa superior, keamanan tinggi, dan tampilan desain yang modern.
                </p>
            </div>

            <!-- Swiper Container -->
            <div class="portfolio-slider-wrapper" style="position: relative; padding: 0 40px;">
                <div class="swiper portfolio-swiper">
                    <div class="swiper-wrapper">
                        <!-- Portfolio Case 1 -->
                        <div class="swiper-slide">
                            <article class="portfolio-case-card is-ugforce">


                                <div class="portfolio-case-body">
                                    <a href="https://ugforce.vercel.app/" target="_blank" class="portfolio-media-link" aria-label="Buka UG Force Room Booking">
                                        <img src="/images/portfolio_ugforce.png" alt="Tampilan UG Force Room Booking" class="portfolio-case-image">
                                    </a>
                                    <div class="portfolio-case-content">
                                        <div class="portfolio-case-topline">
                                            <span>Smart Office</span>
                                            <small>v1.0</small>
                                        </div>
                                        <h3>UG Force Room Booking</h3>
                                        <p>
                                            Sistem pemesanan ruangan modern berbasis web dengan peta interaktif, manajemen jadwal real-time,
                                            dan integrasi notifikasi pintar untuk mengoptimalkan ruang kerja di perusahaan Anda.
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
                </div>
                
                <!-- Custom Swiper Navigation -->
                <div class="swiper-button-prev portfolio-prev desktop-nav-arrow"><i class="fa-solid fa-chevron-left" style="font-size: 14px;"></i></div>
                <div class="swiper-button-next portfolio-next desktop-nav-arrow"><i class="fa-solid fa-chevron-right" style="font-size: 14px;"></i></div>
            </div>

            <!-- Pagination -->
                <div class="swiper-nav-container portfolio-nav-container">
                    <div class="swiper-pagination portfolio-pagination"></div>
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
