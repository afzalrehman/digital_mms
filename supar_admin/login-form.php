<?php
include "includes/header.php";
?>
  <!-- Login Form Start -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="../assets/images/login.png" alt="" class="img-fluid" width="500">
            </div>
          </div>
          
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 madarsa-name text-center">سائن اِن کریں</h2>
                <p class=" mb-9 fs-4 text-primary text-center"> مدرسہ حسینیہ میں خوش آمدید 🎉</p>
                <form class="">
                  <div class="mb-3">
                    <label for="phone_number" class="form-label fs-5">طلبہ آئی ڈی </label>
                    <input type="number" class="form-control jameel-kasheeda" id="phone_number" placeholder="طلبہ کی آئی ڈی نمبر لکھیئے">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label fs-5">پاس ورڈ</label>
                    <input type="password" class="form-control jameel-kasheeda" id="password" placeholder="پاس ورڈ لکھیئے">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label" for="flexCheckChecked">اپنا پاس ورڈ یاد رکھیں</label>
                    </div>
                    <a class="text-primary" href="#">پاسورڈ بھول گیا؟</a>
                  </div>
                  <a href="#" class="btn btn-primary w-100 py-8 mb-4 rounded-2" id="sign-in">سائن ان کریں</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Form End -->

  <?php
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>