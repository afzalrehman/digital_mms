<?php

session_start();
include "../includes/config.php";
include "../includes/function.php";

// Check if form is submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize form inputs
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_gander = mysqli_real_escape_string($conn, $_POST['user_gander']);
    $user_age = mysqli_real_escape_string($conn, $_POST['user_age']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

    // Hash the password for security
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Token generate
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
    }

    // check the phone number is unique or not
    $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone'";
    $check_phone_result = mysqli_query($conn, $check_phone_query);

    if (mysqli_num_rows($check_phone_result) > 0) {
        redirectdelete("user-form.php", "فون نمبر پہلے سے موجود ہے");
        exit();
    }

    // check the username is unique or not
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        redirectdelete("user-form.php", "یوزَر نام پہلے سے موجود ہے");
        exit();
    }

    // check the username is unique or not
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        redirectdelete("user-form.php", "یوزَر نام پہلے سے موجود ہے");
        exit();
    }

    // image upload
    $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../media/std-tc/' . $image);



    // Insert user into 'users' table
    $insert_user_query = "INSERT INTO `users` (
        `username`, 
        `email`, 
        `password`, 
        `token`, 
        `status`, 
        `role_id`, 
        `created_date`
        ) VALUES (
        '$username', 
        '$user_email', 
        '$hashed_password', 
        '$user_token', 
        'Inactive', 
        '$user_role', 
        '$created_date'
        )";

    $insert_user_res = mysqli_query($conn, $insert_user_query);
    if ($insert_user_res) {
        $user_id = mysqli_insert_id($conn);

        // Insert user details into 'user_details' table
        $insert_user_details_query = "INSERT INTO `user_details` (
            `user_id`, 
            `full_name`, 
            `image`,
            `phone`, 
            `address`, 
            `gender`, 
            `age`
            ) VALUES (
            '$user_id', 
            '$user_name', 
            '$image',
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
            echo "Failed to add user details: " . mysqli_error($conn);
            exit();
        }
    } else {
        echo "Failed to add user: " . mysqli_error($conn);
        exit();
    }
} else {
    // Handle case where form is not submitted
    echo "Form not submitted.";
    exit();
}


















// ================================ Updated User Code Start page (user-edit.php) ================================
if (isset($_POST['user_update'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_gender = mysqli_real_escape_string($conn, $_POST['user_gender']);
    $user_age = mysqli_real_escape_string($conn, $_POST['user_age']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);

    // updated date and time
    $updated_date = date('Y-m-d H:i:s');

    // check the email is unique or not
    $check_update_email = "SELECT * FROM `users` WHERE `email` = '$user_email' AND `user_id` != '$user_id'";
    $check_update_email_res = mysqli_query($conn, $check_update_email);

    if (mysqli_num_rows($check_update_email_res) > 0) {
        redirectdelete("user-details.php", "Email already exists.");
        exit();
    }

    // check the phone number is unique or not
    $check_update_phone = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone' AND `user_id` != '$user_id'";
    $check_update_phone_res = mysqli_query($conn, $check_update_phone);

    if (mysqli_num_rows($check_update_phone_res) > 0) {
        redirectdelete("user-details.php", "Phone number already exists.");
        exit();
    }

    // check the username is unique or not
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `user_id` != '$user_id'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        redirectdelete("user-details.php", "Username already exists.");
        exit();
    }

    // image handling
    $image = '';
    if (isset($_FILES['user_image']['name'])) {
        $image = rand(111111111, 999999999) . '_' . $_FILES['user_image']['name'];
        move_uploaded_file($_FILES['user_image']['tmp_name'], '../media/std-tc/' . $image);
    }

    // update user query
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
        // update user details query
        $update_user_details_query = "UPDATE `user_details` 
        SET 
        `full_name`='$user_name',
        `phone`='$user_phone',
        `address`='$user_address',
        `gender`='$user_gender',
        `age`='$user_age'";

        // append image update if an image was uploaded
        if ($image) {
            $update_user_details_query .= ", `image` = '$image'";
        }
        $update_user_details_query .= " WHERE `user_id` = '$user_id'";

        $update_user_details_res = mysqli_query($conn, $update_user_details_query);

        if ($update_user_details_res) {
            redirect("user-details.php", "Your data has been updated successfully.");
            exit();
        } else {
            // update failed
            redirectdelete("user-details.php", "User update failed.");
            exit();
        }
    } else {
        // update failed
        redirectdelete("user-details.php", "User update failed. Please try again.");
        exit();
    }
}
