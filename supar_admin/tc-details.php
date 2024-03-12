<?php
include "includes/header.php";
include "includes/sidebar.php";
include "includes/navbar.php";
?>
      <!-- Main Content (Start) -->
      <div class="container-fluid">
        <!-- Main Content Header Card (Start) -->
        <div class="card bg-light-primary position-relative overflow-hidden shadow-none">
          <div class="card-body px-4 py-3">
            <div class="row align-items-center">
              <div class="col-9">
                <h4 class="my-3 fs-8 text-primary">استاد کی تفصیلات</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      استاد کی تفصیلات
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

        <!-- Teacher Search Form (Start) -->
        <div class="card card-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <form class="position-relative">
                <input type="text"
                  class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px"
                  id="input-search" placeholder="تلاش کریں &nbsp;..." />
                <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
              </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end mt-3 mt-md-0 jameel-kasheeda">
              <a href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
                ایڈ کریں
              </a>
            </div>
          </div>
        </div>
        <!-- Teacher Search Form (End) -->

        <!-- Teacher Details List (Start) -->
        <div class="col-lg-12 d-flex align-items-strech">
          <div class="card w-100">
            <div class="card-body">
              <div class="mb-7 mb-sm-0">
                <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
              </div>
              <div class="table-responsive text-center py-9">
                <table class="table align-middle text-nowrap mb-0">
                  <thead>
                    <tr class="fw-bold">
                      <th class="fs-5 word-spacing-2px text-primary">#</th>
                      <th class="fs-5 word-spacing-2px text-primary">رجسٹریشن نمبر</th>
                      <th class="fs-5 word-spacing-2px text-primary">پورا نام</th>
                      <th class="fs-5 word-spacing-2px text-primary">فون نمبر</th>
                      <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
                    </tr>
                  </thead>
                  <tbody class="border-top">
                    <tr>
                      <td>
                        <p class="mb-0 fs-2 inter">1</p>
                      </td>
                      <td>
                        <p class="mb-0 fs-2 inter">#00281</p>
                      </td>
                      <td>
                        <p class="mb-0 fs-4 word-spacing-2px">احمدشفیع</p>
                      </td>
                      <td>
                        <p class="mb-0 fs-2 inter">03123042910</p>
                      </td>
                      <td>
                        <div class="action-btn">
                          <a href="javascript:void(0)" class="text-dark ms-1">
                            <i class="ti ti-trash fs-6 text-danger"></i>
                          </a>
                          <a href="javascript:void(0)" class="text-info ms-1">
                            <i class="ti ti-eye fs-6"></i>
                          </a>
                          <a href="javascript:void(0)" class="text-success">
                            <i class="ti ti-edit fs-6"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p class="mb-0 fs-2 inter">2</p>
                      </td>
                      <td>
                        <p class="mb-0 fs-2 inter">#00291</p>
                      </td>
                      <td>
                        <p class="mb-0 fs-4 word-spacing-2px">حارث شمس </p>
                      </td>
                      <td>
                        <p class="mb-0 fs-2 inter">03123042490</p>
                      </td>
                      <td>
                        <div class="action-btn">
                          <a href="javascript:void(0)" class="text-dark ms-1">
                            <i class="ti ti-trash fs-6 text-danger"></i>
                          </a>
                          <a href="javascript:void(0)" class="text-info ms-1">
                            <i class="ti ti-eye fs-6"></i>
                          </a>
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
        <!-- Teacher Details List (End) -->
      </div>
      <!-- Main Content (End) -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>

  <?php
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>