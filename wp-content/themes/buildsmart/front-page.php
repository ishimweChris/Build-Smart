<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<!-- Hero Section with Background Slider -->
<section class="hero-section">
    <!-- Background Image Slider -->
    <div class="hero-slider">
        <?php
        // Get slider images from theme customizer
        $slider_images = buildsmart_get_hero_images();
        
        // If no custom images, use default placeholders
        if (empty($slider_images)) {
            // Default: Show gradient background only (no images yet)
            echo '<div class="hero-slide active" style="background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-green) 100%);"></div>';
        } else {
            foreach ($slider_images as $index => $image) {
                $active_class = ($index === 0) ? 'active' : '';
                echo '<div class="hero-slide ' . $active_class . '" style="background-image: url(' . esc_url($image) . ');"></div>';
            }
        }
        ?>
    </div>
    
    <!-- Gradient Overlay -->
    <div class="hero-overlay"></div>
    
    <!-- Content -->
    <div class="hero-content">
        <h1>Build Smart Ltd</h1>
        <p class="tagline">Think Smart. Build Smart</p>
        <p>Leading the way in community-driven and affordable housing solutions across Rwanda and beyond.</p>
        <div class="hero-buttons" style="margin-top: 2rem;">
            <a href="<?php echo home_url('/projects'); ?>" class="btn btn-primary">View Our Projects</a>
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Get In Touch</a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--spacing-lg);">
            <h2>What We Do</h2>
            <p style="color: var(--primary-green); font-size: 1.2rem;">Our Services</p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🏗️</div>
                <h3>Architecture & Urban Planning</h3>
                <p>Innovative and functional designs from concept to detailed drawings, including renderings and landscape solutions.</p>
                <a href="<?php echo home_url('/services/architecture'); ?>" class="btn btn-outline" style="margin-top: 1rem;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">⚙️</div>
                <h3>Engineering & Technical Services</h3>
                <p>Comprehensive civil and structural engineering services with accurate technical and quantity assessments.</p>
                <a href="<?php echo home_url('/services/engineering'); ?>" class="btn btn-outline" style="margin-top: 1rem;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Project Management & Construction</h3>
                <p>End-to-end project oversight, including procurement, construction, supervision, and quality control.</p>
                <a href="<?php echo home_url('/services/project-management'); ?>" class="btn btn-outline" style="margin-top: 1rem;">Learn More</a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">👥</div>
                <h3>Community Engagement & Capacity Building</h3>
                <p>Inclusive community engagement, socio-economic assessments, and tailored training programs.</p>
                <a href="<?php echo home_url('/services/community-engagement'); ?>" class="btn btn-outline" style="margin-top: 1rem;">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--spacing-lg);">
            <h2>Our Projects</h2>
            <p style="color: var(--primary-green); font-size: 1.2rem;">Building Communities, Creating Impact</p>
        </div>
        
        <div class="portfolio-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $location = get_post_meta(get_the_ID(), '_project_location', true);
                    ?>
                    <div class="project-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('project-thumbnail'); ?>
                        <?php else : ?>
                            <img src="https://via.placeholder.com/600x400/3CAF50/ffffff?text=Project+Image" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="project-overlay">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo $location ? $location : 'Kigali, Rwanda'; ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="margin-top: 1rem;">View Details</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder projects
                for ($i = 1; $i <= 3; $i++) :
                    ?>
                    <div class="project-card">
                        <img src="https://via.placeholder.com/600x400/3CAF50/ffffff?text=Project+<?php echo $i; ?>" alt="Project <?php echo $i; ?>">
                        <div class="project-overlay">
                            <h3>Sample Project <?php echo $i; ?></h3>
                            <p>Kigali, Rwanda</p>
                        </div>
                    </div>
                    <?php
                endfor;
            endif;
            ?>
        </div>
        
        <div style="text-align: center; margin-top: var(--spacing-lg);">
            <a href="<?php echo home_url('/projects'); ?>" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section" style="background: var(--dark-navy); color: var(--white);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg); align-items: center;">
            <div>
                <h2 style="color: var(--white);">About Build Smart</h2>
                <p style="color: var(--primary-green); font-size: 1.2rem; margin-bottom: var(--spacing-md);">Think Smart. Build Smart</p>
                <p style="color: rgba(255,255,255,0.9);">Build Smart is a Rwanda-based company specializing in community-driven and affordable housing solutions. Drawing on over a decade of regional experience from our team across Rwanda, Burundi, and the Democratic Republic of the Congo (South Kivu), our multidisciplinary team brings strong local insight, practical field experience, and time-tested partnerships to every project.</p>
                <div style="margin-top: var(--spacing-md);">
                    <a href="<?php echo home_url('/about'); ?>" class="btn btn-primary">Learn More About Us</a>
                </div>
            </div>
            <div>
                <div style="background: var(--primary-green); padding: var(--spacing-md); border-radius: 10px;">
                    <h3 style="color: var(--white); margin-bottom: var(--spacing-md);">Our Vision</h3>
                    <p style="color: var(--white);">To enable resilient, inclusive, and sustainable communities through innovative and affordable built-environment solutions.</p>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: var(--spacing-md); border-radius: 10px; margin-top: var(--spacing-md);">
                    <h3 style="color: var(--white); margin-bottom: var(--spacing-md);">Our Mission</h3>
                    <p style="color: var(--white);">To plan, design, and construct affordable, sustainable, and community-driven housing and infrastructure projects that meet the highest technical and regulatory standards.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--primary-green); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white);">Ready to Start Your Project?</h2>
        <p style="font-size: 1.2rem; margin: var(--spacing-md) 0;">Let's build something amazing together. Contact us today for a consultation.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Get In Touch</a>
    </div>
</section>

<?php get_footer(); ?>
