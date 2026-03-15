# BisnisonlineBGS

Website responsive, SPA (Single Page Application), dan SEO optimized untuk bisnis online. Proyek ini telah dioptimasi untuk performa maksimal dengan sistem pemuatan lazy load yang sinkron dengan efek parallax.

## Struktur Folder

```
bisnisonlinebgs-revamp/
├── .htaccess                   # Konfigurasi Local (localhost)
├── .htaccess-server            # Konfigurasi Produksi (www.bisnisonlinebgs.com)
├── sw.js                       # Service Worker (PWA & Offline Caching)
├── router.php                  # Controller Routing & Versioning
├── index.php                   # Main Template/Skeleton
├── assets/                     # Semua Static Assets
│   ├── css/
│   │   ├── style.css           # Main CSS (Optimized)
│   │   ├── mobile.css          # Device < 768px
│   │   ├── tablet.css          # Device 768px - 1024px
│   │   └── desktop.css         # Device > 1024px
│   ├── font/
│   │   └── proximanova.woff    # Default Font
│   ├── images/                 # Semua file Gambar/Logo
│   ├── lang/
│   │   ├── lang_id.json        # Bahasa Indonesia
│   │   └── lang_en.json        # Bahasa Inggris
│   └── js/
│       └── app.js              # Logic SPA, Parallax, & Lazy Load
├── components/                 # Potongan Layout PHP
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
└── pages/                      # Isi Konten Halaman
    ├── home.php
    └── 404.php
```

## Teknologi yang Digunakan

- **HTML5** - Struktur semantic
- **CSS3** - Styling dengan CSS Variables & Hardware Acceleration
- **Bootstrap 5.3** - Framework CSS responsive
- **jQuery 3.7** - Library JavaScript
- **PHP** - Server-side rendering dan routing
- **Service Worker (PWA)** - Offline capability & caching strategi
- **Intersection Observer API** - Efisiensi pemuatan konten (Lazy Load)

## Fitur Utama

### 1. Optimized Parallax & Lazy Load
- **Sync Loading**: Efek parallax secara otomatis menyesuaikan posisi (*re-calculate offset*) saat konten baru selesai dimuat (*lazy loaded*).
- **Background Lazy Load**: Mendukung pemuatan lazy untuk gambar latar belakang (`data-bg-desktop` & `data-bg-mobile`) dengan transisi *fade-in*.
- **CPU Efficient**: Menggunakan sistem caching offset untuk mengurangi beban kalkulasi saat scrolling.

### 2. PWA & Offline Support
- **Service Worker**: Menyimpan aset statis ke dalam cache browser untuk akses instan pada kunjungan berikutnya.
- **Save Data Protocol**: Mengurangi penggunaan data seluler dengan memprioritaskan cache untuk aset yang jarang berubah.

### 3. Automatic Cache Busting
- **Versioning**: Menggunakan sistem versi terpusat (`APP_VERSION`) untuk memastikan user selalu mendapatkan file CSS/JS terbaru tanpa perlu "Clear Cache" manual.
- **Smart Update**: Service Worker akan mendeteksi perubahan versi secara otomatis di latar belakang.

### 4. SEO Optimized
- Meta tags lengkap, Open Graph, Twitter Card, & Schema.org.
- Canonical URLs & Alternate language links.

## Instalasi

### Local Development (XAMPP)
1. Clone atau extract ke folder `htdocs`: `C:\xampp_8.2.12\htdocs\bisnisonlinebgs-revamp\`
2. Pastikan Apache memiliki `mod_rewrite` enabled.
3. Akses via browser: `http://localhost/bisnisonlinebgs-revamp/`

### Production Server
1. Upload semua file ke root domain.
2. Rename `.htaccess-server` menjadi `.htaccess`.

## Konfigurasi & Pemeliharaan

### Melakukan Update Konten (Update CSS/JS)
Jika Anda melakukan perubahan pada file CSS atau JavaScript, ikuti langkah ini agar user langsung mendapatkan update:
1. Buka `router.php`, ubah nilai `APP_VERSION` (misal dari `1.0.5` ke `1.0.6`).
2. Buka `sw.js`, ubah nilai `VERSION` ke angka yang sama (`1.0.6`).
3. Browser user akan secara otomatis membuang cache lama dan mengunduh versi terbaru.

### Menambahkan Gambar Lazy
Untuk gambar biasa:
```html
<img data-src="path/image.jpg" class="lazy-load" alt="...">
```
Untuk background parallax:
```html
<div class="section-parallax-bg" 
     data-bg-desktop="desktop.jpg" 
     data-bg-mobile="mobile.jpg">
</div>
```

## Performa
1. **LCP Optimization**: Banner utama menggunakan `preload` di `index.php`.
2. **GZIP & Caching**: Konfigurasi `.htaccess` mengatur kompresi dan masa berlaku cache browser secara optimal.
3. **WebP**: Sangat disarankan menggunakan format WebP untuk semua aset gambar.

## License
© 2024 BisnisonlineBGS. All rights reserved.
