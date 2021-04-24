<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

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
        <link href="../../css/profil.css" rel="stylesheet">
    </head>
    <body>

        <div class="main">
            <div class="menu">
                <a href="profil.php">Mon profil</a>
                <a href="données.php">Mes données</a>
                <a href="test.php">Faire un test</a>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <a href="../deconnexion.php">Se déconnecter</a>
                    <?php
                }
                ?>
            </div>

            <div class="contenu">
                <img src="../../images/utilisateur.png" alt="logo utilisateur">
                <table>
                    <tr>
                        <td>Nom</td>
                        <td><?php echo $userinfo['nom']; ?></td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><?php echo $userinfo['prenom'];?></td>
                    </tr>
                    <tr>
                        <td>Adresse e-mail</td>
                        <td><?php echo $userinfo['mail']; ?></td>
                    </tr>
                    <tr>
                        <td>Date de naissance</td>
                        <td><?php if($userinfo['datedenaissance'] == NULL){echo 'nothing';} else{echo $userinfo['datedenaissance'];} ?></td>
                    </tr>
                    <tr>
                        <td>Type d'utilisateur</td>
                        <td><?php echo $userinfo['usertype']; ?></td>
                    </tr>
                </table>
                <button>
                    <b>
                        <?php
                        if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                        {
                            ?>
                            <a href="editionprofil.php">Editer mon profil</a>
                            <?php
                        }
                        ?>
                    </b>
                </button>
            </div>
        </div>
    </body>
</html>
<?php
}
?>