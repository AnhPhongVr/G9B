<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');


if(isset($_GET['id']) AND $_GET['id'] > 0) {
    if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
        $supprime = (int)$_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $req->execute(array($supprime));
    }
    $membres = $bdd->query("SELECT * FROM membres ORDER BY id DESC LIMIT 0,5");

    if (isset($_POST['search']) and !empty($_POST['search'])) {
        $q = htmlspecialchars($_POST['search']);
        $membres = $bdd->query('SELECT * FROM membres WHERE nom LIKE "%' . $q . '%" ORDER BY id DESC');
        if ($membres->rowCount() == 0) {
            $membres = $bdd->query('SELECT * FROM membres WHERE CONCAT(nom, prenom, mail) LIKE "%' . $q . '%" ORDER BY id DESC');
        }
    }
    include("viewmember/viewgestionuser.php");
}
    ?>
