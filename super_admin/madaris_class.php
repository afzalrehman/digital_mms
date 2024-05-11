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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">کلاس فارم </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                کلاس فارم
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
          <h4 class="card-title mb-0 fs-7 text-primary"> کلاس لکھیئے</h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="post" id="class_page">
            <div class="row ">
              <div class="col-lg-4">
                <label class="fs-5 mb-1">مدرسہ </label>
                <select class="form-control fw-semibold fs-3 jameel-kasheeda" id="classMad" name="madarasa">
                  <option class="jameel-kasheeda" value="">---</option>
                </select>
                <span class="text-danger classMad"></span>
              </div>

              <div class="col-lg-4 mb-3">
                <label class="fs-5 mb-1">شعبہ </label>
                <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="department" id="classdepartment">
                  <option class="jameel-kasheeda" value="">---</option>
                </select>
                <span class="text-danger classdepartment"></span>
              </div>
              <div class="col-lg-4 mb-3">
                <label class="fs-5 mb-1">کلاس </label>
                <input type="text" name="class" id="class" class="form-control urduInput">
                <span class="text-danger class"></span>
              <span class="inter error text-danger"><?php if (isset($_SESSION['class_exit'])) {
                                                      echo $_SESSION['class_exit'];
                                                      unset($_SESSION['class_exit']);
                                                    } ?></span>
              </div>

              <div class="col-lg-6">
                <label class="fs-5 mb-1">سیکشن </label><br>
                <?php
                $query = "SELECT * FROM section";
                $result = mysqli_query($conn, $query);
                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <label class="px-3">
                      <?= $row['section_name']; ?>
                      <input type="checkbox" required name="section[]" value=" <?= $row['sec_id']; ?>" class="fw-semibold fs-4" placeholder="کلاس ایڈ کریں" />
                    </label>
                <?php
                  }
                } else {
                  echo "Error: ";
                }
                ?>

              </div>


            </div>


            <!-- Submit Button -->
            <div class="col-md-12 mt-5 jameel-kasheeda">
              <button type="submit" id="submit" name="classbtn" class="btn btn-primary fw-semibold fs-5">
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
            <thead>
              <tr class="fw-semibold">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">مدرسہ </th>
                <th class="fs-5 word-spacing-2px text-primary">شعبہ </th>
                <th class="fs-5 word-spacing-2px text-primary">کلاس </th>
                <th class="fs-5 word-spacing-2px text-primary">سیکشن </th>
                <th class="fs-5 word-spacing-2px text-primary">حالت</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top">
              <?php
              $select = "SELECT * FROM `madarsa_class` ORDER BY id DESC ";
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
                    <?php
                    $depart_id = $item['depart_id'];
                    $depart_id_query = mysqli_query($conn, "SELECT * FROM `department` WHERE `depart_id` ='$depart_id'");
                    $depart_id = mysqli_fetch_object($depart_id_query);
                    if ($depart_id) {
                      echo '<td><span class="me-1 jameel-kasheeda">' . $depart_id->department_name  . '</span></td>';
                    }
                    ?>
                    <td>
                      <p class="mb-0 fs-4 word-spacing-2px"><?= $item['class_name'] ?></p>
                    </td>
                    <td class="jameel-kasheeda">
                      <?php

                      $sec_id = explode(',', $item['sec_id']);
                      foreach ($sec_id as $section_name) {
                        $seql_ins = mysqli_query($conn, "SELECT * FROM `section` WHERE `sec_id` ='$section_name'");
                        $seql_sec_id = mysqli_fetch_object($seql_ins);
                        if ($seql_sec_id) {
                      ?>
                          <span class=" me-1"><?php echo $seql_sec_id->section_name ?><br></span>
                      <?php
                        }
                      }
                      ?>
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

                    <td class="text-center">
                      <div class="action-btn">
                        <a href="madarsa_classEdit.php?class_edit=<?= $item['id'] ?>" class="text-success">
                          <i class="ti ti-edit fs-6"></i>
                        </a>
                        <button type="button" class="border-0  rounded-2 p-0 py-1 " data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id'] ?>">
                          <span><i class="fs-5 ti ti-trash  text-danger p-1 "></i></span>
                        </button>
                        <!-- ===================delete institute page modal================== -->
                        <div class="modal fade " id="deleteModal<?= $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">یقینی طور پر حذف کر رہے ہیں </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کلوز</button>
                                <a href="code.php?class_delete=<?= $item['id'] ?>">
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
<script src="../assets/js/error/class.js"></script>
<script>
  $(document).ready(function() {
    function loadData(type, id) {
      $.ajax({
        url: 'ajex.php',
        type: 'POST',
        data: {
          type: type,
          id: id
        },
        dataType: 'html',
        success: function(data) {
          if (type === "class_Mad") {
            $('#classMad').append(data);
          } else if (type === "department_Data") {
            $('#classdepartment').html(data);
          } else if (type === "section_Data") {
            $('#section_Data').html(data);
          }
        }
      });
    }

    loadData("class_Mad");

    $("#classMad").on("change", function() {
      var department = $("#classMad").val();
      if (department != "") {
        loadData("department_Data", department);
      } else {
        $('#classdepartment').html("");
        $('#trade_add').html("");
      }
    });

    $("#classMad").on("change", function() {
      var next_class = $("#classMad").val();
      if (next_class != "") {
        loadData("section_Data", next_class);
      } else {
        $("#section_Data").html("");
      }
    });

  });
</script>