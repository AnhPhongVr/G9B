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
                    <ion-icon name="id-card" class="icon"></ion-icon><br/>
                    Profil
                </button>
            </td>
            <td>
                <button id="data" class="btn-menu">
                    <ion-icon name="analytics" class="icon"></ion-icon><br/>
                    Données
                </button>
            </td>
            <td>
                <button id="test" class="btn-menu">
                    <ion-icon name="fitness" class="icon"></ion-icon><br/>
                    Test
                </button>
            </td>
        </tr>
        <tr>
            <td>
                <button id="contact" class="btn-menu">
                    <ion-icon name="mail" class="icon"></ion-icon><br/>
                    Administrateur
                </button>
            </td>
            <td>
                <button id="FAQ" class="btn-menu">
                    <ion-icon name="help" class="icon"></ion-icon><br/>
                    FAQ
                </button>
            </td>
            <td>
                <button id="logout" class="btn-menu">
                    <ion-icon name="log-out-outline" class="icon"></ion-icon><br/>
                    Déconnexion
                </button>
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
    var btn_contact = document.getElementById('contact');
    btn_contact.addEventListener('click', function (){
        document.location.href = '<?php echo "contact.php?id=" .$_SESSION['id']; ?>'
    })
</script>
</body>
</html>