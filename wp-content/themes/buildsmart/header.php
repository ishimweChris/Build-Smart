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
                <a href="https://wa.me/250788537659" target="_blank" rel="noopener" class="whatsapp-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#25D366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg> Chat +250 788 537 659</a>
                <a href="mailto:info@buildsmartrw.com"><span>✉️ info@buildsmartrw.com</span></a>
            </div>
            <div class="header-social">
                <a href="https://x.com/BuildSmartrw" target="_blank" rel="noopener" aria-label="Twitter/X">Twitter</a>
                <a href="https://www.linkedin.com/company/build-smart-experts/" target="_blank" rel="noopener" aria-label="LinkedIn">LinkedIn</a>
                <a href="https://www.instagram.com/buildsmartrw/" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a>
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
