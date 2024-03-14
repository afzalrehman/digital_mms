<?php
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
        <div class="row">
          <!-- Teacher Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ استاد کے معلومات</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-reg-number">رجسٹریشن نمبر</label>
                      <input type="number" name="teacher-reg-number" class="form-control fw-semibold fs-3" required
                        placeholder="#04321" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-fullname">پورا نام</label>
                      <input type="text" name="teacher-fullname" class="form-control fw-semibold fs-4" required
                        placeholder="احمد شفیع" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-gender">صنف انتخاب کریں</label>
                      <select name="teacher-gender" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer"
                        data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="معلم" class="jameel-kasheeda">معلم</option>
                        <option value="معلمہ" class="jameel-kasheeda">معلمہ</option>
                      </select>
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-dbo">تاریخ پیدائش</label>
                      <input type="date" name="std-dbo" class="form-control fw-semibold fs-3" required
                        placeholder="DD/MM/YYYY" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-number">فون نمبر</label>
                      <input type="number" name="teacher-number" class="form-control fw-semibold fs-3" required
                        placeholder="03186432506" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-email">ای میل</label>
                      <input type="email" name="teacher-email" class="form-control fw-semibold fs-3" required
                        placeholder="teacher@gmail.com" />
                      <!-- <span class="error" id="teacher-area-err"></span> -->
                    </div>
                    <div class="col-md-12">
                      <label class="fs-5 mb-1" for="teacher-address">پتہ</label>
                      <input type="text" name="teacher-address" class="form-control fw-semibold fs-4" required
                        placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                </form>
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
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-qualification">قابلیت</label>
                      <input type="text" name="teacher-qualification" class="form-control fw-semibold fs-4" required
                        placeholder="ایم اے" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-exp">تجربہ</label>
                      <input type="text" name="teacher-exp" class="form-control fw-semibold fs-4" required
                        placeholder="ایک سال" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-tought-subject">پڑھائے گئے مضامین</label>
                      <input type="text" name="teacher-tought-subject" class="form-control fw-semibold fs-4" required
                        placeholder="اسلامیات" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-tought-classes">پڑھائے گئے کلاس</label>
                      <input type="text" name="teacher-tought-classes" class="form-control fw-semibold fs-4" required
                        placeholder="اوٰلی" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-employ-status ">ملازمت کی حیثیت</label>
                      <input type="text" name="teacher-employ-status" class="form-control fw-semibold fs-4" required
                        placeholder="ناظم" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-join-date">شامل ہونے کی تاریخ</label>
                      <input type="date" name="teacher-join-date" class="form-control fw-semibold fs-3" required
                        placeholder="DD/MM/YYYY" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-salary">تنخواہ</label>
                      <input type="number" name="teacher-salary" class="form-control fw-semibold fs-3" required
                        placeholder="25,000" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="teacher-emerg-number">ایمر جنسی رابطہ نمبر</label>
                      <input type="number" name="teacher-emerg-number" class="form-control fw-semibold fs-3" required
                        placeholder="03298759745" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-12">
                      <label class="fs-5 mb-1" for="teacher-note">نوٹ </label>
                      <textarea class="form-control jameel-kasheeda fw-semibold fs-4" rows="5"
                        placeholder="یہاں پیغام لکھیں ۔۔"></textarea>
                    </div>
                </form>
              </div>
            </div>

          </div>
          <!-- Submit Button -->
          <div class="col-md-12 mt-4 jameel-kasheeda">
            <button type="button" id="submit" name="submit" class="btn btn-primary fw-semibold fs-5">ایڈ
              کریں</button>
          </div>
        </div>

      </div>
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