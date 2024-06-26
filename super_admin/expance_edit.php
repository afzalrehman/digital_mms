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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">خرچہ فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                خرچہ فارم
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

  <!-- Income Form (Start) -->
  <div class="row">
    <?php
    if (isset($_GET['expance_edit'])) {
      $edit_id = mysqli_real_escape_string($conn, $_GET['expance_edit']);

      $select_query = mysqli_query($conn, "SELECT * FROM `expance` WHERE `expance_id` = '$edit_id'");

      $check = mysqli_num_rows($select_query);

      if ($check > 0) {
        $fetch = mysqli_fetch_assoc($select_query);

    ?>
        <!-- User Info -->
        <form method="post" action="code.php" id="expance">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row g-4">

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="mad_Name">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="mad_Name">
                      <option class="jameel-kasheeda" value="<?= $fetch['madarsa_id'] ?>">
                        <?php
                        $madarsa_id = $fetch['madarsa_id'];
                        $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                        $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                        if ($madarsas_id) {
                          echo '<td><span class="me-1 jameel-kasheeda">' . $madarsas_id->madarsa_name  . '</span></td>';
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
                  <input name="expance_edit" hidden class="form-control fs-3  " placeholder="0009832" value="<?= $fetch['expance_id'] ?>" />
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="RegNumber">رسید نمبر</label>
                    <input type="number" id="RegNumber" name="RegNumber" class="form-control urduInput fs-3 inter" placeholder="0009832" value="<?= $fetch['RegNumber'] ?>" />
                    <span class="text-danger RegNumber"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="expance_name">خرچہ کا نام</label>
                    <input type="text" id="expance_name" name="expance_name" class="form-control urduInput fw-semibold fs-4" value="<?= $fetch['expance_name'] ?>" placeholder="موٹر کےلیے" />
                    <span class="text-danger expance_name"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="resiveName">دینے والے کا نام</label>
                    <input type="text" id="resiveName" name="resiveName" class="form-control urduInput fw-semibold fs-4" value="<?= $fetch['resiveName'] ?>" placeholder="احمد" />
                    <span class="text-danger resiveName"></span>
                  </div>


                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="expanceAmount">رقم</label>
                    <input type="number" id="expanceAmount" name="expance_amount" class="form-control fs-3 inter fw-semibold" value="<?= $fetch['expanceAmount'] ?>" placeholder="300" />
                    <span class="text-danger expanceAmount"></span>
                  </div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="pay_now">قسم منتخب کریں</label>
                    <select id="pay_now" name="pay_now" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="<?= $fetch['pay_now'] ?>" class="jameel-kasheeda"><?= $fetch['pay_now'] ?></option>
                      <option value="ادا کیا" class="jameel-kasheeda">ادا کیا</option>
                      <option value="ادا نہیں کیا" class="jameel-kasheeda">ادا نہیں کیا</option>
                    </select>
                    <span class="pay_now text-danger"></span>
                  </div>

                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="expanceـdate">تاریخ</label>
                    <input type="date" id="expanceـdate" name="expanceـdate" class="form-control fs-3 inter fw-semibold" value="<?= $fetch['expanceـdate'] ?>" placeholder="300" />
                    <span class="text-danger expanceـdate"></span>
                  </div>
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="expance_month">مہینہ</label>
                    <input type="month" id="expance_month" name="expance_month" class="form-control fs-3 inter fw-semibold" value="<?= $fetch['expance_month'] ?>" placeholder="300" />
                    <span class="text-danger expance_month"></span>
                  </div>



                  <div class="col-md-12">
                    <label class="fs-5 mb-1" for="short_discription">مختصر وضاحت</label>
                    <textarea class="form-control urduInput" name="short_discription" id="short_discription" cols="30" rows="5"><?= $fetch['description'] ?></textarea>
                    <span class="short_discription text-danger"></span>
                  </div>


                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
              <button type="submit" id="submit" name="ExpanceUpdate" class="btn btn-primary fw-semibold fs-5">اپڈیٹ کریں</button>
            </div>

        </form>
    <?php
      } else {
        echo "No Data Found";
      }
    }
    ?>
  </div>
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
<script src="../assets/js/error/expance.js"></script>