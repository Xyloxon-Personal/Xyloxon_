<?php 
session_start(); // Start the session
include('connection.php'); // Include your connection file

// Check if the user is logged in (you can set this in your sign-up or login logic)
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Store the username from the session
} else {
    $username = null;
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
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="./assets/images/logo/X-Logo.png" type="image/x-icon">

    <title>Xyloxon</title>


</head>

<body>
<!-- ==========Header-Section========== -->
<header class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="index.php">
                    <img src="./assets/images/logo/X-Logo.png" alt="logo" width="100px">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="index.php">Home</a>   
                </li>
                <li>
                    <a href="list.php">Creations</a>
                </li> 
                <li>
                    <a href="about.php">About Us</a>
                </li>   
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                
                <?php if ($username): ?>
                    <li>
                        <a href="#0 " class="active" style="color:#31d7a9;"><?php echo $username; ?></a>
                    </li>
                    <li>
                    <a href="logout.php">logout</a>
                </li>
                   
                <?php else: ?>
                    <li class="header-button pr-0">
                        <a href="sign-up.php">Join Us</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
<!-- ==========Header-Section========== -->

