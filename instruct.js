let t = 10;
let compteur = null;

function start() {
  compteur = setInterval(() => {
    if (t <= 0) {
      clearInterval(compteur);
      move1();
    } else {
      t--;
      document.getElementById("b1").textContent = t;
    }
  }, 1000);

  document.getElementById("b1").textContent = t;
}

function move() {
  window.location.href = "scrabble.html";
}
function move1(){
  window.location.href = "stat.html"
}
function move2(){
  window.location.href = "Authentification.html"
}
function affich(){
  let a = document.getElementById("b5")
  a.innerHTML = "Time out!";
  a.style.display = "block";
  a.style.opacity =1;
}
start();
function valider(){
  let mail =document.forms["forms"]["mail"].value;
  let username =document.forms["forms"]["username"].value;
  let pass =document.forms["forms"]["password"].value;

  return true;
}