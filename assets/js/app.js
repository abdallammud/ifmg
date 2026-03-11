/**
 * IFMG Frontend Application JavaScript
 * Includes: Translations, Carousel, Form Handling, and Animations
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Translation System
    let translations = {};
    // Use PHP-side language as source of truth, sync localStorage
    let currentLang = window.IFMG_LANG || localStorage.getItem('ifmg_lang') || 'en';
    localStorage.setItem('ifmg_lang', currentLang);

    async function loadTranslations() {
        try {
            const response = await fetch('ifmg_admin/assets/translations.json');
            if (!response.ok) throw new Error('Failed to load translations');
            translations = await response.json();
            applyLanguage(currentLang);
        } catch (error) {
            console.error('Error loading translations:', error);
            // Fallback: apply default lang even if fetch fails
            applyLanguage(currentLang);
        }
    }

    function applyLanguage(lang) {
        localStorage.setItem('ifmg_lang', lang);
        currentLang = lang;
        document.documentElement.lang = lang;

        // Update all elements with data-translate attribute
        document.querySelectorAll('[data-translate]').forEach(el => {
            const key = el.getAttribute('data-translate');
            if (translations[lang] && translations[lang][key]) {
                el.textContent = translations[lang][key];
            }
        });

        // Update placeholders
        document.querySelectorAll('[data-translate-placeholder]').forEach(el => {
            const key = el.getAttribute('data-translate-placeholder');
            if (translations[lang] && translations[lang][key]) {
                el.placeholder = translations[lang][key];
            }
        });

        // Update active state on language buttons
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });

        // Optional: Dispatch event for other components
        window.dispatchEvent(new CustomEvent('languageChanged', { detail: lang }));
    }

    // Initialize Translations
    loadTranslations();

    // 2. DOM Elements
    const header = document.getElementById('header');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const langBtns = document.querySelectorAll('.lang-btn');
    const carouselDots = document.querySelectorAll('.carousel-dot');
    const prevSlideBtn = document.getElementById('prevSlide');
    const nextSlideBtn = document.getElementById('nextSlide');
    const carouselSlides = document.querySelectorAll('.carousel-slide');

    // 3. Carousel Logic
    let currentSlide = 0;
    let carouselInterval = null;

    if (carouselSlides.length > 0) {
        function showSlide(index) {
            if (carouselSlides.length === 0) return;
            currentSlide = index;
            carouselSlides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                slide.style.zIndex = i === index ? '20' : '10';
                slide.style.pointerEvents = i === index ? 'auto' : 'none';
            });
            carouselDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
                if (i === index) {
                    dot.style.backgroundColor = '#C9A227';
                    dot.style.width = '24px';
                } else {
                    dot.style.backgroundColor = 'rgba(255,255,255,0.5)';
                    dot.style.width = '12px';
                }
            });
        }

        function nextSlide() {
            showSlide((currentSlide + 1) % carouselSlides.length);
        }

        function prevSlide() {
            showSlide((currentSlide - 1 + carouselSlides.length) % carouselSlides.length);
        }

        function startCarousel() {
            if (carouselSlides.length > 1) {
                carouselInterval = setInterval(nextSlide, 6000);
            }
        }

        function stopCarousel() {
            if (carouselInterval) clearInterval(carouselInterval);
        }

        nextSlideBtn?.addEventListener('click', () => {
            stopCarousel();
            nextSlide();
            startCarousel();
        });

        prevSlideBtn?.addEventListener('click', () => {
            stopCarousel();
            prevSlide();
            startCarousel();
        });

        carouselDots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                stopCarousel();
                showSlide(i);
                startCarousel();
            });
        });

        startCarousel();
    }

    // 5. Language Switcher - sync localStorage AND PHP session
    langBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const newLang = btn.getAttribute('data-lang');
            if (newLang === currentLang) return;

            // Save to localStorage for JS-side translations
            localStorage.setItem('ifmg_lang', newLang);

            // Navigate with ?lang= to update PHP session
            // This ensures database-driven content (carousel, director, etc.) is re-rendered in the correct language
            const url = new URL(window.location.href);
            url.searchParams.set('lang', newLang);
            window.location.href = url.toString();
        });
    });

    // 4. Header Scroll Effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header?.classList.add('header-scrolled');
        } else {
            header?.classList.remove('header-scrolled');
        }
    });

    // 5. Mobile Menu
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const isOpen = mobileMenu.classList.contains('open');
            mobileMenuBtn.innerHTML = isOpen
                ? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                : '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>';
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                mobileMenuBtn.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>';
            });
        });

        mobileMenu.querySelectorAll('.mobile-dropdown button').forEach(btn => {
            btn.addEventListener('click', () => {
                const dropdown = btn.nextElementSibling;
                const icon = btn.querySelector('svg');
                if (dropdown) {
                    dropdown.classList.toggle('hidden');
                    if (icon) icon.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
                }
            });
        });
    }

    // 6. Language Switchers (handled by section 5 above with page reload)

    // 7. Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId.startsWith('#') && targetId.length > 1) {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const headerHeight = header?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // 8. Form Handling (AJAX)
    const handleFormSubmit = (formId, endpoint, successCallback) => {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn?.innerText;

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = currentLang === 'en' ? 'Processing...' : 'Gudbinayaa...';
            }

            const formData = new FormData(form);

            fetch(endpoint, {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.status === 'success') {
                        form.reset();
                        if (successCallback) successCallback(data);
                    }
                })
                .catch(err => {
                    console.error('Form Error:', err);
                    alert(currentLang === 'en' ? 'An error occurred. Please try again.' : 'Khalad ayaa dhacay. Fadlan isku day hadane.');
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = originalBtnText;
                    }
                });
        });
    };

    handleFormSubmit('contactForm', 'process-contact.php');
    handleFormSubmit('subscribeForm', 'process-subscribe.php');
    handleFormSubmit('applicationForm', '#'); // Placeholder for now

    // 9. Animations (Fade-in-up)
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('section:not(#home) > div > div').forEach(el => {
        el.style.opacity = '0';
        observer.observe(el);
    });
});
