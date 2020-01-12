<?php


  if (isset($_POST['signin-submit'])) {
          require '../connectdatabase.php';
          $email=$_POST['email'];
          $pwd=$_POST['password'];
          $instrument=$_POST['instrument'];


          if (empty($email)||empty($pwd)) {
            header("Location: signin.php?error=fillthemissinginfo&email=".$email);
            exit();
          }
          else
           {
              $sql="SELECT * from users where email=?";
              $stmt=mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("Location: signin.php?error=sqlerror&email=".$email);
              }
              else {

                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                if ($row=mysqli_fetch_assoc($result))
                {
                      $pwdcheck=password_verify($pwd, $row['userpwd']);
                      if ($pwdcheck == false) {
                        header("Location: signin.php?error=wrongpassword");
                        exit();
                      }
                      else if($pwdcheck==true) {
                            session_start();
                            $_SESSION['email']=$row['email'];

                            if (isset($instrument))
                            {
                              header("Location: ../sriboard/".$instrument.".php?login=success");
                              exit();
                            }
                            else
                            {
                              header("Location: ../home/home.php?login=success");
                              exit();
                            }


                    }
                      else
                      {
                        header("Location: signin.php?error=wrongpassword&email=".$email);
                        exit();
                      }
                 }
                else
                {
                  header("Location: signin.php?error=nouser");
                  exit();
                }
              }
          }



  }
  else
  {
      header("Location: signin.php");
      exit();
  }


?>
