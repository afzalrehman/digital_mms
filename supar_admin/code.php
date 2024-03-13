<?php include "../config/config.php"; ?>
<?php include "includes/function.php"; ?>
<!-- ==========================Madarsa add code ========================= -->
<?php
session_start();
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

    // if (empty($register) || empty($name) ||  empty($city) || empty($address) || empty($date) || empty($email) || empty($phone)) {
    //     if (empty($register)) {
    //         $errors['register'] = 'براۓ مہربانئ مدرسہ کا رجسٹریشن نمبر ایڈ کریں';
    //     }
    //     if (empty($name)) {
    //         $errors['name'] = ' مہربانئ مدرسہ کا نام نمبر ایڈ کریں';
    //     }
    //     if (empty($city)) {
    //         $errors['city'] = ' مہربانئ مدرسہ کس شہرمیں ہے ایڈ کریں';
    //     }
    //     if (empty($address)) {
    //         $errors['address'] = ' مہربانئ مدرسہ کا پتہ نمبر ایڈ کریں';
    //     }
    //     if (empty($date)) {
    //         $errors['date'] = ' مہربانئ مدرسہ کا قائم شدہ تاریخ ایڈ کریں';
    //     }
    //     if (empty($email)) {
    //         $errors['email'] = ' مہربانئ مدرسہ کا ای میل  ایڈ کریں';
    //     }
    //     if (empty($phone)) {
    //         $errors['phone'] = ' مہربانئ مدرسہ کا فون نمبر ایڈ کریں';
    //     }
    // }
    // if (!empty($errors)) {
    //     $_SESSION['errors'] = $errors;
    //     $_SESSION['input'] = $_POST;
    //     header("location: madarsa_add.php");
    //     exit();
    // } else {

        $checkQuery = "SELECT * FROM `madarsa` WHERE `madarsa_emial` = '$email' ";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Class with the same name already exists
            $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
            header("location: madarsa_add.php");
            exit();
        }
        $checkQuery = "SELECT * FROM `madarsa` WHERE `phone` = '$phone' ";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Class with the same name already exists
            $_SESSION['phone'] = 'مدرسہ کا فون پہلے سے موجود ہے';
            header("location: madarsa_add.php");
            exit();
        } else {
            $insertQuery = "INSERT INTO `madarsa` (`RigitarNumber`, `madarsa_name`, `city`, `address`, `establish_date`, `madarsa_emial`,`phone`,`description`, `created_by`,`created_date`)
        VALUES ('$register','$name','$city','$address','$date', '$email','$phone','$description','قاری عبداللہ صاحب', NOW())";
            if (mysqli_query($conn, $insertQuery)) {
                // header("location:All_institue.php");
                unset($_SESSION['input']);
                redirect("madarsa_add.php", "Your Data Insert Succses");
                exit();
            } else {
                // Insertion failed
                $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
                // header("location: annoucement-form.php");
                // exit();
                header("location:madarsa_add.php");
                exit();
            }
        }
    }
// }
// <!-- =========================institute delete page code =============================== -->
if (isset($_GET['madarsa_delete'])) {
    $madarsa_id = $_GET['madarsa_delete'];
    $update_query = "UPDATE `madrasa` SET `status` = 'inactive' WHERE `madarsa_id` = '$madarsa_id'";
    $sql = mysqli_query($conn, $update_query);
    if ($sql) {
        redirectdelete("madarsa_details.php", "Your Data Delete Succses");
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

    if (empty($register) || empty($name) ||  empty($city) || empty($address) || empty($date) || empty($email) || empty($phone)) {
        if (empty($register)) {
            $errors['register'] = 'براۓ مہربانئ مدرسہ کا رجسٹریشن نمبر ایڈ کریں';
        }
        if (empty($name)) {
            $errors['name'] = ' مہربانئ مدرسہ کا نام نمبر ایڈ کریں';
        }
        if (empty($city)) {
            $errors['city'] = ' مہربانئ مدرسہ کس شہرمیں ہے ایڈ کریں';
        }
        if (empty($address)) {
            $errors['address'] = ' مہربانئ مدرسہ کا پتہ نمبر ایڈ کریں';
        }
        if (empty($date)) {
            $errors['date'] = ' مہربانئ مدرسہ کا قائم شدہ تاریخ ایڈ کریں';
        }
        if (empty($email)) {
            $errors['email'] = ' مہربانئ مدرسہ کا ای میل  ایڈ کریں';
        }
        if (empty($phone)) {
            $errors['phone'] = ' مہربانئ مدرسہ کا فون نمبر ایڈ کریں';
        }
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['input'] = $_POST;
        header("location: madarsa_add.php");
        exit();
    } else {

        $checkQuery = "SELECT * FROM `madrasa` WHERE `madarsa_email` = '$email' AND `madarsa_id` !='$id_update' ";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Class with the same name already exists
            $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
            header("location: madarsa_add.php");
            exit();
        }
        $checkQuery = "SELECT * FROM `madrasa` WHERE `madarsa_phone` = '$phone' AND `madarsa_id` !='$id_update'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Class with the same name already exists
            $_SESSION['phone'] = 'مدرسہ کا فون پہلے سے موجود ہے';
            header("location: madarsa_add.php");
            exit();
        } else {
            $updateQuery = "UPDATE `madrasa` 
            SET 
                `register_no` = '$register',
                `madarsa_name` = '$name',
                `madarsa_city` = '$city',
                `madarsa_address` = '$address',
                `establish_date` = '$date',
                `madarsa_email` = '$email',
                `madarsa_phone` = '$phone',
                `madarsa_description` = '$description',
                `created_by` = 'قاری عبداللہ صاحب',
                `created_date` = NOW()
            WHERE
                `madarsa_id` = '$id_update'";

            if (mysqli_query($conn, $updateQuery)) {
                // header("location:All_institue.php");
                unset($_SESSION['input']);
                redirectupdate("madarsa_details.php", "Your Data Insert Succses");
                exit();
            } else {
                // Insertion failed
                $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
                // header("location: annoucement-form.php");
                // exit();
                header("location:madarsa_details.php");
                exit();
            }
        }
    }
}
// ======================section add========================

// if (isset($_POST['section_add'])) {
//     // Sanitize and retrieve form data
//     $madrasa_name = mysqli_real_escape_string($conn, $_POST['madrasa_name']);
//     $section_name = mysqli_real_escape_string($conn, $_POST['section_name']);
//     $section_discription = mysqli_real_escape_string($conn, $_POST['section_discription']);

//     if (empty($madrasa_name) || empty($section_name)) {
//         if (empty($madrasa_name)) {
//             $errors['madrasa_name'] = 'براۓ مہربانی مدرسہ کانام ایڈ کریں';
//         }
//         if (empty($section_name)) {
//             $errors['section'] = 'براۓ مہربانی سیکشن ایڈ کریں';
//         }
//         if (!empty($errors)) {
//             $_SESSION['errors'] = $errors;
//             $_SESSION['input'] = $_POST;
//             header("location: section_add.php");
//             exit();
//         }
//     } else {
//         $secton_qury = mysqli_query($conn, "SELECT * FROM `section` WHERE `madarsa_id` = '$madrasa_name' AND `section_name` = '$section_name'");
//         $check_reg_no = mysqli_num_rows($secton_qury);
//         if ($check_reg_no > 0) {
//             $_SESSION['section'] = "سیکشن نمبر پہلے سے موجود ہے";
//             header('location: section_add.php');
//             exit();
//         }
//         $insertQuery = "INSERT INTO `section` (`madarsa_id`, `section_name`, `section_discription`, `created_by`,`created_date`)
//         VALUES ('$madrasa_name' , '$section_name' ,'$section_discription' ,'قاری عبداللہ صاحب', NOW())";

//         if (mysqli_query($conn, $insertQuery)) {
//             redirect("section_add.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             // header("location: annoucement-form.php");
//             // exit();

//         }
//     }
// }

// // <!-- =========================section delete page code =============================== -->
// if (isset($_GET['section_delete'])) {
//     $section_id = $_GET['section_delete'];
//     $update_query = "UPDATE `section` SET `status` = 'inactive' WHERE `section_Id` = '$section_id'";
//     $sql = mysqli_query($conn, $update_query);
//     if ($sql) {
//         redirectdelete("section_add.php", "Your Data Delete Succses");
//         exit();
//     } else {
//         header("location:section_add.php");
//         exit();
//     }
// }

// // ========================section update=====================
// if (isset($_POST['section_update'])) {
//     // Sanitize and retrieve form data
//     $section_update_id = mysqli_real_escape_string($conn, $_POST['section_update_id']);
//     $madrasa_name = mysqli_real_escape_string($conn, $_POST['madrasa_name']);
//     $section_name = mysqli_real_escape_string($conn, $_POST['section_name']);
//     $section_discription = mysqli_real_escape_string($conn, $_POST['section_discription']);

//     if (empty($madrasa_name) || empty($section_name)) {
//         if (empty($madrasa_name)) {
//             $errors['madrasa_name'] = 'براۓ مہربانی مدرسہ کانام ایڈ کریں';
//         }
//         if (empty($section_name)) {
//             $errors['section'] = 'براۓ مہربانی سیکشن ایڈ کریں';
//         }
//         if (!empty($errors)) {
//             $_SESSION['errors'] = $errors;
//             $_SESSION['input'] = $_POST;
//             header("location: edit_section.php?edit_section=$section_update_id");
//             exit();
//         }
//     } else {
//         $secton_qury = mysqli_query($conn, "SELECT * FROM `section` WHERE `madarsa_id` = '$madrasa_name' AND `section_name` = '$section_name' AND `section_Id` <> '$section_update_id'");
//         $check_reg_no = mysqli_num_rows($secton_qury);
//         if ($check_reg_no > 0) {
//             $_SESSION['section'] = "سیکشن نمبر پہلے سے موجود ہے";
//             header("location: edit_section.php?edit_section=$section_update_id");
//             exit();
//         }
//         $updateQuery = "UPDATE `section` 
//         SET 
//             `madarsa_id` = '$madrasa_name',
//             `section_name` = '$section_name',
//             `section_discription` = '$section_discription',
//             `created_by` = 'قاری عبداللہ صاحب',
//             `created_date` = NOW()
//         WHERE
//             `section_Id` = '$section_update_id'";

//         if (mysqli_query($conn, $updateQuery)) {
//             redirectupdate("section_add.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             // header("location: annoucement-form.php");
//             // exit();

//         }
//     }
// }

// // =========================department  insert=====================
// if (isset($_POST['department_submit'])) {
//     $department = mysqli_real_escape_string($conn, $_POST['department']);
//     $department_madarsa_id = mysqli_real_escape_string($conn, $_POST['madrasa_name']);

//     // Check if $_POST['section_class'] is an array
//     if (empty($department)) {
//         if (empty($department)) {
//             $_SESSION['department_check'] = 'شعبہ منتخب نہیں ہے';
//         }
//         header('location:class.php');
//         exit();
//     } else {
//         // Check if the class already exists
//         $checkQuery = "SELECT * FROM `department` WHERE `department` = '$department' AND `madarsa_id` = '$department_madarsa_id'";
//         $checkResult = mysqli_query($conn, $checkQuery);

//         if (mysqli_num_rows($checkResult) > 0) {
//             // Class with the same name already exists
//             $_SESSION['department_check'] = 'یہ شعبہ پہلے سے موجود ہے';
//             header("location:class.php");
//             exit();
//         }
//         // If the class doesn't exist, proceed with insertion
//         $insertQuery = "INSERT INTO `department` ( `madarsa_id`,`department`, `created_by`,`created_date`)
//         VALUES ('$department_madarsa_id','$department', 'قاری عبداللہ صاحب', NOW())";

//         if (mysqli_query($conn, $insertQuery)) {
//             redirect("class.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             header("location:class.php");
//             exit();
//         }
//     }
// }

// // =========================department page delete=====================
// if (isset($_GET['department_id'])) {
//     $id = $_GET['department_id'];
//     $delete_query = "DELETE FROM `department` WHERE `id` = '$id'";
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
// // ============================department page update=======================
// if (isset($_POST['department_btn'])) {
//     $department = mysqli_real_escape_string($conn, $_POST['department']);
//     $department_madarsa_id = mysqli_real_escape_string($conn, $_POST['madrasa_name']);
//     $department_edit = mysqli_real_escape_string($conn, $_POST['department_edit']);

//     // Check if $_POST['section_class'] is an array
//     if (empty($department)) {
//         if (empty($department)) {
//             $_SESSION['department_check'] = 'شعبہ منتخب نہیں ہے';
//         }
//         header('location:class.php');
//         exit();
//     } else {
//         // Check if the class already exists
//         $checkQuery = "SELECT * FROM `department` WHERE `department` = '$department' AND `madarsa_id`= '$department_madarsa_id'";
//         $checkResult = mysqli_query($conn, $checkQuery);

//         if (mysqli_num_rows($checkResult) > 0) {
//             // Class with the same name already exists
//             $_SESSION['department_check'] = 'یہ شعبہ پہلے سے موجود ہے';
//             header("location:class.php");
//             exit();
//         }
//         // If the class doesn't exist, proceed with insertion

//         $updateQuery = "UPDATE `department` SET `department` = '$department', `madarsa_id` = '$department_madarsa_id',`updated_by`= 'قاری عبداللہ صاحب',  `updated_date` = NOW() WHERE `id` = '$department_edit'";
//         if (mysqli_query($conn, $updateQuery)) {
//             redirectupdate("class.php", "آپ کا ڈیٹا اپ ہوچکا ہے");
//             exit();
//         } else {
//             // Insertion failed
//             $_SESSION['error_message'] = 'Error in adding section. Please try again.';
//             header("location:class.php");
//             exit();
//         }
//     }
// }


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