<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <title>G9Bwebpage</title>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vivus/0.4.5/vivus.min.js" integrity="sha512-NBLGIjYyAoYAr23l+dmAcUv7TvFj0XrqZoFa4i1o+F2VvF9SrERyMD8BHNnJn1SEGjl1AouBDcCv/q52L3ozBQ==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/switch_content.js"></script>
</head>
<body>
    <!-- titre -->

    <div id="titre">
        <table>
            <tr>
                <td align="right">
                    <ion-icon name="log-in-outline"  class="icon"></ion-icon>
                </td>
                <td>
                    <button class="connexion btn white">Connexion</button>
                </td>
                <td rowspan="4">

                    <div class="box-co">
                        <?php include ("../membres/connexion.php"); ?>
                    </div>
                    <div class="box-contact">
                        <?php include("contacter.php") ?>
                    </div>
                    <div class="box-about">
                        <h1 align="center" style="color: white;">A propos</h1>
                        <p style="color:white;">
                            Site web de la socièté Wistmed, afin d’offrir aux clients de notre manchon un suivi de leurs données des différents tests psychotechniques. Ce site permet aux clients de s'authentifier, afin de consulter les données des différents test psychotechniques qu'ils ont effectué.
                            Ce site permet également aux médecins de s'authentifier afin qu'ils puissent inscrire de nouveaux utilisateurs.
                        </p>
                    </div>
                    <div class="box-logo">
                        <?php include("svganimation.php"); ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <ion-icon name="help-circle-outline" class="icon"></ion-icon>
                </td>
                <td >
                    <button id="FAQ" class="btn white">FAQ</button>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <ion-icon name="information-circle-outline" class="icon"></ion-icon>
                </td>
                <td>
                    <button href="index.php#propos" class="about btn white">A propos</button>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <ion-icon name="mail-outline" class="icon"></ion-icon>
                </td>
                <td>
                    <button href="index.php#contact" class="contact btn white">Nous contacter</button>
                </td>
            </tr>
        </table>
    </div>

    <!-- pied de page -->
    <?php include('footer.php') ?>
    <script src="../js/svganimation.js"></script>
    <script>
        var btn_FAQ = document.getElementById('FAQ');
        btn_FAQ.addEventListener('click', function (){
            document.location.href = 'FAQ.php'
        })
    </script>
</body>
</html>

    
