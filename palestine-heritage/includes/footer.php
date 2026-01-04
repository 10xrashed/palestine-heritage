<?php
try {
    $db = Database::getInstance()->getConnection();
    $statsStmt = $db->query("SELECT COUNT(*) as total FROM supporters WHERE status = 'completed'");
    $totalSupporters = $statsStmt->fetch()['total'];
} catch (Exception $e) {
    $totalSupporters = 0;
}
?>
    <footer class="footer-section">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="footer-brand">
                            <div class="brand-flag">
                                <div class="mini-flag">
                                    <div class="mini-stripe black"></div>
                                    <div class="mini-stripe white"></div>
                                    <div class="mini-stripe green"></div>
                                    <div class="mini-triangle red"></div>
                                </div>
                                <span class="brand-text"><?php echo SITE_NAME; ?></span>
                            </div>
                            <p class="footer-description">
                                Preserving and sharing the rich history and culture of Palestine 
                                for current and future generations.
                            </p>
                            <div class="footer-stats">
                                <div class="stat-badge">
                                    <i class="fas fa-users"></i>
                                    <span><?php echo number_format($totalSupporters); ?>+ Supporters</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-links">
                            <h5>Explore</h5>
                            <ul>
                                <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
                                <li><a href="gaza.php"><i class="fas fa-angle-right"></i> Gaza</a></li>
                                <li><a href="gallery.php"><i class="fas fa-angle-right"></i> Gallery</a></li>
                                <li><a href="support.php"><i class="fas fa-angle-right"></i> Support</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-links">
                            <h5>Community</h5>
                            <ul>
                                <li><a href="supporters.php"><i class="fas fa-angle-right"></i> Our Supporters</a></li>
                                <li><a href="support.php#volunteer"><i class="fas fa-angle-right"></i> Volunteer</a></li>
                                <li><a href="support.php#advocacy"><i class="fas fa-angle-right"></i> Advocacy</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-newsletter">
                            <h5>Stay Connected</h5>
                            <p>Subscribe to receive updates about Palestinian heritage and culture.</p>
                            <form class="newsletter-form" id="footerNewsletterForm">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Your email" required>
                                    <button class="btn btn-palestine-primary" type="submit">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="copyright">
                            © <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. Made with <i class="fas fa-heart text-red"></i> for Palestine.
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-links-inline">
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                            <a href="#">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="alertToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-info-circle me-2"></i>
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
        const csrfToken = '<?php echo $csrfToken; ?>';
        function showToast(message, type = 'info') {
            const toast = document.getElementById('alertToast');
            const toastBody = toast.querySelector('.toast-body');
            const toastHeader = toast.querySelector('.toast-header');
            const icon = toastHeader.querySelector('i');
            icon.className = `fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2`;
            toastBody.textContent = message;
            toast.className = `toast bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} text-white`;
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        }
        document.getElementById('footerNewsletterForm')?.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const formData = new FormData();
            formData.append('email', email);
            
            try {
                const response = await fetch('api/subscribe-newsletter.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    showToast(result.message, 'success');
                    this.reset();
                } else {
                    showToast(result.message, 'error');
                }
            } catch (error) {
                showToast('An error occurred. Please try again.', 'error');
            }
        });
    </script>
    
    <script src="assets/js/main.js"></script>
    
    <?php if (isset($additionalScripts)): ?>
        <?php echo $additionalScripts; ?>
    <?php endif; ?>
</body>
</html>
