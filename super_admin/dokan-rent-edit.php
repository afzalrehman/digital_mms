<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";

// ====================================== dokan-rent-form.php =========================================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $rent_id = mysqli_real_escape_string($conn, $_POST['rent_id']);
  $dokan_id = mysqli_real_escape_string($conn, $_POST['dokan_id']);
  $dokan_rent = mysqli_real_escape_string($conn, $_POST['dokan_rent']);
  $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
  $remaining_rent = mysqli_real_escape_string($conn, $_POST['remaining_rent']);
  $pay_remaining_rent = mysqli_real_escape_string($conn, $_POST['pay_remaining_rent']);
  $trx_id = mysqli_real_escape_string($conn, $_POST['trx_id']);
  $trx_number = mysqli_real_escape_string($conn, $_POST['transaction_number']);


  // check if remaining amount is less than or equal to 0
  $remaining_rent2 = $remaining_rent - $pay_remaining_rent;
  if ($remaining_rent2 < 0) {
    $remaining_rent2 = 0;
  }

  // check if pay amount greater than dokan rent
  if ($pay_remaining_rent > $remaining_rent) {
    redirect("dokan-rent-details", " تنخواہ کی رقم تنخواہ کی رقم سے زیادہ نہیں ہو سکتی");
    exit();
  }

  // created by
  $updated_by = "Abu Hammad";
  $updated_date = date('Y-m-d');
  $remaining_rent_date = date('Y-m-d');

  // Check if an image was uploaded
  $image = '';
  if (!empty($_FILES['transaction_image']['name'])) {
      $image = mysqli_real_escape_string($conn, rand(111111111, 999999999) . '_' . $_FILES['transaction_image']['name']);
      move_uploaded_file($_FILES['transaction_image']['tmp_name'], '../media/images/' . $image);
  }

  // insert data into rent table
  $insert_query = "UPDATE `shop_rent` SET 
  `dokan_id`='$dokan_id',`pay_rent`='$dokan_rent + $pay_remaining_rent',`remaining_rent`='$remaining_rent2',
  `remaining_rent_date`='$remaining_rent_date',`payment_method`='$payment_method',`trx_id`='$trx_id',`trx_number`='$trx_number',
  `updated_by`='$updated_by',`updated_date`='$updated_date'";

  if (!empty($image)) {
      $insert_query .= ",`trx_image` = '$image'";
  }

  $insert_query .= " WHERE `rent_id` = '$rent_id'";

  $insert_result = $conn->query($insert_query);

  if ($insert_result) {
    redirect("dokan-rent-details", "دکان کا کرایہ اپ ڈیٹ ھوں گیا۔");
    exit();
  } else {
    redirect("dokan-rent-details", "دکان کا کرایہ اپ ڈیٹ نہیں ھواں");
    exit();
  }
}

// ====================================== Get Edit dokan-rent-edit =========================================
if (isset($_GET['dokan_rent_edit_id'])) {

  $dokan_rent_edit_id = mysqli_real_escape_string($conn, $_GET['dokan_rent_edit_id']);
  $edit_query = "SELECT rent_id, pay_rent, pay_rent_date, remaining_rent, payment_method, trx_id, trx_number, trx_image, 
  dokan.dokan_id, dokan.dokan_name, dokan.dokan_type, dokan.dokan_rent
  FROM shop_rent
  INNER JOIN dokan on dokan.dokan_id = shop_rent.dokan_id
  WHERE rent_id = '$dokan_rent_edit_id'";

  $edit_result = $conn->query($edit_query);

  if ($edit_result->num_rows > 0) {

    $edit_row = $edit_result->fetch_assoc();




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
        <form action="" method="POST" enctype="multipart/form-data" id="dokanRentForm">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row g-4">
                  <input type="text" hidden name="rent_id" value="<?= $edit_row['rent_id'] ?>">
                  <div class="col-lg-6">
                    <label for="dokan_name" class=" fs-5 mb-1">دکان کا نام</label>
                    <select class="form-select fs-3" id="dokan_name" name="dokan_id">
                      <option value="<?= $edit_row['dokan_id'] ?>"><?= $edit_row['dokan_name'] ?></option>
                    </select>
                    <span class="error text-danger inter" id="dokan_name_err"></span>
                  </div>
                  <div class="col-lg-6">
                    <label for="dokan_type" class=" fs-5 mb-1">دکان کی قسم</label>
                    <select class="form-control fs-3" id="dokan_type">
                      <option value="<?= $edit_row['dokan_type'] ?>"><?= $edit_row['dokan_type'] ?></option>
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <label for="dokan_rent" class=" fs-5 mb-1">کل کرایہ</label>
                    <select class="form-control fs-3" id="dokan_rent" name="dokan_rent">
                      <option value="<?= $edit_row['dokan_rent'] ?>"><?= $edit_row['dokan_rent'] ?></option>
                    </select>
                  </div>
                  <div class="col-lg-6">
                    <label for="pay_amount" class=" fs-5 mb-1">کرایا اداکرو</label>
                    <input type="text" readonly class="form-control fs-3" id="pay_amount" name="pay_amount" placeholder="کرایا اداکرو" value="<?= $edit_row['pay_rent'] ?>">
                    <span class="error text-danger inter" id="pay_amount_err"></span>
                  </div>
                  <div class="col-lg-6">
                    <label for="pay_rent_date" class=" fs-5 mb-1">کرایہ کی تاریخ</label>
                    <input type="date" readonly class="form-control fs-3" id="pay_rent_date" name="pay_rent_date" placeholder="کرایہ کی تاریخ" value="<?= $edit_row['pay_rent_date'] ?>">
                    <span class="error text-danger inter" id="pay_rent_date_err"></span>
                  </div>
                  <div class="col-lg-6">
                    <label for="payment_method" class=" fs-5 mb-1">ادائیگی کا طریقہ</label>
                    <div class="input-group">
                      <select class="form-select fs-3" id="payment_method" name="payment_method" onchange="toggleFields()">
                        <option value="<?= $edit_row['payment_method'] ?>"><?= $edit_row['payment_method'] ?></option>
                        <!-- <option value="نقد رقم" <?php //if ($edit_row['payment_method'] == 'نقد رقم') echo 'selected' ?>>نقد رقم</option>
                        <option value="بینک ادائیگی" <?php //if ($edit_row['payment_method'] == 'بینک ادائیگی') echo 'selected' ?>>بینک ادائیگی</option>
                        <option value="ایزی پیسہ ادائیگی" <?php //if ($edit_row['payment_method'] == 'ایزی پیسہ ادائیگی') echo 'selected' ?>>ایزی پیسہ ادائیگی</option>
                        <option value="جاز کیش ادائیگی" <?php //if ($edit_row['payment_method'] == 'جاز کیش ادائیگی') echo 'selected' ?>>جاز کیش ادائیگی</option> -->
                      </select>
                    </div>
                    <span class="error text-danger inter" id="payment_method_err"></span>
                  </div>
                  <?php
                  if ($edit_row['remaining_rent'] != 0) {
                  ?>
                    <div class="col-lg-6">
                      <label for="remaining_rent" class=" fs-5 mb-1">باقی کرایہ</label>
                      <input type="text" readonly class="form-control fs-3" id="remaining_rent" name="remaining_rent" placeholder="باقی کرایہ" value="<?= $edit_row['remaining_rent'] ?>">
                    </div>
                    <div class="col-lg-6">
                      <label for="pay_remaining_rent" class=" fs-5 mb-1">باقی کرایہ ادائیگی</label>
                      <input type="text" class="form-control fs-3" id="pay_remaining_rent" name="pay_remaining_rent" placeholder="ادائیگی باقی کرایہ">
                      <span class="error text-danger inter" id="pay_remaining_rent_err"></span>
                    </div>
                  <?php
                  } 
                  if ($edit_row['trx_id'] != "" && $edit_row['trx_number'] != "" && $edit_row['trx_image'] != "") {
                  ?>
                    <div class="col-lg-6" id="trs_id_wrapper">
                      <label for="trx_id" class=" fs-5 mb-1">ٹرانزیکشن ID</label>
                      <input type="text" class="form-control fs-3" id="trx_id" name="trx_id" placeholder="ٹرانزیکشن ID" value="<?= $edit_row['trx_id'] ?>">
                    </div>
                    <div class="col-lg-6" id="transaction_number_wrapper">
                      <label for="transaction_number" class=" fs-5 mb-1">ٹرانزیکشن فون نمبر</label>
                      <input type="text" class="form-control fs-3" id="transaction_number" name="transaction_number" placeholder="ٹرانزیکشن فون نمبر" value="<?= $edit_row['trx_number'] ?>">
                    </div>
                    <div class="col-lg-6" id="transaction_image_wrapper">
                      <label for="transaction_image" class=" fs-5 mb-1">ٹرانزیکشن تصویر</label>
                      <input type="file" class="form-control fs-3" id="transaction_image" name="transaction_image" placeholder="ٹرانزیکشن تصویر">
                    </div>

                  <?php
                  }
                  ?>

                </div>
                <!-- Submit Button -->
                <div class="col-md-12 mt-4 jameel-kasheeda">
                  <button type="submit" name="shop_rent_insert" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
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
<?php

  }
}
?>

<script>
  function toggleFields() {
    var paymentMethod = document.getElementById("payment_method").value;
    var trsIdWrapper = document.getElementById("trs_id_wrapper");
    var transactionNumberWrapper = document.getElementById("transaction_number_wrapper");
    var transactionImageWrapper = document.getElementById("transaction_image_wrapper");


    if (paymentMethod === "بینک ادائیگی") {
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
<script src="../assets/js/error/dokanRentFormError.js"></script>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>

<!-- <script>
  $(document).ready(function() {
    function loadData(type, id) {
      $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {
          type: type,
          id: id
        },
        dataType: 'html',
        success: function(data) {
          if (type === "dokan_name_Data") {
            $('#dokan_name').append(data);
          } else if (type === "dokan_type_Data") {
            $('#dokan_type').html(data);
          } else if (type === "dokan_rent_Data") {
            $('#dokan_rent').html(data);
          }
        }
      });
    }

    loadData("dokan_name_Data");

    $("#dokan_name").on("change", function() {
      var incomeData = $("#dokan_name").val();
      if (incomeData != "") {
        loadData("dokan_type_Data", incomeData);
      } else {
        $('#dokan_type').html("");
      }
    });

    $("#dokan_name").on("change", function() {
      var incomeData = $("#dokan_name").val();
      if (incomeData != "") {
        loadData("dokan_rent_Data", incomeData);
      } else {
        $('#dokan_rent').html("");
      }
    });


  });
</script> -->