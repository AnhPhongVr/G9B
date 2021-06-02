<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <link href="../css/accordion.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <title>G9Bwebpage</title>
</head>
<body>
<div class="faq">
    <?php
    if (isset($_SESSION['usertype']) AND isset($userinfo) AND $userinfo['usertype'] == 'admin'){
        ?>
        <a  class="accueil" href="<?php echo "../membres/admin.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    }
    else if (isset($_SESSION['id']) AND isset($userinfo) AND $userinfo['id'] == 'id')
    {
        ?>
        <a  class="accueil" href="<?php echo "../membres/utilisateur/menu.php?id=" .$_SESSION['id'];?>">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    } else { ?>
        <a  class="accueil" href="index.php">
            <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
            <!-- <img src="../images/Infinite measure détouré intérieur blanc.png" alt="logoClient" width="50px" height="50px"> -->
        </a>
        <?php
    }
    ?>


    <h1 align="center">Confidentialité</h1>
    <hr style="height:1px;border:none;color:black;background-color:black;"/>
    <div class="accordion-content">
        <div style="border-radius: .25rem;">
            <button class="accordion">Article 1-rincipes généraux en matière de collecte et de traitement des données
            </button>
            <div class="panel">
                <p>Conformément aux dispositions de l'article 5 du Règlement européen 2016/679, la collecte et le traitement des données des utilisateurs du site respectent les principes suivants :
                    Licéité, loyauté et transparence : les données ne peuvent être collectées et traitées qu'avec le consentement de l'utilisateur propriétaire des données. A chaque fois que des données à caractère personnel seront collectées, il sera indiqué à l'utilisateur que ses données sont collectées, et pour quelles raisons ses données sont collectées ;
                    Finalités limitées : la collecte et le traitement des données sont exécutés pour répondre à un ou plusieurs objectifs déterminés dans les présentes conditions générales d'utilisation ;
                    Minimisation de la collecte et du traitement des données : seules les données nécessaires à la bonne exécution des objectifs poursuivis par le site sont collectées ;
                    Conservation des données réduites dans le temps : les données sont conservées pour une durée limitée, dont l'utilisateur est informé. Si la durée de conservation ne peut être communiquée à l'utilisateur ;
                    Intégrité et confidentialité des données collectées et traitées : le responsable du traitement des données s'engage à garantir l'intégrité et la confidentialité des données collectées.
                </p>
            </div>

            <button class="accordion">Article 2-Données à caractère personnel collectées et traitées dans le cadre de la navigation sur le site
            </button>
            <div class="panel">
                <p> Les données à caractère personnel collectées sur le site de Witsmed sont les suivantes :
                    Les informations données par l'utilisateur dans les formulaires d'élaboration des contrats (nom, prénom, adresse...) permettant la création de son dossier juridique ou de contextualiser sa démarche,
                    Les caractéristiques techniques des moyens de connexion au site web (taille de l'écran, adresse IP...),
                    Et éventuellement les informations relatives à l'usage du site : nombre de commandes, temps passés, articles consultés...
                </p>
            </div>
            <button class="accordion">Article 3-Droits de l’utilisateur</button>
            <div class="panel">
                <p>Conformément à la réglementation concernant le traitement des données à caractère personnel, l'utilisateur possède les droits ci-après énumérés.
                    Afin que le responsable du traitement des données fasse droit à sa demande, l'utilisateur est tenu de lui communiquer : ses prénom et nom ainsi que son adresse e-mail, et si cela est pertinent, son numéro de compte ou d'espace personnel ou d'abonné.
                </p>
            </div>
            <button class="accordion">Article 4- Conditions de modification de la politique de confidentialité
            </button>
            <div class="panel">
                <p>La présente politique de confidentialité peut être consultée à tout moment sur le site de Witswed
                    L'éditeur du site se réserve le droit de la modifier afin de garantir sa conformité avec le droit en vigueur.
                    Par conséquent, l'utilisateur est invité à venir consulter régulièrement cette politique de confidentialité afin de se tenir informé des derniers changements qui lui seront apportés.
                    Il est porté à la connaissance de l'utilisateur que la dernière mise à jour de la présente politique de confidentialité est intervenue le : 02/06/2021.
                </p>
            </div>
            <button class="accordion">Section 5-Acceptation par l’utilisateur de la politique de confidentialité
            </button>
            <div class="panel">
                <p>En naviguant sur le site, l'utilisateur atteste avoir lu et compris la présente politique de confidentialité et en accepte les conditions, en ce qui concerne plus particulièrement la collecte et le traitement de ses données à caractère personnel.</p>
            </div>
    </div>
    <!-- pied de page -->
    <?php include("publicview/footer.php") ?>

    <script src="../js/accordion.js"></script>

</body>
</html>