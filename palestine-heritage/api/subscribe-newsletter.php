<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../includes/functions.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(false, 'Invalid request method');
}
try {
    $email = sanitizeInput($_POST['email'] ?? '');
    if (empty($email) || !isValidEmail($email)) {
        sendJsonResponse(false, 'Please provide a valid email address');
    }
    $db = Database::getInstance()->getConnection();
    $checkStmt = $db->prepare("SELECT id, is_active FROM newsletter_subscribers WHERE email = :email");
    $checkStmt->execute([':email' => $email]);
    $existing = $checkStmt->fetch();
    if ($existing) {
        if ($existing['is_active']) {
            sendJsonResponse(false, 'This email is already subscribed to our newsletter');
        } else {
            $updateStmt = $db->prepare("UPDATE newsletter_subscribers SET is_active = 1 WHERE id = :id");
            $updateStmt->execute([':id' => $existing['id']]);
            sendJsonResponse(true, 'Welcome back! Your subscription has been reactivated.');
        }
    }
    $stmt = $db->prepare("INSERT INTO newsletter_subscribers (email) VALUES (:email)");
    $result = $stmt->execute([':email' => $email]);
    if ($result) {
        sendJsonResponse(true, 'Thank you for subscribing! You will receive updates about Palestinian heritage and culture.');
    } else {
        sendJsonResponse(false, 'An error occurred while subscribing');
    }
} catch (Exception $e) {
    error_log('Newsletter subscription error: ' . $e->getMessage());
    sendJsonResponse(false, 'An error occurred. Please try again later.');
}
?>
