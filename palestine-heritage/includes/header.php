<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$csrfToken = generateCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover the rich history and culture of Palestine. Support Palestinian heritage and learn about the ongoing crisis.">
    <meta name="keywords" content="Palestine, Palestinian heritage, Gaza, Support Palestine, Palestinian culture">
    <meta name="author" content="Palestine Heritage">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div id="loading-screen" class="loading-screen">
        <div class="loading-content">
            <div class="palestine-flag">
                <div class="flag-stripe black"></div>
                <div class="flag-stripe white"></div>
                <div class="flag-stripe green"></div>
                <div class="flag-triangle red"></div>
            </div>
            <h2 class="loading-text"><?php echo SITE_NAME; ?></h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg fixed-top palestine-nav">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <div class="brand-flag">
                    <div class="mini-flag">
                        <div class="mini-stripe black"></div>
                        <div class="mini-stripe white"></div>
                        <div class="mini-stripe green"></div>
                        <div class="mini-triangle red"></div>
                    </div>
                    <span class="brand-text"><?php echo SITE_NAME; ?></span>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'index' ? 'active' : ''; ?>" href="index.php">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'gaza' ? 'active' : ''; ?>" href="gaza.php">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Gaza</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'support' ? 'active' : ''; ?>" href="support.php">
                            <i class="fas fa-heart"></i>
                            <span>Support</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'gallery' ? 'active' : ''; ?>" href="gallery.php">
                            <i class="fas fa-images"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'supporters' ? 'active' : ''; ?>" href="supporters.php">
                            <i class="fas fa-users"></i>
                            <span>Supporters</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
