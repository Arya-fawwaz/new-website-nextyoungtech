document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header Scroll Effect
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Three.js Interactive Particle Nebula (Calm, Professional Stars)
    initThreeParticles();

    // 3. Elegant Entrance Animations (Intersection Observer)
    initScrollAnimations();

    // 4. 3D Card Hover Tilt Effect
    init3DTilt();

    // 5. Interactive Price Estimator (Quotation Calculator)
    initQuotationCalculator();

    // 6. Professional Dark Mode / Light Mode Theme Switching
    initThemeSwitch();

    // 7. Initialize Swiper Carousels
    initSwipers();
});

/* ==========================================================================
   2. Three.js Particles Background (Calm & Professional Star System)
   ========================================================================== */
function initThreeParticles() {
    const container = document.getElementById('three-canvas-container');
    if (!container) return;

    if (typeof THREE === 'undefined') return;

    const width = container.clientWidth;
    const height = container.clientHeight;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, width / height, 0.1, 100);
    camera.position.z = 30;

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // Reduced density for a much cleaner, professional feel (from 280 to 120)
    const particleCount = 120;
    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    const colors = new Float32Array(particleCount * 3);

    const colorPrimary = new THREE.Color('#00f2fe');
    const colorSecondary = new THREE.Color('#9d4edd');
    const colorAccent = new THREE.Color('#ff007f');

    for (let i = 0; i < particleCount; i++) {
        const r = 10 + Math.random() * 25;
        const theta = Math.random() * Math.PI * 2;
        const phi = Math.acos((Math.random() * 2) - 1);

        positions[i * 3] = r * Math.sin(phi) * Math.cos(theta);
        positions[i * 3 + 1] = r * Math.sin(phi) * Math.sin(theta);
        positions[i * 3 + 2] = r * Math.cos(phi);

        let mixedColor = colorPrimary.clone();
        const rand = Math.random();
        if (rand > 0.6) {
            mixedColor.lerp(colorSecondary, Math.random());
        } else if (rand > 0.3) {
            mixedColor.lerp(colorAccent, Math.random());
        }
        
        colors[i * 3] = mixedColor.r;
        colors[i * 3 + 1] = mixedColor.g;
        colors[i * 3 + 2] = mixedColor.b;
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    function createStarTexture() {
        const canvas = document.createElement('canvas');
        canvas.width = 32;
        canvas.height = 32;
        const ctx = canvas.getContext('2d');
        
        const gradient = ctx.createRadialGradient(16, 16, 0, 16, 16, 16);
        gradient.addColorStop(0, 'rgba(255, 255, 255, 1)');
        gradient.addColorStop(0.2, 'rgba(255, 255, 255, 0.8)');
        gradient.addColorStop(0.6, 'rgba(255, 255, 255, 0.15)');
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
        
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, 32, 32);
        
        return new THREE.CanvasTexture(canvas);
    }

    const material = new THREE.PointsMaterial({
        size: 0.85,
        map: createStarTexture(),
        vertexColors: true,
        transparent: true,
        opacity: 0.9,
        blending: THREE.AdditiveBlending,
        depthWrite: false
    });

    const particleSystem = new THREE.Points(geometry, material);
    scene.add(particleSystem);

    // Dynamic Blending adjustment for Dark/Light Mode
    window.updateParticlesTheme = function(theme) {
        if (theme === 'light') {
            material.blending = THREE.NormalBlending;
            material.opacity = 0.55;
        } else {
            material.blending = THREE.AdditiveBlending;
            material.opacity = 0.9;
        }
        material.needsUpdate = true;
    };

    // Initialize blending based on active theme
    const activeTheme = document.documentElement.getAttribute('data-theme') || 'dark';
    window.updateParticlesTheme(activeTheme);

    // Highly reduced rotation and mouse movement sensitivity for professional calmness
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;

    window.addEventListener('mousemove', (e) => {
        mouseX = (e.clientX - window.innerWidth / 2) * 0.015; // from 0.05
        mouseY = (e.clientY - window.innerHeight / 2) * 0.015; // from 0.05
    });

    window.addEventListener('resize', () => {
        const w = container.clientWidth;
        const h = container.clientHeight;
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    });

    function animate() {
        requestAnimationFrame(animate);

        targetX += (mouseX - targetX) * 0.03;
        targetY += (mouseY - targetY) * 0.03;

        // Extremely slow, non-distracting rotation
        particleSystem.rotation.y = targetX * 0.008 + Date.now() * 0.00002;
        particleSystem.rotation.x = targetY * 0.008 + Date.now() * 0.00001;

        const posAttr = geometry.attributes.position;
        const time = Date.now() * 0.0003;
        
        for (let i = 0; i < particleCount; i++) {
            const index = i * 3;
            // Minimized waves for premium professional stability
            posAttr.array[index + 1] += Math.sin(time + posAttr.array[index]) * 0.0015;
        }
        posAttr.needsUpdate = true;

        renderer.render(scene, camera);
    }

    animate();
}

/* ==========================================================================
   2.1. Dark Mode & Light Mode Theme Switcher
   ========================================================================== */
function initThemeSwitch() {
    if (window.themeSwitchInitialized) return;
    window.themeSwitchInitialized = true;

    const themeBtn = document.getElementById('theme-toggle-btn');
    const themeIcon = document.getElementById('theme-toggle-icon');
    const mobileThemeBtn = document.getElementById('mobile-theme-toggle-btn');
    const mobileThemeIcon = document.getElementById('mobile-theme-toggle-icon');

    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);

        const isLight = theme === 'light';
        const iconClass = isLight ? 'fa-solid fa-moon' : 'fa-solid fa-sun';
        const iconColor = isLight ? '#7209b7' : '#ffb703';
        const titleText = isLight ? 'Aktifkan Mode Gelap' : 'Aktifkan Mode Terang';

        if (themeIcon) {
            themeIcon.className = iconClass;
            themeIcon.style.color = iconColor;
        }
        if (themeBtn) {
            themeBtn.setAttribute('title', titleText);
        }

        if (mobileThemeIcon) {
            mobileThemeIcon.className = iconClass;
            mobileThemeIcon.style.color = iconColor;
        }
        if (mobileThemeBtn) {
            mobileThemeBtn.setAttribute('title', titleText);
        }

        if (typeof window.updateParticlesTheme === 'function') {
            window.updateParticlesTheme(theme);
        }
    }

    // Load initial theme state
    const savedTheme = localStorage.getItem('theme') || 'dark';
    setTheme(savedTheme);

    const toggleAction = (e) => {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
        }
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
        const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(nextTheme);
    };

    if (themeBtn) {
        themeBtn.onclick = toggleAction;
    }
    if (mobileThemeBtn) {
        mobileThemeBtn.onclick = toggleAction;
    }
}

/* ==========================================================================
   3. Elegant Entrance Animations (Intersection Observer)
   ========================================================================== */
function initScrollAnimations() {
    const animElements = document.querySelectorAll('.glass-card, .section-header, .portfolio-case-card, .calculator-container, .contact-container');
    
    // Set initial styling
    animElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(35px)';
        el.style.transition = 'opacity 0.8s ease, transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1)';
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animElements.forEach(el => observer.observe(el));
}

/* ==========================================================================
   4. 3D Card Hover Tilt Effect
   ========================================================================== */
function init3DTilt() {
    const cards = document.querySelectorAll('.glass-card, .portfolio-case-card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // x coordinate inside the card
            const y = e.clientY - rect.top;  // y coordinate inside the card

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            // Maximum rotation angle in degrees
            const maxRotate = 7;

            // Calculate rotation degrees based on cursor position relative to center
            const rotateX = ((centerY - y) / centerY) * maxRotate;
            const rotateY = ((x - centerX) / centerX) * maxRotate;

            // Apply style with perspective
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)';
        });
    });
}

/* ==========================================================================
   5. Interactive Price Estimator
   ========================================================================== */
function initQuotationCalculator() {
    const calcForm = document.getElementById('quotation-calc-form');
    if (!calcForm) return;

    const pagePrice = 25000; // Price per page (Rp 25.000)

    const optionalPrices = {
        'multilingual': 100000,
        'seo_opt': 150000,
        'high_anim': 200000,
        'secure_core': 150000,
        'payment_gateway': 300000,
        'cms_integrated': 250000
    };

    const pageSlider = document.getElementById('calc-pages');
    const pageValueDisplay = document.getElementById('calc-pages-value');
    const baseTypeRadios = document.querySelectorAll('input[name="project_type"]');
    const featureCheckboxes = document.querySelectorAll('input[name="features[]"]');
    
    const priceDisplay = document.getElementById('summary-total-price');
    const hiddenPriceInput = document.getElementById('hidden-estimated-price');
    const summaryTypeDisplay = document.getElementById('summary-project-type');
    const summaryPagesDisplay = document.getElementById('summary-pages-count');

    function calculate() {
        let total = 0;

        // 1. Base Project Type Price
        let basePriceSelected = 0;
        let projectTypeName = 'Layanan Terpilih';
        
        baseTypeRadios.forEach(radio => {
            if (radio.checked) {
                basePriceSelected = parseInt(radio.getAttribute('data-price')) || 0;
                projectTypeName = radio.nextElementSibling.querySelector('.calc-label').innerText;
            }
        });
        total += basePriceSelected;

        // 2. Pages Price
        let pagesCount = 1;
        if (pageSlider) {
            pagesCount = parseInt(pageSlider.value);
            if (pageValueDisplay) pageValueDisplay.innerText = pagesCount;
            total += (pagesCount - 1) * pagePrice; // First page is included in base type
        }

        // 3. Features Price
        featureCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const val = checkbox.value;
                if (optionalPrices[val]) {
                    total += optionalPrices[val];
                }
            }
        });

        // Format and Display with Dynamic Counter
        animatePrice(total);
        if (summaryTypeDisplay) summaryTypeDisplay.innerText = projectTypeName;
        if (summaryPagesDisplay) summaryPagesDisplay.innerText = pagesCount;
    }

    let currentPrice = 0;
    function animatePrice(targetPrice) {
        const start = currentPrice;
        const change = targetPrice - start;
        const duration = 400; // ms
        const startTime = performance.now();

        function update(now) {
            const progress = Math.min((now - startTime) / duration, 1);
            // Ease out quad
            const ease = progress * (2 - progress);
            const value = Math.round(start + change * ease);
            
            // Format IDR currency
            if (priceDisplay) {
                priceDisplay.innerText = formatIDR(value);
            }
            if (hiddenPriceInput) {
                hiddenPriceInput.value = value;
            }

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                currentPrice = targetPrice;
            }
        }

        requestAnimationFrame(update);
    }

    function formatIDR(val) {
        return 'Rp ' + val.toLocaleString('id-ID');
    }

    // Listeners
    if (pageSlider) {
        pageSlider.addEventListener('input', calculate);
    }
    baseTypeRadios.forEach(radio => {
        radio.addEventListener('change', calculate);
    });
    featureCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', calculate);
    });

    // Initial calculation
    calculate();
}

/* ==========================================================================
   5. Swiper JS Initialization (Features & Portfolio)
   ========================================================================== */
function initSwipers() {
    if (typeof Swiper !== 'undefined') {
        const featuresSwiper = document.querySelector('.features-swiper');
        if (featuresSwiper) {
            new Swiper('.features-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                grabCursor: true,
                navigation: {
                    nextEl: '.features-next',
                    prevEl: '.features-prev',
                },
                pagination: {
                    el: '.features-pagination',
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        }

        const portfolioSwiper = document.querySelector('.portfolio-swiper');
        if (portfolioSwiper) {
            new Swiper('.portfolio-swiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                grabCursor: true,
                navigation: {
                    nextEl: '.portfolio-next',
                    prevEl: '.portfolio-prev',
                },
                pagination: {
                    el: '.portfolio-pagination',
                    clickable: true,
                },
                breakpoints: {
                    992: {
                        slidesPerView: 2,
                    }
                }
            });
        }
    }
}
