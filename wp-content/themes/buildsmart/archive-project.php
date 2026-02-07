<?php get_header(); ?>

<div class="container section">
    <h1><?php the_title(); ?></h1>
    
    <?php if (have_posts()) : ?>
        <div class="portfolio-grid" style="margin-top: var(--spacing-lg);">
            <?php while (have_posts()) : the_post(); ?>
                <div class="project-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('project-thumbnail'); ?>
                    <?php else : ?>
                        <img src="https://via.placeholder.com/600x400/3CAF50/ffffff?text=Project" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="project-overlay">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo get_post_meta(get_the_ID(), '_project_location', true); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
        <div class="pagination" style="margin-top: var(--spacing-lg);">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No projects found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
