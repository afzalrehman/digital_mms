<?php
session_start();
include_once "../includes/config.php";
include_once "../includes/function.php";


// ================================ Add User Code Start page (user-form.php) ================================
if (isset($_POST['user_insert'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_gander = mysqli_real_escape_string($conn, $_POST['user_gander']);
    $user_age = mysqli_real_escape_string($conn, $_POST['user_age']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
    // $user_image = mysqli_real_escape_string($conn, $_POST['user_image']);

    // hash the password
    $user_pass = password_hash($user_password, PASSWORD_DEFAULT);
    // token generate
    $user_token = bin2hex(random_bytes(15));
    // created date and time
    $created_date = date('Y-m-d H:i:s');
    // created_by username
    // $created_by = $_SESSION['username'];

    // check the email is unique or not
    $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        redirectdelete("user-form.php", "ای میل پہلے سے موجود ہے");
        exit();
    } else {

        // check the phone number is unique or not
        // $check_phone_query = "SELECT * FROM `users` WHERE `user_phone` = '$user_phone'";
        // $check_phone_result = mysqli_query($conn, $check_phone_query);

        // if (mysqli_num_rows($check_phone_result) > 0) {
        //     redirectdelete("user-form.php", "فون نمبر پہلے سے موجود ہے");
        //     exit();
        // } else {

        // check the username is unique or not
        $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
        $check_username_result = mysqli_query($conn, $check_username_query);

        if (mysqli_num_rows($check_username_result) > 0) {
            redirectdelete("user-form.php", "یوزَر نام پہلے سے موجود ہے");
            exit();
        } else {

            // insert add user data into database
            $insert_user_query = "INSERT INTO `users`(`username`, `email`, `password`, `token`, `status`, `role_id`, `details_id`, `created_by`, `created_date`)
                VALUES ('$username', '$user_email', '$user_pass', '$user_token', 'Inactive', '$user_role', '1', 'created_by', '$created_date')";

            $insert_user_res = mysqli_query($conn, $insert_user_query);

            if ($insert_user_res) {
                // Get the ID of the inserted user_details record
                $user_id = mysqli_insert_id($conn);

                // Insert user_details record
                $insert_user_details_query = "INSERT INTO `user_details`(`user_id`, `full_name`, `phone`, `address`, `gender`, `age`)
                    VALUES ('$user_id', '$user_name', '$user_phone', '$user_address', '$user_gander', '$user_age')";

                $insert_user_details_res = mysqli_query($conn, $insert_user_details_query);

                if ($insert_user_details_res) {
                    redirect("user-form.php", "Your Data Insert Succses");
                    exit();
                } else {
                    // Insertion failed
                    redirectdelete("user-form.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں ");
                    exit();
                }
            } else {
                // Insertion failed
                redirectdelete("user-form.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں");
                exit();
            }
        }
    }
}
// }
