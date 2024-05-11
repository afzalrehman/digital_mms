<?php
session_start();
include_once "../includes/config.php";
include_once "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<div class="container-fluid">
  <!-- First Row -->
  <div class="row mt-2">
    <div class="col-lg-8 col-sm-6">
      <div class="card w-100 overflow-hidden">
        <div class="card-body py-3">
          <div class="row justify-content-between align-items-center">
            <h3 class="mb-9 jameel-kasheeda text-primary">خوش آمدید <span class="mx-1">🎉</span><span>عمرراہی
              </span>صاحب</h3>
            <p class="mb-9 jameel-kasheeda fs-5 word-spacing-4px">حکومت نے مدارس میں کیے جانے والے سروے کے لیے سوالات کا
              ایک
              پروفارمہ تیار کیا ہے۔
              پروفارمہ میں دیے گئے ۱۲ سوالات کچھ اس طرح ہیں، مدرسہ کا نام، مدرسہ چلانے والے ادارے کا نام، مدرسہ
              کے قیام کا سال، مدرسہ کرائے کی
              <a href="#" class="fs-4">مذید پڑھیں</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6">
          <div class="card w-100 overflow-hidden">
            <div class="card-body py-3">
              <div class="row justify-content-between align-items-center text-center">
                <div class="card-title text-center mb-2 pb-1">
                  <img src="../assets/images/template/calender1.png">
                </div>
                <p class="mb-2 inter fs-5">10</p>
                <p class="jameel-kasheeda fs-7 p-0 m-0">ربیع الاؤل</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6">
          <div class="card w-100 overflow-hidden">
            <div class="card-body py-3">
              <div class="row justify-content-between align-items-center text-center">
                <div class="card-title text-center mb-2 pb-1">
                  <img src="../assets/images/template/calender.png">
                </div>
                <p class="mb-2 inter fs-5">25</p>
                <p class="jameel-kasheeda fs-7 p-0 m-0">اکتوبر</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Second Row -->
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="card border-start border-danger">
        <div class="card-body">
          <div class="d-flex no-block align-items-center">
            <img src="../assets/images/template/student.png" alt="" width="30%">
            <div class="ms-4">
              <h2 class="fs-6 inter mr-2"><?php echo total_students_male(); ?></h2>
              <h5 class="text-primary mb-0 jameel-kasheeda">طلبہ</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card border-start border-danger">
        <div class="card-body">
          <div class="d-flex no-block align-items-center">
            <img src="../assets/images/template/female_student.png" alt="" width="30%">
            <div class="ms-4">
              <h2 class="fs-6 inter mr-2"><?php echo total_students_female(); ?></h2>
              <h5 class="text-primary mb-0 jameel-kasheeda">طالبات</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card border-start border-danger">
        <div class="card-body">
          <div class="d-flex no-block align-items-center">
            <img src="../assets/images/template/teacher.png" alt="" width="30%">
            <div class="ms-4">
              <h2 class="fs-6 inter mr-2"><?php echo total_teacher_male(); ?></h2>
              <h5 class="text-primary mb-0 jameel-kasheeda">استاد</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="card border-start border-danger">
        <div class="card-body">
          <div class="d-flex no-block align-items-center">
            <img src="../assets/images/template/female.png" alt="" width="30%">
            <div class="ms-4">
              <h2 class="fs-6 inter mr-2"><?php echo total_teacher_female(); ?></h2>
              <h5 class="text-primary mb-0 jameel-kasheeda word-spacing-4x">استادنی</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Third Row -->
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="bg-light-primary text-primary d-inline-block px-3 py-2 rounded">
              <i class="ti ti-cash display-6"></i>
            </div>
            <div class="ms-auto">
              <!-- Button trigger modal Income -->
              <div class="dropdown">
                <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="modal"
                  data-bs-target="#incomemodal" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-adjustments-horizontal ti-lg fs-6"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="incomemodal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom">
                        <h3 class="modal-title" id="modalCenterTitle">آمدنی</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row g-2">
                          <div class="col-md-6 col-12 mb-0">
                            <label for="dobWithTitle" class="form-label">مہینہ</label>
                            <input type="month" id="" class="form-control" value="<?= date('Y-m') ?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">کلوز</button>
                        <button type="button" class="btn btn-primary" onclick="searching_attendence()"
                          data-bs-dismiss="modal">تلاش کریں</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Model -->
              </div>
              <!-- / Button trigger modal Income -->
            </div>
          </div>
          <div class="mt-5">
            <h4 class="card-title ">آمدنی</h4>
            <div class="progress mt-4 bg-light-primary">
              <div class="progress-bar bg-primary" style="width: 78%; height: 6px;" role="progressbar">
                <span class="sr-only">60%</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mt-3 ">
              <h5 class="inter"><?= total_income() ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="bg-light-danger text-danger d-inline-block px-3 py-2 rounded">
              <i class="ti ti-trending-down display-6"></i>
            </div>
            <div class="ms-auto">
              <!-- Button trigger modal expence -->
              <div class="dropdown">
                <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="modal"
                  data-bs-target="#expencemodal" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-adjustments-horizontal ti-lg fs-6"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="expencemodal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom">
                        <h3 class="modal-title" id="modalCenterTitle">خرچہ</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row g-2">
                          <div class="col-md-6 col-12 mb-0">
                            <label for="dobWithTitle" class="form-label">مہینہ</label>
                            <input type="month" id="" class="form-control" value="<?= date('Y-m') ?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">کلوز</button>
                        <button type="button" class="btn btn-primary" onclick="searching_attendence()"
                          data-bs-dismiss="modal">سرچ کریں</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Model -->
              </div>
              <!-- / Button trigger modal expence -->
            </div>
          </div>
          <div class="mt-5">
            <h4 class="card-title ">خرچہ</h4>
            <div class="progress mt-4 bg-light-danger">
              <div class="progress-bar bg-danger" style="width: 78%; height: 6px;" role="progressbar">
                <span class="sr-only">60%</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mt-3 ">
              <h5 class="inter"><?= total_expense() ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="bg-light-success text-success d-inline-block px-3 py-2 rounded">
              <i class="ti ti-trending-up display-6"></i>
            </div>
            <div class="ms-auto">
              <!-- Button trigger modal profit -->
              <div class="dropdown">
                <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="modal"
                  data-bs-target="#profitmodal" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-adjustments-horizontal ti-lg fs-6"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="profitmodal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom">
                        <h3 class="modal-title" id="modalCenterTitle">منافع</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row g-2">
                          <div class="col-md-6 col-12 mb-0">
                            <label for="dobWithTitle" class="form-label">مہینہ</label>
                            <input type="month" id="" class="form-control" value="<?= date('Y-m') ?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">کلوز</button>
                        <button type="button" class="btn btn-primary" onclick="searching_attendence()"
                          data-bs-dismiss="modal">سرچ کریں</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Model -->
              </div>
              <!-- / Button trigger modal profit -->
            </div>
          </div>
          <div class="mt-5">
            <h4 class="card-title ">منافع</h4>
            <div class="progress mt-4 bg-light-success">
              <div class="progress-bar bg-success" style="width: 78%; height: 6px;" role="progressbar">
                <span class="sr-only">60%</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mt-3 ">
              <h5 class="inter"><?= total_balance() ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="bg-light-warning text-warning d-inline-block px-3 py-2 rounded">
              <i class="ti ti-report-money display-6"></i>

            </div>
            <div class="ms-auto">
              <!-- Button trigger modal loan -->
              <div class="dropdown">
                <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="modal"
                  data-bs-target="#loanmodal" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-adjustments-horizontal ti-lg fs-6"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="loanmodal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom">
                        <h3 class="modal-title" id="modalCenterTitle">اٌدھار</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row g-2">
                          <div class="col-md-6 col-12 mb-0">
                            <label for="dobWithTitle" class="form-label">مہینہ</label>
                            <input type="month" id="" class="form-control" value="<?= date('Y-m') ?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">کلوز</button>
                        <button type="button" class="btn btn-primary" onclick="searching_attendence()"
                          data-bs-dismiss="modal">سرچ کریں</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Model -->
              </div>
              <!-- / Button trigger modal loan -->
            </div>
          </div>
          <div class="mt-5">
            <h4 class="card-title ">اٌدھار</h4>
            <div class="progress mt-4 bg-light-warning">
              <div class="progress-bar bg-warning" style="width: 78%; height: 6px;" role="progressbar">
                <span class="sr-only">60%</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mt-3 ">
              <h5 class="inter"><?= total_loan() ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fourth Row -->
  <div class="row">
    <div class="col-lg-4">
      <div class="card earning-widget">
        <div class="card-body py-3 mt-2">
          <div class="card-title">
            <div class="d-flex">
              <div>
                <h2 class="mt-0 fs-6 mb-0">طلبہ کی فیس</h2>
              </div>
              <div class="ms-auto">
                <select class="form-select jameel-kasheeda fw-semibold">
                  <option class="jameel-kasheeda fw-semibold" value="0">کچی پہلی</option>
                  <option class="jameel-kasheeda fw-semibold" value="1">پہلی</option>
                  <option class="jameel-kasheeda fw-semibold" selected="" value="2">دوسری</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 border-top scroll-bar">
          <?php
          $sql = "SELECT student_fees.st_pay_fees, students.st_roll_no, students.std_name 
        FROM student_fees
        INNER JOIN students ON student_fees.st_id = students.st_id
        WHERE students.std_gender = 'مرد'";

          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="d-flex align-items-center pb-2">
                <div class="flex-shrink-0">
                  <img src="../assets/images/template/student.png" width="43" class="rounded-circle bg-light-secondary"
                    alt="logo" />
                </div>
                <div class="ms-2 font-weight-medium">
                  <h5 class="font-weight-medium mb-0"><?= $row['std_name'] ?></h5>
                  <small class="fs-1 text-muted inter"><?= $row['st_roll_no'] ?></small>
                </div>
                <div class="ms-auto">
                  <span class="badge bg-light-info text-info inter"><?= $row['st_pay_fees'] ?></span>
                </div>
              </div>
              <?php
            }
          } else {
            echo '<tr>
            <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no data available.</td>
          </tr>';
          }
          ?>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card earning-widget">
        <div class="card-body py-3 mt-2">
          <div class="card-title">
            <div class="d-flex">
              <div>
                <h2 class="mt-0 fs-6 mb-0">طالبات کی فیس</h2>
              </div>
              <div class="ms-auto">
                <select class="form-select jameel-kasheeda fw-semibold">
                  <option class="jameel-kasheeda fw-semibold" value="0">کچی پہلی</option>
                  <option class="jameel-kasheeda fw-semibold" value="1">پہلی</option>
                  <option class="jameel-kasheeda fw-semibold" selected="" value="2">دوسری</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 border-top scroll-bar">
          <?php
          $sql = "SELECT student_fees.st_pay_fees, students.st_roll_no, students.std_name 
        FROM student_fees
        INNER JOIN students ON student_fees.st_id = students.st_id
        WHERE students.std_gender = 'عورت'";

          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="d-flex align-items-center pb-2">
                <div class="flex-shrink-0">
                  <img src="../assets/images/template/female_student.png" width="43"
                    class="rounded-circle bg-light-secondary" alt="logo" />
                </div>
                <div class="ms-2 font-weight-medium">
                  <h5 class="font-weight-medium mb-0 "><?= $row['std_name'] ?></h5>
                  <small class="fs-1 text-muted inter"><?= $row['st_roll_no'] ?></small>
                </div>
                <div class="ms-auto">
                  <span class="badge bg-light-primary text-primary inter"><?= $row['st_pay_fees'] ?></span>
                </div>
              </div>
              <?php
            }
          } else {
            echo '<tr>
            <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no data available.</td>
          </tr>';
          }
          ?>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card earning-widget">
        <div class="card-body py-3 mt-2">
          <div class="card-title">
            <div class="d-flex">
              <div>
                <h2 class="mt-0 fs-6 mb-0 jameel-kasheeda word-spacing-4px">دکان کا کرایہ</h2>
              </div>
              <div class="ms-auto">
                <select class="form-select jameel-kasheeda fw-semibold">
                  <option class="fw-semibold jameel-kasheeda" selected="" value="0">جنوری</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">فروری</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">مارچ</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">اپریل</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">مئی</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">جون</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">جولائی</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">آگست</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">ستمبر</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">اکتوبر</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">نومبر</option>
                  <option class="fw-semibold jameel-kasheeda" value="0">دسمبر</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 border-top scroll-bar">
          <?php
          $sql = "SELECT shop_rent.dokan_id, shop_rent.pay_rent, dokan.dokan_name  
        FROM shop_rent
        INNER JOIN dokan ON dokan.dokan_id = shop_rent.dokan_id";

          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="d-flex align-items-center pb-2">
                <div class="flex-shrink-0">
                  <img src="../assets/images/template/store.png" width="40" class="rounded-circle bg-light-secondary"
                    alt="logo" />
                </div>
                <div class="ms-2 font-weight-medium">
                  <h5 class="font-weight-medium mb-0"><?= $row['dokan_name'] ?></h5>
                  <small class="fs-1 text-muted inter">#00<?= $row['dokan_id'] ?></small>
                </div>
                <div class="ms-auto">
                  <span class="badge bg-light-primary text-primary"><?= $row['pay_rent'] ?></span>
                </div>
              </div>
              <?php
            }
          } else {
            echo '<tr>
            <td colspan="7" class="fw-semibold bg-light-warning text-warning text-center">There are no data available.</td>
          </tr>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>


<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>