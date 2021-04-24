<?php

$bdd = new PDO('mysql:localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_POST['forminscription']))
{
    $prénom = htmlspecialchars($_POST['prénom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $pwd = sha1($_POST['password']);
    $conf = sha1($_POST['confirmation']);

    if(!empty($_POST['prénom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['confirmation']))
    {
        $prénomlength = strlen($prénom);
        $nomlength = strlen($nom);
        if ($prénomlength <= 255 AND $nomlength <=255)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if($mailexist == 0)
                {
                    if ($pwd == $conf)
                    {
                        $insertmbr = $bdd->prepare("INSERT INTO membres(id, prenom, nom, usertype, mail, datedenaissance, motdepasse) VALUES (NULL, ?, ?, '', ?, NULL, ?)");
                        $insertmbr->execute(array($prénom, $nom, $mail, $pwd));
                        $erreur = "Votre compte a bien été crée ! <a href=\"connexion.php\">Me connecter</a>";
                    }
                    else
                    {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                }
                else
                {
                    $erreur = "Adresse mail déjà utilisée !";
                }
            }
            else
            {
                $erreur = "Votre adresse mail n'est pas valide";
            }
        }
        else
        {
            $erreur = "Votre nom ou prénom ne doit pas dépasser 255 caractères";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}

?>
<!-- Popup -->
<div id="Popup" class="modal">
    <div class="modal-content">
        <span class="close btnClose">&times;</span>
        <form method="POST" action="" class="form-container">
            <h1 class="titre">Inscription</h1>
            <label for="prenom"><b>Prénom :</b></label>
            <input type="text" id="prénom" name="prénom" placeholder="Veuillez entrer votre prénom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" />
            <label for="nom"><b>Nom :</b></label>
            <input type="text" id="nom" name="nom" placeholder="Veuillez entrer votre nom" value="<?php if(isset($nom)) {echo $nom;} ?>">
            <label for="adresse mail"><b>Adresse e-mail :</b></label>
            <input type="email" id="mail" name="mail" placeholder="Veuillez entrer votre adresse e-mail" value="<?php if(isset($mail)) {echo $mail;} ?>">
            <label for="password"><b>Mot de passe :</b></label>
            <input type="password" name="password" class="password2" id="password" size="15" maxlength="100" onkeyup="return robustesse();" onkeyup="check()" placeholder="Veuillez entrer votre mot de passe"required>
            <span id="force"></span><br>
            <input type="checkbox" onclick="Afficher()" name="afficher">Afficher le mot de passe<br>
            <label for="confirmation"><b>Confirmation :</b></label>
            <input type="password" name="confirmation" id="confirmation" onkeyup="check()" placeholder="Veuillez confirmer votre mot de passe" required>
            <span id="message"></span><br>
            <input type="checkbox" onclick="AfficherConfirmation()" name="afficher">Afficher le mot de passe<br>
            <br>
            <input onclick="form_submit()" type="submit" class="btn" name="forminscription" value="Je m'inscris">
        </form>
        <?php
        if (isset($erreur))
        {
            echo '<span style="color: red; ">' . $erreur . '</span>';
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    function form_submit() {
        document.getElementById("search_form").submit();
    }
</script>