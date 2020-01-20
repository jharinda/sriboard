<?php
  require '../connectdatabase.php';

  session_start();

  $stmt=mysqli_stmt_init($conn);

  $email=$_SESSION['email'];

  $sql="SELECT recordnotes,delaynotes FROM users WHERE email='$email'";
  $result=$conn->query($sql);
  if ($result->num_rows>0) {
    $row=$result->fetch_assoc();
    $recordNotes=$row["recordnotes"];
    $delayNotes=$row["delaynotes"];
    header("Location: piano.php?octave=0&recordNotes=".$recordNotes."&delayNotes=".$delayNotes);
  }
  /*$stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: piano.php?error=sqlerror");
    exit();
  }
  else {
    echo $sql;
  }*/

 ?>
