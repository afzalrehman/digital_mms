<?php
session_start();
include "../includes/config.php";
include("./inc/header.php");
include("./inc/sidebar.php");
include("./inc/navbar.php");
?>
<div class="content-wrapper">
    <!-- Content -->
    <?php
    if (isset($_GET['madarsa_vewimore'])) {
        $id = $_GET['madarsa_vewimore'];
        $select_query = "SELECT * FROM `madarsa` WHERE `madarsa_id` = '$id'";
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
            <div class="container-xxl flex-grow-1 pt-3">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card mt-2">
                            <div class="user-profile-header-banner position-relative">
                                <div class="overlay"></div>
                                <img src="../assets/images/banner.png" alt="Banner image" class="image rounded-top rounded-1 img-fluid">
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <h3 class="text-white fw-bolder" style="font-size: 45px; "><?= $fetch['madarsa_name'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="card box_mad_vewi" >
                    <div class="container ">
                        <h5 class="pb-2 border-bottom my-4 fs-7">تفصیلات</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class=" me-2 jameel-regular">رجسٹریشن نمبر :</span>
                                            <span class="fs-6"><?= $fetch['RigitarNumber'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">مدرسہ :</span>
                                            <span class="fs-6"><?= $fetch['madarsa_name'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">شہر :</span>
                                            <span class="fs-6"><?= $fetch['city'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">مدرسہ کا پتہ :</span>
                                            <span class="fs-6"><?= $fetch['address'] ?></span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">قائم شدہ تاریخ :</span>
                                            <span class="fs-6"><?= $fetch['establish_date'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">مدرسہ کا ای میل :</span>
                                            <span class="fs-6"><?= $fetch['madarsa_emial'] ?></span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="jameel-regular me-2">مدرسہ کا فون :</span>
                                            <span class="inter fs-6"><?= $fetch['phone'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mt-3 box_mad_vewi">
                    <div class="container">
                        <h5 class="pb-2 border-bottom my-4 ">دسکرپشن :</h5>
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
<?php include("./inc/footer.php") ?>