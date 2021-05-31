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

<?php
$bdd = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");
$questionsParPage = 5;
$questionsTotalesReq = $bdd->query('SELECT id_Question FROM Questions');
$questionsTotales = $questionsTotalesReq->rowCount();
$pagesTotales = ceil($questionsTotales/$questionsParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$questionsParPage;

?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");
$reponsesParPage = 5;
$reponsesTotalesReq = $bdd->query('SELECT id_Reponse FROM Réponses');
$reponsesTotales = $reponsesTotalesReq->rowCount();
$pagesTotales = ceil($reponsesTotales/$reponsesParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$reponsesParPage;

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
<!--<div class="ContenuQuestion">
    <h3 class="titreQuestion">Questions :</h3>
    <p class="question">
        Question 1 : Que faire si vous avez oublié votre mot de passe et votre adresse e-mail?<br>
        <button onclick="reponse('r1');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 2 : Sommes-nous obligés de faire toutes les séries de tests?<br>
        <button onclick="reponse('r2');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 3 : Que faire si votre résultat n'est pas concluant?<br>
        <button onclick="reponse('r3');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 4 : Question supplémentaire<br>
        <button onclick="reponse('r4');"><b>Afficher la réponse</b></button>
    </p>
    <p class="question">
        Question 5 : Question supplémentaire<br>
        <button onclick="reponse('r5');"><b>Afficher la réponse</b></button>
    </p>
</div>-->

<!--Toutes les réponses-->
<!--<div class="ContenuReponse">
    <h3 class="titreReponse" id="titreReponse">Réponses :</h3>
    <p class="r1" id="r1">Réponse 1 : Non vous n'êtes pas obligé(e) de faire tous les tests proposés. Il est possible de choisir uniquement le ou les tests que vous voulez faire.</p>
    <p class="r2" id="r2">Réponse 2 : Dans ce cas, n'hésitez pas à nous contacter. Il y a en bas de la page une rubrique "nous contacter".</p>
    <p class="r3" id="r3">Réponse 3 : Prenez une pause, respirez et recommencez. Si le test demeure non conluant alors vous êtes trop stressé(e), reposez vous.</p>
    <p class="r4" id="r4">Réponse 4 : Réponse supplémentaire</p>
    <p class="r5" id="r5">Réponse 5 : Réponse supplémentaire</p>
    <img src="../images/logo%20client%20détouré.png" class="logoClient" alt="logo client" id="logoClient">
</div>
</div>-->
<!--<?php
if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
{
?>
    <div class="pagination">
        <a href="<?php echo "FAQ.php?id=" .$_SESSION['id'];?>">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="<?php echo "FAQ2.php?id=" .$_SESSION['id'];?>">2</a>
        <a href="<?php echo "FAQ3.php?id=" .$_SESSION['id'];?>">3</a>
        <a href="<?php echo "FAQ2.php?id=" .$_SESSION['id'];?>">&raquo;</a>
    </div>
    <?php
} else { ?>
    <div class="pagination">
      <a href="FAQ.php">&laquo;</a>
      <a class="active" href="#">1</a>
      <a href="FAQ2.php">2</a>
      <a href="FAQ3.php">3</a>
      <a href="FAQ2.php">&raquo;</a>
    </div>
    <?php
}
?>-->

<div class="faq">
<?php
  $questions = $bdd->query('SELECT * FROM Questions ORDER BY id_Question ASC LIMIT '.$depart.','.$questionsParPage);
  while($q = $questions->fetch()) {
  ?>
  <div class="question">
    <b>N°<?php echo $q['id_Question']; ?> - <?php echo $q['Question']; ?></b><br>
    <a href="redaction.php?edit=<?= $a['id_Question'] ?>">Modifier</a>
    <a href="supprimer.php?id=<?= $a['id_Question'] ?>">Supprimer</a>
    <a href="">Réponse</a>
  </div>
<?php } ?>

<?php
  $reponses = $bdd->query('SELECT * FROM Réponses ORDER BY id_Reponse ASC LIMIT '.$depart.','.$questionsParPage);
  while($r = $reponses->fetch()) {
  ?>
  <div class="question">
    <b><?php echo $r['Reponse']; ?></b><br>
  </div>
<?php } ?>
 </div>

  <div class="pagination">
<?php
  for($i=1;$i<=$pagesTotales;$i++) {
     if($i == $pageCourante) {
        echo $i.' ';
     } else {
        echo '<a href="FAQ.php?page='.$i.'">'.$i.'</a> ';
     }
  }
?>
</div>


    <script src="../js/popup.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>