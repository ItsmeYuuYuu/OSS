<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'PHP + MySQL Project'; ?></title>
    <?php
    // Get base path for assets
    $basePath = getBasePath();
    ?>
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/style.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="nav-brand">
                    <a href="<?php echo $basePath; ?>index.php">PHP + MySQL</a>
                </div>
                <ul class="nav-menu">
                    <li><a href="<?php echo $basePath; ?>index.php">Home</a></li>
                    <li><a href="<?php echo $basePath; ?>pages/forum.php">Forum</a></li>
                    <li><a href="<?php echo $basePath; ?>pages/users.php">Users</a></li>
                    <li><a href="<?php echo $basePath; ?>pages/about.php">About</a></li>
                </ul>
            </div>
        </nav>
    </header>

