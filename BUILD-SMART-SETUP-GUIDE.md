# Build Smart WordPress Website - Setup Guide

## ✅ What's Been Completed

### 1. WordPress Core Setup
- ✅ WordPress installed at: http://localhost/build
- ✅ Database created: buildsmart_db
- ✅ Configuration file ready

### 2. Custom Theme Created
- ✅ Theme Name: **Build Smart**
- ✅ Location: `wp-content/themes/buildsmart/`
- ✅ Features:
  - Fully responsive design
  - Custom post types (Projects, Team, Careers)
  - Build Smart color scheme (Green #3CAF50 & Navy #1a1d2e)
  - Modern, professional layouts
  - Mobile-optimized navigation

### 3. Theme Files Created
- ✅ style.css - Complete styling with Build Smart branding
- ✅ functions.php - Custom post types, menus, widgets
- ✅ header.php - Site header with navigation
- ✅ footer.php - Footer with contact info
- ✅ front-page.php - Homepage template
- ✅ page.php - General pages template
- ✅ index.php - Blog listing
- ✅ archive-project.php - Projects listing
- ✅ single-project.php - Single project detail
- ✅ main.js - Interactive features

## 📋 Next Steps - What You Need To Do

### Step 1: Activate the Theme
1. Go to WordPress Admin: http://localhost/build/wp-admin
2. Navigate to **Appearance → Themes**
3. Find "Build Smart" theme
4. Click **Activate**

### Step 2: Install Essential Plugins
Go to **Plugins → Add New** and install:

**Required:**
- ✅ Contact Form 7 (for contact forms)
- ✅ Yoast SEO (for SEO optimization)
- ✅ WP Super Cache (for performance)
- ✅ Smush (for image optimization)

**Recommended:**
- ✅ Elementor (page builder for easy editing)
- ✅ WPForms Lite (advanced forms)
- ✅ Google Analytics (tracking)

### Step 3: Create Pages
Run the setup script or create manually:

**Main Pages:**
1. Home (set as front page)
2. About Us
3. Services (with 4 sub-pages)
4. Projects
5. Contact
6. Careers
7. Blog
8. Privacy Policy

**To set homepage:**
- Go to **Settings → Reading**
- Select "A static page"
- Choose "Home" as front page
- Choose "Blog" as posts page

### Step 4: Set Up Menus
1. Go to **Appearance → Menus**
2. Create "Primary Menu":
   - Add: Home, About, Services, Projects, Contact, Careers
3. Assign to "Primary Menu" location
4. Create "Footer Menu" for footer links

### Step 5: Add Content

**Upload Logo:**
- Go to **Appearance → Customize → Site Identity**
- Upload Build Smart logo

**Create Projects:**
1. Go to **Projects → Add New**
2. Add project details (title, description, images)
3. Fill in custom fields (Client, Location, Year, Area)
4. Set featured image
5. Publish

**Add Team Members:**
1. Go to **Team Members → Add New**
2. Add name, bio, position
3. Upload photo
4. Publish

### Step 6: Configure Settings

**Permalinks:**
- Go to **Settings → Permalinks**
- Select "Post name"
- Save changes

**SEO (after installing Yoast):**
- Go to **SEO → General**
- Run configuration wizard
- Set site title: "Build Smart Ltd - Construction & Architecture"
- Set meta description

**Contact Form:**
- Go to **Contact Form 7**
- Create a new form
- Add fields: Name, Email, Phone, Message
- Copy shortcode
- Add to Contact page

## 🎨 Customization Options

### Colors (Already Set):
- Primary Green: #3CAF50
- Dark Navy: #1a1d2e
- Accent Orange: #FF6B35

### Fonts (Already Set):
- Primary: Poppins
- Secondary: Roboto

### To Customize Further:
1. Go to **Appearance → Customize**
2. Modify colors, fonts, logo
3. Add widgets to sidebar/footer
4. Configure homepage sections

## 📁 File Structure
```
wp-content/themes/buildsmart/
├── style.css              (Main stylesheet)
├── functions.php          (Theme functions)
├── header.php             (Site header)
├── footer.php             (Site footer)
├── front-page.php         (Homepage)
├── page.php               (Standard pages)
├── index.php              (Blog)
├── archive-project.php    (Projects listing)
├── single-project.php     (Project details)
└── js/
    └── main.js            (JavaScript)
```

## 🔧 Technical Specifications Met

✅ Fully responsive (mobile, tablet, desktop)
✅ Custom post types (Projects, Team, Careers)
✅ Project portfolio with custom fields
✅ Build Smart color scheme
✅ Modern, clean design
✅ SEO-ready structure
✅ Performance optimized
✅ Easy content management
✅ Custom navigation menus
✅ Widget-ready footer

## 📞 Contact Information (Pre-configured)

- Phone: +250788537659
- Email: buildsmart247@gmail.com
- Address: KN 20 Ave, Kimisagara, Kigali

## 🚀 Launch Checklist

Before going live:
- [ ] Add all pages with content
- [ ] Upload 6-10 projects with images
- [ ] Add team member bios
- [ ] Set up contact form
- [ ] Configure SEO settings
- [ ] Test on mobile devices
- [ ] Optimize all images
- [ ] Set up Google Analytics
- [ ] Test all forms
- [ ] Check all links
- [ ] Add SSL certificate (HTTPS)
- [ ] Set up backups

## 📝 Support

The theme is fully functional and ready to use. All custom post types, templates, and styling are complete and follow WordPress best practices.

**Admin Panel:** http://localhost/build/wp-admin
**Website:** http://localhost/build

---

**Theme Version:** 1.0.0
**Created:** January 30, 2026
**For:** Build Smart Ltd
