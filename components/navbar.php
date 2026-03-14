<?php
/**
 * Navbar Component - Modern Parallax Navigation
 * Single page scroll navigation dengan 6 menu utama
 */
?>
<!-- Main Navigation -->
<nav class="site-navbar navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="<?php echo Router::url(); ?>">
            <div class="brand-logo">
                <img src="<?php echo Router::asset('images/logo-full-text.png'); ?>" alt="BisnisonlineBGS Logo" loading="eager">
            </div>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" 
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-line"></span>
            <span class="toggler-line"></span>
            <span class="toggler-line"></span>
        </button>
        
        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <!-- 1. Beranda -->
                <li class="nav-item">
                    <a class="nav-link scroll-link active" href="#beranda">
                        <i class="bi bi-house-door nav-icon"></i>
                        <span data-lang-key="nav.home">Beranda</span>
                    </a>
                </li>
                
                <!-- 2. Profil -->
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#profil">
                        <i class="bi bi-building nav-icon"></i>
                        <span data-lang-key="nav.about">Profil</span>
                    </a>
                </li>
                
                <!-- 3. Produk -->
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#produk">
                        <i class="bi bi-box-seam nav-icon"></i>
                        <span data-lang-key="nav.products">Produk</span>
                    </a>
                </li>
                
                <!-- 4. Bisnis -->
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#bisnis">
                        <i class="bi bi-briefcase nav-icon"></i>
                        <span data-lang-key="nav.business">Bisnis</span>
                    </a>
                </li>
                
                <!-- 5. Media & Sosial -->
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#media">
                        <i class="bi bi-camera-reels nav-icon"></i>
                        <span data-lang-key="nav.media">Media</span>
                    </a>
                </li>
                
                <!-- 6. Registrasi -->
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#registrasi">
                        <i class="bi bi-person-plus nav-icon"></i>
                        <span data-lang-key="nav.register">Registrasi</span>
                    </a>
                </li>
            </ul>
            
            <!-- Right Side Actions -->
            <div class="navbar-actions">
                <!-- Language Switcher -->
                <div class="lang-switcher-modern">
                    <button type="button" class="btn-lang <?php echo $currentLang === 'id' ? 'active' : ''; ?>" data-lang="id" title="Bahasa Indonesia">
                        ID
                    </button>
                    <span class="lang-divider">|</span>
                    <button type="button" class="btn-lang <?php echo $currentLang === 'en' ? 'active' : ''; ?>" data-lang="en" title="English">
                        EN
                    </button>
                </div>
                
                <!-- CTA Button -->
                <a href="#registrasi" class="btn btn-cta-modern scroll-link">
                    <span class="btn-text" data-lang-key="nav.join">Gabung Sekarang</span>
                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Scroll Progress Bar -->
<div class="scroll-progress">
    <div class="scroll-progress-bar" id="scrollProgress"></div>
</div>
