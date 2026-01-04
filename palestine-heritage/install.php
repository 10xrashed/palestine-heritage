<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'palestine_heritage';

echo "<h1>Palestine Heritage Database Setup</h1>";

try {
    $conn = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>✓ Connected to MySQL server</p>";
    $conn->exec("CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "<p>✓ Database '$db_name' created/exists</p>";
    $conn->exec("USE $db_name");
    $conn->exec("
        CREATE TABLE IF NOT EXISTS supporters (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            country VARCHAR(50),
            support_type ENUM('donation', 'volunteer', 'awareness', 'advocacy', 'other') NOT NULL,
            amount DECIMAL(10, 2) DEFAULT NULL,
            message TEXT,
            is_anonymous BOOLEAN DEFAULT FALSE,
            status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_email (email),
            INDEX idx_support_type (support_type),
            INDEX idx_amount (amount),
            INDEX idx_created_at (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    echo "<p>✓ Table 'supporters' created</p>";
    $conn->exec("
        CREATE TABLE IF NOT EXISTS newsletter_subscribers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(100) NOT NULL UNIQUE,
            is_active BOOLEAN DEFAULT TRUE,
            subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    echo "<p>✓ Table 'newsletter_subscribers' created</p>";
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS contact_messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            subject VARCHAR(200),
            message TEXT NOT NULL,
            is_read BOOLEAN DEFAULT FALSE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_created_at (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    echo "<p>✓ Table 'contact_messages' created</p>";
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS gallery_likes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            image_id VARCHAR(50) NOT NULL,
            user_ip VARCHAR(45) NOT NULL,
            liked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY unique_like (image_id, user_ip),
            INDEX idx_image_id (image_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    echo "<p>✓ Table 'gallery_likes' created</p>";
    $stmt = $conn->prepare("SELECT COUNT(*) FROM supporters");
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    if ($count == 0) {
        $conn->exec("
            INSERT INTO supporters (full_name, email, country, support_type, amount, message, is_anonymous, status) VALUES
            ('Yusuf Ibrahim', 'yusuf.ibrahim@example.com', 'Qatar', 'donation', 600.00, 'From Qatar with prayers', FALSE, 'completed'),
            ('Anonymous Supporter', 'anonymous6@example.com', 'Norway', 'donation', 450.00, 'For Palestinian children', TRUE, 'completed'),
            ('Anonymous Supporter', 'anonymous4@example.com', 'France', 'donation', 400.00, 'Free Palestine', TRUE, 'completed'),
            ('Noor Abdullah', 'noor.abdullah@example.com', 'Saudi Arabia', 'donation', 350.00, 'May Palestine be free', FALSE, 'completed'),
            ('Anonymous Supporter', 'anonymous2@example.com', 'Canada', 'donation', 300.00, 'Peace for Palestine', TRUE, 'completed'),
            ('Anonymous Supporter', 'anonymous5@example.com', 'Sweden', 'donation', 275.00, 'Solidarity with Palestine', TRUE, 'completed'),
            ('Sarah Johnson', 'sarah.j@example.com', 'United States', 'donation', 250.00, 'Standing with Palestine', FALSE, 'completed'),
            ('Hassan Khalil', 'hassan.khalil@example.com', 'Kuwait', 'donation', 225.00, 'Support from Kuwait', FALSE, 'completed'),
            ('Anonymous Supporter', 'anonymous3@example.com', 'Germany', 'donation', 200.00, 'Justice for Palestine', TRUE, 'completed'),
            ('David Chen', 'david.chen@example.com', 'Malaysia', 'donation', 180.00, 'Supporting Palestinian rights', FALSE, 'completed')
        ");
        echo "<p>✓ Inserted 10 sample supporters</p>";
    } else {
        echo "<p>⚠ Database already has $count supporters</p>";
    }
    
    echo "<h2 style='color: green;'>✓ Installation Complete!</h2>";
    echo "<p><a href='index.php'>Go to Homepage</a> | <a href='supporters.php'>View Supporters</a></p>";
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}
?>
