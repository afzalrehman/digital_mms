<?php
session_start();
include "includes/config.php";

if (isset($_POST['submit'])) {
    $newPassword = mysqli_real_escape_string($conn, $_POST['user_password']);

    $pass = password_hash($newPassword, PASSWORD_BCRYPT);
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $updatequery = " UPDATE `users` SET `password` = '$pass' WHERE `token` = '$token' ";

        $iquery = mysqli_query($conn, $updatequery);
        if ($iquery) {
            $_SESSION['msg'] = "آپ کا پاس ورڈ اپ ڈیٹ کر دیا گیا ہے۔";
            header('location: login');
            exit();
        } else {
            $_SESSION['warning'] = 'آپ کا پاس ورڈ اپ ڈیٹ نہیں ہوا ہے۔';
            header('location: reset_password');
            exit();
        }
    } else {
        $_SESSION['warning'] = 'آپ کا پاس ورڈ اپ ڈیٹ نہیں ہوا ہے۔';
        header('location: reset_password');
        exit();
    }
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
                        <img src="     assets/images/login.png" alt="" class="img-fluid" width="500">
                    </div>
                </div>

                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 madarsa-name text-center">پاس ورڈ ری سیٹ</h2>
                            <p class=" mb-9 fs-4 text-primary text-center"> مدرسہ حسینیہ میں خوش آمدید 🎉</p>
                            <!-- alert box -->
                            <?php
                            if (isset($_SESSION['warning'])) {
                                echo '
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong class="fs-6>' . $_SESSION['warning'] . '</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                unset($_SESSION['warning']);
                            }
                            ?>
                            <form method="POST" id="new-pass-form">
                                <div class="mb-3">
                                    <label for="password" class="form-label fs-5">پاس ورڈ</label>
                                    <input type="password" name="user_password" id="password" class="form-control jameel-kasheeda" placeholder="st@123" />
                                    <span class="error text-danger fs-4" id="password_err"></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <a class="text-primary" href="login">کیا آپ کا اکاؤنٹ ہے؟</a>
                                </div>
                                <input type="submit" id="sign-in" name="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" value="پاس ورڈ ری سیٹ">
                            </form>
                            <script>
                                document.getElementById('new-pass-form').addEventListener('submit', function(event) {
                                    var passwordInput = document.getElementById('password');
                                    var password = passwordInput.value;
                                    var passwordErr = document.getElementById('password_err');
                                    var hasError = false;

                                    // Check if password is empty
                                    if (password.trim() === '') {
                                        passwordErr.innerText = 'پاس ورڈ درکار ہے';
                                        hasError = true;
                                    } else {
                                        passwordErr.innerText = '';
                                    }

                                    // Check if password meets complexity requirements
                                    // var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,16})");
                                    // if (!strongRegex.test(password)) {
                                    //     passwordErr.innerText = 'پاس ورڈ بہت مضبوط نہیں ہے';
                                    //     hasError = true;
                                    // } else {
                                    //     passwordErr.innerText = '';
                                    // }

                                    if (hasError) {
                                        event.preventDefault();
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

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