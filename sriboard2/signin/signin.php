

<?php

    session_start();
    if (isset($_SESSION['email'])) {
          header("Location: ../home/home.php");
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sriboard - Sign in</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="../sriboard/logandsignin.css">
    <link rel=" shortcut icon" href="../shortcuticon.png">

  </head>
  <?php


  ?>
  <body>
    <div class="Signinform">
      <img src="11.png">
      <h1>Sign in</h1>
      <?php

      if (isset($_GET['error'])) {
          if ($_GET['error']=="wrongpassword") {
                echo '<p class="error">Wrong Password</p>';
          }
          elseif ($_GET['error']=="fillthemissinginfo")
            {
              echo '<p class="error">Fill the Missing Information</p>';
            }
          elseif ($_GET['error']=="loggedout")
            {
              echo '<p class="error">Login to Play</p>';


            }
          }

      ?>

      <form action="signin2.php" method="post">
<input type="text" name="email" class="inputbox" placeholder="Your Email">
<input type="password" name="password" class="inputbox" placeholder="Your Password">
<?php
if (isset($_GET['instrument'])) {

  $inst=$_GET['instrument'];
  echo '<input type="hidden" name="instrument" value="'.$inst.'">';

}
?>

<button type="submit" name="signin-submit" class="submitbtn">Sign In</button>

      </form>
      <p><a href="../signup/signup.php">I dont have an account</a></p>
      </div>

  </body>
</html>
