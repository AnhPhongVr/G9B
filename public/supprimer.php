<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

$faq = new PDO("mysql:host=localhost;dbname=FAQ;charset=utf8", "root", "root");


if(isset($_GET['suprime']) AND !empty($_GET['suprime'])) {
    $suppr_id = (int)$_GET['suprime'];
    $suppr = $faq->prepare('DELETE FROM Questions WHERE id_Question = ?');
    $suppr->execute(array($suppr_id));
    header("Location: FAQ.php?id=" .$_SESSION['id']);
}
?>