/**
 * Build Smart Theme - Main JavaScript
 * @version 1.0.0
 */

(function($) {
    'use strict';
    
    // ===================================
    // Hero Background Slider
    // ===================================
    function initHeroSlider() {
        const slides = document.querySelectorAll('.hero-slide');
        
        if (slides.length === 0) return;
        
        let currentSlide = 0;
        
        // Show first slide
        slides[0].classList.add('active');
        
        // Auto advance slides
        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        
        // Change slide every 8 seconds
        setInterval(nextSlide, 8000);
    }
    
    // Initialize slider when DOM is ready
    $(document).ready(function() {
        initHeroSlider();
    });
    
    // ===================================
    // Mobile Menu & Navigation
    // ===================================
    
    // Mobile menu toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('active');
        $(this).toggleClass('active');
    });
    
    // Close mobile menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.header-main').length) {
            $('.main-navigation').removeClass('active');
            $('.menu-toggle').removeClass('active');
        }
    });
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.hash);
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 800);
        }
    });
    
    // Sticky header on scroll
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });
    
    // Portfolio filter functionality
    $('.filter-btn').on('click', function() {
        var filter = $(this).data('filter');
        
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        if (filter === 'all') {
            $('.project-card').fadeIn();
        } else {
            $('.project-card').hide();
            $('.project-card[data-category="' + filter + '"]').fadeIn();
        }
    });
    
    // Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src;
                    image.classList.remove('lazy');
                    imageObserver.unobserve(image);
                }
            });
        });
        
        const images = document.querySelectorAll('img.lazy');
        images.forEach(function(img) {
            imageObserver.observe(img);
        });
    }
    
    // Back to top button
    $('body').append('<button id="back-to-top" style="position:fixed;bottom:20px;right:20px;display:none;background:var(--primary-green);color:white;border:none;padding:15px;border-radius:50%;cursor:pointer;z-index:999;font-size:20px;">↑</button>');
    
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 300) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    
    $('#back-to-top').on('click', function() {
        $('html, body').animate({scrollTop: 0}, 600);
    });
    
    // Form validation
    $('form').on('submit', function(e) {
        var isValid = true;
        
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).css('border', '2px solid red');
            } else {
                $(this).css('border', '1px solid #ddd');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
    
    // Animate on scroll
    function animateOnScroll() {
        $('.service-card, .project-card, .blog-card').each(function() {
            var elementTop = $(this).offset().top;
            var windowBottom = $(window).scrollTop() + $(window).height();
            
            if (elementTop < windowBottom - 100) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    }
    
    // Initial animation setup
    $('.service-card, .project-card, .blog-card').css({
        'opacity': '0',
        'transform': 'translateY(30px)',
        'transition': 'all 0.6s ease'
    });
    
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Run on page load
    
})(jQuery);
