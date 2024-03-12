<?php
session_start();
include 'config/config.php';
include("./includes/header.php");
include("./includes/sidebar.php");
include("./includes/navbar.php");
?>
<div class="content-wrapper">
    <!-- Content -->
    <?php
    if (isset($_GET['madarsa_vewimore'])) {

        $id = $_GET['madarsa_vewimore'];
        $select_query = "SELECT * FROM `madrasa` WHERE `madarsa_id` = '$id'";

        $result = mysqli_query($conn, $select_query);

        if ($result->num_rows > 0) {
            $fetch = mysqli_fetch_assoc($result);
    ?>
            <div class="container-xxl flex-grow-1 pt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="user-profile-header-banner position-relative">
                                <div class="overlay"></div>
                                <img src="https://i.ytimg.com/vi/O0MegyCc2Rg/maxresdefault.jpg" alt="Banner image" class="image rounded-top img-fluid">
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <h3 class="text-white"><?= $fetch['madarsa_name'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="card">
                    <div class="container">
                        <h5 class="pb-2 border-bottom my-4">تفصیلات</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class="fw-bold me-2 ">رجسٹریشن نمبر</span>
                                            <span><?= $fetch['register_no'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">مدرسہ</span>
                                            <span><?= $fetch['madarsa_name'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">شہر</span>
                                            <span><?= $fetch['madarsa_city'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">مدرسہ کا پتہ</span>
                                            <span><?= $fetch['madarsa_address'] ?></span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">قائم شدہ تاریخ</span>
                                            <span><?= $fetch['establish_date'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">مدرسہ کا ای میل </span>
                                            <span><?= $fetch['madarsa_email'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="fw-bold me-2">مدرسہ کا فون </span>
                                            <span><?= $fetch['madarsa_phone'] ?></span>
                                        </li>


                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card mt-3">
                    <div class="container">
                        <h5 class="pb-2 border-bottom my-4">دسکرپشن</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
                                    <li class="mb-4">

                                        <span> <?= $fetch['madarsa_description'] ?></span>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
        }
    } else {
        echo '<tr>
<p class="text-danger">ڈیٹا موجود نہیں ہیں</p>
</tr>';
    }
        ?>
            </div>
</div>
<?php include("./includes/footer.php") ?>