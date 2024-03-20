<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
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
  <form action="code2.php" id="user_form" method="POST" enctype="multipart/form-data">
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
                <input type="date" name="user_age" id="user_age" class="form-control fw-semibold fs-4" placeholder="عمر" />
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