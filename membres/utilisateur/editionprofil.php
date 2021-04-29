<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

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

    if(isset($_POST['newnom']) AND $_POST['newnom'] == $user['nom'])
    {
        header('Location: profil.php?id='.$_SESSION['id']);
    }

    if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Profil</title>
        <meta charset="utf-8">
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/editionprofil.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>

    <div class="main">
        <div class="contenu">
            <h2>Edition du profil</h2>

               <div class="main">
                <div class="menu">
                    <?php if($userinfo['usertype'] == $_SESSION['usertype']){ ?>
                        <a href="<?php echo "../admin.php?id=" .$_SESSION['id'];?>">Menu</a>
                        <a href="<?php echo "profil.php?id=" .$_SESSION['id'];?>">Mon profil</a>
                        <?php
                    } else { ?>
                        <a href="<?php echo "menu.php?id=" .$_SESSION['id'];?>">Menu</a>
                        <a href="<?php echo "profil.php?id=" .$_SESSION['id'];?>">Mon profil</a>
                        <a href="<?php echo "données.php?id=" .$_SESSION['id'];?>">Mes données</a>
                        <?php
                        if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                        {
                            ?>
                            <a href="<?php echo "test.php?id=" .$_SESSION['id'];?>">Faire un test</a>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                    {
                        ?>
                        <a href="../deconnexion.php">Se déconnecter</a>
                        <?php
                    }
                    ?>
                </div>

            
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>
                                <label>Nom :</label>
                            </td>
                            <td>
                                <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Prénom :</label>
                            </td>
                            <td>
                                <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Adresse email :</label>
                            </td>
                            <td>
                                <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date de naissance :</label>
                            </td>
                            <td>
                                <input type="date" name="newdate"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mot de passe :</label>
                            </td>
                            <td>
                                <input type="password" name="newmdp1" placeholder="nouveau mot de passe" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirmation du mot de passe :</label>
                            </td>
                            <td>
                                <input type="password" name="newmdp2" placeholder="confirmation mot de passe" />
                            </td>
                        </tr>
                    </table>
                    <input class="btn" type="submit" value="Mettre à jour mon profil !"/>
                </form>
                <img class="logoUtilisateur" src="../../images/Jean.png" alt="logo utilisateur">
            <?php if(isset($msg)) { echo $msg; } ?>
        </div>
    </div>
    </body>
</html>
<?php
}
}
else
{
    header("Location : ../../public/index.php");
}
?>