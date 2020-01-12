<?php

  if (isset($_POST['signup-submit'])) {
    require '../connectdatabase.php';
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $confirm=$_POST['cpwd'];

    if (empty($firstname)|| (empty($lastname))||(empty($email))||(empty($password))||(empty($confirm))) {
      header("Location: signup.html?error=fillallthemissinginformation&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
      exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location: signup.html?error=invalidemail&fisrtname=".$firstname."&lastname=".$lastname);
    exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$firstname)){
    header("Location: signup.html?error=invalidfirstname&email=".$email."&lastname=".$lastname);
    exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$lastname)){
    header("Location: signup.html?error=invalidelastname&fisrtname=".$firstname."&email=".$email);
    exit();
    }
    else if($password!==$confirm){
    header("Location: signup.html?error=passwordsdonotmatch");
    exit();
    }
    else{
      $sql = "SELECT email FROM users WHERE email=?";
      $stmt =mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: signup.html?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck=mysqli_stmt_num_rows($stmt);
        if ($resultcheck > 0) {
          header("Location: signup.html?error=emailtaken");
          exit();
        }
        else{
          $sql="INSERT INTO users(firstname,lastname,email,userpwd) VALUES (?,?,?,?)";
          $stmt=mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: signup.html?error=sqlerror");
            exit();
          }
          else{
            $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ssss",$firstname,$lastname,$email,$hashedpwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../signin/signin.html");
          }
        }

      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
  header("Location: signup.html");
  exit();
}
 ?>
