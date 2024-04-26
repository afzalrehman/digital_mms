<?php
session_start();
include "../includes/config.php";
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
              <?php
              $fetch_announce = "SELECT * FROM annoucements";
              $fetch_announce_result = mysqli_query($conn, $fetch_announce);

              if (mysqli_num_rows($fetch_announce_result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($fetch_announce_result)) {
              ?>
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4"><?= $row['announce_depart'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row['to_id'] ?></p>
                    </td>

                    <td>
                      <p class="mb-0 fs-2 inter"><?= $row['announce_date'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row['announce_subjict'] ?></p>
                    </td>
                    <td style="white-space: pre-line">
                      <p class="mb-0 fs-4 word-spacing-2px "><?= $row['announce_comment'] ?></p>
                    </td>
                    <td>
                      <div class="action-btn">
                        <a href="?announce_delete=<?= $row['id'] ?>" class="text-dark ms-1">
                          <i class="ti ti-trash fs-6 text-danger"></i>
                        </a>
                        <a href="annoucement.php?announce_view=<?= $row['id'] ?>" class="text-info ms-1">
                          <i class="ti ti-eye fs-6"></i>
                        </a>
                        <!-- <a href="javascript:void(0)" class="text-success">
                      <i class="ti ti-edit fs-6"></i>
                    </a> -->
                      </div>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo '<tr>
                        <td class="text-danger">سال موجود نہں ہے </td>
                        </tr>';
              }
              ?>
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