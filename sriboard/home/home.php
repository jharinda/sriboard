<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="header1.css">
    <link rel="stylesheet" href="footer.css">
  </head>
  <body>
    <header>
      <div class="header">
          <div class="logowithname">
            <li><img src="../logo1.jpg" alt="" id="logoimage"></li>


        <div class="navigation">
           <ul>
            <li><a href="home.html" class="navtabs">Home</a></li>
            <li><a href="Pizzicato.html" class="navtabs">Contact us</a></li>
            <li><a href="EPiano.html" class="navtabs">About us</a></li>
            <?php
              if (isset($_SESSION['user'])) {
                echo '<li><a href="../signin/signout.php" class="navtabs">Logout</a></li>';
              }
              else {
                echo '<li><a href="../signup/signup.html" class="navtabs">Sign up</a></li>
                <li><a href="../signin/signin.html" class="navtabs">Login</a></li>';
              }
             ?>
          </ul>
        </div>
      </div>
    </header>

    <style>
body  {
  background-image: url("main.jfif");
  background-size:cover;
}
</style>
<table>
  <tr>
    <th>&nbsp;Piano</th>
    <th>Pizzicato</th>
    <th>E.Piano</th>
  </tr>
</table>
    <div class="abcd">
      <div class="img1">
          <a href="../sriboard/sriboard.html"><img class="first" src="piano.jpg"  ></a>
      </div>

      <div class="img2">
        <a href="../sriboard/pizzicato.php"><img class="second"src="pizz.jpg" ></a>
      </div>

      <div class="img3">
        <a href="../sriboard/epiano.php"><img class="third" src="epiano.jpg" ></a>
      </div>

    </div>
<footer>
  <div class="foot">
  <p>Copyright &copy; 2020, Sriboard </p>
</div>
</footer>
  </body>
</html>
