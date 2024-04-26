<?php
session_start();
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>

<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">تعلیمی سال ایڈکریں</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                مدرسہ ایڈکریں
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

  <!-- madarasa add Form (Start) -->
  <div class="row">
    <!-- Madarsa Info -->
    <div class="col-12">
      <div class="card">
        <div class="border-bottom title-part-padding mt-3">
          <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ تعلیمی سال کے معلومات</h4>
        </div>
        <div class="card-body">
          <form method="post" id="Batch" action="code.php">
            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="BatchMadd">
                  <option class="jameel-kasheeda" value="">مدرسہ سلیکٹ کریں</option>
                  <?php
                  $sql = "SELECT * FROM madarsa";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
                      <option class="jameel-kasheeda" value="<?=$row["madarsa_id"]?>"><?=$row["madarsa_name"]?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                <span class="text-danger BatchMadd"></span>
              </div>

              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std-area"> سال کا  نام<span class="text-danger fs-7">*</span></label>
                <input type="text" name="batch_name" id="name" class="form-control fw-semibold fs-3 " placeholder="سال کا  نام" />
                <span class="text-danger name"></span>
              </div>

              <div class="col-md-4">
                <label class="fs-5 mb-1" for="std-area">مدرسہ سال کا شروع تاریخ<span class="text-danger fs-7">*</span></label>
                <input type="date" name="start_date" id="StartDate" class="form-control fw-semibold fs-3 " placeholder="مدرسہ سال کا شروع تاریخ" />
                <span class="text-danger StartDate"></span>
              </div>

              <div class="col-md-4">
                <label class="fs-5 mb-1" for="std-area">مدرسہ سال کا آخری تاریخ<span class="text-danger fs-7">*</span></label>
                <input type="date" name="last_date" id="LastDate" class="form-control fw-semibold fs-3 " placeholder="مدرسہ سال کا آخری تاریخ" />
                <span class="text-danger LastDate"></span>
              </div>

              <div class="col-md-4">
                <label class="fs-5  mb-1" for="std-area">ایڈمیشن کا آخری تاریخ<span class="text-danger fs-7">*</span></label>
                <input type="date" name="admission_date" id="AddmissionLastDate" class="form-control fw-semibold fs-3" placeholder="ایڈمیشن کا آخری تاریخ" />
                <span class="text-danger AddmissionLastDate"></span>
              </div>

              <div class="col-md-12 mt-4 jameel-kasheeda">
                <button type="submit" id="submit" name="BatchBtn" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Submit Button -->
  </div>
</div>
</div>
<!-- Student Admission Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/batch.js"></script>