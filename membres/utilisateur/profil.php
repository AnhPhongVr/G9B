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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>

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

            <div class="contenu">
                <img src="../../images/Jean.png" alt="logo utilisateur" weight="420px" width="420px">
                <table>
                    <tr>
                        <td class="col1">Nom</td>
                        <td><?php echo $userinfo['nom']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Prénom</td>
                        <td><?php echo $userinfo['prenom'];?></td>
                    </tr>
                    <tr>
                        <td class="col1">Adresse e-mail</td>
                        <td><?php echo $userinfo['mail']; ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Date de naissance</td>
                        <td><?php if($userinfo['datedenaissance'] == NULL){echo 'nothing';} else{echo $userinfo['datedenaissance'];} ?></td>
                    </tr>
                    <tr>
                        <td class="col1">Type d'utilisateur</td>
                        <td><?php echo $userinfo['usertype']; ?></td>
                    </tr>
                </table>
                <?php
                        if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                        {
                            ?>
                <button class="btnEditer" id="btnEditer">
                    <b>Editer mon profil</b>
                </button>
                <?php
                        }
                        ?>
            </div>
        </div>
        <script >
            var btn_editer = document.getElementById('btnEditer');
    btn_editer.addEventListener('click', function (){
        document.location.href = '<?php echo "editionprofil.php?id=" .$_SESSION['id']; ?>'
    })
        </script>
    </body>
</html>
<?php
}
?>