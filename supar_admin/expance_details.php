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
          <h4 class="my-3 fs-8 text-primary">فیس کی تفصیلات</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                فیس کی تفصیلات
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

  <!-- Fees Search Form (Start) -->
  <div class="row">
    <!-- User Info -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form method="post">
            <div class="row g-4 align-items-end justify-content-between">
              <div class="col-md-4">
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
              </div>

              <div class="col-md-4">
                <label class="fs-5 mb-1" for="pay_now">قسم منتخب کریں</label>
                <select id="pay_now" name="pay_now" class="form-select fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="ادا کیا" class="jameel-kasheeda">ادا کیا</option>
                  <option value="ادا نہیں کیا" class="jameel-kasheeda">ادا نہیں کیا</option>
                </select>
                <span class="pay_now text-danger"></span>
              </div>

              <div class="col-md-4">
                <label class="fs-5 mb-1" for="expance_month">مہینہ</label>
                <input type="month" id="expance_month" name="expance_month" class="form-control fs-3 inter fw-semibold" placeholder="300" />
                <span class="text-danger expance_month"></span>
              </div>
              <div class="col-md-2 ">
                <label class="fs-5 mb-1" for=""></label>
                <input type="submit" name="search" class="form-control bg-primary fw-bolder text-white jameel-kasheeda" value=" سرچ کریں" placeholder="#421232" />
                <!-- <span class="error" id="std-area-err"></span> -->
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Submit Button -->
  </div>
  <!-- Fees Search Form (End) -->
  <?php
  // Check if the form is submitted
  if (isset($_POST['search'])) {
    // Retrieve form data
    $madarasa = $_POST['madarasa'];
    $pay_now = $_POST['pay_now'];
    $expance_month = $_POST['expance_month'];

    // Perform SQL query to fetch data
    $query = "SELECT * FROM expance WHERE madarsa_id ='$madarasa' AND pay_now ='$pay_now' AND expance_month ='$expance_month'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        // Display total expense amount
        $total_expense_amount = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $total_expense_amount += $row['expanceAmount'];
        }
  ?>
        <!-- Fees Details List (Start) -->
        <div class="col-lg-12 d-flex align-items-strech">
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
                      <th class="fs-5 word-spacing-2px text-primary">مدرسہ</th>
                      <!-- Add other table headings here -->
                    </tr>
                  </thead>
                  <tbody class="border-top">
                    <?php
                    $no = 1;
                    mysqli_data_seek($result, 0); // Reset result pointer
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td>
                          <p class="mb-0 fs-2 inter"><?= $no++ ?></p>
                        </td>
                        <td>
                          <p class="mb-0 fs-2 inter"><?= $row['madarsa_id'] ?></p>
                        </td>
                        <td>
                          <p class="mb-0 fs-4 word-spacing-2px"><?= $row['RegNumber'] ?></p>
                        </td>
                        <td>
                          <p class="mb-0 fs-4 word-spacing-2px"><?= $row['expance_name'] ?></p>
                        </td>
                        <td>
                          <p class="mb-0 fs-4 word-spacing-2px"><?= $row['expanceـdate'] ?></p>
                        </td>
                        <td>
                          <p class="mb-0 fs-2 inter"><?= $row['expanceAmount'] ?></p>
                        </td>
                        <td>
                          <div class="action-btn">
                            <a href="madarasa_vewimore.php?madarsa_vewimore=<?= $row['expance_id'] ?>" class="text-info ms-1">
                              <i class="ti ti-eye fs-6"></i>
                            </a>
                            <a href="salary-edit.php?edit_salary=<?= $row['expance_id'] ?>" class="text-success">
                              <i class="ti ti-edit fs-6"></i>
                            </a>
                            <button type="button" class="border-0  rounded-2 p-0 py-1 " data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['expance_id'] ?>">
                              <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                            </button>
                            <!-- ===================delete institute page modal================== -->
                            <div class="modal fade" id="deleteModal<?= $row['expance_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                    <a href="code.php?salary_delete=<?= $row['expance_id'] ?>">
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
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td >
                        <h2 class="fs-6 ">ٹوٹل خرچہ</h2>
                      </td>
                      <td colspan="6">
                        <h2 class="fs-6 inter text-primary"><?= $total_expense_amount ?></h2>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
  <?php
      } else {
        echo "No records found";
      }
    } else {
      echo "Query failed: " . mysqli_error($conn);
    }
  }
  ?>

  <!-- Fees Details List (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>