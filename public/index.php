<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/popup.css" rel="stylesheet">
    <title>G9Bwebpage</title>
</head>
<body>
    <!-- navbar -->
    <?php include("navbar.php"); ?>
    <!-- popup connexion -->
    <?php include("../membres/connexion.php") ?>
    <!-- popup inscription -->
    <?php include("../membres/inscription.php") ?>

    <!-- titre -->

    <div id="titre">
        <h2 data-text = "Infinite"> Infinite </h2>
        <h2 data-text = "Measures"> Measures </h2>
        <img src="..\images\Infinite measure détouré intérieur.png" alt="LogoWitsmed" width="400px" height="400px"/>
    </div>

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

    <!-- nous contacter -->
    <?php include ("contacter.php") ?>

    <!-- pied de page -->
    <?php include("footer.php") ?>



<script src="../js/popup.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>

    
