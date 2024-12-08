<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css"> <!-- Common styles -->
    <link rel="stylesheet" href="signup.css"> <!-- Signup-specific styles -->
    <script>
        // Fetch states based on country selection
        function fetchStates(countryId) {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_states.php?country_id=" + countryId, true);
            xhr.onload = function () {
                document.getElementById("state").innerHTML = this.responseText;
            };
            xhr.send();
        }

        // Inline validation for email
        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const feedback = document.getElementById('emailFeedback');
            if (emailPattern.test(email)) {
                feedback.textContent = "Valid email address.";
                feedback.style.color = "green";
            } else {
                feedback.textContent = "Invalid email address.";
                feedback.style.color = "red";
            }
        }

        // Inline validation for mobile
        function validateMobile(mobile) {
            const mobilePattern = /^[0-9]{10}$/;
            const feedback = document.getElementById('mobileFeedback');
            if (mobilePattern.test(mobile)) {
                feedback.textContent = "Valid mobile number.";
                feedback.style.color = "green";
            } else {
                feedback.textContent = "Invalid mobile number. Must be 10 digits.";
                feedback.style.color = "red";
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="form-box">
        <h2>Signup</h2>
        <form action="signup_process.php" method="post">
            <div class="input-box">
                <label for="country">Country:</label>
                <select name="country" id="country" onchange="fetchStates(this.value)" required>
                    <option value="">Select Country</option>
                    <?php
                    $result = $conn->query("SELECT * FROM countries");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input-box">
                <label for="state">State:</label>
                <select name="state" id="state" required>
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="input-box">
                <input type="text" name="full_name" required placeholder="Full Name" maxlength="50">
            </div>

            <div class="input-box">
                <input type="date" name="dob" max="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="gender-group">
                <label>Gender:</label>
                <label><input type="radio" name="gender" value="male" required> Male</label>
                <label><input type="radio" name="gender" value="female" required> Female</label>
                <label><input type="radio" name="gender" value="others" required> Others</label>
            </div>

            <div class="input-box">
                <input type="email" name="email" id="email" required placeholder="Email" onblur="validateEmail(this.value)">
                <div id="emailFeedback" class="validation-feedback"></div>
            </div>

            <div class="input-box">
                <input type="text" name="mobile" id="mobile" required placeholder="Mobile No." onblur="validateMobile(this.value)">
                <div id="mobileFeedback" class="validation-feedback"></div>
            </div>

            <div class="input-box">
                <input type="password" name="password" required placeholder="Password" minlength="6">
            </div>

            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here!</a></p>
    </div>
</div>
