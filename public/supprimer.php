<?php
$bdd = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");
if(isset($_GET['id_Question']) AND !empty($_GET['id_Question'])) {
   $suppr_id = htmlspecialchars($_GET['id_Question']);
   $suppr = $bdd->prepare('DELETE FROM Questions WHERE id_Question = ?');
   $suppr->execute(array($suppr_id));
   header('Location: http://localhost:8888/public/FAQ.php');
}
?>