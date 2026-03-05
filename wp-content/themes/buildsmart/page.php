<?php
/**
 * Default page template
 */

// Check if this is a child page of Services
$is_service_page = false;
if ($post->post_parent) {
    $parent = get_post($post->post_parent);
    if ($parent && $parent->post_name === 'services') {
        $is_service_page = true;
    }
}

// If it's a service child page, use the service template
if ($is_service_page) {
    get_template_part('page-service-single');
    return;
}

get_header();
?>

<div class="container section">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article <?php post_class(); ?>>
                <h1 style="text-align: center;"><?php the_title(); ?></h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image" style="margin: var(--spacing-md) 0;">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <p>No content found.</p>
        <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>
