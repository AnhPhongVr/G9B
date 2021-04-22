<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre; charset=utf8', 'root', 'root');

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
            header("Location: ../membres/profil.php?id=" .$_SESSION['id']);
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
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form method="POST" action="" class="form-container">
            <h1 class="titre" >Connexion</h1>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Entrez votre email" name="mailconnect" required>
            <label for="psw"><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrez votre mot de passe" name="mdpconnect" required>
            <?php
            if (isset($erreur))
            {
                echo '<span style="color: red; ">' . $erreur . '</span>';
            }
            ?>
            <input onclick="form_submit()" type="submit" name="formconnexion" class="btn" value="Connexion">
        </form>
    </div>
</div>
<script type="text/javascript">
    function form_submit() {
        document.getElementById("search_form").submit();
    }
</script>