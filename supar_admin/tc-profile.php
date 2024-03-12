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
                <h4 class="my-3 fs-8 text-primary">استاد کے پروفائل</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      استاد کے پروفائل
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

        <!-- Teacher Profile (Start) -->
        <div class="card overflow-hidden">
          <div class="card-body p-0">
            <img src="../assets/images/template/profilebg.png" alt="" class="img-fluid">
            <div class="row align-items-center">

              <!-- Teacher Profile Image -->
              <div class="col-lg-4 order-lg-4 order-1">
                <div class="mt-n5">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                      style="width: 110px; height: 110px;" ;>
                      <div
                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;" ;>
                        <img src="../assets/images/template/user-4.jpg" alt="" class="w-100 h-100">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <h5 class="fs-7 mb-0 fw-semibold"> مسعود شفیع</h5>
                    <p class="mb-0 fs-4">استاد</p>
                  </div>
                </div>
              </div>
              <!-- Teacher Attendence Counter -->
              <div class="col-lg-4 order-lg-1 order-last">
                <!-- <div class="d-flex align-items-center justify-content-around m-4">
                  <div class="text-center">
                    <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">288</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-x fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">19</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل غیر حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-plus fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">80</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل رخصت</p>
                  </div>
                </div> -->
              </div>
              <div class="col-lg-4 order-last">
                <!-- Teacher Attendence Counter -->
                <div class="d-flex align-items-center justify-content-around m-4">
                  <div class="text-center">
                    <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">288</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-x fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">19</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل غیر حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-plus fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">80</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل رخصت</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Teacher All Tab (Start) -->
            <ul class="nav nav-pills user-profile-tab mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
              <!-- Teacher Profile Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                  aria-controls="pills-profile" aria-selected="true">
                  <i class="ti ti-user-circle me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">پروفائل</span>
                </button>
              </li>
              <!-- Teacher Attendence Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                  role="tab" aria-controls="pills-followers" aria-selected="false">
                  <i class="ti ti-user-check me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">حاضری</span>
                </button>
              </li>
              <!-- Teacher Salary Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab"
                  aria-controls="pills-friends" aria-selected="false">
                  <i class="ti ti-currency-dollar me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">سیلری</span>
                </button>
              </li>
              
            </ul>
            <!-- Teacher All Tab (End) -->
          </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <!-- Teacher Profile Tab Content -->
          <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-12 my-3 d-lg-block d-none ">
                <div class="card">
                  <div class="row d-flex align-items-center">
                    <!-- <div class="col-lg-1"></div> -->
                    <div class="col-lg-2 text-center py-4">
                      <div class="box">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">رجسٹریشن نمبر</p>
                        <p class="fs-3 m-0 p-0 text-primary inter">#421232</p>
                      </div>
                    </div>
                    <div class="col-lg-2  text-center py-4" style="border-right: 1px solid lightgrey;">
                      <div class="box   ">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">سیکشن</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda" َ>(الف)</p>
                      </div>
                    </div>
                    <div class="col-lg-2  text-center py-4" style="border-right: 1px solid lightgrey;">
                      <div class="box">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">صنف</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda">(معلم)</p>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center py-4" style="border-right: 1px solid lightgrey;">
                      <div class="box">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">شعبہ</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda">(بنین)</p>
                      </div>
                    </div>
                    <div class="col-lg-1"></div>
                  </div>
                </div>
              </div>
              <!-- Teacher Admission Details Card -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4 class="mb-3 mt-2 text-center fs-7">داخلہ کی تفصیل</h4>
                  </div>
                  <div class="card-body">
                    <div class="box mb-3 border-bottom pb-2">
                      <span class="me-3 fs-6 jameel-kasheeda ">داخلے کی تاریخ : </span>
                      <span class="fs-4 text-muted  inter">03/18/2021</span>
                    </div>
                    <div class="box  mb-3 border-bottom pb-2">
                      <span class="me-3  fs-6 jameel-kasheeda"> پیدائش کی تاریخ :</span>
                      <span class="fs-4 text-muted  inter">03/11/2014</span>
                    </div>
                    <div class="box  mb-3 border-bottom pb-2">
                      <span class="me-3  fs-6 jameel-kasheeda"> موبائل فون کانمبر :</span>
                      <span class="fs-4 text-muted  inter">03233666113</span>
                    </div>
                    <div class="box  mb-3 border-bottom pb-2">
                      <span class="me-3  fs-6 jameel-kasheeda"> ای میل :</span>
                      <span class="fs-4 text-muted  inter">masoodshafi@gmail.com</span>
                    </div>                
                  </div>
                </div>
              </div>
              <!-- Teacher Education Details Card -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-bottom pb-2">
                    <h4 class="jameel-kasheeda  mb-3 mt-2 text-center "> تعلیم کی تفصیل</h4>
                  </div>
                  <div class="card-body">
                    <div class="box mb-3 border-bottom pb-2">
                      <span class="me-3 fs-6 jameel-kasheeda ">قابلیت : </span>
                      <span class="fs-6 text-muted  jameel-kasheeda">ایم اے</span>
                    </div>
                    <div class="box  mb-3 border-bottom pb-2">
                      <span class="me-3 fs-6 jameel-kasheeda"> تجربہ :</span>
                      <span class="fs-4 text-muted jameel-kasheeda">ایک سال</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Teacher Attendence Tab Content -->
          <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab"
            tabindex="0">
            <div class="row">
              <!-- Month Dropdown -->
              <div class="col-lg-12">
                <div class="d-flex align-items-center">
                  <select class="form-select w-auto ms-auto mb-3 jameel-kasheeda fs-4 fw-semibold cursor-pointer">
                    <option selected="" class="fw-semibold">جنوری</option>
                    <option value="1" class="fw-semibold">فروری</option>
                    <option value="2" class="fw-semibold">مارچ</option>
                    <option value="3" class="fw-semibold">اپریل</option>
                  </select>
                </div>
              </div>
              <!-- Total Present -->
              <div class=" col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل حاضری</h5>
                    </div>
                    <h5 class="mb-0 ms-auto inter bg-light-success text-success py-2 px-3 rounded-circle">7</h5>
                  </div>
                </div>
              </div>
              <!-- Total Absent -->
              <div class=" col-md-6 col-xl-4">
                <div class="card ">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل غیرحاضری</h5>
                    </div>
                    <h5 class="mb-0  ms-auto inter bg-light-danger text-danger py-2 px-3 rounded-circle">7 </h5>
                  </div>
                </div>
              </div>
              <!-- Total Leave -->
              <div class=" col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل رخصت</h5>
                    </div>
                    <h5 class="mb-0 ms-auto inter bg-light-info text-info py-2 px-3 rounded-circle">7 </h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- Total Attendence List -->
            <div class="row">
              <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="mb-7 mb-sm-0">
                      <h5 class="card-title fs-8 text-primary">حاضری</h5>
                    </div>
                    <div class="table-responsive  text-center py-9">
                      <table class="table align-middle stylish-table text-nowrap mb-0">
                        <thead>
                          <tr class="fw-semibold">
                            <th class="fs-6 word-spacing-2px">#</th>
                            <th class="fs-6 word-spacing-2px">تاریخ</th>
                            <th class="fs-6 word-spacing-2px">دن</th>
                            <th class="fs-6 word-spacing-2px">حالت</th>
                          </tr>
                        </thead>
                        <tbody class="border-top">
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">1</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">18-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">ہفتہ</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-success text-success fs-4 word-spacing-2px jameel-kasheeda fw-semibold">حاضری</span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">2</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">20-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">پیر</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-danger text-danger fs-4 word-spacing-2px jameel-kasheeda fw-semibold">غیر
                                حاضری</span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">3</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">29-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">منگل</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-info text-info fs-4 word-spacing-2px jameel-kasheeda fw-semibold">رخصت</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Teacher Salary Tab Content -->
          <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="mb-7 mb-sm-0 d-flex align-items-center">
                      <h5 class="card-title fs-8 text-primary">سیلری</h5>
                      <div class="d-flex align-items-center ms-auto">
                        <select class="form-select w-auto mb-3 inter fs-2 cursor-pointer">
                          <option selected="">2020</option>
                          <option value="1">2021</option>
                          <option value="2">2022</option>
                          <option value="3">2023</option>
                        </select>
                      </div>
                    </div>
                    <div class="table-responsive text-center py-9">
                      <table class="table align-middle stylish-table text-nowrap mb-0">
                        <thead>
                          <tr class="fw-semibold">
                            <th class="fs-6 word-spacing-2px">#</th>
                            <th class="fs-6 word-spacing-2px">مہینہ</th>
                            <th class="fs-6 word-spacing-2px">رقم</th>
                            <th class="fs-6 word-spacing-2px">حالت</th>
                            <th class="fs-6 word-spacing-2px">انتخاب کریں</th>
                          </tr>
                        </thead>
                        <tbody class="border-top">
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">1</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">جنوری</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">1,500</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-success text-success fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                کیا</span>
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
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">2</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">فروری</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">500</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-danger text-danger fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                نہیں کیا</span>
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
          </div>
          
        </div>
        <!-- Teacher Profile  (End) -->
      </div>
      <!-- Main Content (End) -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>

  
<?php
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>