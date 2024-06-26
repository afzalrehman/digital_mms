<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";


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
        move_uploaded_file($_FILES['image']['tmp_name'], '../media/std-tc/' . $image);
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
            redirect("user-details.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے . $user_name");
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

// =============================== Delete Madarsa Access Code End page (madarsa-access.php) ================================
if (isset($_GET['user_delete'])) {
    $user_id = $_GET['user_delete'];
    $update_query = "UPDATE `users` SET `dlt_status` = 'غیر فعال' WHERE `user_id` = '$user_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("user-details.php", "مدرسہ دیلیٹ ہوچکا ہے");
        exit();
    } else {
        header("location:user-details.php");
        exit();
    }
}




// ================================ Updated Madarsa-access Code Start page (madarsa-edit.php) ================================
if (isset($_POST['masarsa_update'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $madarsa_name = mysqli_real_escape_string($conn, $_POST['madarsa_name']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
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
        redirectdelete("madarsa-access-details.php", "ای میل پہلے سے موجود ہے");
        exit();
    }

    // check the phone number is unique or not
    $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone' AND `user_id` != '$user_id'";
    $check_phone_result = mysqli_query($conn, $check_phone_query);

    if (mysqli_num_rows($check_phone_result) > 0) {
        redirectdelete("madarsa-access-details.php", "فون نمبر پہلے سے موجود ہے");
        exit();
    }

    // check the username is unique or not
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `user_id` != '$user_id'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        redirectdelete("madarsa-access-details.php", "یوزَر نام پہلے سے موجود ہے");
        exit();
    }


    // image
    $image = '';
    if (isset($_FILES['image']['name'])) {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../media/media/madarsa-access/' . $image);
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
        `madarsa_name`='$madarsa_name',
        `full_name`='$user_name',
        `phone`='$user_phone'";

        // Append image update if an image was uploaded
        if ($image) {
            $update_user_details_query .= ", `image` = '$image'";
        }
        $update_user_details_query .= " WHERE `user_id` = '$user_id'";

        $update_user_details_res = mysqli_query($conn, $update_user_details_query);

        if ($update_user_details_res) {
            redirect("madarsa-access-details.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے. $user_name");
            exit();
        } else {
            // Insertion failed
            redirectdelete("madarsa-access-details.php", "یوزَر ایڈ نہیں ھوا، ");
            exit();
        }
    } else {
        // Insertion failed
        redirectdelete("madarsa-access-details.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں");
        exit();
    }
}
// =============================== Delete Madarsa Access Code End page (madarsa-delete.php) ================================
if (isset($_GET['madarsa_delete'])) {
    $user_id = $_GET['madarsa_delete'];
    $update_query = "UPDATE `users` SET `dlt_status` = 'غیر فعال' WHERE `user_id` = '$user_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("madarsa-access-details.php", "مدرسہ دیلیٹ ہوچکا ہے");
        exit();
    } else {
        header("location:madarsa-access-details.php");
        exit();
    }
}




// ================================ Add Madarsa Access Code Start page (madarsa-access.php) ================================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establish database connection (assuming $conn is defined elsewhere)

    // Escape user inputs for security
    $madarsa_name = mysqli_real_escape_string($conn, $_POST['madarsa_name']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

    // Check if email is unique
    $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        // Email already exists, redirect with message
        redirect("madarsa-access.php", "ای میل پہلے سے موجود ہے");
        exit();
    }

    // Check if phone number is unique
    $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone'";
    $check_phone_result = mysqli_query($conn, $check_phone_query);

    if (mysqli_num_rows($check_phone_result) > 0) {
        // Phone number already exists, redirect with message
        redirect("madarsa-access.php", "فون نمبر پہلے سے موجود ہے");
        exit();
    }

    // Check if username is unique
    $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_result) > 0) {
        // Username already exists, redirect with message
        redirect("madarsa-access.php", "یوزَر نام پہلے سے موجود ہے");
        exit();
    }

    // Hash the password
    $user_pass = password_hash($user_password, PASSWORD_DEFAULT);

    // Generate token
    $user_token = bin2hex(random_bytes(15));

    // Current date and time
    $created_date = date('Y-m-d');

    // Handle file upload
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_temp, '../media/madarsa-access/' . $image);

    // Insert user data into 'users' table
    $insert_user_query = "INSERT INTO `users` (
        `username`, 
        `email`, 
        `password`, 
        `token`, 
        `status`, 
        `role_id`, 
        `created_date`
        )
    VALUES (
        '$username', 
        '$user_email', 
        '$user_pass', 
        '$user_token', 
        'Inactive', 
        'انسٹی ٹیوٹ', 
        '$created_date')";

    $insert_user_res = mysqli_query($conn, $insert_user_query);

    if ($insert_user_res) {
        // Get the ID of the inserted user record
        $user_id = mysqli_insert_id($conn);

        // Insert user details into 'user_details' table
        $insert_user_details_query = "INSERT INTO `user_details` (
            `user_id`, 
            `full_name`, 
            `register_no`, 
            `phone`,
            `image`
            )
        VALUES (
            '$user_id', 
            '$user_name', 
            '$madarsa_name', 
            '$user_phone',
            '$image'
            )";
        $insert_user_details_res = mysqli_query($conn, $insert_user_details_query);

        if ($insert_user_details_res) {
            // Data inserted successfully, redirect with success message
            redirect("madarsa-access.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
            exit();
        } else {
            // User details insertion failed, redirect with error message
            redirect("madarsa-access.php", "یوزَر ایڈ نہیں ھوا،");
            exit();
        }
    } else {
        // User insertion failed, redirect with error message
        redirect("madarsa-access.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں");
        exit();
    }
}
