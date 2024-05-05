<?php
session_start();
include "includes/config.php";
global $conn;

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

    if (empty($username) || empty($user_password)) {

        if (empty($username)) {
            $emptyFields['user_reg_no'] = "ای میل منتخب  کریں";
        }
        if (empty($user_password)) {
            $emptyFields['user_password'] = "پاس ورڈ منتخب کریں";
        }

        if (!empty($emptyFields)) {
            $_SESSION['emptyFields'] = $emptyFields;
            $_SESSION['input'] = $_POST;
            header("Location: login.php");
            exit();
        }
    } else {

        $email_search = "SELECT users.user_id, users.username, users.email, role.role_name AS role, users.password 
        FROM users
                LEFT JOIN role ON role.role_id = users.role_id
                LEFT JOIN user_details ON user_details.user_id = users.user_id
                WHERE (username = '$username' OR email = '$username') AND users.status = 'Active'";
        $query = mysqli_query($conn, $email_search);
        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['user_name'] = $email_pass['username'];
            $_SESSION['user_email'] = $email_pass['email'];
            $_SESSION['user_password'] = $email_pass['password'];
            $_SESSION['user_id'] = $email_pass['user_id'];
            $_SESSION['role'] = $email_pass['role'];


            $pass_decode = password_verify($user_password, $db_pass);
            $_SESSION['user_pass'] = $pass_decode;
            if ($pass_decode) {
                if (isset($_POST['rememberme'])) {

                    setcookie('regNoCookie', $user_reg_no, time() + 86400);
                    setcookie('passwordCookie', $user_password, time() + 86400);
                    unset($_SESSION['input']);
                }

                // Redirect based on user role
                if ($_SESSION['role'] == 'سپر ایڈمن') {
                    header('location: super_admin/index');
                } elseif ($_SESSION['role'] == 'Member') {
                    header('location: member/index');
                } else {
                    // Handle unknown role
                    header('location: index');
                }
                $_SESSION['login'] = true;
                exit(); // Terminate script execution after redirection
            } else {
                $_SESSION['login_error'] = 'غلط پاس ورڈ برائے مہربانی پاس ورڈ درست کریں۔';
            }
        } else {
            $_SESSION['email_error'] = 'غلط رجسٹریشن نمبر برائے مہربانی رجسٹریشن نمبر درست کریں۔';
        }
    }
}
?>


<?php require('inc/header.php') ?>
<!-- Body Wrapper -->

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
                            <h2 class="mb-3 madarsa-name text-center">سائن اِن کریں</h2>
                            <p class=" mb-9 fs-4 text-primary text-center"> مدرسہ حسینیہ میں خوش آمدید 🎉</p>
                            <form method="POST">

                                <!-- Alert -->
                                <div class="alert alert-light fs-4 text-center" role="alert">
                                    <strong>
                                        <?php
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                        } else {
                                            echo $_SESSION['msg'] = "آپ لاگ آؤٹ ہو گئے ہیں۔ براہ کرم دوبارہ لاگ ان کریں۔";
                                        }
                                        ?>
                                    </strong>
                                </div>
                                <?php
                                if (isset($_SESSION['login_error'])) {
                                    echo '
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>' . $_SESSION['login_error'] . '</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['login_error']);
                                }

                                if (isset($_SESSION['email_error'])) {
                                    echo '
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>' . $_SESSION['email_error'] . '</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    unset($_SESSION['email_error']);
                                }
                                ?>


                                <div class="mb-3">
                                    <label for="user_reg_no" class="form-label fs-5">ای میل</label>
                                    <input type="text" class="form-control jameel-kasheeda" name="email" id="user_reg_no" placeholder="ای میل لکھیئے" value="<?php if (isset($_COOKIE['regNoCookie'])) {
                                                                                                                                                                    echo $_COOKIE['regNoCookie'];
                                                                                                                                                                } ?>">
                                    <span class="error text-danger fs-4" id="std-area-err">
                                        <?php if (isset($_SESSION['emptyFields']['user_reg_no'])) {
                                            echo $_SESSION['emptyFields']['user_reg_no'];
                                            unset($_SESSION['emptyFields']['user_reg_no']);
                                        } ?>
                                    </span>

                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label fs-5">پاس ورڈ</label>
                                    <input type="password" class="form-control jameel-kasheeda" name="user_password" id="password" placeholder="پاس ورڈ لکھیئے" value="<?php if (isset($_COOKIE['passwordCookie'])) {
                                                                                                                                                                            echo $_COOKIE['passwordCookie'];
                                                                                                                                                                        } ?>">
                                    <span class="error text-danger fs-4" id="std-area-err">
                                        <?php if (isset($_SESSION['emptyFields']['user_password'])) {
                                            echo $_SESSION['emptyFields']['user_password'];
                                            unset($_SESSION['emptyFields']['user_password']);
                                        } ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" name="rememberme" value="rememberme" id="rememberme">
                                        <label class="form-check-label" for="rememberme">اپنا پاس ورڈ یاد رکھیں</label>
                                    </div>
                                    <a class="text-primary" href="forget_password">پاسورڈ بھول گیا؟</a>
                                </div>
                                <input type="submit" id="sign-in" name="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" value="سائن ان کریں">
                            </form>
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

</html>