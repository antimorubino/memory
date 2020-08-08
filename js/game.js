var imageName;
var clickCount = 0;
var chosen = ["*", "*"];
var reset = 0;
var matched = 0;
var id1 = "";
var id2 = "";

var numberOfImages = 20;

var contabbinamenti = 0;

//Randomize image locations
var images = ["./images/icon/01.jpg",
  "./images/icon/02.jpg",
  "./images/icon/03.jpg",
  "./images/icon/04.jpg",
  "./images/icon/05.jpg",
  "./images/icon/06.jpg",
  "./images/icon/07.jpg",
  "./images/icon/08.jpg",
  "./images/icon/09.jpg",
  "./images/icon/10.jpg",
  "./images/icon/01.jpg",
  "./images/icon/02.jpg",
  "./images/icon/03.jpg",
  "./images/icon/04.jpg",
  "./images/icon/05.jpg",
  "./images/icon/06.jpg",
  "./images/icon/07.jpg",
  "./images/icon/08.jpg",
  "./images/icon/09.jpg",
  "./images/icon/10.jpg"
];

var images = shuffle(images);

//Set span titles to corresponding image name
for (var i = 1; i <= numberOfImages; ++i) {
  $('#' + i).attr("name", images[i - 1]);
}

//Display image when question mark is clicked
$("span").click(function() {
  //Return previous guesses to question marks if they didn't match
  if (reset === 1 && matched === 0) {
    $('#' + id1).children("img").attr("src", "./images/icon/question.jpg");
    $('#' + id2).children("img").attr("src", "./images/icon/question.jpg");
    id1 = "";
    id2 = "";
    reset = 0;
    matched = 0;
  } else if (reset === 1 && matched === 1) {
    id1 = "";
    id2 = "";
    reset = 0;
    matched = 0;
  }

  imageName = $(this).attr("name");
  //if span has been not been matched
  if (imageName !== "matched") {
    //show span's image
    $(this).children("img").attr("src", imageName);

    //if first spot is empty update first chosen element to include this span's id
    if (chosen[0] === "*") {
      chosen[0] = $(this).attr("id");

    }
    //if not check if second spot in chosen elements is empty
    else if (chosen[1] === "*") {
      //update second chosen element to include this span's id
      chosen[1] = $(this).attr("id");

      //check if chosen elements images are the same and chosen elements ids are different
      if ($('#' + chosen[0]).attr("name") === $('#' + chosen[1]).attr("name") && chosen[0] !== chosen[1]) {
        $('#' + chosen[0]).attr("name", "matched");
        $('#' + chosen[1]).attr("name", "matched");
        resetDisplayFlags();
        matched = 1;
      } else {
        resetDisplayFlags();
        matched = 0;
      }
    }
    ++clickCount;

  }

  $("#countDisplay").text(clickCount + " clicks");

  if(matched == 1) {
      ++contabbinamenti;
      //alert(contabbinamenti);
  }

  if(contabbinamenti === 10) {
      document.cookie = "mosse="+clickCount;
      ferma();
      $("#solved").html('Complimenti hai completato il gioco<br /><a href="premio.php" class="btn btn-danger btn-block">Scopri il premio</a>');
      //document.getElementById('solved').innerHTML = 'Complimenti hai completato il gioco<br /><a href="premio.php" class="btn btn-danger btn-block">Scopri  premio</a>';
  }

})

function resetDisplayFlags() {
  setIdFlags();
  resetChosenElements();
  reset = 1;
}

function setIdFlags() {
  id1 = chosen[0];
  id2 = chosen[1];
}

function resetChosenElements() {
  chosen[0] = "*";
  chosen[1] = "*";
}

function shuffle(o) {
  for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
  return o;
};

/*Cronometro*/

var ore=0;
var minuti=0;
var secondi=0;
var decimi=0;
var visualizzazione="";
var contatore_intertempi=0;
var stop=1; //0=attivo 1=fermo

function avvia()
{

document.getElementById("board").style.display = "block";


if (stop==1)
{
stop=0;
cronometro();
}
}

function cronometro()
{
if (stop==0) {
decimi+=1;
if (decimi>9) {decimi=0;secondi+=1;}
if (secondi>59) {secondi=0;minuti+=1;}
if (minuti>59) {minuti=0;ore+=1;}

if (ore<10) {visualizzazione="0" + ore;} else {visualizzazione=ore;}
if (minuti<10) {visualizzazione=visualizzazione + ":0" + minuti;} else {visualizzazione=visualizzazione + ":" + minuti;}
if (secondi<10) {visualizzazione=visualizzazione + ":0" + secondi;} else {visualizzazione=visualizzazione + ":" + secondi;}
visualizzazione=visualizzazione + ":" + decimi;

document.getElementById("mostra_cronometro").value=visualizzazione;
setTimeout("cronometro()", 100);
}
}

function intertempo()
{
if (stop==0)
{
contatore_intertempi+=1;
document.getElementById("intertempi").appendChild(document.createTextNode(contatore_intertempi + ". " + visualizzazione));
document.getElementById("intertempi").appendChild(document.createElement("br"));
}
}

function ferma()
{
stop=1;
//document.getElementById("final").style.display = "block";
var tempo = document.getElementById('mostra_cronometro').value;
document.cookie = "tempoT="+tempo;
//alert(tempo);
}

function azzera()
{
if (stop==1)
{
ore=0;
minuti=0;
secondi=0;
decimi=0;

document.getElementById("mostra_cronometro").value="00:00:00:0";
}
}
