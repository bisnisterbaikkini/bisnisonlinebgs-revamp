<?php
/**
 * Sitemap XML untuk Google & Mesin Pencari
 * BisnisonlineBGS - URL dinamis sesuai environment
 */

// Deteksi BASE_URL tanpa load full router
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
if (strpos($host, 'bisnisonlinebgs.com') !== false) {
    $baseUrl = 'https://www.bisnisonlinebgs.com';
} else {
    $baseUrl = 'http://' . $host . '/bisnisonlinebgs-revamp';
}

// URL halaman yang di-index (canonical, satu konten per URL)
$urls = [
    ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'daily'],
    ['loc' => $baseUrl . '/beranda', 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/profil', 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/produk', 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/bisnis', 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/media', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/registrasi', 'priority' => '0.95', 'changefreq' => 'weekly'],
];

$lastmod = date('c');

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php foreach ($urls as $u): ?>
  <url>
    <loc><?php echo htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8'); ?></loc>
    <lastmod><?php echo $lastmod; ?></lastmod>
    <changefreq><?php echo $u['changefreq']; ?></changefreq>
    <priority><?php echo $u['priority']; ?></priority>
    <xhtml:link rel="alternate" hreflang="id" href="<?php echo htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8'); ?>?lang=id"/>
    <xhtml:link rel="alternate" hreflang="en" href="<?php echo htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8'); ?>?lang=en"/>
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8'); ?>"/>
  </url>
<?php endforeach; ?>
</urlset>
