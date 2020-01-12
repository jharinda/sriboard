<?php

    if (isset($_POST['signin-submit'])) {
      require '../connectdatabase.php';
      $email=$_POST['email'];
      $password=$_POST['password'];

      if (empty($email)||(empty($password))) {
        header("Location: signin.html?error=fillthemissinginfo&email=".$email);
      }
      else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header  ("Location: signin.html?error=enteravaliedemail");
      }
      else {
        $sql= "SELECT * FROM users WHERE email=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: signin.html");
        }
        else {
          mysqli_stmt_bind_param($stmt,"s",$email);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row=mysqli_fetch_assoc($result)) {
            $pwdcheck=password_verify($password,$row['userpwd']);
            if ($pwdcheck==false) {
              header  ("Location: signin.html?error=emailorpasswordincorrect");
              exit();
            }
            else if ($pwdcheck==true) {
              session_start();
              $_SESSION['user']=$row['firstname'];
              header  ("Location: ../home/home.php?login=success");
              exit();
            }
            else{
              header  ("Location: signin.html?error=");
              exit();
            }
          }
          else{
            header  ("Location: signin.html?error=emailorpasswordincorrect");
            exit();
          }
        }
      }
  }
  else{
    header("Location: signin.html");
    exit();
  }


?>
