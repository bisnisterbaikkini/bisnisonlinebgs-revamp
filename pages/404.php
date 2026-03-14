<?php
/**
 * 404 Page - Halaman Error
 * Ditampilkan ketika halaman tidak ditemukan
 */
?>

<!-- 404 Error Section -->
<section class="error-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <!-- Error Illustration -->
                <div class="error-illustration mb-4">
                    <img src="<?php echo Router::asset('images/404-illustration.svg'); ?>" alt="404 Error" class="img-fluid" width="400" height="300" loading="eager">
                </div>
                
                <!-- Error Code -->
                <div class="error-code" aria-hidden="true">404</div>
                
                <!-- Error Title -->
                <h1 class="h2 mb-3" data-lang-key="404.title">Halaman Tidak Ditemukan</h1>
                
                <!-- Error Message -->
                <p class="error-message text-muted mb-4" data-lang-key="404.message">
                    Maaf, halaman yang Anda cari tidak dapat ditemukan atau telah dipindahkan.
                </p>
                
                <!-- Action Buttons -->
                <div class="error-actions d-flex flex-column flex-sm-row gap-3 justify-content-center mb-5">
                    <a href="<?php echo Router::url(); ?>" class="btn btn-primary btn-lg">
                        <i class="bi bi-house-door me-2"></i>
                        <span data-lang-key="404.back_home">Kembali ke Beranda</span>
                    </a>
                    <a href="<?php echo Router::url('contact'); ?>" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-envelope me-2"></i>
                        <span data-lang-key="common.contact_us">Hubungi Kami</span>
                    </a>
                </div>
                
                <!-- Search Box -->
                <div class="error-search">
                    <p class="text-muted mb-3" data-lang-key="404.search">Atau coba cari:</p>
                    <form action="<?php echo Router::url('search'); ?>" method="get" class="d-flex gap-2 justify-content-center">
                        <div class="input-group" style="max-width: 400px;">
                            <input type="search" name="q" class="form-control form-control-lg" 
                                   data-lang-placeholder="common.search"
                                   placeholder="Cari..." 
                                   required>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Helpful Links -->
                <div class="helpful-links mt-5">
                    <p class="text-muted mb-3">Halaman yang mungkin Anda cari:</p>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a href="<?php echo Router::url('services'); ?>" class="btn btn-sm btn-outline-secondary">
                            <span data-lang-key="nav.services">Layanan</span>
                        </a>
                        <a href="<?php echo Router::url('portfolio'); ?>" class="btn btn-sm btn-outline-secondary">
                            <span data-lang-key="nav.portfolio">Portfolio</span>
                        </a>
                        <a href="<?php echo Router::url('blog'); ?>" class="btn btn-sm btn-outline-secondary">
                            <span data-lang-key="nav.blog">Blog</span>
                        </a>
                        <a href="<?php echo Router::url('pricing'); ?>" class="btn btn-sm btn-outline-secondary">
                            <span data-lang-key="nav.pricing">Harga</span>
                        </a>
                        <a href="<?php echo Router::url('about'); ?>" class="btn btn-sm btn-outline-secondary">
                            <span data-lang-key="nav.about">Tentang Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
