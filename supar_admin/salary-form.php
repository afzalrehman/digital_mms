<?php
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
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="st-reg-no">رجسٹریشن نمبر</label>
                      <input type="number" name="st-reg-no" class="form-control fs-3 inter" required
                        placeholder="#421232" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="st-name">نام</label>
                      <input type="text" name="st-name" class="form-control fw-semibold fs-4" required
                        placeholder="احمد" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="st-father-name">والد کا نام</label>
                      <input type="text" name="st-father-name" class="form-control fw-semibold fs-4" required
                        placeholder="احمد شفیع" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="class-select">کلاس منتخب کریں</label>
                      <select id="user-select" name="class-select"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="پہلی" class="jameel-kasheeda">پہلی</option>
                        <option value="دوسری" class="jameel-kasheeda">دوسری</option>
                      </select>
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>

                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="dep-select">شعبہ منتخب کریں</label>
                      <select id="user-select" name="dep-select"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="بنین" class="jameel-kasheeda">بنین</option>
                        <option value="بنات" class="jameel-kasheeda">بنات</option>
                      </select>
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="fees-amount">رقم</label>
                      <input type="number" name="fees-amount" class="form-control fs-3 inter fw-semibold" required
                        placeholder="300" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>

                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="fees-type">قسم منتخب کریں</label>
                      <select id="user-select" name="fees-type"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="ماہانہ" class="jameel-kasheeda">ماہانہ</option>
                        <option value="امتحان" class="jameel-kasheeda">امتحان</option>
                      </select>
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