<?php
session_start();
include "../includes/function.php";
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

  <!-- Income Form (Start) -->
  <div class="row">

    <!-- User Info -->
    <form action="code2.php" method="POST" enctype="multipart/form-data">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row g-4">
              <div class="col-lg-6 mb-3">
                <label for="dokanName" class=" fs-5 mb-1">دکان کا نام</label>
                <input type="text" class="form-control fs-3" id="dokanName" name="dokan_name" placeholder="دکان کا نام" required>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="dokanAddress" class=" fs-5 mb-1">دکان کا پتہ</label>
                <input type="text" class="form-control fs-3" id="dokanAddress" name="dokan_address" placeholder="دکان کا پتہ" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="malikName" class=" fs-5 mb-1">دکان کے مالک کا نام</label>
                <input type="text" class="form-control fs-3" id="malikName" name="dokan_owner_name" placeholder="دکان کے مالک کا نام" required>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="dokanType" class=" fs-5 mb-1">دکان کی قسم</label>
                <input type="text" class="form-control fs-3" id="dokanType" name="dokan_type" placeholder="دکان کی قسم" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="kiraya" class=" fs-5 mb-1">دکان کا کرایہ</label>
                <input type="text" class="form-control fs-3" id="kiraya" name="dokan_rent" placeholder="دکان کا کرایہ">
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
          <button type="submit" name="dokan_insert" class="btn btn-primary fw-semibold fs-5">ایڈ کریں</button>
        </div>
    </form>
  </div>
</div>
</div>
<!-- Income Form (End) -->
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
