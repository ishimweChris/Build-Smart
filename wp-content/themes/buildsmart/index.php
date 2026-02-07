<?php get_header(); ?>

<div class="container section">
    <h1>Blog</h1>
    
    <?php if (have_posts()) : ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: var(--spacing-md); margin-top: var(--spacing-lg);">
            <?php while (have_posts()) : the_post(); ?>
                <article class="blog-card" style="background: var(--white); border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <div style="padding: var(--spacing-md);">
                        <h2 style="font-size: 1.5rem;">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p style="color: var(--text-gray); font-size: 0.9rem;">
                            <?php echo get_the_date(); ?> | By <?php the_author(); ?>
                        </p>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline">Read More</a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="pagination" style="margin-top: var(--spacing-lg);">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
