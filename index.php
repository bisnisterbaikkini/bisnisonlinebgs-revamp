<?php
/**
 * BisnisonlineBGS - Main Template/Skeleton
 * Web Responsive, SPA, SEO Optimized
 * Single Page Parallax Design
 */

// Include Router
require_once __DIR__ . '/router.php';

// CSP via PHP agar pasti dipakai (termasuk Cloudflare Insights untuk SW)
$csp = "default-src 'self' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com; " .
    "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com https://static.cloudflareinsights.com https://www.googletagmanager.com https://www.google-analytics.com; " .
    "script-src-elem 'self' 'unsafe-inline' 'unsafe-eval' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com https://static.cloudflareinsights.com https://www.googletagmanager.com https://www.google-analytics.com; " .
    "style-src 'self' 'unsafe-inline' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com; " .
    "style-src-elem 'self' 'unsafe-inline' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com; " .
    "img-src 'self' data: https:; " .
    "font-src 'self' data: https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com; " .
    "connect-src 'self' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com https://api.bisnisonlinebgs.com https://cloudflareinsights.com https://static.cloudflareinsights.com https://www.googletagmanager.com https://www.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net; " .
    "manifest-src 'self' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com; " .
    "frame-src 'self' https://www.youtube.com https://www.google.com https://www.googletagmanager.com; " .
    "media-src 'self' https://www.bisnisonlinebgs.com https://bisnisonlinebgs.com;";
// Hapus CSP dari Apache/.htaccess agar tidak ada dua CSP (intersection) yang menyebabkan domain diblokir
header_remove('Content-Security-Policy');
header("Content-Security-Policy: " . $csp);

// Get current language from cookie or default to Indonesian
$currentLang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'id';

// Canonical URL (per section untuk SEO)
$reqPath = $router->getRequestedPath();
if ($currentPage !== 'home') {
    $canonicalUrl = BASE_URL . '/' . $currentPage;
} elseif ($reqPath !== '' && $reqPath !== 'beranda') {
    $canonicalUrl = BASE_URL . '/' . $reqPath;
} else {
    $canonicalUrl = BASE_URL . '/';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $currentLang === 'id' ? 'id' : 'en'; ?>">

<head>
    <!-- Primary Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSP di HTML agar tetap dipakai jika header di-override server (api + Cloudflare) -->
    <meta http-equiv="Content-Security-Policy" content="<?php echo htmlspecialchars($csp, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- SEO Meta Tags -->
    <title><?php echo $router->getPageTitle(); ?> | BisnisonlineBGS - Bisnis Online Terpercaya</title>
    <meta name="description" content="<?php echo $router->getMetaDescription(); ?>">
    <meta name="keywords" content="<?php echo $router->getMetaKeywords(); ?>">
    <meta name="author" content="BisnisonlineBGS">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">

    <!-- Alternate Language -->
    <link rel="alternate" hreflang="id" href="<?php echo $canonicalUrl; ?>?lang=id">
    <link rel="alternate" hreflang="en" href="<?php echo $canonicalUrl; ?>?lang=en">
    <link rel="alternate" hreflang="x-default" href="<?php echo $canonicalUrl; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:title" content="<?php echo $router->getPageTitle(); ?> | BisnisonlineBGS">
    <meta property="og:description" content="<?php echo $router->getMetaDescription(); ?>">
    <meta property="og:image" content="<?php echo Router::asset('images/banner/banner-landscape.webp'); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="BisnisonlineBGS - Bisnis Online Terpercaya">
    <meta property="og:site_name" content="BisnisonlineBGS">
    <meta property="og:locale" content="<?php echo $currentLang === 'id' ? 'id_ID' : 'en_US'; ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $canonicalUrl; ?>">
    <meta name="twitter:title" content="<?php echo $router->getPageTitle(); ?> | BisnisonlineBGS">
    <meta name="twitter:description" content="<?php echo $router->getMetaDescription(); ?>">
    <meta name="twitter:image" content="<?php echo Router::asset('images/banner/banner-landscape.webp'); ?>">
    <meta name="twitter:creator" content="@bisnisonlinebgs">
    <meta name="twitter:site" content="@bisnisonlinebgs">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/png" href="<?php echo Router::asset('images/logo-square.png'); ?>">
    <link rel="apple-touch-icon" href="<?php echo Router::asset('images/logo-square.png'); ?>">
    <link rel="manifest" href="<?php echo Router::asset('images/site.webmanifest'); ?>">
    <meta name="msapplication-TileColor" content="#0d6efd">
    <meta name="theme-color" content="#0d6efd">

    <!-- Preload Critical Assets -->
    <link rel="preload" href="<?php echo Router::asset('fonts/proximanovalight.woff'); ?>" as="font" type="font/woff" crossorigin>
    
    <!-- Responsive Banner Preload (LCP Optimization) -->
    <link rel="preload" href="<?php echo Router::asset('images/banner/banner-potrait.webp'); ?>" as="image" media="(max-width: 767px)" fetchpriority="high">
    <link rel="preload" href="<?php echo Router::asset('images/banner/banner-landscape.webp'); ?>" as="image" media="(min-width: 768px)" fetchpriority="high">
    
    <link rel="preload" href="<?php echo Router::asset('libs/bootstrap/css/bootstrap.min.css'); ?>" as="style">
    <link rel="preload" href="<?php echo Router::asset('css/style.css'); ?>" as="style">

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo Router::asset('libs/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo Router::asset('css/style.css'); ?>">

    <!-- Defer Non-Critical CSS -->
    <link rel="stylesheet" href="<?php echo Router::asset('libs/bootstrap-icons/font/bootstrap-icons.min.css'); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="<?php echo Router::asset('libs/aos/aos.css'); ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="<?php echo Router::asset('fonts/font.css'); ?>" media="print" onload="this.media='all'">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo Router::asset('css/mobile.css'); ?>" media="(max-width: 767px)">
    <link rel="stylesheet" href="<?php echo Router::asset('css/tablet.css'); ?>" media="(min-width: 768px) and (max-width: 1024px)">
    <link rel="stylesheet" href="<?php echo Router::asset('css/desktop.css'); ?>" media="(min-width: 1025px)">

    <!-- Structured Data / Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "BisnisonlineBGS",
        "alternateName": "Bisnis Online BGS",
        "url": "<?php echo BASE_URL; ?>",
        "logo": "<?php echo Router::asset('images/logo.png'); ?>",
        "description": "Bisnis online terpercaya dengan produk Apple Stemcell berkualitas tinggi dan sistem marketing plan yang menguntungkan",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Jakarta",
            "addressRegion": "DKI Jakarta",
            "addressCountry": "ID"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-21-1234-5678",
            "contactType": "customer service",
            "availableLanguage": ["Indonesian", "English"]
        },
        "sameAs": [
            "https://www.facebook.com/bisnisonlinebgs",
            "https://www.instagram.com/bisnisonlinebgs",
            "https://twitter.com/bisnisonlinebgs",
            "https://www.youtube.com/@bisnisonlinebgs"
        ]
    }
    </script>

    <!-- Product Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "Apple Stemcell Plus",
        "image": "<?php echo Router::asset('images/products/apple-stemcell.png'); ?>",
        "description": "Suplemen anti-aging premium dengan teknologi stem cell dari Swiss",
        "brand": {
            "@type": "Brand",
            "name": "BisnisonlineBGS"
        },
        "offers": {
            "@type": "Offer",
            "priceCurrency": "IDR",
            "price": "850000",
            "availability": "https://schema.org/InStock"
        }
    }
    </script>

    <!-- WebSite Schema untuk Search -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "BisnisonlineBGS",
        "url": "<?php echo BASE_URL; ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo BASE_URL; ?>/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <?php
    // BreadcrumbList Schema (SEO - per section)
    $reqPath = $router->getRequestedPath();
    $breadcrumbNames = [
        '' => 'Beranda', 'beranda' => 'Beranda', 'profil' => 'Profil', 'about' => 'Tentang Kami',
        'produk' => 'Produk', 'products' => 'Produk', 'bisnis' => 'Bisnis', 'business' => 'Bisnis',
        'media' => 'Media', 'registrasi' => 'Registrasi', 'register' => 'Daftar', 'daftar' => 'Daftar'
    ];
    if ($currentPage === 'home' && isset($breadcrumbNames[$reqPath]) && $reqPath !== '') {
        $crumbName = $breadcrumbNames[$reqPath];
        $crumbUrl = BASE_URL . '/' . $reqPath;
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            { "@type": "ListItem", "position": 1, "name": "Beranda", "item": "<?php echo BASE_URL; ?>" },
            { "@type": "ListItem", "position": 2, "name": "<?php echo htmlspecialchars($crumbName, ENT_QUOTES, 'UTF-8'); ?>", "item": "<?php echo $crumbUrl; ?>" }
        ]
    }
    </script>
    <?php } ?>

    <!-- Force disable Service Worker lama secepat mungkin -->
    <script>
        (function() {
            if (!('serviceWorker' in navigator)) return;
            // Jalankan sekali per tab agar tidak reload loop
            if (sessionStorage.getItem('sw_cleanup_done') === '1') return;
            sessionStorage.setItem('sw_cleanup_done', '1');
            navigator.serviceWorker.getRegistrations().then(function(regs) {
                var tasks = regs.map(function(reg) { return reg.unregister(); });
                return Promise.all(tasks);
            }).then(function() {
                if (window.caches && caches.keys) {
                    return caches.keys().then(function(keys) {
                        return Promise.all(keys.map(function(k) { return caches.delete(k); }));
                    });
                }
            }).finally(function() {
                // Reload sekali agar request berikutnya sudah tanpa SW lama
                window.location.reload();
            });
        })();
    </script>

    <!-- Google Analytics (GA4) -->
    <?php if (IS_PRODUCTION): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CKJ9Q68J7E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-CKJ9Q68J7E');
    </script>
    <?php endif; ?>
</head>

<body class="page-<?php echo $currentPage; ?>" data-page="<?php echo $currentPage; ?>"
    data-lang="<?php echo $currentLang; ?>">

    <!-- Global Loading Bar -->
    <div id="loading-bar" class="loading-bar"></div>

    <!-- Page Loader -->
    <div id="page-loader" class="page-loader">
        <div class="loader-content">
            <img src="<?php echo Router::asset('images/loading.gif'); ?>" alt="Loading..." width="80" height="80">
        </div>
    </div>

    <!-- Skip to Content untuk Accessibility -->
    <a href="#main-content" class="skip-link visually-hidden-focusable">Langsung ke konten utama</a>

    <!-- Navbar (Fixed Top for Parallax) -->
    <?php include __DIR__ . '/components/navbar.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="main-content">
        <div id="spa-container" class="spa-container">
            <?php $router->loadPage(); ?>
        </div>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/components/footer.php'; ?>

    <!-- Back to Top Button -->
    <button type="button" id="btn-back-to-top" class="btn btn-primary btn-back-to-top" aria-label="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/628123456789?text=Halo!%20Saya%20tertarik%20untuk%20menjadi%20reseller%20di%20Bisnis%20Online%20BGS"
        id="btn-whatsapp-floating" class="btn-whatsapp-floating" target="_blank" rel="noopener"
        aria-label="Chat via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Loading Overlay untuk SPA -->
    <div id="loading-overlay" class="loading-overlay" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Memuat...</span>
        </div>
    </div>

    <!-- jQuery (Offline) -->
    <script src="<?php echo Router::asset('libs/jquery/jquery.min.js'); ?>" defer></script>

    <!-- Bootstrap 5 JS Bundle (Offline) -->
    <script src="<?php echo Router::asset('libs/bootstrap/js/bootstrap.bundle.min.js'); ?>" defer></script>

    <!-- AOS - Animate On Scroll (Offline) -->
    <script src="<?php echo Router::asset('libs/aos/aos.js'); ?>" defer></script>

    <!-- App JS -->
    <script>
        // Global Configuration
        window.APP_CONFIG = {
            basePath: '<?php echo BASE_PATH; ?>',
            baseUrl: '<?php echo BASE_URL; ?>',
            currentPage: '<?php echo $currentPage; ?>',
            currentLang: '<?php echo $currentLang; ?>',
            affiliateName: '<?php echo $router->getAffiliateName(); ?>',
            isProduction: <?php echo IS_PRODUCTION ? 'true' : 'false'; ?>,
            version: '<?php echo APP_VERSION; ?>'
        };
    </script>
    <script src="<?php echo Router::asset('js/app.js'); ?>" defer></script>
</body>

</html>