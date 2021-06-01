<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['usertype'] = $userinfo['usertype'];
            $_SESSION['mail'] = $userinfo['mail'];
            if($userinfo['usertype'] == 'admin') {
                header("Location: ../admin.php?id=" .$_SESSION['id']);
            } else {
                header("Location: ../utilisateur/menu.php?id=" .$_SESSION['id']);
            }
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe";
        }
    }
    else
    {
        $erreur = "Tous les champ doivent etre complétés !";
    }
}

?>