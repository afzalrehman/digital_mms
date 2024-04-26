<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<style>
    .preview-image {
        max-width: 100%;
        height: 400px;
        margin-top: 0.5rem;
    }
</style>
<?php
if (isset($_GET['dokan_view_id'])) {
    $id = $_GET['dokan_view_id'];
    $select_query = "SELECT * FROM `dokan` WHERE `dokan_id` = '$id'";
    $result = mysqli_query($conn, $select_query);
    if ($result->num_rows > 0) {
        $fetch = mysqli_fetch_assoc($result);
?>
        <style>
            .box_mad_vewi:hover {
                box-shadow: 1px 1px 5px #8C7EFD !important;
                transition: all 1s;
            }
        </style>
        <!-- Main Content (Start) -->
        <div class="container-fluid">
            <!-- Main Content Header Card (Start) -->
            <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="my-3 fs-8 text-primary">دوکان کی معلومات</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                                    </li>
                                    <li class="breadcrumb-item fs-4" aria-current="page">
                                        دوکان کی معلومات
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
            <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
                <div class="card-body px-4 py-3">
                    <!-- Start -->
                    <!-- Teacher All Tab (Start) -->
                    <ul class="nav nav-pills user-profile-tab mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
                        <!-- Teacher Profile Tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                                <i class="ti ti-user-circle me-2 fs-6 "></i>
                                <span class="d-none d-md-block fs-4">دوکان کی معلومات</span>
                            </button>
                        </li>
                        <!-- Teacher Salary Tab -->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-salary-tab" data-bs-toggle="pill" data-bs-target="#pills-salary" type="button" role="tab" aria-controls="pills-friends" aria-selected="false">
                                <i class="ti ti-currency-dollar me-2 fs-6 "></i>
                                <span class="d-none d-md-block fs-4">کرایہ</span>
                            </button>
                        </li>

                    </ul>
                    <!-- Teacher All Tab (End) -->
                    <!-- / End -->
                </div>
            </div>
            <!-- Main Content Header Card (End) -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Teacher Profile Tab Content -->
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="card box_mad_vewi px-4">
                        <div class="row border-bottom jameel-kasheeda">
                            <div class="col-lg-6 ">
                                <h5 class="pb-2 my-4 fs-7">تفصیلات</h5>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button class="btn btn-primary pb-1 my-4 fs-3 "> پرنٹ</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class=" me-2 jameel-regular">دکان کا نام :</span>
                                            <span class="fs-6"><?= $fetch['dokan_name'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">دکان کا پتہ:</span>
                                            <span class="fs-6"><?= $fetch['dokan_address'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">دکان کے مالک کا نام :</span>
                                            <span class="fs-6"><?= $fetch['dokan_owner_name'] ?></span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2"> دکان کی قسم :</span>
                                            <span class=" fs-6"><?= $fetch['dokan_type'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">دکان کا کرایہ :</span>
                                            <span class=" fs-6"><?= $fetch['dokan_rent'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card mt-3 box_mad_vewi px-3">
                        <div class="container">
                            <h5 class="pb-2 border-bottom my-4 ">دکان کے دستاویزات :</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <img src="../media/dokan/<?= $fetch['dokan_lease'] ?>" class="preview-image mt-2" alt="">
                                        </li>
                                        <li class="mb-4">
                                            <img src="../media/dokan/<?= $fetch['dokan_license'] ?>" class="preview-image mt-2" alt="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <img src="../media/dokan/<?= $fetch['owner_cnic'] ?>" class="preview-image mt-2" alt="">
                                        </li>
                                        <li class="mb-4">
                                            <img src="../media/dokan/<?= $fetch['owner_image'] ?>" class="preview-image mt-2" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Teacher Salary Tab Content -->
                <div class="tab-pane fade" id="pills-salary" role="tabpanel" aria-labelledby="pills-salary-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="mb-7 mb-sm-0 d-flex align-items-center">
                                        <h5 class="card-title fs-8 text-primary">کرایہ</h5>
                                        <div class="d-flex align-items-center ms-auto">
                                            <input type="month" class="form-control w-auto mb-3 inter fs-2 cursor-pointer" id="transaction_image" name="transaction_image">
                                        </div>
                                    </div>
                                    <div class="table-responsive text-center py-9">
                                        <table class="table align-middle stylish-table text-nowrap mb-0">
                                            <thead>
                                                <tr class="fw-semibold">
                                                    <th class="fs-6 word-spacing-2px">#</th>
                                                    <th class="fs-6 word-spacing-2px">مہینہ</th>
                                                    <th class="fs-6 word-spacing-2px">رقم</th>
                                                    <th class="fs-6 word-spacing-2px">حالت</th>
                                                    <th class="fs-6 word-spacing-2px">انتخاب کریں</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border-top">
                                                <tr>
                                                    <td>
                                                        <p class="mb-0 fs-2 inter">1</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-4 word-spacing-2px">جنوری</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-2 inter">1,500</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-light-success text-success fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                                            کیا</span>
                                                    </td>
                                                    <td>
                                                        <div class="action-btn">
                                                            <a href="javascript:void(0)" class="text-dark ms-1">
                                                                <i class="ti ti-trash fs-6 text-danger"></i>
                                                            </a>
                                                            <!-- <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a> -->
                                                            <a href="javascript:void(0)" class="text-success">
                                                                <i class="ti ti-edit fs-6"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="mb-0 fs-2 inter">2</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-4 word-spacing-2px">فروری</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 fs-2 inter">500</p>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-light-danger text-danger fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                                            نہیں کیا</span>
                                                    </td>
                                                    <td>
                                                        <div class="action-btn">
                                                            <a href="javascript:void(0)" class="text-dark ms-1">
                                                                <i class="ti ti-trash fs-6 text-danger"></i>
                                                            </a>
                                                            <!-- <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a> -->
                                                            <a href="javascript:void(0)" class="text-success">
                                                                <i class="ti ti-edit fs-6"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Teacher Profile  (End) -->
            <!-- Teacher Profile (Start) -->

            <!-- Teacher Profile  (End) -->

            <!-- ==========print============= -->
            <div class="content-wrapper " hidden id="printable-content">
                <style>
                    .logo img {
                        width: 200px;
                        height: auto;
                    }

                    .main {
                        display: flex;
                        align-items: center;
                        margin-bottom: 20px;
                        font-family: Jameel-Kasheeda;
                    }

                    .logo {
                        margin-right: 20px;
                    }

                    .box {
                        text-align: center;
                        margin: 0 auto;
                        font-family: Jameel-Kasheeda;
                    }

                    h1,
                    h4 {
                        margin: 5px 0;
                        font-family: Jameel-Kasheeda;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        border: 1px solid #000;
                        font-family: Jameel-Kasheeda;
                    }

                    th,
                    td {
                        border: 1px solid #000;
                        padding: 10px;
                        text-align: left;
                        font-family: Jameel-Kasheeda;
                    }

                    th {
                        background-color: #f2f2f2;
                        font-family: Jameel-Kasheeda;
                    }

                    td {
                        background-color: #ffffff;
                        font-family: Jameel-Kasheeda;
                    }
                </style>


                <div class="main ">
                    <div class="logo">
                        <img src="../assets/images/hussiania.png" alt="">
                    </div>
                    <div class="box">
                        <h3>آمدنی</h3>
                        <h1>
                            <?php
                            $income_madarsa = explode(',', $fetch['madarsa_id']);
                            foreach ($income_madarsa as $incomes_madarsa) {
                                $seq_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$incomes_madarsa'");
                                $sec = mysqli_fetch_object($seq_query);
                                if ($sec) {
                                    echo $sec->madarsa_name;
                                }
                            }
                            ?>
                        </h1>
                        <h4>رسید نمبر :<?= $fetch['RegNumber'] ?></h4>
                    </div>

                </div>

                <table>
                    <thead>
                        <tr>
                            <th> دوکان کا نام</th>
                            <th>دینے والے کا نام </th>
                            <th>دیا یا نہیں</th>
                            <th>تاریخ </th>
                            <th>مہینہ</th>
                            <th>رقم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $fetch['expance_name'] ?></td>
                            <td><?= $fetch['resiveName'] ?></td>
                            <td><?= $fetch['pay_now'] ?></td>
                            <td><?= $fetch['expance_month'] ?></td>
                            <td><?= $fetch['expanceـdate'] ?></td>
                            <td><?= $fetch['expanceAmount'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- ===========print and ============= -->
    <?php
    }
} else {
    echo '<tr>
<p class="text-danger">ڈیٹا موجود نہیں ہیں</p>
</tr>';
}
    ?>
    <!-- Main Content (End) -->
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        </div>
        <script>
            function printContent() {
                var printWindow = window.open('', '', 'height=400,width=600');
                printWindow.document.write('<html dir="rtl"><head><title>مدرسہ حسینیہ</title>');
                // Include Bootstrap CSS
                printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<style>@font-face { font-family: "Jameel-Kasheeda"; src: url("../assets/font/urdu/Jameel-Noori-Nastaleeq-Kasheeda.ttf"); }</style>');
                printWindow.document.write(document.getElementById('printable-content').innerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            }
        </script>
        <?php
        include "inc/mobileNavbar.php";
        include "inc/footer.php";
        ?>