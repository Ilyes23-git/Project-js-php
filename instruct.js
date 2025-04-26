let t = 60;
let compteur = null;

function start() {
  compteur = setInterval(() => {
    if (t <= 0) {
      clearInterval(compteur);
      move();
      alert("Time out!")
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

start();
