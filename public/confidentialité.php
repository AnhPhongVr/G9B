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
<!--La contenu de la FAQ-->
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
        <button class="accordion">Section 1</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Section 2</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Section 3</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>
<!-- pied de page -->
<?php include("footer.php") ?>

<script src="../js/accordion.js"></script>

</body>
</html>


