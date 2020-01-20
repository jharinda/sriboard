
<?php
    require '../header1.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SriBoard</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../header1.css">
    <link rel="stylesheet" href="footer.css">
  </head>
  <body>

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
        <?php
            if (isset($_SESSION['email'])) {
              echo '<a href="../sriboard/piano.php?octave=0"><img class="first" id="forhover" src="piano.jpg"  ></a>';
            }else {
              echo '<a href="../signin/signin.php?error=loggedout&instrument=piano"><img class="second" id="forhover"src="piano.jpg" ></a></a>';
            }
        ?>
      </div>

      <div class="img2">
        <?php
            if (isset($_SESSION['email'])) {
              echo '<a href="../sriboard/pizzicato.php?octave=0"><img class="second" id="forhover"src="pizz.jpg" ></a></a>';
            }else {
              echo '<a href="../signin/signin.php?error=loggedout&instrument=pizzicato"><img class="second" id="forhover"src="pizz.jpg" ></a></a>';
            }
        ?>

      </div>

      <div class="img3">
        <?php
            if (isset($_SESSION['email'])) {
              echo '<a href="../sriboard/epiano.php?octave=0"><img class="third" id="forhover" src="epiano.jpg" ></a>';
            }else {
              echo '<a href="../signin/sign.php?error=loggedout&instrument=epiano"><img class="third" id="forhover" src="epiano.jpg" ></a>';
            }
        ?>

      </div>

    </div>
<footer>
  <div class="foot">
  <p>Copyright &copy; 2020, Sriboard </p>
  </div>
</footer>
  </body>
</html>
