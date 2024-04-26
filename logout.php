<?php

session_start();
session_unset();
session_destroy();

setcookie('regNoCookie', '', time() - 86400);
setcookie('passwordCookie', '', time() - 86400);

header('location:login.php');
?>