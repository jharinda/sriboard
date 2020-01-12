<?php

    require '../header1.php';

 ?>
<?php
if (!isset($_SESSION['email'])){
  header("Location: ../signin/signin.php?error=loggedout&instrument=pizzicato");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sriboard</title>
    <link rel="stylesheet" href="sriboard.css">
    <link rel="stylesheet" href="../header1.css">
    <link rel="stylesheet" href="test.css">
    <script type="text/javascript" src="sriboard.js" defer></script>
  </head>
  <body>


    <div class="keyboard">

      <div class="options">

        <div class="recordoptions">
            <div class="container">
              <img src="../buttons/record.png" >
              <button type="button" class="btn" onclick="startRecord()"></button>
            </div>
          <div class="container">
            <img src="../buttons/stop.png" >
            <button type="button" class="btn" onclick="StopRecord()"></button>
          </div>

          <div class="container">
            <img src="../buttons/play.png" >
            <button type="button" class="btn" onclick="playRecord()"></button>
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
          <input type="range" name="" id="volume" min="0" max="1" step="0.01" value="0.5">
        </div>

        <div class="keyboardoptions">
          Sustain<input type="checkbox" id="sustain" checked>
          <p>Octave Switch</p>
          -1<input type="radio" name="octave" value="">
          0<input type="radio" name="octave" value="" checked>
          +1<input type="radio" name="octave" value="">
          Show Keys<input type="checkbox" id="showtext" onclick="showkeys()">
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

    <audio id="C5" src="../notes/C5.mp3"></audio>
    <audio id="Db5" src="../notes/Db5.mp3"></audio>
    <audio id="D5" src="../notes/D5.mp3"></audio>
    <audio id="Eb5" src="../notes/Eb5.mp3"></audio>
    <audio id="E5" src="../notes/E5.mp3"></audio>
    <audio id="F5" src="../notes/F5.mp3"></audio>
    <audio id="Gb5" src="../notes/Gb5.mp3"></audio>
    <audio id="G5" src="../notes/G5.mp3"></audio>
    <audio id="Ab5" src="../notes/Ab5.mp3"></audio>
    <audio id="A5" src="../notes/A5.mp3"></audio>
    <audio id="Bb5" src="../notes/Bb5.mp3"></audio>
    <audio id="B5" src="../notes/B5.mp3"></audio>
    <audio id="C6" src="../notes/C6.mp3"></audio>
    <audio id="Db6" src="../notes/Db6.mp3"></audio>
    <audio id="D6" src="../notes/D6.mp3"></audio>
    <audio id="Eb6" src="../notes/Eb6.mp3"></audio>
    <audio id="E6" src="../notes/E6.mp3"></audio>
    <audio id="F6" src="../notes/F6.mp3"></audio>
    <audio id="Gb6" src="../notes/Gb6.mp3"></audio>
    <audio id="G6" src="../notes/G6.mp3"></audio>
    <audio id="Ab6" src="../notes/Ab6.mp3"></audio>
    <audio id="A6" src="../notes/A6.mp3"></audio>
    <audio id="Bb6" src="../notes/Bb6.mp3"></audio>
    <audio id="B6" src="../notes/B6.mp3"></audio>
    <audio id="C7" src="../notes/C7.mp3"></audio>

    <footer>

    </footer>
  </body>
</html>
