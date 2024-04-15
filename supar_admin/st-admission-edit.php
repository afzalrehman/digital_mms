<?php
session_start();
include "../includes/function.php";
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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">طلبہ کا داخلہ</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                طلبہ کا داخلہ
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

  <?php


  // ==================== get student data (st_edit) ====================
  if (isset($_GET['st_edit'])) {
    $st_edit_id = $_GET['st_edit'];

    $query = "SELECT * FROM `students` 
    WHERE `id` = '$st_edit_id'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run->num_rows > 0) {
      $edit_std = mysqli_fetch_array($query_run);

  ?>

      <!-- Annoucement Form (Start) -->
      <div class="row">
        <form action="code2.php" method="post" id="st-admission-form" enctype="multipart/form-data">
          <!-- Student Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ طلبہ کے معلومات</h4>
              </div>
              <div class="card-body">

                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="rollNumber">رول نمبر</label>
                    <input type="text" id="rollNumber" readonly name="roll_number" class="form-control fw-semibold fs-3" value="<?= $edit_std['st_roll_no'] ?>" />
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="reg_number">جی آر نمبر</label>
                    <input type="number" name="reg_number" id="reg_number" class="form-control fw-semibold fs-3" placeholder="#04321" value="<?= $edit_std['register_num'] ?>" />
                    <span class="error text-danger inter" id="reg_number_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_name">نام</label>
                    <input type="text" name="std_name" id="std_name" class="form-control fw-semibold fs-4" placeholder="احمد" value="<?= $edit_std['std_name'] ?>" />
                    <span class="error text-danger inter" id="std_name_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_dbo">تاریخ پیدائش</label>
                    <input type="date" name="std_dbo" id="std_dbo" class="form-control fw-semibold fs-4" placeholder="DD/MM/YYYY" value="<?= $edit_std['std_dob'] ?>" />
                    <span class="error text-danger inter" id="std_dbo_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_gender">صنف</label>
                    <select id="std_gender" name="std_gender" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $edit_std['std_gender'] ?>" class="jameel-kasheeda"><?= $edit_std['std_gender'] ?></option>
                      <option value="مرد" class="jameel-kasheeda" <?php if ($edit_std['std_gender'] == "مرد") {
                                                                    echo "hidden";
                                                                  } ?>>مرد</option>
                      <option value="عورت" class="jameel-kasheeda" <?php if ($edit_std['std_gender'] == "عورت") {
                                                                      echo "hidden";
                                                                    } ?>>عورت</option>
                    </select>
                    <span class="error text-danger inter" id="std_gender_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_accommodation">رہائش منتخب کریں</label>
                    <select id="std_accommodation" name="std_accommodation" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $edit_std['std_accommodation'] ?>" class="jameel-kasheeda"><?= $edit_std['std_accommodation'] ?></option>
                      <option value="رہائشی" class="jameel-kasheeda" <?php if ($edit_std['std_accommodation'] == "رہائشی") {
                                                                        echo "hidden";
                                                                      } ?>>رہائشی</option>
                      <option value="غیر رہائشی" class="jameel-kasheeda" <?php if ($edit_std['std_accommodation'] == "غیر رہائشی") {
                                                                            echo "hidden";
                                                                          } ?>>غیر رہائشی</option>
                    </select>
                    <span class="error text-danger inter" id="std_accommodation_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_birth_place">مقام پیدائش</label>
                    <input type="text" name="std_birth_place" id="std_birth_place" class="form-control fw-semibold fs-3" placeholder="کراچی" value="<?= $edit_std['std_birth_place'] ?>" />
                    <span class="error text-danger inter" id="std_birth_place_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std_address">پتہ</label>
                    <input type="text" name="std_address" id="std_address" class="form-control fw-semibold fs-4" placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" value="<?= $edit_std['std_address'] ?>" />
                    <span class="error text-danger inter" id="std_address_err"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Father Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 2۔ والدین کے معلومات</h4>
              </div>
              <div class="card-body">

                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_name">سرپرست کا نام</label>
                    <input type="text" name="guar_name" id="guar_name" class="form-control fw-semibold fs-4" placeholder="شفیع عالم" value="<?= $edit_std['guar_name']  ?>" />
                    <span class="error text-danger inter" id="guar_name_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_relation">سرپرست سے رشتہ</label>
                    <input type="text" id="guar_relation" name="guar_relation" class="form-control fw-semibold fs-4" placeholder="والدِ محترم" value="<?= $edit_std['guar_relation'] ?>" />
                    <span class="error text-danger inter" id="guar_relation_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_number">فون نمبر</label>
                    <input type="number" name="guar_number" id="guar_number" class="form-control fw-semibold fs-3" placeholder="03186432506" value="<?= $edit_std['guar_number'] ?>" />
                    <span class="error text-danger inter" id="guar_number_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_cnic">CNIC نمبر</label>
                    <input type="number" name="guar_cnic" id="guar_cnic" class="form-control fw-semibold fs-3" placeholder="03186432506" value="<?= $edit_std['guar_cnic'] ?>" />
                    <span class="error text-danger inter" id="guar_cnic_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_address">پتہ</label>
                    <input type="text" name="guar_address" id="guar_address" class="form-control fw-semibold fs-4" placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" value="<?= $edit_std['guar_address'] ?>" />
                    <span class="error text-danger inter" id="guar_address_err"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="guar_address">ای میل</label>
                    <input type="text" name="guar_email" id="guar_email" class="form-control fw-semibold fs-4" placeholder="ای میل" value="<?= $edit_std['guar_email'] ?>" />
                    <span class="error text-danger inter" id="guar_email_err"></span>
                  </div>

                </div>
              </div>
            </div>


            <!-- Education Info -->
            <div class="col-12">
              <div class="card">
                <div class="border-bottom title-part-padding mt-3">
                  <h4 class="card-title mb-0 fs-7 text-primary"> 3۔ تعلیم کے معلومات</h4>
                </div>
                <div class="card-body">

                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="pre_school">سابقہ مدرسہ</label>
                      <input type="text" name="pre_school" id="pre_school" class="form-control fw-semibold fs-4" placeholder="دارالعلوم کراچی" value="<?= $edit_std['pre_school'] ?>" />
                      <span class="error text-danger inter" id="pre_school_err"></span>
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="pre_class">سابقہ درجہ</label>
                      <input type="text" name="pre_class" id="pre-class" class="form-control fw-semibold fs-4" placeholder="اوٰلی" value="<?= $edit_std['pre_class'] ?>" />
                      <span class="error text-danger inter" id="pre_class_err"></span>
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="next_class">مطلوبہ درجہ</label>
                      <input type="text" name="next_class" id="next-class" class="form-control fw-semibold fs-4" placeholder="ثانیہ" value="<?= $edit_std['next_class'] ?>" />
                      <span class="error text-danger inter" id="next_class_err"></span>
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="adm_date">تاریخ داخلہ</label>
                      <input type="date" id="adm_date" name="adm_date" class="form-control fw-semibold fs-3" placeholder="DD/MM/YYYY" value="<?= $edit_std['adm_date'] ?>" />
                      <span class="error text-danger inter" id="adm_date_err"></span>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Madarsa Info -->
              <div class="col-lg-12">
                <div class="card">
                  <div class="border-bottom title-part-padding mt-3">
                    <h4 class="card-title mb-0 fs-7 text-primary"> 4۔ مدرسہ کے معلومات</h4>
                  </div>
                  <div class="card-body">
                    <div class="row g-4">
                      <div class="col-lg-6">
                        <label class="fs-5 mb-1">مدرسہ </label>
                        <select class="form-control fw-semibold fs-3 jameel-kasheeda" id="studentMadarasa" name="madarasa">
                          <option class="jameel-kasheeda" value="<?= $edit_std['madarsa_id'] ?>"><?= $edit_std['madarsa_id'] ?></option>
                          <?php
                          $getMadarsaID = $edit_std['madarsa_id'];
                          $selectMadarsa = "SELECT * FROM madarsa WHERE `status` = 'فعال'";
                          $query_run = mysqli_query($conn, $selectMadarsa);
                          if ($query_run->num_rows > 0) {
                            while ($row = mysqli_fetch_array($query_run)) {
                              $_SESSION['getMadarsa_id'] = $row['madarsa_id'];
                          ?>
                              <option class="jameel-kasheeda" value="<?= $row['madarsa_id'] ?>"><?= $row['madarsa_name'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                        <span class="text-danger inter studentMadarasa" id="studentMadarasa_err"></span>
                      </div>

                      <div class="col-md-6 mb-2">
                        <label class="fs-5 mb-1" for="MadYear">تعلیمی سال منتخب کریں</label>
                        <select id="MadYear" name="std-dep" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                          <option value="<?= $edit_std['batch_id'] ?>" class="jameel-kasheeda"><?= $edit_std['batch_id'] ?></option>
                          <?php
                          $getBatchID = $edit_std['batch_id'];
                          $selectBatch = "SELECT * FROM batch WHERE `status` = 'فعال'";
                          $query_run = mysqli_query($conn, $selectBatch);
                          if ($query_run->num_rows > 0) {
                            while ($row = mysqli_fetch_array($query_run)) {
                          ?>
                              <option class="jameel-kasheeda" value="<?= $row['batch_id'] ?>"><?= $row['Name'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                        <span class="error text-danger inter" id="MadYear_err"></span>
                      </div>

                      <div class="col-lg-6 mb-3">
                        <label class="fs-5 mb-1">شعبہ </label>
                        <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="department" id="department">
                          <option class="jameel-kasheeda" value="<?= $edit_std['depart_id'] ?>"><?= $edit_std['depart_id'] ?></option>
                          <?php
                          $getDepartmentID = $edit_std['depart_id'];
                          $selectDepartment = "SELECT * FROM department WHERE `status` = 'فعال'";
                          $query_run = mysqli_query($conn, $selectDepartment);
                          if ($query_run->num_rows > 0) {
                            while ($row = mysqli_fetch_array($query_run)) {
                          ?>
                              <option class="jameel-kasheeda" value="<?= $row['depart_id'] ?>"><?= $row['department_name'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                        <span class="text-danger inter classdepartment" id="department_err"></span>
                      </div>
                      <div class="col-lg-6 mb-3">
                        <label class="fs-5 mb-1">کلاس</label>
                        <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="class" id="studentclass">
                          <option class="jameel-kasheeda" value="<?= $edit_std['mada_class_id'] ?>"><?= $edit_std['mada_class_id'] ?></option>
                          <?php
                          $getClassID = $edit_std['mada_class_id'];
                          $selectClass = "SELECT * FROM madarsa_class WHERE `status` = 'فعال'";
                          $query_run = mysqli_query($conn, $selectClass);
                          if ($query_run->num_rows > 0) {

                            while ($row = mysqli_fetch_array($query_run)) {
                          ?>
                              <option class="jameel-kasheeda" value="<?= $row['id'] ?>"><?= $row['class_name'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                        <span class="inter error text-danger"><?php if (isset($_SESSION['class_exit'])) {
                                                                echo $_SESSION['class_exit'];
                                                                unset($_SESSION['class_exit']);
                                                              } ?></span>
                        <span class="text-danger inter error" id="class_err"></span>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="fs-5 mb-1" for="section">سیکشن منتخب کریں</label>
                        <select id="section" name="section" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                          <option value="<?= $edit_std['sec_id'] ?>" class="jameel-kasheeda"><?= $edit_std['sec_id'] ?></option>
                          <?php
                          $getSectionID = $edit_std['sec_id'];
                          $selectSection = "SELECT * FROM section WHERE `madarsa_id` = {$_SESSION['getMadarsa_id']} AND `status` != 'غیر فعال'";
                          $query_run = mysqli_query($conn, $selectSection);
                          if ($query_run->num_rows > 0) {
                            while ($row = mysqli_fetch_array($query_run)) {
                          ?>
                              <option class="jameel-kasheeda" value="<?= $row['sec_id'] ?>"><?= $row['section_name'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                        <span class="error text-danger inter" id="section_err"></span>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="fs-5 mb-1" for="std_qadeem">منتخب کریں</label>
                        <select id="std_qadeem" name="std_qadeem" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                          <option value="<?= $edit_std['std_qadeem'] ?>" class="jameel-kasheeda"><?= $edit_std['std_qadeem'] ?></option>
                          <option value="قدیم" class="jameel-kasheeda" <?php if ($edit_std['guar_cnic'] == 'قدیم') echo 'hidden'; ?>>قدیم</option>
                          <option value="جدید" class="jameel-kasheeda" <?php if ($edit_std['guar_cnic'] == 'جدید') echo 'hidden'; ?>>جدید</option>
                        </select>
                        <span class="error text-danger inter" id="std_qadeem_err"></span>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="fs-5 mb-1" for="admi_fees">داخلہ فیس</label>
                        <input type="text" name="admi_fees" id="admi_fees" class="form-control fw-semibold fs-4" placeholder="داخلہ فیس" value="<?= $edit_std['guar_cnic'] ?>" />
                        <span class="error text-danger inter" id="admi_fees_err"></span>
                      </div>
                      <div class="col-md-6 mb-2">
                        <label class="fs-5 mb-1" for="monthly_fees">ماہانہ فیس</label>
                        <input type="text" name="monthly_fees" id="monthly_fees" class="form-control fw-semibold fs-4" placeholder="ماہانہ فیس" value="<?= $edit_std['guar_cnic'] ?>" />
                        <span class="error text-danger inter" id="monthly_fees_err"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Submit Button -->
                <div class="col-md-12 mt-4 jameel-kasheeda">
                  <button type="submit" name="std_form_update" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

  <?php
    } else {
      echo '<tr>
  <td class="text-danger">طلبہ موجود نہں ہے </td>
  </tr>';
    }
  }
  ?>

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

<?php
include "inc/mobileNavbar.php";
?>
<!-- <script src="../assets/js/error/st-admission-form.js"></script> -->
<?php
include "inc/footer.php";
?>