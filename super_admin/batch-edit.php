<?php
session_start();
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";

if (isset($_GET['batch-edit'])) {
  $edit_id = mysqli_real_escape_string($conn, $_GET['batch-edit']);

  $select_query = mysqli_query($conn, "SELECT * FROM `batch` WHERE `batch_id` = '$edit_id'");

  $check = mysqli_num_rows($select_query);

  if ($check > 0) {
    $fetch = mysqli_fetch_assoc($select_query);

?>
    <!-- Main Content (Start) -->
    <div class="container-fluid">
      <!-- Main Content Header Card (Start) -->
      <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="my-3 fs-8 text-primary word-spacing-2px">تعلیمی سال ایڈکریں</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                  </li>
                  <li class="breadcrumb-item fs-4" aria-current="page">
                    مدرسہ ایڈکریں
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

      <!-- madarasa add Form (Start) -->
      <div class="row">
        <!-- Madarsa Info -->
        <div class="col-12">
          <div class="card">
            <div class="border-bottom title-part-padding mt-3">
              <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ تعلیمی سال کے معلومات</h4>
            </div>
            <div class="card-body">
              <form method="post" id="Batch" action="code.php">
                <div class="row g-4">
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std-area">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="BatchMadd">
                      <option class="jameel-kasheeda" value="<?= $fetch["madarsa_id"] ?>"> <?php
                                                                                            $madarsa_id = $fetch['madarsa_id'];
                                                                                            $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                                                                                            $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                                                                                            if ($madarsas_id) {
                                                                                              echo '<td><span class="me-1 jameel-kasheeda">' . $madarsas_id->madarsa_name  . '</span></td>';
                                                                                            }
                                                                                            ?></option>
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
                    <span class="text-danger BatchMadd"></span>
                    <span class="inter error text-danger"><?php if (isset($_SESSION['batch_name_exit'])) {
                                                            echo $_SESSION['batch_name_exit'];
                                                            unset($_SESSION['batch_name_exit']);
                                                          } ?></span>
                  </div>
                  <input type="text" hidden name="batch_id" value="<?= $fetch["batch_id"] ?>">
                  <div class="col-md-6">
                    <label class="fs-5 mb-1" for="std-area"> سال کا نام<span class="text-danger fs-7">*</span></label>
                    <input type="text" name="batch_name" id="name" class="form-control fw-semibold fs-3 " value="<?= $fetch["Name"] ?>" placeholder="سال کا  نام" />
                    <span class="text-danger name"></span>
                  </div>

                  <div class="col-md-4">
                    <label class="fs-5 mb-1" for="std-area">مدرسہ سال کا شروع تاریخ<span class="text-danger fs-7">*</span></label>
                    <input type="date" name="start_date" id="StartDate" class="form-control fw-semibold fs-3 " value="<?= $fetch["start_date"] ?>" placeholder="مدرسہ سال کا شروع تاریخ" />
                    <span class="text-danger StartDate"></span>
                  </div>

                  <div class="col-md-4">
                    <label class="fs-5 mb-1" for="std-area">مدرسہ سال کا آخری تاریخ<span class="text-danger fs-7">*</span></label>
                    <input type="date" name="last_date" id="LastDate" class="form-control fw-semibold fs-3 " value="<?= $fetch["end_date"] ?>" placeholder="مدرسہ سال کا آخری تاریخ" />
                    <span class="text-danger LastDate"></span>
                  </div>

                  <div class="col-md-4">
                    <label class="fs-5  mb-1" for="std-area">ایڈمیشن کا آخری تاریخ<span class="text-danger fs-7">*</span></label>
                    <input type="date" name="admission_date" id="AddmissionLastDate" class="form-control fw-semibold fs-3" value="<?= $fetch["admission_date"] ?>" placeholder="ایڈمیشن کا آخری تاریخ" />
                    <span class="text-danger AddmissionLastDate"></span>
                  </div>

                  <div class="col-md-12 mt-4 jameel-kasheeda">
                    <button type="submit" id="submit" name="Batchupdate" class="btn btn-primary fw-semibold fs-5">اپڈیٹ کریں</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Submit Button -->
      </div>
    </div>

<?php
  } else {
    echo "No Data Found";
  }
}
?>

</div>
<!-- Student Admission Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script src="../assets/js/error/batch.js"></script>