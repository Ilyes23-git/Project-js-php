
function start() {
  let t = 60;
  document.getElementById('b1').innerText=t;
  const compteur = setInterval(() => {
    if (t > 0) {
      t--;
      document.getElementById('b1').innerText=t;
    } else {
      alert("Temps écoulé!");
      clearInterval(compteur);
    }
  }, 1000);
}


document.getElementById('play').addEventListener('click', function () {
  window.location.href = './scrabble.html';
});
