<?php
include "config.php";
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

// Total students (Male)
function total_students_male()
{
   global $conn;
   $sql = "SELECT * FROM `students` WHERE `std_gender` = 'مرد'";
   $result = mysqli_query($conn, $sql);

   if (!$result) {
      return "Error " . mysqli_error($conn);
   }

   $total_male = mysqli_num_rows($result);
   return $total_male;
}


// Total students (Female)
function total_students_female()
{
   global $conn;
   $sql = "SELECT * FROM `students` WHERE `std_gender` = 'عورت'";
   $result = mysqli_query($conn, $sql);

   if (!$result) {
      return "Error " . mysqli_error($conn);
   }

   $total_female = mysqli_num_rows($result);
   return $total_female;
}

// Total teacher (male)
function total_teacher_male()
{
   global $conn;
   $sql = "SELECT * FROM `teacher` WHERE `gander` = 'معلم'";
   $result = mysqli_query($conn, $sql);

   if (!$result) {
      return "Error " . mysqli_error($conn);
   }

   $total_male = mysqli_num_rows($result);
   return $total_male;
}

// Total teacher (female)
function total_teacher_female()
{
   global $conn;
   $sql = "SELECT * FROM `teacher` WHERE `gander` = 'معلمہ'";
   $result = mysqli_query($conn, $sql);

   if (!$result) {
      return "Error " . mysqli_error($conn);
   }

   $total_female = mysqli_num_rows($result);
   return $total_female;
}

// total income 
function total_income()
{
   global $conn;
   $sql = "SELECT SUM(incomeAmount) AS total FROM income";
   $result = mysqli_query($conn, $sql);
   if (!$result) {
      return "Error " . mysqli_error($conn);
   }
   $total_income = mysqli_fetch_assoc($result);
   return number_format($total_income['total']);
}


// total expense
function total_expense()
{
   global $conn;
   $sql = "SELECT SUM(expanceAmount) AS total FROM expance";
   $result = mysqli_query($conn, $sql);
   if (!$result) {
      return "Error " . mysqli_error($conn);
   }
   $total_expense = mysqli_fetch_assoc($result);
   return number_format($total_expense['total']);
}

// total balance
function total_balance()
{
   global $conn;
   $sql = "SELECT SUM(incomeAmount) - SUM(expanceAmount) AS total FROM income, expance";
   $result = mysqli_query($conn, $sql);
   if (!$result) {
      return "Error " . mysqli_error($conn);
   }
   $total_balance = mysqli_fetch_assoc($result);
   return number_format($total_balance['total']);
}


// total loan 
function total_loan()
{
   global $conn;
   $sql = "SELECT SUM(loan_amount) AS total FROM loan";
   $result = mysqli_query($conn, $sql);
   if (!$result) {
      return "Error " . mysqli_error($conn);
   }
   $total_loan = mysqli_fetch_assoc($result);
   return number_format($total_loan['total']);
}