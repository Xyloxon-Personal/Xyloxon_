<?php
// Start the session
session_start();

// Include the database connection file
include 'common/connection.php';

// Initialize variables to store error messages
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize input
    $firstname = trim($_POST['firstname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate inputs
    if (empty($firstname)) {
        $errors[] = "Firstname is required.";
    }
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must be at least 8 characters long, include a symbol, and a number.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email already exists
    $email_check_query = "SELECT id FROM register WHERE email = ?";
    $stmt = $conn->prepare($email_check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Email already exists. Please use a different email.";
    }
    $stmt->close();

    // Check if username already exists
    $username_check_query = "SELECT id FROM register WHERE username = ?";
    $stmt = $conn->prepare($username_check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Username not available. Please choose a different username.";
    }
    $stmt->close();

    // If no errors, proceed to store in the database
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL query
        $sql = "INSERT INTO register (firstname, username, email, password) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $firstname, $username, $email, $hashed_password);

            // Execute the statement
            if ($stmt->execute()) {
                // Set session variable with the username
                $_SESSION['username'] = $username;
                // Redirect to a success page
                echo "<script>window.location.href = 'sign-in.php';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <title>Xyloxon</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="./assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">welcome</span>
                        <h2 class="title">to Xyloxon </h2>
                    </div>
                    <form class="account-form" method="POST">
                    <div class="form-group">
        <?php
        // Display validation errors
        if (!empty($errors)) {
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
        }
        ?>
                            <label for="firstname">firstname<span>*</span></label>
                            <input type="text" placeholder="Enter Your Firstname" id="firstname" name="firstname" required>
                        </div>
                        <div class="form-group">
    <label for="username">Username<span>*</span></label>
    <input type="text" placeholder="Enter Your Username" name="username" id="username" required>
    <div id="username-error" style="color:red;"></div> <!-- Error message for username -->
</div>

<div class="form-group">
    <label for="email1">Email<span>*</span></label>
    <input type="email" placeholder="Enter Your Email" name="email" id="email" required>
    <div id="email-error" style="color:red;"></div> <!-- Error message for email -->
</div>

<div class="form-group">
    <label for="pass1">Password<span>*</span></label>
    <input type="password" placeholder="Password" name="password" id="password" required>
    <div id="password-error" style="color:red;"></div> <!-- Error message for password -->
</div>

<div class="form-group">
    <label for="pass2">Confirm Password<span>*</span></label>
    <input type="password" placeholder="Password" name="confirm_password" id="confirm_password" required>
    <div id="confirm-password-error" style="color:red;"></div> <!-- Error message for confirm password -->
</div>

                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal" required checked>
                            <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Sign Up">
                        </div>
                    </form>
                    <div class="option">
                        Already have an account? <a href="sign-in.php">Login</a>
                    </div>
                    <div class="or"><span>Or</span></div>
                    <ul class="social-icons">
                        
                        <li>
                            <a href="#0">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->
    <script>
    // Real-time validation for username
    document.getElementById("username").addEventListener("input", function() {
        const username = this.value;
        const usernameError = document.getElementById("username-error");

        if (username.length === 0) {
            usernameError.textContent = "Username is required.";
            return;
        }

        // Send request to server to check if username exists
        fetch('check_username.php?username=' + username)
            .then(response => response.text())
            .then(data => {
                if (data === "exists") {
                    usernameError.textContent = "Username not available.";
                } else {
                    usernameError.textContent = "";
                }
            });
    });

    // Real-time validation for email
    document.getElementById("email").addEventListener("input", function() {
        const email = this.value;
        const emailError = document.getElementById("email-error");

        if (email.length === 0 || !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) {
            emailError.textContent = "A valid email is required.";
            return;
        }

        // Send request to server to check if email exists
        fetch('check_email.php?email=' + email)
            .then(response => response.text())
            .then(data => {
                if (data === "exists") {
                    emailError.textContent = "Email already exists.";
                } else {
                    emailError.textContent = "";
                }
            });
    });

    // Real-time validation for password
    document.getElementById("password").addEventListener("input", function() {
        const password = this.value;
        const passwordError = document.getElementById("password-error");

        if (password.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(password) || !/[0-9]/.test(password)) {
            passwordError.textContent = "Password must be at least 8 characters long, include a symbol, and a number.";
        } else {
            passwordError.textContent = "";
        }
    });

    // Real-time validation for confirm password
    document.getElementById("confirm_password").addEventListener("input", function() {
        const password = document.getElementById("password").value;
        const confirmPassword = this.value;
        const confirmPasswordError = document.getElementById("confirm-password-error");

        if (confirmPassword !== password) {
            confirmPasswordError.textContent = "Passwords do not match.";
        } else {
            confirmPasswordError.textContent = "";
        }
    });
</script>


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/viewport.jquery.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>