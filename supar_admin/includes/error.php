<script>
  <?php if (isset($_SESSION['message'])) { ?>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("success", "آپ کا دیٹا ایڈ ہوچکا ہے");
    });
    <?php unset($_SESSION['message']); ?>
  <?php } ?>
  <?php if (isset($_SESSION['update'])) { ?>
    document.addEventListener("DOMContentLoaded", function() {
      displayToast("success", "آپ کا دیٹا اپڈیٹ ہوچکا ہے");
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
      displayToast("danger", "ڈیٹا حذف کر دیا گیا ہے ");
    });
    <?php unset($_SESSION['delete']); ?>
  <?php } ?>
</script>