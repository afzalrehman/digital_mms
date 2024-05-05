<?php
session_start();
include "includes/config.php";

// <!-- =========================Forget Password page code =============================== -->

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);

    if (!empty($email)) { // Check if email field is not empty
        $email_query = "SELECT * FROM `users` WHERE `email` = '$email' AND `status` = 'Active'";
        $email_query_run = mysqli_query($conn, $email_query);

        $count_email = mysqli_num_rows($email_query_run);
        if ($count_email) {
            $userData = mysqli_fetch_array($email_query_run);
            $full_name = $userData['full_name'];
            $token = $userData['token'];
            $_SESSION['user_email'] = $userData['email'];

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hammadking427@gmail.com';
                $mail->Password = 'gtohfmaaanqufdbn';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('hammadking427@gmail.com', 'Abu_Hammad');
                $mail->addAddress($email, $full_name);
                $mail->Subject = 'Password Reset';
                // Include the email content from email.php
                include('email_Reset.php');
                // Replace placeholders with actual values
                $emailContent = str_replace('$full_name', $full_name, $emailContent);
                $emailContent = str_replace('$token', $token, $emailContent);
                // Set the email content as HTML
                $mail->isHTML(true);
                $mail->Body = $emailContent;
                $mail->send();
                $_SESSION['msg'] =  $email . " پاس ورڈ ری سیٹ ";
                header('location: login');
                exit();
            } catch (Exception $e) {
                echo "Failed to send email. Error: {$mail->ErrorInfo}";
            }
        } else {
            $_SESSION['forgot_msg'] = "درست ای میل درج کریں۔";
            header('location: forget_password');
            exit();
        }
    } else {
        $_SESSION['forgot_msg'] = "ای میل درج کریں۔";
        header('location: forget_password');
        exit();
    }
} else {
    // Display error message only when form is submitted
    // unset($_SESSION['forgot_msg']); // Clear any previous error message
}



?>

<?php require('inc/header.php') ?>
<!--  Body Wrapper -->
<!-- Login Form Start -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                        <img src="assets/images/login.png" alt="" class="img-fluid" width="500">
                    </div>
                </div>

                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 madarsa-name text-center">پاس ورڈ ری سیٹ</h2>
                            <p class=" mb-9 fs-4 text-primary text-center"> مدرسہ حسینیہ میں خوش آمدید 🎉</p>

                            <!-- alert box -->
                            <?php
                            if (isset($_SESSION['forgot_msg'])) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ' . $_SESSION['forgot_msg'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                                unset($_SESSION['forgot_msg']);
                            }
                            ?>
                            <!-- End alert box -->

                            <form action="" id="forgotPassword" method="POST">
                                <div class="mb-3">
                                    <label for="user_email" class="form-label fs-5">ای میل</label>
                                    <input type="email" class="form-control jameel-kasheeda" name="user_email" id="user_email" placeholder="ای میل لکھیں۔">
                                    <span class="error text-danger fs-4" id="email_error"></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <a class="text-primary" href="login">کیا آپ کا اکاؤنٹ ہے؟</a>
                                </div>
                                <input type="submit" id="submit_btn" name="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" value="پاس ورڈ ری سیٹ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('forgotPassword');

        // Function to validate form
        function validateForm(event) {
            const email = document.getElementById('user_email');
            const emailError = document.getElementById('email_error');

            // Reset error message and input border
            emailError.textContent = '';
            email.classList.remove('is-invalid');

            let isValid = true;

            // Validate email
            if (!email.value.trim()) {
                emailError.textContent = 'براہ کرم اپنا ای میل درج کریں۔';
                email.classList.add('is-invalid'); // Add red border class
                isValid = false;
            } else if (!isValidEmail(email.value.trim())) {
                emailError.textContent = 'برائے مہربانی قابل قبول ای میل ایڈریس لکھیں.';
                email.classList.add('is-invalid'); // Add red border class
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        }

        // Event listener for form submission
        form.addEventListener('submit', validateForm);

        // Function to validate email format
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>
<!--  Import Js Files -->
<script src="../assets/js/jquery/jquery.min.js"></script>
<script src="../assets/js/template/simplebar.min.js"></script>
<script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!--  core files -->
<script src="../assets/js/template/app.min.js"></script>
<script src="../assets/js/template/app.init.js"></script>
<script src="../assets/js/template/app-style-switcher.js"></script>
<script src="../assets/js/template/sidebarmenu.js"></script>
<script src="../assets/js/template/custom.js"></script>

<!--  current page js files -->
<script src="../assets/js/template/owl.carousel.min.js"></script>
<script src="../assets/js/template/apexcharts.min.js"></script>
<!-- <script src="../assets/js/template/widgets-charts.js"></script> -->
<script src="../assets/js/template/dashboard.js"></script>
</body>