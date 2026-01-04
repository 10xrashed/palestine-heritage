<?php
echo "<h1>Testing Supporters API</h1>";
echo "<p>Fetching from: api/get-supporters.php?limit=10</p>";
echo "<hr>";

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/api/get-supporters.php?limit=10';
echo "<p><strong>Full URL:</strong> $url</p>";

$response = @file_get_contents($url);

if ($response === false) {
    echo "<p style='color: red;'>ERROR: Could not fetch from API</p>";
    echo "<p>Make sure Apache is running in XAMPP</p>";
} else {
    echo "<p style='color: green;'>SUCCESS: API responded</p>";
    echo "<h3>Response:</h3>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
    
    $data = json_decode($response, true);
    if ($data && isset($data['success']) && $data['success']) {
        echo "<h3>Parsed Data:</h3>";
        echo "<p>Found " . count($data['data']['supporters']) . " supporters</p>";
        echo "<ul>";
        foreach ($data['data']['supporters'] as $supporter) {
            echo "<li>" . htmlspecialchars($supporter['name']) . " - " . htmlspecialchars($supporter['country']) . "</li>";
        }
        echo "</ul>";
    }
}

echo "<hr>";
echo "<p><a href='supporters.php'>Go to Supporters Page</a></p>";
?>
