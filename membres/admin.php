<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <title>menu administrateur</title>
            <meta charset="utf-8">

            <!-- font google -->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

            <link href="../css/style.css" rel="stylesheet">
            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

        </head>
        <body>
        <div id="titre">
            <table align="center">
                <tr>
                    <td colspan="4">
                        <h1 align="center" style="color: white;">Bonjour <?php echo $userinfo['nom'] ?> <?php echo $userinfo['prenom'];?></h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="profil" class="btn-admin">
                            <ion-icon name="id-card" class="icon-admin"></ion-icon>
                            Profil
                        </button>
                    </td>
                    <td>
                        <button id="other" class="btn-admin">
                            <ion-icon name="people" class="icon-admin"></ion-icon>
                            Gérer un utilisateur
                        </button>
                    </td>
                    <td rowspan="2" colspan="2">
                        <div class="msg">
                            <p class ="titre_message"> Nouveau(x) message(s): </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="sign" class="btn-admin">
                            <ion-icon name="add" class="icon-admin"></ion-icon>
                            Inscrire un utilisateur
                        </button>
                    </td>
                    <td>
                        <button id="FAQ" class="btn-admin">
                            <ion-icon name="help" class="icon-admin"></ion-icon>
                            FAQ
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="logout" class="btn-admin">
                            <ion-icon name="log-out-outline" class="icon-admin"></ion-icon>
                            Déconnexion
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <script>
            var btn_profil = document.getElementById('profil');
            btn_profil.addEventListener('click', function (){
                document.location.href = '<?php echo "utilisateur/profil.php?id=" .$_SESSION['id']; ?>'
            })
            var btn_logout = document.getElementById('logout');
            btn_logout.addEventListener('click', function (){
                document.location.href = '<?php echo "deconnexion.php?id=" .$_SESSION['id']; ?>'
            })
            var btn_FAQ = document.getElementById('FAQ');
            btn_FAQ.addEventListener('click', function (){
                document.location.href = '<?php echo "../public/FAQ.php?id=" .$_SESSION['id']; ?>'
            })
            var btn_sign = document.getElementById('sign');
            btn_sign.addEventListener('click', function (){
                document.location.href = '<?php echo "inscription.php?id=" .$_SESSION['id']; ?>'
            })
        </script>
        </body>
        </html>
        <?php
    } else {
        header("Location: ../public/index.php");
    }
} else {
    header("Location: ../public/index.php");
}
?>
