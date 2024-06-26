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
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="search-student_roll_number" placeholder="رجسٹریشن نمبر سے تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="search-student_name" placeholder="نام سے تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="search-student_phone" placeholder="	فون نمبر سے تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <input type="date" id="search-student_date" class="form-control" value="<?php //echo date('Y-m-h'); ?>">
      </div>
      <div class="col-md-4 jameel-kasheeda">
        <button class="btn btn-info fw-semibold word-spacing-2px fs-4" id="search_button" onclick="search_student_Data()">تلاش کریں</button>
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
                <select id="students-limit" class="form-select" onchange="load_students_Data()">
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                  <option value="125">125</option>
                  <option value="150">150</option>
                </select>
              </div>
              <div class="me-2">
                <select id="students-order" class="form-select" onchange="load_students_Data()">
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
            <tbody class="border-top" id="student_details">
              <!-- <center id="users_spinner" style="display: none;">
                <div class="spinner-border text-primary" role="status" style="position: absolute; top:70%;">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </center> -->
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


<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Load data on page load with default value (10)
    load_students_Data();
  });

  function load_students_Data() {
    // users_spinner.style.display = "block";
    let studentsLimited = $("#students-limit").val();
    let studentsOrder = $("#students-order").val();

    $.ajax({
      url: 'filter_fetch_data.php',
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'load-students-Data',
        studentsLimited: studentsLimited,
        studentsOrder: studentsOrder
      },
      success: function(response) {
        console.log(response);
        // Update the result div with the loaded data
        $("#student_details").html(response.data);
      },
      // error: function(xhr, status, error) {
      //   users_spinner.style.display = "none";
      //   console.error(xhr.responseText);
      // }
    });
  }

  function search_student_Data() {

    // users_spinner.style.display = "block";
    let searchRollNum = document.getElementById("search-student_roll_number").value;
    let searchName = document.getElementById("search-student_name").value;
    let searchPhone = document.getElementById("search-student_phone").value;
    let searchDate = document.getElementById("search-student_date").value;


    $.ajax({
      url: 'filter_fetch_data.php',
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'search-student_Data',
        searchRollNum: searchRollNum,
        searchName: searchName,
        searchPhone: searchPhone,
        searchDate: searchDate
      },
      success: function(response) {
        console.log(response);
        // Update the result div with the loaded data
        $("#student_details").html(response.data);
      },
      // error: function(xhr, status, error) {
      //   users_spinner.style.display = "none";
      //   console.error(xhr.responseText);
      // }
    });
  }



</script>