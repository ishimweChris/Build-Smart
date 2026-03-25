<?php
/**
 * Template Name: Gallery
 * 
 * Displays all project images AND standalone gallery images with filtering
 * 
 * @package BuildSmart
 */

get_header(); ?>

<div class="gallery-page">
    <!-- Page Header -->
    <div class="page-header" style="background: var(--light-gray); padding: var(--spacing-lg) 0; text-align: center;">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <p style="font-size: 1.2rem; color: var(--text-gray); max-width: 600px; margin: 0 auto;">
                Explore our portfolio of completed projects across Rwanda and beyond.
            </p>
        </div>
    </div>

    <div class="container section">
        <?php
        // Get all projects for filter buttons
        $projects = get_posts(array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC'
        ));
        
        // Get all gallery categories
        $gallery_categories = get_terms(array(
            'taxonomy' => 'gallery_category',
            'hide_empty' => true,
        ));
        
        // Check if there are standalone gallery images without category (Other)
        $uncategorized_gallery = get_posts(array(
            'post_type' => 'gallery_image',
            'posts_per_page' => 1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'gallery_category',
                    'operator' => 'NOT EXISTS',
                ),
            ),
        ));
        $has_other = !empty($uncategorized_gallery);
        ?>

        <!-- Filter Buttons -->
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">All</button>
            
            <?php // Project filters ?>
            <?php foreach ($projects as $project) : ?>
                <button class="filter-btn" data-filter="project-<?php echo $project->ID; ?>">
                    <?php echo esc_html($project->post_title); ?>
                </button>
            <?php endforeach; ?>
            
            <?php // Gallery category filters ?>
            <?php if (!is_wp_error($gallery_categories) && !empty($gallery_categories)) : ?>
                <?php foreach ($gallery_categories as $category) : ?>
                    <button class="filter-btn" data-filter="category-<?php echo $category->term_id; ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <?php // Other (uncategorized) filter ?>
            <?php if ($has_other) : ?>
                <button class="filter-btn" data-filter="other">Other</button>
            <?php endif; ?>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid">
            <?php
            // ============================================
            // PART 1: Images from Projects
            // ============================================
            foreach ($projects as $project) :
                $project_id = $project->ID;
                $project_title = $project->post_title;
                $project_slug = 'project-' . $project_id;
                
                // Get featured image
                if (has_post_thumbnail($project_id)) :
                    $thumb_id = get_post_thumbnail_id($project_id);
                    $thumb_url = wp_get_attachment_image_url($thumb_id, 'large');
                    $thumb_full = wp_get_attachment_image_url($thumb_id, 'full');
                    $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    if (!$thumb_alt) $thumb_alt = $project_title;
                    ?>
                    <div class="gallery-item <?php echo esc_attr($project_slug); ?>" data-project="<?php echo esc_attr($project_slug); ?>">
                        <a href="<?php echo esc_url($thumb_full); ?>" class="gallery-lightbox" data-title="<?php echo esc_attr($project_title); ?>">
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($thumb_alt); ?>">
                            <div class="gallery-item-overlay">
                                <span class="gallery-item-title"><?php echo esc_html($project_title); ?></span>
                                <span class="gallery-item-icon">+</span>
                            </div>
                        </a>
                    </div>
                <?php endif;
                
                // Get gallery images from dedicated meta field (not from content)
                $gallery_image_ids = get_post_meta($project_id, '_project_gallery_images', true);
                if ($gallery_image_ids) :
                    $image_ids = array_filter(explode(',', $gallery_image_ids));
                    foreach ($image_ids as $img_id) :
                        $img_id = trim($img_id);
                        if (!$img_id) continue;
                        
                        $img_url = wp_get_attachment_image_url($img_id, 'large');
                        $img_full = wp_get_attachment_image_url($img_id, 'full');
                        if (!$img_url) continue;
                        
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                        if (!$img_alt) $img_alt = $project_title;
                        ?>
                        <div class="gallery-item <?php echo esc_attr($project_slug); ?>" data-project="<?php echo esc_attr($project_slug); ?>">
                            <a href="<?php echo esc_url($img_full); ?>" class="gallery-lightbox" data-title="<?php echo esc_attr($project_title); ?>">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="gallery-item-overlay">
                                    <span class="gallery-item-title"><?php echo esc_html($project_title); ?></span>
                                    <span class="gallery-item-icon">+</span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;
                endif;
                
            endforeach;
            
            // ============================================
            // PART 2: Standalone Gallery Images (with categories)
            // ============================================
            $gallery_images = get_posts(array(
                'post_type' => 'gallery_image',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            foreach ($gallery_images as $gallery_item) :
                if (!has_post_thumbnail($gallery_item->ID)) continue;
                
                $item_id = $gallery_item->ID;
                $item_title = $gallery_item->post_title;
                $thumb_id = get_post_thumbnail_id($item_id);
                $thumb_url = wp_get_attachment_image_url($thumb_id, 'large');
                $thumb_full = wp_get_attachment_image_url($thumb_id, 'full');
                $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                if (!$thumb_alt) $thumb_alt = $item_title;
                
                // Get categories for this gallery image
                $item_categories = get_the_terms($item_id, 'gallery_category');
                $category_classes = '';
                $category_name = 'Other';
                $data_project = 'other';
                
                if (!is_wp_error($item_categories) && !empty($item_categories)) {
                    $category_classes = array();
                    foreach ($item_categories as $cat) {
                        $category_classes[] = 'category-' . $cat->term_id;
                    }
                    $category_classes = implode(' ', $category_classes);
                    $category_name = $item_categories[0]->name;
                    $data_project = 'category-' . $item_categories[0]->term_id;
                }
                ?>
                <div class="gallery-item <?php echo esc_attr($category_classes); ?>" data-project="<?php echo esc_attr($data_project); ?>">
                    <a href="<?php echo esc_url($thumb_full); ?>" class="gallery-lightbox" data-title="<?php echo esc_attr($item_title); ?>">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($thumb_alt); ?>">
                        <div class="gallery-item-overlay">
                            <span class="gallery-item-title"><?php echo esc_html($item_title); ?></span>
                            <span class="gallery-item-category"><?php echo esc_html($category_name); ?></span>
                            <span class="gallery-item-icon">+</span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($projects) && empty($gallery_images)) : ?>
            <div class="no-projects" style="text-align: center; padding: var(--spacing-lg);">
                <p style="font-size: 1.2rem;">No images found. Add projects or gallery images to display.</p>
                <a href="<?php echo admin_url('post-new.php?post_type=project'); ?>" class="btn btn-primary" style="margin-right: 10px;">Add Project</a>
                <a href="<?php echo admin_url('post-new.php?post_type=gallery_image'); ?>" class="btn btn-outline">Add Gallery Image</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="gallery-lightbox" class="lightbox-modal">
    <span class="lightbox-close">&times;</span>
    <span class="lightbox-prev">&#10094;</span>
    <span class="lightbox-next">&#10095;</span>
    <div class="lightbox-content">
        <img src="" alt="" id="lightbox-image">
        <p id="lightbox-caption"></p>
    </div>
</div>

<style>
/* Gallery Filters */
.gallery-filters {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: var(--spacing-lg);
}

.filter-btn {
    padding: 12px 24px;
    border: 2px solid var(--primary-green);
    background: transparent;
    color: var(--primary-green);
    font-family: var(--font-primary);
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    border-radius: 30px;
    transition: var(--transition);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-green);
    color: var(--white);
}

/* Gallery Grid */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    aspect-ratio: 4/3;
    cursor: pointer;
    transition: var(--transition);
}

.gallery-item.hidden {
    display: none;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-item-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(26, 29, 46, 0.9) 0%, transparent 50%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
    opacity: 0;
    transition: var(--transition);
}

.gallery-item:hover .gallery-item-overlay {
    opacity: 1;
}

.gallery-item-title {
    color: var(--white);
    font-size: 1.1rem;
    font-weight: 600;
}

.gallery-item-category {
    color: var(--primary-green);
    font-size: 0.85rem;
    font-weight: 500;
    margin-top: 4px;
}

.gallery-item-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    background: var(--primary-green);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    opacity: 0;
    transition: var(--transition);
}

.gallery-item:hover .gallery-item-icon {
    opacity: 1;
}

/* Lightbox Modal */
.lightbox-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.95);
    overflow: auto;
}

.lightbox-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-content {
    max-width: 90%;
    max-height: 90vh;
    text-align: center;
}

#lightbox-image {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 5px;
}

#lightbox-caption {
    color: var(--white);
    padding: 15px;
    font-size: 1.1rem;
    margin-top: 10px;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: var(--white);
    font-size: 45px;
    font-weight: bold;
    cursor: pointer;
    transition: var(--transition);
    z-index: 10000;
}

.lightbox-close:hover {
    color: var(--primary-green);
}

.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: var(--white);
    font-size: 40px;
    font-weight: bold;
    padding: 16px;
    cursor: pointer;
    transition: var(--transition);
    user-select: none;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 5px;
}

.lightbox-prev:hover,
.lightbox-next:hover {
    background: var(--primary-green);
}

.lightbox-prev {
    left: 20px;
}

.lightbox-next {
    right: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 15px;
    }
    
    .filter-btn {
        padding: 10px 18px;
        font-size: 0.85rem;
    }
    
    .lightbox-prev,
    .lightbox-next {
        font-size: 30px;
        padding: 12px;
    }
    
    .lightbox-close {
        font-size: 35px;
        top: 15px;
        right: 25px;
    }
}

@media (max-width: 480px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }
    
    .gallery-filters {
        gap: 8px;
    }
    
    .filter-btn {
        padding: 8px 16px;
        font-size: 0.8rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-project') === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
    
    // Lightbox functionality
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxClose = document.querySelector('.lightbox-close');
    const lightboxPrev = document.querySelector('.lightbox-prev');
    const lightboxNext = document.querySelector('.lightbox-next');
    const galleryLinks = document.querySelectorAll('.gallery-lightbox');
    
    let currentIndex = 0;
    let visibleImages = [];
    
    function getVisibleImages() {
        visibleImages = [];
        galleryItems.forEach((item, index) => {
            if (!item.classList.contains('hidden')) {
                visibleImages.push({
                    src: item.querySelector('a').getAttribute('href'),
                    title: item.querySelector('a').getAttribute('data-title'),
                    element: item
                });
            }
        });
    }
    
    function openLightbox(index) {
        getVisibleImages();
        currentIndex = index;
        if (visibleImages[currentIndex]) {
            lightboxImg.src = visibleImages[currentIndex].src;
            lightboxCaption.textContent = visibleImages[currentIndex].title;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    function showPrev() {
        currentIndex = (currentIndex - 1 + visibleImages.length) % visibleImages.length;
        lightboxImg.src = visibleImages[currentIndex].src;
        lightboxCaption.textContent = visibleImages[currentIndex].title;
    }
    
    function showNext() {
        currentIndex = (currentIndex + 1) % visibleImages.length;
        lightboxImg.src = visibleImages[currentIndex].src;
        lightboxCaption.textContent = visibleImages[currentIndex].title;
    }
    
    // Click on gallery item
    galleryItems.forEach((item, idx) => {
        item.querySelector('a').addEventListener('click', function(e) {
            e.preventDefault();
            getVisibleImages();
            // Find index in visible images
            const clickedSrc = this.getAttribute('href');
            const visibleIndex = visibleImages.findIndex(img => img.src === clickedSrc);
            if (visibleIndex !== -1) {
                openLightbox(visibleIndex);
            }
        });
    });
    
    // Lightbox controls
    lightboxClose.addEventListener('click', closeLightbox);
    lightboxPrev.addEventListener('click', showPrev);
    lightboxNext.addEventListener('click', showNext);
    
    // Click outside to close
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('active')) return;
        
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
});
</script>

<?php get_footer(); ?>
