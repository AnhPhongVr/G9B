<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
        $newprenom = htmlspecialchars($_POST['newpsrenom']);
        $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($newprenom, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
        $newmail= htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newdate']) AND !empty($_POST['newdate']) AND $_POST['newdate'] != $user['datedenaissance']) {
        $newdate= htmlspecialchars($_POST['newdate']);
        $insertdate = $bdd->prepare("UPDATE membres SET datedenaissance = ? WHERE id = ?");
        $insertdate->execute(array($newdate, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
    ?>
    <html>
    <head>
        <title>tuto espace membre</title>
        <meta charset="utf-8">
    </head>
    <body>
    <div align="center">
        <h2>Edition de mon profil</h2>
        <div align="left">
            <form method="POST" action="">
                <label>Prenom :</label>
                <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']?>"/> <br /> <br/>
                <label>Nom :</label>
                <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']?>"> <br /> <br />
                <label>Mail :</label>
                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']?>"/> <br /> <br/>
                <label>Date de naissance :</label>
                <input type="date" name="newdate"/> <br /> <br />
                <label>Mot de passe :</label>
                <input type="password" name="newmdp1" placeholder="nouveau mot de passe" /> <br /> <br/>
                <label>Confiramtion - mot de passe :</label>
                <input type="password" name="newmdp2" placeholder="confirmation mot de passe" /> <br /> <br/>
                <input type="submit" value="Mettre à jour mon profil !"/>
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
        </div>
    </div>
    </body>
    </html>
    <?php
}
else
{
    header("Location : connexion.php");
}
?>