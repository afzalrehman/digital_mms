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
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">طلبہ کا داخلہ</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                طلبہ کا داخلہ
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
  // Query to fetch the madarsa information
  $selec_madarsa = "SELECT * FROM madarsa WHERE madarsa_id = 30";
  $result_madarsa = $conn->query($selec_madarsa);

  // Checking for errors
  if (!$result_madarsa) {
    die("Error in SQL query: " . $conn->error);
  }

  // Fetching madarsa information
  if ($result_madarsa->num_rows > 0) {
    $row_madarsa = $result_madarsa->fetch_assoc();
    if ($row_madarsa['madarsa_name'] == 'مدرسہ دارالعلوم حسینیہ') {
      $madarsa_name = 'HUS';
    }
    // Query to fetch the last registration number
    $gene_query = "SELECT `st_roll_no` FROM `students`  WHERE `madarsa_id` = 30";

    // Executing the query
    $gene_result = mysqli_query($conn, $gene_query);

    // Checking for errors
    if (!$gene_result) {
      die("Error in SQL query: " . mysqli_error($conn));
    }

    // Fetching the last registration number
    $gene_row = mysqli_fetch_array($gene_result);
    $last_reg_no = isset($gene_row['st_roll_no']) ? $gene_row['st_roll_no'] : null;

    // Generating a new registration number
    if (empty($last_reg_no)) {
      // If no previous registration number exists, start with "HUS_ST_00001"
      $auto_reg_no = $madarsa_name . "_ST_00001";
    } else {
      // Extracting the numeric part of the last registration number and incrementing it
      $idd = intval(substr($last_reg_no, 7)); // Assuming the numeric part starts from index 7
      $id = str_pad(strval($idd + 1), 5, '0', STR_PAD_LEFT);

      // Constructing the new registration number
      $auto_reg_no = $madarsa_name . "_ST_" . $id;
    }
  }
  ?>




  <!-- Annoucement Form (Start) -->
  <div class="row">
    <form action="code2.php" method="post" id="st-admission-form" enctype="multipart/form-data">
      <!-- Student Info -->
      <div class="col-12">
        <div class="card">
          <div class="border-bottom title-part-padding mt-3">
            <h4 class="card-title mb-0 fs-7 text-primary"> 1۔ طلبہ کے معلومات</h4>
          </div>
          <div class="card-body">

            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="rollNumber">رجسٹریشن نمبر</label>
                <input type="text" id="rollNumber" readonly name="roll_number" class="form-control fw-semibold fs-3" value="<?= $auto_reg_no ?>" />
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="reg_number">جی آر نمبر</label>
                <input type="number" name="reg_number" id="reg_number" class="form-control fw-semibold fs-3" placeholder="#04321" />
                <span class="error text-danger inter" id="reg_number_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_name">نام</label>
                <input type="text" name="std_name" id="std_name" class="form-control fw-semibold fs-4" placeholder="احمد" />
                <span class="error text-danger inter" id="std_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_dbo">تاریخ پیدائش</label>
                <input type="date" name="std_dbo" id="std_dbo" class="form-control fw-semibold fs-4" placeholder="DD/MM/YYYY" />
                <span class="error text-danger inter" id="std_dbo_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_gender">صنف</label>
                <select id="std_gender" name="std_gender" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="مرد" class="jameel-kasheeda">مرد</option>
                  <option value="عورت" class="jameel-kasheeda">عورت</option>
                </select>
                <span class="error text-danger inter" id="std_gender_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_accommodation">رہائش منتخب کریں</label>
                <select id="std_accommodation" name="std_accommodation" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                  <option value="" class="jameel-kasheeda">- - -</option>
                  <option value="رہائشی" class="jameel-kasheeda">رہائشی</option>
                  <option value="غیر رہائشی" class="jameel-kasheeda">غیر رہائشی</option>
                </select>
                <span class="error text-danger inter" id="std_accommodation_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_birth_place">مقام پیدائش</label>
                <input type="text" name="std_birth_place" id="std_birth_place" class="form-control fw-semibold fs-3" placeholder="کراچی" />
                <span class="error text-danger inter" id="std_birth_place_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="std_address">پتہ</label>
                <input type="text" name="std_address" id="std_address" class="form-control fw-semibold fs-4" placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" />
                <span class="error text-danger inter" id="std_address_err"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Father Info -->
      <div class="col-12">
        <div class="card">
          <div class="border-bottom title-part-padding mt-3">
            <h4 class="card-title mb-0 fs-7 text-primary"> 2۔ والدین کے معلومات</h4>
          </div>
          <div class="card-body">

            <div class="row g-4">
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_name">سرپرست کا نام</label>
                <input type="text" name="guar_name" id="guar_name" class="form-control fw-semibold fs-4" placeholder="شفیع عالم" />
                <span class="error text-danger inter" id="guar_name_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_relation">سرپرست سے رشتہ</label>
                <input type="text" id="guar_relation" name="guar_relation" class="form-control fw-semibold fs-4" placeholder="والدِ محترم" />
                <span class="error text-danger inter" id="guar_relation_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_number">فون نمبر</label>
                <input type="number" name="guar_number" id="guar_number" class="form-control fw-semibold fs-3" placeholder="03186432506" />
                <span class="error text-danger inter" id="guar_number_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_cnic">CNIC نمبر</label>
                <input type="number" name="guar_cnic" id="guar_cnic" class="form-control fw-semibold fs-3" placeholder="03186432506" />
                <span class="error text-danger inter" id="guar_cnic_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_address">پتہ</label>
                <input type="text" name="guar_address" id="guar_address" class="form-control fw-semibold fs-4" placeholder="36/جی لانڈھی کراچی۔ گلی نمبر 1" />
                <span class="error text-danger inter" id="guar_address_err"></span>
              </div>
              <div class="col-md-6">
                <label class="fs-5 mb-1" for="guar_address">ای میل</label>
                <input type="text" name="guar_email" id="guar_email" class="form-control fw-semibold fs-4" placeholder="ای میل" />
                <span class="error text-danger inter" id="guar_email_err"></span>
              </div>

            </div>
          </div>
        </div>


        <!-- Education Info -->
        <div class="col-12">
          <div class="card">
            <div class="border-bottom title-part-padding mt-3">
              <h4 class="card-title mb-0 fs-7 text-primary"> 3۔ تعلیم کے معلومات</h4>
            </div>
            <div class="card-body">

              <div class="row g-4">
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="pre_school">سابقہ مدرسہ</label>
                  <input type="text" name="pre_school" id="pre_school" class="form-control fw-semibold fs-4" placeholder="دارالعلوم کراچی" />
                  <span class="error text-danger inter" id="pre_school_err"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="pre_class">سابقہ درجہ</label>
                  <input type="text" name="pre_class" id="pre_class" class="form-control fw-semibold fs-4" placeholder="اوٰلی" />
                  <span class="error text-danger inter" id="pre_class_err"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="next_class">مطلوبہ درجہ</label>
                  <input type="text" name="next_class" id="next_class" class="form-control fw-semibold fs-4" placeholder="ثانیہ" />
                  <span class="error text-danger inter" id="next_class_err"></span>
                </div>
                <div class="col-md-6">
                  <label class="fs-5 mb-1" for="adm_date">تاریخ داخلہ</label>
                  <input type="date" id="adm_date" name="adm_date" class="form-control fw-semibold fs-3" placeholder="DD/MM/YYYY" />
                  <span class="error text-danger inter" id="adm_date_err"></span>
                </div>

              </div>
            </div>
          </div>

          <!-- Madarsa Info -->
          <div class="col-lg-12">
            <div class="card">
              <div class="border-bottom title-part-padding mt-3">
                <h4 class="card-title mb-0 fs-7 text-primary"> 4۔ مدرسہ کے معلومات</h4>
              </div>
              <div class="card-body">
                <div class="row g-4">
                  <div class="col-lg-6">
                    <label class="fs-5 mb-1">مدرسہ </label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" id="studentMadarasa" name="madarasa">
                      <option class="jameel-kasheeda" value="">---</option>
                    </select>
                    <span class="text-danger inter studentMadarasa" id="studentMadarasa_err"></span>
                  </div>

                  <div class="col-md-6 mb-2">
                    <label class="fs-5 mb-1" for="MadYear">تعلیمی سال منتخب کریں</label>
                    <select id="MadYear" name="std-dep" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="" class="jameel-kasheeda">- - -</option>
                    </select>
                    <span class="error text-danger inter" id="MadYear_err"></span>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="fs-5 mb-1">شعبہ </label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="department" id="department">
                      <option class="jameel-kasheeda" value="">---</option>
                    </select>
                    <span class="text-danger inter classdepartment" id="department_err"></span>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label class="fs-5 mb-1">کلاس</label>
                    <select class="form-control fw-semibold fs-3 jameel-kasheeda" name="class" id="studentclass">
                      <option class="jameel-kasheeda" value="">---</option>
                    </select>
                    <span class="inter text-danger"><?php if (isset($_SESSION['class_exit'])) {
                                                      echo $_SESSION['class_exit'];
                                                      unset($_SESSION['class_exit']);
                                                    } ?></span>
                    <span class="text-danger inter error" id="class_err"></span>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="fs-5 mb-1" for="section">سیکشن منتخب کریں</label>
                    <select id="section" name="section" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="" class="jameel-kasheeda">- - -</option>
                    </select>
                    <span class="error text-danger inter" id="section_err"></span>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="fs-5 mb-1" for="std_qadeem">منتخب کریں</label>
                    <select id="std_qadeem" name="std_qadeem" class="form-control fw-semibold jameel-kasheeda fs-4 cursor-pointer" data-allow-clear="true">
                      <option value="" class="jameel-kasheeda">- - -</option>
                      <option value="قدیم" class="jameel-kasheeda">قدیم</option>
                      <option value="جدید" class="jameel-kasheeda">جدید</option>
                    </select>
                    <span class="error text-danger inter" id="std_qadeem_err"></span>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="fs-5 mb-1" for="admi_fees">داخلہ فیس</label>
                    <input type="text" name="admi_fees" id="admi_fees" class="form-control fw-semibold fs-4" placeholder="داخلہ فیس" />
                    <span class="error text-danger inter" id="admi_fees_err"></span>
                  </div>
                  <div class="col-md-6 mb-2">
                    <label class="fs-5 mb-1" for="monthly_fees">ماہانہ فیس</label>
                    <input type="text" name="monthly_fees" id="monthly_fees" class="form-control fw-semibold fs-4" placeholder="ماہانہ فیس" />
                    <span class="error text-danger inter" id="monthly_fees_err"></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Submit Button -->
            <div class="col-md-12 mt-4 jameel-kasheeda">
              <button type="submit" id="submit" name="std_form_submit" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
            </div>
          </div>
        </div>
      </div>
    </form>
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

<script src="../assets/js/error/st-admission-form.js"></script>
<?php
include "inc/footer.php";
?>
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
          if (type === "studentMadarasa") {
            $('#studentMadarasa').append(data);
          } else if (type === "mad_new_year") {
            $('#MadYear').html(data);
          } else if (type === "Student_department") {
            $('#department').html(data);
          } else if (type === "student_class") {
            $('#studentclass').html(data);
          } else if (type === "student_section") {
            $('#section').html(data);
          }
        }
      });
    }

    loadData("studentMadarasa");

    $("#studentMadarasa").on("change", function() {
      var department = $("#studentMadarasa").val();
      if (department != "") {
        loadData("mad_new_year", department);
      } else {
        $('#MadYear').html("");
      }
    });

    $("#studentMadarasa").on("change", function() {
      var next_class = $("#studentMadarasa").val();
      if (next_class != "") {
        loadData("Student_department", next_class);
      } else {
        $("#department").html("");
      }
    });

    $("#department").on("change", function() {
      var next_class = $("#department").val();
      if (next_class != "") {
        loadData("student_class", next_class);
      } else {
        $("#studentclass").html("");
      }
    });
    $("#studentclass").on("change", function() {
      var next_class = $("#studentclass").val();
      if (next_class != "") {
        loadData("student_section", next_class);
      } else {
        $("#section").html("");
      }
    });



  });
</script>