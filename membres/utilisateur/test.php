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
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="../../css/FaireTests.css" />
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <meta charset="utf-8">
        <link href="../../css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

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

<!-- partie de droite -->
        <div class="encadre">
            <div class = "phrase"> Sélectionnez le(s) test(s) que vous voulez réaliser :</div>

                <table class="table-test">
             
                    <tr>
                        <td>
                            <ion-icon name="pulse" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="frequence" value="frequence" /> Mesurer ma fréquence cardiaque 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <ion-icon name="thermometer" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="temperature" value="temperature" /> Mesurer la température superficielle de ma peau
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ion-icon name="musical-notes" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="oreille" value="oreille" class="checkbox"/> Mesurer mes troubles auditifs
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ion-icon name="eye" class="icon2"></ion-icon>
                            <ion-icon name="ear" class="icon2"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="frequence" value="frequence" /> Mesurer mes réflexes (visuels et sonore)
                        </td>
                    </tr> 
                </table>
                <button class="btn-test"> Commencer le Test </button>
            </div>
        </div>


</div>
</body>
</html>
<?php
}
else
{
    header("Location : ../../public/index.php");
}
?>
