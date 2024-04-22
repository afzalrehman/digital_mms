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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">دوکان فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                دوکان فارم
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

  <!-- Income Form (Start) -->
  <div class="row">

    <!-- User Info -->
    <form action="code2.php" method="POST" enctype="multipart/form-data">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row g-4">
              <div class="col-lg-6">
                <label for="dokanName" class=" fs-5 mb-1">دکان کا نام</label>
                <input type="text" class="form-control fs-3" id="dokanName" name="dokan_name" placeholder="دکان کا نام">
                <span class="error text-danger inter" id="dokan_name_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="dokanType" class=" fs-5 mb-1">دکان کی قسم</label>
                <input type="text" class="form-control fs-3" id="dokanType" name="dokan_type" placeholder="دکان کی قسم">
              </div>
              <div class="col-lg-6">
                <label for="total_amount" class=" fs-5 mb-1">کل کرایہ</label>
                <input type="text" class="form-control fs-3" id="total_amount" name="total_amount" placeholder="کل کرایہ">
                <span class="error text-danger inter" id="total_amount_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="pay_amount" class=" fs-5 mb-1">کرایا اداکرو</label>
                <input type="text" class="form-control fs-3" id="pay_amount" name="pay_amount" placeholder="کرایا اداکرو">
                <span class="error text-danger inter" id="pay_amount_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="payment_method" class=" fs-5 mb-1">ادائیگی کا طریقہ</label>
                <div class="input-group">
                  <select class="form-select fs-3" id="payment_method" name="payment_method" onchange="toggleFields()">
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                    <option value="Easypaisa">Easypaisa</option>
                    <option value="JazzCash">JazzCash</option>
                  </select>
                </div>
                <span class="error text-danger inter" id="payment_method_err"></span>
              </div>
              <div class="col-lg-6" id="trs_id_wrapper" style="display: none">
                <label for="trx_id" class=" fs-5 mb-1">ٹرانزیکشن ID</label>
                <input type="text" class="form-control fs-3" id="trx_id" name="trx_id" placeholder="ٹرانزیکشن ID">
              </div>
              <div class="col-lg-6" id="transaction_number_wrapper" style="display: none">
                <label for="transaction_number" class=" fs-5 mb-1">ٹرانزیکشن فون نمبر</label>
                <input type="text" class="form-control fs-3" id="transaction_number" name="transaction_number" placeholder="ٹرانزیکشن فون نمبر">
              </div>
              <div class="col-lg-6" id="transaction_image_wrapper" style="display: none">
                <label for="transaction_image" class=" fs-5 mb-1">ٹرانزیکشن تصویر</label>
                <input type="text" class="form-control fs-3" id="transaction_image" name="transaction_image" placeholder="ٹرانزیکشن تصویر">
              </div>

            </div>
            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
              <button type="submit" name="dokan_insert" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
            </div>
            <!-- Submit Button -->
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Income Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>


<script>
  function toggleFields() {
    var paymentMethod = document.getElementById("payment_method").value;
    var trsIdWrapper = document.getElementById("trs_id_wrapper");
    var transactionNumberWrapper = document.getElementById("transaction_number_wrapper");
    var transactionImageWrapper = document.getElementById("transaction_image_wrapper");


    if (paymentMethod === "Bank") {
      trsIdWrapper.style.display = "none";
      transactionNumberWrapper.style.display = "none";
      transactionImageWrapper.style.display = "block";
    } else if (paymentMethod === "Cash") {
      trsIdWrapper.style.display = "none";
      transactionNumberWrapper.style.display = "none";
      transactionImageWrapper.style.display = "none";
    } else {
      trsIdWrapper.style.display = "block";
      transactionNumberWrapper.style.display = "block";
      transactionImageWrapper.style.display = "block";
    }

  }
</script>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>