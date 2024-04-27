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
    elseif ($_POST['type'] == "madarasa_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT madarsa.madarsa_id, madarsa.madarsa_name FROM students 
            LEFT JOIN madarsa on madarsa.madarsa_id = students.madarsa_id WHERE students.st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['madarsa_id']}'>{$row['madarsa_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "department_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT department.depart_id, department.department_name FROM students
            LEFT JOIN department on department.depart_id = students.depart_id WHERE students.st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['depart_id']}'>{$row['department_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "madarsaClass_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT madarsa_class.id, madarsa_class.class_name FROM `students`
            LEFT JOIN madarsa_class on madarsa_class.id = students.mada_class_id
            WHERE students.st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['id']}'>{$row['class_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    elseif ($_POST['type'] == "section_data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT section.sec_id, section.section_name FROM students
            LEFT JOIN section on section.sec_id = students.sec_id WHERE students.st_roll_no = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['sec_id']}'>{$row['section_name']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }
    
    else if ($_POST['type'] == "fees_type_name_Data") {
        $sql = "SELECT fees_type_id, fees_type_name FROM st_fees_types";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful: ' . mysqli_error($conn));
        $student_fees = '---';
        while ($row = mysqli_fetch_assoc($query)) {
            $student_fees .= "<option value='{$row['fees_type_id']}'>{$row['fees_type_name']}</option>";
        }
    } elseif ($_POST['type'] == "fees_type_amount_Data") {
        if (isset($_POST['id'])) {
            $stId = $_POST['id'];
            $query = mysqli_query($conn, "SELECT fees_type_amount FROM st_fees_types WHERE fees_type_id = '$stId'");
            $student_fees = '';
            while ($row = mysqli_fetch_assoc($query)) {
                $student_fees .= "<option value='{$row['fees_type_amount']}'>{$row['fees_type_amount']}</option>";
            }
        } else {
            $student_fees = 'ID not provided for batch Data';
        }
    }




} else {
    $student_fees = 'Type parameter not set';
}
echo $student_fees;
