<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if (isset($_POST['forminscription'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $usertype = $_POST['usertype'];
    $pwd = sha1($_POST['password']);
    $conf = sha1($_POST['confirmation']);

    if (!empty($_POST['prenom']) and !empty($_POST['nom']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['confirmation'])) {
        $prenomlength = strlen($prenom);
        $nomlength = strlen($nom);
        if ($prenomlength <= 255 and $nomlength <= 255) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if ($mailexist == 0) {
                    if ($pwd == $conf) {
                        $insertmbr = $bdd->prepare("INSERT INTO membres(id, prenom, nom, usertype, mail, datedenaissance, motdepasse) VALUES (NULL, ?, ?, ?, ?, NULL, ?)");
                        $insertmbr->execute(array($prenom, $nom, $usertype, $mail, $pwd));
                        $erreur = "Votre compte a bien été crée !";
                    } else {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                } else {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            } else {
                $erreur = "Votre adresse mail n'est pas valide";
            }
        } else {
            $erreur = "Votre nom ou prénom ne doit pas dépasser 255 caractères";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés";
    }
}

if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres JOIN données ON membres.id = données.iduser WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    include("viewmember/viewsignin.php");

} else {
    header("Location: ../public/index.php");
}
?>
