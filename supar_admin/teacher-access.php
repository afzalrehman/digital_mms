<?php
session_start();
include_once("../includes/config.php");
include_once "../includes/function.php";



// // ================================ Add Madarsa Access Code Start page (madarsa-access.php) ================================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $madarsa_name = mysqli_real_escape_string($conn, $_POST['madarsa_name']);
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  // $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);


  // updated date and time
  $updated_date = date('Y-m-d H:i:s');
  // updated_by username
  // $updated_by = $_SESSION['username'];

  // check the email is unique or not
  $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email' AND `user_id` != '$user_id'";
  $check_email_result = mysqli_query($conn, $check_email_query);

  if (mysqli_num_rows($check_email_result) > 0) {
      redirectdelete("madarsa-access-details.php", "ای میل پہلے سے موجود ہے");
      exit();
  }

  // check the phone number is unique or not
  $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone' AND `user_id` != '$user_id'";
  $check_phone_result = mysqli_query($conn, $check_phone_query);

  if (mysqli_num_rows($check_phone_result) > 0) {
      redirectdelete("madarsa-access-details.php", "فون نمبر پہلے سے موجود ہے");
      exit();
  }

  // check the username is unique or not
  $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username' AND `user_id` != '$user_id'";
  $check_username_result = mysqli_query($conn, $check_username_query);

  if (mysqli_num_rows($check_username_result) > 0) {
      redirectdelete("teacher-access-details.php", "یوزَر نام پہلے سے موجود ہے");
      exit();
  }


  // image
  $image = '';
  if (isset($_FILES['image']['name'])) {
      $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], '../media/media/madarsa-access/' . $image);
  }

  // insert add user data into database
  $update_user_query = "UPDATE `users` 
  SET 
      `username`='$username',
      `email`='$user_email',
      `updated_by`='updated_by',
      `updated_date`='$updated_date'
  WHERE 
      `user_id` = '$user_id'";

  $update_user_res = mysqli_query($conn, $update_user_query);

  if ($update_user_res) {
      // Get the ID of the inserted user_details record
      $user_id = mysqli_insert_id($conn);

      // Insert user_details record
      $update_user_details_query = "UPDATE `user_details` 
      SET 
      `madarsa_name`='$madarsa_name',
      `full_name`='$user_name',
      `phone`='$user_phone'";

      // Append image update if an image was uploaded
      if ($image) {
          $update_user_details_query .= ", `image` = '$image'";
      }
      $update_user_details_query .= " WHERE `user_id` = '$user_id'";

      $update_user_details_res = mysqli_query($conn, $update_user_details_query);

      if ($update_user_details_res) {
          redirect("teacher-access-details.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے. $user_name");
          exit();
      } else {
          // Insertion failed
          redirectdelete("teacher-access-details.php", "یوزَر ایڈ نہیں ھوا، ");
          exit();
      }
  } else {
      // Insertion failed
      redirectdelete("teacher-access-details.php", "یوزَر ایڈ نہیں ھوا، دوبارہ کوشش کریں");
      exit();
  }
}





// Include other necessary files
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once "inc/navbar.php";
?>

<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">مدرسہ فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                مدرسہ فارم
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

  <!-- User Admission Form (Start) -->
  <form action="" id="masarsa_access_form" method="POST" enctype="multipart/form-data">
    <div class="row">

      <!-- User Info -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="madarsa_name">مدرسہ</label>
                <select id="madarsa_name" name="madarsa_name" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <!-- fatch role -->
                  <?php
                  $madarsa_query = "SELECT `RigitarNumber`, `madarsa_name`  FROM `madarsa` where `status` = 'فعال' ORDER BY `RigitarNumber` ASC";
                  $madarsa_result = mysqli_query($conn, $madarsa_query);
                  while ($madarsa = mysqli_fetch_assoc($madarsa_result)) {
                    echo "<option value='" . $madarsa['madarsa_name'] . "' class='jameel-kasheeda'>" . $madarsa['madarsa_name'] . "</option>";
                  }
                  ?>
                </select>
                <span class="error text-danger" id="madarsa_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_name">نام</label>
                <input type="text" name="user_name" id="user_name" class="form-control fw-semibold fs-4" placeholder="محمد" />
                <span class="error text-danger" id="user_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_phone">فون نمبر</label>
                <input type="text" name="user_phone" id="user_phone" class="form-control fw-semibold fs-4" placeholder="03000000000" />
                <span class="error text-danger" id="user_phone_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="username">یوزَر نام</label>
                <input type="text" name="username" id="username" class="form-control fs-3 user-email" placeholder="یوزَر نام" />
                <span class="error text-danger" id="username_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_email">ای میل</label>
                <input type="email" name="user_email" id="user_email" class="form-control fs-3 user-email" placeholder="user@gmail.com" />
                <span class="error text-danger" id="user_email_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_password">پاس ورڈ</label>
                <div class="input-group">
                  <input type="password" name="user_password" id="user_password" class="form-control fs-3" minlength="8" maxlength="16" placeholder="st@123" aria-describedby="toggle_password" />
                  <span class="input-group-text" id="toggle_password"><i id="eye_icon" class="ti ti-eye-off"></i></span>
                </div>
                <span class="error text-danger" id="user_password_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="image">تصویر</label>
                <input type="file" name="image" class="form-control fs-3" />
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="col-md-12 mt-4 jameel-kasheeda">
          <button type="submit" name="masarsa_update" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
        </div>
      </div>
  </form>
</div>
</div>
<!-- Student Admission Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/accessMadarsaError.js"></script>