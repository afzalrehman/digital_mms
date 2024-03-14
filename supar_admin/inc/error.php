<!-- delete error message  -->
<?php if (isset($_SESSION['delete'])) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("danger", "<?php echo $_SESSION['delete']; ?>");
    });
  </script>
  <?php unset($_SESSION['delete']); ?>
<?php } ?>

<!-- inert error message  -->
<?php if (isset($_SESSION['message'])) {
?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("success", "<?php echo $_SESSION['message']; ?>");
    });
  </script>
  <?php unset($_SESSION['message']); ?>
<?php } ?>

<?php if (isset($_SESSION['update'])) { ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("warning", "<?php echo $_SESSION['update']; ?>");
    });
  </script>
  <?php unset($_SESSION['update']); ?>
<?php } ?>

<!-- <?php if (isset($_SESSION['update'])) { ?>
  <script>
    // document.addEventListener("DOMContentLoaded", function() {
    // displayToast("warning", "آپ کے کوڈ میں ایررہے");
    // });
  </script>
 <?php unset($_SESSION['update']); ?>
   <?php } ?> -->