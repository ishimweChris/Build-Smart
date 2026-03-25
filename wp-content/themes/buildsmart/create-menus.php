<?php
/**
 * Build Smart - Menu Setup Script
 * Creates Primary and Footer menus with all pages
 * Access: http://localhost/build/wp-content/themes/buildsmart/create-menus.php
 */

if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>Build Smart - Menu Creator</h1>";
echo "<p>Setting up navigation menus...</p><br>";

// Delete existing menus if they exist
$existing_primary = wp_get_nav_menu_object('Primary Menu');
if ($existing_primary) {
    wp_delete_nav_menu($existing_primary->term_id);
    echo "🗑️ Deleted existing Primary Menu<br>";
}

$existing_footer = wp_get_nav_menu_object('Footer Menu');
if ($existing_footer) {
    wp_delete_nav_menu($existing_footer->term_id);
    echo "🗑️ Deleted existing Footer Menu<br>";
}

// Create Primary Menu
$primary_menu_id = wp_create_nav_menu('Primary Menu');
echo "<br><h2>Creating Primary Menu...</h2>";

// Get pages
$home = get_page_by_path('home');
$about = get_page_by_path('about');
$services = get_page_by_path('services');
$gallery = get_page_by_path('gallery');
$contact = get_page_by_path('contact');

// Add items to Primary Menu (Home, About Us, Services, Gallery, Contact Us)
$menu_items = array(
    array('title' => 'Home', 'url' => home_url('/'), 'page' => $home),
    array('title' => 'About Us', 'url' => '', 'page' => $about),
    array('title' => 'Services', 'url' => '', 'page' => $services),
    array('title' => 'Gallery', 'url' => '', 'page' => $gallery),
    array('title' => 'Contact Us', 'url' => '', 'page' => $contact),
);

$menu_order = 1;
foreach ($menu_items as $item) {
    if ($item['page']) {
        wp_update_nav_menu_item($primary_menu_id, 0, array(
            'menu-item-title' => $item['title'],
            'menu-item-object' => 'page',
            'menu-item-object-id' => $item['page']->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
            'menu-item-position' => $menu_order
        ));
        echo "✅ Added: <strong>{$item['title']}</strong><br>";
        $menu_order++;
    } else {
        // Add custom link for Home
        if ($item['title'] == 'Home') {
            wp_update_nav_menu_item($primary_menu_id, 0, array(
                'menu-item-title' => 'Home',
                'menu-item-url' => home_url('/'),
                'menu-item-type' => 'custom',
                'menu-item-status' => 'publish',
                'menu-item-position' => $menu_order
            ));
            echo "✅ Added: <strong>Home</strong><br>";
            $menu_order++;
        }
    }
}

// Add service sub-pages to Services menu item
$architecture = get_page_by_path('architecture');
$engineering = get_page_by_path('engineering');
$project_mgmt = get_page_by_path('project-management');
$community = get_page_by_path('community-engagement');

if ($services) {
    $services_menu_item = wp_get_nav_menu_items($primary_menu_id);
    $services_parent_id = 0;
    foreach ($services_menu_item as $menu_item) {
        if ($menu_item->title == 'Services') {
            $services_parent_id = $menu_item->ID;
            break;
        }
    }
    
    if ($services_parent_id) {
        echo "<br><strong>Adding Service Submenu Items:</strong><br>";
        
        $submenu_items = array(
            array('page' => $architecture, 'title' => 'Architecture & Urban Planning'),
            array('page' => $engineering, 'title' => 'Engineering Services'),
            array('page' => $project_mgmt, 'title' => 'Project Management'),
            array('page' => $community, 'title' => 'Community Engagement'),
            array('page' => get_page_by_path('real-estate-management'), 'title' => 'Real Estate Management'),
        );
        
        foreach ($submenu_items as $subitem) {
            if ($subitem['page']) {
                wp_update_nav_menu_item($primary_menu_id, 0, array(
                    'menu-item-title' => $subitem['title'],
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $subitem['page']->ID,
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $services_parent_id
                ));
                echo "  ↳ ✅ Added: <strong>{$subitem['title']}</strong><br>";
            }
        }
    }
}

// Assign Primary Menu to theme location
$locations = get_theme_mod('nav_menu_locations');
$locations['primary'] = $primary_menu_id;
set_theme_mod('nav_menu_locations', $locations);
echo "<br>✅ <strong>Primary Menu assigned to Primary location</strong><br>";

// Create Footer Menu
echo "<br><h2>Creating Footer Menu...</h2>";
$footer_menu_id = wp_create_nav_menu('Footer Menu');

$footer_items = array(
    array('page' => $about, 'title' => 'About Us'),
    array('page' => $services, 'title' => 'Services'),
    array('page' => $contact, 'title' => 'Contact Us'),
);

$footer_order = 1;
foreach ($footer_items as $item) {
    if ($item['page']) {
        wp_update_nav_menu_item($footer_menu_id, 0, array(
            'menu-item-title' => $item['title'],
            'menu-item-object' => 'page',
            'menu-item-object-id' => $item['page']->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
            'menu-item-position' => $footer_order
        ));
        echo "✅ Added: <strong>{$item['title']}</strong><br>";
        $footer_order++;
    }
}

// Assign Footer Menu to theme location
$locations['footer'] = $footer_menu_id;
set_theme_mod('nav_menu_locations', $locations);
echo "<br>✅ <strong>Footer Menu assigned to Footer location</strong><br>";

echo "<br><hr><br>";
echo "<h2>✅ Menu Setup Complete!</h2>";
echo "<p>Both Primary and Footer menus have been created and assigned.</p>";
echo "<br><a href='/build/wp-admin/nav-menus.php' style='display: inline-block; padding: 10px 20px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>View Menus in Dashboard</a> ";
echo "<a href='/build' style='display: inline-block; padding: 10px 20px; background: #1a1d2e; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;'>View Website</a>";
