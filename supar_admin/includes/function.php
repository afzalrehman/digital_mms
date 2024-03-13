<?php include "../config/config.php";?>
<?php
function redirect($url, $message)
{
   $_SESSION['message'] = $message;
   header("Location: " . $url);
   exit();
};
function redirectdelete($url, $message)
{
   $_SESSION['delete'] = $message;
   header("Location: " . $url);
   exit();
};
function redirectupdate($url, $message)
{
   $_SESSION['update'] = $message;
   header("Location: " . $url);
   exit();
};

?>