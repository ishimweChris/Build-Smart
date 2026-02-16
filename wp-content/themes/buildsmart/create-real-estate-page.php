<?php
/**
 * Create Real Estate Management Service Page
 * Access: http://localhost/build/wp-content/themes/buildsmart/create-real-estate-page.php
 */

// Load WordPress
if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>🏢 Create Real Estate Management Page</h1>";

// Check if page already exists
$existing_page = get_page_by_path('services/real-estate-management');

if ($existing_page) {
    echo "<p style='color: green; font-size: 18px;'>✅ Page already exists! (ID: {$existing_page->ID})</p>";
    echo "<p><a href='" . get_permalink($existing_page->ID) . "' target='_blank'>View Page</a></p>";
    echo "<br><a href='/build' style='display: inline-block; padding: 15px 30px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>Go to Homepage</a>";
    exit;
}

// Get Services parent page
$services_page = get_page_by_title('Services');

if (!$services_page) {
    echo "<p style='color: red;'>❌ Error: Services parent page not found!</p>";
    exit;
}

echo "<p>Creating Real Estate Management & Property Maintenance page...</p>";

// Create the page
$page_content = '<h2>Real Estate Management & Property Maintenance</h2>

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

<a href="/contact" class="btn btn-primary">Get Started</a>';

$new_page = array(
    'post_title'    => 'Real Estate Management & Property Maintenance',
    'post_name'     => 'real-estate-management',
    'post_content'  => $page_content,
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_parent'   => $services_page->ID,
    'post_author'   => 1,
);

$page_id = wp_insert_post($new_page);

if ($page_id) {
    echo "<p style='color: green; font-size: 18px;'>✅ <strong>Success!</strong> Real Estate Management page created (ID: {$page_id})</p>";
    echo "<p>Page URL: <a href='" . get_permalink($page_id) . "' target='_blank'>" . get_permalink($page_id) . "</a></p>";
    
    // Flush rewrite rules
    flush_rewrite_rules();
    echo "<p style='color: green;'>✅ Permalinks flushed</p>";
    
    echo "<br><hr><br>";
    echo "<h2>✅ All Done!</h2>";
    echo "<p>The Real Estate Management service page has been created and is ready to use.</p>";
    echo "<br>";
    echo "<a href='" . get_permalink($page_id) . "' target='_blank' style='display: inline-block; padding: 15px 30px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px;'>View New Page</a>";
    echo "<a href='/build' style='display: inline-block; padding: 15px 30px; background: #666; color: white; text-decoration: none; border-radius: 5px;'>Go to Homepage</a>";
} else {
    echo "<p style='color: red;'>❌ <strong>Error:</strong> Failed to create page</p>";
    echo "<p>Please try creating the page manually in WordPress Admin.</p>";
}
