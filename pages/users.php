<?php
// Include configuration
require_once '../config.php';

// Set page title
$pageTitle = 'Users Table - PHP + MySQL Project';

// Include header
include '../includes/header.php';

// Check database connection
$conn = null;
$users = [];
$error = null;

if (isDatabaseConfigured()) {
    $conn = getDBConnection();
    if ($conn) {
        // Fetch all users
        $query = "SELECT id, username, role, created_at FROM users ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        } else {
            $error = "Error fetching users: " . mysqli_error($conn);
        }
    } else {
        $error = "Failed to connect to database";
    }
}
?>

<main class="main-content">
    <div class="container">
        <h1 class="main-title">Users Table</h1>
        
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
        <?php elseif (empty($users)): ?>
            <div class="info-box">
                <p>No users found in the database.</p>
            </div>
        <?php else: ?>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $user['role'] === 'admin' ? 'admin' : 'user'; ?>">
                                        <?php echo htmlspecialchars($user['role']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($user['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="table-info">
                    <p>Total users: <strong><?php echo count($users); ?></strong></p>
                </div>
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

