<?php
/**
 * Home Page - Halaman Utama (Single Page Parallax)
 * BisnisonlineBGS - Landing Page dengan 6 Section Utama
 */

// Handle current language if not set from router/cookie
$currentLang = isset($currentLang) ? $currentLang : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'id');
?>

<!-- ========================================
     1. BERANDA (HOME) - Banner Section
======================================== -->
<section id="beranda" 
    class="section-banner section-parallax-bg"
    data-bg-desktop="<?php echo Router::asset('images/banner/banner-landscape.webp'); ?>"
    data-bg-mobile="<?php echo Router::asset('images/banner/banner-potrait.webp'); ?>">
    <div class="container h-100 d-flex align-items-center">
        <div class="banner-content" data-aos="fade-right">
            <h1 class="visually-hidden">BisnisonlineBGS - Bisnis Online Terpercaya & Produk Apple Stemcell</h1>
            <!-- Jika ingin ada teks banner yang kelihatan, bisa ditaruh di sini -->
        </div>
    </div>
</section>

<!-- ========================================
     2. PROFIL (TENTANG KAMI)
======================================== -->

<!-- 2.1 Company Profile -->
<section id="profil" class="section section-company-profile" data-lazy-content>
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge" data-lang-key="profile.badge">Tentang Kami</span>
            <h2 data-lang-key="profile.title">Profil Perusahaan</h2>
            <p class="section-subtitle" data-lang-key="profile.subtitle">Mengenal lebih dekat Biogreen Science dan
                perjalanan kami</p>
        </div>

        <!-- Video Section -->
        <div class="row g-4 mb-5 justify-content-center" data-lazy-content>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <div class="video-card-modern">
                    <div class="video-card-header">
                        <div class="video-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h4 class="video-title" data-lang-key="profile.company_video">COMPANY PROFILE</h4>
                    </div>
                    <div class="video-card-body">
                        <div class="video-wrapper-modern">
                            <video controls preload="none"
                                poster="<?php echo Router::asset('images/video-poster-company-new.webp'); ?>">
                                <source src="<?php echo Router::asset('video/Company-Profile.mp4'); ?>"
                                    type="video/mp4">
                                Browser Anda tidak mendukung video tag.
                            </video>
                            <div class="video-overlay">
                                <span class="play-btn"><i class="bi bi-play-fill"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Office Image Section -->
        <div class="office-section" data-aos="fade-up" data-aos-delay="300">
            <div class="office-header text-center mb-4">
                <span class="office-label"><i class="bi bi-geo-alt-fill me-2"></i><span
                        data-lang-key="profile.office_label">Kantor Pusat Kami</span></span>
            </div>

            <!-- Desktop & Tablet: Single Landscape Image -->
            <div class="office-showcase d-none d-md-block" data-lazy-content>
                <div class="office-image-wrapper">
                    <img data-src="<?php echo Router::asset('images/office-lascape.webp'); ?>"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                        alt="Biogreen Science Office" width="1200" height="600" data-lang-alt="profile.office_alt"
                        class="img-fluid lazy-load">
                    <div class="office-overlay">
                        <div class="office-info">
                            <h5><i class="bi bi-building me-2"></i><span data-lang-key="profile.office_name">Biogreen
                                    Science Indonesia</span></h5>
                            <p><i class="bi bi-pin-map me-2"></i><span data-lang-key="profile.office_location">Jakarta,
                                    Indonesia</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Portrait Images Carousel -->
            <div class="office-carousel-modern d-md-none">
                <div id="officeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <button type="button" data-bs-target="#officeCarousel" data-bs-slide-to="<?php echo $i; ?>"
                                <?php echo $i === 0 ? 'class="active"' : ''; ?>></button>
                        <?php endfor; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="carousel-item <?php echo $i === 1 ? 'active' : ''; ?>">
                                <div class="office-slide">
                                    <img data-src="<?php echo Router::asset('images/office-' . $i . '-potrait.webp'); ?>"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        class="d-block w-100 lazy-load" alt="Office <?php echo $i; ?>" width="400"
                                        height="600" data-lang-alt="profile.office_alt">
                                    <div class="slide-counter"><?php echo $i; ?> / 5</div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#officeCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-nav-btn"><i class="bi bi-chevron-left"></i></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#officeCarousel"
                        data-bs-slide="next">
                        <span class="carousel-nav-btn"><i class="bi bi-chevron-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2.2 Top Management -->
<section class="section section-top-management" data-lazy-content>
    <div class="management-bg-pattern"></div>
    <div class="container position-relative">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge" data-lang-key="management.badge">Leadership</span>
            <h2 data-lang-key="management.title">Top Management</h2>
            <p class="section-subtitle" data-lang-key="management.subtitle">Para pemimpin visioner di balik kesuksesan
                Biogreen Science</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Larry Widjaja -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="management-card-modern">
                    <div class="card-ribbon"><span data-lang-key="management.role_founder">Founder</span></div>
                    <div class="management-photo">
                        <img data-src="<?php echo Router::asset('images/larry.webp'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Larry Widjaja" width="400" height="500" class="lazy-load">
                        <div class="photo-overlay">
                            <div class="social-links">
                            </div>
                        </div>
                    </div>
                    <div class="management-content">
                        <h4>Larry Widjaja</h4>
                        <span class="position-badge" data-lang-key="management.larry_role">Founder of Biogreen
                            Science</span>
                        <div class="management-desc">
                            <p data-lang-key="management.larry_desc">Bapak Larry merupakan seorang entrepreneur muda
                                yang telah mendirikan banyak perusahaan
                                pada usia sebelum 30 tahun. Selain Biogreen Science, KOTA Cinema Mall juga merupakan
                                salah satu dari bisnis beliau dengan aset kelolaan sebesar <strong>1,4 Trilliun
                                    Rupiah</strong>.</p>
                        </div>
                        <div class="management-stats">
                            <div class="stat-item">
                                <span class="stat-value">14+</span>
                                <span class="stat-label" data-lang-key="management.larry_stat1_label">Lokasi
                                    Bisnis</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">1.4T</span>
                                <span class="stat-label" data-lang-key="management.larry_stat2_label">Aset
                                    Kelolaan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ferry Lesmana Admaja -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="management-card-modern">
                    <div class="card-ribbon ribbon-ceo"><span data-lang-key="management.role_ceo">CEO</span></div>
                    <div class="management-photo">
                        <img data-src="<?php echo Router::asset('images/ferry.webp'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Ferry Lesmana Admaja" width="400" height="500" class="lazy-load">
                        <div class="photo-overlay">
                            <div class="social-links">
                            </div>
                        </div>
                    </div>
                    <div class="management-content">
                        <h4>Ferry Lesmana Admaja</h4>
                        <span class="position-badge" data-lang-key="management.ferry_role">CEO of Biogreen
                            Science</span>
                        <div class="management-desc">
                            <p data-lang-key="management.ferry_desc">Dalam 20 tahun kariernya, kegigihan serta kemampuan
                                beradaptasi membuat Bpk. Ferry sempat
                                menduduki kursi Top Management pada beberapa perusahaan terbesar di Indonesia sebelum
                                berlabuh di Biogreen Science.</p>
                        </div>
                        <div class="management-stats">
                            <div class="stat-item">
                                <span class="stat-value">20+</span>
                                <span class="stat-label" data-lang-key="management.ferry_stat1_label">Tahun Karir</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Top</span>
                                <span class="stat-label" data-lang-key="management.ferry_stat2_label">Management</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dr. Richard Sutejo -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="management-card-modern">
                    <div class="card-ribbon ribbon-advisor"><span data-lang-key="management.role_advisor">Advisor</span>
                    </div>
                    <div class="management-photo">
                        <img data-src="<?php echo Router::asset('images/richard.webp'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Richard" width="400" height="500" class="lazy-load">
                        <div class="photo-overlay">
                            <div class="social-links">
                            </div>
                        </div>
                    </div>
                    <div class="management-content">
                        <h4>Dr. Richard Sutejo, Ph.D.</h4>
                        <span class="position-badge" data-lang-key="management.richard_role">Advisor of Biogreen
                            Science</span>
                        <div class="management-desc">
                            <p data-lang-key="management.richard_desc">Memiliki keahlian di banyak bidang Biologi:
                                Biologi Molekul, Virologi, Biodefense, Bio
                                Informatika, Teknologi Pangan, Gizi, Kesehatan dan Anti-Aging dengan pengalaman
                                internasional.</p>
                        </div>
                        <div class="management-stats">
                            <div class="stat-item">
                                <span class="stat-value">7+</span>
                                <span class="stat-label" data-lang-key="management.richard_stat1_label">Negara</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Ph.D.</span>
                                <span class="stat-label"
                                    data-lang-key="management.richard_stat2_label">Qualification</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2.3 Legalitas -->
<section class="section section-legalitas bg-light" data-lazy-content>
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge" data-lang-key="legal.badge">Legalitas</span>
            <h2 data-lang-key="legal.title">Izin & Sertifikasi</h2>
            <p class="section-subtitle" data-lang-key="legal.subtitle">Legalitas lengkap untuk keamanan dan kepercayaan
                Anda</p>
        </div>

        <div class="legal-showcase">
            <div class="row g-4 justify-content-center">
                <!-- SIUP KBLI47999 -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="legal-card-modern">
                        <div class="legal-glow"></div>
                        <div class="legal-icon-wrapper">
                            <div class="legal-icon-bg"></div>
                            <img data-src="<?php echo Router::asset('images/legal/SIUP KBLI47999.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="SIUP KBLI47999" width="60" height="60" class="lazy-load">
                        </div>
                        <div class="legal-content">
                            <h5 data-lang-key="legal.siup_title">SIUP KBLI47999</h5>
                            <p data-lang-key="legal.siup_desc">Surat Izin Usaha Perdagangan</p>
                            <span class="legal-badge"><i class="bi bi-patch-check-fill"></i> <span
                                    data-lang-key="common.verified">Verified</span></span>
                        </div>
                    </div>
                </div>

                <!-- ISO 9001:2015 -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="legal-card-modern">
                        <div class="legal-glow"></div>
                        <div class="legal-icon-wrapper">
                            <div class="legal-icon-bg"></div>
                            <img data-src="<?php echo Router::asset('images/legal/ISO 9001 2015.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="ISO 9001:2015 Certification" width="60" height="60" class="lazy-load">
                        </div>
                        <div class="legal-content">
                            <h5 data-lang-key="legal.iso_title">ISO 9001:2015</h5>
                            <p data-lang-key="legal.iso_desc">Standar Manajemen Mutu Internasional</p>
                            <span class="legal-badge"><i class="bi bi-patch-check-fill"></i> <span
                                    data-lang-key="common.certified">Certified</span></span>
                        </div>
                    </div>
                </div>

                <!-- APLI -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="legal-card-modern">
                        <div class="legal-glow"></div>
                        <div class="legal-icon-wrapper">
                            <div class="legal-icon-bg"></div>
                            <img data-src="<?php echo Router::asset('images/legal/TANDA KEANGGOTAAN ASOSIASI PENJUAL LANGSUNG INDONESIA (APLI).png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="APLI - Asosiasi Penjual Langsung Indonesia" width="60" height="60"
                                class="lazy-load">
                        </div>
                        <div class="legal-content">
                            <h5 data-lang-key="legal.apli_title">Anggota APLI</h5>
                            <p data-lang-key="legal.apli_desc">Asosiasi Penjual Langsung Indonesia</p>
                            <span class="legal-badge"><i class="bi bi-patch-check-fill"></i> <span
                                    data-lang-key="common.member">Member</span></span>
                        </div>
                    </div>
                </div>

                <!-- APSKI -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="legal-card-modern">
                        <div class="legal-glow"></div>
                        <div class="legal-icon-wrapper">
                            <div class="legal-icon-bg"></div>
                            <img data-src="<?php echo Router::asset('images/legal/TANDA KEANGGOTAAN ASOSIASI PENGUSAHA SUPLEMEN KESEHATAN INDONESIA (APSKI).png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="APSKI - Asosiasi Pengusaha Suplemen Kesehatan Indonesia" width="60" height="60"
                                class="lazy-load">
                        </div>
                        <div class="legal-content">
                            <h5 data-lang-key="legal.apski_title">Anggota APSKI</h5>
                            <p data-lang-key="legal.apski_desc">Asosiasi Pengusaha Suplemen Kesehatan Indonesia</p>
                            <span class="legal-badge"><i class="bi bi-patch-check-fill"></i> <span
                                    data-lang-key="common.member">Member</span></span>
                        </div>
                    </div>
                </div>

                <!-- PSE -->
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="legal-card-modern">
                        <div class="legal-glow"></div>
                        <div class="legal-icon-wrapper">
                            <div class="legal-icon-bg"></div>
                            <img data-src="<?php echo Router::asset('images/legal/TANDA TERDAFTAR PENYELENGARA SISTEM ELEKTRONIK.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="PSE - Penyelenggara Sistem Elektronik" width="60" height="60" class="lazy-load">
                        </div>
                        <div class="legal-content">
                            <h5 data-lang-key="legal.pse_title">Terdaftar PSE</h5>
                            <p data-lang-key="legal.pse_desc">Penyelenggara Sistem Elektronik</p>
                            <span class="legal-badge"><i class="bi bi-patch-check-fill"></i> <span
                                    data-lang-key="common.registered">Registered</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2.4 Penghargaan -->
<section class="section section-penghargaan" data-lazy-content>
    <div class="awards-bg-decoration"></div>
    <div class="container position-relative">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge badge-gold"><i class="bi bi-trophy-fill me-1"></i> <span
                    data-lang-key="awards.badge">Prestasi</span></span>
            <h2 data-lang-key="awards.title">Penghargaan</h2>
            <p class="section-subtitle" data-lang-key="awards.subtitle">Pengakuan atas dedikasi dan kualitas terbaik
                kami</p>
        </div>

        <!-- Desktop & Tablet: Award Cards -->
        <div class="awards-showcase d-none d-md-block" data-aos="fade-up">
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="award-card-modern">
                        <div class="award-trophy">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <div class="award-image-frame">
                            <img data-src="<?php echo Router::asset('images/penghargaan/APLI Awards 2020 Potrait.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="APLI Awards 2020 Achievement" width="300" height="450" class="lazy-load">
                            <div class="award-year-badge">2020</div>
                        </div>
                        <div class="award-details">
                            <h5 data-lang-key="awards.award1_title">APLI Awards 2020</h5>
                            <p class="award-category" data-lang-key="awards.award1_cat">Entrepreneurship Of The Year</p>
                            <div class="award-divider"></div>
                            <span class="award-org"><i class="bi bi-award me-1"></i>APLI Indonesia</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="award-card-modern featured">
                        <div class="award-trophy">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="award-image-frame">
                            <img data-src="<?php echo Router::asset('images/penghargaan/Best Nourshing Health Supplement Potrait.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Best Nourishing Health Supplement" width="300" height="450" class="lazy-load">
                            <div class="award-year-badge">2019</div>
                        </div>
                        <div class="award-details">
                            <h5 data-lang-key="awards.award2_title">Best Nourishing Health Supplement</h5>
                            <p class="award-category" data-lang-key="awards.award2_cat">Asia Halal Brand Award</p>
                            <div class="award-divider"></div>
                            <span class="award-org"><i class="bi bi-globe me-1"></i>Asia Halal Brand</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="award-card-modern">
                        <div class="award-trophy">
                            <i class="bi bi-gem"></i>
                        </div>
                        <div class="award-image-frame">
                            <img data-src="<?php echo Router::asset('images/penghargaan/The Best Quality Product & Customer Satisfaction Of The Year 2018.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="The Best Quality Product & Customer Satisfaction Of The Year 2018" width="300"
                                height="450" class="lazy-load">
                            <div class="award-year-badge">2018</div>
                        </div>
                        <div class="award-details">
                            <h5 data-lang-key="awards.award3_title">Best Quality Product & Customer Satisfaction</h5>
                            <p class="award-category" data-lang-key="awards.award3_cat">Trusted Of Quality Award</p>
                            <div class="award-divider"></div>
                            <span class="award-org"><i class="bi bi-shield-check me-1"></i>Best Of Indonesia</span>
                        </div>
                    </div>
                </div>

                <!-- 2017 Award -->
                <div class="col-lg-4 offset-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="award-card-modern">
                        <div class="award-trophy">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div class="award-image-frame">
                            <img data-src="<?php echo Router::asset('images/penghargaan/The Best Choise Product Exellent & Custommer Satisfaction of The Year 2017.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="The Best Choice Product Excellent & Customer Satisfaction of The Year 2017" width="300"
                                height="450" class="lazy-load">
                            <div class="award-year-badge">2017</div>
                        </div>
                        <div class="award-details">
                            <h5 data-lang-key="awards.award4_title">Best Choice Product & Customer Satisfaction</h5>
                            <p class="award-category" data-lang-key="awards.award4_cat">Trusted Selection Award</p>
                            <div class="award-divider"></div>
                            <span class="award-org"><i class="bi bi-award me-1"></i>Indonesia Award Center</span>
                        </div>
                    </div>
                </div>

                <!-- 2016 Award -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="award-card-modern">
                        <div class="award-trophy">
                            <i class="bi bi-medal-fill"></i>
                        </div>
                        <div class="award-image-frame">
                            <img data-src="<?php echo Router::asset('images/penghargaan/Best Quality Product & Service Exellent of The Year 2016.png'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Best Quality Product & Service Excellent of The Year 2016" width="300"
                                height="450" class="lazy-load">
                            <div class="award-year-badge">2016</div>
                        </div>
                        <div class="award-details">
                            <h5 data-lang-key="awards.award5_title">Best Quality Product & Service Excellent</h5>
                            <p class="award-category" data-lang-key="awards.award5_cat">Service Excellence Award</p>
                            <div class="award-divider"></div>
                            <span class="award-org"><i class="bi bi-hand-thumbs-up me-1"></i>Indonesia Achievement Center</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile: Portrait Images Carousel -->
        <div class="awards-carousel-modern d-md-none" data-aos="fade-up">
            <div id="awardsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="award-slide">
                            <div class="award-slide-image">
                                <img src="<?php echo Router::asset('images/penghargaan/APLI Awards 2020 Potrait.png'); ?>"
                                    alt="APLI Awards 2020" width="280" height="400">
                            </div>
                            <div class="award-slide-info">
                                <div class="award-slide-year">2020</div>
                                <h5 data-lang-key="awards.award1_title">APLI Awards 2020</h5>
                                <p data-lang-key="awards.award1_cat">Entrepreneurship Of The Year</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="award-slide">
                            <div class="award-slide-image">
                                <img src="<?php echo Router::asset('images/penghargaan/Best Nourshing Health Supplement Potrait.png'); ?>"
                                    alt="Asia Halal Brand 2019" width="280" height="400">
                            </div>
                            <div class="award-slide-info">
                                <div class="award-slide-year">2019</div>
                                <h5 data-lang-key="awards.award2_title">Best Nourishing Health Supplement</h5>
                                <p data-lang-key="awards.award2_cat">Asia Halal Brand Award</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="award-slide">
                            <div class="award-slide-image">
                                <img src="<?php echo Router::asset('images/penghargaan/The Best Quality Product & Customer Satisfaction Of The Year 2018.png'); ?>"
                                    alt="Best Of Indonesia 2018" width="280" height="400">
                            </div>
                            <div class="award-slide-info">
                                <div class="award-slide-year">2018</div>
                                <h5 data-lang-key="awards.award3_title">Best Quality Product</h5>
                                <p data-lang-key="awards.award3_cat">Trusted Of Quality Award</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="award-slide">
                            <div class="award-slide-image">
                                <img src="<?php echo Router::asset('images/penghargaan/The Best Choise Product Exellent & Custommer Satisfaction of The Year 2017.png'); ?>"
                                    alt="Best Choice 2017" width="280" height="400">
                            </div>
                            <div class="award-slide-info">
                                <div class="award-slide-year">2017</div>
                                <h5 data-lang-key="awards.award4_title">Best Choice Product</h5>
                                <p data-lang-key="awards.award4_cat">The Best Choice Product Excellent & Customer Satisfaction of The Year</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="award-slide">
                            <div class="award-slide-image">
                                <img src="<?php echo Router::asset('images/penghargaan/Best Quality Product & Service Exellent of The Year 2016.png'); ?>"
                                    alt="Service Excellence 2016" width="280" height="400">
                            </div>
                            <div class="award-slide-info">
                                <div class="award-slide-year">2016</div>
                                <h5 data-lang-key="awards.award5_title">Best Quality Product & Service Excellent</h5>
                                <p data-lang-key="awards.award5_cat">Best Quality Product & Service Excellent of The Year</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-nav-wrapper">
                    <button class="carousel-nav-btn" type="button" data-bs-target="#awardsCarousel"
                        data-bs-slide="prev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#awardsCarousel" data-bs-slide-to="0"
                            class="active"></button>
                        <button type="button" data-bs-target="#awardsCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#awardsCarousel" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#awardsCarousel" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#awardsCarousel" data-bs-slide-to="4"></button>
                    </div>
                    <button class="carousel-nav-btn" type="button" data-bs-target="#awardsCarousel"
                        data-bs-slide="next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2.5 Kegiatan Amal -->
<section id="amal" class="section section-amal bg-light" data-lazy-content>
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge badge-heart"><i class="bi bi-heart-fill me-1"></i> <span
                    data-lang-key="charity.badge">CSR</span></span>
            <h2 data-lang-key="charity.title">Kegiatan Amal</h2>
            <p class="section-subtitle" data-lang-key="charity.subtitle">Berbagi kebaikan untuk masyarakat Indonesia</p>
        </div>

        <!-- Stats Row -->
        <div class="charity-stats-row" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-3 justify-content-center mb-5">
                <div class="col-6 col-md-3">
                    <div class="charity-stat-card">
                        <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stat-number" data-counter="10000">10.000+</div>
                        <div class="stat-text" data-lang-key="charity.stat1_label">Penerima Manfaat</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="charity-stat-card">
                        <div class="stat-icon"><i class="bi bi-calendar-heart"></i></div>
                        <div class="stat-number">50+</div>
                        <div class="stat-text" data-lang-key="charity.stat2_label">Kegiatan/Tahun</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="charity-stat-card">
                        <div class="stat-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="stat-number">20+</div>
                        <div class="stat-text" data-lang-key="charity.stat3_label">Kota di Indonesia</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="charity-stat-card">
                        <div class="stat-icon"><i class="bi bi-hand-thumbs-up-fill"></i></div>
                        <div class="stat-number">100%</div>
                        <div class="stat-text" data-lang-key="charity.stat4_label">Dedikasi</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charity Gallery - Responsive Multi-Item Carousel -->
        <div class="charity-gallery-modern" data-aos="fade-up" data-aos-delay="200">
            <div class="charity-slider-wrapper">
                <div class="charity-slider" id="charitySlider">
                    <div class="charity-track">
                        <?php for ($i = 1; $i <= 5; $i++):
                            $thumbName = 'amal' . $i . '.webp';
                            $thumbPath = 'assets/images/amal/thumbnail/' . $thumbName;
                            $finalThumb = file_exists(BASE_PATH . '/' . $thumbPath) ? Router::asset('images/amal/thumbnail/' . $thumbName) : Router::asset('images/amal/' . $thumbName);
                            ?>
                            <div class="charity-slide">
                                <div class="gallery-card">
                                    <img data-src="<?php echo $finalThumb; ?>"
                                        data-full-src="<?php echo Router::asset('images/amal/' . $thumbName); ?>"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        alt="Kegiatan Amal <?php echo $i; ?>" width="400" height="300"
                                        data-lang-alt="charity.gallery_alt" class="lazy-load gallery-preview-trigger">
                                    <div class="gallery-overlay">
                                        <span class="gallery-zoom"><i class="bi bi-zoom-in"></i></span>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="charity-slider-controls">
                    <button class="slider-btn slider-prev" id="charityPrev">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <div class="slider-dots" id="charityDots"></div>
                    <button class="slider-btn slider-next" id="charityNext">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     3. PRODUK (PRODUCTS)
======================================== -->

<!-- 3.1 Produk Overview -->
<section id="produk" class="section section-produk" data-lazy-content>
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span class="section-badge"><i class="bi bi-box-seam me-1"></i> <span data-lang-key="products.badge">Produk
                    Kami</span></span>
            <h2 data-lang-key="products.title">Katalog Produk</h2>
            <p class="section-subtitle" data-lang-key="products.subtitle">Produk berkualitas tinggi untuk kesehatan dan
                kecantikan Anda</p>
        </div>

        <!-- Category Tabs -->
        <div class="product-categories" data-aos="fade-up" data-aos-delay="100">
            <div class="category-tabs">
                <button class="category-tab active" data-category="health">
                    <i class="bi bi-heart-pulse"></i>
                    <span data-lang-key="products.cat_health">Health & Wellness</span>
                </button>
                <button class="category-tab" data-category="beauty">
                    <i class="bi bi-stars"></i>
                    <span data-lang-key="products.cat_beauty">Body Weight Management</span>
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-showcase" data-aos="fade-up" data-aos-delay="200">
            <!-- Health & Wellness Category -->
            <div class="product-category-content active" data-category="health">
                <div class="row g-2 g-md-3 g-lg-4">
                    <!-- Product 1: Bio NAD+ Boost -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="bionadboost">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/bionadboost.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio NAD+ Boost" width="300" height="300" class="lazy-load">
                                <div class="product-badge" data-lang-key="products.best_seller">Best Seller</div>
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> <span
                                            data-lang-key="products.view_detail">Lihat Detail</span></span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio NAD+ Boost</h5>
                                <p class="product-tagline">DNA Repair & Anti-Aging</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2: AppleSC Plus -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="applescplus">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/applescplus.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="AppleSC Plus" width="300" height="300" class="lazy-load">
                                <div class="product-badge badge-new" data-lang-key="products.new">New</div>
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> <span
                                            data-lang-key="products.view_detail">Lihat Detail</span></span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>AppleSC Plus</h5>
                                <p class="product-tagline">Advanced Anti-Aging</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3: AppleSC -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="applesc">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/applesc.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="AppleSC" width="300" height="300" class="lazy-load">
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> Lihat Detail</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>AppleSC</h5>
                                <p class="product-tagline">Stem Cell Technology</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4: Bio SC Mild -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="bioscmild">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/bioscmild.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio SC Mild" width="300" height="300" class="lazy-load">
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> Lihat Detail</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio SC Mild</h5>
                                <p class="product-tagline">Performance & Vitality</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5: Bio Mild Capsule -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="biomildcapsule">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/biomildcapsule.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio Mild Capsule" width="300" height="300" class="lazy-load">
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> Lihat Detail</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio Mild Capsule</h5>
                                <p class="product-tagline">Stress Relief & Focus</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6: Bio SC Gold -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="bioscgold">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/biogold.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio SC Gold" width="300" height="300" class="lazy-load">
                                <div class="product-badge" data-lang-key="products.premium">Premium</div>
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> <span
                                            data-lang-key="products.view_detail">Lihat Detail</span></span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio SC Gold</h5>
                                <p class="product-tagline">Men's Stamina</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product 7: Bio Inflavia -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="bioinflavia">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/bioinflavia.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio Inflavia" width="300" height="300" class="lazy-load">
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> Lihat Detail</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio Inflavia</h5>
                                <p class="product-tagline">Herbal Anti-Inflamasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body Weight Management Category -->
            <div class="product-category-content" data-category="beauty">
                <div class="row g-2 g-md-3 g-lg-4">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card" data-product="biorawgenic">
                            <div class="product-image">
                                <img data-src="<?php echo Router::asset('images/produk/biorawgenic.webp'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Bio Rawgenic" width="300" height="300" class="lazy-load">
                                <div class="product-badge" data-lang-key="products.best_seller">Best Seller</div>
                                <div class="product-overlay">
                                    <span class="view-detail"><i class="bi bi-chevron-down"></i> <span
                                            data-lang-key="products.view_detail">Lihat Detail</span></span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h5>Bio Rawgenic</h5>
                                <p class="product-tagline">Weight Management</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Product Detail Expand Panel -->
        <div class="product-detail-panel" id="productDetailPanel">
            <div class="detail-panel-inner">
                <button class="panel-close" id="closePanelBtn">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="detail-content">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-5">
                            <div class="detail-image">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="" id="detailImage">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="detail-info">
                                <span class="detail-category"><i class="bi bi-tag"></i> Health & Wellness</span>
                                <h3 class="detail-title" id="detailTitle">Bio NAD+ Boost</h3>
                                <p class="detail-desc" id="detailDesc">
                                    Suplemen kesehatan untuk perbaikan DNA melalui peningkatan volume NAD+ dan energi
                                    sel untuk aktivasi proses peremajaan tubuh dengan mencegah kerusakan dan penuaan
                                    DNA.
                                </p>

                                <!-- Benefits with Progress Bars -->
                                <div class="detail-benefits">
                                    <h5><i class="bi bi-check-circle-fill me-2"></i><span
                                            data-lang-key="products.main_benefits">Manfaat Utama</span></h5>

                                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="100">
                                        <div class="benefit-header">
                                            <span class="benefit-icon"><i class="bi bi-activity"></i></span>
                                            <span class="benefit-text">Memperbaiki DNA</span>
                                            <span class="benefit-value">95%</span>
                                        </div>
                                        <div class="benefit-progress">
                                            <div class="progress-bar" data-progress="95"></div>
                                        </div>
                                    </div>

                                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                                        <div class="benefit-header">
                                            <span class="benefit-icon"><i class="bi bi-arrow-repeat"></i></span>
                                            <span class="benefit-text">Pembalikan Usia Organ Tubuh</span>
                                            <span class="benefit-value">90%</span>
                                        </div>
                                        <div class="benefit-progress">
                                            <div class="progress-bar" data-progress="90"></div>
                                        </div>
                                    </div>

                                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="300">
                                        <div class="benefit-header">
                                            <span class="benefit-icon"><i class="bi bi-lightning-charge"></i></span>
                                            <span class="benefit-text">Meningkatkan Energi Selular</span>
                                            <span class="benefit-value">88%</span>
                                        </div>
                                        <div class="benefit-progress">
                                            <div class="progress-bar" data-progress="88"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3.2 Apple Stemcell Feature -->
<section class="section section-apple-stemcell" data-lazy-content>
    <div class="applesc-bg">
        <picture>
            <source media="(max-width: 767px)" srcset="<?php echo Router::asset('images/background/portait.webp'); ?>">
            <img data-src="<?php echo Router::asset('images/background/landscape.webp'); ?>"
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                alt="Background Apple SC" width="1920" height="1080" class="lazy-load">
        </picture>
    </div>

    <div class="container position-relative">
        <!-- Section Title -->
        <div class="applesc-header text-center" data-aos="fade-up">
            <span class="applesc-badge" data-lang-key="applesc.badge"><i class="bi bi-flower1 me-2"></i>Teknologi Stem
                Cell</span>
            <h2 class="applesc-title" data-lang-key="applesc.title">Apple Stemcell</h2>
            <p class="applesc-subtitle" data-lang-key="applesc.subtitle">Dari Apel Langka Swiss untuk Regenerasi Sel</p>
        </div>

        <!-- Banner -->
        <div class="applesc-banner" data-aos="fade-up" data-aos-delay="100">
            <div class="applesc-banner-frame">
                <picture>
                    <source media="(max-width: 767px)"
                        srcset="<?php echo Router::asset('images/applesc/applesc-1-portrait.webp'); ?>">
                    <img data-src="<?php echo Router::asset('images/applesc/applesc-1-lanscape.webp'); ?>"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                        alt="Apple Stemcell Banner" width="1200" height="600" class="lazy-load">
                </picture>
            </div>
        </div>

        <!-- Single Card: Uttwiler Spatläuber + PhytoCellTec & Clinical Test -->
        <div class="applesc-single-card" data-aos="fade-up" data-aos-delay="150">
            <div class="row g-4 g-lg-5 align-items-stretch">
                <!-- Block 1: Uttwiler Spatläuber -->
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="applesc-card-text">
                        <div class="applesc-card-icon"><i class="bi bi-globe2"></i></div>
                        <h3 class="applesc-card-title" data-lang-key="applesc.uttwiler_title">Uttwiler Spatläuber</h3>
                        <p class="applesc-paragraph" data-lang-key="applesc.uttwiler_desc">Diciptakan dari Uttwiler
                            Spatläuber, varian apel khas Swiss yang
                            punya daya hidup tinggi dan bisa tetap segar selama berbulan-bulan setelah dipetik dari
                            pohonnya. Khasiat luar biasa Uttwiler Spatläuber membuat apel ini spesial, menjadikannya
                            sebagai spesies langka dan dilindungi, bahkan Swiss sampai membuat perangko khusus bergambar
                            Uttwiler Spatläuber.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="applesc-image-wrap">
                        <img data-src="<?php echo Router::asset('images/applesc/applesc.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Apple Stemcell Uttwiler Spatläuber" width="600" height="400" class="lazy-load">
                    </div>
                </div>
                <!-- Block 2: PhytoCellTec & Clinical Test -->
                <div class="col-lg-6">
                    <div class="applesc-image-wrap applesc-image-clinical">
                        <img data-src="<?php echo Router::asset('images/applesc/clinical-test.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Clinical Test PhytoCellTec" width="600" height="400" class="lazy-load">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="applesc-card-text">
                        <div class="applesc-card-icon"><i class="bi bi-mortarboard"></i></div>
                        <h3 class="applesc-card-title" data-lang-key="applesc.clinical_title">PhytoCellTec™ & Uji Klinis
                        </h3>
                        <p class="applesc-paragraph" data-lang-key="applesc.clinical_desc">Apple Stemcell Uttwiler
                            Spatläuber hanya dikembangkan oleh Mibelle
                            Biochemistry karena memiliki spesialisasi terbaik dalam mengolah stem cell menggunakan
                            teknologi inovatif yang dinamakan Phytocelltec™. Uji klinis terkait manfaat PhytoCellTec™
                            Malus Domestica dilakukan oleh para peneliti yang sudah berpengalaman dalam hal pengembangan
                            stem cell.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patent: Paten Fungsi Perpaduan Ekslusif Bahan Aktif Applesc -->
        <div class="applesc-patent" data-aos="fade-up" data-lazy-content>
            <div class="patent-bg">
                <picture>
                    <source media="(max-width: 767px)"
                        srcset="<?php echo Router::asset('images/background/portait.webp'); ?>">
                    <img data-src="<?php echo Router::asset('images/background/landscape.webp'); ?>"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                        alt="Patent Background" width="1920" height="1080" class="lazy-load">
                </picture>
                <div class="patent-overlay"></div>
            </div>

            <div class="patent-content">
                <div class="patent-header text-center" data-aos="fade-up">
                    <div class="patent-tag" data-lang-key="applesc.patent_tag">Scientific Authentication</div>
                    <h3 class="patent-title" data-lang-key="applesc.patent_title">PATEN FUNGSI PERPADUAN EKSLUSIF</h3>
                    <h3 class="patent-title" style="margin-top: -15px;"><span
                            data-lang-key="applesc.patent_subtitle">BAHAN AKTIF APPLESC</span></h3>
                    <div class="patent-divider"></div>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Row 1: Swiss Korea + Eropeus -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="patent-card">
                            <div class="patent-card-body">
                                <div class="patent-images-grid">
                                    <div class="patent-img-item">
                                        <img data-src="<?php echo Router::asset('images/patent/clinical-4-swisskorea.png'); ?>"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            alt="Clinical Swiss Korea" width="250" height="150" class="lazy-load">
                                    </div>
                                    <div class="patent-img-item">
                                        <img data-src="<?php echo Router::asset('images/patent/clinical-4-eropeus.png'); ?>"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            alt="Clinical Eropeus" width="250" height="150" class="lazy-load">
                                    </div>
                                </div>
                                <ul class="patent-list">
                                    <li><i class="bi bi-shield-check"></i> <span
                                            data-lang-key="applesc.patent_list1">Membantu Meregenerasi Sel</span></li>
                                    <li><i class="bi bi-shield-check"></i> <span
                                            data-lang-key="applesc.patent_list2">Melindungi Stem Cells dari
                                            Kerusakan</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Eropeus 2 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="patent-card">
                            <div class="patent-card-body">
                                <div class="patent-images-grid">
                                    <div class="patent-img-item">
                                        <img data-src="<?php echo Router::asset('images/patent/clinical-4-eropeus2.png'); ?>"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            alt="Clinical Eropeus 2" width="250" height="150" class="lazy-load">
                                    </div>
                                </div>
                                <ul class="patent-list">
                                    <li><i class="bi bi-hourglass-split"></i> <span
                                            data-lang-key="applesc.patent_list3">Anti-Aging</span></li>
                                    <li><i class="bi bi-sun"></i> <span data-lang-key="applesc.patent_list4">Anti
                                            radiasi yang disebabkan oleh UV dan polusi udara</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Swiss Korea + WW (full width) -->
                    <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="patent-card patent-card-wide">
                            <div class="patent-card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="patent-images-grid">
                                            <div class="patent-img-item">
                                                <img data-src="<?php echo Router::asset('images/patent/clinical-4-swisskorea.png'); ?>"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                    alt="Clinical Swiss Korea" width="250" height="150"
                                                    class="lazy-load">
                                            </div>
                                            <div class="patent-img-item">
                                                <img data-src="<?php echo Router::asset('images/patent/clinical-4-ww.png'); ?>"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                    alt="Clinical WW" width="250" height="150" class="lazy-load">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="patent-list grid-list">
                                            <li><i class="bi bi-graph-up-arrow"></i> <span
                                                    data-lang-key="applesc.patent_list5">Meningkatkan Kadar Anti Oksidan
                                                    di dalam tubuh</span></li>
                                            <li><i class="bi bi-virus"></i> <span
                                                    data-lang-key="applesc.patent_list6">Mengandung Komposisi Anti
                                                    Oksidan untuk Menangkal Radikal Bebas</span></li>
                                            <li><i class="bi bi-droplet-half"></i> <span
                                                    data-lang-key="applesc.patent_list7">Triple Peptide yang Mengandung
                                                    3 Amino Acids untuk Detoksifikasi</span></li>
                                            <li><i class="bi bi-brightness-high"></i> <span
                                                    data-lang-key="applesc.patent_list8">Agen untuk Melindungi Kulit
                                                    dari Pigmentasi dan Mencerahkan Kulit</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Celebrity: Pilihan Selebriti Dunia -->
        <div class="applesc-celebrity" data-aos="fade-up" data-lazy-content>
            <div class="celebrity-bg section-parallax-bg"
                data-bg-desktop="<?php echo Router::asset('images/background/landscape.webp'); ?>"
                data-bg-mobile="<?php echo Router::asset('images/background/portait.webp'); ?>">
                <div class="celebrity-overlay"></div>
            </div>
            <div class="celebrity-content">
                <div class="row g-4 align-items-center" data-lazy-content>
                    <div class="col-lg-6">
                        <div class="celebrity-text-box" data-aos="fade-right">
                            <div class="celebrity-tag" data-lang-key="applesc.celebrity_tag"><i
                                    class="bi bi-star-fill me-2"></i>Global Trust</div>
                            <h3 class="celebrity-title" data-lang-key="applesc.celebrity_title">PILIHAN SELEBRITI &
                                PESOHOR DUNIA</h3>
                            <div class="celebrity-divider"></div>
                            <p class="celebrity-desc" data-lang-key="applesc.celebrity_desc">
                                Stem cell dari apel <strong>Uttwiler Spatläuber</strong> telah digunakan oleh berbagai
                                selebriti dan pesohor dunia seperti <strong>Jennifer Lopez, Victoria Beckham, Hellen
                                    Miren, dan Michelle Obama</strong>, untuk menjaga kecantikan mereka secara alami dan
                                efektif.
                            </p>
                            <div class="celebrity-names">
                                <span class="name-badge">Jennifer Lopez</span>
                                <span class="name-badge">Victoria Beckham</span>
                                <span class="name-badge">Hellen Miren</span>
                                <span class="name-badge">Michelle Obama</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="celebrity-image-wrap" data-aos="fade-left">
                            <img data-src="<?php echo Router::asset('images/celebrity/clinical-celebrity-1.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Celebrities using Apple Stemcell" width="600" height="400" class="lazy-load">
                            <div class="image-glow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3.3 Keunggulan Produk -->
<section id="keunggulan" class="section section-keunggulan-produk" data-lazy-content>
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <span class="section-badge" data-lang-key="keunggulan.badge">Why Choose Us</span>
            <h2 data-lang-key="keunggulan.title">Keunggulan Produk & Layanan</h2>
            <p class="section-subtitle" data-lang-key="keunggulan.subtitle">Dukungan penuh untuk kesuksesan bisnis
                online Anda</p>
        </div>

        <div class="advantage-rows">
            <!-- Advantage 1: Produk -->
            <div class="advantage-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="advantage-content pe-lg-5">
                            <div class="advantage-number">01</div>
                            <h3 class="advantage-title" data-lang-key="keunggulan.item1_title">PRODUK</h3>
                            <p class="advantage-desc" data-lang-key="keunggulan.item1_desc">Kami menyediakan produk yang
                                bisa kamu jual. Mulai dari
                                produk-produk kecantikan, kesehatan, hingga weight management dengan kualitas premium
                                yang sudah teruji klinis.</p>
                            <ul class="advantage-features">
                                <li><i class="bi bi-check2-circle"></i> <span
                                        data-lang-key="keunggulan.item1_feat1">Kualitas Produk Premium</span></li>
                                <li><i class="bi bi-check2-circle"></i> <span
                                        data-lang-key="keunggulan.item1_feat2">Berbagai Kategori Pilihan</span></li>
                                <li><i class="bi bi-check2-circle"></i> <span
                                        data-lang-key="keunggulan.item1_feat3">Stok Selalu Tersedia</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="advantage-image">
                            <img data-src="<?php echo Router::asset('images/keunggulan-1.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Produk Keunggulan" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advantage 2: Promosi -->
            <div class="advantage-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="advantage-image">
                            <img data-src="<?php echo Router::asset('images/keunggulan-2.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Promosi Keunggulan" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="advantage-content ps-lg-5">
                            <div class="advantage-number">02</div>
                            <h3 class="advantage-title" data-lang-key="keunggulan.item2_title">PROMOSI</h3>
                            <p class="advantage-desc" data-lang-key="keunggulan.item2_desc">Kami menyediakan beberapa
                                konten yang bisa digunakan untuk
                                mempromosikan Produk kamu di social media. Reseller Bisnis Online BGS juga akan
                                mendapatkan training digital marketing secara gratis untuk meningkatkan penjualan.</p>
                            <ul class="advantage-features">
                                <li><i class="bi bi-megaphone"></i> <span data-lang-key="keunggulan.item2_feat1">Konten
                                        Siap Pakai</span></li>
                                <li><i class="bi bi-laptop"></i> <span data-lang-key="keunggulan.item2_feat2">Training
                                        Digital Marketing</span></li>
                                <li><i class="bi bi-people"></i> <span data-lang-key="keunggulan.item2_feat3">Support
                                        Community</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advantage 3: Pengiriman -->
            <div class="advantage-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="advantage-content pe-lg-5">
                            <div class="advantage-number">03</div>
                            <h3 class="advantage-title" data-lang-key="keunggulan.item3_title">PENGIRIMAN</h3>
                            <p class="advantage-desc" data-lang-key="keunggulan.item3_desc">Kamu cukup mengirimkan data
                                pembeli kepada kami. Selebihnya kami
                                yang akan mengurus sampai pesanan tiba di tangan pembeli. Tentunya barang akan dikirim
                                atas nama kamu (Dropship System).</p>
                            <ul class="advantage-features">
                                <li><i class="bi bi-truck"></i> <span data-lang-key="keunggulan.item3_feat1">Operasional
                                        Kami Urus</span></li>
                                <li><i class="bi bi-person-badge"></i> <span
                                        data-lang-key="keunggulan.item3_feat2">Pengiriman Atas Nama Kamu</span></li>
                                <li><i class="bi bi-geo-alt"></i> <span
                                        data-lang-key="keunggulan.item3_feat3">Pengiriman Seluruh Indonesia</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="advantage-image">
                            <img data-src="<?php echo Router::asset('images/keunggulan-3.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Pengiriman Keunggulan" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     4. BISNIS (BUSINESS PLAN)
======================================== -->

<!-- 4.1 Marketing Plan -->
<section id="bisnis" class="section section-marketing-plan" data-lazy-content>
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge" data-lang-key="business.badge">Peluang Bisnis</span>
            <h2 class="section-title" data-lang-key="business.title">BAGAIMANA MENGHASILKAN UANG MELALUI BISNIS ONLINE
                BGS?</h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="zoom-in">
                <div class="video-card-modern">
                    <div class="video-card-body">
                        <div class="video-wrapper-modern">
                            <video controls preload="none"
                                poster="<?php echo Router::asset('images/video-poster-marplan-new.webp'); ?>">
                                <source src="<?php echo Router::asset('video/marketing-plan-2023-mob.mp4'); ?>"
                                    type="video/mp4">
                                Browser Anda tidak mendukung video tag.
                            </video>
                            <div class="video-overlay">
                                <span class="play-btn"><i class="bi bi-play-fill"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4.2 Keuntungan Bergabung -->
<section id="keuntungan" class="section section-keuntungan" data-lazy-content>
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <span class="section-badge" data-lang-key="benefits.badge">Benefits</span>
            <h2 data-lang-key="benefits.title">Keuntungan Bergabung Bersama Kami</h2>
            <p class="section-subtitle" data-lang-key="benefits.subtitle">Berbagai kemudahan dan potensi besar di depan
                mata Anda</p>
        </div>

        <div class="benefit-rows">
            <!-- Benefit 1: Simpel -->
            <div class="benefit-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="benefit-content pe-lg-5">
                            <div class="benefit-tag" data-lang-key="benefits.item1_tag">Low Risk</div>
                            <h3 class="benefit-title" data-lang-key="benefits.item1_title">SIMPEL</h3>
                            <p class="benefit-desc" data-lang-key="benefits.item1_desc">Kamu tidak perlu memiliki stok
                                barang dan menyewa tempat untuk berjualan. Semua operasional dan ketersediaan barang
                                kami yang kelola sepenuhnya.</p>
                            <div class="benefit-points">
                                <div class="benefit-point">
                                    <i class="bi bi-house-door"></i>
                                    <span data-lang-key="benefits.item1_feat1">Tanpa Sewa Gudang</span>
                                </div>
                                <div class="benefit-point">
                                    <i class="bi bi-box-seam"></i>
                                    <span data-lang-key="benefits.item1_feat2">Tanpa Stok Barang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="benefit-image">
                            <img data-src="<?php echo Router::asset('images/keuntungan-1.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Keuntungan Simpel" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefit 2: Potensi Penghasilan -->
            <div class="benefit-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="benefit-image">
                            <img data-src="<?php echo Router::asset('images/keuntungan-3.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Potensi Penghasilan" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefit-content ps-lg-5">
                            <div class="benefit-tag" data-lang-key="benefits.item2_tag">Big Opportunity</div>
                            <h3 class="benefit-title" data-lang-key="benefits.item2_title">POTENSI PENGHASILAN TAK
                                TERBATAS</h3>
                            <p class="benefit-desc" data-lang-key="benefits.item2_desc">Dengan program referral, kamu
                                berkesempatan untuk punya penghasilan puluhan juta hingga tak terbatas setiap bulan dan
                                jalan-jalan gratis keluar negeri setiap tahun bagi reseller yang berprestasi.</p>
                            <div class="benefit-points">
                                <div class="benefit-point">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <span data-lang-key="benefits.item2_feat1">Passive Income</span>
                                </div>
                                <div class="benefit-point">
                                    <i class="bi bi-airplane"></i>
                                    <span data-lang-key="benefits.item2_feat2">Reward Trip Gratis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefit 3: Inovasi Produk -->
            <div class="benefit-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="benefit-content pe-lg-5">
                            <div class="benefit-tag" data-lang-key="benefits.item3_tag">Continuous Growth</div>
                            <h3 class="benefit-title" data-lang-key="benefits.item3_title">INOVASI PRODUK</h3>
                            <p class="benefit-desc" data-lang-key="benefits.item3_desc">Dunia bisnis online terus
                                berkembang. Di sini reseller tidak perlu memikirkan biaya Research & Development (R&D)
                                yang sangat besar karena produk baru yang unik dan inovatif kami yang sediakan secara
                                rutin.</p>
                            <div class="benefit-points">
                                <div class="benefit-point">
                                    <i class="bi bi-lightbulb"></i>
                                    <span data-lang-key="benefits.item3_feat1">Produk Selalu Up-to-date</span>
                                </div>
                                <div class="benefit-point">
                                    <i class="bi bi-gear"></i>
                                    <span data-lang-key="benefits.item3_feat2">Free Research & Development</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="benefit-image">
                            <img data-src="<?php echo Router::asset('images/keuntungan-4.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Inovasi Produk" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefit 4: Produk Aman -->
            <div class="benefit-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="benefit-image">
                            <img data-src="<?php echo Router::asset('images/keuntungan-2.webp'); ?>"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                alt="Produk Aman" width="600" height="400"
                                class="img-fluid rounded-4 shadow-lg lazy-load">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefit-content ps-lg-5">
                            <div class="benefit-tag" data-lang-key="benefits.item4_tag">Safety & Quality</div>
                            <h3 class="benefit-title" data-lang-key="benefits.item4_title">PRODUK AMAN</h3>
                            <p class="benefit-desc" data-lang-key="benefits.item4_desc">Semua produk sudah teruji klinis, memiliki sertifikasi Halal dari Majelis Ulama Indonesia (MUI) dan Badan Pengawas Obat dan Makanan (BPOM).</p>
                            <div class="benefit-points">
                                <div class="benefit-point">
                                    <i class="bi bi-shield-check"></i>
                                    <span data-lang-key="benefits.item4_feat1">Teruji Klinis</span>
                                </div>
                                <div class="benefit-point">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span data-lang-key="benefits.item4_feat2">Sertifikasi Halal & BPOM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefit 5: Liburan Gratis -->
            <div class="benefit-row" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="benefit-content pe-lg-5">
                            <div class="benefit-tag" data-lang-key="benefits.item5_tag">Premium Rewards</div>
                            <h3 class="benefit-title" data-lang-key="benefits.item5_title">LIBURAN GRATIS</h3>
                            <p class="benefit-desc" data-lang-key="benefits.item5_desc">Liburan gratis ke luar negeri 2 kali dalam 1 tahun bagi para reseller yang berprestasi dengan fasilitas premium.</p>
                            <div class="benefit-points">
                                <div class="benefit-point">
                                    <i class="bi bi-airplane-engines"></i>
                                    <span data-lang-key="benefits.item5_feat1">2x Setahun</span>
                                </div>
                                <div class="benefit-point">
                                    <i class="bi bi-star-fill"></i>
                                    <span data-lang-key="benefits.item5_feat2">Fasilitas Premium</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <!-- Holiday Carousel Slider -->
                        <div class="holiday-slider-container">
                            <div class="holiday-slider">
                                <div class="holiday-track">
                                    <?php for($i=1; $i<=6; $i++): ?>
                                    <div class="holiday-slide">
                                        <div class="gallery-card holiday-card" data-full-src="<?php echo Router::asset('images/liburan/'.$i.'.webp'); ?>">
                                            <img data-src="<?php echo Router::asset('images/liburan/thumbnail/'.$i.'.webp'); ?>"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                alt="Liburan Gratis <?php echo $i; ?>" class="lazy-load">
                                            <div class="gallery-overlay">
                                                <div class="gallery-zoom"><i class="bi bi-zoom-in"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <!-- Slider Nav -->
                            <div class="holiday-slider-nav">
                                <button class="holiday-nav-btn prev" id="holidayPrev"><i class="bi bi-chevron-left"></i></button>
                                <div class="holiday-dots" id="holidayDots"></div>
                                <button class="holiday-nav-btn next" id="holidayNext"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4.3 Partner/Sponsor -->
<section id="partner" class="section section-partner" data-lazy-content>
    <div class="container">
        <div class="partner-card" data-aos="fade-up">
            <div class="row g-0 align-items-center">
                <div class="col-lg-5">
                    <div class="partner-image-box">
                        <img data-src="<?php echo Router::asset('images/mibelle-group.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Mibelle Biochemistry Swiss" width="500" height="300" class="lazy-load">
                        <div class="partner-image-label">Switzerland Excellence</div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="partner-content-box">
                        <div class="partner-tag" data-lang-key="partner.tag">Strategic Partnership</div>
                        <h2 class="partner-title" data-lang-key="partner.title">PARTNER RESMI MIBELLE BIOCHEMISTRY SWISS
                        </h2>
                        <div class="partner-divider"></div>
                        <p class="partner-desc" data-lang-key="partner.desc">
                            <strong>Mibelle Biochemistry</strong> merupakan produsen suplemen makanan dan kosmetik
                            terbesar di Switzerland yang didirikan sejak 1991 oleh <strong>Dr. Fred Zülli</strong>.
                        </p>

                        <div class="partner-subsidiary" data-aos="fade-up" data-aos-delay="100">
                            <div class="subsidiary-logo">
                                <img data-src="<?php echo Router::asset('images/migos.png'); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    alt="Migros Logo" width="120" height="50" class="lazy-load">
                            </div>
                            <div class="subsidiary-info">
                                <p data-lang-key="partner.migros_desc">Mibelle Biochemistry merupakan salah satu
                                    perusahaan milik <strong>MIGROS</strong>,
                                    Perusahaan Ritel Terbesar di Switzerland dan salah satu dari 40 Perusahaan Ritel
                                    Terbesar di Dunia.</p>
                            </div>
                        </div>

                        <div class="partner-features">
                            <div class="p-feature">
                                <i class="bi bi-award"></i>
                                <span data-lang-key="common.verified">Global Innovation Award</span>
                            </div>
                            <div class="p-feature">
                                <i class="bi bi-shield-check"></i>
                                <span data-lang-key="common.certified">Highest Quality Standards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4.4 Cara Mulai Jualan -->
<section id="cara-mulai" class="section section-mulai-jualan" data-lazy-content>
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" data-lang-key="start.title">CARA MULAI JUALAN</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle" data-lang-key="start.subtitle">Hanya butuh 3 langkah mudah untuk memulai bisnis
                sukses Anda hari ini</p>
        </div>

        <div class="steps-container">
            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-item text-center">
                        <div class="step-icon-wrapper">
                            <i class="bi bi-person-plus"></i>
                            <div class="step-number">01</div>
                        </div>
                        <h4 class="step-title" data-lang-key="start.step1_title">Registrasi</h4>
                        <p class="step-text" data-lang-key="start.step1_desc">Klik tombol di bawah ini untuk mengisi
                            formulir pendaftaran akun reseller Anda secara gratis.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-item text-center">
                        <div class="step-icon-wrapper">
                            <i class="bi bi-shield-check"></i>
                            <div class="step-number">02</div>
                        </div>
                        <h4 class="step-title" data-lang-key="start.step2_title">Pilih Lisensi</h4>
                        <p class="step-text" data-lang-key="start.step2_desc">Tentukan paket bisnis yang paling sesuai
                            untuk Anda agar mendapatkan harga khusus reseller.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-item text-center">
                        <div class="step-icon-wrapper">
                            <i class="bi bi-graph-up-arrow"></i>
                            <div class="step-number">03</div>
                        </div>
                        <h4 class="step-title" data-lang-key="start.step3_title">Mulai Jualan</h4>
                        <p class="step-text" data-lang-key="start.step3_desc">Akses alat promosi dan ikuti training
                            digital marketing untuk mulai menghasilkan pendapatan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta-box text-center mt-5" data-aos="zoom-in">
            <div class="cta-content">
                <p class="cta-subtext" data-lang-key="start.subtitle">Siap untuk meraih sukses bersama ribuan reseller
                    lainnya?</p>
                <a href="https://www.biogreensciencelogin.com/publicJoinUs.meta?intrId=<?php echo AFFILIATE_NAME ?: 'happy'; ?>&memberPackageId=PACKAGE_PLATINUM"
                    target="_blank" class="btn btn-whatsapp-green">
                    <i class="bi bi-rocket-takeoff me-2"></i> <span data-lang-key="start.cta">Mulai Jualan
                        Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     5. MEDIA & SOSIAL
======================================== -->

<!-- 5.1 Event Tahunan -->
<section id="media" class="section section-event-tahunan" data-lazy-content>
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" data-lang-key="events.title">EVENT TAHUNAN</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle" data-lang-key="events.subtitle">Momen berharga dalam perjalanan sukses dan
                kebersamaan keluarga besar Biogreen Science</p>
        </div>

        <div class="event-gallery-wrapper" data-aos="fade-up" data-lazy-content>
            <div id="eventCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <?php
                    $eventImages = [
                        'bagd21_1.webp',
                        'bagd21_2.webp',
                        'bagd21_3.webp',
                        'bagd21_10.webp',
                        'bagd21_11.webp',
                        'bagd21_12.webp',
                        'bagd21_13.webp',
                        'bagd21_14.webp',
                        'bagd21_15.webp',
                        'bagd21_16.webp',
                        'bagd21_17.webp',
                        'bagd21_18.webp',
                        'bagd21_19.webp',
                        'bagd21_20.webp',
                        'bagd21_21.webp',
                        'bagd21_22.webp'
                    ]; // Using a selection for the main carousel to keep it clean
                    foreach ($eventImages as $index => $img):
                        ?>
                        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="<?php echo $index; ?>"
                            class="<?php echo $index === 0 ? 'active' : ''; ?>"
                            aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                            aria-label="Slide <?php echo $index + 1; ?>"></button>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel Items -->
                <div class="carousel-inner shadow-lg rounded-4">
                    <?php foreach ($eventImages as $index => $img):
                        $thumbName = $img;
                        // Handle specific _50 thumbnails
                        if (in_array($img, ['bagd21_12.webp', 'bagd21_13.webp', 'bagd21_16.webp', 'bagd21_17.webp', 'bagd21_18.webp', 'bagd21_21.webp'])) {
                            $thumbName = str_replace('.webp', '_50.webp', $thumbName);
                        }

                        $thumbPath = 'assets/images/event/thumbnail/' . $thumbName;
                        $finalThumb = file_exists(BASE_PATH . '/' . $thumbPath) ? Router::asset('images/event/thumbnail/' . $thumbName) : Router::asset('images/event/' . $img);
                        ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" data-bs-interval="4000">
                            <div class="event-image-container">
                                <img data-src="<?php echo $finalThumb; ?>"
                                    data-full-src="<?php echo Router::asset('images/event/' . $img); ?>"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    class="d-block w-100 lazy-load gallery-preview-trigger cursor-zoom"
                                    alt="Biogreen Event <?php echo $index + 1; ?>" width="1200" height="800">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="event-caption-title" data-lang-key="events.caption_title">Biogreen Annual
                                        Grand Day</h5>
                                    <p class="event-caption-desc" data-lang-key="events.caption_desc">Merayakan kesuksesan
                                        dan inspirasi tanpa batas</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-icon"><i class="bi bi-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-icon"><i class="bi bi-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Thumbnail Grid (Optional/Secondary View) -->
            <div class="event-thumbnails mt-4 d-none d-lg-flex justify-content-center gap-2">
                <?php foreach (array_slice($eventImages, 0, 8) as $index => $img): ?>
                    <div class="thumb-item" data-bs-target="#eventCarousel" data-bs-slide-to="<?php echo $index; ?>">
                        <img data-src="<?php echo Router::asset('images/event/' . $img); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Thumb <?php echo $index; ?>" width="150" height="100" class="lazy-load">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- 5.2 Testimoni -->
<section id="testimoni" class="section section-testimoni" data-lazy-content>
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" data-lang-key="testimonials.title">TESTIMONI</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle" data-lang-key="testimonials.subtitle">Kisah sukses dan perjalanan inspiratif
                para Leader Biogreen Science</p>
        </div>

        <?php
        $langSuffix = $currentLang === 'id' ? 'id' : 'us';
        $testimonials = [
            ['name' => 'Andry Lie', 'img' => 'andrylie-' . $langSuffix . '.webp', 'desc' => 'desc-andrylie-' . $langSuffix . '.webp'],
            ['name' => 'Dewi', 'img' => 'dewi-' . $langSuffix . '.webp', 'desc' => 'desc-dewi-' . $langSuffix . '.webp'],
            ['name' => 'Erna', 'img' => 'erna-' . $langSuffix . '.webp', 'desc' => 'desc-erna-' . $langSuffix . '.webp'],
            ['name' => 'Inge', 'img' => 'inge-' . $langSuffix . '.webp', 'desc' => 'desc-inge-' . $langSuffix . '.webp'],
            ['name' => 'Jansen', 'img' => 'jansen-' . $langSuffix . '.webp', 'desc' => 'desc-jansen-' . $langSuffix . '.webp'],
            ['name' => 'Kartini', 'img' => 'kartini-' . $langSuffix . '.webp', 'desc' => 'desc-kartini-' . $langSuffix . '.webp'],
            ['name' => 'Lussiana', 'img' => 'lussiana-' . $langSuffix . '.webp', 'desc' => 'desc-lussi-' . $langSuffix . '.webp']
        ];
        ?>

        <div class="testi-grid-wrapper" data-aos="fade-up" data-lazy-content>
            <div class="testi-slider-container">
                <div class="testi-track">
                    <?php foreach ($testimonials as $testi):
                        $thumbName = $testi['img'];
                        $thumbPath = 'assets/images/testimoni/thumbnail/' . $thumbName;
                        $finalProfile = file_exists(BASE_PATH . '/' . $thumbPath) ? Router::asset('images/testimoni/thumbnail/' . $thumbName) : Router::asset('images/testimoni/' . $testi['img']);

                        $storyThumb = $testi['desc'];
                        $storyPath = 'assets/images/testimoni/thumbnail/' . $storyThumb;
                        $finalStory = file_exists(BASE_PATH . '/' . $storyPath) ? Router::asset('images/testimoni/thumbnail/' . $storyThumb) : Router::asset('images/testimoni/' . $testi['desc']);
                        ?>
                        <div class="testi-slide">
                            <div class="testi-card-vertical">
                                <div class="testi-profile-img">
                                    <img data-src="<?php echo $finalProfile; ?>"
                                        data-full-src="<?php echo Router::asset('images/testimoni/' . $testi['img']); ?>"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        alt="<?php echo $testi['name']; ?>" width="300" height="400"
                                        class="img-fluid lazy-load gallery-preview-trigger cursor-zoom">
                                    <div class="testi-badge" data-lang-key="testimonials.badge">Top Leader</div>
                                </div>
                                <div class="testi-story-content">
                                    <img data-src="<?php echo $finalStory; ?>"
                                        data-full-src="<?php echo Router::asset('images/testimoni/' . $testi['desc']); ?>"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        alt="Story <?php echo $testi['name']; ?>" width="400" height="600"
                                        class="img-fluid lazy-load gallery-preview-trigger cursor-zoom">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="testi-nav">
                    <button class="testi-btn prev" id="testiPrev" aria-label="Previous testimonial">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <div class="testi-dots" id="testiDots"></div>
                    <button class="testi-btn next" id="testiNext" aria-label="Next testimonial">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     6. REGISTRASI (CALL TO ACTION)
======================================== -->
<section id="registrasi" class="section section-mulai-gabung" data-lazy-content>
    <!-- Decorative Elements -->
    <div class="gabung-decoration-1"></div>
    <div class="gabung-decoration-2"></div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" data-lang-key="register.title">KLIK TOMBOL DIBAWAH INI UNTUK MENDAFTAR MENJADI
                RESELLER BISNIS ONLINE BGS!</h2>
            <div class="section-divider mx-auto border-white"></div>
            <p class="section-subtitle text-uppercase" data-lang-key="register.subtitle">MENJALANKAN BISNIS ONLINE BGS
                MEMBUAT ANDA BERGABUNG DENGAN +/- 160.000 RESELLER & KOMUNITAS YANG SIAP MEMBANTU ANDA SECARA OFFLINE
                MAUPUN ONLINE</p>
        </div>

        <div class="registration-packages">
            <div class="row g-2 justify-content-center">
                <!-- Silver -->
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <a href="https://www.biogreensciencelogin.com/publicJoinUs.meta?intrId=<?php echo AFFILIATE_NAME ?: 'happy'; ?>&memberPackageId=PACKAGE_SILVER"
                        target="_blank" class="package-btn">
                        <img data-src="<?php echo Router::asset('images/silver.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Daftar Paket Silver" width="150" height="150" data-lang-alt="register.silver"
                            class="img-fluid lazy-load">
                    </a>
                </div>
                <!-- Gold -->
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://www.biogreensciencelogin.com/publicJoinUs.meta?intrId=<?php echo AFFILIATE_NAME ?: 'happy'; ?>&memberPackageId=PACKAGE_GOLD"
                        target="_blank" class="package-btn">
                        <img data-src="<?php echo Router::asset('images/gold.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Daftar Paket Gold" width="150" height="150" data-lang-alt="register.gold"
                            class="img-fluid lazy-load">
                    </a>
                </div>
                <!-- Platinum -->
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="https://www.biogreensciencelogin.com/publicJoinUs.meta?intrId=<?php echo AFFILIATE_NAME ?: 'happy'; ?>&memberPackageId=PACKAGE_PLATINUM"
                        target="_blank" class="package-btn">
                        <img data-src="<?php echo Router::asset('images/platinum.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Daftar Paket Platinum" width="150" height="150" data-lang-alt="register.platinum"
                            class="img-fluid lazy-load">
                    </a>
                </div>
                <!-- Star Diamond -->
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://www.biogreensciencelogin.com/publicJoinUs.meta?intrId=<?php echo AFFILIATE_NAME ?: 'happy'; ?>&memberPackageId=PACKAGE_STARDIAMOND"
                        target="_blank" class="package-btn">
                        <img data-src="<?php echo Router::asset('images/stardiamond.png'); ?>"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="Daftar Paket Star Diamond" width="150" height="150"
                            data-lang-alt="register.stardiamond" class="img-fluid lazy-load">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body p-0 text-center position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" aria-label="Close" style="z-index: 1060;"></button>
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                    id="previewImage" alt="Preview Gambar" class="img-fluid rounded shadow-lg" width="800" height="600"
                    style="max-height: 90vh;">
            </div>
        </div>
    </div>
</div>