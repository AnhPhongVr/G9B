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
                <?php if($userinfo['usertype'] == 'admin'){ ?>
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
        
            <?php if(isset($msg)) { echo $msg; } ?>
        </div>
    </div>
</body>
</html>
