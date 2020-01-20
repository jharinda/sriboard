<?php

    session_start();
    if (isset($_SESSION['email'])) {
          header("Location: ../home/home.php");
    }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Sriboard - Sign up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="../sriboard/logandsignin.css">
    <link rel=" shortcut icon" href="../shortcuticon.png">



  </head>
  <body>
    <div class="Signupform">
      <img src="11.png">
      <h1>Sign Up Now</h1>
      <?php
      if (isset($_GET['error'])) {
          if ($_GET['error']=="invaliedemail")
          {
              echo '<p class="error">Enter a valid email</p>';
          }
          elseif ($_GET['error']=="fillallthemissinginformation")
          {
              echo '<p class="error">Fill the missing information</p>';
          }
           elseif ($_GET['error']=="invalidfirstname")
          {
              echo '<p class="error">Invalid first name</p>';
          }
            elseif ($_GET['error']=="invalidelastname")
          {
              echo '<p class="error">Invalid last name</p>';
          }
             elseif ($_GET['error']=="passwordsdonotmatch")
          {
              echo '<p class="error">Password mismatch</p>';
          }
          elseif ($_GET['error']=="invalidemail")
         {
             echo '<p class="error">Invaild e-mail</p>';
         }
         elseif ($_GET['error']=="agree")
        {
            echo '<p class="error">Please agree to our terms and conditions</p>';
        }
      }

      ?>

      <form action="signup2.php" method="post">
        <?php
        if (isset($_GET['firstname'])) {
            $firstname=$_GET['firstname'];
            echo'<input type="text" name="firstname" class="inputbox" value="'.$firstname.'" id="inputid" placeholder="Your First Name">';

        }else
         {
          echo'<input type="text" name="firstname" class="inputbox" id="inputid" placeholder="Your First Name">';
        }
        if (isset($_GET['lastname']))
        {
            $lastname=$_GET['lastname'];
            echo'<input type="text" name="lastname" class="inputbox" value="'.$lastname.'" id="inputid" placeholder="Your Last Name">';

        }
        else
         {
          echo'<input type="text" name="lastname" class="inputbox" id="inputid" placeholder="Your Last Name">';
        }
        if (isset($_GET['email']))
         {
            $email=$_GET['email'];
            echo' <input type="text" name="email" class="inputbox" value="'.$email.'" id="inputid" placeholder="Your Email">';

        }else
         {
          echo'<input type="text" name="email" class="inputbox" id="inputid" placeholder="Your Email">';
        }
        ?>


        <input type="password" name="pwd" class="inputbox" id="inputid" placeholder="Your password">
        <input type="password" name="cpwd" class="inputbox" id="inputid" placeholder="Confirm password">
        <p><input type="checkbox" name="box">I agree to the terms and conditions</p>
        <button type="sumbit" name="signup-submit" class="submitbtn">Sign Up</button>




        <a href="../signin/signin.php">Already have an account</a>
      </form>
        </div>
        <div class="bott">

        </div>
  </body>
</html>
