CREATE DATABASE IF NOT EXISTS palestine_heritage CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE palestine_heritage;
CREATE TABLE IF NOT EXISTS supporters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(50),
    country VARCHAR(100),
    support_type ENUM('donation', 'volunteer', 'awareness', 'advocacy', 'other') NOT NULL,
    amount DECIMAL(10, 2) DEFAULT NULL,
    message TEXT,
    is_anonymous BOOLEAN DEFAULT FALSE,
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_support_type (support_type),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    is_active BOOLEAN DEFAULT TRUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(500),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS gallery_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_id VARCHAR(100) NOT NULL,
    user_ip VARCHAR(45) NOT NULL,
    liked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_like (image_id, user_ip),
    INDEX idx_image_id (image_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO supporters (full_name, email, country, support_type, amount, message, is_anonymous, status) VALUES
('Ahmed Hassan', 'ahmed.hassan@example.com', 'Palestine', 'donation', 100.00, 'Supporting my beloved homeland', FALSE, 'completed'),
('Sarah Johnson', 'sarah.j@example.com', 'United States', 'donation', 250.00, 'Standing with Palestine', FALSE, 'completed'),
('Anonymous Donor', 'anonymous1@example.com', 'United Kingdom', 'donation', 500.00, 'For the children of Gaza', TRUE, 'completed'),
('Omar Al-Masri', 'omar.masri@example.com', 'Jordan', 'volunteer', NULL, 'I want to help in any way possible', FALSE, 'pending'),
('Maria Garcia', 'maria.garcia@example.com', 'Spain', 'awareness', NULL, 'Spreading awareness through social media', FALSE, 'completed');
