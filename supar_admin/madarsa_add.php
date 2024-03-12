<?php
session_start();
include "includes/function.php";
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navbar.php";
?>
<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">مدرسہ ایڈکریں</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                مدرسہ ایڈکریں
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
          <form method="post" action="code.php">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="reg-number">رجسٹریشن نمبر</label>
                <input type="number" name="register" class="form-control fw-semibold fs-3"  placeholder="#04321" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['register'])) {
                                                          echo $_SESSION['errors']['register'];
                                                          unset($_SESSION['errors']['register']);
                                                        } ?></span>

              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area">مدرسہ کا نام</label>
                <input type="text" name="name" class="form-control fw-semibold fs-3 urduInput"  placeholder="مدرسہ کا نام" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['name'])) {
                                                          echo $_SESSION['errors']['name'];
                                                          unset($_SESSION['errors']['name']);
                                                        } ?></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area">شہر ایڈ کریں</label>
                <input type="text" name="city" class="form-control fw-semibold fs-3 urduInput"  placeholder="شہر ایڈ کریں" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['city'])) {
                                                          echo $_SESSION['errors']['city'];
                                                          unset($_SESSION['errors']['city']);
                                                        } ?></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area">مدرسہ کا پتہ</label>
                <input type="text" name="address" class="form-control fw-semibold fs-3 urduInput"  placeholder="مدرسہ کا پتہ" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['address'])) {
                                                          echo $_SESSION['errors']['address'];
                                                          unset($_SESSION['errors']['address']);
                                                        } ?></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5  mb-1" for="std-area">قایؑم شدہ تاریخ</label>
                <input type="number" name="date" class="form-control fw-semibold fs-3"  placeholder="قایؑم شدہ تاریخ" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['date'])) {
                                                          echo $_SESSION['errors']['date'];
                                                          unset($_SESSION['errors']['date']);
                                                        } ?></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5  mb-1" for="std-area">مدرسہ کا ای میل</label>
                <input type="email" name="email" class="form-control fw-semibold fs-3"  placeholder="مدرسہ کا ای میل" />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['email'])) {
                                                          echo $_SESSION['errors']['email'];
                                                          unset($_SESSION['errors']['email']);
                                                        } ?></span>
                <span class="inter error text-danger"><?php if (isset($_SESSION['email'])) {
                                                        echo $_SESSION['email'];
                                                        unset($_SESSION['email']);
                                                      } ?></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5  mb-1" for="std-area">فون نمبر </label>
                <input type="number" name="phone" class="form-control fw-semibold fs-3"  placeholder="فون نمبر " />
                <span class="inter error text-danger"> <?php if (isset($_SESSION['errors']['phone'])) {
                                                          echo $_SESSION['errors']['phone'];
                                                          unset($_SESSION['errors']['phone']);
                                                        } ?></span>
                <span class="inter error text-danger"><?php if (isset($_SESSION['phone'])) {
                                                        echo $_SESSION['phone'];
                                                        unset($_SESSION['phone']);
                                                      } ?></span>
              </div>
              <div class="col-md-12">
                <label class="fs-5  mb-1" for="std-area">ٹیسک ایڈ کریں</label>
                <textarea name="description" class="form-control fw-semibold fs-3 urduInput" ></textarea>

                <!-- <span class="error" id="std-area-err"></span> -->
              </div>

              <div class="col-md-12 mt-4 jameel-kasheeda">
                <button type="submit" id="submit" name="ins_submit" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Submit Button -->

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
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>