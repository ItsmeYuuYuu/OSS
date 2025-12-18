<?php
// Include configuration
require_once 'config.php';

// Include header
include 'includes/header.php';

// Connect to database (sample connection)
$connectionStatus = "";
$connectionClass = "";

if (!isDatabaseConfigured()) {
    $connectionStatus = "Database not configured yet";
    $connectionClass = "not-configured";
} else {
    $conn = getDBConnection();
    if ($conn) {
        $connectionStatus = "Connected successfully";
        $connectionClass = "success";
        closeDBConnection($conn);
    } else {
        $connectionStatus = "Connection failed. Please check your database settings in config.php";
        $connectionClass = "failed";
    }
}
?>

<main class="main-content">
    <div class="container">
        <h1 class="main-title">Hello PHP + MySQL</h1>
        <h1 class="main-subtitle">Bài Kiểm Tra - DH52201153 - Ca 2</h1>
        <p class="status-message status-<?php echo $connectionClass; ?>">Database Status: <span id="db-status"><?php echo htmlspecialchars($connectionStatus); ?></span></p>
        <?php if (!isDatabaseConfigured()): ?>
        <div class="info-box warning-box">
            <h3>⚠️ Database Configuration Required</h3>
            <p>Please update <code>config.php</code> with your InfinityFree database credentials:</p>
            <ul>
                <li>DB_USER: Your database username</li>
                <li>DB_PASS: Your database password</li>
                <li>DB_NAME: Your database name</li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="info-box">
            <p>This is a simple web project demonstrating PHP and MySQL integration.</p>
            <p>Compatible with InfinityFree hosting.</p>
        </div>
    </div>
</main>

<?php
// Include footer
include 'includes/footer.php';
?>






