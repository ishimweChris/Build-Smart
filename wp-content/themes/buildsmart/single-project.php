<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="project-detail">
        <!-- Project Hero -->
        <div class="project-hero" style="background: var(--light-gray); padding: var(--spacing-lg) 0;">
            <div class="container" style="text-align: center;">
                <h1><?php the_title(); ?></h1>
                <?php
                $location = get_post_meta(get_the_ID(), '_project_location', true);
                $year = get_post_meta(get_the_ID(), '_project_year', true);
                ?>
                <p style="color: var(--primary-green); font-size: 1.2rem;">
                    <?php echo $location ? $location : ''; ?> 
                    <?php echo $year ? ' | ' . $year : ''; ?>
                </p>
            </div>
        </div>
        
        <!-- Project Content -->
        <div class="container section">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: var(--spacing-lg);">
                <div class="project-main-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="project-featured-image" style="margin-bottom: var(--spacing-md);">
                            <?php the_post_thumbnail('project-large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="project-sidebar">
                    <div class="project-info-box" style="background: var(--light-gray); padding: var(--spacing-md); border-radius: 10px;">
                        <h3>Project Details</h3>
                        <?php
                        $client = get_post_meta(get_the_ID(), '_project_client', true);
                        $area = get_post_meta(get_the_ID(), '_project_area', true);
                        ?>
                        <?php if ($client) : ?>
                            <p><strong>Client:</strong><br><?php echo esc_html($client); ?></p>
                        <?php endif; ?>
                        <?php if ($location) : ?>
                            <p><strong>Location:</strong><br><?php echo esc_html($location); ?></p>
                        <?php endif; ?>
                        <?php if ($year) : ?>
                            <p><strong>Year:</strong><br><?php echo esc_html($year); ?></p>
                        <?php endif; ?>
                        <?php if ($area) : ?>
                            <p><strong>Area:</strong><br><?php echo esc_html($area); ?> sq m</p>
                        <?php endif; ?>
                    </div>
                    
                    <div style="margin-top: var(--spacing-md); text-align: center;">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary" style="width: 100%; display: block;">Discuss Your Project</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
