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
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/popup.css" rel="stylesheet">
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
                        <?php include ("contacter.php")?>
                    </div>
                    <div class="box-about">
                        <h1 align="center" style="color: white;">A propos</h1>
                        <p style="color:white;">
                            s nec turpis vel, semper malesuada ante. Vestibulum id metus ac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet sagittis. In tincidunt orci sit amet elementum vestibulum. Vivamus fermentum in arcu in aliquam. Quisque aliquam porta odio in fringilla. Vivamus nisl leo, blandit at bibendum eu, tristique eget risus. Integer aliquet quam ut elit suscipit, id interdum neque porttitor. Integer faucibus ligula.
                        </p>
                    </div>
                    <div class="box-logo">
                        <?php include ("svganimation.php"); ?>
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
<!--
    <div id="propos" class="milieuImg">
        <img class="imgSlideLeft" src="../images/objets.png" style="left: 0px;">
        <div class="texteDroite">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis augue eget erat maximus vestibulum. Aenean non egestas erat. Maecenas ornare, odio sit amet fringilla porta, tortor orci imperdiet ex, eu sagittis diam mi ac nibh.</p>
            <p>Sed porttitor eleifend tellus eu sagittis. Sed vitae risus bibendum, consectetur mauris a, suscipit est. Cras aliquam efficitur feugiat. Nam orci odio, lacinia non mi et, suscipit cursus sapien.</p>
        </div>
    </div>

    <div id="milieu">
        <div class="icones">
            <div class="milieuGauche animer" style="opacity: 1;">
                <ion-icon name="pulse" class="icone md hydrated" role="img" aria-label="pulse"></ion-icon>
                <p><b>Rythme cardiaque</b></p>
                <p>Le rythme cardiaque est un excellent indicateur de stress. Un pilote sachant gérer une situation angoissante saura également réguler ses réactions physiologiques.</p>
            </div>

            <div class="milieuCentre animer" style="opacity: 1;">
                <ion-icon name="thermometer" class="icone md hydrated" role="img" aria-label="thermometer"></ion-icon>
                <p><b>Température</b></p>
                <p>Mesurer la température corporelle du pilote permet de contrôler son état physique et peut prévenir les risques de réactions dangereuses (malaise, crise d’angoisse, etc.).</p>
            </div>

            <div class="milieuDroite animer" style="opacity: 1;">
                <ion-icon name="stopwatch" class="icone md hydrated" role="img" aria-label="stopwatch"></ion-icon>
                <p><b>Temps de réaction</b></p>
                <p>Mesurer le temps que met le pilote à réagir à un stimulus sonore ou visuel permet de s’assurer qu’en cas d’urgence, il saura prendre une décision à temps.</p>
            </div>
        </div>
    </div>
-->
    <!-- pied de page -->
    <?php include("footer.php") ?>
    <script src="../js/svganimation.js"></script>
    <script src="../js/popup.js"></script>
    <script>
        var btn_FAQ = document.getElementById('FAQ');
        btn_FAQ.addEventListener('click', function (){
            document.location.href = 'FAQ.php'
        })
    </script>
</body>
</html>

    
