<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../includes/functions.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(false, 'Invalid request method');
}
if (!isset($_POST['csrf_token']) || !verifyCSRFToken($_POST['csrf_token'])) {
    sendJsonResponse(false, 'Invalid security token');
}
try {
    $fullName = sanitizeInput($_POST['full_name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $country = sanitizeInput($_POST['country'] ?? '');
    $supportType = sanitizeInput($_POST['support_type'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    $isAnonymous = isset($_POST['is_anonymous']) ? 1 : 0;
    if (empty($fullName) || empty($email) || empty($supportType)) {
        sendJsonResponse(false, 'Please fill in all required fields');
    }
    if (!isValidEmail($email)) {
        sendJsonResponse(false, 'Please provide a valid email address');
    }
    $phone = !empty($_POST['phone']) ? sanitizeInput($_POST['phone']) : null;
    $amount = null;
    if ($supportType === 'donation') {
        $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : null;
        if ($amount === null || $amount <= 0) {
            sendJsonResponse(false, 'Please provide a valid donation amount');
        }
    }
    $db = Database::getInstance()->getConnection();
    $checkStmt = $db->prepare("SELECT id FROM supporters WHERE email = :email");
    $checkStmt->execute([':email' => $email]);
    if ($checkStmt->fetch()) {
        sendJsonResponse(false, 'This email has already been registered');
    }
    $sql = "INSERT INTO supporters (full_name, email, phone, country, support_type, amount, message, is_anonymous, status) 
            VALUES (:full_name, :email, :phone, :country, :support_type, :amount, :message, :is_anonymous, :status)";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([
        ':full_name' => $fullName,
        ':email' => $email,
        ':phone' => $phone,
        ':country' => $country,
        ':support_type' => $supportType,
        ':amount' => $amount,
        ':message' => $message,
        ':is_anonymous' => $isAnonymous,
        ':status' => 'completed'
    ]);
    if ($result) {
        $supporterId = $db->lastInsertId();
        sendJsonResponse(true, 'Thank you for your support! Your contribution has been recorded.', [
            'supporter_id' => $supporterId
        ]);
    } else {
        sendJsonResponse(false, 'An error occurred while processing your support');
    }
} catch (Exception $e) {
    error_log('Support submission error: ' . $e->getMessage());
    sendJsonResponse(false, 'An error occurred. Please try again later.');
}
?>
