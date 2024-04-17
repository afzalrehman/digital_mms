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
          <h4 class="my-3 fs-8 text-primary">دوکان کی تفصیلات</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                دوکان کی تفصیلات
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
      <div class="col-md-4 col-xl-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="input-search" placeholder="تلاش کریں &nbsp;..." />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-8 col-xl-9 text-end mt-3 mt-md-0 jameel-kasheeda">
        <a href="javascript:void(0)" class="btn btn-info fw-semibold word-spacing-2px fs-4">
          ایڈ کریں
        </a>
      </div>
    </div>
  </div>
  <!-- Student Search Form (End) -->

  <!-- Student Details List (Start) -->
  <div class="col-lg-12 d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="mb-7 mb-sm-0">
          <h5 class="card-title fs-7 text-primary">تفصیلات</h5>
        </div>
        <div class="table-responsive text-center py-9">
          <table class="table align-middle text-nowrap mb-0">
            <thead>
              <tr class="fw-semibold text-center">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">دکان کا نام</th>
                <th class="fs-5 word-spacing-2px text-primary">مالک کا نام</th>
                <th class="fs-5 word-spacing-2px text-primary">دکان کی قسم</th>
                <th class="fs-5 word-spacing-2px text-primary">دکان کا کرایہ</th>
                <th class="fs-5 word-spacing-2px text-primary">حالت</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top" id="st_details">
              <?php
              // Query to fetch the madarsa information
              $selec_madarsa = "SELECT * FROM `dokan`";
              $result_madarsa = $conn->query($selec_madarsa);
              if (mysqli_num_rows($result_madarsa) > 0) {
                $no = 1;

                while ($row_dokan = $result_madarsa->fetch_assoc()) {
              ?>
                  <tr class="text-center">
                    <td>
                      <p class="mb-0 fs-2 inter"><?php echo $no++; ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $row_dokan['dukan_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row_dokan['dokan_owner_name'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $row_dokan['dukan_type'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 fs-2 inter"><?= $row_dokan['dokan_rent'] ?></p>
                    </td>
                    <td>
                      <?php
                      if ($row_dokan['status'] === 'فعال') {
                        echo '<p class="mb-0 fs-4 jameel-kasheeda bg-primary text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
                      } elseif ($row_dokan['status'] === 'غیر فعال') {
                        echo '<p class="mb-0 fs-4 jameel-kasheeda bg-danger  text-center text-white rounded-2">' . $row_dokan['status'] . '</p>';
                      }
                      ?>
                    </td>
                    <td>
                      <div class="action-btn">
                        <?php
                        if ($row_dokan['status'] !== 'غیر فعال') {
                          echo '<a href="st-profile.php?st_view_profile=' . $row_dokan['dokan_id'] . '" class="text-info ms-1"><i class="ti ti-eye fs-6"></i></a>';
                        }
                        if ($row_dokan['status'] !== 'غیر فعال') {
                          echo '<a href="st-admission-edit.php?st_edit=' . $row_dokan['dokan_id'] . '" class="text-success"><i class="ti ti-edit fs-6"></i></a>';
                        }
                        if ($row_dokan['status'] !== 'غیر فعال') {
                          echo '
                          <button type="button" class="border-0  rounded-2 p-0 py-1 bg-white" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row_dokan['dokan_id'] . '">
                          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                        </button>
                          ';
                        }
                        ?>
                        <!-- ===================delete institute page modal================== -->
                        <div class="modal fade" id="deleteModal<?= $row_dokan['dokan_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں؟ </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                <a href="st-all-code.php?st_delete=<?= $row_dokan['dokan_id'] ?>">
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
                      <td class="text-danger">دوکان موجود نہں ہے </td>
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