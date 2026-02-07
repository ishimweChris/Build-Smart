<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    // Theme-provided favicon/site icon fallback: prefer an explicit favicon, then theme logo
    $favicon_png_path = get_template_directory() . '/images/favicon.png';
    $favicon_ico_path = get_template_directory() . '/images/favicon.ico';
    $logo_fallback_path = get_template_directory() . '/images/logo-black.png';

    if (file_exists($favicon_png_path)) {
        echo '<link rel="icon" href="' . esc_url(get_template_directory_uri() . '/images/favicon.png') . '" type="image/png">';
        echo '<link rel="apple-touch-icon" href="' . esc_url(get_template_directory_uri() . '/images/favicon.png') . '">';
    } elseif (file_exists($favicon_ico_path)) {
        echo '<link rel="icon" href="' . esc_url(get_template_directory_uri() . '/images/favicon.ico') . '" type="image/x-icon">';
    } elseif (file_exists($logo_fallback_path)) {
        echo '<link rel="icon" href="' . esc_url(get_template_directory_uri() . '/images/logo-black.png') . '" type="image/png">';
    }

    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <!-- Top Header Bar -->
    <div class="header-top">
        <div class="container">
            <div class="header-contact">
                <span>📞 +250788537659</span>
                <span>✉️ buildsmart247@gmail.com</span>
            </div>
            <div class="header-social">
                <a href="#" aria-label="Facebook">Facebook</a>
                <a href="#" aria-label="Twitter">Twitter</a>
                <a href="#" aria-label="LinkedIn">LinkedIn</a>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <div class="header-main">
        <div class="container">
            <div class="site-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    $theme_logo_uri = get_template_directory_uri() . '/images/logo-black.png';
                    $theme_logo_path = get_template_directory() . '/images/logo-black.png';
                    if (file_exists($theme_logo_path)) {
                        echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($theme_logo_uri) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <strong style="color: var(--primary-green); font-size: 1.5rem;">Build Smart</strong>
                            <br><small style="color: var(--text-gray);">Think Smart. Build Smart</small>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
            
            <button class="menu-toggle" aria-label="Toggle Menu">☰</button>
            
            <nav class="main-navigation" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'main-menu',
                    'fallback_cb' => 'buildsmart_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<main id="main-content" class="site-main">
