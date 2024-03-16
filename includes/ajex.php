<?php
if (isset($_POST['type'])) {
    if ($_POST['type'] == "fess_InstituteName") {
        $sql = "SELECT * FROM institute where `InstituteID` = '$userID'  AND   `status` = 'active' ";
        $query = mysqli_query($conn, $sql) or die('Query unsuccessful');
        $fees_page = '';
        // $fees_page .= "<option value=''>شعبہ سلیکٹ کریں</option>";
        while ($row = mysqli_fetch_assoc($query)) {
            $fees_page .= "<option value='{$row['InstituteID']}'>{$row['InstituteName']}</option>";
        }
    } elseif ($_POST['type'] == "tradeData") {
        if (isset($_POST['id'])) {
            $fees_page_Id = $_POST['id'];

            $query = mysqli_query($conn, "SELECT * FROM `course` WHERE `InstituteID` = '$fees_page_Id'  AND   `status` = 'active'");
            $classData = mysqli_fetch_assoc($query);
            if ($classData) {
                $fees_page = '<option value="">---</option>';
                $sections_fees = explode(',', $classData['CourseName']);
                foreach ($sections_fees as $fess_Id) {
                    $sec_query01 = mysqli_query($conn, "SELECT * FROM `course_type` WHERE `id` ='$fess_Id'");
                    $sec01 = mysqli_fetch_object($sec_query01);
                    if ($sec01) {
                        $fees_page .= "<option value='{$sec01->id}' >$sec01->title</option>";
                    }
                }
            }
        } else {
            $fees_page = 'ID not provided for tradeData';
        }
    } elseif ($_POST['type'] == "sectionData") {
        if (isset($_POST['id'])) {
            $classId = $_POST['id'];

            $sql = "SELECT * FROM feestype WHERE Trade_name = '$classId'  AND   `status` = 'active'";
            $query = mysqli_query($conn, $sql) or die('Query unsuccessful');
            $fees_page = '<option value="">---</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $fees_page .= "<option value='{$row['FeesTypeID']}'>{$row['Name']}</option>";
            }
        } else {
            $fees_page = 'ID not provided for sectionData';
        }
    } elseif ($_POST['type'] == "totalfees") {
        if (isset($_POST['id'])) {
            $classId = $_POST['id'];

            $sql = "SELECT * FROM feestype WHERE `FeesTypeID` = '$classId'  AND   `status` = 'active'";
            $query = mysqli_query($conn, $sql) or die('Query unsuccessful');
            $fees_page = '<option value="">---</option>';
            while ($row = mysqli_fetch_assoc($query)) {
                $fees_page .= "<option value='{$row['Price']}'>{$row['Price']}</option>";
            }
        } else {
            $fees_page = 'ID not provided for sectionData';
        }
    } else {
        $fees_page = 'Invalid type parameter';
    }
} else {
    $fees_page = 'Type parameter not set';
}

echo $fees_page;
