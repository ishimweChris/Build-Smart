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
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-widget">
                <h3>Contact Us</h3>
                <p><strong>Address:</strong><br>KN 20 Ave, Kimisagara, Kigali<br>Rwanda</p>
                <p><strong>Phone:</strong><br>+250788537659</p>
                <p><strong>Email:</strong><br>buildsmart247@gmail.com</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Build Smart Ltd. All Rights Reserved. | <a href="<?php echo home_url('/privacy-policy'); ?>">Privacy Policy</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
