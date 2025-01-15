<?php
include("common/navbar.php");
include("common/connection.php"); // Include your database configuration file

$error = ""; // Variable to store error messages
$success = false; // Variable to track successful submission

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $number = htmlspecialchars($_POST['number']);
    $message = htmlspecialchars($_POST['message']);

    // Validate phone number length
    if (strlen($number) > 13) {
        $error = "Phone number cannot exceed 13 characters.";
    } else {
        $sql = "INSERT INTO contact (name, email, phone_number, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $number, $message);

        if ($stmt->execute()) {
            $success = true;
            header("Location: contact.php?success=true"); // Redirect to avoid resubmission
            exit();
        } else {
            $error = "Error sending message. Please try again later.";
        }
    }
}
?>


    <!-- ==========Banner-Section========== -->
    <section class="main-page-header speaker-banner bg_img" data-background="./assets/images/banner/banner07.jpg">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">contact us</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php">
                            Home
                        </a>
                    </li>
                    <li>
                        contact us
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Contact-Section========== -->
    <section class="contact-section padding-top">
        <div class="contact-container">
            <div class="bg-thumb bg_img" data-background="./assets/images/contact/contact.jpg"></div>
            <div class="container">
                <div class="row justify-content-between">
                <div class="col-md-7 col-lg-6 col-xl-5">
    <div class="section-header-3 left-style">
        <span class="cate">contact us</span>
        <h2 class="title">get in touch</h2>
        <p>We’d love to talk about how we can work together. Send us a message below and we’ll respond as soon as possible.</p>
    </div>
    <form class="contact-form" id="contact_form_submit" method="POST" action="">
        <div class="form-group">
            <label for="name">Name <span>*</span></label>
            <input type="text" placeholder="e.g. Henry Cavil" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" placeholder="e.g. abd@gmail.com" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="number">Phone Number <span>*</span></label>
            <input type="number" placeholder="e.g. +92 123 456789" name="number" id="number" required>
            <small id="number-error" style="color: red; display: none;">Phone number cannot exceed 13 characters.</small>
        </div>
        <div class="form-group">
            <label for="message">Message <span>*</span></label>
            <textarea name="message" id="message" placeholder="Enter Your Message" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Send Message">
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const phoneInput = document.getElementById('number');
        const errorElement = document.getElementById('number-error');

        phoneInput.addEventListener('input', function () {
            if (phoneInput.value.length > 13) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        });
    });
</script>

                    <div class="col-md-5 col-lg-6">
                        <div class="padding-top padding-bottom contact-info">
                            <div class="info-area">
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="./assets/images/contact/contact01.png" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">phone number</h6>
                                        <a href="Tel:82828282034">+92 336 2600340</a>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-thumb">
                                        <img src="./assets/images/contact/contact02.png" alt="contact">
                                    </div>
                                    <div class="info-content">
                                        <h6 class="title">Email</h6>
                                        <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJZZzCscwHcTjLhHlQXcjjkVWSBNMCxCdrtbsGTnPZSCjlPJzmlQvSRJHwPjrzSBwHtFfvV">xyloxonstudios@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Contact-Section========== -->

    <!-- ==========Contact-Counter-Section========== -->
    <section class="contact-counter padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-6 col-md-3">
                    <div class="contact-counter-item">
                        <div class="contact-counter-thumb">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="contact-counter-content">
                            <div class="counter-item">
                                <h5 class="title odometer" data-odometer-final="130">0</h5>
                                <h5 class="title"></h5>
                            </div>
                            <p>Followers</p>    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="contact-counter-item">
                        <div class="contact-counter-thumb">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="contact-counter-content">
                            <div class="counter-item">
                                <h5 class="title odometer" data-odometer-final="35">0</h5>
                                <h5 class="title"></h5>
                            </div>
                            <p>Members</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="contact-counter-item">
                        <div class="contact-counter-thumb">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="contact-counter-content">
                            <div class="counter-item">
                                <h5 class="title odometer" data-odometer-final="47">0</h5>
                                <h5 class="title"></h5>
                            </div>
                            <p>Followers</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="contact-counter-item">
                        <div class="contact-counter-thumb">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-counter-content">
                            <div class="counter-item">
                                <h5 class="title odometer" data-odometer-final="291">0</h5>
                                <h5 class="title"></h5>
                            </div>
                            <p>Subscribers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Contact-Counter-Section========== -->

    <?php
include("common/footer.php");
?>