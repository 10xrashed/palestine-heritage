<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../includes/functions.php';
header('Content-Type: application/json');
try {
    $db = Database::getInstance()->getConnection();
    $totalStmt = $db->query("SELECT COUNT(*) as total FROM supporters WHERE status = 'completed'");
    $totalSupporters = $totalStmt->fetch()['total'];
    $donationsStmt = $db->query("SELECT COALESCE(SUM(amount), 0) as total FROM supporters WHERE support_type = 'donation' AND status = 'completed'");
    $totalDonations = $donationsStmt->fetch()['total'];
    $typeStmt = $db->query("SELECT support_type, COUNT(*) as count FROM supporters WHERE status = 'completed' GROUP BY support_type");
    $supportersByType = $typeStmt->fetchAll();
    $recentStmt = $db->query("SELECT COUNT(*) as count FROM supporters WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND status = 'completed'");
    $recentSupporters = $recentStmt->fetch()['count'];
    $newsletterStmt = $db->query("SELECT COUNT(*) as total FROM newsletter_subscribers WHERE is_active = 1");
    $newsletterSubscribers = $newsletterStmt->fetch()['total'];
    sendJsonResponse(true, 'Statistics retrieved successfully', [
        'total_supporters' => $totalSupporters,
        'total_donations' => formatCurrency($totalDonations),
        'total_donations_raw' => $totalDonations,
        'recent_supporters' => $recentSupporters,
        'newsletter_subscribers' => $newsletterSubscribers,
        'supporters_by_type' => $supportersByType
    ]);
} catch (Exception $e) {
    error_log('Get statistics error: ' . $e->getMessage());
    sendJsonResponse(false, 'An error occurred while fetching statistics');
}
?>
