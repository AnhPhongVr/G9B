<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres JOIN données ON membres.id = données.iduser WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
        <meta charset="UTF-8">

        <!-- font google -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/navbar.css" rel="stylesheet">
        <link href="../../css/popup.css" rel="stylesheet">
        <title>Contacter</title>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vivus/0.4.5/vivus.min.js" integrity="sha512-NBLGIjYyAoYAr23l+dmAcUv7TvFj0XrqZoFa4i1o+F2VvF9SrERyMD8BHNnJn1SEGjl1AouBDcCv/q52L3ozBQ==" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../js/switch_content.js"></script>
        </head>
        <body>
        <div class="main">

            <!-- barre de navigation transparente à gauche -->
            <div class="menu">
                <a href="<?php echo "menu.php?id=" .$_SESSION['id'];?>">Menu</a>
                <a href="<?php echo "profil.php?id=" .$_SESSION['id'];?>">Mon profil</a>
                <a href="<?php echo "données.php?id=" .$_SESSION['id'];?>">Mes données</a>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <a href="<?php echo "test.php?id=" .$_SESSION['id'];?>">Faire un test</a>
                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <a href="../deconnexion.php">Se déconnecter</a>
                    <?php
                }
                ?>
            </div>
            <div id="titre" class="data-box" align="center">
                <form method="POST" class="form-container">
                    <h1 align="center" style="color: white;">Envoyer un e-mail</h1>
                    <table align="center">
                        <tr>
                            <td style="text-align: right">
                                <label for="email" style="color: white;">Email :</label>
                            </td>
                            <td>
                                <input id="email" type="email" name="email" placeholder="E-mail"><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">
                                <label for="objet" style="color: white">Objet :</label>
                            </td>
                            <td>
                                <input id="objet" type="text" name="objet" placeholder="Objet"><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea cols="139" rows="15" name="message" placeholder="Écrivez votre message"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="send" class="btn" value="Confirmer" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </body>
        </html>
        <?php
    } else {
        header("Location: ../../public/index.php");
    }
} else {
    header("Location: ../../public/index.php");
}

if (isset($_POST['message'])) {
    $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $retour = mail('williamphong77@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
        if ($retour)
            echo '<p style="color: white">Votre message a été envoyé.</p>';
        else
            echo '<p style="color: white">Erreur.</p>';
    }
}
?>
