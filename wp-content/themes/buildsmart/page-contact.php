<?php
/**
 * Template Name: Contact Page
 * Description: Contact page template with business hours
 */

get_header();
?>

<section class="section" style="background: var(--light-gray);">
    <div class="container">
        <h1 style="text-align: center;">Contact Us</h1>
        <p style="text-align: center; max-width: 700px; margin: 0 auto var(--spacing-lg); color: var(--text-gray);">
            Have a project in mind? Let's discuss how Build Smart can help bring your vision to life.
        </p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--spacing-lg);">
            <!-- Contact Form -->
            <div class="contact-form-wrapper" style="background: var(--white); padding: var(--spacing-lg); border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                <h3 style="margin-bottom: var(--spacing-md);">Send Us a Message</h3>
                <?php 
                // Display Contact Form 7 shortcode if plugin is active
                if (shortcode_exists('contact-form-7')) {
                    // Try to get the first contact form
                    $forms = get_posts(array(
                        'post_type' => 'wpcf7_contact_form',
                        'posts_per_page' => 1
                    ));
                    if (!empty($forms)) {
                        echo do_shortcode('[contact-form-7 id="' . $forms[0]->ID . '"]');
                    } else {
                        echo '<p>Please create a contact form in Contact Form 7.</p>';
                    }
                } else {
                    // Fallback simple form
                    ?>
                    <form action="#" method="post" class="contact-form">
                        <p>
                            <label>Your Name</label>
                            <input type="text" name="name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px;">
                        </p>
                        <p>
                            <label>Your Email</label>
                            <input type="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px;">
                        </p>
                        <p>
                            <label>Phone Number</label>
                            <input type="tel" name="phone" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px;">
                        </p>
                        <p>
                            <label>Your Message</label>
                            <textarea name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; margin-top: 5px;"></textarea>
                        </p>
                        <p>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                        </p>
                    </form>
                    <?php
                }
                ?>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info-wrapper">
                <div style="background: var(--white); padding: var(--spacing-lg); border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); margin-bottom: var(--spacing-md);">
                    <h3 style="margin-bottom: var(--spacing-md);">Contact Information</h3>
                    
                    <div style="margin-bottom: var(--spacing-md);">
                        <p style="margin-bottom: var(--spacing-xs);"><strong>📍 Address</strong></p>
                        <p style="color: var(--text-gray);">KN 20 Ave, Kimisagara<br>Kigali, Rwanda</p>
                    </div>
                    
                    <div style="margin-bottom: var(--spacing-md);">
                        <p style="margin-bottom: var(--spacing-xs);"><strong>📞 Phone</strong></p>
                        <p><a href="tel:+250788537659" style="color: var(--primary-green);">+250 788 537 659</a></p>
                    </div>
                    
                    <div style="margin-bottom: var(--spacing-md);">
                        <p style="margin-bottom: var(--spacing-xs);"><strong>✉️ Email</strong></p>
                        <p><a href="mailto:info@buildsmartrw.com" style="color: var(--primary-green);">info@buildsmartrw.com</a></p>
                    </div>
                    
                    <div style="margin-bottom: var(--spacing-md);">
                        <p style="margin-bottom: var(--spacing-xs);"><strong>💬 WhatsApp</strong></p>
                        <p><a href="https://wa.me/250788537659" target="_blank" rel="noopener" style="color: #25D366; display: inline-flex; align-items: center; gap: 6px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#25D366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Chat with us
                        </a></p>
                    </div>
                </div>
                
                <div style="background: var(--dark-navy); color: var(--white); padding: var(--spacing-lg); border-radius: 10px;">
                    <h3 style="color: var(--primary-green); margin-bottom: var(--spacing-md);">🕐 Business Hours</h3>
                    <table style="width: 100%; color: rgba(255,255,255,0.9);">
                        <tr>
                            <td style="padding: 8px 0;">Monday - Friday</td>
                            <td style="text-align: right; padding: 8px 0;">8:00 AM - 5:00 PM</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 0;">Saturday</td>
                            <td style="text-align: right; padding: 8px 0;">9:00 AM - 1:00 PM</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px 0;">Sunday</td>
                            <td style="text-align: right; padding: 8px 0; color: var(--accent-orange);">Closed</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--spacing-md);">
            <h2>Find Us</h2>
            <p style="color: var(--text-gray);">Visit our office in Kigali, Rwanda</p>
        </div>
        <div style="border-radius: 10px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.4851685648556!2d30.0467!3d-1.9536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwNTcnMTMuMCJTIDMwwrAwMic0OC4xIkU!5e0!3m2!1sen!2srw!4v1706650000000!5m2!1sen!2srw" 
                width="100%" 
                height="400" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--primary-green); color: var(--white); text-align: center;">
    <div class="container">
        <h2 style="color: var(--white);">Ready to Start Your Project?</h2>
        <p style="font-size: 1.2rem; margin: var(--spacing-md) 0;">Let's build something amazing together.</p>
        <a href="<?php echo home_url('/projects'); ?>" class="btn btn-secondary">View Our Projects</a>
    </div>
</section>

<?php get_footer(); ?>
