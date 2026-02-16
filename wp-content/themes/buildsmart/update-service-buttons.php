<?php
/**
 * Update Service Page Buttons to "Contact Us"
 * Access: http://localhost/build/wp-content/themes/buildsmart/update-service-buttons.php
 */

// Load WordPress
if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>🔄 Update Service Page Buttons</h1>";
echo "<p>Updating all service page buttons to say 'Contact Us' and link to /contact...</p><br>";

$services = array(
    'architecture' => array(
        'old_buttons' => array('Discuss Your Project', 'Request a Quote', 'Get Started'),
        'title' => 'Architecture & Urban Planning'
    ),
    'engineering' => array(
        'old_buttons' => array('Request a Consultation', 'Get a Quote', 'Contact Us'),
        'title' => 'Engineering & Technical Services'
    ),
    'project-management' => array(
        'old_buttons' => array('Start Your Project', 'Get Started', 'Learn More'),
        'title' => 'Project Management & Construction'
    ),
    'community-engagement' => array(
        'old_buttons' => array('Learn More', 'Get in Touch', 'Contact Us'),
        'title' => 'Community Engagement & Capacity Building'
    ),
    'real-estate-management' => array(
        'old_buttons' => array('Get Started', 'Learn More', 'Contact Us'),
        'title' => 'Real Estate Management & Property Maintenance'
    )
);

$updated_count = 0;
$failed_count = 0;

foreach ($services as $slug => $data) {
    $page = get_page_by_path('services/' . $slug);
    
    if (!$page) {
        echo "⏭️ Skipped: <strong>{$data['title']}</strong> - Page not found<br>";
        $failed_count++;
        continue;
    }
    
    $content = $page->post_content;
    $original_content = $content;
    
    // Replace all old button variations with "Contact Us"
    foreach ($data['old_buttons'] as $old_text) {
        $content = preg_replace(
            '/<a\s+href="[^"]*"\s+class="btn\s+btn-primary">' . preg_quote($old_text, '/') . '<\/a>/i',
            '<a href="/contact" class="btn btn-primary">Contact Us</a>',
            $content
        );
    }
    
    // Also catch any other variations
    $content = preg_replace(
        '/<a\s+href="[^"]*contact[^"]*"\s+class="btn\s+btn-primary">([^<]+)<\/a>/i',
        '<a href="/contact" class="btn btn-primary">Contact Us</a>',
        $content
    );
    
    // Update the page if content changed
    if ($content !== $original_content) {
        $updated_page = array(
            'ID' => $page->ID,
            'post_content' => $content
        );
        
        $result = wp_update_post($updated_page);
        
        if ($result) {
            echo "✅ Updated: <strong>{$data['title']}</strong> (ID: {$page->ID}) - <a href='" . get_permalink($page->ID) . "' target='_blank'>View</a><br>";
            $updated_count++;
        } else {
            echo "❌ Failed: <strong>{$data['title']}</strong><br>";
            $failed_count++;
        }
    } else {
        echo "ℹ️ No change needed: <strong>{$data['title']}</strong> - Button already correct<br>";
    }
}

echo "<br><hr><br>";
echo "<h2>Summary</h2>";
echo "<p>✅ Updated: <strong>{$updated_count}</strong> page(s)<br>";
echo "❌ Failed: <strong>{$failed_count}</strong> page(s)<br>";
echo "📄 Total Processed: <strong>" . count($services) . "</strong> pages</p>";

if ($updated_count > 0) {
    echo "<br><p style='color: green; font-size: 18px;'><strong>✅ All service page buttons now say 'Contact Us' and link to the contact page!</strong></p>";
}

echo "<br><a href='/build' style='display: inline-block; padding: 15px 30px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>View Site</a>";
echo " <a href='/build/services/architecture' style='display: inline-block; padding: 15px 30px; background: #666; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;'>Test a Service Page</a>";
