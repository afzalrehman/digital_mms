<?php
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
                <h4 class="my-3 fs-8 text-primary word-spacing-2px">یوزَر فارم</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      یوزَر فارم
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

        <!-- User Admission Form (Start) -->
        <div class="row">

          <!-- User Info -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-reg-no">رجسٹریشن نمبر</label>
                      <input type="number" name="user-reg-no" class="form-control fs-3 inter" required
                        placeholder="#421232" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-name">نام</label>
                      <input type="text" name="user-name" class="form-control fw-semibold fs-4" required
                        placeholder="احمد" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-email">ای میل</label>
                      <input type="text" name="user-email" class="form-control fs-3 user-email" required
                        placeholder="user@gmail.com" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>

                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-phone">فون نمبر</label>
                      <input type="number" name="user-phone" class="form-control fs-3 inter fw-semibold" required
                        placeholder="03119838490" />
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-select">یوزَر منتخب کریں</label>
                      <select id="user-select" name="user-select"
                        class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                        <option value="" class="jameel-kasheeda">- - -</option>
                        <option value="طلبہ کیلئے" class="jameel-kasheeda">طلبہ کیلئے</option>
                        <option value="طالبات کیلئے" class="jameel-kasheeda">طالبات کیلئے</option>
                        <option value="استاد کیلئے" class="jameel-kasheeda">استاد کیلئے</option>
                        <option value="استادنی کیلئے" class="jameel-kasheeda">استادنی کیلئے</option>
                      </select>
                      <!-- <span class="error" id="std-area-err"></span> -->
                    </div>
                    <div class="col-md-6">
                      <label class="fs-5 mb-1" for="user-password">پاس ورڈ</label>
                      <input type="text" name="user-password" class="form-control fs-3 user-password" required
                        minlength="8" maxlength="16" placeholder="st@123" />
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
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>