<?php
function idverif()
{
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

    if (isset($_GET['id']) and $_GET['id'] > 0) {
        $getid = intval($_GET['id']);
        $requser = $bdd->prepare("SELECT * FROM bdd.membres WHERE id = ?");
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    }
    return $userinfo;
}
    ?>

