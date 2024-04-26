<?php
session_start();
include "../includes/config.php";
include "../includes/function.php";

// ====================================== dokan-edit.php (dokan_update) =========================================

if (isset($_POST['dokan_update_data'])) {
  // Establish database connection (assuming $conn is already defined)

  // Escape user inputs to prevent SQL injection
  $dokan_id = mysqli_real_escape_string($conn, $_POST['dokan_id']);
  $dokan_name = mysqli_real_escape_string($conn, $_POST['dokan_name']);
  $dokan_address = mysqli_real_escape_string($conn, $_POST['dokan_address']);
  $dokan_owner_name = mysqli_real_escape_string($conn, $_POST['dokan_owner_name']);
  $dokan_type = mysqli_real_escape_string($conn, $_POST['dokan_type']);
  $dokan_rent = mysqli_real_escape_string($conn, $_POST['dokan_rent']);

  // Set default values for images
  $dokan_lease = '';
  $dokan_license = '';
  $owner_cnic = '';
  $owner_image = '';

  // Check if image is uploaded and update accordingly
  if (isset($_FILES['dokan_lease']['name']) && $_FILES['dokan_lease']['error'] === UPLOAD_ERR_OK) {
    $dokan_lease = rand(111111111, 999999999) . '_' . basename($_FILES['dokan_lease']['name']);
    move_uploaded_file($_FILES['dokan_lease']['tmp_name'], '../media/dokan/' . $dokan_lease);
  }

  if (isset($_FILES['dokan_license']['name']) && $_FILES['dokan_license']['error'] === UPLOAD_ERR_OK) {
    $dokan_license = rand(111111111, 999999999) . '_' . basename($_FILES['dokan_license']['name']);
    move_uploaded_file($_FILES['dokan_license']['tmp_name'], '../media/dokan/' . $dokan_license);
  }

  if (isset($_FILES['owner_cnic']['name']) && $_FILES['owner_cnic']['error'] === UPLOAD_ERR_OK) {
    $owner_cnic = rand(111111111, 999999999) . '_' . basename($_FILES['owner_cnic']['name']);
    move_uploaded_file($_FILES['owner_cnic']['tmp_name'], '../media/dokan/' . $owner_cnic);
  }

  if (isset($_FILES['owner_image']['name']) && $_FILES['owner_image']['error'] === UPLOAD_ERR_OK) {
    $owner_image = rand(111111111, 999999999) . '_' . basename($_FILES['owner_image']['name']);
    move_uploaded_file($_FILES['owner_image']['tmp_name'], '../media/dokan/' . $owner_image);
  }

  // Set updated_by and updated_date
  $updated_by = 'Abu Hammad';
  $updated_date = date('Y-m-d');

  // Ensure $dokan_id is properly set (assuming it's fetched or passed from somewhere)

  // Construct the update query
  $dokan_update_query = "UPDATE `dokan` SET 
  `dokan_name` = '$dokan_name', 
  `dokan_address` = '$dokan_address', 
  `dokan_owner_name` = '$dokan_owner_name', 
  `dokan_type` = '$dokan_type', 
  `dokan_rent` = '$dokan_rent'";

  // Append optional fields to the query if they are set
  if ($dokan_lease !== '') {
    $dokan_update_query .= ", `dokan_lease` = '$dokan_lease'";
  }

  if ($dokan_license !== '') {
    $dokan_update_query .= ", `dokan_license` = '$dokan_license'";
  }

  if ($owner_cnic !== '') {
    $dokan_update_query .= ", `owner_cnic` = '$owner_cnic'";
  }

  if ($owner_image !== '') {
    $dokan_update_query .= ", `owner_image` = '$owner_image'";
  }

  // Append updated_by and updated_date
  $dokan_update_query .= ", `updated_by` = '$updated_by', `updated_date` = '$updated_date' WHERE `dokan_id` = '$dokan_id'";

  // Execute the update query
  $dokan_update = mysqli_query($conn, $dokan_update_query);

  // Check if update was successful and redirect accordingly
  if ($dokan_update) {
    redirect("dokan-details.php", "Your data has been updated successfully");
    exit();
  } else {
    redirect("dokan-details.php", "Your data has not been updated successfully");
    exit();
  }
}


include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
<style>
  .preview-image {
    max-width: 100%;
    height: auto;
    margin-top: 0.5rem;
  }
</style>
<div class="container-fluid">
  <!-- Main Content Header Card (Start) -->
  <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="my-3 fs-8 text-primary word-spacing-2px">دوکان فارم</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
              </li>
              <li class="breadcrumb-item fs-4" aria-current="page">
                دوکان فارم
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
  if (isset($_GET['dokan_edit_id'])) {
    $id = $_GET['dokan_edit_id'];
    $select_query = "SELECT * FROM `dokan` WHERE `dokan_id` = '$id'";
    $result = mysqli_query($conn, $select_query);
    if ($result->num_rows > 0) {
      while ($fetch = mysqli_fetch_assoc($result)) {

  ?>

        <!-- Income Form (Start) -->
        <div class="row">
          <!-- User Info -->
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row g-4">
                    <input type="text" class="form-control fs-3" hidden name="dokan_id" value="<?= $fetch['dokan_id'] ?>">
                    <div class="col-lg-6 mb-3">
                      <label for="dokanName" class=" fs-5 mb-1">دکان کا نام</label>
                      <input type="text" class="form-control fs-3" id="dokan_name" name="dokan_name" placeholder="دکان کا نام" value="<?= $fetch['dokan_name'] ?>">
                      <span class="error text-danger inter" id="dokan_name_err"></span>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="dokanAddress" class=" fs-5 mb-1">دکان کا پتہ</label>
                      <input type="text" class="form-control fs-3" id="dokan_address" name="dokan_address" placeholder="دکان کا پتہ" value="<?= $fetch['dokan_address'] ?>">
                      <span class="error text-danger inter" id="dokan_address_err"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <label for="malikName" class=" fs-5 mb-1">دکان کے مالک کا نام</label>
                      <input type="text" class="form-control fs-3" id="dokan_owner_name" name="dokan_owner_name" placeholder="دکان کے مالک کا نام" value="<?= $fetch['dokan_owner_name'] ?>">
                      <span class="error text-danger inter" id="dokan_owner_name_err"></span>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="dokanType" class=" fs-5 mb-1">دکان کی قسم</label>
                      <input type="text" class="form-control fs-3" id="dokan_type" name="dokan_type" placeholder="دکان کی قسم" value="<?= $fetch['dokan_type'] ?>">
                      <span class="error text-danger inter" id="dokan_type_err"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <label for="kiraya" class=" fs-5 mb-1">دکان کا کرایہ</label>
                      <input type="text" class="form-control fs-3" id="dokan_rent" name="dokan_rent" placeholder="دکان کا کرایہ" value="<?= $fetch['dokan_rent'] ?>">
                      <span class="error text-danger inter" id="dokan_rent_err"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="border-bottom title-part-padding mt-3">
                  <h4 class="card-title mb-0 fs-7 text-primary"> دکان کے دستاویزات:
                  </h4>
                </div>
                <div class="card-body">
                  <div class="row jameel-kasheeda fw-semibold g-4">
                    <div class="col-lg-6 mb-3">
                      <label for="leaseAgreement" class="fs-5 mb-1">دکان کا لیز اگریمنٹ یا کرایہ کا معاہدہ</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="dokan_lease" class="custom-file-input" hidden id="leaseAgreement" onchange="previewImage(this, 'leasePreview')">
                        </div>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-primary rounded" onclick="document.getElementById('leaseAgreement').click()">تصویر اپلوڈ کریں</button>
                          <button type="button" class="btn btn-danger rounded ml-2" onclick="resetPreview('leaseAgreement', 'leasePreview')">ری سیٹ</button>
                        </div>
                      </div>
                      <img id="leasePreview" class="preview-image mt-2" src="#" alt="تصویر دستیاب نہیں ہے" style="display: none;">
                    </div>

                    <div class="col-lg-6 mb-3">
                      <label for="license" class="fs-5 mb-1">دکان کا لائسنس (اگر ضروری ہے)</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="dokan_license" class="custom-file-input" hidden id="license" onchange="previewImage(this, 'licensePreview')">
                        </div>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-primary rounded" onclick="document.getElementById('license').click()">تصویر اپلوڈ کریں</button>
                          <button type="button" class="btn btn-danger rounded ml-2" onclick="resetPreview('license', 'licensePreview')">ری سیٹ</button>
                        </div>
                      </div>
                      <img id="licensePreview" class="preview-image mt-2" src="#" alt="تصویر دستیاب نہیں ہے" style="display: none;">
                    </div>

                    <div class="col-lg-6 mb-3">
                      <label for="ownerID" class="fs-5 mb-1">دکان کے مالک کا شناختی کارڈ کا نسخہ</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="owner_cnic" class="custom-file-input" hidden id="ownerID" onchange="previewImage(this, 'ownerIDPreview')">
                        </div>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-primary rounded" onclick="document.getElementById('ownerID').click()">تصویر اپلوڈ کریں</button>
                          <button type="button" class="btn btn-danger rounded ml-2" onclick="resetPreview('ownerID', 'ownerIDPreview')">ری سیٹ</button>
                        </div>
                      </div>
                      <img id="ownerIDPreview" class="preview-image mt-2" src="#" alt="تصویر دستیاب نہیں ہے" style="display: none;">
                    </div>

                    <div class="col-lg-6 mb-3">
                      <label for="ownerImage" class="fs-5 mb-1">دکان کے مالک کی تصویر</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="owner_image" class="custom-file-input" hidden id="ownerImage" onchange="previewImage(this, 'ownerImagePreview')">
                        </div>
                        <div class="input-group-append ja">
                          <button type="button" class="btn btn-primary rounded" onclick="document.getElementById('ownerImage').click()">تصویر اپلوڈ کریں</button>
                          <button type="button" class="btn btn-danger rounded ml-2" onclick="resetPreview('ownerImage', 'ownerImagePreview')">ری سیٹ</button>
                        </div>
                      </div>
                      <img id="ownerImagePreview" class="preview-image mt-2" src="#" alt="تصویر دستیاب نہیں ہے" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>


              <!-- Submit Button -->
              <div class="col-md-12 mt-4 jameel-kasheeda">
                <button type="submit" name="dokan_update_data" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
              </div>
          </form>
        </div>
  <?php
      }
    } else {
      echo '<div class="alert alert-danger">دکان کی معلومات ڈیٹا بیس پھے نہیں ہے</div>';
    }
  }
  ?>
</div>
</div>
<!-- Income Form (End) -->
</div>
<!-- Main Content (End) -->
</div>
<div class="dark-transparent sidebartoggler"></div>
</div>
<script src="../assets/js/error/dokanFormError.js"></script>
<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>
<script>
  function previewImage(input, imgID) {
    const preview = document.getElementById(imgID);
    const file = input.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "#";
      preview.style.display = 'none';
    }
  }

  function resetPreview(inputID, imgID) {
    document.getElementById(inputID).value = ''; // Clear the file input value
    document.getElementById(imgID).src = "#"; // Clear the image source
    document.getElementById(imgID).style.display = 'none'; // Hide the image preview
  }
</script>