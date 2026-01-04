# Palestine Heritage - PHP & MySQL Website

A dynamic website dedicated to preserving and sharing Palestinian heritage, culture, and history.

## Features

- Dynamic PHP-based architecture
- MySQL database integration
- Supporter registration system
- Newsletter subscription
- Live statistics dashboard
- Donation tracking
- Responsive modern UI
- CSRF protection
- SQL injection prevention
- AOS animations
- Real-time data updates

## Requirements

- XAMPP (includes PHP 7.4+, MySQL, and Apache)
- Web browser (Chrome, Firefox, Safari, Edge)

## XAMPP Installation & Setup

### Step 1: Install XAMPP
1. Download XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Install XAMPP (default location: `C:\xampp` on Windows or `/Applications/XAMPP` on Mac)
3. Launch XAMPP Control Panel

### Step 2: Start Services
1. Open XAMPP Control Panel
2. Click "Start" for **Apache** (web server)
3. Click "Start" for **MySQL** (database server)
4. Both should show green "Running" status

### Step 3: Copy Project Files
1. Navigate to XAMPP's `htdocs` folder:
   - Windows: `C:\xampp\htdocs\`
   - Mac: `/Applications/XAMPP/htdocs/`
   - Linux: `/opt/lampp/htdocs/`
2. Create a new folder: `palestine-heritage`
3. Copy all project files into `htdocs/palestine-heritage/`

### Step 4: Create Database
1. Open your browser and go to: `http://localhost/phpmyadmin`
2. Click "New" in the left sidebar
3. Database name: `palestine_heritage`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Step 5: Import Database Schema
1. In phpMyAdmin, select the `palestine_heritage` database
2. Click "Import" tab at the top
3. Click "Choose File" and select `database/schema.sql` from your project
4. Scroll down and click "Go"
5. You should see "Import has been successfully finished"

### Step 6: Verify Database Configuration
The database settings are already configured for XAMPP defaults:
- Host: `localhost`
- Username: `root`
- Password: (empty)
- Database: `palestine_heritage`

No changes needed in `config/database.php`!

### Step 7: Access Your Website
1. Open your browser
2. Go to: `http://localhost/palestine-heritage/`
3. Your website should now be running!

## Project Structure

```
palestine-heritage/
├── api/                    # API endpoints
│   ├── submit-support.php
│   ├── subscribe-newsletter.php
│   ├── get-supporters.php
│   └── get-statistics.php
├── assets/
│   ├── css/
│   │   └── main.css       # Main stylesheet
│   └── js/
│       └── main.js        # Main JavaScript
├── config/
│   ├── database.php       # Database connection
│   └── config.php         # Site configuration
├── database/
│   └── schema.sql         # Database structure
├── includes/
│   ├── header.php         # Header template
│   ├── footer.php         # Footer template
│   └── functions.php      # Utility functions
├── public/                # Images and assets
├── index.php              # Homepage
├── support.php            # Support page
├── supporters.php         # Supporters list
├── gaza.php               # Gaza information
├── gallery.php            # Photo gallery
└── README.md
```

## Database Structure

### Tables:

**supporters** - Stores supporter information
- id, name, email, amount, message, is_anonymous, created_at

**newsletter_subscribers** - Email subscriptions
- id, email, subscribed_at, is_active

**contact_messages** - Contact form submissions
- id, name, email, subject, message, created_at, is_read

**gallery_likes** - Image likes tracking
- id, image_id, user_ip, created_at

## Pages Overview

- **index.php** - Homepage with Palestinian history and culture
- **support.php** - Support form with donation options
- **supporters.php** - List of all supporters (paginated)
- **gaza.php** - Gaza crisis information and statistics
- **gallery.php** - Photo gallery with lightbox

## API Endpoints

All API endpoints return JSON responses:

- `POST api/submit-support.php` - Submit support form
- `POST api/subscribe-newsletter.php` - Newsletter subscription
- `GET api/get-supporters.php` - Retrieve supporters (with pagination)
- `GET api/get-statistics.php` - Get live statistics

## Testing the Website

### Test Support Form:
1. Go to `http://localhost/palestine-heritage/support.php`
2. Fill in the form with test data
3. Submit and check for success message
4. View supporter in `http://localhost/palestine-heritage/supporters.php`

### Test Newsletter:
1. Scroll to footer on any page
2. Enter test email
3. Submit and check for success toast

### View Database:
1. Go to `http://localhost/phpmyadmin`
2. Select `palestine_heritage` database
3. Click on any table to view data

## Customization

### Change Colors:
Edit CSS variables in `assets/css/main.css`:
```css
:root {
    --color-red: #E4312b;
    --color-green: #149954;
    --color-black: #000000;
    --color-white: #ffffff;
}
```

### Change Site Title:
Edit `config/config.php`:
```php
define('SITE_NAME', 'Your Site Name');
```

### Add More Supporters:
Use the support form or insert directly via phpMyAdmin

## Troubleshooting

### Apache won't start:
- Port 80 might be in use
- In XAMPP Config, change Apache port to 8080
- Access site at `http://localhost:8080/palestine-heritage/`

### MySQL won't start:
- Port 3306 might be in use
- Stop other MySQL services
- Restart XAMPP

### Database connection error:
- Verify MySQL is running in XAMPP
- Check database name is `palestine_heritage`
- Verify username is `root` with no password

### Page shows PHP code:
- Ensure Apache is running
- Access via `http://localhost/` not `file://`

### CSS/JS not loading:
- Check file paths in `includes/header.php`
- Clear browser cache (Ctrl+Shift+R)

## Security Features

- CSRF token protection on all forms
- SQL injection prevention via PDO prepared statements
- XSS protection with htmlspecialchars()
- Input validation and sanitization
- Secure session management

## Development Tips

### Enable Error Display:
Edit `config/config.php`:
```php
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

### Database Queries:
Use the Database class for all queries:
```php
$db = Database::getInstance()->getConnection();
$stmt = $db->prepare("SELECT * FROM supporters");
$stmt->execute();
```

## Contact & Support

For questions or issues:
- Email: admin@palestineheritage.com
- Check XAMPP documentation: [https://www.apachefriends.org/docs/](https://www.apachefriends.org/docs/)
