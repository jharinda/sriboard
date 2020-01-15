<?php
  require '../connectdatabase.php';

  session_start();

  $stmt=mysqli_stmt_init($conn);

  $email=$_SESSION['email'];

  $sql="SELECT recordnotes FROM users WHERE email='$email'";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: piano.php?error=sqlerror");
    exit();
  }
  else {
    echo $sql;
  }

 ?>
