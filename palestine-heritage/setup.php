<?php
/**
 * Setup Script for Palestine Heritage Website
 * Run this file once to verify your XAMPP installation
 * Access: http://localhost/palestine-heritage/setup.php
 */

$checks = [];
$allPassed = true;
$phpVersion = phpversion();
$checks[] = [
    'name' => 'PHP Version',
    'status' => version_compare($phpVersion, '7.4.0', '>='),
    'message' => "PHP $phpVersion " . (version_compare($phpVersion, '7.4.0', '>=') ? '✓' : '✗ (requires 7.4+)'),
    'required' => true
];
$pdoAvailable = extension_loaded('pdo') && extension_loaded('pdo_mysql');
$checks[] = [
    'name' => 'PDO MySQL Extension',
    'status' => $pdoAvailable,
    'message' => $pdoAvailable ? 'PDO MySQL is available ✓' : 'PDO MySQL is NOT available ✗',
    'required' => true
];
try {
    require_once 'config/database.php';
    $db = Database::getInstance()->getConnection();
    $checks[] = [
        'name' => 'Database Connection',
        'status' => true,
        'message' => 'Successfully connected to database ✓',
        'required' => true
    ];
} catch (Exception $e) {
    $checks[] = [
        'name' => 'Database Connection',
        'status' => false,
        'message' => 'Database connection failed: ' . $e->getMessage() . ' ✗',
        'required' => true
    ];
    $allPassed = false;
}
$configExists = file_exists('config/config.php');
$checks[] = [
    'name' => 'Configuration File',
    'status' => $configExists,
    'message' => $configExists ? 'config.php found ✓' : 'config.php NOT found ✗',
    'required' => true
];
$cssExists = file_exists('assets/css/main.css');
$jsExists = file_exists('assets/js/main.js');
$assetsOk = $cssExists && $jsExists;
$checks[] = [
    'name' => 'Assets Files',
    'status' => $assetsOk,
    'message' => $assetsOk ? 'CSS and JS files found ✓' : 'Missing CSS or JS files ✗',
    'required' => false
];

if ($checks[2]['status']) {
    try {
        $tables = ['supporters', 'newsletter_subscribers', 'contact_messages', 'gallery_likes'];
        $missingTables = [];
        
        foreach ($tables as $table) {
            $stmt = $db->query("SHOW TABLES LIKE '$table'");
            if ($stmt->rowCount() == 0) {
                $missingTables[] = $table;
            }
        }
        
        if (empty($missingTables)) {
            $checks[] = [
                'name' => 'Database Tables',
                'status' => true,
                'message' => 'All required tables exist ✓',
                'required' => true
            ];
        } else {
            $checks[] = [
                'name' => 'Database Tables',
                'status' => false,
                'message' => 'Missing tables: ' . implode(', ', $missingTables) . ' ✗',
                'required' => true
            ];
            $allPassed = false;
        }
    } catch (Exception $e) {
        $checks[] = [
            'name' => 'Database Tables',
            'status' => false,
            'message' => 'Could not check tables: ' . $e->getMessage() . ' ✗',
            'required' => true
        ];
        $allPassed = false;
    }
}
$uploadsDir = 'assets/uploads/';
if (!file_exists($uploadsDir)) {
    @mkdir($uploadsDir, 0777, true);
}
$writable = is_writable('assets/');
$checks[] = [
    'name' => 'Write Permissions',
    'status' => $writable,
    'message' => $writable ? 'Assets directory is writable ✓' : 'Assets directory is NOT writable ✗',
    'required' => false
];

foreach ($checks as $check) {
    if ($check['required'] && !$check['status']) {
        $allPassed = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup - Palestine Heritage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 800px;
            width: 100%;
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #E4312b 0%, #149954 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1em;
            opacity: 0.95;
        }
        
        .content {
            padding: 40px;
        }
        
        .status-banner {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
        
        .status-banner.success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .status-banner.error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        
        .check-item {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            background: #f8f9fa;
            transition: all 0.3s;
        }
        
        .check-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .check-item.pass {
            border-left: 5px solid #28a745;
        }
        
        .check-item.fail {
            border-left: 5px solid #dc3545;
        }
        
        .check-icon {
            font-size: 2em;
            margin-right: 20px;
            min-width: 40px;
        }
        
        .check-details {
            flex: 1;
        }
        
        .check-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .check-message {
            color: #666;
            line-height: 1.6;
        }
        
        .actions {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 2px solid #e9ecef;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.1em;
            font-weight: bold;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            margin: 10px;
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #E4312b 0%, #149954 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .instructions {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
        
        .instructions h3 {
            color: #856404;
            margin-bottom: 15px;
        }
        
        .instructions ol {
            margin-left: 20px;
            color: #856404;
        }
        
        .instructions li {
            margin: 10px 0;
            line-height: 1.6;
        }
        
        .instructions code {
            background: #fff;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🇵🇸 Palestine Heritage</h1>
            <p>XAMPP Setup Verification</p>
        </div>
        
        <div class="content">
            <?php if ($allPassed): ?>
                <div class="status-banner success">
                    ✓ All Checks Passed! Your installation is ready.
                </div>
            <?php else: ?>
                <div class="status-banner error">
                    ✗ Some Checks Failed. Please fix the issues below.
                </div>
            <?php endif; ?>
            
            <div class="checks">
                <?php foreach ($checks as $check): ?>
                    <div class="check-item <?php echo $check['status'] ? 'pass' : 'fail'; ?>">
                        <div class="check-icon">
                            <?php echo $check['status'] ? '✓' : '✗'; ?>
                        </div>
                        <div class="check-details">
                            <div class="check-name"><?php echo $check['name']; ?></div>
                            <div class="check-message"><?php echo $check['message']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="actions">
                <?php if ($allPassed): ?>
                    <a href="index.php" class="btn btn-primary">Go to Homepage →</a>
                    <a href="support.php" class="btn btn-primary">Test Support Form →</a>
                <?php else: ?>
                    <button onclick="location.reload()" class="btn btn-secondary">Refresh Checks</button>
                <?php endif; ?>
            </div>
            
            <?php if (!$allPassed): ?>
                <div class="instructions">
                    <h3>⚠️ Troubleshooting Steps:</h3>
                    <ol>
                        <li>Make sure <strong>Apache</strong> and <strong>MySQL</strong> are running in XAMPP Control Panel (both should show green)</li>
                        <li>Create database: Go to <code>http://localhost/phpmyadmin</code> → New → Database name: <code>palestine_heritage</code> → Create</li>
                        <li>Import tables: Select database → Import tab → Choose <code>database/schema.sql</code> → Go</li>
                        <li>Check file paths: Make sure project is in <code>C:\xampp\htdocs\palestine-heritage\</code> (Windows) or <code>/Applications/XAMPP/htdocs/palestine-heritage/</code> (Mac)</li>
                        <li>Verify database settings in <code>config/database.php</code>: host=<code>localhost</code>, username=<code>root</code>, password=<code>(empty)</code></li>
                    </ol>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
