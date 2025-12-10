<?php
// Include configuration
require_once '../config.php';

// Set page title
$pageTitle = 'Forum - PHP + MySQL Project';

// Include header
include '../includes/header.php';

// Check database connection
$conn = null;
$threads = [];
$error = null;

if (isDatabaseConfigured()) {
    $conn = getDBConnection();
    if ($conn) {
        // Fetch threads with user information
        $query = "SELECT t.*, u.username 
                  FROM threads t 
                  JOIN users u ON t.user_id = u.id 
                  ORDER BY t.created_at DESC 
                  LIMIT 10";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $threads[] = $row;
            }
        } else {
            $error = "Error fetching threads: " . mysqli_error($conn);
        }
    } else {
        $error = "Failed to connect to database";
    }
}
?>

<main class="main-content">
    <div class="container">
        <h1 class="main-title">Forum Threads</h1>
        
        <?php if (!isDatabaseConfigured()): ?>
            <div class="info-box warning-box">
                <h3>⚠️ Database Configuration Required</h3>
                <p>Please update <code>config.php</code> with your InfinityFree database credentials.</p>
            </div>
        <?php elseif ($error): ?>
            <div class="info-box error-box">
                <h3>❌ Error</h3>
                <p><?php echo htmlspecialchars($error); ?></p>
            </div>
        <?php elseif (empty($threads)): ?>
            <div class="info-box">
                <p>No threads found in the database.</p>
            </div>
        <?php else: ?>
            <div class="threads-list">
                <?php foreach ($threads as $thread): ?>
                    <div class="thread-card">
                        <h3><?php echo htmlspecialchars($thread['title']); ?></h3>
                        <div class="thread-meta">
                            <span class="author">By: <?php echo htmlspecialchars($thread['username']); ?></span>
                            <span class="date"><?php echo date('d/m/Y H:i', strtotime($thread['created_at'])); ?></span>
                        </div>
                        <p class="thread-content"><?php echo nl2br(htmlspecialchars(substr($thread['content'], 0, 200))); ?><?php echo strlen($thread['content']) > 200 ? '...' : ''; ?></p>
                        <?php if ($thread['image']): ?>
                            <div class="thread-image">
                                <small>Image: <?php echo htmlspecialchars($thread['image']); ?></small>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
if ($conn) {
    closeDBConnection($conn);
}
include '../includes/footer.php';
?>

