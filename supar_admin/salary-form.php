<?php
session_start();
include "../includes/config.php";
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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">تنخواہ فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                تنخواہ فارم
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
  <!-- Salary Form (Start) -->
  <div class="row">
    <!-- User Info -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form method="post">
            <div class="row g-4 align-items-end justify-content-between">
              <div class="col-md-4">
                <label class="fs-5 mb-1" for="st-reg-no">رجسٹریشن نمبر</label>
                <input type="number" name="searchID" class="form-control fs-3 inter" placeholder="#421232" />
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
              <div class="col-md-2 ">
                <label class="fs-5 mb-1" for=""></label>
                <input type="submit" name="search" class="form-control bg-primary fw-bolder text-white jameel-kasheeda" value=" سرچ کریں" placeholder="#421232" />
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Submit Button -->
  </div>

  <?php
  if (isset($_POST['searchID'])) {
    $searchID = $_POST['searchID'];

    $query = "SELECT * FROM teacher WHERE `register_num`  ='$searchID'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $sec = mysqli_fetch_object($result);
      if ($sec) {
  ?>
        <div class="row">
          <!-- User Info -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form action="code.php" id="salary1" method="POST">
                  <div class="row">
                    <input type="text" id="teacher_name" hidden class="form-control " name="teacher_name" value="<?php echo $sec->register_num ?>">
                    <input type="text" id="madarasa" hidden class="form-control " readonly name="madarasa" value="<?php echo $sec->madarsa_id ?>">
                    <div class="col-lg-6 mt-3">
                      <label for="teacher_name" class='fs-5'>نام:</label>
                      <input type="text" class="form-control " readonly value="<?php echo $sec->tea_name ?>">
                      <span class="text-danger teacher_name"></span>
                    </div>
                    <div class="col-lg-6 mt-3">
                      <?php
                      $ins_names = explode(',', $sec->madarsa_id);
                      foreach ($ins_names as $ins_name) {
                        $seq_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$ins_name'");
                        $institute_name = mysqli_fetch_object($seq_query);
                        if ($institute_name) {

                      ?>
                          <label for="teacher_name" class='fs-5'>مدرسہ:</label>
                          <input type="text" class="form-control " readonly value="<?php echo $institute_name->madarsa_name ?>">
                          <span class="text-danger madarasa"></span>
                    </div>
                <?php
                        }
                      }
                ?>

                <div class="col-lg-6 mt-3">
                  <label for="basic_salary" class='fs-5'>بنیادی تنخواہ:</label>
                  <input type="number" id="basic_salary" class="form-control " name="basic_salary" readonly value="<?php echo $sec->salary ?>">
                  <span class="text-danger basic_salary"></span>
                </div>

                <div class="col-lg-6 mt-3">
                  <label for="allowances" class='fs-5'>امدادی:</label>
                  <input type="number" id="allowances" class="form-control " name="allowances">
                  <span class="text-danger allowances"></span>
                </div>

                <div class="col-lg-6 mt-3">
                  <label for="deductions" class='fs-5'>کٹوتی:</label>
                  <input type="number" id="deductions" class="form-control " name="deductions">
                  <span class="text-danger deductions"></span>
                </div>
                <div class="col-lg-6 mt-3">
                  <label for="salary_given" class='fs-5'>دی گئی تنخواہ:</label>
                  <input type="number" id="salary_given" class="form-control" name="salary_given">
                  <span class="text-danger salary_given"></span>
                </div>
                <div class="col-lg-6 mt-3">
                  <label for="salary_date" class='fs-5'>تنخواہ کی تاریخ:</label>
                  <input type="month" id="salary_date" class="form-control " name="salary_date">
                  <span class="text-danger salary_date"></span>
                </div>

                <div class="col-lg-6 mt-3">
                  <label for="payment_method" class='fs-5 '>ادائیگی کا طریقہ:</label>
                  <select id="payment_method" class="form-control jameel-kasheeda fw-bolder" name="payment_method">
                    <option value="bank_transfer" class='fw-bolder'>بینک ٹرانسفر</option>
                    <option value="نقد" class='fw-bolder'>نقد</option>
                    <option value="چیک" class='fw-bolder'>چیک</option>
                  </select>
                  <span class="text-danger payment_method"></span>
                </div>

                <div class="col-lg-12 mt-3">
                  <label for="description" class='fs-5'>تفصیل:</label>
                  <textarea id="description" class="form-control " name="description"></textarea>
                </div>

                <div class="col-lg-3 mt-3">
                  <input type="submit" name="salaryBtn" class="btn btn-primary jameel-kasheeda fw-bolder" value="ایڈ کریں">
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
    } else { ?>
      <span class='text-danger fs-5 jameel-kasheeda'><?php ?>ائی ڈی موجود نہیں ہے</span>
  <?php

    }
  }
  ?>
  <!-- Submit Button -->
</div>
</div>
</div>
<!-- Salary Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/salary.js"></script>