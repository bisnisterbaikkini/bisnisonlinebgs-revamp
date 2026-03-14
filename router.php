<?php
/**
 * Router.php - Controller Routing untuk BisnisonlineBGS
 * Single Page Application dengan Parallax Navigation
 */

class Router {
    private $routes = [];
    private $basePath = '';
    private $currentPage = '';
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
            define('BASE_URL', 'https://www.bisnisonlinebgs.com');
        } else {
            $this->basePath = '/bisnisonlinebgs-revamp/';
            define('IS_PRODUCTION', false);
            define('BASE_URL', 'http://localhost/bisnisonlinebgs-revamp');
        }
        
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
        } else if (!empty($requestedPage) && preg_match('/^[a-zA-Z0-9_-]+$/', $requestedPage)) {
            // Jika bukan route terdaftar, anggap sebagai affiliate dan arahkan ke home
            $this->currentPage = 'home';
            $this->affiliateName = $requestedPage;
        } else {
            $this->currentPage = '404';
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
     * Generate asset URL
     */
    public static function asset($path) {
        return BASE_URL . '/assets/' . ltrim($path, '/');
    }
    
    /**
     * Check if current page matches
     */
    public function isPage($page) {
        return $this->currentPage === $page;
    }
    
    /**
     * Get page title berdasarkan halaman
     */
    public function getPageTitle() {
        $titles = [
            'home' => 'Beranda',
            '404'  => 'Halaman Tidak Ditemukan'
        ];
        
        return $titles[$this->currentPage] ?? 'BisnisonlineBGS';
    }
    
    /**
     * Get meta description berdasarkan halaman
     */
    public function getMetaDescription() {
        $descriptions = [
            'home' => 'BisnisonlineBGS - Perusahaan kesehatan dan kecantikan terpercaya dengan produk Apple Stemcell berkualitas premium. Raih kesehatan optimal dan peluang bisnis menguntungkan bersama kami.',
            '404'  => 'Halaman tidak ditemukan - BisnisonlineBGS'
        ];
        
        return $descriptions[$this->currentPage] ?? $descriptions['home'];
    }
    
    /**
     * Get meta keywords berdasarkan halaman
     */
    public function getMetaKeywords() {
        $keywords = [
            'home' => 'bisnisonlinebgs, apple stemcell, suplemen kesehatan, anti aging, bisnis mlm, peluang usaha, produk kecantikan, stem cell indonesia, kesehatan kulit, awet muda',
            '404'  => 'halaman tidak ditemukan, error 404'
        ];
        
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
