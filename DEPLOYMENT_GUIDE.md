# Online Course Registration - Deployment Guide

## Quick Deployment Steps

### Step 1: Install Required Software
1. **Download XAMPP** from https://www.apachefriends.org/
   - Download the latest version (with PHP 7.4 or higher)
   - Install to default location: `C:\xampp`

2. **Start XAMPP Services**
   - Open XAMPP Control Panel
   - Start **Apache** and **MySQL** services

### Step 2: Deploy Project Files
The project has been copied to: `C:\xampp\htdocs\online-course-registration`

If you need to manually copy:
1. Navigate to `C:\xampp\htdocs\`
2. Create folder named `online-course-registration`
3. Copy all project files into this folder

### Step 3: Create and Import Database

**Option A: Using phpMyAdmin (Easy)**
1. Open browser and go to: `http://localhost/phpmyadmin`
2. Click **"New"** to create new database
3. Database name: `onlinecourse`
4. Collation: `utf8mb4_general_ci`
5. Click **"Create"**
6. Click on the new `onlinecourse` database
7. Click **"Import"** tab
8. Select file: `SQL File/onlinecourse.sql`
9. Click **"Go"** button

**Option B: Using Command Line (Advanced)**
```bash
mysql -u root -p < "SQL File/onlinecourse.sql"
```
(Press Enter when prompted for password if MySQL root has no password)

### Step 4: Update Database Configuration (if needed)

Edit these files if your database credentials differ:
- `includes/config.php`
- `admin/includes/config.php`

Default configuration:
```php
DB_SERVER = 'localhost'
DB_USER = 'root'
DB_PASS = ''  (empty password)
DB_NAME = 'onlinecourse'
```

### Step 5: Access the Application

**Student Portal:**
```
http://localhost/online-course-registration/
```

**Admin Panel:**
```
http://localhost/online-course-registration/admin/
```

### Default Login Credentials

**Admin Login:**
- Username: `admin`
- Password: `admin` (MD5: f925916e2754e5e03f75dd58a5733251)

## Features

✓ Student Course Registration
✓ Course Enrollment Management
✓ Student Profile Management
✓ Admin Dashboard
✓ Course Availability Checking
✓ Print & Export Functionality
✓ User Activity Logging

## Project Structure

```
online-course-registration/
├── admin/              # Admin panel
├── assets/             # CSS, JavaScript, Images, Fonts
├── includes/           # Configuration files
├── screens/            # Project screenshots
├── SQL File/           # Database dump (onlinecourse.sql)
├── studentphoto/       # Student photos storage
├── index.php           # Student portal home
└── README.md           # Project documentation
```

## Troubleshooting

**Problem: "Failed to connect to MySQL"**
- Ensure MySQL service is running in XAMPP Control Panel
- Check database credentials in config.php match your setup
- Verify database name is `onlinecourse`

**Problem: Blank page or 404 errors**
- Ensure project is in: `C:\xampp\htdocs\online-course-registration`
- Clear browser cache (Ctrl+Shift+Delete)
- Check Apache error logs in XAMPP folder

**Problem: Login not working**
- Ensure SQL database was imported successfully
- Check admin table has user: `admin`
- Try resetting admin password in phpMyAdmin

## Security Notes for Production

1. Change default admin password immediately
2. Use prepared statements (already implemented)
3. Enable HTTPS on production server
4. Restrict database user permissions
5. Keep PHP and MySQL updated
6. Use strong database passwords
7. Store sensitive files outside web root

## Technical Stack

- **Frontend:** HTML5, CSS3, Bootstrap, jQuery
- **Backend:** PHP 7.2+
- **Database:** MySQL/MariaDB
- **Server:** Apache with mod_rewrite

## Support

For issues or feature requests, visit:
https://www.notes2free.com/projects/dbms-project-on-online-course-registration-portal-using-php-and-mysql

---

**Deployment Status:** ✓ Project files copied to C:\xampp\htdocs\online-course-registration
