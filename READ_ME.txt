# Login and Signup Form with OTP Verification (Mailgun)

This repository contains a PHP-based login and signup form that uses Mailgun to send OTPs (One-Time Passwords) for email verification. The project ensures secure user authentication and verification.

## Features

- **User Registration**: Allows users to sign up with an email and password.
- **Login**: Registered users can log in securely.
- **Email Verification**: Sends an OTP to the user's email for verification via Mailgun.
- **Secure OTP System**: OTPs are securely generated and validated within a time limit.
- **Responsive Design**: Compatible with both desktop and mobile devices.

## Prerequisites

- **Server**: A server capable of running PHP (e.g., XAMPP, WAMP, or live server).
- **Mailgun Account**: Active Mailgun account to send emails.
- **PHP Version**: PHP 7.4 or above.
- **Database**: MySQL database for user storage.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/Login_Signup_form_php_mailgun_otp_verification.git
   ```

2. **Set Up Database**:
   - Import the `database.sql` file into your MySQL database.
   - Update database credentials in the `config.php` file:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     define('DB_NAME', 'your_database_name');
     ```

3. **Configure Mailgun**:
   - Update the Mailgun API key and domain in `mailgun.php`:
     ```php
     define('MAILGUN_API_KEY', 'your-mailgun-api-key');
     define('MAILGUN_DOMAIN', 'your-mailgun-domain');
     ```

4. **Run the Application**:
   - Place the project files in your server's root directory (e.g., `htdocs` for XAMPP).
   - Start your server and access the project in the browser at `http://localhost/Login_Signup_form_php_mailgun_otp_verification/`.

## Usage

1. **Sign Up**:
   - Enter your email and password on the signup page.
   - An OTP will be sent to your email for verification.

2. **Verify OTP**:
   - Enter the OTP received in your email to complete the registration process.

3. **Login**:
   - After successful verification, log in with your email and password.

## File Structure

```
├── config.php          # Database and Mailgun configuration
├── mailgun.php         # Mailgun integration for sending emails
├── signup.php          # User signup form and logic
├── login.php           # User login form and logic
├── verify_otp.php      # OTP verification logic
├── database.sql        # SQL file to set up the database
├── assets/             # CSS and JS files for styling and functionality
├── README.md           # Project documentation
```

## Screenshots

1. **Signup Form**
   ![Signup Form Screenshot](link-to-screenshot)

2. **OTP Verification**
   ![OTP Verification Screenshot](link-to-screenshot)

3. **Login Form**
   ![Login Form Screenshot](link-to-screenshot)

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Email Service**: Mailgun

## Security Measures

- Passwords are hashed using `password_hash()`.
- OTPs are time-sensitive and expire after a set duration.
- Database queries are secured to prevent SQL injection.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your updates.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

If you have any questions or suggestions, feel free to contact:

- **Name**: Dilip Kumar Sharma
- **Email**: DKSDKS777@gmail.com

