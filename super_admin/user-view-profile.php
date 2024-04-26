<?php
session_start();
include_once "../includes/config.php";
include_once "../includes/function.php";
// Include other necessary files
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";

// Get the user ID from the URL parameter
if (isset($_GET['user_view_profile'])) {
  $user_view_profile_id = mysqli_real_escape_string($conn, $_GET['user_view_profile']);

  $user_view_profile_query = "SELECT * FROM `users` INNER JOIN `user_details` ON `users`.`user_id` = `user_details`.`user_id` WHERE `users`.`user_id` = '$user_view_profile_id'";

  $user_view_profile_result = mysqli_query($conn, $user_view_profile_query);

  if (mysqli_num_rows($user_view_profile_result) > 0) {
    $fatch_user = mysqli_fetch_assoc($user_view_profile_result);

?>
    <!-- Main Content (Start) -->
    <div class="container-fluid">
      <!-- Main Content Header Card (Start) -->
      <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="my-3 fs-8 text-primary">استاد کے پروفائل</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                  </li>
                  <li class="breadcrumb-item fs-4" aria-current="page">
                    استاد کے پروفائل
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

      <!-- Teacher Profile (Start) -->
      <div class="card overflow-hidden">
        <div class="card-body p-0">
          <img src="../assets/images/template/profilebg.png" alt="" class="img-fluid">
          <div class="row align-items-center">

            <!-- Teacher Profile Image -->
            <div class="col-lg-4 order-lg-4 order-1">
              <div class="mt-n5">
                <div class="d-flex align-items-center justify-content-center mb-2">
                  <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;" ;>
                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;" ;>
                      <img src="../assets/images/template/user-4.jpg" alt="" class="w-100 h-100">
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h5 class="fs-7 mb-0 fw-semibold"><?= $fatch_user['full_name'] ?></h5>
                  <p class="mb-0 fs-4"><?php echo $fatch_user['role_id']; ?></p>
                </div>
              </div>
            </div>
            <!-- Teacher Attendence Counter -->
            <div class="col-lg-4 order-lg-1 order-last">
            </div>
            <div class="col-lg-4 order-last">
            </div>
          </div>
          <!-- Teacher All Tab (Start) -->
          <ul class="nav nav-pills user-profile-tab mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
            <!-- Teacher Profile Tab -->
            <li class="nav-item" role="presentation">
              <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                <i class="ti ti-user-circle me-2 fs-6 "></i>
                <span class="d-none d-md-block fs-4">پروفائل</span>
              </button>
            </li>
          </ul>
          <!-- Teacher All Tab (End) -->
        </div>
      </div>
      <div class="tab-content" id="pills-tabContent">
        <!-- Teacher Profile Tab Content -->
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          <div class="row">
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
                      <input type="text" readonly name="user_role" class="form-control fw-semibold fs-4" placeholder="" value="<?php if ($fatch_user['role_id'] == 1) {
                                                                                                                        echo "سپر ایڈمن";
                                                                                                                      } elseif ($fatch_user['role_id'] == 2) {
                                                                                                                        echo "ایڈمن";
                                                                                                                      } ?>" />
                      <!-- <select id="user-select" name="user_role" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="<?= $fatch_user['role_id'] ?>" class="jameel-kasheeda"><?php if ($fatch_user['user_id'] == 1) {
                                                                                                echo "سپر ایڈمن";
                                                                                              } elseif ($fatch_user['user_id'] == 2) {
                                                                                                echo "ایڈمن";
                                                                                              }  ?></option>
                        <option value="<?= $fatch_user['role_id'] ?>" class="jameel-kasheeda"><?php if ($fatch_user['user_id'] == 1) {
                                                                                                echo "سپر ایڈمن";
                                                                                              } elseif ($fatch_user['user_id'] == 2) {
                                                                                                echo "ایڈمن";
                                                                                              }
                                                                                              ?></option> -->
                      <!-- fatch role -->
                      <?php
                      // $role_query = "SELECT `role_id`, `role_name`  FROM `role`";
                      // $role_result = mysqli_query($conn, $role_query);
                      // while ($role = mysqli_fetch_assoc($role_result)) {
                      //   echo "<option value='" . $role['role_id'] . "' class='jameel-kasheeda'>" . $role['role_name'] . "</option>";
                      // }
                      ?>
                      <!-- </select> -->
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="username">یوزَر نام</label>
                      <input type="text" readonly name="username" class="form-control fs-3 user-email" placeholder="یوزَر نام" value="<?= $fatch_user['username']; ?>" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user_email">ای میل</label>
                      <input type="email" readonly name="user_email" class="form-control fs-3 user-email" placeholder="user@gmail.com" value="<?= $fatch_user['email']; ?>" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <!-- <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user_image">تصویر</label>
                      <input type="file" name="user_image" class="form-control fs-3" />
                    </div> -->
                  </div>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="col-md-12 mt-4 jameel-kasheeda">
                <div class="btn-group">
                  <div class="row">
                    <div class="col-12">
                      <a href="user-details.php" class="btn btn-danger fw-semibold fs-5">کلوز</a>
                      <button type="submit" disabled id="user_update" name="user_update" class="btn btn-primary fw-semibold fs-5">اپ ڈیٹ</button>
                    </div>
                  </div>
                  <!-- <button type="submit" id="user_update" name="user_update" class="btn btn-primary fw-semibold fs-5">اپ ڈیٹ</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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