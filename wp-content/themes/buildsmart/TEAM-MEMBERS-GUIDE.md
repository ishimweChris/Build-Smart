# How to Add Team Members to Your About Page

## Overview

Your About page now includes a beautiful "Meet Our Team" section that displays team members with their photos, positions, and contact information.

## Step 1: Apply the Template to Your About Page

1. **Go to Pages**
   - Dashboard → **Pages** → **All Pages**
   - URL: http://localhost/build/wp-admin/edit.php?post_type=page

2. **Edit the About Page**
   - Click on **"About"** page to edit it

3. **Select the Template**
   - On the right sidebar, look for **"Page Attributes"** or **"Template"** box
   - Click the dropdown under **"Template"**
   - Select: **"About Page with Team"**

4. **Update**
   - Click **"Update"** button to save

## Step 2: Add Team Members

### Add Your First Team Member

1. **Go to Team Members**
   - Dashboard → **Team Members** → **Add New**
   - URL: http://localhost/build/wp-admin/post-new.php?post_type=team

2. **Enter Team Member Details**

   **Name (Title):**
   - Enter the person's full name
   - Example: "John Uwimana"

   **Position:**
   - Scroll down to **"Team Member Details"** box
   - Enter their job title
   - Example: "Chief Engineer" or "Managing Director"

   **Bio/Description:**
   - In the main editor, write a short bio (1-3 paragraphs)
   - Keep it professional and engaging
   - Example: "John brings over 15 years of construction expertise..."

   **Contact Information:**
   - **Email:** Enter their work email
   - **Phone:** Enter their phone number (optional)

3. **Add Photo**
   - On the right sidebar, click **"Set featured image"**
   - Upload a professional headshot or team photo
   - **Recommended size:** 400x400px (square) or similar
   - Click **"Set featured image"**

4. **Publish**
   - Click **"Publish"** button to add the team member

### Add More Team Members

Repeat the steps above for each team member. They will appear in the order you set (see Order section below).

## Step 3: Reorder Team Members

### Method 1: Using Menu Order

1. Edit any team member
2. Scroll to **"Page Attributes"** box on the right
3. Set **"Order"** number:
   - 1 = appears first
   - 2 = appears second
   - 3 = appears third, etc.
4. Update the team member

Lower numbers appear first on the page.

### Method 2: Using Publication Date

Team members are ordered by the "Order" field. If all have the same order (0), they'll appear in the order they were added.

## Team Member Card Layout

Each team member displays:
- ✅ **Professional photo** (square format works best)
- ✅ **Name** (from page title)
- ✅ **Position** (in green)
- ✅ **Bio** (from excerpt/content)
- ✅ **Email & Phone** (clickable links)

## Image Recommendations

### Photo Specifications
- **Size:** 400x400px (square) or 400x500px (portrait)
- **Format:** JPG or PNG
- **Quality:** High resolution, professional quality
- **Background:** Clean, simple background or office/site setting

### Photo Tips
- Use consistent style across all team photos
- Professional attire recommended
- Good lighting and clear focus
- Smiling, friendly expressions
- Optional: Include company branding or setting

## Managing Team Members

### Edit Existing Team Members

1. Go to **Team Members** → **All Team Members**
   - URL: http://localhost/build/wp-admin/edit.php?post_type=team

2. Click on any team member name to edit

3. Make your changes and click **"Update"**

### Delete Team Members

1. Go to **Team Members** → **All Team Members**
2. Hover over a team member name
3. Click **"Trash"**
4. The member will be removed from the About page

## Customization Options

### Change Section Title

Edit file: `wp-content/themes/buildsmart/page-about.php`
- Line 37-39: Change "Meet Our Team" heading
- Line 38: Change "The People Behind Build Smart" tagline

### Adjust Grid Layout

The team grid automatically adjusts:
- **Desktop:** 3-4 members per row
- **Tablet:** 2 members per row
- **Mobile:** 1 member per row (stacked)

This is responsive and adapts to screen size automatically.

### Hide Contact Information

If you don't want to display email/phone:
- Simply leave those fields blank when creating team members
- They won't show on the page if empty

## Example Team Member Setup

**Name:** Sarah Mukamana  
**Position:** Senior Architect  
**Bio:**  
> Sarah is a talented architect with a passion for sustainable design. She leads our architecture department and has completed over 50 successful projects across Rwanda. Her innovative approach combines traditional aesthetics with modern functionality.

**Email:** sarah@buildsmart.rw  
**Phone:** +250 788 123 456  
**Photo:** Professional headshot, 400x400px

## Quick Links

- [Add New Team Member](http://localhost/build/wp-admin/post-new.php?post_type=team)
- [All Team Members](http://localhost/build/wp-admin/edit.php?post_type=team)
- [Edit About Page](http://localhost/build/wp-admin/edit.php?post_type=page)
- [Media Library](http://localhost/build/wp-admin/upload.php)

## Troubleshooting

### Team Section Not Showing?

1. Make sure you selected **"About Page with Team"** template
2. Check that you've published at least one team member
3. Clear your browser cache (Ctrl+F5)

### Photos Not Displaying?

1. Ensure you set a "Featured Image" for each team member
2. Check image file size (keep under 1MB)
3. Verify images uploaded successfully to Media Library

### Team Members Out of Order?

1. Edit each team member
2. Set the "Order" field (lower numbers = earlier position)
3. Update each team member

### Layout Looks Wrong?

1. Clear browser cache (Ctrl+F5)
2. Check that style.css loaded properly
3. Verify no theme conflicts

## Best Practices

1. **Keep bios concise** - 2-3 short paragraphs maximum
2. **Use professional photos** - Consistent style across all members
3. **Update regularly** - Add new hires, remove former employees
4. **Order by seniority** - List leadership team first
5. **Include contact info** - Makes it easy for clients to reach specific people
6. **Write in third person** - "John brings..." not "I bring..."

## Design Features

✨ **Hover Effects** - Cards lift and scale on hover  
✨ **Responsive Grid** - Adapts to all screen sizes  
✨ **Professional Layout** - Clean, modern design  
✨ **Contact Links** - Clickable email and phone  
✨ **Smooth Animations** - Professional transitions  

---

**Last Updated:** February 2026  
**Theme Version:** 1.0.0  
**Template:** page-about.php
