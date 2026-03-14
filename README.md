# BisnisonlineBGS

Website responsive, SPA (Single Page Application), dan SEO optimized untuk bisnis online.

## Struktur Folder

```
bisnisonlinebgs-revamp/
├── .htaccess                   # Konfigurasi Local (localhost)
├── .htaccess-server            # Konfigurasi Produksi (www.bisnisonlinebgs.com)
├── router.php                  # Controller Routing
├── index.php                   # Main Template/Skeleton
├── assets/                     # Semua Static Assets
│   ├── css/
│   │   ├── style.css           # Main CSS
│   │   ├── mobile.css          # Device < 768px
│   │   ├── tablet.css          # Device 768px - 1024px
│   │   └── desktop.css         # Device > 1024px
│   ├── font/
│   │   └── font_proxima.ttf    # Default Font (perlu diunduh)
│   ├── images/                 # Semua file Gambar/Logo
│   ├── lang/
│   │   ├── lang_id.json        # Bahasa Indonesia
│   │   └── lang_en.json        # Bahasa Inggris
│   └── js/
│       └── app.js              # Logic SPA & Multilang
├── components/                 # Potongan Layout PHP
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
└── pages/                      # Isi Konten Halaman
    ├── home.php
    ├── about.php
    └── 404.php
```

## Teknologi yang Digunakan

- **HTML5** - Struktur semantic
- **CSS3** - Styling dengan CSS Variables
- **Bootstrap 5.3** - Framework CSS responsive
- **jQuery 3.7** - Library JavaScript
- **PHP** - Server-side rendering dan routing

## Fitur

### 1. Responsive Design
- **Mobile** (< 768px) - `mobile.css`
- **Tablet** (768px - 1024px) - `tablet.css`
- **Desktop** (> 1024px) - `desktop.css`

### 2. Multi-language Support
- Bahasa Indonesia (default)
- Bahasa Inggris
- Mudah menambahkan bahasa baru

### 3. SEO Optimized
- Meta tags lengkap
- Open Graph & Twitter Card
- Schema.org structured data
- Canonical URLs
- Alternate language links
- Semantic HTML

### 4. SPA (Single Page Application)
- Routing tanpa reload
- URL yang bersih (/home, /about)
- Loading overlay
- Animation transitions

## Instalasi

### Local Development (XAMPP)

1. Clone atau extract ke folder `htdocs`:
   ```
   C:\xampp_8.2.12\htdocs\bisnisonlinebgs-revamp\
   ```

2. Pastikan Apache memiliki `mod_rewrite` enabled

3. Akses via browser:
   ```
   http://localhost/bisnisonlinebgs-revamp/
   ```

### Production Server

1. Upload semua file ke root domain

2. Rename `.htaccess-server` menjadi `.htaccess`:
   ```bash
   mv .htaccess-server .htaccess
   ```

3. Pastikan Apache memiliki `mod_rewrite` enabled

4. Akses via domain:
   ```
   https://www.bisnisonlinebgs.com/
   ```

## Konfigurasi

### Mengganti Font

1. Download font yang diinginkan (format .ttf)
2. Letakkan di `assets/font/`
3. Update `style.css` pada bagian `@font-face`

### Menambahkan Bahasa Baru

1. Copy `assets/lang/lang_id.json`
2. Rename sesuai kode bahasa (misal: `lang_jp.json`)
3. Translate semua value
4. Update `app.js` pada `supportedLangs` array

### Menambahkan Halaman Baru

1. Buat file PHP baru di `pages/` (misal: `services.php`)
2. Tambahkan route di `router.php` pada `registerRoutes()`
3. Tambahkan link navigasi di `navbar.php`

## Asset yang Perlu Disiapkan

### Images
- `logo.png` - Logo utama (recommended: 180x50px)
- `logo-white.png` - Logo putih untuk footer
- `favicon.ico` - Favicon
- `og-image.jpg` - Open Graph image (1200x630px)
- Foto tim di `images/team/`
- Foto testimonial di `images/testimonials/`
- Logo klien di `images/clients/`

### Font
- `font_proxima.ttf` - Download dari sumber yang valid

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)
- Mobile browsers

## Performance Tips

1. Compress semua gambar
2. Gunakan format WebP untuk gambar
3. Enable GZIP compression (sudah dikonfigurasi di .htaccess)
4. Gunakan CDN untuk asset statis

## License

© 2024 BisnisonlineBGS. All rights reserved.
