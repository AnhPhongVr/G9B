<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');
$faq = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");


if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM bdd.membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}


//$questionsParPage = 5;
//$questionsTotalesReq = $faq->query('SELECT id_Question FROM Questions');
//$questionsTotales = $questionsTotalesReq->rowCount();
//$pagesTotales = ceil($questionsTotales/$questionsParPage);
//if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
//$_GET['page'] = intval($_GET['page']);
//$pageCourante = $_GET['page'];
//} else {
//   $pageCourante = 1;
//}
//$depart = ($pageCourante-1)*$questionsParPage;


//$reponsesParPage = 5;
//$reponsesTotalesReq = $faq->query('SELECT id_Reponse FROM Réponses');
//$reponsesTotales = $reponsesTotalesReq->rowCount();
//$pagesTotales = ceil($reponsesTotales/$reponsesParPage);
//if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
//   $_GET['page'] = intval($_GET['page']);
//   $pageCourante = $_GET['page'];
//} else {
//   $pageCourante = 1;
//}
//$depart = ($pageCourante-1)*$reponsesParPage;

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
    if (isset($_SESSION['usertype']) AND isset($userinfo) AND $userinfo['usertype'] == 'admin'){
        ?>
        <a  class="accueil" href="<?php echo "../membres/admin.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    }
    else if (isset($_SESSION['id']) AND isset($userinfo) AND $userinfo['id'] == 'id')
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

    <!--<img src="../images/logo%20client%20détouré.png" class="logoClient" alt="logo client" id="logoClient">-->
<?php
  $questions = $faq->query('SELECT * FROM faq.Questions ORDER BY id_Question ASC');
  while($q = $questions->fetch()) {
  ?>
  <div class="question">
    <b>N°<?php echo $q['id_Question']; ?> - <?php echo $q['Question']; ?></b><br>
    <?php
  $reponses = $faq->query('SELECT Reponse FROM faq.Réponses ORDER BY id_Reponse ASC');
  while($r = $reponses->fetch()) {
  ?>
    <b><?php echo $r['Reponse']; ?></b><br>
<?php } ?>
    <a href="redaction.php?edit=<?= $q['id_Question'] ?>">Modifier</a>
    <a href="supprimer.php?id=<?= $q['id_Question'] ?>">Supprimer</a>
    <a href="" onclick="reponse('<?php echo $r['id_Reponse']; ?>');">Réponse</a>
  </div>
<?php } ?>

<?php
  $reponses = $faq->query('SELECT * FROM faq.Réponses ORDER BY id_Reponse ASC');
  while($r = $reponses->fetch()) {
  ?>
  <div class="question" style="display: none;" id="<?php echo $r['id_Reponse']; ?>">
    <b><?php echo $r['Reponse']; ?></b><br>
  </div>
<?php } ?>
</div>

<!--<div class="pagination">
<?php
  for($i=1;$i<=$pagesTotales;$i++) {
     if($i == $pageCourante) {
        echo $i.' ';
     } else {
        echo '<a href="FAQ.php?page='.$i.'">'.$i.'</a> ';
     }
  }
?>
</div>-->


    <script src="../js/popup.js"></script>
    <script src="../js/faq.js"></script>
</body>
</html>