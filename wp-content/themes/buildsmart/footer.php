</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <!-- About Widget -->
            <div class="footer-widget">
                <h3>About Build Smart</h3>
                <p>A Rwanda-based company specializing in community-driven and affordable housing solutions. We deliver end-to-end services from planning and design to engineering and construction.</p>
                <p><strong style="color: var(--primary-green);">Think Smart. Build Smart</strong></p>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-widget">
                <h3>Quick Links</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </div>
            
            <!-- Services -->
            <div class="footer-widget">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="<?php echo home_url('/services/architecture'); ?>">Architecture & Urban Planning</a></li>
                    <li><a href="<?php echo home_url('/services/engineering'); ?>">Engineering & Technical Services</a></li>
                    <li><a href="<?php echo home_url('/services/project-management'); ?>">Project Management</a></li>
                    <li><a href="<?php echo home_url('/services/community-engagement'); ?>">Community Engagement</a></li>
                    <li><a href="<?php echo home_url('/services/real-estate-management'); ?>">Real Estate Management</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-widget">
                <h3>Contact Us</h3>
                <p><strong>Address:</strong><br>KN 20 Ave, Kimisagara, Kigali<br>Rwanda</p>
                <p><strong>Phone:</strong><br><a href="https://wa.me/250788537659" target="_blank" rel="noopener">+250 788 537 659</a></p>
                <p><strong>Email:</strong><br><a href="mailto:info@buildsmartrw.com">info@buildsmartrw.com</a></p>
                <div class="footer-social">
                    <a href="https://x.com/BuildSmartrw" target="_blank" rel="noopener">Twitter</a>
                    <a href="https://www.linkedin.com/company/build-smart-experts/" target="_blank" rel="noopener">LinkedIn</a>
                    <a href="https://www.instagram.com/buildsmartrw/" target="_blank" rel="noopener">Instagram</a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Build Smart Ltd. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
