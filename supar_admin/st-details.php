<?php
session_start();
include "../includes/function.php";
include "../includes/config.php";
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
          <h4 class="my-3 fs-8 text-primary">طلبہ کی تفصیلات</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                طلبہ کی تفصیلات
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

  <!-- Student Search Form (Start) -->
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="رجسٹریشن نمبر تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="نام تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="	فون نمبر تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
      <input type="date" id="member_deposit-date" class="form-control" value="<?php echo date('Y-m-h'); ?>">
      </div>
      <div class="col-md-4 jameel-kasheeda">
        <a href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
        تلاش کریں 
        </a>
      </div>
    </div>
  </div>
  <!-- Student Search Form (End) -->

  <!-- Student Details List (Start) -->
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-7 mb-sm-0">
              <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
            </div>
          </div>
          <div class="col-md-6 text-end">
            <div class="btn-group">
              <div class="me-2">
                <select id="member_deposit-limit" class="form-select" onchange="load_member_deposit_Data()">
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                </select>
              </div>
              <div class="me-2">
                <select id="member_deposit-order" class="form-select" onchange="load_member_deposit_Data()">
                  <option value="ASC">Old</option>
                  <option value="DESC">New</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive text-center py-9">
          <table class="table align-middle text-nowrap mb-0">
            <thead>
              <tr class="fw-semibold">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">رجسٹریشن نمبر</th>
                <th class="fs-5 word-spacing-2px text-primary">نام</th>
                <th class="fs-5 word-spacing-2px text-primary">والد کا نام</th>
                <th class="fs-5 word-spacing-2px text-primary">فون نمبر</th>
                <th class="fs-5 word-spacing-2px text-primary">شعبہ</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top" id="st_details">
              <?php
              // Query to fetch the madarsa information
              $selec_madarsa = "SELECT * FROM students";
              $result_madarsa = $conn->query($selec_madarsa);
              if (mysqli_num_rows($result_madarsa) > 0) {
                $no = 1;

                while ($row_madarsa = $result_madarsa->fetch_assoc()) {
              ?>
                  <tr>
                    <td>
                      <p class="mb-0 fs-2 inter"><?php echo $no++; ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $row_madarsa['st_roll_no'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row_madarsa['std_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row_madarsa['guar_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $row_madarsa['guar_number'] ?></p>
                    </td>
                    <td>
                      <?php
                      if ($row_madarsa['status'] === 'فعال') {
                        echo '<p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $row_madarsa['status'] . '</p>';
                      } elseif ($row_madarsa['status'] === 'غیر فعال') {
                        echo '<p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $row_madarsa['status'] . '</p>';
                      }
                      ?>
                    </td>
                    <td>
                      <div class="action-btn">
                        <?php
                        if ($row_madarsa['status'] !== 'غیر فعال') {
                          echo '<a href="st-profile.php?st_view_profile=' . $row_madarsa['id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
                        }
                        if ($row_madarsa['status'] !== 'غیر فعال') {
                          echo '<a href="st-admission-edit.php?st_edit=' . $row_madarsa['id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
                        }
                        if ($row_madarsa['status'] !== 'غیر فعال') {
                          echo '
                          <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_madarsa['id'] . '">
                          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                        </button>
                          ';
                        }
                        ?>
                        <!-- ===================delete institute page modal================== -->
                        <div class="modal fade" id="deleteModal<?= $row_madarsa['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                <a href="st-all-code.php?st_delete=<?= $row_madarsa['id'] ?>">
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
                      <td class="text-danger">طلبہ موجود نہں ہے </td>
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
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>


<!-- <script src="type/javascript">
  // show data from database
</script> -->