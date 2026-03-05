<?php
/**
 * Build Smart - Project Updates Script
 * Run this ONCE to apply client-requested changes to projects
 * 
 * Access via: http://localhost/build/wp-content/themes/buildsmart/update-projects.php
 * DELETE THIS FILE after running!
 */

// Load WordPress
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php';

// Security check - only allow admins
if (!current_user_can('manage_options')) {
    die('Access denied. Please log in as administrator.');
}

echo "<!DOCTYPE html><html><head><title>Project Updates</title><style>body{font-family:sans-serif;padding:20px;max-width:800px;margin:0 auto}h1{color:#3CAF50}.success{color:green}.error{color:red}.warning{color:orange}</style></head><body>";
echo "<h1>Build Smart - Project Updates</h1>";
echo "<p>Running client-requested project changes...</p><hr>";

$changes_made = 0;

// 1. Delete "Mixed use development" project
$mixed_use = get_page_by_title('Mixed use development', OBJECT, 'project');
if (!$mixed_use) {
    // Try alternate search
    $search = new WP_Query(array(
        'post_type' => 'project',
        's' => 'Mixed use development',
        'posts_per_page' => 1
    ));
    if ($search->have_posts()) {
        $mixed_use = $search->posts[0];
    }
}

if ($mixed_use) {
    wp_trash_post($mixed_use->ID);
    echo "<p class='success'>✅ Deleted project: 'Mixed use development' (moved to trash)</p>";
    $changes_made++;
} else {
    echo "<p class='warning'>⚠️ Project 'Mixed use development' not found - may have already been deleted</p>";
}

// 2. Delete "Sanctuary Hills Apartment" project
$sanctuary = get_page_by_title('Sanctuary Hills Apartment', OBJECT, 'project');
if (!$sanctuary) {
    // Try alternate search
    $search = new WP_Query(array(
        'post_type' => 'project',
        's' => 'Sanctuary Hills',
        'posts_per_page' => 1
    ));
    if ($search->have_posts()) {
        $sanctuary = $search->posts[0];
    }
}

if ($sanctuary) {
    wp_trash_post($sanctuary->ID);
    echo "<p class='success'>✅ Deleted project: 'Sanctuary Hills Apartment' (moved to trash)</p>";
    $changes_made++;
} else {
    echo "<p class='warning'>⚠️ Project 'Sanctuary Hills Apartment' not found - may have already been deleted</p>";
}

// 3. Rename "Nyabisindu rehousing project" to "Mpazi Rehousing Project"
$nyabisindu = get_page_by_title('Nyabisindu rehousing project', OBJECT, 'project');
if (!$nyabisindu) {
    // Try alternate search with different casing
    $search = new WP_Query(array(
        'post_type' => 'project',
        's' => 'Nyabisindu',
        'posts_per_page' => 1
    ));
    if ($search->have_posts()) {
        $nyabisindu = $search->posts[0];
    }
}

if ($nyabisindu) {
    wp_update_post(array(
        'ID' => $nyabisindu->ID,
        'post_title' => 'Mpazi Rehousing Project',
        'post_name' => 'mpazi-rehousing-project'
    ));
    echo "<p class='success'>✅ Renamed project: 'Nyabisindu rehousing project' → 'Mpazi Rehousing Project'</p>";
    $changes_made++;
} else {
    echo "<p class='warning'>⚠️ Project 'Nyabisindu rehousing project' not found - may have different title</p>";
}

echo "<hr>";
echo "<p><strong>Total changes made: {$changes_made}</strong></p>";

if ($changes_made > 0) {
    echo "<p class='success' style='font-size:18px'>✅ Project updates completed successfully!</p>";
    echo "<p><strong>⚠️ IMPORTANT:</strong> Delete this file now:<br><code>" . __FILE__ . "</code></p>";
} else {
    echo "<p class='warning'>No changes were made. Projects may have already been updated or have different names.</p>";
    echo "<p>Check your <a href='" . admin_url('edit.php?post_type=project') . "'>Projects list</a> to verify.</p>";
}

echo "<p><a href='" . home_url('/projects') . "'>View Projects Page</a> | <a href='" . admin_url('edit.php?post_type=project') . "'>Manage Projects</a></p>";

echo "</body></html>";
?>
