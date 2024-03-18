<?php
session_start();
include_once("../includes/config.php");
include_once("../includes/function.php");
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
          <h4 class="my-3 fs-8 text-primary">مدرسہ کی تفصیلات</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
              مدرسہ کی تفصیلات
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

  <!-- User Search Form (Start) -->
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="تلاش کریں &nbsp;..." />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-8 col-xl-9 text-end mt-3 mt-md-0 jameel-kasheeda">
        <a href="user-form.html" class="btn btn-info fw-semibold word-spacing-2px fs-4">
          ایڈ کریں
        </a>
      </div>
    </div>
  </div>
  <!-- User Search Form (End) -->

  <!-- User Details List (Start) -->
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
                <!-- <th class="fs-5 word-spacing-2px text-primary">رجسٹریشن نمبر</th> -->
                <th class="fs-5 word-spacing-2px text-primary">نام</th>
                <th class="fs-5 word-spacing-2px text-primary">ای میل</th>
                <th class="fs-5 word-spacing-2px text-primary">یوزَر نام</th>
                <th class="fs-5 word-spacing-2px text-primary">فون نمبر</th>
                <th class="fs-5 word-spacing-2px text-primary">یوزَر قسم</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <?php
            // fatch users & user_details from database and display them in table format to use inner join
            $select_user_query = "SELECT * FROM `users` INNER JOIN `user_details` ON users.user_id = user_details.user_id WHERE users.user_id = 1 OR users.user_id = 2";
            $select_user_result = mysqli_query($conn, $select_user_query);

            $no = 1;
            if (mysqli_num_rows($select_user_result) > 0) {
              while ($fatch_user = mysqli_fetch_assoc($select_user_result)) {
            ?>
                <tbody class="border-top">
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                    </td>
                    <!-- <td>
                      <p class="mb-0 fs-2 inter">#00281</p>
                    </td> -->
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $fatch_user['full_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $fatch_user['email'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $fatch_user['username'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $fatch_user['phone'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?php if ($fatch_user['user_id'] == 1) {
                                                              echo "سپر ایڈمن";
                                                            } elseif ($fatch_user['user_id'] == 2) {
                                                              echo "ایڈمن";
                                                            } 
                                                            ?></p>
                    </td>
                    <td>
                      <div class="action-btn">
                        <a href="javascript:void(0)" class="text-dark ms-1">
                          <i class="ti ti-trash fs-6 text-danger"></i>
                        </a>
                        <a href="user-edit.php?user_edit=<?= $fatch_user['user_id'] ?>" class="text-success">
                          <i class="ti ti-edit fs-6"></i>
                        </a>
                        <a href="user-view-profile.php?user_view_profile=<?= $fatch_user['user_id'] ?>" class="text-primary">
                          <i class="ti ti-eye fs-6"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
            <?php

              }
            } else {
              echo "<h3 class='text-center'>No User Found</h3>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Student Details List (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>


<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>