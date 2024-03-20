<?php
session_start();
include_once("../includes/config.php");
include_once "../includes/function.php";
// Include other necessary files
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once "inc/navbar.php";

// Get the user ID from the URL parameter to use innner join
if (isset($_GET['madarsa_edit'])) {

  $madarsa_edit_id = mysqli_real_escape_string($conn, $_GET['madarsa_edit']);

  $madarsa_edit_query = "SELECT * FROM `users` INNER JOIN `user_details` ON `users`.`user_id` = `user_details`.`user_id` WHERE `users`.`user_id` = '$madarsa_edit_id'";

  $madarsa_edit_result = mysqli_query($conn, $madarsa_edit_query);

  if (mysqli_num_rows($madarsa_edit_result) > 0) {
    $fatch_user = mysqli_fetch_assoc($madarsa_edit_result);

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
      <form action="user-all-code.php" method="POST" enctype="multipart/form-data">
        <div class="row">

          <!-- User Info -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="madarsa_name">مدرسہ</label>
                    <input type="text" name="user_id" hidden class="form-control fw-semibold fs-4" value="<?php echo $fatch_user['user_id']; ?>" />
                    <select id="madarsa_name" name="madarsa_name" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $fatch_user['madarsa_name'] ?>" class="jameel-kasheeda"><?= $fatch_user['madarsa_name'] ?></option>
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
                    <input type="text" name="user_name" id="user_name" class="form-control fw-semibold fs-4" placeholder="محمد" value="<?php echo $fatch_user['full_name']; ?>" />
                    <span class="error text-danger" id="user_name_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_phone">فون نمبر</label>
                    <input type="text" name="user_phone" id="user_phone" class="form-control fw-semibold fs-4" placeholder="03000000000" value="<?php echo $fatch_user['phone']; ?>" />
                    <span class="error text-danger" id="user_phone_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="username">یوزَر نام</label>
                    <input type="text" name="username" id="username" class="form-control fs-3 user-email" placeholder="یوزَر نام" value="<?php echo $fatch_user['username']; ?>" />
                    <span class="error text-danger" id="username_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_email">ای میل</label>
                    <input type="email" name="user_email" id="user_email" class="form-control fs-3 user-email" placeholder="user@gmail.com" value="<?php echo $fatch_user['email']; ?>" />
                    <span class="error text-danger" id="user_email_err"></span>
                  </div>
                  <!-- <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_password">پاس ورڈ</label>
                    <div class="input-group">
                      <input type="password" name="user_password" id="user_password" class="form-control fs-3" minlength="8" maxlength="16" placeholder="st@123" aria-describedby="toggle_password" />
                      <span class="input-group-text" id="toggle_password"><i id="eye_icon" class="ti ti-eye-off"></i></span>
                    </div>
                    <span class="error text-danger" id="user_password_err"></span>
                  </div> -->
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="image">تصویر</label>
                    <input type="file" name="image" class="form-control fs-3" />
                  </div>
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
            <a href="madarsa-access-details.php" class="btn btn-danger fw-semibold fs-5">کلوز</a>
              <button type="submit" name="masarsa_update" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
            </div>
          </div>
      </form>
    </div>
    </div>
    <!-- Student Admission Form (End) -->
<?php
  }
}
?>
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>