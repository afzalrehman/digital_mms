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
          <h4 class="my-3 fs-8 text-primary">اعلان </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                اعلان
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

  <!-- Annoucement Form (Start) -->
  <div class="row">
    <!-- Annoucement Form -->
    <div class="col-12">
      <div class="card">
        <div class="border-bottom title-part-padding mt-3">
          <h4 class="card-title mb-0 fs-7 text-primary"> اعلان</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="row g-4 mb-4">
              <div class="col-md-6 d-flex align-items-center">
                <div class="fs-5 jameel-kasheeda fw-semibold">اساتذہ </div>
                <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                <div class="fs-5 jameel-kasheeda fw-semibold">ماسٹر احمد</div>
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="fs-5 jameel-kasheeda fw-semibold">شعبہ </div>
                <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                <div class="fs-5 jameel-kasheeda fw-semibold">بنین</div>
              </div>
            </div>
            <div class="row g-4 mb-4">
              <div class="col-md-6 d-flex align-items-center">
                <div class="fs-5 jameel-kasheeda fw-semibold">تاریخ </div>
                <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                <div class="fs-3 inter fw-semibold">23-09-2023</div>
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="fs-5 jameel-kasheeda fw-semibold">اعلان</div>
                <span class="fs-5 jameel-kasheeda">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                <div class="fs-5 jameel-kasheeda fw-semibold">سوفٹ وئیر کیلئے</div>
              </div>
            </div>
            <hr>
            <div class="row g-4">
              <div class="col-md-12 d-flex align-items-center">
                <div class="fs-7 jameel-kasheeda fw-semibold">اعلان</div>
                <span class="fs-7 jameel-kasheeda">&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                <div class="fs-6 jameel-kasheeda fw-semibold">عید کی چھٹی</div>
              </div>
              <div class="col-md-12">
                <div class="fs-5 jameel-kasheeda fw-semibold word-spacing-4px">عید الفطر یا عید مبارک مسلمانوں کے لیے عید اور خوشی منانے کا ایک خوشگوار موقع ہے۔ یہ ایک دن ہے کہ اللہ تعالیٰ کا شکر ادا کریں کہ اس نے ہمیں جو نعمتیں عطا کی ہیں۔
                  عید الفطر کا لفظی ترجمہ روزہ افطار کرنے کے موقع میں ہوتا ہے۔ یہ تہوار ماہ رمضان کے روزے کے اختتام کی علامت ہے۔
                  مسلمان رمضان المبارک کے موقع پر نیا چاند دیکھنے کا انتظار کرتے ہیں تاکہ اگلی صبح تہوار شروع ہو جائیں۔</div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Annoucement Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>