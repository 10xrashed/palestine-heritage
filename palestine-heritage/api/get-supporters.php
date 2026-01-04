<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/database.php';
require_once dirname(__DIR__) . '/includes/functions.php';
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
try {
    $limit = isset($_GET['limit']) ? max(1, intval($_GET['limit'])) : 10;
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($page - 1) * $limit;
    try {
        $db = Database::getInstance()->getConnection();
    } catch (Exception $dbError) {
        sendJsonResponse(false, 'Database not set up. Please run install.php first to create the database.');
        exit;
    }
    if (!$db) {
        sendJsonResponse(false, 'Database connection failed. Please check your configuration.');
        exit;
    }
    try {
        $checkTable = $db->query("SHOW TABLES LIKE 'supporters'");
        if ($checkTable->rowCount() === 0) {
            sendJsonResponse(false, 'Database tables not created. Please run install.php to set up the database.');
            exit;
        }
    } catch (Exception $e) {
        sendJsonResponse(false, 'Database error. Please run install.php to set up the database.');
        exit;
    }
    $countStmt = $db->query("SELECT COUNT(*) as total FROM supporters WHERE status = 'completed'");
    $totalCount = $countStmt->fetch()['total'];
    if ($totalCount === 0) {
        sendJsonResponse(true, 'No supporters yet', [
            'supporters' => [],
            'pagination' => [
                'current_page' => 1,
                'total_pages' => 0,
                'total_count' => 0
            ]
        ]);
        exit;
    }
    $sql = "SELECT 
                CASE WHEN is_anonymous = 1 THEN 'Anonymous Supporter' ELSE full_name END as name,
                country,
                support_type,
                amount,
                message,
                created_at
            FROM supporters 
            WHERE status = 'completed'
            ORDER BY amount DESC, created_at DESC
            LIMIT :limit OFFSET :offset";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $supporters = $stmt->fetchAll();
    foreach ($supporters as &$supporter) {
        $supporter['time_ago'] = timeAgo($supporter['created_at']);
        if ($supporter['amount']) {
            $supporter['formatted_amount'] = formatCurrency($supporter['amount']);
        }
    }
    sendJsonResponse(true, 'Supporters retrieved successfully', [
        'supporters' => $supporters,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => ceil($totalCount / $limit),
            'total_count' => $totalCount
        ]
    ]);
} catch (Exception $e) {
    error_log('Get supporters error: ' . $e->getMessage());
    error_log('Stack trace: ' . $e->getTraceAsString());
    sendJsonResponse(false, 'Error: ' . $e->getMessage() . '. Please run install.php to set up the database.');
}
?>
