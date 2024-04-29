<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";

// ====================================== dokan-fees-form.php =========================================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $st_id = mysqli_real_escape_string($conn, $_POST['st_id']);
    $fees_type_id = mysqli_real_escape_string($conn, $_POST['fees_type_id']);
    $fees_type_amount = mysqli_real_escape_string($conn, $_POST['fees_type_amount']);
    $pay_admi_fees = mysqli_real_escape_string($conn, $_POST['pay_admi_fees']);
    $pay_fees_date = mysqli_real_escape_string($conn, $_POST['pay_fees_date']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $trx_id = mysqli_real_escape_string($conn, $_POST['trx_id']);
    $transaction_number = mysqli_real_escape_string($conn, $_POST['transaction_number']);

    // check if remaining amount is less than or equal to 0
    $remaining_fees = $fees_type_amount - $pay_admi_fees;
    if ($remaining_fees < 0) {
        $remaining_fees = 0;
    }

    // check if pay amount greater than admi fees
    if ($pay_admi_fees > $fees_type_amount) {
        redirect("st-fees-form", " داخلہ فیس کی رقم ادائیگی کی رقم سے زیادہ نہیں ہو سکتی");
        exit();
    }

    // check month and year
    $pay_fees_date = date('Y-m-d', strtotime($pay_fees_date));
    $pay_month = date('m', strtotime($pay_fees_date));
    $pay_year = date('Y', strtotime($pay_fees_date));
    $check_month_query = "SELECT * FROM `student_fees` WHERE `st_id` = '$st_id' AND `st_pay_fees_date` LIKE '$pay_year-$pay_month%'";
    $check_month_result = $conn->query($check_month_query);

    if ($check_month_result->num_rows > 0) {
        redirect("st-fees-form", "اس مہینے کا کرایہ پہلے ہی ادا کر چکا ہے۔");
        exit();
    }

    // created by
    $created_by = "Abu Hammad";
    $created_date = date('Y-m-d');
    $pay_fees_date = date('Y-m-d');

    // image upload
    $image = rand(111111111, 999999999) . '_' . $_FILES['transaction_image']['name'];
    move_uploaded_file($_FILES['transaction_image']['tmp_name'], '../media/std-tc/' . $image);

    // insert data into fees table
    $insert_query = "INSERT INTO `student_fees`(`st_id`, `fees_type_id`, `st_pay_fees`, `st_pay_fees_date`, `st_remaining_fees`, 
    `st_payment_method`, `st_trx_id`, `st_trx_number`, `st_trx_image`, `created_by`, `created_date`) 
    VALUES ('$st_id', '$fees_type_id','$pay_admi_fees', '$pay_fees_date', '$remaining_fees',
    '$payment_method','$trx_id','$transaction_number','$image','$created_by','$created_date')";

    $insert_result = $conn->query($insert_query);

    if ($insert_result) {
        redirect("st-fees-form", "فیس ادا کر دیا ہے۔");
        exit();
    } else {
        redirect("st-fees-form", "فیس ادا نہیں ھواں");
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
                    <h4 class="my-3 fs-8 text-primary word-spacing-2px">فیس فارم</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                            </li>
                            <li class="breadcrumb-item fs-4" aria-current="page">
                            فیس فارم
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
        <form action="" method="POST" enctype="multipart/form-data" id="stFeesForm">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <label for="st_roll_no" class=" fs-5 mb-1">رجسٹریشن نمبر</label>
                                <select class="form-select fs-3" id="st_roll_no" name="st_roll_no">
                                    <option value="">------</option>
                                </select>
                                <select class="form-select fs-3" id="st_id" name="st_id" style="display: none">
                                </select>
                                <span class="error text-danger inter" id="st_roll_no_err"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="st_name" class=" fs-5 mb-1">نام</label>
                                <select class="form-control fs-3" id="st_name" name="st_name">
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="guar_name" class=" fs-5 mb-1">سرپرست کا نام</label>
                                <select class="form-control fs-3" id="guar_name" name="guar_name">
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <label class="fs-5 mb-1">مدرسہ </label>
                                <select class="form-control fw-semibold fs-3 jameel-kasheeda" id="madarasa" name="madarasa">
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="fs-5 mb-1">شعبہ </label>
                                <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="department" id="department">
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="fs-5 mb-1">کلاس</label>
                                <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="class" id="madarsaClass">
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="fs-5 mb-1" for="section">سیکشن منتخب کریں</label>
                                <select id="section" name="section" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="fees_type_name" class="fs-5 mb-1">فیس کا نام</label>
                                <select class="form-select fs-3" name="fees_type_id" id="fees_type_name">
                                    <option value="">------</option>
                                </select>
                                <span class="text-danger error" id="fees_type_name_err"></span>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="fees_type_amount" class="fs-5 mb-1">کل فیس</label>
                                <select class="form-control fs-3" name="fees_type_amount" id="fees_type_amount">
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <label for="pay_admi_fees" class=" fs-5 mb-1">فیس کی ادائیگی</label>
                                <input type="text" class="form-control fs-3" id="pay_admi_fees" name="pay_admi_fees" placeholder="فیس ادائیگی">
                                <span class="error text-danger inter" id="pay_admi_fees_err"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="pay_fees_date" class=" fs-5 mb-1">فیس کی تاریخ</label>
                                <input type="date" class="form-control fs-3" id="pay_fees_date" name="pay_fees_date" placeholder="فیس کی تاریخ" value="<?= date('Y-m-d') ?>">
                                <span class="error text-danger inter" id="pay_fees_date_err"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="payment_method" class=" fs-5 mb-1">فیس کا طریقہ</label>
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
                            <button type="submit" name="st_fees_insert" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
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
<script src="../assets/js/error/stFeesFormError.js"></script>
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
                    if (type === "st_roll_no_Data") {
                        $('#st_roll_no').append(data);
                    } else if (type === "st_id_Data") {
                        $('#st_id').html(data);
                    } else if (type === "st_name_Data") {
                        $('#st_name').html(data);
                    } else if (type === "guar_name_Data") {
                        $('#guar_name').html(data);
                    } else if (type === "madarasa_Data") {
                        $('#madarasa').html(data);
                    } else if (type === "department_Data") {
                        $('#department').html(data);
                    } else if (type == "madarsaClass_Data") {
                        $('#madarsaClass').html(data);
                    } else if (type === "section_data") {
                        $('#section').html(data);
                    } else if (type === 'fees_type_name_Data') {
                        $('#fees_type_name').append(data);
                    } else if (type === 'fees_type_amount_Data') {
                        $('#fees_type_amount').html(data);
                    }
                }
            });
        }

        loadData("st_roll_no_Data");
        loadData("fees_type_name_Data");

        $("#st_roll_no").on("change", function() {
            var stIdData = $("#st_roll_no").val();
            if (stIdData != "") {
                loadData("st_id_Data", stIdData);
            } else {
                $('#st_id').html("");
            }
        });

        $("#st_roll_no").on("change", function() {
            var stNameData = $("#st_roll_no").val();
            if (stNameData != "") {
                loadData("st_name_Data", stNameData);
            } else {
                $('#st_name').html("");
            }
        });

        $("#st_roll_no").on("change", function() {
            var guarNameData = $("#st_roll_no").val();
            if (guarNameData != "") {
                loadData("guar_name_Data", guarNameData);
            } else {
                $('#guar_name').html("");
            }
        });

        $("#st_roll_no").on("change", function() {
            var guarCnicData = $("#st_roll_no").val();
            if (guarCnicData != "") {
                loadData("madarasa_Data", guarCnicData);
            } else {
                $('#madarasa').html("");
            }
        });

        $("#st_roll_no").on("change", function() {
            var admiFeesData = $("#st_roll_no").val();
            if (admiFeesData != "") {
                loadData("department_Data", admiFeesData);
            } else {
                $('#department').html("");
            }
        });
        $("#st_roll_no").on("change", function() {
            var guarCnicData = $("#st_roll_no").val();
            if (guarCnicData != "") {
                loadData("madarsaClass_Data", guarCnicData);
            } else {
                $('#madarsaClass').html("");
            }
        });

        $("#st_roll_no").on("change", function() {
            var admiFeesData = $("#st_roll_no").val();
            if (admiFeesData != "") {
                loadData("section_data", admiFeesData);
            } else {
                $('#section').html("");
            }
        });

        $("#fees_type_name").on("change", function() {
            var feesTypeAmountData = $("#fees_type_name").val();
            if (feesTypeAmountData != "") {
                loadData("fees_type_amount_Data", feesTypeAmountData);
            } else {
                $('#fees_type_amount').html("");
            }
        });




    });
</script>