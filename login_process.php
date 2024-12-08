<?php
session_start(); // Start session
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Query to check if the email exists
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the password is correct
        if (password_verify($password, $user['password'])) {
            if ($user['is_verified'] == 1) {
                // Store user info in the session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // Redirect to welcome page
                header('Location: welcome.php');
                exit();
            } else {
                echo "Account not verified. Please verify your email.";
            }
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
