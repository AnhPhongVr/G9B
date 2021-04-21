<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/popup.css" rel="stylesheet">
	<title>FAQ</title>
</head>
<body>
<?php
    require 'navbar.php';
    require '../membres/inscription.php';
    require '../membres/connexion.php';
?>
<!--La contenu de la FAQ-->
<div class="faq">

<!--Toutes les questions-->
<div class="ContenuQuestion">
    <h3>Questions :</h3>
    <p class="question">
        Que faire si vous avez oublié votre mot de passe et votre adresse e-mail?<br>
        <button onclick="reponse('r1');">Afficher la réponse</button>
    </p>
    <p class="question">
        Sommes-nous obligés de faire toutes les séries de tests?<br>
        <button onclick="reponse('r2');">Afficher la réponse</button>
    </p>
    <p class="question">
        Que faire si votre résultat n'est pas concluant?<br>
        <button onclick="reponse('r3');">Afficher la réponse</button>
    </p>
    <p class="question">
        Question supplémentaire<br>
        <button onclick="reponse('r4');">Afficher la réponse</button>
    </p>
    <p class="question">
        Question supplémentaire<br>
        <button onclick="reponse('r5');">Afficher la réponse</button>
    </p>
    <p class="question">
        Question supplémentaire<br>
        <button onclick="reponse('r6');">Afficher la réponse</button>
    </p>
</div>

<!--Toutes les réponses-->
<div class="ContenuReponse">
    <h3 id="titreReponse">Réponses :</h3>
    <p class="r1" id="r1">Non vous n'êtes pas obligé(e) de faire tous les tests proposés. Il est possible de chosir uniquement le ou les tests que vous voulez faire.</p>
    <p class="r2" id="r2">Dans ce cas, n'hésitez pas à nous contacter. Il y a en bas de la page une rubrique "nous contacter".</p>
    <p class="r3" id="r3">Prenez une pause, respirez et recommencez. Si le test demeure non conluant alors vous êtes trop stressé(e), reposez vous.</p>
    <p class="r4" id="r4">Réponse supplémentaire</p>
    <p class="r5" id="r5">Réponse supplémentaire</p>
    <p class="r6" id="r6">Réponse supplémentaire</p>
    <img src="../images/logo%20client%20détouré.png" class="logoClient" alt="logo client" id="logoClient">
</div>
</div>

<!--Bandeau avec la partie "nous conatcter"-->
<div class="pied">
	<span class="contact">Vous souhaitez nous contacter?</span><br>
	<br>
	<button class="appeler"><b>Nous appeler</b></button>
	<button class="mail"><b>Envoyer un e-mail</b></button>
</div>

<!--Pied de page-->
<div class="footer">
    <footer>
        <ul>
        <p class="Powered">Powered by</p>
        <img src="../images/Witsmed.png" class="logoWitsmed" alt="logoWitsmed">
        <li><a href="" class="footer-container">Conditions d'utilsation</li></a>
        <li><a href="" class="footer-container">Confidentialité</li></a>
        <li><a href="" class="footer-container">Mentions légales</li></a>
        </ul>
    </footer>
</div>

    <script src="../js/popup.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>