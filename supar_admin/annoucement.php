<?php
session_start();
include "../includes/function.php";
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
          <h4 class="my-3 fs-8 text-primary">اعلان </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                اعلان
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

  <?php
  if (isset($_GET['announce_view'])) {
    $view_id = mysqli_real_escape_string($conn, $_GET['announce_view']);
    $select_query = mysqli_query($conn, "SELECT * FROM `annoucements` WHERE `id` = '$view_id'");

    if (mysqli_num_rows($select_query) > 0) {
      while ($row = mysqli_fetch_assoc($select_query)) {

  ?>

        <!-- Annoucement Form (Start) -->
        <div class="row">
          <!-- Annoucement Form -->
          <div class="col-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> اعلان</h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row g-4 mb-4">
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="fs-5 jameel-kasheeda fw-semibold">نام</div>
                      <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                      <div class="fs-5 jameel-kasheeda fw-semibold"><?= $row['to_id'] ?></div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="fs-5 jameel-kasheeda fw-semibold">شعبہ </div>
                      <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                      <div class="fs-5 jameel-kasheeda fw-semibold"><?= $row['announce_depart'] ?></div>
                    </div>
                  </div>
                  <div class="row g-4 mb-4">
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="fs-5 jameel-kasheeda fw-semibold">تاریخ </div>
                      <span class="fs-5">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                      <div class="fs-3 inter fw-semibold"><?= $row['announce_date'] ?></div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                      <div class="fs-5 jameel-kasheeda fw-semibold">اعلان</div>
                      <span class="fs-5 jameel-kasheeda">&nbsp;&nbsp; : &nbsp;&nbsp; </span>
                      <div class="fs-5 jameel-kasheeda fw-semibold"><?= $row['announce_for'] ?></div>
                    </div>
                  </div>
                  <hr>
                  <div class="row g-4">
                    <div class="col-md-12 d-flex align-items-center">
                      <div class="fs-7 jameel-kasheeda fw-semibold">اعلان</div>
                      <span class="fs-7 jameel-kasheeda">&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                      <div class="fs-6 jameel-kasheeda fw-semibold"><?= $row['announce_subjict'] ?></div>
                    </div>
                    <div class="col-md-12">
                      <div class="fs-5 jameel-kasheeda fw-semibold word-spacing-4px"><?= $row['announce_comment'] ?></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 jameel-kasheeda">
            <a href="annoucement-details.php" class="btn btn-danger fw-semibold fs-5">بیک</a>
          </div>
        </div>
  <?php
      }
    }
  }
  ?>
</div>
<!-- Annoucement Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>