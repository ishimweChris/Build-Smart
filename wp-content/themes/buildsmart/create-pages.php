<?php
/**
 * Build Smart - Automatic Page Creator
 * Place this in wp-content/themes/buildsmart/ and access via browser:
 * http://localhost/build/wp-content/themes/buildsmart/create-pages.php
 * 
 * OR run from command line in the build directory:
 * php -r "define('WP_USE_THEMES', false); require('./wp-load.php'); include('./wp-content/themes/buildsmart/create-pages.php');"
 */

// Load WordPress
if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

// Pages to create
$pages = array(
    array(
        'title' => 'About Us',
        'slug' => 'about',
        'content' => '<h2>About Build Smart Ltd</h2>
        <p><strong style="color: #3CAF50;">Think Smart. Build Smart</strong></p>
        
        <p>Build Smart is a Rwanda-based company specializing in community-driven and affordable housing solutions. Drawing on over a decade of regional experience from our team across Rwanda, Burundi, and the Democratic Republic of the Congo (South Kivu), our multidisciplinary team brings strong local insight, practical field experience, and time-tested partnerships to every project.</p>
        
        <p>We support a diverse portfolio of donor-funded and private sector initiatives, delivering end-to-end services from planning and design to engineering, technical advisory, and project implementation. Guided by innovation, sustainability, and impact, Build Smart is committed to fostering resilient communities and inclusive development in Rwanda and beyond.</p>
        
        <h3 style="color: #3CAF50;">Our Vision</h3>
        <p>To enable resilient, inclusive, and sustainable communities through innovative and affordable built-environment solutions.</p>
        
        <h3 style="color: #3CAF50;">Our Mission</h3>
        <p>To plan, design, and construct affordable, sustainable, and community-driven housing and infrastructure projects that meet the highest technical and regulatory standards. By leveraging strong local partnerships, Build Smart delivers quality, durable, and impactful built-environment solutions that strengthen communities and drive inclusive development in Rwanda and the region.</p>'
    ),
    array(
        'title' => 'Services',
        'slug' => 'services',
        'content' => '<h2>What We Do</h2>
        <p style="color: #3CAF50; font-size: 1.2rem;">Our Services</p>
        
        <p>Build Smart Ltd offers comprehensive construction, architecture, and engineering services tailored to meet the needs of our clients across Rwanda and the region.</p>
        
        <div class="services-grid">
            <div class="service-card">
                <h3>Architecture & Urban Planning</h3>
                <p>Innovative and functional designs from concept to detailed drawings, including renderings and landscape solutions.</p>
                <a href="/services/architecture" class="btn btn-outline">Learn More</a>
            </div>
            
            <div class="service-card">
                <h3>Engineering & Technical Services</h3>
                <p>Comprehensive civil and structural engineering services with accurate technical and quantity assessments.</p>
                <a href="/services/engineering" class="btn btn-outline">Learn More</a>
            </div>
            
            <div class="service-card">
                <h3>Project Management & Construction</h3>
                <p>End-to-end project oversight, including procurement, construction, supervision, and quality control.</p>
                <a href="/services/project-management" class="btn btn-outline">Learn More</a>
            </div>
            
            <div class="service-card">
                <h3>Community Engagement & Capacity Building</h3>
                <p>Inclusive community engagement, socio-economic assessments, and tailored training programs.</p>
                <a href="/services/community-engagement" class="btn btn-outline">Learn More</a>
            </div>
            
            <div class="service-card">
                <h3>Real Estate Management & Property Maintenance</h3>
                <p>Comprehensive property management including rental management, tenant coordination, and preventive maintenance.</p>
                <a href="/services/real-estate-management" class="btn btn-outline">Learn More</a>
            </div>
        </div>'
    ),
    array(
        'title' => 'Architecture & Urban Planning',
        'slug' => 'architecture',
        'parent' => 'Services',
        'content' => '<h2>Architecture & Urban Planning</h2>
        
        <p>At Build Smart, we deliver innovative and functional architectural designs that blend creativity with practicality. Our services encompass the entire design process—from initial concepts to detailed construction drawings, 3D renderings, and landscape solutions.</p>
        
        <h3>Our Approach</h3>
        <ul>
            <li>Comprehensive site analysis and feasibility studies</li>
            <li>Conceptual and schematic design development</li>
            <li>Detailed architectural drawings and specifications</li>
            <li>3D visualizations and photorealistic renderings</li>
            <li>Landscape architecture and urban design</li>
            <li>Sustainable and eco-friendly design solutions</li>
        </ul>
        
        <p>We believe in creating spaces that are not only aesthetically pleasing but also sustainable, functional, and tailored to the unique needs of each community we serve.</p>
        
        <a href="/contact" class="btn btn-primary">Contact Us</a>'
    ),
    array(
        'title' => 'Engineering & Technical Services',
        'slug' => 'engineering',
        'parent' => 'Services',
        'content' => '<h2>Engineering & Technical Services</h2>
        
        <p>Our engineering team provides comprehensive civil and structural engineering services backed by rigorous technical analysis and quality assurance.</p>
        
        <h3>Services Include</h3>
        <ul>
            <li>Structural design and analysis</li>
            <li>Civil engineering and infrastructure design</li>
            <li>Geotechnical investigations and assessments</li>
            <li>Quantity surveying and cost estimation</li>
            <li>Technical specifications and documentation</li>
            <li>Building code compliance and regulatory approvals</li>
        </ul>
        
        <p>We ensure that every project meets the highest technical and regulatory standards while optimizing cost-effectiveness and construction efficiency.</p>
        
        <a href="/contact" class="btn btn-primary">Contact Us</a>'
    ),
    array(
        'title' => 'Project Management & Construction',
        'slug' => 'project-management',
        'parent' => 'Services',
        'content' => '<h2>Project Management & Construction</h2>
        
        <p>Build Smart offers end-to-end project management services, ensuring projects are delivered on time, within budget, and to the highest quality standards.</p>
        
        <h3>Our Services</h3>
        <ul>
            <li>Project planning and scheduling</li>
            <li>Procurement and contract management</li>
            <li>Construction supervision and quality control</li>
            <li>Site management and safety oversight</li>
            <li>Progress monitoring and reporting</li>
            <li>Commissioning and handover</li>
        </ul>
        
        <p>From groundbreaking to final handover, we manage every aspect of your construction project with professionalism and precision.</p>
        
        <a href="/contact" class="btn btn-primary">Contact Us</a>'
    ),
    array(
        'title' => 'Community Engagement & Capacity Building',
        'slug' => 'community-engagement',
        'parent' => 'Services',
        'content' => '<h2>Community Engagement & Capacity Building</h2>
        
        <p>We believe successful projects require meaningful community participation and local capacity development.</p>
        
        <h3>What We Offer</h3>
        <ul>
            <li>Stakeholder consultation and engagement</li>
            <li>Socio-economic impact assessments</li>
            <li>Community needs analysis</li>
            <li>Training and skills development programs</li>
            <li>Local workforce capacity building</li>
            <li>Participatory planning workshops</li>
        </ul>
        
        <p>Our community-centered approach ensures that projects deliver lasting social and economic benefits to the communities we serve.</p>
        
        <a href="/contact" class="btn btn-primary">Contact Us</a>'
    ),
    array(
        'title' => 'Real Estate Management & Property Maintenance',
        'slug' => 'real-estate-management',
        'parent' => 'Services',
        'content' => '<h2>Real Estate Management & Property Maintenance</h2>
        
        <p>We now offer comprehensive real estate management services designed to protect, maintain, and maximize the value of your property. Our approach goes beyond traditional rental management — we provide both operational oversight and hands-on maintenance support to ensure your asset remains in excellent condition and delivers long-term returns.</p>
        
        <h3>Rental Management</h3>
        <ul>
            <li>Tenant sourcing and screening</li>
            <li>Lease administration and renewals</li>
            <li>Rent collection and financial reporting</li>
            <li>Occupancy and performance monitoring</li>
            <li>Coordination with tenants and stakeholders</li>
        </ul>
        
        <h3>Property Maintenance</h3>
        <ul>
            <li>Preventive and corrective maintenance planning</li>
            <li>Supervision of repairs and technical works</li>
            <li>Vendor and contractor coordination</li>
            <li>Regular property inspections</li>
            <li>Rapid response to maintenance requests</li>
        </ul>
        
        <p>Whether your property is residential, hospitality, or mixed-use, we ensure it is professionally managed, well-maintained, and operating efficiently. Our goal is to reduce your operational burden while preserving and enhancing the value of your investment.</p>
        
        <a href="/contact" class="btn btn-primary">Contact Us</a>'
    ),
    array(
        'title' => 'Contact',
        'slug' => 'contact',
        'content' => '<h2>Get In Touch</h2>
        <p>Ready to start your next project? Contact Build Smart Ltd today.</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin: 2rem 0;">
            <div>
                <h3>Contact Information</h3>
                <p><strong>📍 Address:</strong><br>KN 20 Ave, Kimisagara<br>Kigali, Rwanda</p>
                <p><strong>📞 Phone:</strong><br>+250788537659</p>
                <p><strong>✉️ Email:</strong><br>buildsmart247@gmail.com</p>
                
                <h3 style="margin-top: 2rem;">Office Hours</h3>
                <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: Closed</p>
            </div>
            
            <div>
                <h3>Send Us a Message</h3>
                [contact-form-7 id="1" title="Contact form 1"]
                
                <p style="margin-top: 2rem;"><em>We typically respond within 24 hours during business days.</em></p>
            </div>
        </div>'
    ),
    array(
        'title' => 'Careers',
        'slug' => 'careers',
        'content' => '<h2>Join Our Team</h2>
        <p style="color: #3CAF50; font-size: 1.2rem;">Build Your Career with Build Smart</p>
        
        <p>At Build Smart, we are always looking for talented, passionate professionals who share our commitment to innovation, sustainability, and community impact.</p>
        
        <h3>Why Work With Us?</h3>
        <ul>
            <li>Work on meaningful projects that impact communities</li>
            <li>Collaborative and innovative work environment</li>
            <li>Professional development opportunities</li>
            <li>Competitive compensation and benefits</li>
            <li>Diverse and inclusive workplace culture</li>
        </ul>
        
        <h3>Current Openings</h3>
        <p>Check back soon for current job opportunities, or send your CV to <strong>buildsmart247@gmail.com</strong> for future consideration.</p>
        
        <h3>Application Process</h3>
        <p>To apply, please submit your CV and cover letter to <strong>buildsmart247@gmail.com</strong> with the position title in the subject line.</p>'
    ),
    array(
        'title' => 'Blog',
        'slug' => 'blog',
        'content' => '<h2>Blog & News</h2>
        <p>Stay updated with the latest news, insights, and updates from Build Smart Ltd.</p>'
    ),
    array(
        'title' => 'Privacy Policy',
        'slug' => 'privacy-policy',
        'content' => '<h2>Privacy Policy</h2>
        <p><em>Last updated: January 30, 2026</em></p>
        
        <h3>Introduction</h3>
        <p>Build Smart Ltd ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>
        
        <h3>Information We Collect</h3>
        <p>We may collect information about you in various ways, including:</p>
        <ul>
            <li>Personal Data: Name, email address, phone number, and other contact information you provide</li>
            <li>Usage Data: Information about how you use our website</li>
        </ul>
        
        <h3>How We Use Your Information</h3>
        <p>We use the information we collect to:</p>
        <ul>
            <li>Respond to your inquiries and fulfill your requests</li>
            <li>Send you marketing communications (with your consent)</li>
            <li>Improve our website and services</li>
        </ul>
        
        <h3>Contact Us</h3>
        <p>If you have questions about this Privacy Policy, please contact us at:<br>
        <strong>Email:</strong> buildsmart247@gmail.com<br>
        <strong>Phone:</strong> +250788537659</p>'
    ),
);

echo "<h1>Build Smart - Page Creator</h1>";
echo "<p>Creating pages...</p><br>";

$created_count = 0;
$skipped_count = 0;

foreach ($pages as $page_data) {
    // Check if page already exists
    $existing_page = get_page_by_path($page_data['slug']);
    
    if ($existing_page) {
        echo "⏭️ Skipped: <strong>{$page_data['title']}</strong> (already exists)<br>";
        $skipped_count++;
        continue;
    }
    
    // Get parent ID if specified
    $parent_id = 0;
    if (isset($page_data['parent'])) {
        $parent_page = get_page_by_title($page_data['parent']);
        if ($parent_page) {
            $parent_id = $parent_page->ID;
        }
    }
    
    // Create page
    $new_page = array(
        'post_title'    => $page_data['title'],
        'post_name'     => $page_data['slug'],
        'post_content'  => $page_data['content'],
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'post_parent'   => $parent_id,
        'post_author'   => 1,
    );
    
    $page_id = wp_insert_post($new_page);
    
    if ($page_id) {
        echo "✅ Created: <strong>{$page_data['title']}</strong> (ID: {$page_id})<br>";
        $created_count++;
    } else {
        echo "❌ Failed: <strong>{$page_data['title']}</strong><br>";
    }
}

echo "<br><hr><br>";
echo "<h2>Summary</h2>";
echo "<p>✅ Created: <strong>{$created_count}</strong> pages<br>";
echo "⏭️ Skipped: <strong>{$skipped_count}</strong> pages (already exist)<br>";
echo "📄 Total: <strong>" . count($pages) . "</strong> pages processed</p>";

echo "<br><h2>Next Steps:</h2>";
echo "<ol>";
echo "<li>Go to <strong>Settings → Reading</strong></li>";
echo "<li>Select 'A static page' for homepage</li>";
echo "<li>Choose 'Home' as front page (you need to create it first or it should use front-page.php automatically)</li>";
echo "<li>Choose 'Blog' as posts page</li>";
echo "<li>Go to <strong>Appearance → Menus</strong> to set up navigation</li>";
echo "</ol>";

echo "<br><a href='/build/wp-admin' style='display: inline-block; padding: 10px 20px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>Go to Dashboard</a>";
