<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<?php
if (isset($_GET['expance_vewimore'])) {
    $id = $_GET['expance_vewimore'];
    $select_query = "SELECT * FROM `expance` WHERE `expance_id` = '$id'";
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
                <h5 class="pb-2 border-bottom my-4 fs-7">تفصیلات</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <span class=" me-2 jameel-regular">رسید نمبر :</span>
                                    <span class="fs-6"><?= $fetch['RegNumber'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2">خرچہ کا نام:</span>
                                    <span class="fs-6"><?= $fetch['expance_name'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">دینے والے کا نام :</span>
                                    <span class="fs-6"><?= $fetch['resiveName'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">مہینہ :</span>
                                    <span class="fs-6"><?= $fetch['expance_month'] ?></span>
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
                                    <span class="jameel-regular me-2">رقم :</span>
                                    <span class="fs-6"><?= $fetch['expanceAmount'] ?></span>
                                </li>

                                <li class="mb-4">
                                    <span class="jameel-regular me-2"> دیا یا نہیں :</span>
                                    <span class="inter fs-6"><?= $fetch['pay_now'] ?></span>
                                </li>
                                <li class="mb-4">
                                    <span class="jameel-regular me-2">تاریخ :</span>
                                    <span class="inter fs-6"><?= $fetch['expanceـdate'] ?></span>
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
        <?php
        include "inc/mobileNavbar.php";
        include "inc/footer.php";
        ?>