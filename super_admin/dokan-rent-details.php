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
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="search-dokan_rent_name" placeholder="دکان کا نام سے تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5 jameel-kasheeda fw-semibold fs-4 word-spacing-2px" id="search-dokan_rent_type" placeholder="دکان کی قسم سے تلاش کریں &nbsp;......" />
          <i class="ti ti-search position-absolute top-50 start-1 translate-middle-y fs-6 mx-3"></i>
        </form>
      </div>
      <div class="col-md-4 mb-3">
        <input type="month" class="form-control fs-3" id="search-dokan_rent_month">
      </div>
      <div class="col-md-4 mb-3 jameel-kasheeda">
        <button class="btn btn-info fw-semibold word-spacing-2px fs-4" id="search_button" onclick="search_dokan_rent_Data()">تلاش کریں</button>
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
                <select id="dokan_rent-limit" class="form-select" onchange="load_dokan_Data()">
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
                  <option value="125">125</option>
                  <option value="150">150</option>
                </select>
              </div>
              <div class="me-2">
                <select id="dokan_rent-order" class="form-select" onchange="load_dokan_Data()">
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
              <tr class="fw-semibold text-center">
                <th class="fs-5 word-spacing-2px text-primary">#</th>
                <th class="fs-5 word-spacing-2px text-primary">دکان کا نام</th>
                <th class="fs-5 word-spacing-2px text-primary">دکان کی قسم</th>
                <th class="fs-5 word-spacing-2px text-primary">کل کرایہ</th>
                <th class="fs-5 word-spacing-2px text-primary">کرایا اداکیا</th>
                <th class="fs-5 word-spacing-2px text-primary">بقایا کرایہ</th>
                <th class="fs-5 word-spacing-2px text-primary">کرایہ کی تاریخ</th>
                <th class="fs-5 word-spacing-2px text-primary">انتخاب کریں</th>
              </tr>
            </thead>
            <tbody class="border-top" id="dokan_details">
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
    load_dokan_Data();
  });

  function load_dokan_Data() {
    let dokanRentLimited = $("#dokan_rent-limit").val();
    let dokanRentOrder = $("#dokan_rent-order").val();

    $.ajax({
      url: 'filter_fetch_data.php',
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'load-dokan_rent-Data',
        dokanRentLimited: dokanRentLimited,
        dokanRentOrder: dokanRentOrder
      },
      success: function(response) {
        console.log(response);
        // Update the result div with the loaded data
        $("#dokan_details").html(response.data);
      },
    });
  }


  function search_dokan_rent_Data() {
    let searchRentName = document.getElementById("search-dokan_rent_name").value;
    let searchRentType = document.getElementById("search-dokan_rent_type").value;
    let searchRentMonth = document.getElementById("search-dokan_rent_month").value;

    $.ajax({
      url: 'filter_fetch_data.php',
      type: 'POST',
      dataType: 'json',
      data: {
        action: 'search-dokan_rent-Data',
        searchRentName: searchRentName,
        searchRentType: searchRentType,
        searchRentMonth: searchRentMonth
      },
      success: function(response) {
        console.log(response);
        // Update the result div with the loaded data
        $("#dokan_details").html(response.data);
      },
    });
  }
</script>