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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">آمدنی فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                آمدنی فارم
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
  <?php
  if (isset($_GET['income_edit'])) {
    $edit_id = mysqli_real_escape_string($conn, $_GET['income_edit']);

    $select_query = mysqli_query($conn, "SELECT * FROM `income` WHERE `income_id` = '$edit_id'");

    $check = mysqli_num_rows($select_query);

    if ($check > 0) {
      $fetch = mysqli_fetch_assoc($select_query);

  ?>
      <!-- Income Form (Start) -->
      <div class="row">
        <!-- User Info -->
        <form method="post" action="code.php" id="income">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row g-4">
                  <input type="number" hidden  name="edit" value="<?= $fetch['income_id'] ?>"  />
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="RegNumber">رسید نمبر <span class="text-danger fs-7">*</span></label>
                    <input type="number" id="RegNumber" name="RegNumber" class="form-control fs-3 inter" value="<?= $fetch['RegNumber'] ?>" placeholder="0009832" />
                    <span class="text-danger RegNumber"></span>
                  </div>

                  <div class="col-lg-6"></div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="mad_Name">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="mad_Name">
                      <option class="jameel-kasheeda" value="<?= $fetch['madarsa_id'] ?>">
                        <?php
                        $madarsa_id = $fetch['madarsa_id'];
                        $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                        $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                        if ($madarsas_id) {
                          echo '<p class="mb-0 fs-2 ">' . $madarsas_id->madarsa_name  . '</p>';
                        }
                        ?>
                      </option>
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


                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="income_name">دینے والے کا نام <span class="text-danger fs-7">*</span></label>
                    <input type="text" name="income_name" id="income_name" class="form-control urduInput fw-semibold fs-4" value="<?= $fetch['income_name'] ?>" placeholder="احمد" />
                    <span class="text-danger income_name"></span>
                  </div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="incomecategriy">آمدنی کس مد میں ہوئی: <span class="text-danger fs-7">*</span></label>
                    <select id="incomecategriy" class="form-control jameel-kasheeda fw-bolder" name="incomecategriy">
                      <option value="<?= $fetch['incomeCategory'] ?>" class='fw-bolder'><?= $fetch['incomeCategory'] ?></option>
                      <option value="ماہانہ فیس" class='fw-bolder'>ماہانہ فیس</option>
                      <option value="امتحانی فیس" class='fw-bolder'>امتحانی فیس</option>
                      <option value="داخلہ فیس" class='fw-bolder'>داخلہ فیس</option>
                      <option value="زکوٰۃ" class='fw-bolder'>زکوٰۃ</option>
                      <option value="فطرہ" class='fw-bolder'>فطرہ</option>
                      <option value="عطیات" class='fw-bolder'>عطیات</option>
                      <option value="کرایہ" class='fw-bolder'>کرایہ</option>
                      <option value="دیگر" class='fw-bolder'>دیگر</option>
                    </select>
                    <span class="text-danger incomecategriy"></span>
                  </div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="incomeAmount">رقم <span class="text-danger fs-7">*</span></label>
                    <input type="number" name="incomeAmount" class="form-control fs-3 inter fw-semibold" id="incomeAmount" value="<?= $fetch['incomeAmount'] ?>" placeholder="300" />
                    <span class="text-danger incomeAmount"></span>
                  </div>

                  <div class="col-lg-6">
                    <label for="payment_method" class='fs-5 '>ادائیگی کا طریقہ: <span class="text-danger fs-7">*</span></label>
                    <select id="payment_method" class="form-control jameel-kasheeda fw-bolder" name="payment_method">
                      <option value="<?= $fetch['payment_method'] ?>" class='fw-bolder'><?= $fetch['payment_method'] ?></option>
                      <option value="نقد" class='fw-bolder'>نقد</option>
                      <option value="چیک" class='fw-bolder'>چیک</option>
                    </select>
                    <span class="text-danger payment_method"></span>
                  </div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="resiveName">وصول کنندہ: <span class="text-danger fs-7">*</span></label>
                    <input type="text" name="resiveName" class="form-control urduInput fw-semibold fs-4" id="resiveName" value="<?= $fetch['receiverName'] ?>" placeholder="احمد شفیع" />
                    <span class="text-danger resiveName"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="incomeDate"> تاریخ: <span class="text-danger fs-7">*</span></label>
                    <input type="date" name="incomeDate" class="form-control fw-semibold fs-4" id="incomeDate" value="<?= $fetch['incomedate'] ?>" placeholder="احمد شفیع" />
                    <span class="text-danger incomeDate"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="incomeMonth"> مہینہ: <span class="text-danger fs-7">*</span></label>
                    <input type="month" name="incomeMonth" id="incomeMonth" class="form-control fw-semibold fs-4" value="<?= $fetch['income_month'] ?>" placeholder="احمد شفیع" />
                    <span class="text-danger incomeMonth"></span>
                  </div>



                  <div class="col-md-12">
                    <label class="fs-5 mb-1" for="fees-amount">تفصیل <span class="text-danger fs-7">*</span></label>
                    <textarea name="short_discription" id="short_discription" cols="30" class="form-control urduInput" rows="6"><?= $fetch['description'] ?></textarea>
                    <span class="text-danger short_discription"></span>
                  </div>


                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
              <button type="submit" name="incomeUpdate" class="btn btn-primary fw-semibold fs-5">اپڈیٹ کریں</button>
            </div>
        </form>
      </div>
  <?php
    } else {
      echo "No Data Found";
    }
  }
  ?>
</div>
</div>
<!-- Income Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/income.js"></script>