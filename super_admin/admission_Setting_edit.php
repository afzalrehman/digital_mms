<?php
session_start();
include "../includes/function.php";
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>

<!-- Main Content (Start) -->
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px"> سیکشن ایڈکریں</h4>
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
  <?php
  if (isset($_GET['admission_Setting_edit'])) {
    $edit_id = mysqli_real_escape_string($conn, $_GET['admission_Setting_edit']);

    $select_query = mysqli_query($conn, "SELECT * FROM `admission_setting` WHERE `id` = '$edit_id'");

    $check = mysqli_num_rows($select_query);

    if ($check > 0) {
      $fetch = mysqli_fetch_assoc($select_query);
  ?>
      <!-- madarasa add Form (Start) -->
      <div class="row">
        <!-- Madarsa Info -->
        <div class="col-4">
          <div class="card">
            <div class="border-bottom title-part-padding mt-3">
              <h4 class="card-title mb-0 fs-7 text-primary"> 1 ۔ اپ ڈیٹ کریں</h4>
            </div>
            <div class="card-body">
              <form method="post" id="admission_setting" action="code.php">
                <div class="row g-4">
                  <input type="text" hidden name="edit_id" value="<?= $fetch['id'] ?>">
                  <div class="col-md-12">
                    <label class="fs-5 mb-1" for="std-area">مدرسہ کا نام <span class="text-danger fs-7">*</span></label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="madarasa" id="departmentMad">
                      <option class="jameel-kasheeda" value="<?= $fetch['madarsa_id'] ?>">
                        <?php
                        $madarsa_id = $fetch['madarsa_id'];
                        $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                        $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                        if ($madarsas_id) {
                       echo  $madarsas_id->madarsa_name ;
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
                    <span class="text-danger departmentMad"></span>
                    <span class="inter error text-danger"><?php if (isset($_SESSION['admission_setting_exit'])) {
                                                            echo $_SESSION['admission_setting_exit'];
                                                            unset($_SESSION['admission_setting_exit']);
                                                          } ?></span>
                  </div>

                  <div class="col-md-12">
                    <label class="fs-5 mb-1" for="std-area"> ایڈمیشن شروع یا بند:
                      <span class="text-danger fs-7">*</span></label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="admission_setting" id="departmentMad">
                      <option class="jameel-kasheeda" value="<?= $fetch['open_close'] ?>"><?php if ($fetch['open_close'] == 1) {
                                                                                          echo 'شروع';
                                                                                        } elseif ($fetch['open_close'] == 2) {
                                                                                          echo 'بند';
                                                                                        } ?></option>
                      <option class="jameel-kasheeda" value="1">شروع</option>
                      <option class="jameel-kasheeda" value="2">بند</option>
                    </select>
                    <span class="text-danger departmentName"></span>
                  </div>

                  <div class="col-md-12 mt-4 jameel-kasheeda">
                    <button type="submit" id="submit" name="admission_SettingUpdate" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Submit Button -->
      </div>
  <?php
    } else {
      echo "No Data Found";
    }
  }
  ?>
  <!-- Main Content Header Card (Start) -->
  <!-- Student Details List (Start) -->
  <div class="col-lg-8 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="mb-7 mb-sm-0">
          <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
        </div>
        <div class="table-responsive text-center py-9">
          <table class="table align-middle text-nowrap mb-0">
            <thead>
              <tr class="fw-semibold">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">مدرسہ </th>
                <th class="fs-5 word-spacing-2px text-primary">شروع / ختم</th>
                <th class="fs-5 word-spacing-2px text-primary">حالت</th>
              </tr>
            </thead>
            <tbody class="border-top">
              <?php
              $select = "SELECT * FROM `admission_setting` ORDER BY id DESC ";
              $result = mysqli_query($conn, $select);
              if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($item = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                    </td>
                    <?php
                    $madarsa_id = $item['madarsa_id'];
                    $madarsa_id_query = mysqli_query($conn, "SELECT * FROM `madarsa` WHERE `madarsa_id` ='$madarsa_id'");
                    $madarsas_id = mysqli_fetch_object($madarsa_id_query);
                    if ($madarsas_id) {
                      echo '<td><span class="me-1 jameel-kasheeda">' . $madarsas_id->madarsa_name  . '</span></td>';
                    }
                    ?>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?php if ($item['open_close'] == 1) {
                                                              echo 'شروع';
                                                            } else {
                                                              echo 'ختم';
                                                            } ?></p>
                    </td>
                    <td>
                      <?php
                      if ($item['status'] === 'فعال') {
                        echo '<p class="mb-0 fs-2 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $item['status'] . '</p>';
                      } else {
                        echo '<p class="mb-0 fs-2 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $item['status'] . '</p>';
                      }
                      ?>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo '<tr>
                      <td class="text-danger">سال موجود نہں ہے </td>
                      </tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Student Details List (End) -->
</div>
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
<script src="../assets/js/error/department.js"></script>