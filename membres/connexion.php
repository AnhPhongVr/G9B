<?php


$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: ../membres/utilisateur/profil.php?id=" .$_SESSION['id']);
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe";
        }
    }
    else
    {
        $erreur = "Tous les champ doivent etre complétés !";
    }
}

?>
<h1 align="center" style="color: white; margin-top: 10%;">Connexion</h1>
<form id="login_form" method="POST" action="" class="form-container">
    <table align="center">
        <tr>
            <td style="text-align: right">
                <label for="mail" style="color: white;">Email :</label>
            </td>
            <td>
                <input id="mail" type="email" name="mailconnect" placeholder="mail" />
            </td>
        </tr>
        <tr>
            <td style="text-align: right">
                <label for="psw" style="color: white;">mot de passe :</label>
            </td>
            <td>
                <input id="psw" type="password" name="mdpconnect" placeholder="mot de passe" />
            </td>
        </tr>
        <?php
        if (isset($erreur))
        {
            echo '<tr><td colspan="2"><span id="login_errors" style="color: red;">' . $erreur . '</span></td></tr>';
            $error = true;
        } else{
            $error = false;
        }
        ?>
        <tr>
            <td>
            </td>
            <td>
                <input onclick="form_submit()" type="submit" name="formconnexion" class="btn" id="login_button" value="Connexion" />
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    function form_submit() {
        document.getElementById("search_form").submit();
    }
    var error = <?php echo json_encode($error); ?>;
</script>