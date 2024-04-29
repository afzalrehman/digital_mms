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
if (isset($_GET['st_fees_view_id'])) {
    $st_fees_id = mysqli_real_escape_string($conn, $_GET['st_fees_view_id']);
    $select_query = "SELECT student_fees.*, st_fees_types.*, students.st_roll_no, students.std_name, students.guar_name,
    madarsa.madarsa_name, department.department_name, madarsa_class.class_name, section.section_name
    FROM student_fees
    LEFT JOIN st_fees_types ON st_fees_types.fees_type_id = student_fees.fees_type_id 
    LEFT JOIN students ON students.st_id = student_fees.st_id
    LEFT JOIN madarsa on madarsa.madarsa_id = students.madarsa_id
    LEFT JOIN department on department.depart_id = students.depart_id
    LEFT JOIN madarsa_class on madarsa_class.id = students.mada_class_id
    LEFT JOIN section on section.sec_id = students.sec_id
    WHERE student_fees.st_fees_id = '$st_fees_id'";
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
                            <h4 class="my-3 fs-8 text-primary">فیس کی معلومات</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                                    </li>
                                    <li class="breadcrumb-item fs-4" aria-current="page">
                                        فیس کی معلومات
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
                <div class="row border-bottom mb-4 jameel-kasheeda">
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
                                    <span class=" me-2 jameel-regular">رجسٹریشن نمبر :</span>
                                    <span class="fs-6"><?= $fetch['st_roll_no'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">نام :</span>
                                    <span class="fs-6"><?= $fetch['std_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">سرپرست نام :</span>
                                    <span class=" fs-6"><?= $fetch['guar_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">مدرسہ :</span>
                                    <span class=" fs-6"><?= $fetch['madarsa_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">شعبہ :</span>
                                    <span class=" fs-6"><?= $fetch['department_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کلاس :</span>
                                    <span class=" fs-6"><?= $fetch['class_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">سیکشن :</span>
                                    <span class=" fs-6"><?= $fetch['section_name'] ?></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">فیس کا نام :</span>
                                    <span class=" fs-6"><?= $fetch['fees_type_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کل فیس :</span>
                                    <span class=" fs-6"><?= $fetch['fees_type_amount'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">فیس ادا کیا :</span>
                                    <span class=" fs-6"><?= $fetch['st_pay_fees'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">فیس کی تاریخ :</span>
                                    <span class=" fs-6"><?= $fetch['st_pay_fees_date'] ?></span>
                                </li>
                                <?php
                                if ($fetch['st_remaining_fees'] != 0) {
                                ?>
                                    <li class="mb-4">
                                        <span class="jameel-regular me-2">بقایا فیس :</span>
                                        <span class=" fs-6"><?= $fetch['st_remaining_fees'] ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ادائیگی کا طریقہ :</span>
                                    <span class=" fs-6"><?= $fetch['st_payment_method'] ?></span>
                                </li>
                                <?php
                                if ($fetch['st_trx_id'] != 0 && $fetch['st_trx_number'] != 0) {
                                ?>
                                    <li class="mb-4">
                                        <span class="jameel-regular me-2">ٹرانزیکشن ID :</span>
                                        <span class=" fs-6"><?= $fetch['st_trx_id'] ?></span>
                                    </li>
                                    <li class="mb-4">
                                        <span class="jameel-regular me-2">ٹرانزیکشن فون نمبر :</span>
                                        <span class=" fs-6"><?= $fetch['st_trx_number'] ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                                <!-- <li class="mb-4">
                                    <span class="jameel-regular me-2">ٹرانزیکشن ID :</span>
                                    <span class=" fs-6"><?= $fetch['st_trx_id'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ٹرانزیکشن فون نمبر :</span>
                                    <span class=" fs-6"><?= $fetch['st_trx_number'] ?></span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <?php
                    if ($fetch['st_payment_method'] === 'بینک ادائیگی') {
                    ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ٹرانزیکشن تصویر :</span>
                                    <img src="../media/dokan/<?= $fetch['st_trx_image'] ?>" class="preview-image mt-2" alt="<?= $fetch['std_name'] ?>">
                                </li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>

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