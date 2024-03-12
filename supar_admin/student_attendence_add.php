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
                <h4 class="my-3 fs-8 text-primary">طلبہ کی حاضری</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      طلبہ کی حاضری
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

        <!-- Student Search Form (Start) -->
        <div class="card card-body">
          <form class="position-relative">
            <div class="row">
              <div class="col-md-4 col-xl-3">
                <input type="text"
                  class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px"
                  id="input-search" placeholder="تلاش کریں &nbsp;..." />
                <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
              </div>
              <div class="col-md-8 col-xl-9 text-end mt-3 mt-md-0 jameel-kasheeda">
                <a href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
                  ایڈ کریں
                </a>
              </div>
          </form>
        </div>
      </div>
      <!-- Student Search Form (End) -->

      <!-- Student Attendence List (Start) -->
      <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <form>
              <div class="row mb-5">
                <div class="col-md-4 col-xl-3">
                  <input type="date" required class="form-control jameel-kasheeda  " placeholder="تلاش کریں " />
                </div>
                <div class="col-md-4 col-xl-3">
                  <select required name="" id="" class="form-control jameel-kasheeda ">
                    <option value="">---</option>
                    <option value="صبح">صبح</option>
                    <option value="دوپہر">دوپہر</option>
                    <option value="رات">رات</option>
                    <option value="مغرب">مغرب</option>
                  </select>
                </div>

                <div class="col-md-4 col-xl-6 text-end mt-3 mt-md-0  jameel-kasheeda">
                  <button type="submit" href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
                    ایڈ کریں
                  </button >
                </div>
              </div>
            </form>
          </div>
          <div class="row mb-7 mb-sm-4">
            <div class="col-lg-5 col-md-12">
              <h5 class="card-title fs-7 mx-4 text-primary">ایک ساتھ سلیکٹ کریں</h5>
            </div>
            <div class="col-lg-7 col-md-12  ">
              <div class="row jameel-kasheeda mx-4 mx-lg-0">
                <div class="col-lg-3 col-md-0"></div>
                <div class="col-lg-2 col-md-2  ">
                  <span class="fs-5 ">حاضری</span>
                  <input type="radio" value="1" name="styled_radio5" onclick="check()"
                    class="form-check-input cursor-pointer " />
                </div>
                <div class="col-lg-3 col-md-3  ">
                  <span class="fs-5 ">غیر حاضری</span>
                  <input type="radio" value="1" name="styled_radio5" onclick="upsent()"
                    class="form-check-input cursor-pointer" />
                </div>
                <div class="col-lg-2 col-md-2  ">
                  <span class="fs-5 ">رخصت</span>
                  <input type="radio" value="1" name="styled_radio5" onclick="present()"
                    class="form-check-input cursor-pointer" />
                </div>
                <div class="col-lg-2 col-md-2  ">
                  <span class="fs-5 ">چھٹی</span>
                  <input type="radio" value="1" name="styled_radio5" onclick="holiday()"
                    class="form-check-input cursor-pointer" />
                </div>
              </div>
            </div>
          </div>


          <div class="table-responsive text-center py-9">
            <table class="table align-middle text-nowrap mb-0">
              <thead>
                <tr class="fw-semibold">
                  <th class="fs-5 word-spacing-2px">#</th>
                  <th class="fs-5 word-spacing-2px">رجسٹریشن نمبر</th>
                  <th class="fs-5 word-spacing-2px">نام</th>
                  <th class="fs-5 word-spacing-2px">والد کا نام</th>
                  <th class="fs-5 word-spacing-2px">حاضری</th>
                  <th class="fs-5 word-spacing-2px">غیر حاضری</th>
                  <th class="fs-5 word-spacing-2px">رخصت</th>
                  <th class="fs-5 word-spacing-2px">چھٹی</th>
                  <th class="fs-5 word-spacing-2px">نوٹ</th>
                </tr>
              </thead>
              <tbody class="border-top">

                <tr>
                  <td>
                    <p class="mb-0 fs-2 inter">1</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-2 inter">#00580</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">محمد حارث</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">شمس الاعالم</p>
                  </td>
                  <td>
                    <input type="radio" value="2" id="check1" name="styled_radio1"
                      class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="2" id="upsent" name="styled_radio1"
                      class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="3" id="present" name="styled_radio1"
                      class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="4" id="holiday" name="styled_radio1"
                      class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="text" value="" name="" class=" form-control" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-0 fs-2 inter">1</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-2 inter">#00580</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">محمد حارث</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">شمس الاعالم</p>
                  </td>
                  <td>
                    <input type="radio" value="1" name="styled_radio5" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="2" name="styled_radio5" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="3" name="styled_radio5" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="4" name="styled_radio5 " class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="text" value="" name="" class="form-control " />
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-0 fs-2 inter">1</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-2 inter">#00580</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">محمد حارث</p>
                  </td>
                  <td>
                    <p class="mb-0 fs-4 word-spacing-2px">شمس الاعالم</p>
                  </td>
                  <td>
                    <input type="radio" value="1" name="styled_radio" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="2" name="styled_radio" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="3" name="styled_radio" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="radio" value="4" name="styled_radio" class="form-check-input cursor-pointer" />
                  </td>
                  <td>
                    <input type="text" value="" name="" class=" form-control" />
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Student Attendence List (End) -->
  </div>
  <!-- Main Content (End) -->
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  </div>

  <?php
include "includes/mobileNavbar.php";
include "includes/footer.php";
?>