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
if (isset($_GET['dokan_rent_view_id'])) {
    $rent_id = mysqli_real_escape_string($conn, $_GET['dokan_rent_view_id']);
    $select_query = "SELECT rent_id, pay_rent, pay_rent_date, remaining_rent, payment_method, trx_image, 
	dokan.dokan_name, dokan.dokan_owner_name, dokan.dokan_type, dokan.dokan_rent
    FROM `shop_rent` 
    INNER JOIN `dokan` ON `shop_rent`.`dokan_id` = `dokan`.`dokan_id` 
    WHERE `rent_id` = '$rent_id'";
    $result = mysqli_query($conn, $select_query);
    if ($result->num_rows > 0) {
        $fetch = mysqli_fetch_assoc($result);
?>
        <!-- Main Content (Start) -->
        <div class="container-fluid">
            <!-- Main Content Header Card (Start) -->
            <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="my-3 fs-8 text-primary">دوکان کرایہ کے معلومات</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                                    </li>
                                    <li class="breadcrumb-item fs-4" aria-current="page">
                                        دوکان کرایہ کے معلومات
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
            <!-- Teacher Profile (Start) -->
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
                                    <span class="jameel-regular me-2">دکان کے مالک کا نام :</span>
                                    <span class="fs-6"><?= $fetch['dokan_owner_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2"> دکان کی قسم :</span>
                                    <span class=" fs-6"><?= $fetch['dokan_type'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کل کرایہ :</span>
                                    <span class=" fs-6"><?= $fetch['dokan_rent'] ?></span>
                                </li>
                                <!-- <li class="mb-4">
                                    <span class="jameel-regular me-2">ٹرانزیکشن تصویر :</span>
                                    <span class=" fs-6"><img src="../media/dokan/<?php //$fetch['trx_image'] 
                                                                                    ?>" alt=""></span>
                                </li> -->

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کرایا اداکیا :</span>
                                    <span class=" fs-6"><?= $fetch['pay_rent'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">باقی کرایہ :</span>
                                    <span class=" fs-6"><?= $fetch['remaining_rent'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کرایہ کی تاریخ :</span>
                                    <span class=" fs-6"><?= $fetch['pay_rent_date'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ادائیگی کا طریقہ :</span>
                                    <span class=" fs-6"><?= $fetch['payment_method'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li class="mb-4">
                            <span class="jameel-regular me-2">ٹرانزیکشن تصویر :</span>
                                <img src="../media/dokan/<?= $fetch['trx_image'] ?>" class="preview-image mt-2" alt="<?= $fetch['dokan_name'] ?>">
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
                <a href="dokan-rent-details" class="btn btn-danger fw-semibold fs-5">بیک</a>
            </div>
            <!-- Submit Button -->
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