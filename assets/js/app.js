/**
 * BisnisonlineBGS - Main Application JavaScript
 * SPA Logic, Multilanguage Support & Parallax Navigation
 */

(function($) {
    'use strict';

    // ========================================
    // APP CONFIGURATION
    // ========================================
    const App = {
        config: window.APP_CONFIG || {
            basePath: '/',
            baseUrl: '',
            currentPage: 'home',
            currentLang: 'id',
            isProduction: false
        },
        lang: {},
        isLoading: false
    };

    // ========================================
    // LANGUAGE MANAGER
    // ========================================
    const LangManager = {
        currentLang: 'id',
        translations: {},
        supportedLangs: ['id', 'en'],

        init: function() {
            this.currentLang = App.config.currentLang || this.getCookie('lang') || 'id';
            this.loadLanguage(this.currentLang);
            this.bindEvents();
        },

        bindEvents: function() {
            $(document).on('click', '.btn-lang', function(e) {
                e.preventDefault();
                const lang = $(this).data('lang');
                LangManager.switchLanguage(lang);
            });
        },

        loadLanguage: function(lang, callback) {
            const self = this;
            
            if (this.translations[lang]) {
                this.applyTranslations(lang);
                if (callback) callback();
                return;
            }

            $.ajax({
                url: App.config.baseUrl + '/assets/lang/lang_' + lang + '.json',
                dataType: 'json',
                success: function(data) {
                    self.translations[lang] = data;
                    self.applyTranslations(lang);
                    if (callback) callback();
                },
                error: function() {
                    console.error('Failed to load language: ' + lang);
                    if (lang !== 'id') {
                        self.loadLanguage('id', callback);
                    }
                }
            });
        },

        switchLanguage: function(lang) {
            if (!this.supportedLangs.includes(lang)) {
                console.error('Unsupported language: ' + lang);
                return;
            }

            this.currentLang = lang;
            this.setCookie('lang', lang, 365);
            
            $('.btn-lang').removeClass('active');
            $('.btn-lang[data-lang="' + lang + '"]').addClass('active');
            
            $('html').attr('lang', lang === 'id' ? 'id' : 'en');
            
            this.loadLanguage(lang);
            
            $(document).trigger('languageChanged', [lang]);
        },

        applyTranslations: function(lang) {
            const translations = this.translations[lang];
            if (!translations) return;

            App.lang = translations;

            $('[data-lang-key]').each(function() {
                const key = $(this).data('lang-key');
                const text = LangManager.getTranslation(key);
                if (text) {
                    $(this).text(text);
                }
            });

            $('[data-lang-placeholder]').each(function() {
                const key = $(this).data('lang-placeholder');
                const text = LangManager.getTranslation(key);
                if (text) {
                    $(this).attr('placeholder', text);
                }
            });

            $('[data-lang-title]').each(function() {
                const key = $(this).data('lang-title');
                const text = LangManager.getTranslation(key);
                if (text) {
                    $(this).attr('title', text);
                }
            });

            $('[data-lang-aria]').each(function() {
                const key = $(this).data('lang-aria');
                const text = LangManager.getTranslation(key);
                if (text) {
                    $(this).attr('aria-label', text);
                }
            });

            $('[data-lang-alt]').each(function() {
                const key = $(this).data('lang-alt');
                const text = LangManager.getTranslation(key);
                if (text) {
                    $(this).attr('alt', text);
                }
            });
        },

        getTranslation: function(key) {
            const keys = key.split('.');
            let value = this.translations[this.currentLang];
            
            for (let i = 0; i < keys.length; i++) {
                if (value && value[keys[i]]) {
                    value = value[keys[i]];
                } else {
                    return null;
                }
            }
            
            return value;
        },

        t: function(key, replacements) {
            let text = this.getTranslation(key) || key;
            
            if (replacements) {
                for (let placeholder in replacements) {
                    text = text.replace(new RegExp('{{' + placeholder + '}}', 'g'), replacements[placeholder]);
                }
            }
            
            return text;
        },

        setCookie: function(name, value, days) {
            let expires = '';
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = '; expires=' + date.toUTCString();
            }
            document.cookie = name + '=' + (value || '') + expires + '; path=/; SameSite=Lax';
        },

        getCookie: function(name) {
            const nameEQ = name + '=';
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
    };

    // ========================================
    // PARALLAX NAVIGATION
    // ========================================
    const ParallaxNav = {
        sections: [],
        navHeight: 70,
        scrollOffset: 80,

        init: function() {
            this.cacheSections();
            this.bindEvents();
            this.updateActiveNav();
        },

        cacheSections: function() {
            this.sections = [];
            $('section[id]').each(function() {
                ParallaxNav.sections.push({
                    id: $(this).attr('id'),
                    offset: $(this).offset().top
                });
            });
        },

        bindEvents: function() {
            const self = this;

            // Smooth scroll untuk link dengan class .scroll-link
            $(document).on('click', '.scroll-link, a[href^="#"]', function(e) {
                const href = $(this).attr('href');
                if (href && href.startsWith('#') && href.length > 1) {
                    e.preventDefault();
                    const target = $(href);
                    if (target.length) {
                        self.scrollToSection(href);
                    }
                }
            });

            // Update active nav on scroll
            $(window).on('scroll', Utils.throttle(function() {
                self.updateActiveNav();
                self.updateScrollProgress();
            }, 100));

            // Recalculate section positions on resize
            $(window).on('resize', Utils.debounce(function() {
                self.cacheSections();
            }, 200));
        },

        scrollToSection: function(target) {
            const $target = $(target);
            if ($target.length) {
                const offsetTop = $target.offset().top - this.scrollOffset;
                
                // Toggle mobile menu classes immediately
                if ($('body').hasClass('mobile-nav-open')) {
                    $('.navbar-collapse').collapse('hide');
                    $('body').removeClass('mobile-nav-open');
                }

                // Native smooth scroll is often more "refined" and GPU accelerated
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });

                // Update URL hash
                if (history.pushState) {
                    setTimeout(() => {
                        history.pushState(null, null, target);
                    }, 500);
                }
            }
        },

        updateActiveNav: function() {
            const scrollPos = $(window).scrollTop() + this.scrollOffset + 50;
            
            let currentSection = '';
            
            for (let i = this.sections.length - 1; i >= 0; i--) {
                if (scrollPos >= this.sections[i].offset) {
                    currentSection = this.sections[i].id;
                    break;
                }
            }
            
            if (currentSection) {
                $('.navbar-nav .nav-link').removeClass('active');
                $('.navbar-nav .nav-link[href="#' + currentSection + '"]').addClass('active');
            }
        },

        updateScrollProgress: function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            
            $('#scrollProgress').css('width', scrolled + '%');
        }
    };

    // ========================================
    // UI MANAGER
    // ========================================
    const UIManager = {
        init: function() {
            this.initComponents();
            this.initScrollEffects();
            this.initBackToTop();
            this.initNavbar();
            this.initAOS();
            this.initParallaxBackground();
        },

        initParallaxBackground: function() {
            const self = this;
            const $parallaxSections = $('.section-parallax-bg');
            
            if (!$parallaxSections.length) return;

            const updateParallax = () => {
                const scrolled = window.scrollY;
                const winHeight = window.innerHeight;

                $parallaxSections.each(function() {
                    const $el = $(this);
                    const offsetTop = $el.offset().top;
                    const height = $el.outerHeight();

                    if (scrolled + winHeight > offsetTop && scrolled < offsetTop + height) {
                        const relativeScroll = scrolled - offsetTop;
                        
                        // Default background parallax
                        const yPos = -(relativeScroll * 0.2);
                        
                        // Hero specific zoom parallax
                        if ($el.hasClass('section-banner')) {
                            const scale = 1 + (relativeScroll / winHeight) * 0.1;
                            $el.css({
                                'background-position': `center ${yPos}px`,
                                'transform': `scale(${scale})`
                            });
                        } else {
                            $el.css('background-position', `center ${yPos}px`);
                        }
                    }
                });
                
                requestAnimationFrame(updateParallax);
            };

            requestAnimationFrame(updateParallax);
        },

        initComponents: function() {
            this.initTooltips();
            this.initPopovers();
        },

        initTooltips: function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        },

        initPopovers: function() {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        },

        initAOS: function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1200, // Longer for elegance
                    easing: 'cubic-bezier(0.25, 0.1, 0.25, 1.0)', // Ultra smooth easing
                    once: true,
                    offset: 120,
                    delay: 50
                });
            }
        },

        initSmoothWheelScroll: function() {
            // Only for desktop with mice
            if (Utils.isMobile() || Utils.isTablet()) return;

            let targetScroll = window.scrollY;
            let currentScroll = window.scrollY;
            const factor = 0.08; // Inertia factor (lower = smoother/slower)

            window.addEventListener('wheel', (e) => {
                e.preventDefault();
                targetScroll += e.deltaY;
                targetScroll = Math.max(0, Math.min(targetScroll, document.documentElement.scrollHeight - window.innerHeight));
            }, { passive: false });

            const smoothScroll = () => {
                const diff = targetScroll - currentScroll;
                if (Math.abs(diff) > 0.1) {
                    currentScroll += diff * factor;
                    window.scrollTo(0, currentScroll);
                }
                requestAnimationFrame(smoothScroll);
            };
            
            // Commenting out the active implementation to avoid potential conflicts with browser native smooth scroll
            // Only enable if explicitly requested for 'inertial' scrolling
            // smoothScroll(); 
        },

        initScrollEffects: function() {
            const navbar = $('.site-navbar');
            
            $(window).on('scroll', function() {
                const scrollTop = $(this).scrollTop();
                
                // Navbar shadow on scroll
                if (scrollTop > 50) {
                    navbar.addClass('navbar-scrolled');
                } else {
                    navbar.removeClass('navbar-scrolled');
                }
            });
        },

        initBackToTop: function() {
            const $btn = $('#btn-back-to-top');
            
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 300) {
                    $btn.addClass('show');
                } else {
                    $btn.removeClass('show');
                }
            });
            
            $btn.on('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        },

        initNavbar: function() {
            $('.navbar-toggler').on('click', function() {
                $('body').toggleClass('mobile-nav-open');
            });
            
            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.navbar').length && $('body').hasClass('mobile-nav-open')) {
                    $('.navbar-collapse').collapse('hide');
                    $('body').removeClass('mobile-nav-open');
                }
            });
            
            // Close menu when clicking nav link on mobile
            $('.navbar-nav .nav-link').on('click', function() {
                if ($(window).width() < 992) {
                    $('.navbar-collapse').collapse('hide');
                    $('body').removeClass('mobile-nav-open');
                }
            });
        }
    };

    // ========================================
    // FORM HANDLER
    // ========================================
    const FormHandler = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $(document).on('submit', 'form[data-ajax-form]', function(e) {
                e.preventDefault();
                FormHandler.handleSubmit($(this));
            });

            // Real-time validation
            $(document).on('blur', '.form-control[required]', function() {
                FormHandler.validateField($(this));
            });
        },

        handleSubmit: function($form) {
            const self = this;
            const $submitBtn = $form.find('[type="submit"]');
            const originalText = $submitBtn.html();
            
            // Validate all fields
            let isValid = true;
            $form.find('.form-control[required]').each(function() {
                if (!self.validateField($(this))) {
                    isValid = false;
                }
            });

            if (!isValid) {
                self.showMessage($form, 'error', LangManager.t('common.error'));
                return;
            }
            
            $submitBtn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>' + LangManager.t('common.sending'));
            
            const formData = new FormData($form[0]);
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(function() {
                self.showMessage($form, 'success', LangManager.t('register.success') || 'Pendaftaran berhasil! Tim kami akan segera menghubungi Anda.');
                $form[0].reset();
                $submitBtn.prop('disabled', false).html(originalText);
            }, 2000);
        },

        showMessage: function($form, type, message) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            const icon = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill';
            const $alert = $('<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                '<i class="bi ' + icon + ' me-2"></i>' + message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>');
            
            $form.find('.form-messages').html($alert);
            
            // Scroll to message
            $('html, body').animate({
                scrollTop: $form.offset().top - 100
            }, 500);
            
            setTimeout(function() {
                $alert.alert('close');
            }, 5000);
        },

        validateField: function($field) {
            const value = $field.val().trim();
            const type = $field.attr('type');
            const required = $field.prop('required');
            let isValid = true;
            
            // Remove previous validation state
            $field.removeClass('is-valid is-invalid');
            
            if (required && !value) {
                isValid = false;
            } else if (type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailRegex.test(value);
            } else if (type === 'tel' && value) {
                const phoneRegex = /^[\d\s\-+()]{10,15}$/;
                isValid = phoneRegex.test(value);
            }
            
            $field.addClass(isValid ? 'is-valid' : 'is-invalid');
            return isValid;
        }
    };

    // ========================================
    // UTILITY FUNCTIONS
    // ========================================
    const Utils = {
        debounce: function(func, wait) {
            let timeout;
            return function executedFunction() {
                const context = this;
                const args = arguments;
                const later = function() {
                    timeout = null;
                    func.apply(context, args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        throttle: function(func, limit) {
            let lastFunc;
            let lastRan;
            return function() {
                const context = this;
                const args = arguments;
                if (!lastRan) {
                    func.apply(context, args);
                    lastRan = Date.now();
                } else {
                    clearTimeout(lastFunc);
                    lastFunc = setTimeout(function() {
                        if ((Date.now() - lastRan) >= limit) {
                            func.apply(context, args);
                            lastRan = Date.now();
                        }
                    }, limit - (Date.now() - lastRan));
                }
            };
        },

        isMobile: function() {
            return window.innerWidth < 768;
        },

        isTablet: function() {
            return window.innerWidth >= 768 && window.innerWidth <= 1024;
        },

        isDesktop: function() {
            return window.innerWidth > 1024;
        },

        getDeviceType: function() {
            if (this.isMobile()) return 'mobile';
            if (this.isTablet()) return 'tablet';
            return 'desktop';
        },

        formatNumber: function(num) {
            return new Intl.NumberFormat(LangManager.currentLang === 'id' ? 'id-ID' : 'en-US').format(num);
        },

        formatCurrency: function(num, currency) {
            currency = currency || 'IDR';
            return new Intl.NumberFormat(LangManager.currentLang === 'id' ? 'id-ID' : 'en-US', {
                style: 'currency',
                currency: currency,
                minimumFractionDigits: 0
            }).format(num);
        }
    };

    // ========================================
    // COUNTER ANIMATION
    // ========================================
    const CounterAnimation = {
        init: function() {
            this.observeCounters();
        },

        observeCounters: function() {
            const self = this;
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                        self.animateCounter(entry.target);
                        entry.target.classList.add('counted');
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('[data-counter]').forEach(function(el) {
                observer.observe(el);
            });
        },

        animateCounter: function(element) {
            const target = parseInt(element.getAttribute('data-counter'));
            const duration = parseInt(element.getAttribute('data-duration')) || 2000;
            const suffix = element.getAttribute('data-suffix') || '';
            const prefix = element.getAttribute('data-prefix') || '';
            const start = 0;
            const startTime = performance.now();

            const updateCounter = function(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(start + (target - start) * easeOutQuart);
                
                element.textContent = prefix + Utils.formatNumber(current) + suffix;
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = prefix + Utils.formatNumber(target) + suffix;
                }
            };

            requestAnimationFrame(updateCounter);
        }
    };

    // ========================================
    // VIDEO MODAL HANDLER
    // ========================================
    const VideoModal = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            // Stop video when modal is closed
            $('#videoModal').on('hidden.bs.modal', function() {
                $('#videoFrame').attr('src', '');
            });

            // Play video when modal is opened
            $('.play-button[data-bs-target="#videoModal"]').on('click', function() {
                const videoUrl = $(this).data('video') || 'https://www.youtube.com/embed/dQw4w9WgXcQ';
                $('#videoFrame').attr('src', videoUrl + '?autoplay=1');
            });
        }
    };

    // ========================================
    // IMAGE PREVIEW HANDLER
    // ========================================
    const ImagePreview = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $(document).on('click', '.legal-card-modern, .award-card-modern, .award-slide-image', function() {
                const imgSrc = $(this).find('img').attr('src');
                $('#previewImage').attr('src', imgSrc);
                $('#imagePreviewModal').modal('show');
            });
        }
    };

    // ========================================
    // CHARITY SLIDER - Responsive Multi-Item Carousel
    // ========================================
    const CharitySlider = {
        track: null,
        slides: [],
        currentIndex: 0,
        slidesPerView: 3,
        totalSlides: 0,
        autoplayInterval: null,
        autoplayDelay: 4000,
        isPlaying: true,
        touchStartX: 0,
        touchEndX: 0,

        init: function() {
            this.track = document.querySelector('.charity-track');
            if (!this.track) return;

            this.slides = Array.from(this.track.querySelectorAll('.charity-slide'));
            this.totalSlides = this.slides.length;

            if (this.totalSlides === 0) return;

            this.updateSlidesPerView();
            this.createDots();
            this.bindEvents();
            this.cloneSlides();
            this.updateSliderPosition(false);
            this.startAutoplay();
        },

        updateSlidesPerView: function() {
            const width = window.innerWidth;
            if (width < 768) {
                this.slidesPerView = 1;
            } else if (width < 1024) {
                this.slidesPerView = 2;
            } else {
                this.slidesPerView = 3;
            }
        },

        cloneSlides: function() {
            const existingClones = this.track.querySelectorAll('.charity-slide.clone');
            existingClones.forEach(clone => clone.remove());

            for (let i = 0; i < this.slidesPerView; i++) {
                const cloneFirst = this.slides[i].cloneNode(true);
                cloneFirst.classList.add('clone');
                this.track.appendChild(cloneFirst);

                const cloneLast = this.slides[this.totalSlides - 1 - i].cloneNode(true);
                cloneLast.classList.add('clone');
                this.track.insertBefore(cloneLast, this.track.firstChild);
            }
        },

        createDots: function() {
            const dotsContainer = document.getElementById('charityDots');
            if (!dotsContainer) return;

            dotsContainer.innerHTML = '';
            const totalDots = Math.ceil(this.totalSlides / this.slidesPerView);

            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement('button');
                dot.classList.add('dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => this.goToSlide(i * this.slidesPerView));
                dotsContainer.appendChild(dot);
            }
        },

        updateDots: function() {
            const dots = document.querySelectorAll('#charityDots .dot');
            const activeDotIndex = Math.floor(this.currentIndex / this.slidesPerView) % Math.ceil(this.totalSlides / this.slidesPerView);

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === activeDotIndex);
            });
        },

        bindEvents: function() {
            const self = this;

            const prevBtn = document.getElementById('charityPrev');
            const nextBtn = document.getElementById('charityNext');

            if (prevBtn) {
                prevBtn.addEventListener('click', () => self.prev());
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', () => self.next());
            }

            window.addEventListener('resize', Utils.debounce(function() {
                self.updateSlidesPerView();
                self.cloneSlides();
                self.createDots();
                self.updateSliderPosition(false);
            }, 250));

            const slider = document.querySelector('.charity-slider');
            if (slider) {
                slider.addEventListener('mouseenter', () => self.pauseAutoplay());
                slider.addEventListener('mouseleave', () => self.startAutoplay());

                slider.addEventListener('touchstart', (e) => {
                    self.touchStartX = e.changedTouches[0].screenX;
                    self.pauseAutoplay();
                }, { passive: true });

                slider.addEventListener('touchend', (e) => {
                    self.touchEndX = e.changedTouches[0].screenX;
                    self.handleSwipe();
                    self.startAutoplay();
                }, { passive: true });
            }
        },

        handleSwipe: function() {
            const diff = this.touchStartX - this.touchEndX;
            const threshold = 50;

            if (diff > threshold) {
                this.next();
            } else if (diff < -threshold) {
                this.prev();
            }
        },

        getSlideWidth: function() {
            return 100 / this.slidesPerView;
        },

        updateSliderPosition: function(animate = true) {
            const slideWidth = this.getSlideWidth();
            const offset = (this.currentIndex + this.slidesPerView) * slideWidth;

            this.track.style.transition = animate ? 'transform 0.5s ease-in-out' : 'none';
            this.track.style.transform = `translateX(-${offset}%)`;

            this.updateDots();
        },

        next: function() {
            this.currentIndex++;
            this.updateSliderPosition();

            if (this.currentIndex >= this.totalSlides) {
                setTimeout(() => {
                    this.currentIndex = 0;
                    this.updateSliderPosition(false);
                }, 500);
            }
        },

        prev: function() {
            this.currentIndex--;
            this.updateSliderPosition();

            if (this.currentIndex < 0) {
                setTimeout(() => {
                    this.currentIndex = this.totalSlides - 1;
                    this.updateSliderPosition(false);
                }, 500);
            }
        },

        goToSlide: function(index) {
            this.currentIndex = index;
            this.updateSliderPosition();
        },

        startAutoplay: function() {
            const self = this;
            if (this.autoplayInterval) return;

            this.isPlaying = true;
            this.autoplayInterval = setInterval(() => {
                if (self.isPlaying) {
                    self.next();
                }
            }, this.autoplayDelay);
        },

        pauseAutoplay: function() {
            this.isPlaying = false;
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        }
    };

    // ========================================
    // PRODUCT SHOWCASE - Category & Detail Panel
    // ========================================
    const ProductShowcase = {
        products: {
            // Health & Wellness
            bionadboost: {
                title: 'product_names.nad_boost',
                category: 'products.cat_health',
                image: 'images/produk/bionadboost.JPG',
                desc: 'product_details.bionadboost.desc',
                benefits: [
                    { icon: 'bi-activity', text: 'product_details.bionadboost.b1', value: 95 },
                    { icon: 'bi-arrow-repeat', text: 'product_details.bionadboost.b2', value: 90 },
                    { icon: 'bi-lightning-charge', text: 'product_details.bionadboost.b3', value: 88 }
                ]
            },
            applescplus: {
                title: 'product_names.applesc_plus',
                category: 'products.cat_health',
                image: 'images/produk/applescplus.JPG',
                desc: 'product_details.applescplus.desc',
                benefits: [
                    { icon: 'bi-arrow-repeat', text: 'product_details.applescplus.b1', value: 98 },
                    { icon: 'bi-shield-check', text: 'product_details.applescplus.b2', value: 95 },
                    { icon: 'bi-clock-history', text: 'product_details.applescplus.b3', value: 96 },
                    { icon: 'bi-sun', text: 'product_details.applescplus.b4', value: 94 },
                    { icon: 'bi-plus-circle', text: 'product_details.applescplus.b5', value: 93 },
                    { icon: 'bi-shield-plus', text: 'product_details.applescplus.b6', value: 95 },
                    { icon: 'bi-capsule', text: 'product_details.applescplus.b7', value: 92 },
                    { icon: 'bi-brightness-high', text: 'product_details.applescplus.b8', value: 90 }
                ]
            },
            applesc: {
                title: 'product_names.applesc',
                category: 'products.cat_health',
                image: 'images/produk/applesc.JPG',
                desc: 'product_details.applesc.desc',
                benefits: [
                    { icon: 'bi-arrow-repeat', text: 'product_details.applesc.b1', value: 95 },
                    { icon: 'bi-shield-check', text: 'product_details.applesc.b2', value: 93 },
                    { icon: 'bi-clock-history', text: 'product_details.applesc.b3', value: 94 },
                    { icon: 'bi-sun', text: 'product_details.applesc.b4', value: 92 },
                    { icon: 'bi-plus-circle', text: 'product_details.applesc.b5', value: 90 },
                    { icon: 'bi-brightness-high', text: 'product_details.applesc.b6', value: 88 }
                ]
            },
            bioscmild: {
                title: 'product_names.sc_mild',
                category: 'products.cat_health',
                image: 'images/produk/bioscmild.JPG',
                desc: 'product_details.bioscmild.desc',
                benefits: [
                    { icon: 'bi-heart-pulse', text: 'product_details.bioscmild.b1', value: 95 },
                    { icon: 'bi-brain', text: 'product_details.bioscmild.b2', value: 92 },
                    { icon: 'bi-yin-yang', text: 'product_details.bioscmild.b3', value: 90 },
                    { icon: 'bi-trophy', text: 'product_details.bioscmild.b4', value: 88 },
                    { icon: 'bi-shield-plus', text: 'product_details.bioscmild.b5', value: 86 }
                ]
            },
            biomildcapsule: {
                title: 'product_names.sc_mild_capsule',
                category: 'products.cat_health',
                image: 'images/produk/biomildcapsule.JPG',
                desc: 'product_details.biomildcapsule.desc',
                benefits: [
                    { icon: 'bi-emoji-smile', text: 'product_details.biomildcapsule.b1', value: 96 },
                    { icon: 'bi-heart-pulse', text: 'product_details.biomildcapsule.b2', value: 94 },
                    { icon: 'bi-brain', text: 'product_details.biomildcapsule.b3', value: 92 },
                    { icon: 'bi-eye', text: 'product_details.biomildcapsule.b4', value: 90 },
                    { icon: 'bi-yin-yang', text: 'product_details.biomildcapsule.b5', value: 88 },
                    { icon: 'bi-shield-plus', text: 'product_details.biomildcapsule.b6', value: 86 }
                ]
            },
            bioscgold: {
                title: 'product_names.sc_gold',
                category: 'products.cat_health',
                image: 'images/produk/biogold.JPG',
                desc: 'product_details.bioscgold.desc',
                benefits: [
                    { icon: 'bi-heart-pulse', text: 'product_details.bioscgold.b1', value: 96 },
                    { icon: 'bi-lightning-charge', text: 'product_details.bioscgold.b2', value: 94 },
                    { icon: 'bi-shield-check', text: 'product_details.bioscgold.b3', value: 88 },
                    { icon: 'bi-brain', text: 'product_details.bioscgold.b4', value: 90 },
                    { icon: 'bi-shield-plus', text: 'product_details.bioscgold.b5', value: 92 }
                ]
            },
            bioinflavia: {
                title: 'product_names.inflavia',
                category: 'products.cat_health',
                image: 'images/produk/bioinflavia.JPG',
                desc: 'product_details.bioinflavia.desc',
                benefits: [
                    { icon: 'bi-shield-check', text: 'product_details.bioinflavia.b1', value: 94 },
                    { icon: 'bi-heart-pulse', text: 'product_details.bioinflavia.b2', value: 92 },
                    { icon: 'bi-droplet-half', text: 'product_details.bioinflavia.b3', value: 90 },
                    { icon: 'bi-virus', text: 'product_details.bioinflavia.b4', value: 88 }
                ]
            },
            // Weight Management
            biorawgenic: {
                title: 'product_names.rawgenic',
                category: 'products.cat_weight',
                image: 'images/produk/biorawgenic.JPG',
                desc: 'product_details.biorawgenic.desc',
                benefits: [
                    { icon: 'bi-fire', text: 'product_details.biorawgenic.b1', value: 98 },
                    { icon: 'bi-graph-down-arrow', text: 'product_details.biorawgenic.b2', value: 95 },
                    { icon: 'bi-shield-check', text: 'product_details.biorawgenic.b3', value: 90 },
                    { icon: 'bi-speedometer2', text: 'product_details.biorawgenic.b4', value: 92 },
                    { icon: 'bi-heart-pulse', text: 'product_details.biorawgenic.b5', value: 88 },
                    { icon: 'bi-heart', text: 'product_details.biorawgenic.b6', value: 86 },
                    { icon: 'bi-shield-plus', text: 'product_details.biorawgenic.b7', value: 85 }
                ]
            },
            beauty2: {
                title: 'product_names.collagen',
                category: 'products.cat_beauty',
                image: 'images/produk/bionadboost.JPG',
                desc: 'product_details.beauty2.desc',
                benefits: [
                    { icon: 'bi-heart', text: 'product_details.beauty2.b1', value: 95 },
                    { icon: 'bi-moisture', text: 'product_details.beauty2.b2', value: 90 },
                    { icon: 'bi-magic', text: 'product_details.beauty2.b3', value: 92 }
                ]
            },
            // Nutrition
            nutrition1: {
                title: 'product_names.fiber',
                category: 'products.cat_nutrition',
                image: 'images/produk/bionadboost.JPG',
                desc: 'product_details.nutrition1.desc',
                benefits: [
                    { icon: 'bi-arrow-down-up', text: 'product_details.nutrition1.b1', value: 93 },
                    { icon: 'bi-speedometer', text: 'product_details.nutrition1.b2', value: 88 },
                    { icon: 'bi-shield-plus', text: 'product_details.nutrition1.b3', value: 85 }
                ]
            },
            nutrition2: {
                title: 'product_names.protein',
                category: 'products.cat_nutrition',
                image: 'images/produk/bionadboost.JPG',
                desc: 'product_details.nutrition2.desc',
                benefits: [
                    { icon: 'bi-person-arms-up', text: 'product_details.nutrition2.b1', value: 94 },
                    { icon: 'bi-lightning-charge', text: 'product_details.nutrition2.b2', value: 90 },
                    { icon: 'bi-graph-up-arrow', text: 'product_details.nutrition2.b3', value: 87 }
                ]
            }
        },

        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            const self = this;

            // Category Tab Click
            $(document).on('click', '.category-tab', function() {
                const category = $(this).data('category');
                self.switchCategory(category);
            });

            // Product Card Click
            $(document).on('click', '.product-card', function() {
                const productId = $(this).data('product');
                if (productId) {
                    self.showProductDetail(productId);
                }
            });

            // Close Panel
            $(document).on('click', '#closePanelBtn, #closePanelBtn2', function() {
                self.closeProductDetail();
            });

            // Close on overlay click
            $(document).on('click', '.product-detail-panel', function(e) {
                if ($(e.target).hasClass('product-detail-panel')) {
                    self.closeProductDetail();
                }
            });

            // Close on ESC key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    self.closeProductDetail();
                }
            });
        },

        switchCategory: function(category) {
            // Update tabs
            $('.category-tab').removeClass('active');
            $('.category-tab[data-category="' + category + '"]').addClass('active');

            // Update content
            $('.product-category-content').removeClass('active');
            $('.product-category-content[data-category="' + category + '"]').addClass('active');
        },

        showProductDetail: function(productId) {
            const product = this.products[productId];
            if (!product) return;

            const panel = $('#productDetailPanel');
            const baseUrl = App.config.baseUrl || '';

            // Update panel content
            $('#detailImage').attr('src', baseUrl + '/assets/' + product.image).attr('alt', LangManager.t(product.title));
            $('#detailTitle').text(LangManager.t(product.title));
            $('#detailDesc').text(LangManager.t(product.desc));
            panel.find('.detail-category').html('<i class="bi bi-tag"></i> ' + LangManager.t(product.category));

            // Update benefits
            const benefitsContainer = panel.find('.detail-benefits');
            let benefitsHtml = '<h5><i class="bi bi-check-circle-fill me-2"></i>' + LangManager.t('products.main_benefits') + '</h5>';

            product.benefits.forEach(function(benefit, index) {
                benefitsHtml += `
                    <div class="benefit-item" style="animation-delay: ${index * 0.1}s">
                        <div class="benefit-header">
                            <span class="benefit-icon"><i class="bi ${benefit.icon}"></i></span>
                            <span class="benefit-text">${LangManager.t(benefit.text)}</span>
                            <span class="benefit-value">${benefit.value}%</span>
                        </div>
                        <div class="benefit-progress">
                            <div class="progress-bar" data-progress="${benefit.value}"></div>
                        </div>
                    </div>
                `;
            });

            benefitsContainer.html(benefitsHtml);

            // Show panel
            panel.addClass('active');
            $('body').css('overflow', 'hidden');

            // Animate progress bars after a short delay
            setTimeout(function() {
                panel.find('.progress-bar').each(function() {
                    const progress = $(this).data('progress');
                    $(this).css('--progress-width', progress + '%').addClass('animated');
                });
            }, 300);
        },

        closeProductDetail: function() {
            const panel = $('#productDetailPanel');
            panel.removeClass('active');
            $('body').css('overflow', '');

            // Reset progress bars
            panel.find('.progress-bar').removeClass('animated').css('--progress-width', '0%');
        }
    };

    // ========================================
    // TESTIMONIAL SLIDER - Infinite Item-by-Item
    // ========================================
    const TestiSlider = {
        track: null,
        slides: [],
        currentIndex: 0,
        slidesPerView: 4,
        totalSlides: 0,
        autoplayInterval: null,
        autoplayDelay: 3500,
        isPlaying: true,
        touchStartX: 0,
        touchEndX: 0,

        init: function() {
            this.track = document.querySelector('.testi-track');
            if (!this.track) return;

            this.slides = Array.from(this.track.querySelectorAll('.testi-slide'));
            this.totalSlides = this.slides.length;

            if (this.totalSlides === 0) return;

            this.updateSlidesPerView();
            this.createDots();
            this.bindEvents();
            this.cloneSlides();
            this.updateSliderPosition(false);
            this.startAutoplay();
        },

        updateSlidesPerView: function() {
            const width = window.innerWidth;
            if (width < 768) {
                this.slidesPerView = 1;
            } else if (width < 1200) {
                this.slidesPerView = 3;
            } else {
                this.slidesPerView = 4;
            }
        },

        cloneSlides: function() {
            const existingClones = this.track.querySelectorAll('.testi-slide.clone');
            existingClones.forEach(clone => clone.remove());

            // Clone sufficient slides to cover the view and allow seamless wrap
            for (let i = 0; i < this.slidesPerView; i++) {
                const cloneFirst = this.slides[i].cloneNode(true);
                cloneFirst.classList.add('clone');
                this.track.appendChild(cloneFirst);

                const cloneLast = this.slides[this.totalSlides - 1 - i].cloneNode(true);
                cloneLast.classList.add('clone');
                this.track.insertBefore(cloneLast, this.track.firstChild);
            }
        },

        createDots: function() {
            const dotsContainer = document.getElementById('testiDots');
            if (!dotsContainer) return;

            dotsContainer.innerHTML = '';
            const totalDots = Math.ceil(this.totalSlides / this.slidesPerView);

            if (totalDots <= 1) return;

            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement('button');
                dot.classList.add('dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => this.goToSlide(i * this.slidesPerView));
                dotsContainer.appendChild(dot);
            }
        },

        updateDots: function() {
            const dots = document.querySelectorAll('#testiDots .dot');
            if (!dots.length) return;
            const activeDotIndex = Math.floor(this.currentIndex / this.slidesPerView) % dots.length;

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === activeDotIndex);
            });
        },

        bindEvents: function() {
            const self = this;
            const prevBtn = document.getElementById('testiPrev');
            const nextBtn = document.getElementById('testiNext');

            if (prevBtn) prevBtn.addEventListener('click', () => self.prev());
            if (nextBtn) nextBtn.addEventListener('click', () => self.next());

            window.addEventListener('resize', Utils.debounce(function() {
                self.updateSlidesPerView();
                self.cloneSlides();
                self.createDots();
                self.updateSliderPosition(false);
            }, 250));

            const container = document.querySelector('.testi-slider-container');
            if (container) {
                container.addEventListener('mouseenter', () => self.pauseAutoplay());
                container.addEventListener('mouseleave', () => self.startAutoplay());

                container.addEventListener('touchstart', (e) => {
                    self.touchStartX = e.changedTouches[0].screenX;
                    self.pauseAutoplay();
                }, { passive: true });

                container.addEventListener('touchend', (e) => {
                    self.touchEndX = e.changedTouches[0].screenX;
                    self.handleSwipe();
                    self.startAutoplay();
                }, { passive: true });
            }
        },

        handleSwipe: function() {
            const diff = this.touchStartX - this.touchEndX;
            const threshold = 50;
            if (diff > threshold) this.next();
            else if (diff < -threshold) this.prev();
        },

        getSlideWidth: function() {
            return 100 / this.slidesPerView;
        },

        updateSliderPosition: function(animate = true) {
            const slideWidth = this.getSlideWidth();
            const offset = (this.currentIndex + this.slidesPerView) * slideWidth;
            this.track.style.transition = animate ? 'transform 0.6s cubic-bezier(0.23, 1, 0.32, 1)' : 'none';
            this.track.style.transform = `translateX(-${offset}%)`;
        },

        next: function() {
            this.currentIndex++;
            this.updateSliderPosition();
            this.updateDots();

            if (this.currentIndex >= this.totalSlides) {
                setTimeout(() => {
                    this.currentIndex = 0;
                    this.updateSliderPosition(false);
                    this.updateDots();
                }, 600);
            }
        },

        prev: function() {
            this.currentIndex--;
            this.updateSliderPosition();
            this.updateDots();

            if (this.currentIndex < 0) {
                setTimeout(() => {
                    this.currentIndex = this.totalSlides - 1;
                    this.updateSliderPosition(false);
                    this.updateDots();
                }, 600);
            }
        },

        goToSlide: function(index) {
            this.currentIndex = index;
            this.updateSliderPosition();
            this.updateDots();
        },

        startAutoplay: function() {
            if (this.autoplayInterval) clearInterval(this.autoplayInterval);
            this.autoplayInterval = setInterval(() => this.next(), this.autoplayDelay);
        },

        pauseAutoplay: function() {
            clearInterval(this.autoplayInterval);
        }
    };

    // ========================================
    // VIDEO HANDLER
    // ========================================
    const VideoHandler = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('.video-wrapper-modern video').on('play', function() {
                $(this).closest('.video-wrapper-modern').addClass('is-playing');
            }).on('pause ended', function() {
                $(this).closest('.video-wrapper-modern').removeClass('is-playing');
            });

            // Make the entire wrapper clickable to play/pause
            $('.video-wrapper-modern').on('click', function() {
                const video = $(this).find('video')[0];
                if (video) {
                    if (video.paused) {
                        video.play();
                    } else {
                        video.pause();
                    }
                }
            });
        }
    };

    // ========================================
    // WHATSAPP MANAGER
    // ========================================
    const WhatsAppManager = {
        init: function() {
            this.fetchWhatsAppNumber();
        },

        fetchWhatsAppNumber: function() {
            const self = this;
            const affiliate = App.config.affiliateName || 'happy';
            const apiUrl = 'https://api.bisnisonlinebgs.com/api/content/member/getMemberById/' + affiliate;

            $.ajax({
                url: apiUrl,
                method: 'GET',
                success: function(response) {
                    if (response && response.status === 'success' && response.data && response.data.noTelp) {
                        self.updateWhatsAppLink(response.data.noTelp);
                    } else if (response && response.noTelp) {
                        // Backup check if data is flat
                        self.updateWhatsAppLink(response.noTelp);
                    }
                },
                error: function() {
                    console.warn('Failed to fetch WhatsApp number for affiliate:', affiliate);
                }
            });
        },

        updateWhatsAppLink: function(phone) {
            // Clean phone number (remove +, spaces, etc)
            let cleanPhone = phone.replace(/\D/g, '');
            
            // Ensure ID prefix for Indonesian numbers if starts with 0
            if (cleanPhone.startsWith('0')) {
                cleanPhone = '62' + cleanPhone.substring(1);
            }
            
            const waUrl = 'https://wa.me/' + cleanPhone + '?text=Halo! Saya tertarik untuk menjadi reseller di Bisnis Online BGS';
            $('#btn-whatsapp-floating').attr('href', waUrl);
        }
    };

    // ========================================
    // LAZY LOADER
    // ========================================
    const LazyLoader = {
        init: function() {
            console.log('LazyLoader Initialized');
            this.observeImages();
            this.observeContent();
        },

        observeImages: function() {
            const self = this;
            const images = document.querySelectorAll('img[data-src], video[data-src]');
            
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            self.loadImage(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    rootMargin: '50px 0px',
                    threshold: 0.01
                });

                images.forEach(img => {
                    img.classList.add('lazy-load');
                    imageObserver.observe(img);
                });
            } else {
                // Fallback for older browsers
                images.forEach(img => self.loadImage(img));
            }
        },

        loadImage: function(el) {
            const src = el.getAttribute('data-src');
            if (!src) return;

            if (el.tagName.toLowerCase() === 'video') {
                el.poster = src;
                el.classList.add('loaded');
            } else {
                el.src = src;
                el.onload = () => {
                    el.classList.add('loaded');
                    el.removeAttribute('data-src');
                };
            }
        },

        observeContent: function() {
            const contents = document.querySelectorAll('[data-lazy-content]');
            
            if ('IntersectionObserver' in window) {
                const contentObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                });

                contents.forEach(content => contentObserver.observe(content));
            }
        }
    };

    // ========================================
    // INITIALIZATION
    // ========================================
    $(document).ready(function() {
        // Initialize all modules
        LangManager.init();
        ParallaxNav.init();
        UIManager.init();
        FormHandler.init();
        CounterAnimation.init();
        VideoModal.init();
        CharitySlider.init();
        TestiSlider.init();
        ProductShowcase.init();
        ImagePreview.init();
        VideoHandler.init();
        WhatsAppManager.init();
        LazyLoader.init();
        
        // Trigger initial scroll to update nav state
        $(window).trigger('scroll');
        
        console.log('BisnisonlineBGS App Initialized');
        console.log('Current Language:', LangManager.currentLang);
        console.log('Device Type:', Utils.getDeviceType());
    });

    // ========================================
    // EXPOSE TO GLOBAL SCOPE
    // ========================================
    window.BisnisonlineBGS = {
        App: App,
        LangManager: LangManager,
        ParallaxNav: ParallaxNav,
        UIManager: UIManager,
        FormHandler: FormHandler,
        CharitySlider: CharitySlider,
        TestiSlider: TestiSlider,
        ProductShowcase: ProductShowcase,
        ImagePreview: ImagePreview,
        VideoHandler: VideoHandler,
        WhatsAppManager: WhatsAppManager,
        LazyLoader: LazyLoader,
        Utils: Utils,
        t: function(key, replacements) {
            return LangManager.t(key, replacements);
        }
    };

})(jQuery);
