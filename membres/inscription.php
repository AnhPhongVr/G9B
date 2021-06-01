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

if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres JOIN données ON membres.id = données.iduser WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <title>G9Bwebpage</title>
</head>
<body style="overflow-y:hidden;">
<a  class="accueil" href="<?php echo "admin.php?id=" .$_SESSION['id'];?>">
    <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
</a>
    <div id="titre" class="data-box" align="center">
        <form method="POST" action="" class="form-container">
            <table align = center>
                <tr>
                    <td colspan="4">
                        <h1 align="center" style="color: white;">Inscrire un utilisateur</h1>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        <label for="prenom" style="color:white;"> Prénom :</label>
                    </td>
                    <td>
                        <input type="text" id="prénom" name="prenom" placeholder="Veuillez entrer votre prénom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" />
                    </td>
                    <td style="text-align: right">
                        <label for="nom" style="color:white;">Nom :</label>
                    </td>
                    <td>
                        <input type="text" id="nom" name="nom" placeholder="Veuillez entrer votre nom" value="<?php if(isset($nom)) {echo $nom;} ?>">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        <label for="email" style="color:white;">E-mail :</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="mail" placeholder="Veuillez entrer votre adresse e-mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
                    </td>
                    <td style="text-align: right">
                        <label for="usertype" style="color:white;">Type d'utilisateur :</label>
                    </td>
                    <td>
                        <select id="usertype" name="usertype" class="select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        <label for="password" style="color:white;">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="password" class="password2" id="password" size="15" maxlength="100" onkeyup="return robustesse();" onkeyup="check()" placeholder="Veuillez entrer votre mot de passe"required>
                    </td>
                    <td style="text-align: right">
                        <label for="confirmation" style="color:white;">Confirmation :</label>
                    </td>
                    <td>
                        <input type="password" name="confirmation" id="confirmation" onkeyup="check()" placeholder="Veuillez confirmer votre mot de passe" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <span id="force"></span>
                    </td>
                    <td></td>
                    <td >
                        <span id="message"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="checkbox" onclick="Afficher()" name="afficher">Afficher le mot de passe
                    </td>
                    <td></td>
                    <td>
                        <input type="checkbox" onclick="AfficherConfirmation()" name="afficher">Afficher le mot de passe
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <?php
                        if (isset($erreur))
                        {
                            echo '<span style="color: red; ">' . $erreur . '</span>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" class="btn" name="forminscription" value="inscrire un utilisateur">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script src="../js/mdp.js"></script>
</body>
</html>
 <?php

} else {
    header("Location: ../public/index.php");
}
?>
