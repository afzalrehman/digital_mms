<?php
session_start();
include "../includes/function.php";
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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">استادایڈ کریں</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                استادایڈ کریں
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

  <!-- Teacher Admission Form (Start) -->
  <form id="Teaher" method="post" action="code.php">
    <div class="row">
      <!-- Teacher Info -->
      <div class="col-12">
        <div class="card">
          <div class="border-bottom title-part-padding mt-3">
            <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ استاد کے معلومات</h4>
          </div>
          <div class="card-body">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-reg-number">رجسٹریشن نمبر</label>
                <input type="number" id="RegNumber" name="teacher-reg-number" class="form-control fw-semibold fs-3"  placeholder="#04321" />
                <span class="text-danger RegNumber"></span>
              </div>

              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="mad_Name">
                  <option class="jameel-kasheeda" value="">مدرسہ سلیکٹ کریں</option>
                  <?php
                  $sql = "SELECT * FROM madarsa";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                      <option class="jameel-kasheeda" value="<?= $row["madarsa_id"] ?>"><?= $row["madarsa_name"] ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
                <span class="text-danger mad_Name"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-fullname">پورا نام</label>
                <input type="text" name="teacher-fullname" id="Name" class="form-control fw-semibold fs-4"  placeholder="احمد شفیع" />
                <span class="text-danger Name"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-fullname">والد کا نام</label>
                <input type="text" name="teacher-fullname" id="Fname" class="form-control fw-semibold fs-4"  placeholder="احمد شفیع" />
                <span class="text-danger Fname"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-gender">صنف انتخاب کریں</label>
                <select name="teacher-gender" id="gender" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="معلم" class="jameel-kasheeda">معلم</option>
                  <option value="معلمہ" class="jameel-kasheeda">معلمہ</option>
                </select>
                <span class="text-danger gender"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-dbo">تاریخ پیدائش</label>
                <input type="date" name="std-dbo" id="DateOfB" class="form-control fw-semibold fs-3"  placeholder="DD/MM/YYYY" />
                <span class="text-danger DateOfB"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-number">فون نمبر</label>
                <input type="number" name="teacher-number" id="phone" class="form-control fw-semibold fs-3"  placeholder="03186432506" />
                <span class="text-danger phone"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="teacher-email">ای میل</label>
                <input type="email" name="teacher-email" id="Email" class="form-control fw-semibold fs-3"  placeholder="teacher@gmail.com" />
                <span class="text-danger Email"></span>
              </div>
              <div class="col-md-12">
                <label class="fs-5 mb-1" for="teacher-address">پتہ</label>
                <input type="text" name="teacher-address" id="Address" class="form-control fw-semibold fs-4"  placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" />
                <span class="text-danger Address"></span>
              </div>

            </div>
          </div>
        </div>

        <!-- Education Info -->
        <div class="col-12">
          <div class="card">
            <div class="border-bottom title-part-padding mt-3">
              <h4 class="card-title mb-0 fs-7 text-primary"> 2۔ تعلیم کے معلومات</h4>
            </div>
            <div class="card-body">

              <div class="row g-4">
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-qualification">قابلیت</label>
                  <input type="text" name="teacher-qualification" id="Degree" class="form-control fw-semibold fs-4"  placeholder="ایم اے" />
                  <span class="text-danger Degree"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-exp">تجربہ</label>
                  <input type="text" name="teacher-exp" id="Experence" class="form-control fw-semibold fs-4"  placeholder="ایک سال" />
                  <span class="text-danger Experence"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-tought-subject">پڑھائے گئے مضامین</label>
                  <input type="text" name="teacher-tought-subject" id="Subject" class="form-control fw-semibold fs-4"  placeholder="اسلامیات" />
                  <span class="text-danger Subject"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-tought-classes">پڑھائے گئے کلاس</label>
                  <input type="text" name="teacher-tought-classes" id="Class" class="form-control fw-semibold fs-4"  placeholder="اوٰلی" />
                  <span class="text-danger Class"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-employ-status ">ملازمت کی حیثیت</label>
                  <input type="text" name="teacher-employ-status" id="TeaType" class="form-control fw-semibold fs-4"  placeholder="ناظم" />
                  <span class="text-danger TeaType"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-join-date">شامل ہونے کی تاریخ</label>
                  <input type="date" name="teacher-join-date" id="joinDate" class="form-control fw-semibold fs-3"  placeholder="DD/MM/YYYY" />
                  <span class="text-danger joinDate"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-salary">تنخواہ</label>
                  <input type="number" name="teacher-salary" id="Salary1" class="form-control fw-semibold fs-3"  placeholder="25,000" />
                  <span class="text-danger Salary1"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="teacher-emerg-number">ایمر جنسی رابطہ نمبر</label>
                  <input type="number" name="teacher-emerg-number" id="OtherNum" class="form-control fw-semibold fs-3"  placeholder="03298759745" />
                  <span class="text-danger OtherNum"></span>
                </div>
                <div class="col-md-12">
                  <label class="fs-5 mb-1" for="teacher-note">نوٹ </label>
                  <textarea class="form-control jameel-kasheeda fw-semibold fs-4" rows="5" placeholder="یہاں پیغام لکھیں ۔۔"></textarea>
                </div>

              </div>
            </div>

          </div>
          <!-- Submit Button -->
          <div class="col-md-12 mt-4 jameel-kasheeda">
            <button type="submit" id="submit" name="teacherBtn" class="btn btn-primary fw-semibold fs-5">ایڈ
              کریں</button>
          </div>
        </div>
      </div>
  </form>
</div>
<!-- Teacher Admission Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/teacherAddErorr.js"></script>