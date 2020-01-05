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

function showkeys(){
  var showtextcheckbox=document.getElementById("showtext");
  var keytext=document.getElementById("whitekeytext");
  if (showtextcheckbox.checked==true) {
    keytext.style.display="block";
  }
  else{
      keytext.style.display="none";
  }
}
