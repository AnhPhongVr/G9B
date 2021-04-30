<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>
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
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
	<title>FAQ</title>
</head>
<body>

<!--La contenu de la FAQ-->
<div class="faq">

    <?php
    if (isset($_SESSION['usertype']) AND $userinfo['usertype'] == 'admin'){
        ?>
        <a  class="accueil" href="<?php echo "../membres/admin.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    }
    else if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <a  class="accueil" href="<?php echo "../membres/utilisateur/menu.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    } else { ?>
        <a  class="accueil" href="index.php">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    }
    ?>
<!--Toutes les questions-->
<div class="ContenuQuestion">
    <h3 class="titreQuestion">Questions :</h3>
    <p class="question">
        Question 6 : Question supplémentaire<br>
        <button onclick="reponse('r6');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 7 : Question supplémentaire<br>
        <button onclick="reponse('r7');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 8 : Question supplémentaire<br>
        <button onclick="reponse('r8');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 9 : Question supplémentaire<br>
        <button onclick="reponse('r9');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 10 : Question supplémentaire<br>
        <button onclick="reponse('r10');"><b>Afficher la réponse</b></button>
    </p>
</div>

<!--Toutes les réponses-->
<div class="ContenuReponse">
    <h3 class="titreReponse" id="titreReponse">Réponses :</h3>
    <p class="r1" id="r6">Réponse 6 : Réponse supplémentaire</p>
    <p class="r2" id="r7">Réponse 7 : Réponse supplémentaire</p>
    <p class="r3" id="r8">Réponse 8 : Réponse supplémentaire</p>
    <p class="r4" id="r9">Réponse 9 : Réponse supplémentaire</p>
    <p class="r5" id="r10">Réponse 10 : Réponse supplémentaire</p>
    <img src="../images/logo%20client%20détouré.png" class="logoClient" alt="logo client" id="logoClient">
</div>
</div>

<?php
if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
{
    ?>
    <div class="pagination">
        <a href="<?php echo "FAQ.php?id=" .$_SESSION['id'];?>">&laquo;</a>
        <a href="<?php echo "FAQ.php?id=" .$_SESSION['id'];?>">1</a>
        <a class="active" href="#">2</a>
        <a href="<?php echo "FAQ3.php?id=" .$_SESSION['id'];?>">3</a>
        <a href="<?php echo "FAQ3.php?id=" .$_SESSION['id'];?>">&raquo;</a>
    </div>
    <?php
} else { ?>
    <div class="pagination">
        <a href="FAQ.php">&laquo;</a>
        <a href="FAQ.php">1</a>
        <a class="active" href="FAQ2.php">2</a>
        <a href="FAQ3.php">3</a>
        <a href="FAQ3.php">&raquo;</a>
    </div>
    <?php
}
?>
    <script src="../js/popup.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>