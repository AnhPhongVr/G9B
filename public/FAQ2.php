<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/popup.css" rel="stylesheet">
	<title>FAQ</title>
</head>
<body>

<!--La contenu de la FAQ-->
<div class="faq">

    <a  class="accueil" href="index.php">
        <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>

<!--Toutes les questions-->
<div class="ContenuQuestion">
    <h3>Questions :</h3>
    <p class="question">
        Question 6 : Question supplémentaire<br>
        <button onclick="reponse('r1');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 7 : Question supplémentaire<br>
        <button onclick="reponse('r2');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 8 : Question supplémentaire<br>
        <button onclick="reponse('r3');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 9 : Question supplémentaire<br>
        <button onclick="reponse('r4');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 10 : Question supplémentaire<br>
        <button onclick="reponse('r5');"><b>Afficher la réponse</b></button>
    </p>
</div>

<!--Toutes les réponses-->
<div class="ContenuReponse">
    <h3 id="titreReponse">Réponses :</h3>
    <p class="r1" id="r1">Réponse supplémentaire</p>
    <p class="r2" id="r2">Réponse supplémentaire</p>
    <p class="r3" id="r3">Réponse supplémentaire</p>
    <p class="r4" id="r4">Réponse supplémentaire</p>
    <p class="r5" id="r5">Réponse supplémentaire</p>
    <p class="r6" id="r6">Réponse supplémentaire</p>
    <img src="../images/logo%20client%20détouré.png" class="logoClient" alt="logo client" id="logoClient">
</div>
</div>

<div class="pagination">
  <a href=FAQ.php>&laquo;</a>
  <a href="FAQ.php">1</a>
  <a class="active" href="#">2</a>
  <a href="FAQ3.php">3</a>
  <a href="FAQ3.php">&raquo;</a>
</div>

    <script src="../js/popup.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>