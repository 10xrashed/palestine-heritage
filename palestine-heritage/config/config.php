<?php
define('SITE_NAME', 'Palestine Heritage');
define('SITE_URL', 'http://localhost/palestine-heritage');
define('ADMIN_EMAIL', 'admin@palestineheritage.com');
define('ENCRYPTION_KEY', 'your-secret-encryption-key-change-this');
define('SESSION_LIFETIME', 3600); 
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-password');
define('SMTP_FROM_EMAIL', 'noreply@palestineheritage.com');
define('SMTP_FROM_NAME', 'Palestine Heritage');
define('ITEMS_PER_PAGE', 20);
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); 
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
date_default_timezone_set('Asia/Jerusalem');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>