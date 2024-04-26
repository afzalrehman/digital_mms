<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
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
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="تلاش کریں &nbsp;..." />
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
                <th class="fs-5 word-spacing-2px text-primary">تنخواہ</th>
                <th class="fs-5 word-spacing-2px text-primary">حالت</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top">
              <?php
              $select = "SELECT * FROM `teacher`  ORDER BY id DESC";
              $result = mysqli_query($conn, $select);
              if (mysqli_num_rows($result) > 0) {
                $no = 1;
                // output data of each row
                while ($item = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $item['register_num'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $item['tea_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $item['phone'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $item['salary'] ?></p>
                    </td>
                    <td>
                      <?php
                      if ($item['status'] === 'فعال') {
                        echo '<p class="mb-0 fs-2 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $item['status'] . '</p>';
                      } else {
                        echo '<p class="mb-0 fs-2 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $item['status'] . '</p>';
                      }
                      ?>
                    </td>

                    <td>
                      <div class="action-btn">
                        <a href="tc-profile.php?tc_profile=<?= $item['id'] ?>" class="text-info ms-1">
                          <i class="ti ti-eye fs-6"></i>
                        </a>
                        <a href="tc-admission-Edit.php?edit_teacher=<?= $item['id'] ?>" class="text-success">
                          <i class="ti ti-edit fs-6"></i>
                        </a>
                        <button type="button" class="border-0  rounded-2 p-0 py-1 " data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id'] ?>">
                          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                        </button>
                        <!-- ===================delete institute page modal================== -->
                        <div class="modal fade" id="deleteModal<?= $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                <a href="code.php?teacher_delete=<?= $item['id'] ?>">
                                  <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo '<tr>
                      <td class="text-danger">استاد موجود نہں ہے </td>
                      </tr>';
              }
              ?>
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
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>