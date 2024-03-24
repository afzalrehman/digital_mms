<?php
session_start();
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<!-- Header End -->

<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary">اعلان کی تفصیلات</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                اعلان کی تفصیلات
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

  <!-- Annoucement Search Form (Start) -->
  <div class="card card-body">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-2">
        <form>
          <input type="text" class="form-control jameel-kasheeda fw-semibold fs-4 word-spacing-2px" placeholder="شعبہ" />
        </form>
      </div>
      <div class="col-md-6 col-lg-3 mb-2">
        <form>
          <input type="text" class="form-control jameel-kasheeda fw-semibold fs-4 word-spacing-2px" placeholder="اساتذہ" />
        </form>
      </div>
      <div class="col-md-6 col-lg-3 mb-2">
        <form>
          <input type="date" class="form-control inter fs-4" placeholder="تاریخ" />
        </form>
      </div>
      <div class="col-md-6 col-lg-3 text-end mt-3 mt-md-0 jameel-kasheeda">
        <a href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
          تلاش کریں
        </a>
      </div>
    </div>
  </div>
  <!-- Annoucement Search Form (End) -->

  <!-- Annoucement Details List (Start) -->
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="mb-7 mb-sm-0">
          <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
        </div>
        <div class="table-responsive text-center py-9">
          <table class="table align-middle text-nowrap mb-0">
            <thead>
              <tr class="fw-semibold">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">شعبہ</th>
                <th class="fs-5 word-spacing-2px text-primary">اساتذہ</th>
                <th class="fs-5 word-spacing-2px text-primary">تاریخ</th>
                <th class="fs-5 word-spacing-2px text-primary">عنوان</th>
                <th class="fs-5 word-spacing-2px text-primary">اعلان</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top">
              <tr>
                <td>
                  <p class="mb-0 fs-2 inter">1</p>
                </td>
                <td>
                  <p class="mb-0 fs-4">بنین</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px"> ماسٹر احمد</p>
                </td>

                <td>
                  <p class="mb-0 fs-2 inter">23-09-2023</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">عید کی چھٹی</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">حکومت نے عیدالاضحیٰ پر دو چھٹیوں کا اعلان کر دیا ۔۔۔</p>
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
                  <p class="mb-0 fs-4">بنات</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px"> محمد سجاد</p>
                </td>

                <td>
                  <p class="mb-0 fs-2 inter">19-10-2023</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">بارش کی چھٹی</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">گرمیوں کا موسم سال کے دوران سب سے طویل عرصے تک جاری رہتا
                    ہے ۔۔۔</p>
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
                  <p class="mb-0 fs-2 inter">3</p>
                </td>
                <td>
                  <p class="mb-0 fs-4">بنین</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px"> ماسٹر احمد</p>
                </td>

                <td>
                  <p class="mb-0 fs-2 inter">23-09-2023</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">عید کی چھٹی</p>
                </td>
                <td>
                  <p class="mb-0 fs-4 word-spacing-2px">حکومت نے عیدالاضحیٰ پر دو چھٹیوں کا اعلان کر دیا ۔۔۔</p>
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
  <!-- Annoucement Details List (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>