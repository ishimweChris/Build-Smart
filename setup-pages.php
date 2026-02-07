<?php
/**
 * Build Smart - Setup Script
 * Run this once to set up initial pages and content
 */

// Create pages
$pages = array(
    array(
        'title' => 'Home',
        'slug' => 'home',
        'template' => 'front-page.php'
    ),
    array(
        'title' => 'About Us',
        'slug' => 'about',
        'content' => '<h2>About Build Smart Ltd</h2><p>Build Smart is a Rwanda-based company specializing in community-driven and affordable housing solutions...</p>'
    ),
    array(
        'title' => 'Services',
        'slug' => 'services',
        'content' => '<h2>Our Services</h2><p>We offer comprehensive construction and architecture services...</p>'
    ),
    array(
        'title' => 'Architecture & Urban Planning',
        'slug' => 'services/architecture',
        'parent' => 'services',
        'content' => '<h2>Architecture & Urban Planning</h2><p>Innovative and functional designs from concept to detailed drawings...</p>'
    ),
    array(
        'title' => 'Engineering & Technical Services',
        'slug' => 'services/engineering',
        'parent' => 'services',
        'content' => '<h2>Engineering & Technical Services</h2><p>Comprehensive civil and structural engineering services...</p>'
    ),
    array(
        'title' => 'Project Management & Construction',
        'slug' => 'services/project-management',
        'parent' => 'services',
        'content' => '<h2>Project Management & Construction</h2><p>End-to-end project oversight, including procurement...</p>'
    ),
    array(
        'title' => 'Community Engagement',
        'slug' => 'services/community-engagement',
        'parent' => 'services',
        'content' => '<h2>Community Engagement & Capacity Building</h2><p>Inclusive community engagement...</p>'
    ),
    array(
        'title' => 'Projects',
        'slug' => 'projects',
        'content' => '<h2>Our Projects</h2><p>View our portfolio of completed projects...</p>'
    ),
    array(
        'title' => 'Contact',
        'slug' => 'contact',
        'content' => '<h2>Get In Touch</h2><p>Contact us for your next project...</p>'
    ),
    array(
        'title' => 'Careers',
        'slug' => 'careers',
        'content' => '<h2>Join Our Team</h2><p>Explore career opportunities at Build Smart...</p>'
    ),
    array(
        'title' => 'Privacy Policy',
        'slug' => 'privacy-policy',
        'content' => '<h2>Privacy Policy</h2><p>Your privacy is important to us...</p>'
    ),
);

echo "Creating pages...\n";
foreach ($pages as $page) {
    $check = get_page_by_path($page['slug']);
    if (!$check) {
        $page_data = array(
            'post_title' => $page['title'],
            'post_name' => $page['slug'],
            'post_content' => isset($page['content']) ? $page['content'] : '',
            'post_status' => 'publish',
            'post_type' => 'page',
        );
        
        $page_id = wp_insert_post($page_data);
        echo "Created: {$page['title']}\n";
    }
}

echo "\nSetup complete!\n";
echo "Theme is ready. Go to Appearance > Themes and activate 'Build Smart'\n";
