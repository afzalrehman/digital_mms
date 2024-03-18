<?php
include "../includes/config.php";
include "../includes/function.php";
session_start();
?>
<!-- ==========================Madarsa add code ========================= -->
<?php
$errors = [];
if (isset($_POST['ins_submit'])) {
    $register  = mysqli_real_escape_string($conn, $_POST['register']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $city  = mysqli_real_escape_string($conn, $_POST['city']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone  = mysqli_real_escape_string($conn, $_POST['phone']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);
    $checkQuery = "SELECT * FROM `madarsa` WHERE `madarsa_emial` = '$email' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    }
    $checkQuery = "SELECT * FROM `madarsa` WHERE `phone` = '$phone' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['phone'] = 'مدرسہ کا فون پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    } else {
        $insertQuery = "INSERT INTO `madarsa` (`RigitarNumber`, `madarsa_name`, `city`, `address`, `establish_date`, `madarsa_emial`,`phone`,`description`, `created_by`,`created_date`)
        VALUES ('$register','$name','$city','$address','$date', '$email','$phone','$description','قاری عبداللہ صاحب', NOW())";
        if (mysqli_query($conn, $insertQuery)) {;
            unset($_SESSION['input']);
            redirect("madarsa_add.php", " مدرسہ ایڈ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:madarsa_add.php");
            exit();
        }
    }
}
// <!-- =========================institute delete page code =============================== -->
if (isset($_GET['madarsa_delete'])) {
    $madarsa_id = $_GET['madarsa_delete'];
    $update_query = "UPDATE `madarsa` SET `status` = 'غیر فعال' WHERE `madarsa_id` = '$madarsa_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("madarsa_details.php", "مدرسہ دیلیٹ ہوچکا ہے");
        exit();
    } else {
        header("location:madarsa_details.php");
        exit();
    }
}
// ================================institute page update code===========================
if (isset($_POST['ins_update'])) {
    $id_update  = mysqli_real_escape_string($conn, $_POST['id_update']);
    $register  = mysqli_real_escape_string($conn, $_POST['register']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $city  = mysqli_real_escape_string($conn, $_POST['city']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone  = mysqli_real_escape_string($conn, $_POST['phone']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);

    $checkQuery = "SELECT * FROM `madarsa` WHERE `madarsa_emial` = '$email' AND `madarsa_id` !='$id_update' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Class with the same name already exists
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    }
    $checkQuery = "SELECT * FROM `madarsa` WHERE `phone` = '$phone' AND `madarsa_id` !='$id_update'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Class with the same name already exists
        $_SESSION['phone'] = 'مدرسہ کا فون پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    } else {
        $updateQuery = "UPDATE `madarsa` 
            SET 
                `RigitarNumber` = '$register',
                `madarsa_name` = '$name',
                `city` = '$city',
                `address` = '$address',
                `establish_date` = '$date',
                `madarsa_emial` = '$email',
                `phone` = '$phone',
                `description` = '$description',
                `updated_by` = 'قاری عبداللہ صاحب',
                `updated_date` = NOW()
            WHERE
                `madarsa_id` = '$id_update'";

        if (mysqli_query($conn, $updateQuery)) {
            unset($_SESSION['input']);
            redirectupdate("madarsa_details.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:madarsa_details.php");
            exit();
        }
    }
}
// <!-- ========================= betch Name Add =============================== -->
if (isset($_POST['BatchBtn'])) {

    $admission_date = mysqli_real_escape_string($conn, $_POST['admission_date']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $batch_name = mysqli_real_escape_string($conn, $_POST['batch_name']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $last_date = mysqli_real_escape_string($conn, $_POST['last_date']);
    $checkQuery = "SELECT * FROM `batch` WHERE 
            `Name` = '$batch_name' AND 
            `madarsa_id` = '$madarasa'";

    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['batch_name_exit'] = 'یہ ڈیٹاپہلے سے موجود ہے';
        header("location: batch.php");
        exit();
    } else {
        $insert_query = "INSERT INTO `batch` (`Name`, `start_date`, 
            `end_date`, `madarsa_id`, `admission_date`)
        VALUES ('$batch_name','$start_date','$last_date',
        '$madarasa','$admission_date')";

        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            redirect("batch.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
        } else {
            echo 'Error adding fee details.';
        }
    }
}

// <!-- =========================batch delete page code =============================== -->
if (isset($_GET['batch_delete'])) {
    $madarsa_id = $_GET['batch_delete'];
    $update_query = "UPDATE `batch` SET `status` = 'غیر فعال' WHERE `batch_id` = '$madarsa_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("batch.php", "سال دیلیٹ ہوچکا ہے");
        exit();
    } else {
        header("location:batch.php");
        exit();
    }
}

// <!-- ========================= betch Name Update =============================== -->
if (isset($_POST['Batchupdate'])) {
    $batch_id = mysqli_real_escape_string($conn, $_POST['batch_id']);
    $admission_date = mysqli_real_escape_string($conn, $_POST['admission_date']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $batch_name = mysqli_real_escape_string($conn, $_POST['batch_name']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $last_date = mysqli_real_escape_string($conn, $_POST['last_date']);

    $checkQuery = "SELECT * FROM `batch` WHERE `Name` = '$batch_name' AND `madarsa_id` = '$madarasa' AND `batch_id` !='$batch_id' ";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['batch_name_exit'] = 'یہ ڈیٹاپہلے سے موجود ہے';
        header("location: batch-edit.php?batch-edit=$batch_id");
        exit();
    } else {
        $update_query = "UPDATE `batch` SET 
        `Name` = '$batch_name', 
        `start_date` = '$start_date', 
        `end_date` = '$last_date', 
        `madarsa_id` = '$madarasa', 
        `admission_date` = '$admission_date' 
        WHERE `batch_id` = '$batch_id'";

        $update_result = mysqli_query($conn, $update_query);


        if ($update_result) {
            redirect("batch.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
        } else {
            echo 'Error adding fee details.';
        }
    }
}

// // =========================department  insert=====================
if (isset($_POST['departmentBtn'])) {
    $department = trim(mysqli_real_escape_string($conn, $_POST['department']));
    $department_madarsa_id = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $checkQuery = "SELECT * FROM `department` WHERE TRIM(`department_name`) = '$department' AND `madarsa_id` = '$department_madarsa_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['department_exit'] = 'یہ شعبہ پہلے سے موجود ہے';
        header("location:department.php");
        exit();
    }
    // If the class doesn't exist, proceed with insertion
    $insertQuery = "INSERT INTO `department` ( `madarsa_id`,`department_name`, `created_by`,`created_date`)
        VALUES ('$department_madarsa_id','$department', 'قاری عبداللہ صاحب', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
        redirect("department.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding section. Please try again.';
        header("location:department.php");
        exit();
    }
}
// // =========================department page delete=====================
if (isset($_GET['department_delete'])) {
    $id = $_GET['department_delete'];
    $delete_query = "UPDATE `department` SET `status` = 'غیر فعال' WHERE `depart_id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("department.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:department.php');
        exit();
    }
}
// // ============================department page update=======================
if (isset($_POST['departmentUpdate'])) {
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $department_madarsa_id = mysqli_real_escape_string($conn, $_POST['madrasa_name']);
    $department_edit = mysqli_real_escape_string($conn, $_POST['department_id']);

    $checkQuery = "SELECT * FROM `department` WHERE `department_name` = '$department' AND `madarsa_id`= '$department_madarsa_id' AND `depart_id`!='$department_edit'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['department_exit'] = 'یہ شعبہ پہلے سے موجود ہے';
        header("location:department_edit.php?department_edit=$department_edit");
        exit();
    }

    $updateQuery = "UPDATE `department` SET `department_name` = '$department', `madarsa_id` = '$department_madarsa_id',`updated_by`= 'قاری عبداللہ صاحب',  `updated_date` = NOW() WHERE `depart_id` = '$department_edit'";
    if (mysqli_query($conn, $updateQuery)) {
        redirectupdate("department.php", "آپ کا ڈیٹا اپ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding section. Please try again.';
        header("location:department.php");
        exit();
    }
}

// ======================section add========================

if (isset($_POST['sectionBtn'])) {
    $section = trim(mysqli_real_escape_string($conn, $_POST['section']));
    $section_madarsa_id = mysqli_real_escape_string($conn, $_POST['madarasa']);

    $checkQuery = "SELECT * FROM `section` WHERE TRIM(`section_name`) = '$section' AND `sec_id` = '$section_madarsa_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['section_exit'] = 'یہ سیکشن پہلے سے موجود ہے';
        header("location:section.php");
        exit();
    }
    // If the class doesn't exist, proceed with insertion
    $insertQuery = "INSERT INTO `section` ( `madarsa_id`,`section_name`, `created_by`,`created_date`)
        VALUES ('$section_madarsa_id','$section', 'قاری عبداللہ صاحب', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
        redirect("section.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding section. Please try again.';
        header("location:section.php");
        exit();
    }
}

// // <!-- =========================section delete page code =============================== -->
if (isset($_GET['section_delete'])) {
    $id = $_GET['section_delete'];
    $delete_query = "UPDATE `section` SET `status` = 'غیر فعال' WHERE `sec_id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("section.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:section.php');
        exit();
    }
}

// // ========================section update=====================
if (isset($_POST['sectionUpdate'])) {
    $section = trim(mysqli_real_escape_string($conn, $_POST['section']));
    $section_madarsa_id = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $section_edit = mysqli_real_escape_string($conn, $_POST['section_edit']);

    $checkQuery = "SELECT * FROM `section` WHERE TRIM(`section_name`) = '$section' AND `sec_id` = '$section_madarsa_id' AND `sec_id` != '$section_edit'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['section_exit'] = 'یہ سیکشن پہلے سے موجود ہے';
        header("location:section.php");
        exit();
    }
    // If the class doesn't exist, proceed with insertion
    $insertQuery = "UPDATE `section` SET `section_name` = '$section', `madarsa_id` = '$section_madarsa_id',`updated_by`= 'قاری عبداللہ صاحب',  `updated_date` = NOW() WHERE `sec_id` = '$section_edit'";

    if (mysqli_query($conn, $insertQuery)) {
        redirect("section.php", "آپ کا دیٹا اپڈیٹ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding section. Please try again.';
        header("location:section.php");
        exit();
    }
}
// ======================class add========================

if (isset($_POST['classbtn'])) {
    $class = trim(mysqli_real_escape_string($conn, $_POST['class']));
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    // $section = mysqli_real_escape_string($conn, $_POST['section']);
    $section_class = is_array($_POST['section']) ? implode(',', $_POST['section']) : '';

    $checkQuery = "SELECT * FROM `madarsa_class` WHERE TRIM(`class_name`) = '$class' AND `madarsa_id`='$madarasa'AND `depart_id`='$department' AND `id`!='$class_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['class_exit'] = 'یہ کلاس پہلے سے موجود ہے';
        header("location:madaris_class.php");
        exit();
    }
    // If the class doesn't exist, proceed with insertion
    $insertQuery = "INSERT INTO `madarsa_class` ( `class_name`,`madarsa_id`,`sec_id`,`depart_id`,`created_by`,`created_date`)
        VALUES ('$class','$madarasa','$section_class','$department','قاری عبداللہ صاحب', NOW())";

    if (mysqli_query($conn, $insertQuery)) {
        redirect("madaris_class.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding class. Please try again.';
        header("location:madaris_class.php");
        exit();
    }
}

// =================class delete=================
if (isset($_GET['class_delete'])) {
    $id = $_GET['class_delete'];
    $delete_query = "UPDATE `madarsa_class` SET `status` = 'غیر فعال' WHERE `id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("madaris_class.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:madaris_class.php');
        exit();
    }
}

// ===========class update==========
if (isset($_POST['classUpdate'])) {
    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
    $class = trim(mysqli_real_escape_string($conn, $_POST['class']));
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    // $section = mysqli_real_escape_string($conn, $_POST['section']);
    $section_class = is_array($_POST['section']) ? implode(',', $_POST['section']) : '';

    $checkQuery = "SELECT * FROM `madarsa_class` WHERE TRIM(`class_name`) = '$class' AND `madarsa_id`='$madarasa'AND `depart_id`='$department' AND `id`!='$class_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['class_exit'] = 'یہ کلاس پہلے سے موجود ہے';
        header("location:madarsa_classEdit.php?class_edit=$class_id");
        exit();
    }
    $updateQuery = "UPDATE `madarsa_class` SET `class_name` = '$class', `madarsa_id`='$madarasa', `depart_id`='$department',`sec_id`='$section_class', `updated_by`= 'قاری عبداللہ صاحب',  `updated_date` = NOW() WHERE `id` = '$class_id'";

    if (mysqli_query($conn, $updateQuery)) {
        redirect("madaris_class.php", "آپ کا دیٹا اپڈیٹ ہوچکا ہے");
        exit();
    } else {
        // Insertion failed
        $_SESSION['error_message'] = 'Error in adding class. Please try again.';
        header("location:madarsa_classEdit.php");
        exit();
    }
}
// // =======================class page insert====================
// if (isset($_POST['class_submit'])) {
//     $ins_name = mysqli_real_escape_string($conn, $_POST['ins_name']);
//     $class = mysqli_real_escape_string($conn, $_POST['class']);
//     $department_class = mysqli_real_escape_string($conn, $_POST['trade_add']);
//     $section = is_array($_POST['section_class']) ? implode(',', $_POST['section_class']) : '';

//     if (empty($ins_name) || empty($class) || empty($section) || empty($department_class)) {
//         if (empty($ins_name)) {
//             $_SESSION['ins_name'] = 'مدرسہ منتخب نہیں ہے';
//         }
//         if (empty($department_class)) {
//             $_SESSION['department_check_2'] = 'شعبہ منتخب نہیں ہے';
//         }
//         if (empty($section)) {
//             $_SESSION['section_check'] = 'سیکشن منتخب نہیں ہے';
//         }
//         header('location:class.php');
//         exit();
//     } else {
//         // Check if the class already exists
//         $checkQuery = "SELECT * FROM `class` WHERE `madarsa_id` = '$ins_name' AND `class` = '$class'";
//         $checkResult = mysqli_query($conn, $checkQuery);

//         if (mysqli_num_rows($checkResult) > 0) {
//             // Class with the same name already exists
//             $_SESSION['class_check'] = 'یہ کلاس پہلے سے موجود ہے';
//             header("location:class.php");
//             exit();
//         }

//         // If the class doesn't exist, proceed with insertion
//         $insert_Query = "INSERT INTO `class` (`madarsa_id`, `class`, `section`, `department`, `created_by`, `created_date`)
//         VALUES ('$ins_name','$class', '$section', '$department_class', 'قاری عبداللہ صاحب', NOW())";

//         if (mysqli_query($conn, $insert_Query)) {
//             // Assuming 'redirect' is a function to redirect with a success message
//             redirect("class.php", "آپ کا ڈیٹا ایڈ ہو چکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             header("location:class.php");
//             exit();
//         }
//     }
// }

// // =========================class page delete=====================
// if (isset($_GET['class_id'])) {
//     $id = $_GET['class_id'];
//     $delete_query = "DELETE FROM `class` WHERE `id` = '$id'";
//     $sql = mysqli_query($conn, $delete_query);
//     if ($sql) {
//         redirectdelete("class.php", "ڈیٹا حذف کر دیا گیا ہے ");
//         exit();
//     } else {
//         $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
//         header('location:class.php');
//         exit();
//     }
// }

// // ======================class page update qurey ============================
// if (isset($_POST['class_update'])) {
//     $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
//     $ins_name = mysqli_real_escape_string($conn, $_POST['ins_name']);
//     $class = mysqli_real_escape_string($conn, $_POST['class']);
//     $department_class = mysqli_real_escape_string($conn, $_POST['trade_add']);
//     $section = is_array($_POST['section_class']) ? implode(',', $_POST['section_class']) : '';

//     if (empty($ins_name) || empty($class) || empty($section) || empty($department_class)) {
//         if (empty($ins_name)) {
//             $_SESSION['ins_name'] = 'مدرسہ منتخب نہیں ہے';
//         }
//         if (empty($department_class)) {
//             $_SESSION['department_check_2'] = 'شعبہ منتخب نہیں ہے';
//         }
//         if (empty($section)) {
//             $_SESSION['section_check'] = 'سیکشن منتخب نہیں ہے';
//         }
//         header("location:edit_class.php?class_edit=$class_id");
//         exit();
//     } else {
//         // Check if the class already exists
//         $checkQuery = "SELECT * FROM `class` WHERE `madarsa_id` = '$ins_name' AND `class` = '$class' AND `id` != '$class_id'";
//         $checkResult = mysqli_query($conn, $checkQuery);

//         if (mysqli_num_rows($checkResult) > 0) {
//             // Class with the same name already exists
//             $_SESSION['class_check'] = 'یہ کلاس پہلے سے موجود ہے';
//             header("location:edit_class.php?class_edit=$class_id");
//             exit();
//         }
//         $updateQuery = "UPDATE `class` 
//         SET 
//             `madarsa_id` = '$ins_name',
//             `class` = '$class',
//             `section` = '$section',
//             `department` = '$department_class',
//             `created_by` = 'قاری عبداللہ صاحب',
//             `created_date` = NOW()
//         WHERE
//             `id` = '$class_id'";
//         // If the class doesn't exist, proceed with insertion

//         if (mysqli_query($conn, $updateQuery)) {
//             // Assuming 'redirect' is a function to redirect with a success message
//             redirectupdate("class.php", "آپ کا ڈیٹا ایڈ ہو چکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             header("location:class.php");
//             exit();
//         }
//     }
// }
?>