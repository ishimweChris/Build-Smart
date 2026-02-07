<?php
/**
 * Template Name: About Page with Team
 * Description: About page template that includes team members section
 */

get_header();
?>

<div class="container section">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                
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
    endif;
    ?>
</div>

<!-- Our Team Section -->
<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--spacing-lg);">
            <h2>Meet Our Team</h2>
            <p style="color: var(--primary-green); font-size: 1.2rem;">The People Behind Build Smart</p>
            <p style="max-width: 700px; margin: 0 auto; color: var(--text-gray);">
                Our dedicated team of professionals brings together expertise in architecture, engineering, 
                and construction to deliver exceptional results for every project.
            </p>
        </div>
        
        <div class="team-grid">
            <?php
            $team_members = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($team_members->have_posts()) :
                while ($team_members->have_posts()) : $team_members->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $email = get_post_meta(get_the_ID(), '_team_email', true);
                    $phone = get_post_meta(get_the_ID(), '_team_phone', true);
                    ?>
                    <div class="team-member-card">
                        <div class="team-member-photo">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('team-member'); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/400x400/3CAF50/ffffff?text=<?php echo esc_attr(get_the_title()); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="team-member-info">
                            <h3><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <p class="team-position"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                            <div class="team-bio">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="team-contact">
                                <?php if ($email) : ?>
                                    <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                                <?php endif; ?>
                                <?php if ($phone) : ?>
                                    <p><strong>Phone:</strong> <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div style="text-align: center; padding: var(--spacing-lg); grid-column: 1 / -1;">
                    <p style="color: var(--text-gray); margin-bottom: var(--spacing-md);">
                        No team members added yet.
                    </p>
                    <?php if (current_user_can('edit_posts')) : ?>
                        <a href="<?php echo admin_url('post-new.php?post_type=team'); ?>" class="btn btn-primary">
                            Add Your First Team Member
                        </a>
                    <?php endif; ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
