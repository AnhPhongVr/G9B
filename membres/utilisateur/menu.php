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

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../../css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</head>
<body>
<div id="titre">
   <table align="center">
        <tr>
            <td colspan="3">
                <h1 align="center" style="color: white;">Bonjour <?php echo $userinfo['nom'] ?> <?php echo $userinfo['prenom'];?></h1>
            </td>
        </tr>
        <tr>
            <td>
                <button id="profil" class="btn-menu">
                        <ion-icon name="id-card" class="icon"></ion-icon>
                        Profil
                </button>
            </td>
            <td>
                <button id="data" class="btn-menu">
                        <ion-icon name="analytics" class="icon"></ion-icon>
                        Données
                </button>
            </td>
            <td>
                <button id="test" class="btn-menu">
                        <ion-icon name="fitness" class="icon"></ion-icon>
                        Test
                </button>
            </td>
        </tr>
        <tr>
            <td>
                <button class="btn-menu">
                    <ion-icon name="people" class="icon"></ion-icon>
                    Autres utilisateurs
                </button>
            </td>
            <td>
                <button id="FAQ" class="btn-menu">
                    <ion-icon name="help" class="icon"></ion-icon>
                    FAQ
                </button>
            </td>
            <td>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <button id="logout" class="btn-menu">
                            <ion-icon name="log-out-outline" class="icon"></ion-icon>
                            Déconnexion
                    </button>
                    <?php
                }
                ?>
            </td>
        </tr>
   </table>
</div>
<script>
    var btn_profil = document.getElementById('profil');
    btn_profil.addEventListener('click', function (){
        document.location.href = '<?php echo "profil.php?id=" .$_SESSION['id']; ?>'
    })
    var btn_data = document.getElementById('data');
    btn_data.addEventListener('click', function (){
        document.location.href = '<?php echo "données.php?id=" .$_SESSION['id']; ?>'
    })
    var btn_test = document.getElementById('test');
    btn_test.addEventListener('click', function (){
        document.location.href = '<?php echo "test.php?id=" .$_SESSION['id']; ?>'
    })
    var btn_logout = document.getElementById('logout');
    btn_logout.addEventListener('click', function (){
        document.location.href = '<?php echo "../deconnexion.php?id=" .$_SESSION['id']; ?>'
    })
    var btn_FAQ = document.getElementById('FAQ');
    btn_FAQ.addEventListener('click', function (){
        document.location.href = '<?php echo "../../public/FAQ.php?id=" .$_SESSION['id']; ?>'
    })
</script>
</body>
</html>
    <?php
}
?>
