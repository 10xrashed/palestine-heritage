<?php
/**
 * Database Setup Script
 * Run this file once to create and populate the database
 * Access: http://localhost/palestine-heritage/setup-database.php
 */

require_once 'config/database.php';

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup - Palestine Heritage</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(135deg, #00843d 0%, #ce1126 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 { 
            color: #00843d; 
            margin-bottom: 30px; 
            text-align: center;
            font-size: 2em;
        }
        .step {
            background: #f8f9fa;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            border-left: 5px solid #00843d;
        }
        .step h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .success { 
            background: #d4edda; 
            color: #155724; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 10px 0;
            border-left: 5px solid #28a745;
        }
        .error { 
            background: #f8d7da; 
            color: #721c24; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 10px 0;
            border-left: 5px solid #dc3545;
        }
        .info { 
            background: #d1ecf1; 
            color: #0c5460; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 10px 0;
            border-left: 5px solid #17a2b8;
        }
        button {
            background: #00843d;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background 0.3s;
        }
        button:hover { background: #006930; }
        .code {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
        }
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🇵🇸 Palestine Heritage - Database Setup</h1>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<div class="step"><h3>Setting up database...</h3>';
            
            try {
               
                $schemaFile = __DIR__ . '/database/schema.sql';
                $seedFile = __DIR__ . '/database/seed.sql';
                
                if (!file_exists($schemaFile)) {
                    throw new Exception('Schema file not found: ' . $schemaFile);
                }
                
                $pdo = new PDO(
                    'mysql:host=' . DB_HOST,
                    DB_USER,
                    DB_PASS,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                );
                
                echo '<div class="success">✓ Connected to MySQL server</div>';
                
                $schema = file_get_contents($schemaFile);
                $statements = array_filter(array_map('trim', explode(';', $schema)));
                
                foreach ($statements as $statement) {
                    if (!empty($statement)) {
                        $pdo->exec($statement);
                    }
                }
                
                echo '<div class="success">✓ Database schema created successfully</div>';
                
                if (file_exists($seedFile)) {
                    $seed = file_get_contents($seedFile);
                    $statements = array_filter(array_map('trim', explode(';', $seed)));
                    
                    foreach ($statements as $statement) {
                        if (!empty($statement) && stripos($statement, 'SELECT') !== 0) {
                            $pdo->exec($statement);
                        }
                    }
                    
                    echo '<div class="success">✓ Sample data inserted successfully</div>';
                }
                
                $pdo->exec('USE ' . DB_NAME);
                $stmt = $pdo->query("SELECT COUNT(*) as count FROM supporters WHERE status='completed'");
                $supporterCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
                
                echo '<div class="info">📊 Database Statistics:<br>';
                echo '• Supporters: ' . $supporterCount . '<br>';
                echo '• Database: ' . DB_NAME . '</div>';
                
                echo '<div class="success" style="margin-top: 20px;">
                    <h3>✅ Setup Complete!</h3>
                    <p>Your database is ready to use. You can now:</p>
                    <ul style="margin: 10px 0 10px 20px;">
                        <li>Visit the <a href="index.php" style="color: #00843d; font-weight: bold;">Homepage</a></li>
                        <li>View <a href="supporters.php" style="color: #00843d; font-weight: bold;">Supporters</a></li>
                        <li>Check <a href="support.php" style="color: #00843d; font-weight: bold;">Support Form</a></li>
                    </ul>
                </div>';
                
                echo '<div class="info" style="margin-top: 20px;">
                    <strong>🔒 Security Note:</strong> Delete this setup file after running it for security.
                </div>';
                
            } catch (Exception $e) {
                echo '<div class="error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
                echo '<div class="info">Please check your database configuration in config/database.php</div>';
            }
            
            echo '</div>';
        } else {
        ?>
        
        <div class="step">
            <h3>📋 Step 1: Prerequisites</h3>
            <p>Make sure you have:</p>
            <ul style="margin: 10px 0 10px 20px; line-height: 1.8;">
                <li>✓ XAMPP installed and running</li>
                <li>✓ MySQL service started</li>
                <li>✓ Project folder in htdocs directory</li>
            </ul>
        </div>

        <div class="step">
            <h3>⚙️ Step 2: Database Configuration</h3>
            <p>Current settings:</p>
            <div class="code">
Host: <?php echo DB_HOST; ?><br>
User: <?php echo DB_USER; ?><br>
Database: <?php echo DB_NAME; ?>
            </div>
            <p style="margin-top: 10px;">Update these in <code>config/database.php</code> if needed.</p>
        </div>

        <div class="step">
            <h3>🚀 Step 3: Run Setup</h3>
            <p>Click the button below to create the database and insert sample data:</p>
            <form method="POST">
                <button type="submit">
                    Setup Database Now
                </button>
            </form>
        </div>

        <div class="info" style="margin-top: 20px;">
            <strong>ℹ️ What this will do:</strong>
            <ul style="margin: 10px 0 0 20px; line-height: 1.8;">
                <li>Create the <code>palestine_heritage</code> database</li>
                <li>Create all required tables (supporters, newsletter, contacts, gallery_likes)</li>
                <li>Insert 20 sample supporters with realistic data</li>
                <li>Add sample newsletter subscribers</li>
            </ul>
        </div>
        
        <?php } ?>
    </div>
</body>
</html>
