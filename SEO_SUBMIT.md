# Panduan Submit ke Google (Agar Cepat Terindex & Peringkat)

## 1. Google Search Console
1. Buka [Google Search Console](https://search.google.com/search-console)
2. Tambah properti: **https://www.bisnisonlinebgs.com**
3. Verifikasi kepemilikan (DNS TXT / file HTML / meta tag)
4. Di menu **Sitemap**: tambah URL  
   `https://www.bisnisonlinebgs.com/sitemap.xml`  
   lalu klik **Kirim**

## 2. Ping Sitemap (opsional)
Setelah deploy, ping agar crawler segera baca sitemap:
- https://www.google.com/ping?sitemap=https://www.bisnisonlinebgs.com/sitemap.xml  
- https://www.bing.com/ping?sitemap=https://www.bisnisonlinebgs.com/sitemap.xml  

## 3. URL Inspection (Submit per URL)
Di Search Console → **Periksa URL** → masukkan URL penting (beranda, profil, produk, registrasi) → **Minta pengindeksan**.

## 4. Yang Sudah Disediakan di Situs
- **sitemap.xml** – di-generate oleh `sitemap.php` (semua halaman canonical)
- **robots.txt** – mengizinkan crawl dan mengarahkan ke Sitemap
- **Meta title/description** – per section (profil, produk, bisnis, dll) untuk kata kunci
- **Canonical URL** – per section agar tidak duplikat
- **Schema.org** – Organization, WebSite, Product, BreadcrumbList
- **hreflang** – id/en di sitemap dan di head

## 5. Tips Peringkat
- Isi konten berkualitas (produk, testimoni, FAQ)
- Kecepatan situs (gambar lazy-load, cache sudah di .htaccess)
- Backlink dari situs terpercaya
- Update konten berkala; sitemap memakai `lastmod` otomatis
