<?php
session_start();
include_once("../includes/config.php");
include_once "../includes/function.php";



// // ================================ Add Madarsa Access Code Start page (madarsa-access.php) ================================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Establish database connection (assuming $conn is defined elsewhere)

  // Escape user inputs for security
  $madarsa_name = mysqli_real_escape_string($conn, $_POST['madarsa_name']);
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

  // Check if email is unique
  $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email'";
  $check_email_result = mysqli_query($conn, $check_email_query);

  if (mysqli_num_rows($check_email_result) > 0) {
    // Email already exists, redirect with message
    redirect("madarsa-access.php", "ای میل پہلے سے موجود ہے");
    exit();
  }

  // Check if phone number is unique
  $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone'";
  $check_phone_result = mysqli_query($conn, $check_phone_query);

  if (mysqli_num_rows($check_phone_result) > 0) {
    // Phone number already exists, redirect with message
    redirect("madarsa-access.php", "فون نمبر پہلے سے موجود ہے");
    exit();
  }

  // Check if username is unique
  $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
  $check_username_result = mysqli_query($conn, $check_username_query);

  if (mysqli_num_rows($check_username_result) > 0) {
    // Username already exists, redirect with message
    redirect("madarsa-access.php", "یوزَر نام پہلے سے موجود ہے");
    exit();
  } else {


    // Hash the password
    $user_pass = password_hash($user_password, PASSWORD_DEFAULT);
    // Generate token
    $user_token = bin2hex(random_bytes(15));
    // Current date and time
    $created_date = date('Y-m-d');

    // Handle file upload
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_temp, '../media/madarsa-access/' . $image);

    // Insert user data into 'users' table
    $insert_user_query = "INSERT INTO `users` (
      `username`, 
      `email`, 
      `password`, 
      `token`, 
      `status`, 
      `role_id`, 
      `created_date`
      )
  VALUES (
      '$username', 
      '$user_email', 
      '$user_pass', 
      '$user_token', 
      'Inactive', 
      '5', 
      '$created_date')";

    $insert_user_res = mysqli_query($conn, $insert_user_query);

    if ($insert_user_res) {
      // Get the ID of the inserted user record
      $user_id = mysqli_insert_id($conn);

      // Insert user details into 'user_details' table
      $insert_user_details_query = "INSERT INTO `user_details` (
          `user_id`, 
          `full_name`, 
          `madarsa_name`, 
          `phone`,
          `image`
          )
      VALUES (
          '$user_id', 
          '$user_name', 
          '$madarsa_name', 
          '$user_phone',
          '$image'
          )";
      $insert_user_details_res = mysqli_query($conn, $insert_user_details_query);

      if ($insert_user_details_res) {
        // Data inserted successfully, redirect with success message
        redirect("madarsa-access.php", "آپ کا ڈیٹا اپڈیٹ ہوچکا ہے");
        exit();
      } else {
        // User details insertion failed, redirect with error message
        redirect("madarsa-access.php", "آپ کا ڈیٹا ایڈ ہوچکا نہیں ہے");
        exit();
      }
    } else {
      // User insertion failed, redirect with error message
      redirect("madarsa-access.php", "آپ کا ڈیٹا ایڈ ہوچکا نہیں ہے");
      exit();
    }
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