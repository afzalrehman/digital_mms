<?php
session_start();
include_once "../includes/config.php";
include "../includes/function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fees_type_name = mysqli_real_escape_string($conn, $_POST['fees_type_name']);
  $fees_type_amount = mysqli_real_escape_string($conn, $_POST['fees_type_amount']);

  // check unique fees_type_name 
  $check_query = "SELECT * FROM `st_fees_types` WHERE `fees_type_name` = '$fees_type_name'";
  $check_result = $conn->query($check_query);

  if ($check_result->num_rows > 0) {
    redirect("st-fees-types", "فیس کا نام پہلے سے موجود ہے۔");
    exit();
  }

  // created_by and created_date
  $created_by = "Abu Hammad";
  $created_date = date('Y-m-d');

  // insert data into fees_type table
  $insert_query = "INSERT INTO `st_fees_types`(`fees_type_name`, `fees_type_amount`, `created_by`, `created_date`) 
  VALUES ('$fees_type_name', '$fees_type_amount', '$created_by', '$created_date')";
  $insert_result = $conn->query($insert_query);

  if ($insert_result) {
    redirect("st-fees-types", "فیس کا نام اور رقم ڈال دی گئی۔");
    exit();
  } else {
    redirect("st-fees-types", "فیس کا نام اور رقم داخل نہیں کی گئی ہے۔");
    exit();
  }
}


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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">فیس کی اقسام</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                فیس کی اقسام
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
  <!-- Annoucement Form (Start) -->
  <div class="row">
    <!-- Annoucement Form -->
    <div class="col-lg-12">
      <div class="card">
        <div class="border-bottom title-part-padding mt-3">
          <h4 class="card-title mb-0 fs-7 text-primary">فیس کی اقسام</h4>
        </div>
        <div class="card-body">
          <form action="" method="POST" id="stFeesTypesForm">
            <div class="row g-4">

              <div class="col-lg-4 mb-3">
                <label for="fees_type_name" class="fs-5 mb-1">فیس کا نام</label>
                <input type="text" name="fees_type_name" id="fees_type_name" class="form-control">
                <span class="text-danger error" id="fees_type_name_err"></span>
              </div>
              <div class="col-lg-4 mb-3">
                <label for="fees_type_amount" class="fs-5 mb-1">فیس کی رقم</label>
                <input type="text" name="fees_type_amount" id="fees_type_amount" class="form-control">
                <span class="text-danger error" id="fees_type_amount_err"></span>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mt-5 jameel-kasheeda">
              <button type="submit" name="fees_type_btn" class="btn btn-primary fw-semibold fs-5">
                ایڈکریں </button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>


  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="mb-7 mb-sm-0">
          <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
        </div>
        <div class="table-responsive text-center py-9">
          <table class="table align-middle text-nowrap mb-0">
            <thead class="text-center">
              <tr class="fw-semibold">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">فیس کا نام</th>
                <th class="fs-5 word-spacing-2px text-primary">فیس کی رقم</th>
                <th class="fs-5 word-spacing-2px text-primary">حالت</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top text-center">
              <?php
              $select = "SELECT `fees_type_id`, `fees_type_name`, `fees_type_amount`, `status` FROM `st_fees_types`";
              $result = mysqli_query($conn, $select);
              if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($item = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $item['fees_type_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $item['fees_type_amount'] ?></p>
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

                    <td>
                      <div class="action-btn">
                        <a href="madarsa_classEdit.php?class_edit=<?= $item['fees_type_id'] ?>" class="text-success">
                          <i class="ti ti-edit fs-6"></i>
                        </a>
                        <button type="button" class="border-0  rounded-2 p-0 py-1 " data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['fees_type_id'] ?>">
                          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                        </button>
                        <!-- ===================delete institute page modal================== -->
                        <div class="modal fade " id="deleteModal<?= $item['fees_type_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                <a href="code.php?class_delete=<?= $item['fees_type_id'] ?>">
                                  <button type="button" class="btn btn-danger">ڈیلیٹ</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
</div>
<!-- Annoucement Form (End) -->
</div>
<!-- Main Content (End) -->
</div>

</div>
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
?>

<?php
include "inc/footer.php";
?>
<script src="../assets/js/error/st-fees-type.js"></script>