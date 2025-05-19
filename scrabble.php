<?php include "affichage_word.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrabble</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="b">
        <div id="b1" style="color: aliceblue">60</div>
        <div id="b2">
            <b>score:</b>
            <b id="score">0</b>
        </div>
    </header>

    <section>
            <div>
                <div id="b5" style="color: aliceblue"><?php echo $melange; ?></div>
                <p id="message" style="color: aliceblue"></p>
                <input type="text" id="b6" name="mot">
            </div>
           
            <div id="b4">
                <button type="button" onclick="verifierMot()">Confirm</button>    
                <button type="button" onclick="next()">Skip</button>    
                <button type="button" onclick="document.getElementById('b6').value=''">Clear</button>    
            </div>
    </section>

    <script>
    let motCorrect = "<?php echo $mot; ?>".toLowerCase(); 
    let score = 0;
    let t = 60;
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

    function move1() {
        window.location.href = "stat.html";
    }

    function next() {
        fetch("affichage_word.php", {
            method: "POST"
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("b5").textContent = data.melange;
            document.getElementById("b6").value = "";
            motCorrect = data.mot.toLowerCase();
        })
    }

    function verifierMot() {
        const saisie = document.getElementById("b6").value.trim().toLowerCase();
        const message = document.getElementById("message");

        if (saisie === motCorrect) {
            message.textContent = " Bonne réponse !";
            message.style.color = "lightgreen";
            score += motCorrect.length;
            document.getElementById("score").textContent = score;
            localStorage.setItem("monScore", score);
            next();
        } else {
            message.textContent = " Mauvaise réponse.";
            message.style.color = "red";
        }
    }

    start();
</script>

    <footer>
        <p>© 2025 MyGamingSite - All rights reserved</p>
    </footer>
</body>
</html>
