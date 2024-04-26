<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";

// ====================================== dokan-rent-form.php =========================================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $dokan_id = mysqli_real_escape_string($conn, $_POST['dokan_id']);
  $dokan_rent = mysqli_real_escape_string($conn, $_POST['dokan_rent']);
  $pay_amount = mysqli_real_escape_string($conn, $_POST['pay_amount']);
  $pay_rent_date = mysqli_real_escape_string($conn, $_POST['pay_rent_date']);
  $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
  $trx_id = mysqli_real_escape_string($conn, $_POST['trx_id']);
  $trx_number = mysqli_real_escape_string($conn, $_POST['transaction_number']);

  // check if remaining amount is less than or equal to 0
  $remaining_rent = $dokan_rent - $pay_amount;
  if ($remaining_rent < 0) {
    $remaining_rent = 0;
  }

  // check if pay amount greater than dokan rent
  if ($pay_amount > $dokan_rent) {
    redirect("dokan-rent-form", " تنخواہ کی رقم تنخواہ کی رقم سے زیادہ نہیں ہو سکتی");
    exit();
  }

  // check month and year
  $pay_rent_date = date('Y-m-d', strtotime($pay_rent_date));
  $pay_month = date('m', strtotime($pay_rent_date));
  $pay_year = date('Y', strtotime($pay_rent_date));
  $check_month_query = "SELECT * FROM `shop_rent` WHERE `dokan_id` = '$dokan_id' AND `pay_rent_date` LIKE '$pay_year-$pay_month%'";
  $check_month_result = $conn->query($check_month_query);

  if ($check_month_result->num_rows > 0) {
    redirect("dokan-rent-form", "اس مہینے کا کرایہ پہلے ہی ادا کر چکا ہے۔");
    exit();
  }

  // created by
  $created_by = "Abu Hammad";
  $created_date = date('Y-m-d');

  // image upload
  $image = rand(111111111, 999999999) . '_' . $_FILES['transaction_image']['name'];
  move_uploaded_file($_FILES['transaction_image']['tmp_name'], '../media/dokan/' . $image);

  // insert data into rent table
  $insert_query = "INSERT INTO `shop_rent`(`dokan_id`, `pay_rent`, `pay_rent_date`, `remaining_rent`,`payment_method`, `trx_id`, `trx_number`, `trx_image`, 
  `created_by`, `created_date`) 
  VALUES ('$dokan_id','$pay_amount','$pay_rent_date', '$remaining_rent','$payment_method','$trx_id','$trx_number','$image',
  '$created_by','$created_date')";
  $insert_result = $conn->query($insert_query);

  if ($insert_result) {
    redirect("dokan-rent-form", "دکان کا کرایہ ادا کر دیا ہے۔");
    exit();
  } else {
    redirect("dokan-rent-form", "دکان کا کرایہ ادا نہیں ھواں");
    exit();
  }
}


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
              <div class="col-lg-6">
                <label for="dokan_name" class=" fs-5 mb-1">دکان کا نام</label>
                <select class="form-select fs-3" id="dokan_name" name="dokan_id">
                  <option value="">------</option>
                </select>
                <span class="error text-danger inter" id="dokan_name_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="dokan_type" class=" fs-5 mb-1">دکان کی قسم</label>
                <select class="form-control fs-3" id="dokan_type">
                </select>
              </div>
              <div class="col-lg-6">
                <label for="dokan_rent" class=" fs-5 mb-1">کل کرایہ</label>
                <select class="form-control fs-3" id="dokan_rent" name="dokan_rent">
                </select>
              </div>
              <div class="col-lg-6">
                <label for="pay_amount" class=" fs-5 mb-1">کرایا اداکرو</label>
                <input type="text" class="form-control fs-3" id="pay_amount" name="pay_amount" placeholder="کرایا اداکرو">
                <span class="error text-danger inter" id="pay_amount_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="pay_rent_date" class=" fs-5 mb-1">کرایہ کی تاریخ</label>
                <input type="date" class="form-control fs-3" id="pay_rent_date" name="pay_rent_date" placeholder="کرایہ کی تاریخ" value="<?= date('Y-m-d') ?>">
                <span class="error text-danger inter" id="pay_rent_date_err"></span>
              </div>
              <div class="col-lg-6">
                <label for="payment_method" class=" fs-5 mb-1">ادائیگی کا طریقہ</label>
                <div class="input-group">
                  <select class="form-select fs-3" id="payment_method" name="payment_method" onchange="toggleFields()">
                    <option value="نقد رقم">نقد رقم</option>
                    <option value="بینک ادائیگی">بینک ادائیگی</option>
                    <option value="ایزی پیسہ ادائیگی">ایزی پیسہ ادائیگی</option>
                    <option value="جاز کیش ادائیگی">جاز کیش ادائیگی</option>
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
                <input type="file" class="form-control fs-3" id="transaction_image" name="transaction_image" placeholder="ٹرانزیکشن تصویر">
              </div>

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
    } else if (paymentMethod === "نقد رقم") {
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

<script>
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
</script>