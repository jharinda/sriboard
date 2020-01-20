<?php

  $severname="localhost";
  $dbusername="root";
  $dbpassword="";
  $dbname="sriboard";

  $conn =mysqli_connect($severname, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
    die("Connection failed".mysqli_connect_error());
  }

?>
