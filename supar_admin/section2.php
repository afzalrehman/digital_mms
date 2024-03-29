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
                <h4 class="my-3 fs-8 text-primary word-spacing-2px">سیکشن فارم </h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      سیکشن فارم
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
          <div class="col-6">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> سیکشن لکھیئے</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4">
                    <!-- <span class="error" id="std-dep-err"></span> -->
                    <div class="col-md-12">
                      <label class="fs-5 mb-1" for="annoucment-subject">سیکشن </label>
                      <input type="text" name="annoucment-subject" class="form-control fw-semibold fs-4" required
                        placeholder=" سیکشن ایڈ کریں" />
                      <!-- <span class="error" id="std-area-err"></span> -->
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
          <div class="col-lg-6 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="mb-7 mb-sm-0">
                  <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
                </div>
                <div class="table-responsive text-center py-9">
                  <table class="table align-middle text-nowrap mb-0">
                    <thead>
                      <tr class="fw-semibold">
                        <th class="fs-5 word-spacing-2px">#</th>
                        <th class="fs-5 word-spacing-2px">سیکشن نمبر</th>
                       
                        <th class="fs-5 word-spacing-2px">انتخاب کریں</th>
                      </tr>
                    </thead>
                    <tbody class="border-top">
                      <tr>
                        <td>
                          <p class="mb-0 fs-2 inter">1</p>
                        </td>
                       
                        <td>
                          <p class="mb-0 fs-4 word-spacing-2px">الف</p>
                        </td>
                       
                        <td>
                          <div class="action-btn">
                            <a href="javascript:void(0)" class="text-dark ms-1">
                              <i class="ti ti-trash fs-6 text-danger"></i>
                            </a>
                            <!-- <a href="javascript:void(0)" class="text-info ms-1">
                              <i class="ti ti-eye fs-6"></i>
                            </a> -->
                            <a href="javascript:void(0)" class="text-success">
                              <i class="ti ti-edit fs-6"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
               
  
                    </tbody>
                  </table>
                </div>
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
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>