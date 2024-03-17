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
    } elseif ($_POST['type'] == "section_Data") {
        if (isset($_POST['id'])) {
            $section_Data = $_POST['id'];
            $query = mysqli_query($conn, "SELECT * FROM `section` WHERE `madarsa_id` = '$section_Data'");
            $sutudent = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $sutudent .= "<label class='px-2'><input type='checkbox'  value='{$row['sec_id']}' class='fw-semibold  fs-4'> {$row['section_name']}</label>";
            }
        } else {
            $sutudent = 'ID not provided for batch Data';
        }
        
    }
} else {
    $sutudent = 'Type parameter not set';
}

echo $sutudent;
