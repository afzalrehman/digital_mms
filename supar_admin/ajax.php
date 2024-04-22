<?php
include "../includes/config.php";
session_start();

// Initialize variables
$shop_rent = '';


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
