<?php
include "../includes/config.php";
session_start();

// Initialize variables
$shop_rent = '';
$student_fees = '';


if (isset($_POST['type'])) {
    if ($_POST['type'] == "dokan_name_Data") {
        $sql = "SELECT dokan_id, dokan_name 
        FROM dokan";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful: ' . mysqli_error($conn));
        $shop_rent = '---';
        while ($row = mysqli_fetch_assoc($query)) {
            $shop_rent .= "<option value='{$row['dokan_id']}'>{$row['dokan_name']}</option>";
        }
    } elseif ($_POST['type'] == "dokan_type_Data") {
        if (isset($_POST['id'])) {
            $batchId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT dokan_type 
            FROM dokan WHERE dokan_id = '$batchId'");
            $shop_rent = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $shop_rent .= "<option value='{$row['dokan_type']}'>{$row['dokan_type']}</option>";
            }
        } else {
            $shop_rent = 'ID not provided for batch Data';
        }
    } elseif ($_POST['type'] == "dokan_rent_Data") {
        if (isset($_POST['id'])) {
            $batchId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT dokan_rent 
            FROM dokan WHERE dokan_id = '$batchId'");
            $shop_rent = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $shop_rent .= "<option value='{$row['dokan_rent']}'>{$row['dokan_rent']}</option>";
            }
        } else {
            $shop_rent = 'ID not provided for batch Data';
        }
    }
} else {
    $shop_rent = 'Type parameter not set';
}
echo $shop_rent;


// st_roll_no_Data
// st_id_Data
// st_name_Data
// guar_name_Data
// guar_cnic_Data
// admi_fees_Data


if (isset($_POST['type'])) {
    if ($_POST['type'] == "st_roll_no_Data") {
        $sql = "SELECT st_roll_no FROM students";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful: ' . mysqli_error($conn));
        $student_fees = '---';
        while ($row = mysqli_fetch_assoc($query)) {
            $student_fees .= "<option value='{$row['st_roll_no']}'>{$row['st_roll_no']}</option>";
        }
    } elseif ($_POST['type'] == "st_id_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT st_id FROM students WHERE st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['st_id']}'>{$row['st_id']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    } elseif ($_POST['type'] == "st_name_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT std_name FROM students WHERE st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['std_name']}'>{$row['std_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "guar_name_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT guar_name FROM students WHERE st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['guar_name']}'>{$row['guar_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "guar_cnic_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT guar_cnic FROM students WHERE st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['guar_cnic']}'>{$row['guar_cnic']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "admi_fees_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT admi_fees FROM students WHERE st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['admi_fees']}'>{$row['admi_fees']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
} else {
    $student_fees = 'Type parameter not set';
}
echo $student_fees;
