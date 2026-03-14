<?php
/**
 * Footer Component - Modern Premium Footer
 * Footer dengan info perusahaan, links navigasi, dan katalog produk
 */
?>
<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <!-- Brand & About -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget brand-widget">
                        <a href="<?php echo Router::url(); ?>" class="footer-logo">
                            <img src="<?php echo Router::asset('images/logo-full-text.png'); ?>" alt="BisnisonlineBGS" class="img-fluid footer-logo-img">
                        </a>
                        <p class="footer-about" data-lang-key="footer.about">
                            Pionir dalam menghadirkan solusi kesehatan dan kecantikan berbasis teknologi Stem Cell Apel Swiss. Kami berkomitmen memberdayakan individu melalui produk premium dan peluang bisnis digital yang inovatif.
                        </p>
                        <div class="social-links-modern">
                            <a href="#" class="social-link" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="social-link" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="social-link" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                            <a href="#" class="social-link" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="footer-widget">
                        <h5 class="widget-title" data-lang-key="footer.menu_title">Menu Utama</h5>
                        <ul class="footer-menu">
                            <li><a href="#beranda" class="scroll-link" data-lang-key="nav.home">Beranda</a></li>
                            <li><a href="#profil" class="scroll-link" data-lang-key="nav.about">Profil Perusahaan</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="nav.products">Katalog Produk</a></li>
                            <li><a href="#bisnis" class="scroll-link" data-lang-key="nav.business">Peluang Bisnis</a></li>
                            <li><a href="#media" class="scroll-link" data-lang-key="nav.media">Media & Event</a></li>
                            <li><a href="#registrasi" class="scroll-link" data-lang-key="nav.register">Registrasi</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Featured Products -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="footer-widget">
                        <h5 class="widget-title" data-lang-key="footer.products_title">Produk Unggulan</h5>
                        <ul class="footer-menu">
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.nad_boost">Bio NAD+ Boost</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.applesc_plus">AppleSC Plus</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.sc_mild">Bio SC Mild</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.sc_gold">Bio SC Gold</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.inflavia">Bio Inflavia</a></li>
                            <li><a href="#produk" class="scroll-link" data-lang-key="product_names.rawgenic">Bio Rawgenic</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5 class="widget-title" data-lang-key="footer.contact_title">Hubungi Kami</h5>
                        <ul class="footer-contact-list">
                            <li>
                                <div class="contact-icon"><i class="bi bi-geo-alt"></i></div>
                                <div class="contact-info">
                                    <span data-lang-key="footer.office">Kantor Pusat:</span>
                                    <p data-lang-key="footer.address">Gedung Biogreen Science, Jakarta Selatan, Indonesia</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="bi bi-whatsapp"></i></div>
                                <div class="contact-info">
                                    <span data-lang-key="footer.wa_support">WhatsApp Support:</span>
                                    <a href="https://wa.me/6281234567890">+62 812 3456 7890</a>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="bi bi-envelope"></i></div>
                                <div class="contact-info">
                                    <span data-lang-key="footer.email_official">Email Official:</span>
                                    <a href="mailto:info@bisnisonlinebgs.com">info@bisnisonlinebgs.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wrapper">
                <div class="copyright-text">
                    &copy; <?php echo date('Y'); ?> <strong>BisnisonlineBGS</strong>. <span data-lang-key="footer.all_rights">All Rights Reserved.</span>
                </div>
                <div class="footer-legal">
                    <a href="#" data-lang-key="footer.privacy">Privacy Policy</a>
                    <span class="dot"></span>
                    <a href="#" data-lang-key="footer.terms">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

