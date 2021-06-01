<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <title>G9Bwebpage</title>
</head>
<body style="overflow-y:hidden;">
<a  class="accueil" href="<?php echo "admin.php?id=" .$_SESSION['id'];?>">
    <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
</a>
<div id="titre" class="data-box" align="center">
    <form method="POST" action="" class="form-container">
        <table align = center>
            <tr>
                <td colspan="4">
                    <h1 align="center" style="color: white;">Inscrire un utilisateur</h1>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    <label for="prenom" style="color:white;"> Prénom :</label>
                </td>
                <td>
                    <input type="text" id="prénom" name="prenom" placeholder="Veuillez entrer votre prénom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" />
                </td>
                <td style="text-align: right">
                    <label for="nom" style="color:white;">Nom :</label>
                </td>
                <td>
                    <input type="text" id="nom" name="nom" placeholder="Veuillez entrer votre nom" value="<?php if(isset($nom)) {echo $nom;} ?>">
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    <label for="email" style="color:white;">E-mail :</label>
                </td>
                <td>
                    <input type="email" id="email" name="mail" placeholder="Veuillez entrer votre adresse e-mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
                </td>
                <td style="text-align: right">
                    <label for="usertype" style="color:white;">Type d'utilisateur :</label>
                </td>
                <td>
                    <select id="usertype" name="usertype" class="select">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">
                    <label for="password" style="color:white;">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" name="password" class="password2" id="password" size="15" maxlength="100" onkeyup="return robustesse();" onkeyup="check()" placeholder="Veuillez entrer votre mot de passe"required>
                </td>
                <td style="text-align: right">
                    <label for="confirmation" style="color:white;">Confirmation :</label>
                </td>
                <td>
                    <input type="password" name="confirmation" id="confirmation" onkeyup="check()" placeholder="Veuillez confirmer votre mot de passe" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <span id="force"></span>
                </td>
                <td></td>
                <td >
                    <span id="message"></span>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="checkbox" onclick="Afficher()" name="afficher">Afficher le mot de passe
                </td>
                <td></td>
                <td>
                    <input type="checkbox" onclick="AfficherConfirmation()" name="afficher">Afficher le mot de passe
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php
                    if (isset($erreur))
                    {
                        echo '<span style="color: red; ">' . $erreur . '</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="submit" class="btn" name="forminscription" value="inscrire un utilisateur">
                </td>
            </tr>
        </table>
    </form>
</div>
</div>
<script src="../js/mdp.js"></script>
</body>
</html>