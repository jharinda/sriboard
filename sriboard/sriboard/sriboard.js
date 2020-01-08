const WHITE_KEYS=['q','w','e','r','t','y','u','c','v','b','n','m',',','.','/'];
const BLACK_KEYS=['2','3','5','6','7','f','g','j','k','l'];

const keys=document.querySelectorAll('.key');
const whiteKeys=document.querySelectorAll('.key.white');
const blackKeys=document.querySelectorAll('.key.black');
var noteAudio=document.getElementById('C5');

var recordNotes=[];
var delayNotes=[];
var isRecording=0;
var delay=0;
var d;
var n;
var count=0;
var sustainOn=0;
var sustaincheckbox=false;
var showtextcheckbox=true;

keys.forEach(key=>{
  key.addEventListener('click',()=>playNote(key));
})

function startRecord(){
  isRecording=1;
  d=new Date();
  n=d.getTime();
}

function stopRecord(){
  isRecording=0;
}

function playRecord(){
  //while(count<recordNotes.length){
    //const whiteKeyIndex=WHITE_KEYS.indexOf(recordNotes[count]);
    //const blackKeyIndex=BLACK_KEYS.indexOf(recordNotes[count]);
    //if(whiteKeyIndex>-1) {playNote(whiteKeys[whiteKeyIndex])}
    //if(blackKeyIndex>-1) {playNote(blackKeys[blackKeyIndex])}
    //count++;
    //if (count<delayNotes.length) {
      //setTimeout(playRecord,2000);
    //}
    //setTimeout(test,2000);
  //}
  document.write(recordNotes);
  document.write(delayNotes);
}

function saveRecord(){
  location.replace("saverecord.php");
}

function playSaveRecordFile(){
  location.replace("saverecord.php");
}

/*function test(){
  var test=0;
  test++;
}*/

document.addEventListener('keydown',i=>{
  if(i.repeat){return}
  const key=i.key;
  const whiteKeyIndex=WHITE_KEYS.indexOf(key);
  const blackKeyIndex=BLACK_KEYS.indexOf(key);

  if(isRecording==1){
    recordNotes.push(key);
    var ni;
    d=new Date();
    ni=d.getTime();
    delay=ni-n;
    delayNotes.push(delay);
    n=d.getTime();
  }

  if(whiteKeyIndex>-1) {playNote(whiteKeys[whiteKeyIndex])}
  if(blackKeyIndex>-1) {playNote(blackKeys[blackKeyIndex])}
});

function playNote(key){
  noteAudio=document.getElementById(key.dataset.note);
  noteAudio.currentTime=0;
  noteAudio.play();
  noteAudio.volume=document.getElementById("volume").value;
  key.classList.add('active');
  noteAudio.addEventListener('ended',()=>{
    key.classList.remove('active');
  })
}

document.addEventListener('keyup',sustain=>{
  sustaincheckbox=document.getElementById("sustain");
  if(sustaincheckbox.checked==false){
    noteAudio.pause();
    noteAudio.currentTime=noteAudio.duration;
    noteAudio.addEventListener('ended',()=>{
      key.classList.remove('active');
    })
  }
});

/*function changeVolume(){
  noteAudio.volume=document.getElementById("volume").value;
}

document.addEventListener('click',changeVolume);*/

document.addEventListener('click',changeVolume);

function showkeys(){
  var showtextcheckbox=document.getElementById("showtext");
  var keytext1=document.getElementById("whitekeytext1");
  var keytext2=document.getElementById("whitekeytext2");
  var keytext3=document.getElementById("whitekeytext3");
  var keytext4=document.getElementById("whitekeytext4");
  var keytext5=document.getElementById("whitekeytext5");
  var keytext6=document.getElementById("whitekeytext6");
  var keytext7=document.getElementById("whitekeytext7");
  var keytext8=document.getElementById("whitekeytext8");
  var keytext9=document.getElementById("whitekeytext9");
  var keytext10=document.getElementById("whitekeytext10");
  var keytext11=document.getElementById("whitekeytext11");
  var keytext12=document.getElementById("whitekeytext12");
  var keytext13=document.getElementById("whitekeytext13");
  var keytext14=document.getElementById("whitekeytext14");
  var keytext15=document.getElementById("whitekeytext15");
  var keytext16=document.getElementById("blackkeytext1");
  var keytext17=document.getElementById("blackkeytext2");
  var keytext18=document.getElementById("blackkeytext3");
  var keytext19=document.getElementById("blackkeytext4");
  var keytext20=document.getElementById("blackkeytext5");
  var keytext21=document.getElementById("blackkeytext6");
  var keytext22=document.getElementById("blackkeytext7");
  var keytext23=document.getElementById("blackkeytext8");
  var keytext24=document.getElementById("blackkeytext9");
  var keytext25=document.getElementById("blackkeytext10");
  if (showtextcheckbox.checked==true) {
    keytext1.style.display="block";
    keytext2.style.display="block";
    keytext3.style.display="block";
    keytext4.style.display="block";
    keytext5.style.display="block";
    keytext6.style.display="block";
    keytext7.style.display="block";
    keytext8.style.display="block";
    keytext9.style.display="block";
    keytext10.style.display="block";
    keytext11.style.display="block";
    keytext12.style.display="block";
    keytext13.style.display="block";
    keytext14.style.display="block";
    keytext15.style.display="block";
    keytext16.style.display="block";
    keytext17.style.display="block";
    keytext18.style.display="block";
    keytext19.style.display="block";
    keytext20.style.display="block";
    keytext21.style.display="block";
    keytext22.style.display="block";
    keytext23.style.display="block";
    keytext24.style.display="block";
    keytext25.style.display="block";
  }
  else{
      keytext1.style.display="none";
      keytext2.style.display="none";
      keytext3.style.display="none";
      keytext4.style.display="none";
      keytext5.style.display="none";
      keytext6.style.display="none";
      keytext7.style.display="none";
      keytext8.style.display="none";
      keytext9.style.display="none";
      keytext10.style.display="none";
      keytext11.style.display="none";
      keytext12.style.display="none";
      keytext13.style.display="none";
      keytext14.style.display="none";
      keytext15.style.display="none";
      keytext16.style.display="none";
      keytext17.style.display="none";
      keytext18.style.display="none";
      keytext19.style.display="none";
      keytext20.style.display="none";
      keytext21.style.display="none";
      keytext22.style.display="none";
      keytext23.style.display="none";
      keytext24.style.display="none";
      keytext25.style.display="none";
  }
}
