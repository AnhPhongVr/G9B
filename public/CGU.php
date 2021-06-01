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
    <link href="../css/accordion.css" rel="stylesheet">
    <title>G9Bwebpage</title>
</head>
<body>
<!-- navbar -->
<?php include("navbar.php"); ?>
<!-- popup connexion -->
<?php include("../membres/connexion.php") ?>
<!-- popup inscription -->
<?php include("../membres/inscription.php") ?>

<h1 align="center">Condition Génerale d'utilisation</h1>
<hr style="height:1px;border:none;color:black;background-color:black;"/>

<div class="accordion-content">
    <div style="border-radius: .25rem;">
        <button class="accordion">Section 1</button>
        <div class="panel">
            <p>Accès au site et au service fournis</p><br>
            <p>
                Ce site est le site conçu par la société Witsmed sous la requête de la société Infinite Measures. Y sont présents des tests afin de déterminer ses aptitudes psychotechniques pour un médecin ou un patient. Le service proposé est un système de gestion de compte et de statistiques intrinsèque aux comptes et à l’issu des tests.
            </p>
        </div>
        <button class="accordion">Section 2</button>
        <div class="panel">
            <p>Propriété intellectuelle</p><br>
            <p>
                La société Wistmed est protégée par la propriété intellectuelle sur le contenu de son site internet tels que le texte, les logos, les images et autres signes distinctifs. Tout contenu recopié peut entraîner de lourdes sanctions.
            </p>
        </div>
        <button class="accordion">Section 3</button>
        <div class="panel">
            <p>Données personnelles</p><br>
            <p>
                La société Witsmed traite des données personnelles des utilisateurs, Witsmed s’engage à ne divulguer aucune information personnelle sans l'accord préalable de l’utilisateur. Les données personnelles ont un but uniquement statistique et pratique pour l'hôpital et l’utilisateur si ce dernier décide d’utiliser notre solution.
            </p>
        </div>
        <button class="accordion">Section 4</button>
        <div class="panel">
            <p>Responsabilité</p><br>
            <p>
                Witsmed prend la responsabilité de protéger les données personnelles des utilisateurs et en aucun cas les divulguer sans l'accord de l’utilisateur.
                L’utilisateur, en utilisant notre solution prend la responsabilité de s’engager avec la société Witsmed dans un cadre pédagogique. Il accepte de soumettre ses informations personnelles pour l’analyse et l’interprétation des résultats.
            </p>
        </div>
        <button class="accordion">Section 5</button>
        <div class="panel">
            <p>Force majeur</p><br>
            <p>
                La responsabilité de la société Witsmed  ne pourra être engagée en cas de force majeure ou de faits indépendants de sa volonté.
            </p>
        </div>
        <button class="accordion">Section 6</button>
        <div class="panel">
            <p>Modification / Évolution / Mise-à-jour</p><br>
            <p>
                Les CGU sont susceptibles d’être modifiées lors du développement du site. Il est conseillé de les surveiller régulièrement.
            </p>
        </div>
        <button class="accordion">Section 7</button>
        <div class="panel">
            <p>Droit applicable et juridiction compétente</p><br>
            <p>
                Cette partie permet de délimiter le droit applicable et la juridiction compétente et notamment le lieu du tribunal compétent en cas de litige.
            </p>
        </div>

    </div>
</div>
<!-- pied de page -->
<?php include("footer.php") ?>

<script src="../js/accordion.js"></script>
<script src="../js/popup.js"></script>
</body>
</html>


