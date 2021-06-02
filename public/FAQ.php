<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

$faq = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/accordion.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <title>FAQ</title>
</head>
<body>

<!--La contenu de la FAQ-->
    <?php
    if (isset($_SESSION['usertype']) AND $userinfo['usertype'] == 'admin'){
        ?>
        <a  class="accueil" href="<?php echo "../membres/admin.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
        </a>
        <?php
    }
    else if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <a  class="accueil" href="<?php echo "../membres/utilisateur/menu.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
        </a>
        <?php
    } else { ?>
        <a  class="accueil" href="index.php">
        <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
        </a>
    <?php
    }
    ?>
<div class="question">
<?php

  $questions = $faq->query('SELECT * FROM Questions JOIN Réponses ON Réponses.id_Question = Questions.id_Question ORDER BY id_Reponse');
  while($q = $questions->fetch()) {
  ?>

      <b>N°<?php echo $q['id_Question']; ?> - <?php echo $q['Question']; ?></b><br>
      <br>
      <b><?php echo $q['Reponse']; ?></b><br>

      <?php
      if (isset($_SESSION['usertype']) AND $userinfo['usertype'] === 'admin'){
          ?>
          <a href="redaction.php?edit=<?= $q['id_Question'] ?>&id=<?= $_SESSION['id'] ?>">Modifier</a>
          <a href="supprimer.php?supprime=<?= $q['id_Question'] ?>&id=<?= $_SESSION['id'] ?>">Supprimer</a>
      <?php } ?>
    <hr>
<?php }?>
</div>
    <script src="../js/faq.js"></script>
</body>
</html>
<?php } else {
     ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/accordion.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <title>FAQ</title>
</head>
<body>
        <a  class="accueil" href="index.php">
        <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
        </a>
<div class="question">
<?php

  $questions = $faq->query('SELECT * FROM Questions JOIN Réponses ON Réponses.id_Question = Questions.id_Question ORDER BY id_Reponse');
  while($q = $questions->fetch()) {
  ?>

      <b>N°<?php echo $q['id_Question']; ?> - <?php echo $q['Question']; ?></b><br>
      <br>
      <b><?php echo $q['Reponse']; ?></b><br>
    <hr>
<?php }?>
</div>
    <script src="../js/faq.js"></script>
</body>
</html>
<?php } ?>