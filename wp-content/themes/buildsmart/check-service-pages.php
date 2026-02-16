<?php
/**
 * Service Pages Diagnostic Tool
 * Access: http://localhost/build/wp-content/themes/buildsmart/check-service-pages.php
 */

// Load WordPress
if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>🔍 Service Pages Diagnostic</h1>";
echo "<p>Checking status of all service pages...</p><br>";

$services = array(
    'Architecture & Urban Planning' => 'architecture',
    'Engineering & Technical Services' => 'engineering',
    'Project Management & Construction' => 'project-management',
    'Community Engagement & Capacity Building' => 'community-engagement',
    'Real Estate Management & Property Maintenance' => 'real-estate-management'
);

echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background: #3CAF50; color: white;'>";
echo "<th>Service Name</th>";
echo "<th>Expected Slug</th>";
echo "<th>Status</th>";
echo "<th>URL</th>";
echo "</tr>";

foreach ($services as $title => $slug) {
    // Check with services/ prefix since they're child pages
    $page = get_page_by_path('services/' . $slug);
    
    echo "<tr>";
    echo "<td><strong>{$title}</strong></td>";
    echo "<td><code>services/{$slug}</code></td>";
    
    if ($page) {
        echo "<td style='color: green;'>✅ EXISTS (ID: {$page->ID})</td>";
        echo "<td><a href='" . get_permalink($page->ID) . "' target='_blank'>View Page</a></td>";
    } else {
        echo "<td style='color: red;'>❌ NOT FOUND</td>";
        echo "<td>-</td>";
    }
    
    echo "</tr>";
}

echo "</table>";

// Check if Services parent page exists
echo "<br><h2>Parent Page Check</h2>";
$services_page = get_page_by_path('services');
if ($services_page) {
    echo "<p>✅ <strong>Services</strong> parent page exists (ID: {$services_page->ID})</p>";
} else {
    echo "<p style='color: red;'>❌ <strong>Services</strong> parent page NOT FOUND!</p>";
}

// Provide action buttons
echo "<br><hr><br>";
echo "<h2>Actions</h2>";

$missing_pages = 0;
foreach ($services as $slug) {
    if (!get_page_by_path('services/' . $slug)) {
        $missing_pages++;
    }
}

if ($missing_pages > 0) {
    echo "<p style='color: red;'><strong>{$missing_pages} service page(s) missing!</strong></p>";
    echo "<p>Click the button below to create all missing pages:</p>";
    echo "<a href='create-pages.php' style='display: inline-block; padding: 15px 30px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 10px 10px 10px 0;'>🔧 Create Missing Pages</a>";
} else {
    echo "<p style='color: green;'><strong>✅ All service pages exist!</strong></p>";
}

echo "<a href='/build/wp-admin/options-permalink.php' style='display: inline-block; padding: 15px 30px; background: #2271b1; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 10px 10px 10px 0;'>🔄 Flush Permalinks</a>";
echo "<a href='/build' style='display: inline-block; padding: 15px 30px; background: #666; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 10px 10px 10px 0;'>🏠 View Site</a>";

echo "<br><br><hr><br>";
echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li>If pages are missing, click <strong>'Create Missing Pages'</strong></li>";
echo "<li>After creating pages, click <strong>'Flush Permalinks'</strong> and save (don't change anything, just click Save)</li>";
echo "<li>Then click <strong>'View Site'</strong> to test the service links</li>";
echo "</ol>";
