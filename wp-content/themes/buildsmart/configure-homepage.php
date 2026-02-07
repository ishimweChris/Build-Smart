<?php
/**
 * Build Smart - Homepage Configuration
 * Configures homepage and posts page settings
 * Access: http://localhost/build/wp-content/themes/buildsmart/configure-homepage.php
 */

if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>Build Smart - Homepage Configuration</h1>";
echo "<p>Configuring homepage settings...</p><br>";

// Get Home and Blog pages
$home_page = get_page_by_path('home');
$blog_page = get_page_by_path('blog');

if (!$home_page) {
    echo "❌ Home page not found. Creating...<br>";
    $home_id = wp_insert_post(array(
        'post_title' => 'Home',
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'page',
    ));
    echo "✅ Home page created (ID: {$home_id})<br><br>";
} else {
    $home_id = $home_page->ID;
    echo "✅ Home page found (ID: {$home_id})<br><br>";
}

if (!$blog_page) {
    echo "❌ Blog page not found. It should have been created earlier.<br>";
    $blog_id = 0;
} else {
    $blog_id = $blog_page->ID;
    echo "✅ Blog page found (ID: {$blog_id})<br><br>";
}

// Set static front page
update_option('show_on_front', 'page');
update_option('page_on_front', $home_id);

if ($blog_id) {
    update_option('page_for_posts', $blog_id);
    echo "✅ Homepage set to static page: <strong>Home</strong><br>";
    echo "✅ Posts page set to: <strong>Blog</strong><br>";
} else {
    echo "✅ Homepage set to static page: <strong>Home</strong><br>";
    echo "⚠️ Posts page not configured (Blog page missing)<br>";
}

echo "<br><hr><br>";
echo "<h2>Current Configuration</h2>";
echo "<ul>";
echo "<li><strong>Show on front:</strong> " . get_option('show_on_front') . "</li>";
echo "<li><strong>Front page ID:</strong> " . get_option('page_on_front') . "</li>";
echo "<li><strong>Posts page ID:</strong> " . get_option('page_for_posts') . "</li>";
echo "</ul>";

echo "<br><a href='/build' style='display: inline-block; padding: 10px 20px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>View Homepage</a> ";
echo "<a href='/build/wp-admin/' style='display: inline-block; padding: 10px 20px; background: #1a1d2e; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;'>Go to Dashboard</a>";
