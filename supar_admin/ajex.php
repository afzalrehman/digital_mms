<?php
include "../includes/config.php";
session_start();
if (isset($_POST['type'])) {
    if ($_POST['type'] == "class_Mad") {
        $sql = "SELECT * FROM madarsa ";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful: ' . mysqli_error($conn));
        $sutudent = '---';
        while ($row = mysqli_fetch_assoc($query)) {
            $sutudent .= "<option value='{$row['madarsa_id']}'>{$row['madarsa_name']}</option>";
        }
    } elseif ($_POST['type'] == "department_Data") {
        if (isset($_POST['id'])) {
            $batchId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `department` WHERE `madarsa_id` = '$batchId' ");
            $sutudent = '<option value="">---</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $sutudent .= "<option value='{$row['depart_id']}'>{$row['department_name']}</option>";
            }
        } else {
            $sutudent = 'ID not provided for batch Data';
        }
    }
} else {
    $sutudent = 'Type parameter not set';
}

echo $sutudent;

// =======================student page ===========================

if (isset($_POST['type'])) {
    if ($_POST['type'] == "studentMadarasa") {
        $sql = "SELECT * FROM madarsa WHERE status = 'فعال' ";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful: ' . mysqli_error($conn));
        $student_madarasa = '';
        while ($row = mysqli_fetch_assoc($query)) {
            $student_madarasa .= "<option value='{$row['madarsa_id']}'>{$row['madarsa_name']}</option>";
        }
    } elseif ($_POST['type'] == "Student_department") {
        if (isset($_POST['id'])) {
            $student_md_id = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `department` WHERE `madarsa_id` = '$student_md_id' ");
            $student_madarasa = '<option value="">- - -</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_madarasa .= "<option value='{$row['depart_id']}'>{$row['department_name']}</option>";
            }
        } else {
            $student_madarasa = 'ID not provided for batch Data';
        }
    } elseif ($_POST['type'] == "mad_new_year") {
        if (isset($_POST['id'])) {
            $student_md_id = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `batch` WHERE `madarsa_id` = '$student_md_id' ");
            $student_madarasa = '<option value="">- - -</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_madarasa .= "<option value='{$row['batch_id']}'>{$row['Name']}</option>";
            }
        } else {
            $student_madarasa = 'ID not provided for batch Data';
        }
    } elseif ($_POST['type'] == "student_class") {
        if (isset($_POST['id'])) {
            $student_md_id = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `madarsa_class` WHERE `depart_id` = '$student_md_id' ");
            $student_madarasa = '<option value="">- - -</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_madarasa .= "<option value='{$row['id']}'>{$row['class_name']}</option>";
            }
        } else {
            $student_madarasa = 'ID not provided for batch Data';
        }
    } elseif ($_POST['type'] == "student_section") {
        if (isset($_POST['id'])) {
            $student_md_id = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `madarsa_class` WHERE `id` = '$student_md_id' ");
            $student_madarasa = '<option value="">- - -</option>';

            while ($row = mysqli_fetch_assoc($query)) {


                $sec_id = explode(',',$row['sec_id']);
                foreach ($sec_id as $section_name) {
                    $seql_ins = mysqli_query($conn, "SELECT * FROM `section` WHERE `sec_id` ='$section_name'");
                    $seql_sec_id = mysqli_fetch_object($seql_ins);
                    if ($seql_sec_id) {
                        $student_madarasa .= "<option value='{$row['sec_id']}'>{$seql_sec_id->section_name }</option>";
                    }
                }
            }
        } else {
            $student_madarasa = 'ID not provided for batch Data';
        }
    }
} else {
    $student_madarasa = 'Type parameter not set';
}

echo $student_madarasa;
