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

        <!-- Student Admission Form (Start) -->
        <div class="row">
          <!-- Madarsa Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ مدرسہ کے معلومات</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="reg-number">رجسٹریشن نمبر</label>
                      <input type="number" name="reg-number" class="form-control fw-semibold fs-3" required
                        placeholder="#04321" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-area">رہائش منتخب کریں</label>
                      <select id="std-area" name="std-area"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="رہائشی" class="jameel-kasheeda">رہائشی</option>
                        <option value="غیر رہائشی" class="jameel-kasheeda">غیر رہائشی</option>
                      </select>
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6 mb-2">
                      <label class="fs-5 mb-1" for="std-dep">شعبہ منتخب کریں</label>
                      <select id="std-dep" name="std-dep"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="حفظ" class="jameel-kasheeda">حفظ</option>
                        <option value="ناظرہ" class="jameel-kasheeda">ناظرہ</option>
                        <option value="اسکول" class="jameel-kasheeda">اسکول</option>
                      </select>
                      <!-- <span class="error" id="std-dep-err"></span> -->
                    </div>
                    <div class="col-md-6 mb-2">
                      <label class="fs-5 mb-1" for="std-qadeem">منتخب کریں</label>
                      <select id="std-qadeem" name="std-qadeem"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="قدیم" class="jameel-kasheeda">قدیم</option>
                        <option value="جدید" class="jameel-kasheeda">جدید</option>
                      </select>
                      <!-- <span class="error" id="std-dep-err"></span> -->
                    </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Student Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 2۔ طلبہ کے معلومات</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-name">نام</label>
                      <input type="text" name="std-name" class="form-control fw-semibold fs-4" required
                        placeholder="احمد" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-father-name">والد کا نام</label>
                      <input type="text" name="std-father-name" class="form-control fw-semibold fs-4" required
                        placeholder="شفیع عالم" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-dbo">تاریخ پیدائش</label>
                      <input type="date" name="std-dbo" class="form-control fw-semibold fs-4" required
                        placeholder="DD/MM/YYYY" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="std-birth-place">مقام پیدائش</label>
                      <input type="text" name="std-birth-place" class="form-control fw-semibold fs-3" required
                        placeholder="کراچی" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-12">
                      <label class="fs-5 mb-1" for="std-address">پتہ</label>
                      <input type="text" name="std-address" class="form-control fw-semibold fs-4" required
                        placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Father Info -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 3۔ والدین کے معلومات</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="guar-name">سرپرست کا نام</label>
                      <input type="text" name="guar-name" class="form-control fw-semibold fs-4" required
                        placeholder="شفیع عالم" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="guar-relation">سرپرست سے رشتہ</label>
                      <input type="text" name="guar-relation" class="form-control fw-semibold fs-4" required
                        placeholder="والدِ محترم" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="guar-number">فون نمبر</label>
                      <input type="number" name="guar-number" class="form-control fw-semibold fs-3" required
                        placeholder="03186432506" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="guar-address">پتہ</label>
                      <input type="text" name="guar-address" class="form-control fw-semibold fs-4" required
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
                <h4 class="card-title mb-0 fs-7 text-primary"> 4۔ تعلیم کے معلومات</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="pre-school">سابقہ مدرسہ</label>
                      <input type="text" name="pre-school" class="form-control fw-semibold fs-4" required
                        placeholder="دارالعلوم کراچی" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="pre-class">سابقہ درجہ</label>
                      <input type="text" name="pre-class" class="form-control fw-semibold fs-4" required
                        placeholder="اوٰلی" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="next-class">مطلوبہ درجہ</label>
                      <input type="text" name="next-class" class="form-control fw-semibold fs-4" required
                        placeholder="ثانیہ" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="adm-date">تاریخ داخلہ</label>
                      <input type="date" name="adm-date" class="form-control fw-semibold fs-3" required
                        placeholder="DD/MM/YYYY" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                </form>
              </div>
            </div>

          </div>
          <!-- Submit Button -->
          <div class="col-md-12 mt-4 jameel-kasheeda">
            <button type="button" id="submit" name="submit" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
          </div>
        </div>





      </div>
    </div>
    <!-- Student Admission Form (End) -->
  </div>
  <!-- Main Content (End) -->
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  </div>

  <?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>