<?php

    session_start();

 ?>
 <?php
    if (!isset($_SESSION['email'])){
      header("Location: ../signin/signin.php?error=loggedout&instrument=epiano");
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sriboard</title>
    <link rel="stylesheet" href="sriboard.css">
    <link rel="stylesheet" href="../header1.css">
    <script type="text/javascript" src="sriboard.js" defer></script>
    <script type="text/javascript">
      function normalOctave(){
        location.replace("epiano.php?octave=0");
      }
      function lowOctave(){
        location.replace("epiano.php?octave=-1");
      }
      function highOctave(){
        location.replace("epiano.php?octave=1");
      }
    </script>
  </head>
  <body>
    <header>
      <div class="header">
          <div class="logowithname" >
              <li>
                <a href="../home/home.php">
                <img src="../logo1.jpg" alt="" id="logoimage">
              </a>
              </li>
            <div class="navigation">
              <ul>
                <li><a href="../sriboard/piano.php?octave=0" class="navtabs">Grand Piano</a></li>
                <li><a href="../sriboard/pizzicato.php?octave=0" class="navtabs">Pizzicato</a></li>
                <li><a href="../sriboard/epiano.php?octave=0" class="navtabs">E.Piano</a></li>
                <?php
                if (isset($_SESSION['email']))
                {
                    echo '<li><a href="../home/home.php" class="navtabs">Home</a></li>
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
    </header>

    <div class="cont">

      <div class="options">

        <div class="recordoptions">
            <div class="container">
              <img src="../buttons/record.png" >
              <button type="button" class="btn" onclick="startRecord()"></button>
            </div>
          <div class="container">
            <img src="../buttons/stop.png" >
            <button type="button" class="btn" onclick="stopRecord()"></button>
          </div>
          <div class="container">
            <img src="../buttons/play.png" >
            <button type="button" class="btn" onclick="playRecord2()"></button>
          </div>
          <div class="container">
            <img src="../buttons/save.png" >
            <button type="button" class="btn" onclick="saveRecord()"></button>
          </div>
          <div class="container">
            <img src="../buttons/playsave.png" >
            <button type="button" class="btn" onclick="playSaveRecordFile()"></button>
          </div>
        </div>

        <div class="volumeoptions">
          <input type="range" name="" class="slider" id="volume" min="0" max="1" step="0.01" value="0.8">
        </div>

        <div class="optiontext">
          <p id="textparagraph"></p>
        </div>

        <div class="keyboardoptions">
          <div class="sustain">
            Sustain
            <label class="switch">
              <input type="checkbox" id="sustain" checked>
              <span class="slider2"></span>
            </label>
          </div>
          <div class="octaveswitch">
              <p>Octave Switch</p>
              <input type="button" class="octavebutton" id="octavelow" name="octave" value="Low" onclick="lowOctave()">
              <input type="button" class="octavebutton" id="octavenormal" name="octave" value="Normal" onclick="normalOctave()">
              <input type="button" class="octavebutton" id="octavehigh" name="octave" value="High" onclick="highOctave()">
          </div>
          <div class="showkeys">
            Show Keys
            <label class="switch">
              <input type="checkbox" id="showtext" onclick="showkeys()">
              <span class="slider2 round"></span>
            </label>
          </div>
        </div>

      </div>

      <div class="piano">
        <div data-note="C5" class="key white"><p class="whitekey" id="whitekeytext1">Q</p></div>
        <div data-note="Db5" class="key black"><p class="blackkey" id="blackkeytext1">2</p></div>
        <div data-note="D5" class="key white"><p class="whitekey" id="whitekeytext2">W</p></div>
        <div data-note="Eb5" class="key black"><p class="blackkey" id="blackkeytext2">3</p></div>
        <div data-note="E5" class="key white"><p class="whitekey" id="whitekeytext3">E</p></div>
        <div data-note="F5" class="key white"><p class="whitekey" id="whitekeytext4">R</p></div>
        <div data-note="Gb5" class="key black"><p class="blackkey" id="blackkeytext3">5</p></div>
        <div data-note="G5" class="key white"><p class="whitekey" id="whitekeytext5">T</p></div>
        <div data-note="Ab5" class="key black"><p class="blackkey" id="blackkeytext4">6</p></div>
        <div data-note="A5" class="key white"><p class="whitekey" id="whitekeytext6">Y</p></div>
        <div data-note="Bb5" class="key black"><p class="blackkey" id="blackkeytext5">7</p></div>
        <div data-note="B5" class="key white"><p class="whitekey" id="whitekeytext7">U</p></div>
        <div data-note="C6" class="key white"><p class="whitekey" id="whitekeytext8">C</p></div>
        <div data-note="Db6" class="key black"><p class="blackkey" id="blackkeytext6">F</p></div>
        <div data-note="D6" class="key white"><p class="whitekey" id="whitekeytext9">V</p></div>
        <div data-note="Eb6" class="key black"><p class="blackkey" id="blackkeytext7">G</p></div>
        <div data-note="E6" class="key white"><p class="whitekey" id="whitekeytext10">B</p></div>
        <div data-note="F6" class="key white"><p class="whitekey" id="whitekeytext11">N</p></div>
        <div data-note="Gb6" class="key black"><p class="blackkey" id="blackkeytext8">J</p></div>
        <div data-note="G6" class="key white"><p class="whitekey" id="whitekeytext12">M</p></div>
        <div data-note="Ab6" class="key black"><p class="blackkey" id="blackkeytext9">K</p></div>
        <div data-note="A6" class="key white"><p class="whitekey" id="whitekeytext13">,</p></div>
        <div data-note="Bb6" class="key black"><p class="blackkey" id="blackkeytext10">L</p></div>
        <div data-note="B6" class="key white"><p class="whitekey" id="whitekeytext14">.</p></div>
        <div data-note="C7" class="key white"><p class="whitekey" id="whitekeytext15">/</p></div>
      </div>

    </div>

<?php
  if ($_GET['octave']==-1) {
    echo '<audio id="C5" src="../notes/epiano/C4.mp3"></audio>
    <audio id="Db5" src="../notes/epiano/Db4.mp3"></audio>
    <audio id="D5" src="../notes/epiano/D4.mp3"></audio>
    <audio id="Eb5" src="../notes/epiano/Eb4.mp3"></audio>
    <audio id="E5" src="../notes/epiano/E4.mp3"></audio>
    <audio id="F5" src="../notes/epiano/F4.mp3"></audio>
    <audio id="Gb5" src="../notes/epiano/Gb4.mp3"></audio>
    <audio id="G5" src="../notes/epiano/G4.mp3"></audio>
    <audio id="Ab5" src="../notes/epiano/Ab4.mp3"></audio>
    <audio id="A5" src="../notes/epiano/A4.mp3"></audio>
    <audio id="Bb5" src="../notes/epiano/Bb4.mp3"></audio>
    <audio id="B5" src="../notes/epiano/B4.mp3"></audio>
    <audio id="C6" src="../notes/epiano/C5.mp3"></audio>
    <audio id="Db6" src="../notes/epiano/Db5.mp3"></audio>
    <audio id="D6" src="../notes/epiano/D5.mp3"></audio>
    <audio id="Eb6" src="../notes/epiano/Eb5.mp3"></audio>
    <audio id="E6" src="../notes/epiano/E5.mp3"></audio>
    <audio id="F6" src="../notes/epiano/F5.mp3"></audio>
    <audio id="Gb6" src="../notes/epiano/Gb5.mp3"></audio>
    <audio id="G6" src="../notes/epiano/G5.mp3"></audio>
    <audio id="Ab6" src="../notes/epiano/Ab5.mp3"></audio>
    <audio id="A6" src="../notes/epiano/A5.mp3"></audio>
    <audio id="Bb6" src="../notes/epiano/Bb5.mp3"></audio>
    <audio id="B6" src="../notes/epiano/B5.mp3"></audio>
    <audio id="C7" src="../notes/epiano/C6.mp3"></audio>';
  }
  else if ($_GET['octave']==1) {
    echo '<audio id="C5" src="../notes/epiano/C6.mp3"></audio>
    <audio id="Db5" src="../notes/epiano/Db6.mp3"></audio>
    <audio id="D5" src="../notes/epiano/D6.mp3"></audio>
    <audio id="Eb5" src="../notes/epiano/Eb6.mp3"></audio>
    <audio id="E5" src="../notes/epiano/E6.mp3"></audio>
    <audio id="F5" src="../notes/epiano/F6.mp3"></audio>
    <audio id="Gb5" src="../notes/epiano/Gb6.mp3"></audio>
    <audio id="G5" src="../notes/epiano/G6.mp3"></audio>
    <audio id="Ab5" src="../notes/epiano/Ab6.mp3"></audio>
    <audio id="A5" src="../notes/epiano/A6.mp3"></audio>
    <audio id="Bb5" src="../notes/epiano/Bb6.mp3"></audio>
    <audio id="B5" src="../notes/epiano/B6.mp3"></audio>
    <audio id="C6" src="../notes/epiano/C7.mp3"></audio>
    <audio id="Db6" src="../notes/epiano/Db7.mp3"></audio>
    <audio id="D6" src="../notes/epiano/D7.mp3"></audio>
    <audio id="Eb6" src="../notes/epiano/Eb7.mp3"></audio>
    <audio id="E6" src="../notes/epiano/E7.mp3"></audio>
    <audio id="F6" src="../notes/epiano/F7.mp3"></audio>
    <audio id="Gb6" src="../notes/epiano/Gb7.mp3"></audio>
    <audio id="G6" src="../notes/epiano/G7.mp3"></audio>
    <audio id="Ab6" src="../notes/epiano/Ab7.mp3"></audio>
    <audio id="A6" src="../notes/epiano/A7.mp3"></audio>
    <audio id="Bb6" src="../notes/epiano/Bb7.mp3"></audio>
    <audio id="B6" src="../notes/epiano/B7.mp3"></audio>
    <audio id="C7" src="../notes/epiano/C8.mp3"></audio>';
  }
  else{
    echo '<audio id="C5" src="../notes/epiano/C5.mp3"></audio>
    <audio id="Db5" src="../notes/epiano/Db5.mp3"></audio>
    <audio id="D5" src="../notes/epiano/D5.mp3"></audio>
    <audio id="Eb5" src="../notes/epiano/Eb5.mp3"></audio>
    <audio id="E5" src="../notes/epiano/E5.mp3"></audio>
    <audio id="F5" src="../notes/epiano/F5.mp3"></audio>
    <audio id="Gb5" src="../notes/epiano/Gb5.mp3"></audio>
    <audio id="G5" src="../notes/epiano/G5.mp3"></audio>
    <audio id="Ab5" src="../notes/epiano/Ab5.mp3"></audio>
    <audio id="A5" src="../notes/epiano/A5.mp3"></audio>
    <audio id="Bb5" src="../notes/epiano/Bb5.mp3"></audio>
    <audio id="B5" src="../notes/epiano/B5.mp3"></audio>
    <audio id="C6" src="../notes/epiano/C6.mp3"></audio>
    <audio id="Db6" src="../notes/epiano/Db6.mp3"></audio>
    <audio id="D6" src="../notes/epiano/D6.mp3"></audio>
    <audio id="Eb6" src="../notes/epiano/Eb6.mp3"></audio>
    <audio id="E6" src="../notes/epiano/E6.mp3"></audio>
    <audio id="F6" src="../notes/epiano/F6.mp3"></audio>
    <audio id="Gb6" src="../notes/epiano/Gb6.mp3"></audio>
    <audio id="G6" src="../notes/epiano/G6.mp3"></audio>
    <audio id="Ab6" src="../notes/epiano/Ab6.mp3"></audio>
    <audio id="A6" src="../notes/epiano/A6.mp3"></audio>
    <audio id="Bb6" src="../notes/epiano/Bb6.mp3"></audio>
    <audio id="B6" src="../notes/epiano/B6.mp3"></audio>
    <audio id="C7" src="../notes/epiano/C7.mp3"></audio>';
  }
 ?>

  </body>
</html>
