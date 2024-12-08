<?php
session_start();

// Include database connection
include 'db.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: welcome.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login_process.php" method="post" class="login-form">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form><br><br>
            <div class="links">
                <a href="forgot_password.php">Forgot Password?</a>
                <p>New User? <a href="signup.php">Signup!</a></p>
            </div>
        </div>
    </div>
</body>
</html>
