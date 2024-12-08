<?php
session_start();
include 'db.php';

// Check if the session contains the email and the POST request contains the OTP
if (!isset($_SESSION['email']) || !isset($_POST['otp'])) {
    echo "Session expired or OTP missing. Please <a href='verify_otp.php'>try again</a>.";
    exit();
}

$email = $conn->real_escape_string($_SESSION['email']); // Secure email input
$otp = $conn->real_escape_string($_POST['otp']);        // Secure OTP input

// Verify OTP
$sql = "SELECT * FROM users WHERE email=? AND otp=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $email, $otp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update user verification status
    $sql_update = "UPDATE users SET is_verified=1 WHERE email=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('s', $email);
    $stmt_update->execute();
    
    // Redirect to login or welcome page based on preference
    unset($_SESSION['error_message']); // Clear any error messages

    // Option 1: Redirect to login page for explicit login
    header("Location: login.php"); // User should log in explicitly
    exit();

    // Option 2: Redirect to welcome page (if auto-login is required)
    // $_SESSION['logged_in'] = true; // Set session login flag
    // header("Location: welcome.php");
    // exit();
    
} else {
    // Handle incorrect OTP
    $_SESSION['error_message'] = "Wrong OTP. Please try again.";
    header("Location: verify_otp.php");
    exit();
}

// Close connections
$stmt->close();
$conn->close();
?>
