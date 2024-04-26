<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate and sanitize form inputs
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_gander = mysqli_real_escape_string($conn, $_POST['user_gander']);
  $user_age = mysqli_real_escape_string($conn, $_POST['user_age']);
  $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
  $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
  $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

  // Hash the password for security
  $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

  // Token generate
  $user_token = bin2hex(random_bytes(15));
  // created date and time
  $created_date = date('Y-m-d H:i:s');
  // created_by username
  // $created_by = $_SESSION['username'];

  // check the email is unique or not
  $check_email_query = "SELECT * FROM `users` WHERE `email` = '$user_email'";
  $check_email_result = mysqli_query($conn, $check_email_query);

  if (mysqli_num_rows($check_email_result) > 0) {
    redirectdelete("user-form.php", "ای میل پہلے سے موجود ہے");
    exit();
  }

  // check the phone number is unique or not
  $check_phone_query = "SELECT * FROM `user_details` WHERE `phone` = '$user_phone'";
  $check_phone_result = mysqli_query($conn, $check_phone_query);

  if (mysqli_num_rows($check_phone_result) > 0) {
    redirectdelete("user-form.php", "فون نمبر پہلے سے موجود ہے");
    exit();
  }

  // check the username is unique or not
  $check_username_query = "SELECT * FROM `users` WHERE `username` = '$username'";
  $check_username_result = mysqli_query($conn, $check_username_query);

  if (mysqli_num_rows($check_username_result) > 0) {
    redirectdelete("user-form.php", "یوزَر نام پہلے سے موجود ہے");
    exit();
  }

  // image upload
  $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], '../media/std-tc/' . $image);



  // Insert user into 'users' table
  $insert_user_query = "INSERT INTO `users` (
      `username`, 
      `email`, 
      `password`, 
      `token`, 
      `status`, 
      `role_id`, 
      `created_date`
      ) VALUES (
      '$username', 
      '$user_email', 
      '$hashed_password', 
      '$user_token', 
      'Inactive', 
      '$user_role', 
      '$created_date'
      )";

  $insert_user_res = mysqli_query($conn, $insert_user_query);
  if ($insert_user_res) {
    $user_id = mysqli_insert_id($conn);

    // Insert user details into 'user_details' table
    $insert_user_details_query = "INSERT INTO `user_details` (
          `user_id`, 
          `full_name`, 
          `image`,
          `phone`, 
          `address`, 
          `gender`, 
          `age`
          ) VALUES (
          '$user_id', 
          '$user_name', 
          '$image',
          '$user_phone', 
          '$user_address', 
          '$user_gander', 
          '$user_age'
          )";

    $insert_user_details_res = mysqli_query($conn, $insert_user_details_query);
    if ($insert_user_details_res) {
      redirect("user-form.php", "آپ کا ڈیٹا ایڈ ہوچکا ہے");
      exit();
    } else {
      redirectdelete("user-form.php", "آپ کا ڈیٹا ایڈ ہوچکا نہیں ہے");
      exit();
    }
  } else {
    redirectdelete("user-form.php", "آپ کا ڈیٹا ایڈ ہوچکا نہیں ہے");
    exit();
  }
} else {
  // Handle case where form is not submitted
  echo "Form not submitted.";
}



// Include other necessary files
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>

<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">یوزَر فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                یوزَر فارم
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
  <form action="" id="user_form" method="POST" enctype="multipart/form-data">
    <div class="row">

      <!-- User Info -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_name">نام</label>
                <input type="text" name="user_name" id="user_name" class="form-control fw-semibold fs-4" placeholder="محمد" />
                <span class="error text-danger" id="user_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_gander">صنف</label>
                <select id="user_gander" name="user_gander" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="مرد" class="jameel-kasheeda">مرد</option>
                  <option value="عورت" class="jameel-kasheeda">عورت</option>
                </select>
                <span class="error text-danger" id="user_gander_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_age">تاریخ پیدائش</label>
                <input type="text" name="user_age" id="user_age" class="form-control fw-semibold fs-4" placeholder="عمر" />
                <span class="error text-danger" id="user_age_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_phone">فون نمبر</label>
                <input type="text" name="user_phone" id="user_phone" class="form-control fw-semibold fs-4" placeholder="03000000000" />
                <span class="error text-danger" id="user_phone_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_address">پتہ</label>
                <input type="text" name="user_address" id="user_address" class="form-control fw-semibold fs-4" placeholder="پتہ" />
                <span class="error text-danger" id="user_address_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="user_role">یوزَر منتخب کریں</label>
                <select id="user_role" name="user_role" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <!-- fatch role -->
                  <?php
                  $role_query = "SELECT `role_id`, `role_name`  FROM `role` where role_id = 1 OR role_id = 2";
                  $role_result = mysqli_query($conn, $role_query);
                  while ($role = mysqli_fetch_assoc($role_result)) {
                    echo "<option value='" . $role['role_id'] . "' class='jameel-kasheeda'>" . $role['role_name'] . "</option>";
                  }
                  ?>
                </select>
                <span class="error text-danger" id="user_role_err"></span>
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
          <button type="submit" name="user_insert" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
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
<script src="../assets/js/error/userAddError.js"></script>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>