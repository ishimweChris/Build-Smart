<?php
/**
 * Template Name: Single Service Page
 * Description: Template for individual service pages with icons instead of bullets
 */

get_header();

// Define icons for each service's features
$service_icons = array(
    'architecture' => array(
        '🔍', // Comprehensive site analysis
        '✏️', // Conceptual and schematic design
        '📐', // Detailed architectural drawings
        '🖥️', // 3D visualizations
        '🌳', // Landscape architecture
        '♻️', // Sustainable design
    ),
    'engineering' => array(
        '🏗️', // Structural engineering
        '⚡', // Electrical systems
        '💧', // Plumbing engineering
        '📊', // Quantity surveying
        '🔧', // Technical assessments
        '📋', // Documentation
    ),
    'project-management' => array(
        '📅', // Project planning
        '👷', // Construction supervision
        '📦', // Procurement management
        '✅', // Quality control
        '💰', // Budget management
        '⏱️', // Timeline management
    ),
    'community-engagement' => array(
        '👥', // Community meetings
        '📝', // Assessments
        '🎓', // Training programs
        '🤝', // Partnerships
        '📣', // Communication
        '🏘️', // Community development
    ),
    'real-estate-management' => array(
        '🏠', // Property management
        '👤', // Tenant sourcing
        '📄', // Lease administration
        '💵', // Rent collection
        '🔧', // Maintenance
        '📊', // Reporting
    ),
);

// Get current page slug
$current_slug = $post->post_name;
$icons = isset($service_icons[$current_slug]) ? $service_icons[$current_slug] : array('✓', '✓', '✓', '✓', '✓', '✓');
?>

<section class="service-single-page">
    <div class="container" style="padding-top: var(--spacing-md); padding-bottom: var(--spacing-sm);">
        <article <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="margin: var(--spacing-md) 0;">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            
            <div class="service-content">
                <?php
                // Get the content and process it
                $content = get_the_content();
                
                // Remove duplicate H2 title that matches the page title
                $title = get_the_title();
                $content = preg_replace('/<h2[^>]*>' . preg_quote($title, '/') . '<\/h2>/i', '', $content);
                
                // Replace bullet list items with icon list
                $icon_index = 0;
                $content = preg_replace_callback(
                    '/<li>([^<]*)<\/li>/',
                    function($matches) use (&$icon_index, $icons) {
                        $icon = isset($icons[$icon_index]) ? $icons[$icon_index] : '✓';
                        $icon_index++;
                        return '<li class="icon-list-item"><span class="list-icon">' . $icon . '</span><span class="list-text">' . $matches[1] . '</span></li>';
                    },
                    $content
                );
                
                // Replace ul tags with icon-list class
                $content = str_replace('<ul>', '<ul class="icon-list">', $content);
                
                echo $content;
                ?>
            </div>
        </article>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--primary-green); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white);">Interested in This Service?</h2>
        <p style="font-size: 1.2rem; margin: var(--spacing-md) 0;">Let's discuss how Build Smart can help with your project.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-secondary">Discuss Your Project</a>
    </div>
</section>

<?php get_footer(); ?>
