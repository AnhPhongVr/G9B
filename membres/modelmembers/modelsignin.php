<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_POST['forminscription']))
{
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $usertype = $_POST['usertype'];
    $pwd = sha1($_POST['password']);
    $conf = sha1($_POST['confirmation']);

    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirmation']))
    {
        $prenomlength = strlen($prenom);
        $nomlength = strlen($nom);
        if ($prenomlength <= 255 AND $nomlength <=255)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if($mailexist == 0)
                {
                    if ($pwd == $conf)
                    {
                        $insertmbr = $bdd->prepare("INSERT INTO membres(id, prenom, nom, usertype, mail, datedenaissance, motdepasse) VALUES (NULL, ?, ?, ?, ?, NULL, ?)");
                        $insertmbr->execute(array($prenom, $nom, $usertype, $mail, $pwd));
                        $erreur = "Votre compte a bien été crée !";
                    }
                    else
                    {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                }
                else
                {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            }
            else
            {
                $erreur = "Votre adresse mail n'est pas valide";
            }
        }
        else
        {
            $erreur = "Votre nom ou prénom ne doit pas dépasser 255 caractères";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}