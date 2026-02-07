# How to Add Hero Slider Background Images

## Overview

Your homepage now has a beautiful background image slider that displays team photos behind the green gradient overlay. The images automatically rotate every 5 seconds, creating a dynamic and engaging hero section.

## Step-by-Step Guide to Add Slider Images

### Method 1: Using WordPress Customizer (Recommended)

1. **Go to the Customizer**
   - From Dashboard: **Appearance** → **Customize**
   - Direct URL: http://localhost/build/wp-admin/customize.php

2. **Find Hero Slider Section**
   - Look for **"Hero Slider Images"** in the left sidebar
   - Click to expand the section

3. **Upload Your Team Photos**
   - You'll see 5 image upload slots (Slider Image 1-5)
   - Click **"Select Image"** button for each slot
   - Choose from existing media or upload new images
   - Add at least 3 images for the best effect
   - Click **"Select"** after choosing each image

4. **Preview & Publish**
   - The preview will update automatically on the right side
   - Click **"Publish"** button at the top to save your changes
   - Visit your homepage to see the slider in action!

### Method 2: Direct Media Upload

1. **Prepare Your Images First**
   - Go to **Media** → **Library** → **Add New**
   - Upload all your team photos at once

2. **Then Follow Method 1**
   - Select from your newly uploaded media

## Image Recommendations

### Ideal Specifications
- **Size:** 1920x1080px or larger (Full HD)
- **Format:** JPG or PNG
- **File Size:** Under 500KB per image (optimized for web)
- **Orientation:** Landscape (horizontal)

### Photo Tips
- **Team in Action:** Construction sites, team meetings, project planning
- **High Energy:** Smiling team members, active work scenes
- **Professional:** Well-lit, clear, high-quality images
- **Variety:** Mix of close-up team shots and wide project views
- **Focal Point:** Keep important subjects in the center (text overlay is centered)

### Image Optimization
Before uploading, consider:
- Compress images using tools like TinyPNG or Squoosh
- Ensure images are bright enough to show through the green overlay
- Avoid images with too much text or busy backgrounds

## How the Slider Works

### Technical Details
- **Auto-Rotation:** Images change every 5 seconds
- **Smooth Transitions:** 1.5-second fade between images
- **Overlay:** Semi-transparent green gradient (80% dark navy to 70% green)
- **Responsive:** Automatically adapts to all screen sizes

### What You'll See
- Background images visible behind the gradient
- "Build Smart Ltd" text remains clearly readable
- Buttons stay prominent and clickable
- Professional, dynamic presentation

## Customization Options

### Changing Transition Speed
To adjust how fast images change, edit:
- File: `wp-content/themes/buildsmart/js/main.js`
- Line: `setInterval(nextSlide, 5000);`
- Change `5000` to your preferred milliseconds (e.g., `7000` for 7 seconds)

### Adjusting Overlay Transparency
To make images more or less visible:
- File: `wp-content/themes/buildsmart/style.css`
- Find: `.hero-overlay` section
- Adjust the `rgba()` values (0.8 and 0.7 are the transparency levels)
- Lower numbers = more visible images
- Higher numbers = stronger overlay

## Quick Links

- [WordPress Customizer](http://localhost/build/wp-admin/customize.php)
- [Media Library](http://localhost/build/wp-admin/upload.php)
- [Theme Documentation](PROJECT-IMAGE-GUIDE.md)

## Troubleshooting

### Images Not Showing?
1. Make sure images are published (not private)
2. Check that image URLs are correct in Customizer
3. Clear your browser cache (Ctrl+F5)
4. Verify images uploaded successfully to Media Library

### Slider Not Moving?
1. Check that JavaScript is enabled in your browser
2. Open browser console (F12) and look for errors
3. Ensure jQuery is loading properly
4. Try refreshing the page

### Images Look Too Dark/Bright?
- Adjust the overlay transparency (see Customization Options above)
- Edit images before upload using photo editing software
- Choose images with better lighting

## Example Image Ideas

Perfect for your hero slider:
- ✅ Team members on construction site wearing hard hats
- ✅ Architects reviewing blueprints together
- ✅ Completed housing projects with team in front
- ✅ Team meeting or planning session
- ✅ Close-up of construction work in progress
- ✅ Before/after project transformations
- ✅ Community engagement events

## Best Practices

1. **Start with 3-4 images** - Too many can slow down the site
2. **Use consistent image quality** - All photos should look professional
3. **Test on mobile** - Ensure images look good on all devices
4. **Regular updates** - Refresh with new project photos quarterly
5. **Optimize first** - Always compress images before uploading

## Need Help?

If you need assistance:
- Check WordPress Media Library for upload issues
- Review browser console for JavaScript errors
- Contact your web developer for customization help

---

**Last Updated:** February 2026  
**Theme Version:** 1.0.0
