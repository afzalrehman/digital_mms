<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navbar.php";
?>
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">اعلان فارم </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                اعلان فارم
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

  <!-- Annoucement Form (Start) -->
  <div class="row">
    <!-- Annoucement Form -->
    <div class="col-12">
      <div class="card">
        <div class="border-bottom title-part-padding mt-3">
          <h4 class="card-title mb-0 fs-7 text-primary"> اعلان لکھیئے</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment-depart">شعبہ</label>
                <select name="annoucment-depart" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="بنین" class="jameel-kasheeda">بنین</option>
                  <option value="بنات" class="jameel-kasheeda">بنات</option>
                </select>
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment-teacher">استاد یا استانی کا نام</label>
                <select id="annoucment-teacher" name="annoucment-teacher" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="عائیشہ" class="jameel-kasheeda">عائیشہ</option>
                  <option value="مولانا صدیق" class="jameel-kasheeda">مولانا صدیق</option>
                </select>
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment-date">تاریخ </label>
                <input type="date" name="annoucment-date" class="form-control fw-semibold fs-3" required placeholder="DD/MM/YYYY" />
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="annoucment-type">اعلان کس کے لیے ہیں ۔</label>
                <select name="" id="" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="سافٹ ویئیر کے لیے " class="jameel-kasheeda">سافٹ ویئیر کے لیے </option>
                  <option value="ویب سائٹ کے لیے" class="jameel-kasheeda">ویب سائٹ کے لیے</option>
                  <option value="سب کے لیے" class="jameel-kasheeda">سب کے لیے </option>
                </select>
              </div>
              <!-- <span class="error" id="std-dep-err"></span> -->
              <div class="col-md-12">
                <label class="fs-5 mb-1" for="annoucment-subject">عنوان </label>
                <input type="text" name="annoucment-subject" class="form-control fw-semibold fs-4" required placeholder="عید کی چھٹی" />
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
              <div class="col-md-12">
                <label class="fs-5 mb-1" for="annoucement-note">اعلان </label>
                <textarea class="form-control jameel-kasheeda fw-semibold fs-4" rows="5" placeholder="آج مدارس کی طرف سے عید کی چھٹی ہیں۔"></textarea>
              </div>
              <!-- <span class="error" id="std-area-err"></span> -->

              <!-- Submit Button -->
              <div class="col-md-12 mt-5 jameel-kasheeda">
                <button type="button" id="submit" name="submit" class="btn btn-primary fw-semibold fs-5">ایڈ
                  کریں</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>