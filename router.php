<?php
/**
 * Router.php - Controller Routing untuk BisnisonlineBGS
 * Single Page Application dengan Parallax Navigation
 */

class Router {
    private $routes = [];
    private $basePath = '';
    private $currentPage = '';
    private $requestedPath = ''; // URL path untuk SEO (profil, produk, dll)
    private $affiliateName = null;
    
    public function __construct() {
        $this->detectEnvironment();
        $this->registerRoutes();
    }
    
    /**
     * Deteksi environment (local/server)
     */
    private function detectEnvironment() {
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        if (strpos($host, 'bisnisonlinebgs.com') !== false) {
            $this->basePath = '/';
            define('IS_PRODUCTION', true);
            // Ikuti host yang dikunjungi agar asset same-origin (hindari CORS)
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'https';
            define('BASE_URL', $scheme . '://' . $host);
        } else {
            $this->basePath = '/bisnisonlinebgs-revamp/';
            define('IS_PRODUCTION', false);
            define('BASE_URL', 'http://localhost/bisnisonlinebgs-revamp');
        }
        
        // Asset Versioning (Cache Busting)
        // Automatic timestamp versioning
        define('APP_VERSION', time());
        define('BASE_PATH', $this->basePath);
    }
    
    /**
     * Register semua routes yang tersedia
     * Single page - semua route mengarah ke home
     */
    private function registerRoutes() {
        $this->routes = [
            ''              => 'home',
            'home'          => 'home',
            'beranda'       => 'home',
            'profil'        => 'home',
            'about'         => 'home',
            'produk'        => 'home',
            'products'      => 'home',
            'bisnis'        => 'home',
            'business'      => 'home',
            'media'         => 'home',
            'registrasi'    => 'home',
            'register'      => 'home',
            'daftar'        => 'home',
        ];
    }
    
    /**
     * Parse URL dan dapatkan halaman yang diminta
     */
    public function parseUrl() {
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        $page = trim($page, '/');
        $page = filter_var($page, FILTER_SANITIZE_URL);
        $page = strtolower($page);
        
        // Handle hash/anchor links (untuk parallax)
        $page = explode('#', $page)[0];
        
        return $page;
    }
    
    /**
     * Route ke halaman yang sesuai
     */
    public function route() {
        $requestedPage = $this->parseUrl();
        
        if (array_key_exists($requestedPage, $this->routes)) {
            $this->currentPage = $this->routes[$requestedPage];
            $this->requestedPath = $requestedPage; // untuk SEO title/description per section
        } else if (!empty($requestedPage) && preg_match('/^[a-zA-Z0-9_-]+$/', $requestedPage)) {
            // Jika bukan route terdaftar, anggap sebagai affiliate dan arahkan ke home
            $this->currentPage = 'home';
            $this->affiliateName = $requestedPage;
            $this->requestedPath = '';
        } else {
            $this->currentPage = '404';
            $this->requestedPath = '';
        }

        // Simpan sebagai konstanta untuk akses global jika diperlukan
        if (!defined('AFFILIATE_NAME')) {
            define('AFFILIATE_NAME', $this->affiliateName);
        }
        
        return $this->currentPage;
    }
    
    /**
     * Load konten halaman
     */
    public function loadPage() {
        $pagePath = __DIR__ . '/pages/' . $this->currentPage . '.php';
        
        if (file_exists($pagePath)) {
            include $pagePath;
        } else {
            include __DIR__ . '/pages/404.php';
        }
    }
    
    /**
     * Get current page name
     */
    public function getCurrentPage() {
        return $this->currentPage;
    }
    
    /**
     * Get affiliate name jika ada
     */
    public function getAffiliateName() {
        return $this->affiliateName;
    }

    /**
     * Get base path
     */
    public function getBasePath() {
        return $this->basePath;
    }
    
    /**
     * Generate URL
     */
    public static function url($path = '') {
        return BASE_URL . '/' . ltrim($path, '/');
    }
    
    /**
     * Generate asset URL with automatic Cache Busting
     */
    public static function asset($path) {
        $assetPath = ltrim($path, '/');
        $fullPath = __DIR__ . '/assets/' . $assetPath;
        
        // Get version: use file modification time if file exists, fallback to APP_VERSION
        $v = (file_exists($fullPath)) ? filemtime($fullPath) : APP_VERSION;
        
        $url = BASE_URL . '/assets/' . $assetPath;
        
        // Add versioning to prevent caching issues on updates
        // Apply to CSS, JS, and potentially images if specified
        $url .= '?v=' . $v;
        
        return $url;
    }
    
    /**
     * Check if current page matches
     */
    public function isPage($page) {
        return $this->currentPage === $page;
    }
    
    /**
     * Get requested path (untuk SEO & Breadcrumb)
     */
    public function getRequestedPath() {
        return $this->requestedPath;
    }
    
    /**
     * Get page title berdasarkan halaman & section (SEO per URL)
     */
    public function getPageTitle() {
        $titles = [
            'home' => 'Beranda',
            '404'  => 'Halaman Tidak Ditemukan'
        ];
        $sectionTitles = [
            '' => 'Beranda',
            'beranda' => 'Beranda',
            'profil' => 'Profil Perusahaan',
            'about' => 'Tentang Kami',
            'produk' => 'Produk Apple Stemcell',
            'products' => 'Produk Apple Stemcell',
            'bisnis' => 'Peluang Bisnis & Marketing Plan',
            'business' => 'Peluang Bisnis',
            'media' => 'Media & Event',
            'registrasi' => 'Daftar Jadi Member',
            'register' => 'Daftar Jadi Member',
            'daftar' => 'Daftar Jadi Member',
        ];
        if ($this->currentPage === 'home' && isset($sectionTitles[$this->requestedPath])) {
            return $sectionTitles[$this->requestedPath];
        }
        return $titles[$this->currentPage] ?? 'BisnisonlineBGS';
    }
    
    /**
     * Get meta description berdasarkan halaman & section (SEO)
     */
    public function getMetaDescription() {
        $descriptions = [
            'home' => 'BisnisonlineBGS - Perusahaan kesehatan dan kecantikan terpercaya dengan produk Apple Stemcell berkualitas premium. Raih kesehatan optimal dan peluang bisnis menguntungkan bersama kami.',
            '404'  => 'Halaman tidak ditemukan - BisnisonlineBGS'
        ];
        $sectionDescriptions = [
            '' => $descriptions['home'],
            'beranda' => 'BisnisonlineBGS - Bisnis online terpercaya dengan Apple Stemcell. Kesehatan, kecantikan, dan peluang usaha dalam satu wadah.',
            'profil' => 'Profil Biogreen Science Indonesia - Tentang kami, kantor pusat, dan top management. Perusahaan MLM kesehatan dan kecantikan terpercaya.',
            'about' => 'Tentang BisnisonlineBGS dan Biogreen Science. Company profile, visi misi, dan tim leadership.',
            'produk' => 'Produk Apple Stemcell Plus dan rangkaian suplemen kesehatan & anti-aging. Teknologi stem cell dari Swiss, BPOM terdaftar.',
            'products' => 'Produk unggulan BisnisonlineBGS - Apple Stemcell, suplemen kesehatan, produk kecantikan.',
            'bisnis' => 'Peluang bisnis BisnisonlineBGS - Marketing plan menguntungkan, bonus, dan cara jadi distributor/reseller Apple Stemcell.',
            'business' => 'Bergabung jadi member BisnisonlineBGS. Sistem referral dan komisi transparan.',
            'media' => 'Event tahunan, testimoni, dan media BisnisonlineBGS. Lihat kegiatan dan hasil member.',
            'registrasi' => 'Daftar jadi member BisnisonlineBGS. Registrasi mudah, mulai bisnis Apple Stemcell sekarang.',
            'register' => 'Registrasi member BisnisonlineBGS - Form pendaftaran distributor.',
            'daftar' => 'Cara daftar dan gabung BisnisonlineBGS. Isi form registrasi online.',
        ];
        if ($this->currentPage === 'home' && isset($sectionDescriptions[$this->requestedPath])) {
            return $sectionDescriptions[$this->requestedPath];
        }
        return $descriptions[$this->currentPage] ?? $descriptions['home'];
    }
    
    /**
     * Get meta keywords berdasarkan halaman & section (SEO)
     */
    public function getMetaKeywords() {
        $keywords = [
            'home' => 'bisnisonlinebgs, apple stemcell, suplemen kesehatan, anti aging, bisnis mlm, peluang usaha, produk kecantikan, stem cell indonesia, kesehatan kulit, awet muda',
            '404'  => 'halaman tidak ditemukan, error 404'
        ];
        $sectionKeywords = [
            '' => $keywords['home'],
            'beranda' => 'bisnisonlinebgs, beranda, apple stemcell, bisnis online',
            'profil' => 'profil perusahaan, biogreen science, tentang kami, company profile',
            'about' => 'tentang kami, biogreen science, company profile',
            'produk' => 'apple stemcell plus, suplemen anti aging, stem cell indonesia, BPOM',
            'products' => 'produk apple stemcell, suplemen kesehatan',
            'bisnis' => 'marketing plan, peluang bisnis, jadi distributor, reseller apple stemcell',
            'business' => 'peluang bisnis, distributor, reseller',
            'media' => 'event bisnisonlinebgs, testimoni, galeri',
            'registrasi' => 'daftar member, registrasi bisnisonlinebgs, jadi distributor',
            'register' => 'daftar member, registrasi online',
            'daftar' => 'cara daftar, gabung bisnisonlinebgs',
        ];
        if ($this->currentPage === 'home' && isset($sectionKeywords[$this->requestedPath])) {
            return $sectionKeywords[$this->requestedPath];
        }
        return $keywords[$this->currentPage] ?? $keywords['home'];
    }
    
    /**
     * Get section hash dari URL jika ada
     */
    public function getSectionHash() {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        if (strpos($uri, '#') !== false) {
            return '#' . explode('#', $uri)[1];
        }
        return '';
    }
}

// Initialize router
$router = new Router();
$currentPage = $router->route();
