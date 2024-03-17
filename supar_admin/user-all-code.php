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
        $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone'";
        $check_phone_result = mysqli_query($conn, $check_phone_query);

        if (mysqli_num_rows($check_phone_result) > 0) {
            redirectdelete("user-form.php", "فون نمبر پہلے سے موجود ہے");
            exit();
        } else {

            // check the username is unique or not
            $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
            $check_username_result = mysqli_query($conn, $check_username_query);

            if (mysqli_num_rows($check_username_result) > 0) {
                redirectdelete("user-form.php", "یوزَر نام پہلے سے موجود ہے");
                exit();
            } else {

                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../media/images/' . $image);

                // insert add user data into database
                $insert_user_query = "INSERT INTO `users`(
                    `username`, 
                    `email`, 
                    `password`, 
                    `token`, 
                    `status`, 
                    `role_id`, 
                    `details_id`, 
                    `created_by`, 
                    `created_date`
                    )
                VALUES (
                    '$username', 
                    '$user_email', 
                    '$user_pass', 
                    '$user_token', 
                    'Inactive', 
                    '$user_role', 
                    '$user_id', 
                    'created_by', 
                    '$created_date')";

                $insert_user_res = mysqli_query($conn, $insert_user_query);

                if ($insert_user_res) {
                    // Get the ID of the inserted user_details record
                    $user_id = mysqli_insert_id($conn);

                    // Insert user_details record
                    $insert_user_details_query = "INSERT INTO `user_details`(
                        `user_id`, 
                        `full_name`, 
                        `phone`, 
                        `address`, 
                        `gender`, 
                        `age`
                        )
                    VALUES (
                        '$user_id', 
                        '$user_name', 
                        '$user_phone', 
                        '$user_address', 
                        '$user_gander', 
                        '$user_age'
                        )";

                    $insert_user_details_res = mysqli_query($conn, $insert_user_details_query);

                    if ($insert_user_details_res) {
                        redirect("user-form.php", "آپ کا ڈیٹا ایڈ ہوچکا ہے");
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
}




// ================================ Updated User Code Start page (user-edit.php) ================================
if (isset($_POST['user_update'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_gander = mysqli_real_escape_string($conn, $_POST['user_gander']);
    $user_age = mysqli_real_escape_string($conn, $_POST['user_age']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    // $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

    // updated date and time
    $updated_date = date('Y-m-d H:i:s');
    // updated_by username
    // $updated_by = $_SESSION['username'];

    // check the email is unique or not
    $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email' AND `user_id` != '$user_id'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        redirectdelete("user-details.php", "ای میل پہلے سے موجود ہے");
        exit();
    }

    // check the phone number is unique or not
    $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone' AND `user_id` != '$user_id'";
    $check_phone_result = mysqli_query($conn, $check_phone_query);

    if (mysqli_num_rows($check_phone_result) > 0) {
        redirectdelete("user-details.php", "فون نمبر پہلے سے موجود ہے");
        exit();
    }

    // check the username is unique or not
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `user_id` != '$user_id'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        redirectdelete("user-details.php", "یوزَر نام پہلے سے موجود ہے");
        exit();
    }


    // image
    $image = '';
    if (isset($_FILES['image']['name'])) {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../media/images/' . $image);
    }

    // insert add user data into database
    $update_user_query = "UPDATE `users` 
    SET 
        `username`='$username',
        `email`='$user_email',
        `updated_by`='updated_by',
        `updated_date`='$updated_date'
    WHERE 
        `user_id` = '$user_id'";

    $update_user_res = mysqli_query($conn, $update_user_query);

    if ($update_user_res) {
        // Get the ID of the inserted user_details record
        $user_id = mysqli_insert_id($conn);

        // Insert user_details record
        $update_user_details_query = "UPDATE `user_details` 
        SET 
        `full_name`='$user_name',
        `phone`='$user_phone',
        `address`='$user_address',
        `gender`='$user_gander',
        `age`='$user_age'";

        // Append image update if an image was uploaded
        if ($image) {
            $update_user_details_query .= ", `image` = '$image'";
        }
        $update_user_details_query .= " WHERE `user_id` = '$user_id'";

        $update_user_details_res = mysqli_query($conn, $update_user_details_query);

        if ($update_user_details_res) {
            redirect("user-details.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
            exit();
        } else {
            // Insertion failed
            redirectdelete("user-details.php", "یوزَر ایڈ نہیں ھوا، ");
            exit();
        }
    } else {
        // Insertion failed
        redirectdelete("user-details.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں");
        exit();
    }
}
