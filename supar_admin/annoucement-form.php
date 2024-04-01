<?php
session_start();
include "../includes/function.php";
include "../includes/config.php";


// ========================== Insert Annoucement ===========================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$annoucment_depart = mysqli_real_escape_string($conn, $_POST['annoucment_depart']);
$annoucment_name = mysqli_real_escape_string($conn, $_POST['annoucment_name']);
$annoucment_date = mysqli_real_escape_string($conn, $_POST['annoucment_date']);
$annoucment_type = mysqli_real_escape_string($conn, $_POST['annoucment_type']);
$annoucment_subject = mysqli_real_escape_string($conn, $_POST['annoucment_subject']);
$annoucement_note = mysqli_real_escape_string($conn, $_POST['annoucement_note']);

  // created by
  // $created_by = $_SESSION['user_id'];
  $created_date = date('Y-m-d H:i:s'); 

  // insert annoucement in database
  $insert_annoucement = "INSERT INTO `annoucements`(
    `from_name`, 
    `announce_depart`, 
    `to_id`, 
    `announce_date`, 
    `announce_for`, 
    `announce_subjict`, 
    `announce_comment`, 
    `status`, 
    `created_by`, 
    `created_date`
    ) 
  VALUES (
    'Abu Hammad',
    '$annoucment_depart',
    '$annoucment_name',
    '$annoucment_date',
    '$annoucment_type',
    '$annoucment_subject',
    '$annoucement_note',
    '1',
    'Hammad',
    '$created_date'
    )";
  $insert_annoucement_result = mysqli_query($conn, $insert_annoucement);
  if ($insert_annoucement_result) {
    redirect("annoucement-form.php", "آپ کا دیٹا ایڈ ہوچکا ہے");
    exit();
  } else {
    redirect("annoucement-form.php", "آپ کا دیٹا ایڈ ہوچکا نہیں ہے");
    exit();
  }
}else{
  echo "No Data Found";
}




// fetch user role from database role_id = سپر ایڈمن
$fetch_superAdmin = "SELECT `user_id`, username, `role_id`  FROM `users` WHERE `role_id` = '1'";
$fetch_superAdmin_result = mysqli_query($conn, $fetch_superAdmin);

// fetch user role from database role_id = ایڈمن
$fetch_admin = "SELECT `user_id`, username, `role_id` FROM `users` WHERE `role_id` = '2'";
$fetch_admin_result = mysqli_query($conn, $fetch_admin);

// fetch user role from database role_id = استاد
$fetch_teacher = "SELECT `user_id`, username, `role_id` FROM `users` WHERE `role_id` = '3'";
$fetch_teacher_result = mysqli_query($conn, $fetch_teacher);

// fetch user role from database role_id = طالب علم
$fetch_student = "SELECT `user_id`, username, `role_id` FROM `users` WHERE `role_id` = '4'";
$fetch_student_result = mysqli_query($conn, $fetch_student);

// fetch user role from database role_id = انسٹی ٹیوٹ
$fetch_institute = "SELECT `user_id`, username, `role_id` FROM `users` WHERE `role_id` = '5'";
$fetch_institute_result = mysqli_query($conn, $fetch_institute);




include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">اعلان فارم </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                اعلان فارم
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-3">
          <div class="text-center mb-n5">
            <img src="../assets/images/ChatBc.png" alt="" class="img-fluid mb-n4" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Content Header Card (End) -->

  <!-- Annoucement Form (Start) -->
  <div class="row">
    <!-- Annoucement Form -->
    <div class="col-12">
      <div class="card">
        <div class="border-bottom title-part-padding mt-3">
          <h4 class="card-title mb-0 fs-7 text-primary"> اعلان لکھیئے</h4>
        </div>
        <div class="card-body">
          <form action="" method="POST" id="annoucement_form">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment_depart">شعبہ</label>
                <select name="annoucment_depart" id="annoucment_depart" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="بنین" class="jameel-kasheeda">بنین</option>
                  <option value="بنات" class="jameel-kasheeda">بنات</option>
                </select>
                <span class="error text-danger" id="annoucment_depart_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment_name">نام</label>
                <select id="annoucment_name" name="annoucment_name" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <optgroup label="سپر ایڈمن" class="jameel-kasheeda text-primary">
                    <?php
                    while ($row1 = mysqli_fetch_assoc($fetch_superAdmin_result)) {
                    ?>
                      <option value="<?= $row1['username'] ?>" class="jameel-kasheeda fs-3 text-dark"><?= $row1['username'] ?></option>
                    <?php
                    }
                    ?>
                    <!-- <option value="عائیشہ" class="jameel-kasheeda fs-3 text-dark">عائیشہ</option> -->
                  </optgroup>
                  <optgroup label="ایڈمن" class="jameel-kasheeda text-primary">
                    <?php
                    while ($row2 = mysqli_fetch_assoc($fetch_superAdmin_result)) {
                    ?>
                      <option value="<?= $row2['username'] ?>" class="jameel-kasheeda fs-3 text-dark"><?= $row2['username'] ?></option>
                    <?php
                    }
                    ?>
                    <option value="عائیشہ" class="jameel-kasheeda fs-3 text-dark">عائیشہ</option>
                  </optgroup>
                  <optgroup label="انسٹی ٹیوٹ" class="jameel-kasheeda text-primary">
                    <?php
                    while ($row3 = mysqli_fetch_assoc($fetch_superAdmin_result)) {
                    ?>
                      <option value="<?= $row3['username'] ?>" class="jameel-kasheeda fs-3 text-dark"><?= $row3['username'] ?></option>
                    <?php
                    }
                    ?>
                    <option value="عائیشہ" class="jameel-kasheeda fs-3 text-dark">عائیشہ</option>
                  </optgroup>
                  <optgroup label="استاد" class="jameel-kasheeda text-primary">
                    <?php
                    while ($row4 = mysqli_fetch_assoc($fetch_superAdmin_result)) {
                    ?>
                      <option value="<?= $row4['username'] ?>" class="jameel-kasheeda fs-3 text-dark"><?= $row4['username'] ?></option>
                    <?php
                    }
                    ?>
                    <option value="عائیشہ" class="jameel-kasheeda fs-3 text-dark">عائیشہ</option>
                  </optgroup>
                  <optgroup label="طالب علم" class="jameel-kasheeda text-primary">
                    <?php
                    while ($row5 = mysqli_fetch_assoc($fetch_superAdmin_result)) {
                    ?>
                      <option value="<?= $row5['username'] ?>" class="jameel-kasheeda fs-3 text-dark"><?= $row5['username'] ?></option>
                    <?php
                    }
                    ?>
                    <option value="عائیشہ" class="jameel-kasheeda fs-3 text-dark">عائیشہ</option>
                  </optgroup>
                </select>
                <span class="error text-danger" id="annoucment_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment_date">تاریخ </label>
                <input type="date" id="annoucment_date" name="annoucment_date" class="form-control fw-semibold fs-3" required placeholder="DD/MM/YYYY" />
                <span class="error text-danger" id="annoucment_date_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment_type">اعلان کس کے لیے ہیں ۔</label>
                <select name="annoucment_type" id="annoucment_type" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="سافٹ ویئیر کے لیے " class="jameel-kasheeda">سافٹ ویئیر کے لیے </option>
                  <option value="ویب سائٹ کے لیے" class="jameel-kasheeda">ویب سائٹ کے لیے</option>
                  <option value="سب کے لیے" class="jameel-kasheeda">سب کے لیے </option>
                </select>
                <span class="error text-danger" id="annoucment_type_err"></span>
              </div>
              <div class="col-md-12">
                <label class="fs-5 mb-1" for="annoucment_subject">عنوان</label>
                <input type="text" name="annoucment_subject" id="annoucment_subject" class="form-control fw-semibold fs-4" required placeholder="عید کی چھٹی" />
                <span class="error text-danger" id="annoucment_subject_err"></span>
              </div>
              <div class="col-md-12">
                <label class="fs-5 mb-1" for="annoucement_note">اعلان </label>
                <textarea name="annoucement_note" id="annoucement_note" class="form-control jameel-kasheeda fw-semibold fs-4" rows="5" placeholder="آج مدارس کی طرف سے عید کی چھٹی ہیں۔"></textarea>
              </div>
              <span class="error text-danger" id="annoucement_note_err"></span>

              <!-- Submit Button -->
              <div class="col-md-12 mt-5 jameel-kasheeda">
                <button type="submit" id="submit_annoucement" name="submit_annoucement" class="btn btn-primary fw-semibold fs-5">ایڈ
                  کریں</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Annoucement Form (End) -->
</div>
<!-- Main Content (End) -->
</div>

</div>
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<script src="../assets/js/error/annoucement_form.js"></script>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>