<?php
$host = "localhost";              // Database host
$dbname = "food_tracking";        // Replace with your actual database name
$user = "root";                   // Default XAMPP MySQL username
$pass = "";                       // Default XAMPP MySQL password (empty)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database connection successful."; // Optional: for testing
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
