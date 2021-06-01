<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Données</title>
    <meta charset="utf-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/data.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</head>
<body>
<div class="main">

    <!-- barre de navigation transparente à gauche -->
    <div class="menu">
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
    <div id="titre" class="data-box" align="center">
        <table>
            <tr>
                <th class="title" colspan="3">
                    <h1 align="center" style="color: white;">Mes données</h1>
                </th>
            </tr>
            <tr>
                <th>
                    Test
                </th>
                <th>
                    Résultat
                </th>
                <th>
                    Date
                </th>
            </tr>
            <?php while ($userinfo = $requser->fetch()){ ?>
                <tr>
                    <td>
                        <?php echo $userinfo['test'];?>
                    </td>
                    <td>
                        <?php echo $userinfo['resultats'];
                        if($userinfo['test'] == 'cardiaque'){
                            echo 'bpm';
                        }
                        if($userinfo['test'] == 'reflexe son' or $userinfo['test'] == 'reflexe visuel'){
                            echo 'seconde';
                        }
                        if($userinfo['test'] == 'trouble auditifs'){
                            echo '/10';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $userinfo['date'];?>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>

<a href="graphique.php">Graph</a>

</body>
</html>