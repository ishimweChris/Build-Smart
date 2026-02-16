<?php
/**
 * Template Name: Services Page
 * Description: Displays all Build Smart services
 */

get_header();
?>

<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--spacing-lg);">
            <h1>What We Do</h1>
            <p style="max-width: 700px; margin: 0 auto; color: var(--text-gray);">
                Build Smart Ltd offers comprehensive construction, architecture, and engineering services tailored to meet the needs of our clients across Rwanda and the region.
            </p>
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
            
            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3>Real Estate Management & Property Maintenance</h3>
                <p>Comprehensive property management services including rental management, tenant coordination, preventive maintenance, and vendor oversight to maximize property value.</p>
                <a href="<?php echo home_url('/services/real-estate-management'); ?>" class="btn btn-outline" style="margin-top: 1rem;">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--primary-green); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white);">Need Our Services?</h2>
        <p style="font-size: 1.2rem; margin: var(--spacing-md) 0;">Let's discuss how Build Smart can help with your next project.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Contact Us Today</a>
    </div>
</section>

<?php get_footer(); ?>
