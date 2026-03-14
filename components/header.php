<?php
/**
 * Header Component
 * Untuk halaman dengan header terpisah (non-parallax pages)
 * Pada homepage parallax, header terintegrasi dengan navbar
 */

// Check if this is homepage (parallax), skip header
if ($currentPage === 'home') {
    return;
}
?>
<!-- Header Top Bar (untuk halaman non-parallax) -->
<header class="site-header">
    <div class="container">
        <div class="header-top">
            <!-- Contact Info -->
            <div class="header-contact">
                <a href="tel:+6221123456789" title="Hubungi Kami">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+62 21 1234 5678</span>
                </a>
                <a href="mailto:info@bisnisonlinebgs.com" title="Email Kami">
                    <i class="bi bi-envelope-fill"></i>
                    <span>info@bisnisonlinebgs.com</span>
                </a>
                <span class="header-hours d-none d-md-flex">
                    <i class="bi bi-clock-fill"></i>
                    <span data-lang-key="header.working_hours_value">Senin - Jumat: 09:00 - 17:00</span>
                </span>
            </div>
            
            <!-- Social Media & Language -->
            <div class="header-right d-flex align-items-center gap-3">
                <!-- Social Media Links -->
                <div class="header-social d-none d-sm-flex">
                    <a href="https://facebook.com/bisnisonlinebgs" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://instagram.com/bisnisonlinebgs" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                
                <!-- Language Switcher -->
                <div class="lang-switcher">
                    <button type="button" class="btn-lang <?php echo $currentLang === 'id' ? 'active' : ''; ?>" data-lang="id" title="Bahasa Indonesia">
                        ID
                    </button>
                    <button type="button" class="btn-lang <?php echo $currentLang === 'en' ? 'active' : ''; ?>" data-lang="en" title="English">
                        EN
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
