# Build Smart Ltd - WordPress Deployment Checklist

**Domain:** buildsmartrw.com  
**Date:** February 7, 2026  
**Status:** Ready for Production Deployment

---

## 📋 PRE-DEPLOYMENT CHECKLIST

✅ All development complete  
✅ Hero slider with team images  
✅ Team members section on About page  
✅ Projects showcase  
✅ Services section  
✅ Contact page ready  
✅ SSL certificate available on server  

---

## 🚀 DEPLOYMENT STEPS (Complete in Order)

### STEP 1: Export Database from Localhost

#### Using phpMyAdmin (Easiest)

1. **Open phpMyAdmin**
   - URL: http://localhost/phpmyadmin
   - Or via XAMPP Control Panel

2. **Select Your Database**
   - Click on the database name (usually "build" or "wordpress")
   - Look for the database in the left sidebar

3. **Export Database**
   - Click **"Export"** tab at the top
   - Format: Select **"SQL"**
   - Click **"Go"** button
   - **Save the file** as `build-smart-database.sql`

4. **Keep This File Safe**
   - Save to your computer
   - You'll upload this to the live server

### STEP 2: Export WordPress Files

#### Using File Compression

1. **Navigate to WordPress Folder**
   - Open: `D:\xampp\htdocs\build`

2. **Create Backup (Optional but Smart)**
   - Right-click the entire "build" folder
   - Select **"Send to"** → **"Compressed (zipped) folder"**
   - Save as `build-smart-backup.zip`

3. **Prepare for Upload**
   - You'll upload these files via FTP or cPanel File Manager
   - Main folders/files needed:
     - wp-admin/
     - wp-content/ (most important!)
     - wp-includes/
     - wp-config.php
     - All root PHP files (index.php, wp-load.php, etc.)

### STEP 3: Create Database on cPanel

1. **Log into cPanel**
   - URL: `https://buildsmartrw.com:2083` (or your server's cPanel URL)
   - Username: Your cPanel username
   - Password: Your cPanel password

2. **Create MySQL Database**
   - Look for **"MySQL Databases"** icon
   - Click it
   - **New Database:**
     - Name: `buildsmart_wp` (or similar)
     - Click **"Create Database"**
   - Note the database name for later

3. **Create Database User**
   - Scroll down to **"MySQL Users"**
   - Create New User:
     - Username: `buildsmart_user` (or similar)
     - Password: Create a **STRONG PASSWORD** (save this!)
     - Click **"Create User"**

4. **Assign User to Database**
   - Scroll to **"Add User to Database"**
   - Select your user and database
   - Click **"Add"**
   - Check **ALL** privileges
   - Click **"Make Changes"**

**SAVE THESE CREDENTIALS:**
```
Database Name: buildsmart_wp
Database User: buildsmart_user
Database Password: [YOUR STRONG PASSWORD]
```

### STEP 4: Upload WordPress Files to Server

#### Option A: Using cPanel File Manager (Easier)

1. **Log into cPanel**
   - Find and click **"File Manager"**

2. **Navigate to Public HTML**
   - Click on **"public_html"** folder
   - This is your website root

3. **Upload Files**
   - Click **"Upload"** button
   - Select the WordPress files from your local build folder
   - Or upload the zip file and extract it

4. **Structure Should Look Like:**
   ```
   public_html/
   ├── wp-admin/
   ├── wp-content/
   ├── wp-includes/
   ├── wp-config.php
   ├── index.php
   ├── wp-load.php
   └── [other WP files]
   ```

#### Option B: Using FTP Client (Alternative)

1. **Download FTP Client**
   - FileZilla (free) recommended
   - Download from: https://filezilla-project.org

2. **Connect to Server**
   - Host: buildsmartrw.com (or your server IP)
   - Username: Your cPanel username
   - Password: Your cPanel password
   - Port: 21 (standard FTP)
   - Click **"Quickconnect"**

3. **Navigate to public_html**
   - On the right panel, double-click **"public_html"**
   - This is your website root

4. **Drag and Drop Files**
   - From left panel (your computer)
   - To right panel (web server)
   - Upload all WordPress files

### STEP 5: Import Database to Live Server

1. **Access cPanel MySQL Tools**
   - In cPanel, find **"phpMyAdmin"**
   - Click to open in new window

2. **Select Your Database**
   - Left sidebar, click your database name (buildsmart_wp)

3. **Import SQL File**
   - Click **"Import"** tab
   - Click **"Choose File"**
   - Select `build-smart-database.sql` from your computer
   - Click **"Import"** button
   - Wait for completion (may take 1-2 minutes)

4. **Verify Import**
   - You should see all your tables listed on the left
   - Tables include: wp_posts, wp_postmeta, wp_users, etc.

### STEP 6: Update wp-config.php on Live Server

1. **Edit wp-config.php**
   - Via cPanel File Manager:
     - Find and right-click `wp-config.php`
     - Click **"Edit"**

2. **Update Database Credentials**
   - Find these lines:
     ```php
     define('DB_NAME', 'local_database_name');
     define('DB_USER', 'local_username');
     define('DB_PASSWORD', 'local_password');
     define('DB_HOST', 'localhost');
     ```

   - Replace with your live credentials:
     ```php
     define('DB_NAME', 'buildsmart_wp');
     define('DB_USER', 'buildsmart_user');
     define('DB_PASSWORD', 'YOUR_STRONG_PASSWORD');
     define('DB_HOST', 'localhost');
     ```

3. **Save File**
   - Click **"Save Changes"** in cPanel editor

### STEP 7: Configure WordPress Settings

1. **Log into WordPress Admin**
   - URL: https://buildsmartrw.com/wp-admin
   - Username: Your WordPress admin username
   - Password: Your WordPress admin password

2. **Set Site URLs**
   - Go to **Settings** → **General**
   - **WordPress Address (URL):** https://buildsmartrw.com
   - **Site Address (URL):** https://buildsmartrw.com
   - Click **"Save Changes"**

3. **Configure Permalinks**
   - Go to **Settings** → **Permalinks**
   - Select: **"Post name"** (recommended for SEO)
   - Click **"Save Changes"**

4. **Check Theme**
   - Go to **Appearance** → **Themes**
   - Activate **"Build Smart"** theme if not already active

### STEP 8: Set Up SSL Certificate

1. **SSL in cPanel**
   - Find **"AutoSSL"** or **"SSL/TLS Status"** in cPanel
   - Your domain should be listed
   - Install SSL if not already done
   - Usually automatic on modern hosts

2. **Force HTTPS**
   - In WordPress Settings → General
   - Ensure both URLs use **https://**
   - Example: `https://buildsmartrw.com`

3. **Test SSL**
   - Visit: https://buildsmartrw.com
   - Check for green lock icon 🔒

### STEP 9: Final Testing

#### Home Page & Hero Section
- [ ] Visit https://buildsmartrw.com
- [ ] Hero slider displays correctly
- [ ] Images change every 8 seconds
- [ ] Text is visible and readable
- [ ] Buttons (View Our Projects, Get In Touch) work
- [ ] No broken images or console errors

#### Navigation
- [ ] Top menu links work (Home, About, Services, Blog, Careers, Contact)
- [ ] All links point to correct pages
- [ ] Mobile menu works on small screens

#### About Page
- [ ] Page loads correctly
- [ ] Team section displays
- [ ] Team member cards show photos
- [ ] Contact information (email/phone) are clickable

#### Projects
- [ ] Projects display correctly
- [ ] Featured images load
- [ ] Pagination works if multiple pages
- [ ] Project details page accessible

#### Services
- [ ] All service pages accessible
- [ ] Content displays properly
- [ ] Links and buttons work

#### Contact Page
- [ ] Contact form visible
- [ ] Form submission works
- [ ] Confirm email notifications arrive

#### Technical Checks
- [ ] No PHP errors in console
- [ ] CSS/fonts loading properly
- [ ] Responsive design works on mobile
- [ ] SSL certificate shows green lock
- [ ] Page speed acceptable

### STEP 10: Search Engine Optimization

1. **Install Yoast SEO (Recommended)**
   - WordPress Admin → **Plugins** → **Add New**
   - Search: "Yoast SEO"
   - Install and Activate
   - Run setup wizard

2. **Configure Sitemaps**
   - WordPress Admin → **Settings** → **Reading**
   - Ensure **"Search engine visibility"** is ON
   - Yoast will auto-generate sitemap

3. **Submit to Google Search Console**
   - Go to: https://search.google.com/search-console
   - Add property: buildsmartrw.com
   - Verify ownership (follow instructions)
   - Submit sitemap

4. **Submit to Bing Webmaster Tools**
   - Go to: https://www.bing.com/webmasters
   - Add your domain
   - Verify and submit sitemap

### STEP 11: Backup Strategy

1. **Set Up Regular Backups**
   - cPanel usually has **"Backup"** feature
   - Or use **Updraft Plus** plugin (free)

2. **Create Initial Backup**
   - Full backup of database and files
   - Keep locally and in cloud storage

### STEP 12: Performance & Security

#### Performance
- [ ] Enable **WP Super Cache** plugin for caching
- [ ] Compress images in wp-content/uploads
- [ ] Use CDN if needed (optional)

#### Security
- [ ] Change default admin username if possible
- [ ] Update all WordPress plugins and theme
- [ ] Install **Wordfence Security** plugin (free)
- [ ] Run security scan
- [ ] Disable file editor (Settings → Writing)

---

## 🎯 FINAL VERIFICATION

Before announcing launch:

1. **Test Everything from Browser**
   ```
   https://buildsmartrw.com
   ```

2. **Check Mobile**
   - Test on phone/tablet
   - Use Chrome DevTools responsive mode

3. **Test Forms**
   - Contact form submission
   - Check email notifications

4. **Performance**
   - https://gtmetrix.com
   - https://pagespeed.web.dev
   - Target: PageSpeed 80+

5. **SSL Verification**
   - https://www.sslshopper.com/ssl-checker.html
   - Paste: buildsmartrw.com
   - Should show: ✅ Certificate Valid

---

## 📞 TROUBLESHOOTING

### "Error Establishing Database Connection"
- Verify database credentials in wp-config.php
- Check user permissions in MySQL
- Ensure database exists

### "500 Internal Server Error"
- Check server PHP error logs in cPanel
- Ensure wp-config.php is correct
- Check file permissions (should be 644 for files, 755 for folders)
- Disable unnecessary plugins

### "Images Not Loading"
- Verify wp-content/uploads folder exists and has correct permissions
- Check image paths in database
- Run URL migration tool in WordPress

### "SSL Certificate Error"
- Renew SSL via cPanel
- Clear browser cache
- Wait 24 hours for propagation

---

## 📚 IMPORTANT FILES & CREDENTIALS

**Keep these safe!**

```
Domain: buildsmartrw.com
cPanel URL: [your-server]:2083
cPanel User: [your-username]
Database Name: buildsmart_wp
Database User: buildsmart_user
Database Password: [SAVE THIS]
WordPress Admin: admin (or custom user)
```

---

## 🎉 YOU'RE LIVE!

Once all steps are complete and verified:

1. **Announce Launch**
   - Email to clients/contacts
   - Social media announcement
   - Update business cards/materials

2. **Monitor First Days**
   - Check error logs
   - Monitor traffic
   - Gather feedback

3. **Plan Updates**
   - Regular content updates
   - Monitor plugin updates
   - Keep backups current

---

**Next Steps Contact:**
For any issues during deployment, check:
- cPanel Help: Your hosting provider's support
- WordPress Codex: https://codex.wordpress.org
- Theme Documentation: HERO-SLIDER-GUIDE.md, TEAM-MEMBERS-GUIDE.md

**Launch Date:** [Your Date]  
**Status:** ✅ Ready to Go Live!

---

Good luck with your launch! 🚀
