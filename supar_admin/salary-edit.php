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

  <?php
  if (isset($_GET['edit_salary'])) {
    $edit_id = mysqli_real_escape_string($conn, $_GET['edit_salary']);

    $select_query = mysqli_query($conn, "SELECT * FROM `salary` WHERE `id` = '$edit_id'");

    $check = mysqli_num_rows($select_query);

    if ($check > 0) {
      $fetch = mysqli_fetch_assoc($select_query);


  ?>
      <div class="row">
        <!-- User Info -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="code.php" id="salary1" method="POST">
                <div class="row">
                  <input type="text"  hidden class="form-control " name="edit_id" value="<?= $fetch['id'] ?>">
                  <input type="text" id="teacher_name" hidden class="form-control " name="teacher_name" value="<?= $fetch['register_num'] ?>">
                  <input type="text" id="madarasa" hidden class="form-control " readonly name="madarasa" value="<?= $fetch['madarsa_id'] ?>">
                  <div class="col-lg-6 mt-3">
                    <label for="teacher_name" class='fs-5'>نام:</label>
                    <?php
                    $salary_names = explode(',', $fetch['register_num']);
                    foreach ($salary_names as $salary_name) {
                      $seq_query = mysqli_query($conn, "SELECT * FROM `teacher` WHERE `register_num` ='$salary_name'");
                      $salary_name = mysqli_fetch_object($seq_query);
                      if ($salary_name) {

                    ?>
                        <input type="text" class="form-control " readonly value="<?php echo $salary_name->tea_name ?>">
                    <?php
                      }
                    }
                    ?>
                    <span class="text-danger teacher_name"></span>
                  </div>
                  <div class="col-lg-6 mt-3">
                    <?php
                    $ins_names = explode(',', $fetch['madarsa_id']);
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
                <input type="number" id="basic_salary" class="form-control " name="basic_salary" readonly value="<?= $fetch['basic_salary'] ?>">
                <span class="text-danger basic_salary"></span>
              </div>

              <div class="col-lg-6 mt-3">
                <label for="allowances" class='fs-5'>امدادی:</label>
                <input type="number" id="allowances" class="form-control " name="allowances" value='<?= $fetch['allowances'] ?>'>
                <span class="text-danger allowances"></span>
              </div>

              <div class="col-lg-6 mt-3">
                <label for="deductions" class='fs-5'>کٹوتی:</label>
                <input type="number" id="deductions" class="form-control " name="deductions" value='<?= $fetch['deductions'] ?>'>
                <span class="text-danger deductions"></span>
              </div>
              <div class="col-lg-6 mt-3">
                <label for="salary_given" class='fs-5'>دی گئی تنخواہ:</label>
                <input type="number" id="salary_given" class="form-control" name="salary_given" value='<?= $fetch['salary_given'] ?>'>
                <span class="text-danger salary_given"></span>
              </div>
              <div class="col-lg-6 mt-3">
                <label for="salary_date" class='fs-5'>تنخواہ کی تاریخ:</label>
                <input type="month" id="salary_date" class="form-control " name="salary_date" value='<?= $fetch['salary_date'] ?>'>
                <span class="text-danger salary_date"></span>
              </div>

              <div class="col-lg-6 mt-3">
                <label for="payment_method" class='fs-5 '>ادائیگی کا طریقہ:</label>
                <select id="payment_method" class="form-control jameel-kasheeda fw-bolder" name="payment_method">
                  <option value="<?= $fetch['payment_method'] ?>" class='fw-bolder'><?= $fetch['payment_method'] ?></option>
                  <option value="نقد" class='fw-bolder'>نقد</option>
                  <option value="چیک" class='fw-bolder'>چیک</option>
                </select>
                <span class="text-danger payment_method"></span>
              </div>

              <div class="col-lg-12 mt-3">
                <label for="description" class='fs-5'>تفصیل:</label>
                <textarea id="description" class="form-control " name="description"><?= $fetch['description'] ?></textarea>
              </div>

              <div class="col-lg-3 mt-3">
                <input type="submit" name="salaryUpdate" class="btn btn-primary jameel-kasheeda fw-bolder" value="اپڈیٹ کریں">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  <?php
    } else {
      echo "No Data Found";
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