<script>
  <?php if (isset($_SESSION['message'])) { ?>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("success", $_SESSION['message']);
    });
    <?php unset($_SESSION['message']); ?>
  <?php } ?>
  <?php if (isset($_SESSION['update'])) { ?>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("success", $_SESSION['update']);
    });
    <?php unset($_SESSION['update']); ?>
  <?php } ?>
  // <?php if (isset($_SESSION['update'])) { ?>
  //   document.addEventListener("DOMContentLoaded", function() {
  //     displayToast("warning", "آپ کے کوڈ میں ایررہے");
  //   });
  //   <?php unset($_SESSION['update']); ?>
  // <?php } ?>

  <?php if (isset($_SESSION['delete'])) { ?>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("danger", $_SESSION['delete']);
    });
    <?php unset($_SESSION['delete']); ?>
  <?php } ?>
</script>