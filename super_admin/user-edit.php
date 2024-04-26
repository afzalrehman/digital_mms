<?php
session_start();
include_once("../includes/config.php");
include_once "../includes/function.php";
// Include other necessary files
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once "inc/navbar.php";

// Get the user ID from the URL parameter to use innner join
if (isset($_GET['user_edit'])) {

  $user_edit_id = mysqli_real_escape_string($conn, $_GET['user_edit']);

  $user_edit_query = "SELECT * FROM `users` INNER JOIN `user_details` ON `users`.`user_id` = `user_details`.`user_id` WHERE `users`.`user_id` = '$user_edit_id'";

  $user_edit_result = mysqli_query($conn, $user_edit_query);

  if (mysqli_num_rows($user_edit_result) > 0) {
    $fatch_user = mysqli_fetch_assoc($user_edit_result);

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
                    <input type="text" hidden name="user_id" class="form-control fw-semibold fs-4" placeholder="محمد" value="<?= $fatch_user['user_id']; ?>" />
                    <label class="fs-5 mb-1" for="user_name">نام</label>
                    <input type="text" name="user_name" class="form-control fw-semibold fs-4" placeholder="محمد" value="<?= $fatch_user['full_name']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_gander">صنف</label>
                    <select id="user-select" name="user_gander" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $fatch_user['gender']; ?>" class="jameel-kasheeda"><?= $fatch_user['gender']; ?></option>
                      <option value="admin" class="jameel-kasheeda">مرد</option>
                      <option value="admin" class="jameel-kasheeda">عورت</option>
                    </select>
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_age">تاریخ پیدائش</label>
                    <input type="date" name="user_age" class="form-control fw-semibold fs-4" placeholder="عمر" value="<?= $fatch_user['age']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_phone">فون نمبر</label>
                    <input type="text" name="user_phone" class="form-control fw-semibold fs-4" placeholder="03000000000" value="<?= $fatch_user['phone']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_address">پتہ</label>
                    <input type="text" name="user_address" class="form-control fw-semibold fs-4" placeholder="پتہ" value="<?= $fatch_user['address']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_role">یوزَر منتخب کریں</label>
                    <select id="user-select" name="user_role" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $fatch_user['role_id'] ?>" class="jameel-kasheeda"><?php if ($fatch_user['user_id'] == 1) {
                                                                                              echo "سپر ایڈمن";
                                                                                            } elseif ($fatch_user['user_id'] == 2) {
                                                                                              echo "ایڈمن";
                                                                                            } elseif ($fatch_user['user_id'] == 3) {
                                                                                              echo "استاد";
                                                                                            } elseif ($fatch_user['user_id'] == 4) {
                                                                                              echo "طالب علم";
                                                                                            } else {
                                                                                              echo "انسٹی ٹیوٹ";
                                                                                            }
                                                                                            ?></option>
                      <!-- fatch role -->
                      <?php
                      $role_query = "SELECT `role_id`, `role_name`  FROM `role`";
                      $role_result = mysqli_query($conn, $role_query);
                      while ($role = mysqli_fetch_assoc($role_result)) {
                        echo "<option value='" . $role['role_id'] . "' class='jameel-kasheeda'>" . $role['role_name'] . "</option>";
                      }
                      ?>
                    </select>
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="username">یوزَر نام</label>
                    <input type="text" name="username" class="form-control fs-3 user-email" placeholder="یوزَر نام" value="<?= $fatch_user['username']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_email">ای میل</label>
                    <input type="email" name="user_email" class="form-control fs-3 user-email" placeholder="user@gmail.com" value="<?= $fatch_user['email']; ?>" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                  <!-- <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_password">پاس ورڈ</label>
                    <input type="password" name="user_password" class="form-control fs-3 user-password" hidden minlength="8" maxlength="16" placeholder="st@123" value="<?= $fatch_user['password']; ?>" />
                    <span class="error" id="std-area-err"></span>
                  </div> -->
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="user_image">تصویر</label>
                    <input type="file" name="user_image" class="form-control fs-3" />
                    <!-- <span class="error" id="std-area-err"></span> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
            <a href="user-details.php" class="btn btn-danger fw-semibold fs-5">کلوز</a>
              <button type="submit" name="user_update" class="btn btn-primary fw-semibold fs-5">اپ ڈیٹ</button>
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