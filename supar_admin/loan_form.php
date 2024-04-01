<?php
session_start();
include "../includes/function.php";
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
                    <h4 class="my-3 fs-8 text-primary word-spacing-2px">اُدھار فارم</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                            </li>
                            <li class="breadcrumb-item fs-4" aria-current="page">
                                اُدھار فارم
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
    <div class="card">
        <div class="card-body">
            <!-- Loan Form (Start) -->
            <form action="code.php" method="POST" id="loan">
                <div class="row g-4">
                    <!-- طالب علم/وصول کنندہ کی تفصیلات -->
                    <div class="col-md-6">
                        <label class="fs-5 mb-1" for="mad_Name">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                        <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="mad_Name">
                            <option class="jameel-kasheeda" value="">مدرسہ سلیکٹ کریں</option>
                            <?php
                            $sql = "SELECT * FROM madarsa";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <option class="jameel-kasheeda" value="<?= $row["madarsa_id"] ?>"><?= $row["madarsa_name"] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <span class="text-danger mad_Name"></span>
                    </div>

                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="recipient_name">وصول کنندہ کا نام:</label>
                        <input type="text" id="recipient_name" name="recipient_name" class="form-control">
                        <span class="text-danger recipient_name"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="registration_number">رجسٹریشن نمبر:</label>
                        <input type="text" id="registration_number" name="registration_number" class="form-control">
                        <span class="text-danger registration_number"></span>
                    </div>

                    <!-- اُدھار کی تفصیلات -->
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="loan_amount">اُدھار کی رقم:</label>
                        <input type="number" id="loan_amount" name="loan_amount" class="form-control">
                        <span class="text-danger loan_amount"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="loan_date">اُدھار کی تاریخ:</label>
                        <input type="date" id="loan_date" name="loan_date" class="form-control">
                        <span class="text-danger loan_date"></span>
                    </div>

                    <!-- فائدہ کی شرح و ادائیگی کا طریقہ -->
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="interest_rate">فائدہ کی شرح:</label>
                        <input type="text" id="interest_rate" name="interest_rate" class="form-control">
                        <span class="text-danger interest_rate"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="loan_duration">اُدھار کی مدت:</label>
                        <input type="number" id="loan_duration" name="loan_duration" class="form-control">
                        <span class="text-danger loan_duration"></span>
                    </div>

                    <!-- اضافی معلومات -->
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="payment_method">ادائیگی کا طریقہ:</label>
                        <input type="text" id="payment_method" name="payment_method" class="form-control">
                        <span class="text-danger payment_method"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="purpose">اُدھار لینے کا مقصد:</label>
                        <textarea id="purpose" name="purpose" class="form-control"></textarea>
                        <span class="text-danger purpose"></span>
                    </div>

                    <!-- تبصرے اور شرائط و ضوابط -->
                  
                    <div class="col-lg-6">
                        <label class="fs-5 mb-1" for="agreement">اُدھار کا معاہدہ:</label>
                        <textarea id="agreement" name="agreement" class="form-control"></textarea>
                        <span class="text-danger agreement"></span>
                    </div>

                    <div class="col-lg-12">
                        <label class="fs-5 mb-1" for="remarks">تبصرے:</label>
                        <textarea id="remarks" name="remarks" class="form-control"></textarea>
                        <span class="text-danger remarks"></span>
                    </div>
                </div>

                <!-- فارم جمع کریں -->

                <div class="col-lg-12 mt-4 jameel-kasheeda">
                    <input type="submit" value="ایڈ کریں" class="btn btn-primary fw-semibold fs-5">
                </div>

            </form>
        </div>

    </div>
</div>
</div>
<!-- Loan Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/loan.js"></script>