<?php
    session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../header1.css">
    <link rel=" shortcut icon" href="../shortcuticon.png">

  </head>

    <div class="header">
        <div class="logowithname" >
            <li>
              <a href="../home/home.php">
              <img src="../logo1.jpg" alt="" id="logoimage">
            </a>
            </li>
          <div class="navigation">
            <ul>
              <li><a href="../sriboard/piano.php" class="navtabs">Grand Piano</a></li>
              <li><a href="../sriboard/pizzicato.php" class="navtabs">Pizzicato</a></li>
              <li><a href="../sriboard/epiano.php" class="navtabs">E.Piano</a></li>
              <?php
              if (isset($_SESSION['email']))
              {
                  echo '<li><a href="profile.html" class="navtabs">Profile</a></li>
                  <li><a href="../signin/signout.php" class="navtabs">Logout</a></li>';
              }else
              {
              echo'
              <li><a href="../signin/signin.php" class="navtabs">Login</a></li>
              <li><a href="../signup/signup.php" class="navtabs">Sign Up</a></li>';
              }?>


            </ul>
      </div>
    </div>
  </body>
</html>
