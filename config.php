<?php
/**
 * Database Configuration
 * Compatible with InfinityFree hosting
 */

// Database connection settings
// InfinityFree database configuration
// Host: sql107.infinityfree.com
// Database: if0_40410414_forum_db
define('DB_HOST', 'sql107.infinityfree.com'); // InfinityFree database host
define('DB_USER', 'if0_40410414'); // Replace with your InfinityFree database username (e.g., if0_40410414)
define('DB_PASS', '23102004ttg'); // Replace with your InfinityFree database password
define('DB_NAME', 'if0_40410414_forum_db'); // Database name

// Check if database is configured
function isDatabaseConfigured() {
    return DB_USER !== 'your_username' && 
           DB_PASS !== 'your_password' && 
           DB_NAME !== 'your_database';
}

// Create connection
function getDBConnection() {
    // Check if database is configured
    if (!isDatabaseConfigured()) {
        return false;
    }
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if (!$conn) {
        return false;
    }
    
    // Set charset to UTF-8
    mysqli_set_charset($conn, "utf8");
    
    return $conn;
}

// Close connection
function closeDBConnection($conn) {
    mysqli_close($conn);
}
?>

