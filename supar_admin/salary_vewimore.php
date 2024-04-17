<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<?php
if (isset($_GET['salary_vewimore'])) {
    $id = $_GET['salary_vewimore'];
    $select_query = "SELECT * FROM `salary` WHERE `id` = '$id'";
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
                            <h4 class="my-3 fs-8 text-primary">تنخواہ کے معلومات</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                                    </li>
                                    <li class="breadcrumb-item fs-4" aria-current="page">
                                        تنخواہ کے معلومات
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
                        <button onclick="printContent()" class="btn btn-primary pb-1 my-4 fs-3 "> پرنٹ</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class=" me-2 jameel-regular">رجسٹریشن نمبر:</span>
                                    <span class="fs-6"><?= $fetch['register_num'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">نام:</span>
                                    <span class="fs-6"><?php
                                                        $income_madarsa = explode(',', $fetch['register_num']);
                                                        foreach ($income_madarsa as $incomes_madarsa) {
                                                            $seq_query = mysqli_query($conn, "SELECT * FROM `teacher` WHERE `register_num` ='$incomes_madarsa'");
                                                            $sec = mysqli_fetch_object($seq_query);
                                                            if ($sec) {
                                                                echo $sec->tea_name;
                                                            }
                                                        }
                                                        ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">تنخواہ :</span>
                                    <span class="fs-6"><?= $fetch['basic_salary'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">امداد :</span>
                                    <span class="fs-6"><?= $fetch['allowances'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ادائیگی کا طریقہ :</span>
                                    <span class="fs-6"><?= $fetch['payment_method'] ?></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">مدرسہ :</span>
                                    <?php
                                    $madarsa_id = $fetch['madarsa_id'];
                                    $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                                    $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                                    if ($madarsas_id) {
                                        echo '<td><span class="fs-6">' . $madarsas_id->madarsa_name  . '</span></td>';
                                    }
                                    ?>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">کٹوٹی :</span>
                                    <span class="fs-6"><?= $fetch['deductions'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">مہینہ :</span>
                                    <span class="inter fs-6"><?= $fetch['salary_date'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">بقایا :</span>
                                    <span class="inter fs-6"><?= $fetch['remaining_salary'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">ٹوٹل تنخواہ :</span>
                                    <span class="inter fs-6"><?= $fetch['total_salary_given'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card mt-3 box_mad_vewi px-3">
                <div class="container">
                    <h5 class="pb-2 border-bottom my-4 ">مختصر وضاحت :</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class="fs-6"> <?= $fetch['description'] ?></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
                        <h3>تنخواہ</h3>
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
                        <h4>رسید نمبر :<?= $fetch['register_num'] ?></h4>
                    </div>

                </div>

                <table>
                    <thead>
                        <tr>
                            <th>نام</th>
                            <th>تنخواہ</th>
                            <th>امداد</th>
                            <th>کٹوٹی </th>
                            <th>ادائیگی کا طریقہ </th>
                            <th>مہینہ</th>
                            <th>بقایا</th>
                            <th>ٹوٹل تنخواہ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?php
                                    $income_madarsa = explode(',', $fetch['register_num']);
                                    foreach ($income_madarsa as $incomes_madarsa) {
                                        $seq_query = mysqli_query($conn, "SELECT * FROM `teacher` WHERE `register_num` ='$incomes_madarsa'");
                                        $sec = mysqli_fetch_object($seq_query);
                                        if ($sec) {
                                            echo $sec->tea_name;
                                        }
                                    }
                                    ?></td>
                            <td><?= $fetch['basic_salary'] ?></td>
                            <td><?= $fetch['allowances'] ?></td>
                            <td><?= $fetch['deductions'] ?></td>
                            <td><?= $fetch['payment_method'] ?></td>
                            <td><?= $fetch['salary_date'] ?></td>
                            <td><?= $fetch['remaining_salary'] ?></td>
                            <td><?= $fetch['total_salary_given'] ?></td>
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