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
            <p> Collecte de données à caractère personnel</p><br>
            <p>
                Witsmed, dans ses relations avec les Utilisateurs, va être amené à collecter et traiter des données à caractère personnel des Utilisateurs, lesquelles données lui auront été communiquées par ces derniers lors de leur inscription ou ultérieurement via son compte personnel sur le Site.
                La récolte et l’analyse de ces informations sont nécessaires pour permettre aux Utilisateurs d’accéder aux services proposés par Infinite Measures.
                Sauf sur demande ou avec l’accord exprès de l’Utilisateur et dans le strict respect de ses directives, Witsmed ne procèdera à aucun autre traitement de données à caractère personnel autre que ceux décrits au sein des présentes mentions légales.
            </p>
        </div>

        <button class="accordion">Section 2</button>
        <div class="panel">
            <p> FINALITÉS DU TRAITEMENT</p><br>
            <p>
                Les données à caractère personnel collectées par Infinite Measures sont traitées pour les finalités suivantes :
                permettre l’accès aux services de formation au permis de conduire qu’elle propose ;
                permettre l’utilisation des services de formation au permis de conduire qu’elle propose ;
                permettre aux Utilisateurs de candidater aux offres d’emploi qu’elle propose ;
                et toute autre utilisation qui permet d’améliorer le fonctionnement du Site.
            </p>
        </div>

        <button class="accordion">Section 3</button>
        <div class="panel">
            <p>DIVULGATION DES DONNÉES </p><br>
            <p>
                ISEP s’engage à garantir le respect de la vie privée des internautes qui visitent ce site web et à veiller dans les limites de l’état de l’art à la confidentialité des informations personnelles qui lui sont transmises.
                Les destinataires des données sont  ISEP et ses collaborateurs uniquement.
            </p>
        </div>
        <button class="accordion">Section 4</button>
        <div class ="panel">
            <p>DROITS D'ACCÈS, DE MODIFICATION ET DE SUPPRESSION DES DONNÉES</p><br>
            <p>
                Conformément à la loi «informatique et libertés» du 6 janvier 1978, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous concernent. Si vous souhaitez exercer ce droit et obtenir communication des informations vous concernant, veuillez adresser un courrier à M. Dieudonné Abboud,  ISEP ,  28 rue Notre Dame des Champs, 75006 Paris, en joignant une photocopie de votre carte d’identité.
                Afin de répondre à votre demande, merci de nous fournir quelques indications (date et contexte de votre dernier contact avec ISEP.  Merci également d’indiquer un numéro de téléphone pour vous joindre si nous avons besoin de précision pour traiter avec célérité votre demande.
                Vous pouvez également, pour des motifs légitimes, vous opposer au traitement des données vous concernant.
            </p>
        </div>
        <button class="accordion">Section 5</button>
        <div class="panel">
            <p>Accès au site et au service fournis</p><br>
            <p>
                Ce site est le site conçu par la société Witsmed sous la requête de la société Infinite Measures. Y sont présents des tests afin de déterminer ses aptitudes psychotechniques pour un médecin ou un patient. Le service proposé est un système de gestion de compte et de statistiques intrinsèque aux comptes et à l’issu des tests.
            </p>
        </div>
        <button class="accordion">Section 6</button>
        <div class="panel">
            <p>Propriété intellectuelle</p><br>
            <p>
                La société Wistmed est protégée par la propriété intellectuelle sur le contenu de son site internet tels que le texte, les logos, les images et autres signes distinctifs. Tout contenu recopié peut entraîner de lourdes sanctions.
            </p>
        </div>
        <button class="accordion">Section 7</button>
        <div class="panel">
            <p>Données personnelles</p><br>
            <p>
                La société Witsmed traite des données personnelles des utilisateurs, Witsmed s’engage à ne divulguer aucune information personnelle sans l'accord préalable de l’utilisateur. Les données personnelles ont un but uniquement statistique et pratique pour l'hôpital et l’utilisateur si ce dernier décide d’utiliser notre solution.
            </p>
        </div>
        <button class="accordion">Section 8</button>
        <div class="panel">
            <p>Responsabilité</p><br>
            <p>
                Witsmed prend la responsabilité de protéger les données personnelles des utilisateurs et en aucun cas les divulguer sans l'accord de l’utilisateur.
                L’utilisateur, en utilisant notre solution prend la responsabilité de s’engager avec la société Witsmed dans un cadre pédagogique. Il accepte de soumettre ses informations personnelles pour l’analyse et l’interprétation des résultats.
            </p>
        </div>
        <button class="accordion">Section 9</button>
        <div class="panel">
            <p>Force majeur</p><br>
            <p>
                La responsabilité de la société Witsmed  ne pourra être engagée en cas de force majeure ou de faits indépendants de sa volonté.
            </p>
        </div>
        <button class="accordion">Section 10</button>
        <div class="panel">
            <p>Modification / Évolution / Mise-à-jour</p><br>
            <p>
                Les CGU sont susceptibles d’être modifiées lors du développement du site. Il est conseillé de les surveiller régulièrement.
            </p>
        </div>
        <button class="accordion">Section 11</button>
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


