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
// // =======================teacher page insert====================
if (isset($_POST['teacherBtn'])) {
    $teacherReg  = mysqli_real_escape_string($conn, $_POST['teacherReg']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $teacherName  = mysqli_real_escape_string($conn, $_POST['teacherName']);
    $teacherfathername  = mysqli_real_escape_string($conn, $_POST['teacherfathername']);
    $teachergender = mysqli_real_escape_string($conn, $_POST['teachergender']);
    $DateBirth = mysqli_real_escape_string($conn, $_POST['DateBirth']);
    $cnic  = mysqli_real_escape_string($conn, $_POST['teacherCnic']);
    $teachernumber  = mysqli_real_escape_string($conn, $_POST['teachernumber']);
    $teacheremail  = mysqli_real_escape_string($conn, $_POST['teacheremail']);
    $teacheraddress  = mysqli_real_escape_string($conn, $_POST['teacheraddress']);
    $teacherQualification  = mysqli_real_escape_string($conn, $_POST['teacherQualification']);
    $teacherExp  = mysqli_real_escape_string($conn, $_POST['teacherExp']);
    $teacherToughtSubject  = mysqli_real_escape_string($conn, $_POST['teacherToughtSubject']);
    $teacherToughtClasses  = mysqli_real_escape_string($conn, $_POST['teacherToughtClasses']);
    $teacherEmployStatus  = mysqli_real_escape_string($conn, $_POST['teacherEmployStatus']);
    $teacherJoinDate  = mysqli_real_escape_string($conn, $_POST['teacherJoinDate']);
    $teacherSalary  = mysqli_real_escape_string($conn, $_POST['teacherSalary']);
    $teacherEmergNumber  = mysqli_real_escape_string($conn, $_POST['teacherEmergNumber']);
    $note  = mysqli_real_escape_string($conn, $_POST['note']);
    $checkQuery = "SELECT * FROM `teacher` WHERE `register_num` = '$teacherReg'  AND  `cnic` = '$cnic' AND `madarsa_id` = '$madarasa' AND  `phone` = '$teachernumber'  AND  `email` = '$teacheremail'  AND  `otherNumber` = '$teacherEmergNumber'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    }
    $checkQuery = "SELECT * FROM `madarsa` WHERE `phone` = '$teacherEmergNumber' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['phone'] = 'استاد کا فون پہلے سے موجود ہے';
        header("location: tc-admission-form.php");
        exit();
    } else {
        $insertQuery = "INSERT INTO `teacher` (`register_num`, `madarsa_id`, `tea_name`, `father_name`, `gander`, `dateOfBir`, `phone`, `email`, `adddress`, `degree`, `exprence`, `previousBook`, `previousClass`, `userType`, `joningDate`, `salary`, `otherNumber`, `note`) 
        VALUES ('$teacherReg', '$madarasa', '$teacherName', '$teacherfathername', '$teachergender', '$DateBirth', '$teachernumber', '$teacheremail', '$teacheraddress', '$teacherQualification', '$teacherExp', '$teacherToughtSubject', '$teacherToughtClasses', '$teacherEmployStatus', '$teacherJoinDate', '$teacherSalary', '$teacherEmergNumber', '$note')";

        if (mysqli_query($conn, $insertQuery)) {;
            unset($_SESSION['input']);
            redirect("tc-admission-form.php", " استاد ایڈ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:tc-admission-form.php");
            exit();
        }
    }
}
// ==================teacher Delete==================
if (isset($_GET['teacher_delete'])) {
    $id = $_GET['teacher_delete'];
    $delete_query = "UPDATE `teacher` SET `status` = 'غیر فعال' WHERE `id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("tc-details.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:tc-details.php');
        exit();
    }
}

// ======================teacher Update========================
if (isset($_POST['teacherUpdate'])) {
    $teacherID  = mysqli_real_escape_string($conn, $_POST['teacher_id']);
    $teacherReg  = mysqli_real_escape_string($conn, $_POST['teacherReg']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $teacherName  = mysqli_real_escape_string($conn, $_POST['teacherName']);
    $teacherfathername  = mysqli_real_escape_string($conn, $_POST['teacherfathername']);
    $teachergender = mysqli_real_escape_string($conn, $_POST['teachergender']);
    $DateBirth = mysqli_real_escape_string($conn, $_POST['DateBirth']);
    $teachernumber  = mysqli_real_escape_string($conn, $_POST['teachernumber']);
    $teacheremail  = mysqli_real_escape_string($conn, $_POST['teacheremail']);
    $teacheraddress  = mysqli_real_escape_string($conn, $_POST['teacheraddress']);
    $teacherQualification  = mysqli_real_escape_string($conn, $_POST['teacherQualification']);
    $teacherExp  = mysqli_real_escape_string($conn, $_POST['teacherExp']);
    $teacherToughtSubject  = mysqli_real_escape_string($conn, $_POST['teacherToughtSubject']);
    $teacherToughtClasses  = mysqli_real_escape_string($conn, $_POST['teacherToughtClasses']);
    $teacherEmployStatus  = mysqli_real_escape_string($conn, $_POST['teacherEmployStatus']);
    $teacherJoinDate  = mysqli_real_escape_string($conn, $_POST['teacherJoinDate']);
    $teacherSalary  = mysqli_real_escape_string($conn, $_POST['teacherSalary']);
    $teacherEmergNumber  = mysqli_real_escape_string($conn, $_POST['teacherEmergNumber']);
    $note  = mysqli_real_escape_string($conn, $_POST['note']);
    $checkQuery = "SELECT * FROM `teacher` WHERE `register_num` = '$teacherReg'  AND  `madarsa_id` = '$madarasa' AND  `phone` = '$teachernumber'  AND  `email` = '$teacheremail' AND  `cnic` = '$cnic' AND  `otherNumber` = '$teacherEmergNumber' AND `id`!='$teacherID'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: madarsa_add.php");
        exit();
    }
    $checkQuery = "SELECT * FROM `madarsa` WHERE `phone` = '$phone' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['phone'] = 'استاد کا فون پہلے سے موجود ہے';
        header("location: tc-admission-form.php");
        exit();
    } else {
        $updateQuery = "UPDATE `teacher` SET `register_num` = '$teacherReg', `madarsa_id` = '$madarasa', `tea_name` = '$teacherName', `father_name` = '$teacherfathername',`gander` = '$teachergender',
        `dateOfBir` = '$DateBirth',`phone` = '$teachernumber',`email` = '$teacheremail',`adddress` = '$teacheraddress', `degree` = '$teacherQualification', `exprence` = '$teacherExp',`previousBook` = '$teacherToughtSubject',
        `previousClass` = '$teacherToughtClasses',`userType` = '$teacherEmployStatus',`joningDate` = '$teacherJoinDate',`salary` = '$teacherSalary',
        `otherNumber` = '$teacherEmergNumber',`note` = '$note' WHERE `id` = $teacherID"; // Assuming teacher_id is the unique identifier for each teacher


        if (mysqli_query($conn, $updateQuery)) {;
            unset($_SESSION['input']);
            redirect("tc-admission-form.php", " استاد اپڈیٹ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:tc-admission-form.php");
            exit();
        }
    }
}

// // =======================salary page insert====================
if (isset($_POST['salaryBtn'])) {
    $teacher_name  = mysqli_real_escape_string($conn, $_POST['teacher_name']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']); // Assuming 'madarasa' is the name of the input field
    $basic_salary  = mysqli_real_escape_string($conn, $_POST['basic_salary']);
    $allowances  = mysqli_real_escape_string($conn, $_POST['allowances']);
    $deductions = mysqli_real_escape_string($conn, $_POST['deductions']);
    $salary_given = mysqli_real_escape_string($conn, $_POST['salary_given']);
    $salary_date  = mysqli_real_escape_string($conn, $_POST['salary_date']);
    $payment_method  = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);
    // $total_salary = $salary_given + $allowances ;
    $salary1_salary = $basic_salary - $deductions;  // Calculation of salary before deductions
    $remaining_salary = $salary1_salary - $salary_given; // Calculation of remaining salary

    $checkQuery = "SELECT * FROM `salary` WHERE `register_num` = '$teacher_name'  AND  `madarsa_id` = '$madarasa' AND  `salary_date` = '$salary_date' ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: salary-form.php");
        exit();
    }
    // $checkQuery = "SELECT * FROM `salary` WHERE `phone` = '$phone' ";
    // $checkResult = mysqli_query($conn, $checkQuery);

    // if (mysqli_num_rows($checkResult) > 0) {
    //     $_SESSION['phone'] = 'استاد کا فون پہلے سے موجود ہے';
    //     header("location: tc-admission-form.php");
    //     exit();
    // }
    else {
        $insertQuery = "INSERT INTO `salary` (`register_num`, `madarsa_id`, `basic_salary`, `allowances`, `deductions`, `salary_given`, `salary_date`, `payment_method`, `description`,  `remaining_salary`) 
        VALUES ('$teacher_name', '$madarasa', '$basic_salary', '$allowances', '$deductions', '$salary_given', '$salary_date', '$payment_method', '$description', '$remaining_salary')";

        if (mysqli_query($conn, $insertQuery)) {;
            unset($_SESSION['input']);
            redirect("salary-form.php", " تنخواہ ایڈ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:salary-form.php");
            exit();
        }
    }
}

// =================salary delete =================
if (isset($_GET['salary_delete'])) {
    $id = $_GET['salary_delete'];
    $delete_query = "UPDATE `salary` SET `status` = 'غیر فعال' WHERE `id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("salary-details.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:salary-details.php');
        exit();
    }
}
// ===============salary Update==============
if (isset($_POST['salaryUpdate'])) {
    $edit_id  = mysqli_real_escape_string($conn, $_POST['edit_id']);
    $teacher_name  = mysqli_real_escape_string($conn, $_POST['teacher_name']);
    $madarasa = mysqli_real_escape_string($conn, $_POST['madarasa']); // Assuming 'madarasa' is the name of the input field
    $basic_salary  = mysqli_real_escape_string($conn, $_POST['basic_salary']);
    $allowances  = mysqli_real_escape_string($conn, $_POST['allowances']);
    $deductions = mysqli_real_escape_string($conn, $_POST['deductions']);
    $salary_given = mysqli_real_escape_string($conn, $_POST['salary_given']);
    $salary_date  = mysqli_real_escape_string($conn, $_POST['salary_date']);
    $payment_method  = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $description  = mysqli_real_escape_string($conn, $_POST['description']);
    // $total_salary = $salary_given + $allowances ;
    $salary1_salary = $basic_salary - $deductions;  // Calculation of salary before deductions
    $remaining_salary = $salary1_salary - $salary_given; // Calculation of remaining salary

    $checkQuery = "SELECT * FROM `salary` WHERE `register_num` = '$teacher_name'  AND  `madarsa_id` = '$madarasa' AND  `salary_date` = '$salary_date' AND `id` != '$edit_id'  ";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = 'مدرسہ کا ای میل پہلے سے موجود ہے';
        header("location: salary-edit.php?edit_salary=$edit_id");
        exit();
    }
    // $checkQuery = "SELECT * FROM `salary` WHERE `phone` = '$phone' ";
    // $checkResult = mysqli_query($conn, $checkQuery);

    // if (mysqli_num_rows($checkResult) > 0) {
    //     $_SESSION['phone'] = 'استاد کا فون پہلے سے موجود ہے';
    //     header("location: tc-admission-form.php");
    //     exit();
    // }
    else {
        $UdateQuery = "UPDATE `salary` 
        SET 
            `madarsa_id` = '$madarasa',
            `basic_salary` = '$basic_salary',
            `allowances` = '$allowances',
            `deductions` = '$deductions',
            `salary_given` = '$salary_given',
            `salary_date` = '$salary_date',
            `payment_method` = '$payment_method',
            `description` = '$description',
            `remaining_salary` = '$remaining_salary'
        WHERE 
            `id` = '$edit_id';
        ";

        if (mysqli_query($conn, $UdateQuery)) {;
            unset($_SESSION['input']);
            redirect("salary-details.php", " تنخواہ اپڈیٹ  ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding announcement. Please try again.';
            header("location:salary-details.php");
            exit();
        }
    }
}

//=====================Expance================
if (isset($_POST['ExpanceBtn'])) {
    $madarasa  = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $RegNumber = mysqli_real_escape_string($conn, $_POST['RegNumber']); // Assuming 'madarasa' is the name of the input field
    $expance_name  = mysqli_real_escape_string($conn, $_POST['expance_name']);
    $resiveName  = mysqli_real_escape_string($conn, $_POST['resiveName']);
    $expance_amount = mysqli_real_escape_string($conn, $_POST['expance_amount']);
    $pay_now = mysqli_real_escape_string($conn, $_POST['pay_now']);
    $expanceـdate  = mysqli_real_escape_string($conn, $_POST['expanceـdate']);
    $expance_month  = mysqli_real_escape_string($conn, $_POST['expance_month']);
    $short_discription  = mysqli_real_escape_string($conn, $_POST['short_discription']);
    $checkQuery = "SELECT * FROM `expance` WHERE `RegNumber` = '$RegNumber'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = '   رسید نمبر پہلے سے موجود ہے';
        header("location: expance.php");
        exit();
    } else {
        $insertQuery = "INSERT INTO `expance` (`RegNumber`, `madarsa_id`, `expance_name`, `resiveName`, `expanceAmount`, `pay_now`, `expanceـdate`, `expance_month`, `description`) 
        VALUES ('$RegNumber', '$madarasa', '$expance_name', '$resiveName', '$expance_amount', '$pay_now', '$expanceـdate', '$expance_month', '$short_discription')";

        if (mysqli_query($conn, $insertQuery)) {;
            unset($_SESSION['input']);
            redirect("expance.php", " خرچہ ایڈ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding Expance. Please try again.';
            header("location:expance.php");
            exit();
        }
    }
}
// ===================Expance Delete================
if (isset($_GET['expance_delete'])) {
    $id = $_GET['expance_delete'];
    $delete_query = "UPDATE `expance` SET `status` = 'غیر فعال' WHERE `expance_id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("expance_details.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:expance_details.php');
        exit();
    }
}
// ====================Expance Update==================
if (isset($_POST['ExpanceUpdate'])) {
    $madarasa  = mysqli_real_escape_string($conn, $_POST['madarasa']);
    $expance_edit  = mysqli_real_escape_string($conn, $_POST['expance_edit']);
    $RegNumber = mysqli_real_escape_string($conn, $_POST['RegNumber']); // Assuming 'madarasa' is the name of the input field
    $expance_name  = mysqli_real_escape_string($conn, $_POST['expance_name']);
    $resiveName  = mysqli_real_escape_string($conn, $_POST['resiveName']);
    $expance_amount = mysqli_real_escape_string($conn, $_POST['expance_amount']);
    $pay_now = mysqli_real_escape_string($conn, $_POST['pay_now']);
    $expanceـdate  = mysqli_real_escape_string($conn, $_POST['expanceـdate']);
    $expance_month  = mysqli_real_escape_string($conn, $_POST['expance_month']);
    $short_discription  = mysqli_real_escape_string($conn, $_POST['short_discription']);

    $checkQuery = "SELECT * FROM `expance` WHERE `RegNumber` = '$RegNumber' AND $expance_edit !=`expance_id`";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = '   رسید نمبر پہلے سے موجود ہے';
        header("location: expance_edit.php?expance_edit=$expance_edit");
        exit();
    } else {
        $updateQuery = "UPDATE `expance` 
        SET 
        `RegNumber` = '$RegNumber',
        `madarsa_id` = '$madarasa',
        `expance_name` = '$expance_name',
        `resiveName` = '$resiveName',
        `expanceAmount` = '$expance_amount',
        `pay_now` = '$pay_now',
        `expanceـdate` = '$expanceـdate',
        `expance_month` = '$expance_month',
        `description` = '$short_discription'
        WHERE  `expance_id` = '$expance_edit'";

        if (mysqli_query($conn, $updateQuery)) {;
            unset($_SESSION['input']);
            redirect("expance_details.php", " خرچہ اپڈیٹ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding Expance. Please try again.';
            header("location:expance_details.php");
            exit();
        }
    }
}
// =====================income =====================
if (isset($_POST['incomeBtn'])) {
    $RegNumber  = mysqli_real_escape_string($conn, $_POST['RegNumber']);
    $madarsa = mysqli_real_escape_string($conn, $_POST['madarasa']); // Assuming 'madarasa' is the name of the input field
    $income_name  = mysqli_real_escape_string($conn, $_POST['income_name']);
    $incomeCategory  = mysqli_real_escape_string($conn, $_POST['incomecategriy']);
    $incomeAmount = mysqli_real_escape_string($conn, $_POST['incomeAmount']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $receiverName  = mysqli_real_escape_string($conn, $_POST['resiveName']);
    $incomeDate  = mysqli_real_escape_string($conn, $_POST['incomeDate']);
    $income_month  = mysqli_real_escape_string($conn, $_POST['incomeMonth']);
    $short_discription  = mysqli_real_escape_string($conn, $_POST['short_discription']);
    $checkQuery = "SELECT * FROM `income` WHERE `RegNumber` = '$RegNumber'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['email'] = '   رسید نمبر پہلے سے موجود ہے';
        header("location: income-form.php");
        exit();
    } else {
        $insertQuery ="INSERT INTO `income`(`madarsa_id`, `RegNumber`, `income_name`, `incomeCategory`, `incomeAmount`, `payment_method`, `receiverName`, `incomedate`, `income_month`, `description`) 
        VALUES ('$madarsa','$RegNumber','$income_name','$incomeCategory','$incomeAmount','$payment_method','$receiverName','$incomeDate','$income_month','$short_discription')";

        if (mysqli_query($conn, $insertQuery)) {;
            unset($_SESSION['input']);
            redirect("income-form.php", "   آمدنی ایڈ ہو چکا ہے");
            exit();
        } else {
            $_SESSION['error_message'] = 'Error in adding Expance. Please try again.';
            header("location:income-form.php");
            exit();
        }
    }
}

// ===================income Delete================
if (isset($_GET['income_delete'])) {
    $id = $_GET['income_delete'];
    $delete_query = "UPDATE `income` SET `status` = 'غیر فعال' WHERE `income_id` = '$id'";

    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("income-details.php", "ڈیٹا حذف کر دیا گیا ہے ");
        exit();
    } else {
        $_SESSION['not_successfully'] = "ڈیٹا حذف نہیں ھوا ہے ";
        header('location:income-details.php');
        exit();
    }
}
?>