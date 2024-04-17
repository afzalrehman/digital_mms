<?php

session_start();
include "../includes/config.php";
include "../includes/function.php";

// Check if form is submitted


// ====================================== st-admission-form.php =========================================

if (isset($_POST['std_form_submit'])) {
    $roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);
    $std_name = mysqli_real_escape_string($conn, $_POST['std_name']);
    $std_dbo = mysqli_real_escape_string($conn, $_POST['std_dbo']);
    $std_gender = mysqli_real_escape_string($conn, $_POST['std_gender']);
    $std_accommodation = mysqli_real_escape_string($conn, $_POST['std_accommodation']);
    $std_birth_place = mysqli_real_escape_string($conn, $_POST['std_birth_place']);
    $std_address = mysqli_real_escape_string($conn, $_POST['std_address']);
    $guar_name = mysqli_real_escape_string($conn, $_POST['guar_name']);
    $guar_relation = mysqli_real_escape_string($conn, $_POST['guar_relation']);
    $guar_number = mysqli_real_escape_string($conn, $_POST['guar_number']);
    $guar_cnic = mysqli_real_escape_string($conn, $_POST['guar_cnic']);
    $guar_address = mysqli_real_escape_string($conn, $_POST['guar_address']);
    $guar_email = mysqli_real_escape_string($conn, $_POST['guar_email']);
    $pre_school = mysqli_real_escape_string($conn, $_POST['pre_school']);
    $pre_class = mysqli_real_escape_string($conn, $_POST['pre_class']);
    $next_class = mysqli_real_escape_string($conn, $_POST['next_class']);
    $adm_date = mysqli_real_escape_string($conn, $_POST['adm_date']);

    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $std_dep = mysqli_real_escape_string($conn, $_POST['std-dep']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    $std_qadeem = mysqli_real_escape_string($conn, $_POST['std_qadeem']);
    $admi_fees = mysqli_real_escape_string($conn, $_POST['admi_fees']);
    $monthly_fees = mysqli_real_escape_string($conn, $_POST['monthly_fees']);

    // created_by and created_date
    $created_by = 'Abu Hammad';
    $created_date = date('Y-m-d');

    // check if roll_number or reg_number already exists in the database
    $check_query = "SELECT * FROM students WHERE OR register_num = '$reg_number'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        redirectdelete("st-admission-form.php", "رجسٹریشن نمبر پہلے سے موجود ہے۔");
        exit();
    }

    // Proceed with inserting data into the database
    $std_insert_query = "INSERT INTO `students`(
    `st_roll_no`, `register_num`, `std_name`, `std_dob`, `std_gender`, 
    `std_accommodation`, `std_birth_place`, `std_address`, `guar_name`, `guar_relation`, 
    `guar_number`, `guar_cnic`, `guar_address`, `guar_email`, `pre_school`, 
    `pre_class`, `next_class`, `adm_date`, 
    `madarsa_id`, `depart_id`, `batch_id`, `mada_class_id`, `sec_id`, 
    `std_qadeem`, `admi_fees`, `monthly_fees`, `created_by`, `created_date`) 
VALUES (
    '$roll_number', '$reg_number', '$std_name', '$std_dbo', '$std_gender',
    '$std_accommodation', '$std_birth_place', '$std_address', '$guar_name', '$guar_relation',
    '$guar_number', '$guar_cnic', '$guar_address', '$guar_email', '$pre_school',
    '$pre_class', '$next_class', '$adm_date', 
    '$madarasa', '$department', '$std_dep', '$class', '$section', 
    '$std_qadeem', '$admi_fees', '$monthly_fees', '$created_by', '$created_date')";

    $std_insert = mysqli_query($conn, $std_insert_query) or die('Query unsuccessful: ' . mysqli_error($conn));


    if ($std_insert) {
        $std_id = mysqli_insert_id($conn);
        $_SESSION['std_id'] = $std_id;
        redirect("st-admission-form.php", "آپ کا ڈیٹا ایڈ ہوچکا ہے");
        exit();
    } else {
        redirectdelete("st-admission-form.php", "آپ کا ڈیٹا ایڈ نہیں ھواں ہے");
        exit();
    }
}



// ====================================== st-admission-edit.php =========================================
if (isset($_POST['std_form_update'])) {
    $roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);
    $std_name = mysqli_real_escape_string($conn, $_POST['std_name']);
    $std_dbo = mysqli_real_escape_string($conn, $_POST['std_dbo']);
    $std_gender = mysqli_real_escape_string($conn, $_POST['std_gender']);
    $std_accommodation = mysqli_real_escape_string($conn, $_POST['std_accommodation']);
    $std_birth_place = mysqli_real_escape_string($conn, $_POST['std_birth_place']);
    $std_address = mysqli_real_escape_string($conn, $_POST['std_address']);
    $guar_name = mysqli_real_escape_string($conn, $_POST['guar_name']);
    $guar_relation = mysqli_real_escape_string($conn, $_POST['guar_relation']);
    $guar_number = mysqli_real_escape_string($conn, $_POST['guar_number']);
    $guar_cnic = mysqli_real_escape_string($conn, $_POST['guar_cnic']);
    $guar_address = mysqli_real_escape_string($conn, $_POST['guar_address']);
    $guar_email = mysqli_real_escape_string($conn, $_POST['guar_email']);
    $pre_school = mysqli_real_escape_string($conn, $_POST['pre_school']);
    $pre_class = mysqli_real_escape_string($conn, $_POST['pre_class']);
    $next_class = mysqli_real_escape_string($conn, $_POST['next_class']);
    $adm_date = mysqli_real_escape_string($conn, $_POST['adm_date']);

    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $std_dep = mysqli_real_escape_string($conn, $_POST['std-dep']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    $std_qadeem = mysqli_real_escape_string($conn, $_POST['std_qadeem']);
    $admi_fees = mysqli_real_escape_string($conn, $_POST['admi_fees']);
    $monthly_fees = mysqli_real_escape_string($conn, $_POST['monthly_fees']);

    // created_by and created_date
    $created_by = 'Abu Hammad';
    $created_date = date('Y-m-d');

    // Proceed with updating data in the database
    $std_update_query = "UPDATE `students` SET 
    `st_roll_no` = '$roll_number', 
    `std_name` = '$std_name', 
    `std_dob` = '$std_dbo', 
    `std_gender` = '$std_gender', 
    `std_accommodation` = '$std_accommodation', 
    `std_birth_place` = '$std_birth_place', 
    `std_address` = '$std_address', 
    `guar_name` = '$guar_name', 
    `guar_relation` = '$guar_relation', 
    `guar_number` = '$guar_number', 
    `guar_cnic` = '$guar_cnic', 
    `guar_address` = '$guar_address', 
    `guar_email` = '$guar_email', 
    `pre_school` = '$pre_school', 
    `pre_class` = '$pre_class', 
    `next_class` = '$next_class', 
    `adm_date` = '$adm_date', 
    `madarsa_id` = '$madarasa', 
    `depart_id` = '$department', 
    `batch_id` = '$std_dep', 
    `mada_class_id` = '$class', 
    `sec_id` = '$section', 
    `std_qadeem` = '$std_qadeem', 
    `admi_fees` = '$admi_fees', 
    `monthly_fees` = '$monthly_fees', 
    `created_by` = '$created_by', 
    `created_date` = '$created_date' 
    WHERE `register_num` = '$reg_number'";

    $std_update = mysqli_query($conn, $std_update_query) or die('Query unsuccessful: ' . mysqli_error($conn));

    if ($std_update) {
        redirect("st-details.php", "Your data has been updated successfully");
        exit();
    } else {
        redirectdelete("st-details.php", "Failed to update your data");
        exit();
    }
}



// ====================================== dokan-form.php =========================================
if (isset($_POST['dokan_insert'])) {
    $dokan_name = mysqli_real_escape_string($conn, $_POST['dokan_name']);
    $dokan_address = mysqli_real_escape_string($conn, $_POST['dokan_address']);
    $dokan_owner_name = mysqli_real_escape_string($conn, $_POST['dokan_owner_name']);
    $dokan_type = mysqli_real_escape_string($conn, $_POST['dokan_type']);
    $dokan_rent = mysqli_real_escape_string($conn, $_POST['dokan_rent']);

    // created_by and created_date
    $created_by = 'Abu Hammad';
    $created_date = date('Y-m-d');

    // image upload
    $dokan_lease = rand(111111111, 999999999) . '_' . $_FILES['dokan_lease']['name'];
    move_uploaded_file($_FILES['dokan_lease']['tmp_name'], '../media/dokan/' . $dokan_lease);

    $dokan_license = rand(111111111, 999999999) . '_' . $_FILES['dokan_license']['name'];
    move_uploaded_file($_FILES['dokan_license']['tmp_name'], '../media/dokan/' . $dokan_license);

    $owner_cnic = rand(111111111, 999999999) . '_' . $_FILES['owner_cnic']['name'];
    move_uploaded_file($_FILES['owner_cnic']['tmp_name'], '../media/dokan/' . $owner_cnic);

    $owner_image = rand(111111111, 999999999) . '_' . $_FILES['owner_image']['name'];
    move_uploaded_file($_FILES['owner_image']['tmp_name'], '../media/dokan/' . $owner_image);

    // Proceed with inserting data into the database
    $dokan_insert_query = "INSERT INTO `dokan`(
    `dokan_name`, `dokan_address`, `dokan_owner_name`, `dokan_type`, `dokan_rent`, `dokan_lease`, `dokan_license`, `owner_cnic`, `owner_image`, `created_by`, `created_date`) 
    VALUES (
    '$dokan_name', '$dokan_address', '$dokan_owner_name', '$dokan_type', '$dokan_rent', '$dokan_lease', '$dokan_license', '$owner_cnic', '$owner_image', '$created_by', '$created_date')";

    $dokan_insert = mysqli_query($conn, $dokan_insert_query) or die('Query unsuccessful: ' . mysqli_error($conn));

    if ($dokan_insert) {
        redirect("dokan-form.php", "ڈیٹا کامیابی سے داخل کر دیا گیا ہے، $dokan_name");
        exit();
    } else {
        redirectdelete("dokan-form.php", "ڈیٹا داخل کرنے میں ناکام");
        exit();
    }
}

// ====================================== dokan-edit.php (dokan_update) =========================================

if (isset($_POST['dokan_update_data'])) {
    // Establish database connection (assuming $conn is already defined)

    // Escape user inputs to prevent SQL injection
    $dokan_name = mysqli_real_escape_string($conn, $_POST['dokan_name']);
    $dokan_address = mysqli_real_escape_string($conn, $_POST['dokan_address']);
    $dokan_owner_name = mysqli_real_escape_string($conn, $_POST['dokan_owner_name']);
    $dokan_type = mysqli_real_escape_string($conn, $_POST['dokan_type']);
    $dokan_rent = mysqli_real_escape_string($conn, $_POST['dokan_rent']);

    // Set default values for images
    $dokan_lease = '';
    $dokan_license = '';
    $owner_cnic = '';
    $owner_image = '';

    // Check if image is uploaded and update accordingly
    if (isset($_FILES['dokan_lease']['name']) && $_FILES['dokan_lease']['error'] === UPLOAD_ERR_OK) {
        $dokan_lease = rand(111111111, 999999999) . '_' . basename($_FILES['dokan_lease']['name']);
        move_uploaded_file($_FILES['dokan_lease']['tmp_name'], '../media/dokan/' . $dokan_lease);
    }

    if (isset($_FILES['dokan_license']['name']) && $_FILES['dokan_license']['error'] === UPLOAD_ERR_OK) {
        $dokan_license = rand(111111111, 999999999) . '_' . basename($_FILES['dokan_license']['name']);
        move_uploaded_file($_FILES['dokan_license']['tmp_name'], '../media/dokan/' . $dokan_license);
    }

    if (isset($_FILES['owner_cnic']['name']) && $_FILES['owner_cnic']['error'] === UPLOAD_ERR_OK) {
        $owner_cnic = rand(111111111, 999999999) . '_' . basename($_FILES['owner_cnic']['name']);
        move_uploaded_file($_FILES['owner_cnic']['tmp_name'], '../media/dokan/' . $owner_cnic);
    }

    if (isset($_FILES['owner_image']['name']) && $_FILES['owner_image']['error'] === UPLOAD_ERR_OK) {
        $owner_image = rand(111111111, 999999999) . '_' . basename($_FILES['owner_image']['name']);
        move_uploaded_file($_FILES['owner_image']['tmp_name'], '../media/dokan/' . $owner_image);
    }

    // Set updated_by and updated_date
    $updated_by = 'Abu Hammad';
    $updated_date = date('Y-m-d');

    // Ensure $dokan_id is properly set (assuming it's fetched or passed from somewhere)

    // Construct the update query
    $dokan_update_query = "UPDATE `dokan` SET 
    `dokan_name` = '$dokan_name', 
    `dokan_address` = '$dokan_address', 
    `dokan_owner_name` = '$dokan_owner_name', 
    `dokan_type` = '$dokan_type', 
    `dokan_rent` = '$dokan_rent'";

    // Append optional fields to the query if they are set
    if ($dokan_lease !== '') {
        $dokan_update_query .= ", `dokan_lease` = '$dokan_lease'";
    }

    if ($dokan_license !== '') {
        $dokan_update_query .= ", `dokan_license` = '$dokan_license'";
    }

    if ($owner_cnic !== '') {
        $dokan_update_query .= ", `owner_cnic` = '$owner_cnic'";
    }

    if ($owner_image !== '') {
        $dokan_update_query .= ", `owner_image` = '$owner_image'";
    }

    // Append updated_by and updated_date
    $dokan_update_query .= ", `updated_by` = '$updated_by', `updated_date` = '$updated_date' WHERE `dokan_id` = '$dokan_id'";

    // Execute the update query
    $dokan_update = mysqli_query($conn, $dokan_update_query);

    // Check if update was successful and redirect accordingly
    if ($dokan_update) {
        redirect("dokan-details.php", "Your data has been updated successfully");
        exit();
    } else {
        redirect("dokan-details.php", "Your data has not been updated successfully");
        exit();
    }
}



// ====================================== dokan-form.php (dokan_delete_id) =========================================

if (isset($_GET['dokan_delete_id'])) {
    $dokan_id = $_GET['dokan_delete_id'];
    $update_query = "UPDATE `dokan` SET `status` = 'غیر فعال' WHERE `dokan_id` = '$dokan_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("dokan-details.php", "دوکان ہوچکا ہے");
        exit();
    } else {
        header("location:dokan-details.php");
        exit();
    }
}
