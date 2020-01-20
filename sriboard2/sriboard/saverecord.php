<?php
  require '../connectdatabase.php';

  session_start();

  //$sql="INSERT INTO users (recordnotes,delaynotes) VALUES (?,?)";

  $email=$_SESSION['email'];

  $recordNotes=$_GET['recordNotes'];
  $delayNotes=$_GET['delayNotes'];
  $sql="UPDATE users SET recordnotes='$recordNotes',delaynotes='$delayNotes' WHERE email='$email'";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: piano.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt,"ss",$recordNotes,$delayNotes);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    header("Location: piano.php");
  }
 ?>
