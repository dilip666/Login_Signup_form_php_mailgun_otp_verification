<?php
session_start();
include 'db.php';
include 'send_email.php';

// Get user data from the signup form
$full_name = $_POST['full_name'];
$dob = $_POST['dob'];
$country = $_POST['country'];
$state = $_POST['state'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security
$otp = rand(100000, 999999); // Generate a random 6-digit OTP


// Store user data and OTP in the database
$sql = "INSERT INTO users (full_name, dob, gender, country, state, mobile, email, password, otp, is_verified) 
        VALUES ('$full_name', '$dob','$gender','$country','$state', '$mobile', '$email', '$password', '$otp', 0)";
if ($conn->query($sql) === TRUE) {
    $_SESSION['email'] = $email; // Store email in session for verification
    sendOtpEmail($email, $otp); // Send OTP email
    header("Location: verify_otp.php"); // Redirect to OTP verification page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
