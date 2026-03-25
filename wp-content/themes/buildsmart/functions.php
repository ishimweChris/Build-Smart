<?php
/**
 * Build Smart Theme Functions
 * 
 * @package BuildSmart
 * @version 1.0.0
 */

// Theme setup
function buildsmart_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'buildsmart'),
        'footer' => __('Footer Menu', 'buildsmart'),
    ));
    
    // Add image sizes
    add_image_size('project-thumbnail', 600, 400, true);
    add_image_size('project-large', 1200, 800, true);
    add_image_size('team-member', 400, 400, true);
}
add_action('after_setup_theme', 'buildsmart_setup');

// Enqueue scripts and styles
function buildsmart_scripts() {
    // Styles
    wp_enqueue_style('buildsmart-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap', array(), null);
    
    // Scripts
    wp_enqueue_script('buildsmart-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'buildsmart_scripts');

// Register widget areas
function buildsmart_widgets_init() {
    // Sidebar
    register_sidebar(array(
        'name' => __('Sidebar', 'buildsmart'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'buildsmart'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    // Footer widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name' => sprintf(__('Footer Widget %d', 'buildsmart'), $i),
            'id' => 'footer-' . $i,
            'description' => sprintf(__('Footer widget area %d', 'buildsmart'), $i),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
}
add_action('widgets_init', 'buildsmart_widgets_init');

// Custom post types
function buildsmart_custom_post_types() {
    // Projects post type
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects', 'buildsmart'),
            'singular_name' => __('Project', 'buildsmart'),
            'add_new' => __('Add New Project', 'buildsmart'),
            'add_new_item' => __('Add New Project', 'buildsmart'),
            'edit_item' => __('Edit Project', 'buildsmart'),
            'new_item' => __('New Project', 'buildsmart'),
            'view_item' => __('View Project', 'buildsmart'),
            'search_items' => __('Search Projects', 'buildsmart'),
            'not_found' => __('No projects found', 'buildsmart'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'projects'),
        'show_in_rest' => true,
    ));
    
    // Team members post type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'buildsmart'),
            'singular_name' => __('Team Member', 'buildsmart'),
            'add_new' => __('Add Team Member', 'buildsmart'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
    
    // Careers post type
    register_post_type('career', array(
        'labels' => array(
            'name' => __('Careers', 'buildsmart'),
            'singular_name' => __('Career', 'buildsmart'),
            'add_new' => __('Add Job Opening', 'buildsmart'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title', 'editor', 'custom-fields'),
        'show_in_rest' => true,
    ));
    
    // Testimonials post type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'buildsmart'),
            'singular_name' => __('Testimonial', 'buildsmart'),
            'add_new' => __('Add Testimonial', 'buildsmart'),
            'add_new_item' => __('Add New Testimonial', 'buildsmart'),
            'edit_item' => __('Edit Testimonial', 'buildsmart'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'buildsmart_custom_post_types');

// Custom taxonomies
function buildsmart_custom_taxonomies() {
    // Project categories
    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => __('Project Categories', 'buildsmart'),
            'singular_name' => __('Project Category', 'buildsmart'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'project-category'),
    ));
    
    // Project tags
    register_taxonomy('project_tag', 'project', array(
        'labels' => array(
            'name' => __('Project Tags', 'buildsmart'),
            'singular_name' => __('Project Tag', 'buildsmart'),
        ),
        'hierarchical' => false,
        'show_in_rest' => true,
    ));
}
add_action('init', 'buildsmart_custom_taxonomies');

// Excerpt length
function buildsmart_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'buildsmart_excerpt_length');

// Excerpt more
function buildsmart_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'buildsmart_excerpt_more');

// Add custom fields support
function buildsmart_add_meta_boxes() {
    // Project details meta box
    add_meta_box(
        'project_details',
        __('Project Details', 'buildsmart'),
        'buildsmart_project_details_callback',
        'project',
        'normal',
        'high'
    );
    
    // Team member details
    add_meta_box(
        'team_details',
        __('Team Member Details', 'buildsmart'),
        'buildsmart_team_details_callback',
        'team',
        'normal',
        'high'
    );
    
    // Testimonial details
    add_meta_box(
        'testimonial_details',
        __('Client Details', 'buildsmart'),
        'buildsmart_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'buildsmart_add_meta_boxes');

// Project details callback
function buildsmart_project_details_callback($post) {
    wp_nonce_field('buildsmart_project_details', 'buildsmart_project_nonce');
    
    $client = get_post_meta($post->ID, '_project_client', true);
    $location = get_post_meta($post->ID, '_project_location', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    $area = get_post_meta($post->ID, '_project_area', true);
    ?>
    <p>
        <label><strong><?php _e('Client Name:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="project_client" value="<?php echo esc_attr($client); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php _e('Location:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="project_location" value="<?php echo esc_attr($location); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php _e('Year:', 'buildsmart'); ?></strong></label><br>
        <input type="number" name="project_year" value="<?php echo esc_attr($year); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php _e('Project Area (sq m):', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="project_area" value="<?php echo esc_attr($area); ?>" style="width:100%;">
    </p>
    <?php
}

// Team member details callback
function buildsmart_team_details_callback($post) {
    wp_nonce_field('buildsmart_team_details', 'buildsmart_team_nonce');
    
    $position = get_post_meta($post->ID, '_team_position', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    ?>
    <p>
        <label><strong><?php _e('Position:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="team_position" value="<?php echo esc_attr($position); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php _e('Email:', 'buildsmart'); ?></strong></label><br>
        <input type="email" name="team_email" value="<?php echo esc_attr($email); ?>" style="width:100%;">
    </p>
    <p>
        <label><strong><?php _e('Phone:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="team_phone" value="<?php echo esc_attr($phone); ?>" style="width:100%;">
    </p>
    <?php
}

// Testimonial details callback
function buildsmart_testimonial_details_callback($post) {
    wp_nonce_field('buildsmart_testimonial_details', 'buildsmart_testimonial_nonce');
    
    $client_name = get_post_meta($post->ID, '_testimonial_client_name', true);
    $client_position = get_post_meta($post->ID, '_testimonial_client_position', true);
    $client_company = get_post_meta($post->ID, '_testimonial_client_company', true);
    ?>
    <p>
        <label><strong><?php _e('Client Name:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" style="width:100%;" placeholder="e.g. John Doe">
    </p>
    <p>
        <label><strong><?php _e('Position/Title:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" style="width:100%;" placeholder="e.g. CEO, Project Manager">
    </p>
    <p>
        <label><strong><?php _e('Company/Organization:', 'buildsmart'); ?></strong></label><br>
        <input type="text" name="testimonial_client_company" value="<?php echo esc_attr($client_company); ?>" style="width:100%;" placeholder="e.g. ABC Corporation">
    </p>
    <p style="color: #666; font-style: italic;">
        <small>Add the testimonial quote in the main content editor above. You can also set a Featured Image for the client's photo.</small>
    </p>
    <?php
}

// Save meta box data
function buildsmart_save_meta_boxes($post_id) {
    // Check nonce
    if (!isset($_POST['buildsmart_project_nonce']) && !isset($_POST['buildsmart_team_nonce']) && !isset($_POST['buildsmart_testimonial_nonce'])) {
        return;
    }
    
    if (isset($_POST['buildsmart_project_nonce']) && !wp_verify_nonce($_POST['buildsmart_project_nonce'], 'buildsmart_project_details')) {
        return;
    }
    
    if (isset($_POST['buildsmart_team_nonce']) && !wp_verify_nonce($_POST['buildsmart_team_nonce'], 'buildsmart_team_details')) {
        return;
    }
    
    if (isset($_POST['buildsmart_testimonial_nonce']) && !wp_verify_nonce($_POST['buildsmart_testimonial_nonce'], 'buildsmart_testimonial_details')) {
        return;
    }
    
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save project fields
    if (isset($_POST['project_client'])) {
        update_post_meta($post_id, '_project_client', sanitize_text_field($_POST['project_client']));
    }
    if (isset($_POST['project_location'])) {
        update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
    }
    if (isset($_POST['project_year'])) {
        update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
    }
    if (isset($_POST['project_area'])) {
        update_post_meta($post_id, '_project_area', sanitize_text_field($_POST['project_area']));
    }
    
    // Save team fields
    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position']));
    }
    if (isset($_POST['team_email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_email']));
    }
    if (isset($_POST['team_phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['team_phone']));
    }
    
    // Save testimonial fields
    if (isset($_POST['testimonial_client_name'])) {
        update_post_meta($post_id, '_testimonial_client_name', sanitize_text_field($_POST['testimonial_client_name']));
    }
    if (isset($_POST['testimonial_client_position'])) {
        update_post_meta($post_id, '_testimonial_client_position', sanitize_text_field($_POST['testimonial_client_position']));
    }
    if (isset($_POST['testimonial_client_company'])) {
        update_post_meta($post_id, '_testimonial_client_company', sanitize_text_field($_POST['testimonial_client_company']));
    }
}
add_action('save_post', 'buildsmart_save_meta_boxes');

// Security - remove WordPress version
remove_action('wp_head', 'wp_generator');

// Performance - remove unnecessary emojis
function buildsmart_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'buildsmart_disable_emojis');

// ===================================
// Theme Customizer - Hero Slider
// ===================================
function buildsmart_customize_register($wp_customize) {
    // Add Hero Section Panel
    $wp_customize->add_section('buildsmart_hero_section', array(
        'title' => __('Hero Slider Images', 'buildsmart'),
        'description' => __('Add background images for the homepage hero slider. Recommended size: 1920x1080px or larger.', 'buildsmart'),
        'priority' => 30,
    ));
    
    // Add settings and controls for 5 slider images
    for ($i = 1; $i <= 5; $i++) {
        // Setting
        $wp_customize->add_setting('hero_slider_image_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        // Control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_slider_image_' . $i, array(
            'label' => sprintf(__('Slider Image %d', 'buildsmart'), $i),
            'section' => 'buildsmart_hero_section',
            'settings' => 'hero_slider_image_' . $i,
        )));
    }
}
add_action('customize_register', 'buildsmart_customize_register');

// Helper function to get hero slider images
function buildsmart_get_hero_images() {
    $images = array();
    for ($i = 1; $i <= 5; $i++) {
        $image = get_theme_mod('hero_slider_image_' . $i);
        if (!empty($image)) {
            $images[] = $image;
        }
    }
    return $images;
}

// ===================================
// Theme Customizer - Client Logos
// ===================================
function buildsmart_client_logos_customizer($wp_customize) {
    // Add Client Logos Section
    $wp_customize->add_section('buildsmart_clients_section', array(
        'title' => __('Client Logos', 'buildsmart'),
        'description' => __('Add client/partner logos for the homepage. Recommended: PNG with transparent background, max 200x100px.', 'buildsmart'),
        'priority' => 35,
    ));
    
    // Add settings and controls for 8 client logos
    for ($i = 1; $i <= 8; $i++) {
        // Setting
        $wp_customize->add_setting('client_logo_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        // Control
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'client_logo_' . $i, array(
            'label' => sprintf(__('Client Logo %d', 'buildsmart'), $i),
            'section' => 'buildsmart_clients_section',
            'settings' => 'client_logo_' . $i,
        )));
    }
}
add_action('customize_register', 'buildsmart_client_logos_customizer');

// Fallback menu when no menu is assigned
function buildsmart_fallback_menu() {
    echo '<ul class="main-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">Services</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery/')) . '">Gallery</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact Us</a></li>';
    echo '</ul>';
}
