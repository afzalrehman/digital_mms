<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<?php
if (isset($_GET['income_vewimore'])) {
    $id = $_GET['income_vewimore'];
    $select_query = "SELECT * FROM `income` WHERE `income_id` = '$id'";
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
                            <h4 class="my-3 fs-8 text-primary">خرچہ کے معلومات</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                                    </li>
                                    <li class="breadcrumb-item fs-4" aria-current="page">
                                        خرچہ کے معلومات
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
                                    <span class=" me-2 jameel-regular">رسید نمبر :</span>
                                    <span class="fs-6"><?= $fetch['RegNumber'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">دینے والے کا نام :</span>
                                    <span class="fs-6"><?= $fetch['income_name'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">رقم :</span>
                                    <span class="fs-6"><?= $fetch['incomeAmount'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">وصول کنندہ :</span>
                                    <span class="fs-6"><?= $fetch['receiverName'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">مہینہ :</span>
                                    <span class="fs-6"><?= $fetch['income_month'] ?></span>
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
                                    <span class="jameel-regular me-2">آمدنی کس مد میں ہوئی:</span>
                                    <span class="fs-6"><?= $fetch['incomeCategory'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">دائیگی کا طریقہ:</span>
                                    <span class="inter fs-6"><?= $fetch['payment_method'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">تاریخ :</span>
                                    <span class="inter fs-6"><?= $fetch['incomedate'] ?></span>
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
            <div class="content-wrapper " hidden id="printable-content">
                <style>
                    .main {
                        display: flex;
                        align-items: center;
                        font-family: Jameel-Kasheeda;
                    }

                    .box {
                        text-align: center;
                        margin: 0 auto;
                        font-family: Jameel-Kasheeda;
                    }

                    .logo img {
                        width: 200px;
                        height: auto;
                    }

                    h1,
                    h4 {
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

                    .box h1 {
                        font-weight: 400;
                        font-size: 50px;
                    }

                    .box h3 {
                        font-weight: 500;
                        font-size: 40px;
                    }

                    table{
                        margin-top: 30px;
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
                            <th> نام</th>
                            <th>آمدنی کی مد</th>
                            <th>ادائیگی کا طریقہ</th>
                            <th>وصول کنندہ</th>
                            <th>تاریخ </th>
                            <th>مہینہ</th>
                            <th>رقم</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $fetch['income_name'] ?></td>
                            <td><?= $fetch['incomeCategory'] ?></td>
                            <td><?= $fetch['payment_method'] ?></td>
                            <td><?= $fetch['receiverName'] ?></td>
                            <td><?= $fetch['incomedate'] ?></td>
                            <td><?= $fetch['income_month'] ?></td>
                            <td><?= $fetch['incomeAmount'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

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