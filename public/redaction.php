<?php
$faq = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");
$mode_edition = 0;
if(isset($_GET['id_Question']) AND !empty($_GET['id_Question'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['id_Question']);
   $edit_question = $faq->prepare('SELECT * FROM Questions WHERE id_Questions = ?');
   $edit_question->execute(array($edit_id));
   if($edit_question->rowCount() == 1) {
      $edit_question = $edit_question->fetch();
   } else {
      die('Erreur : la question n\'existe pas...');
   }
}
if(isset($_POST['Question_question'])) {
   if(!empty($_POST['Question_question'])) {
      $Questions_Question = htmlspecialchars($_POST['Question_question']);
      if($mode_edition == 0) {
         $ins = $faq->prepare('INSERT INTO Questions (Question) VALUES (?)');
         $ins->execute(array($Questions_Question));
         $message = 'Votre question a bien été postée';
      } else {
         $update = $faq->prepare('UPDATE Questions SET Question = ? WHERE id_Question = ?');
         $update->execute(array($Questions_Question));
         header('Location: http://localhost:8888/public/FAQ.php?id='.$edit_id);
         $message = 'Votre question a bien été mise à jour !';
      }
   } else {
      $message = 'Veuillez remplir le champ';
   }
}
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

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
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/redaction.css">

   <title>Rédaction / Edition</title>
   <meta charset="utf-8">
</head>
<body>

        <a  class="accueil" href="<?php echo "FAQ.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
   
   <div class="redaction">
   
      <form method="POST">
         <h1>Édition/Modification</h1>
         <textarea raws="100" cols= "52" name="Question_question" placeholder="Saisissez votre question"><?php if($mode_edition == 1) { ?><?=$edit_question['Question'] ?><?php } ?></textarea><br />
         <input type="submit" value="Envoyer">
      </form>
      </div>
    
      <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html> <?php } ?>