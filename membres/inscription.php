<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 255)
        {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {
                        if ($mdp == $mdp2)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO membres(id, pseudo, mail, motdepasse) VALUES (NULL, :pseudo,:mail,:mdp)");
                            $insertmbr->execute(array('pseudo' => $pseudo, 'mail' => $mail, 'mdp' => $mdp));
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
                $erreur = "Vos addresses mail ne correspondent pas";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères";
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
        <form method="POST" action="../membres/inscription.php" class="form-container">
            <h1 class="titre">Inscription</h1>
            <label for="prénom"><b>Prénom :</b></label>
            <input type="text" id="prénom" name="prénom" placeholder="Veuillez entrer votre prénom" required >
            <label for="nom"><b>Nom :</b></label>
            <input type="text" name="nom" placeholder="Veuillez entrer votre nom" required>
            <label for="type"><b>Type d'utilisateur :</b></label>
            <select name="type" id="type" class="select">
                <option value="médecin">Médecin</option>
                <option value="patient">Patient</option>
                <option value="chirurgien">Chirurgien</option>
                <option value="autre">Autre</option>
            </select>
            <label for="adresse mail"><b>Adresse e-mail :</b></label>
            <input type="text" placeholder="Veuillez entrer votre adresse e-mail" required>
            <label for="texte"><b>Date de naissance :</b></label>
            <input type="date" class="date2"/>
            <label for="password"><b>Mot de passe :</b></label>
            <input type="password" name="password" class="password2" id="password" size="15" maxlength="100" onkeyup="return robustesse();" onkeyup="check()" placeholder="Veuillez entrer votre mot de passe"required>
            <span id="force"></span><br>
            <input type="checkbox" onclick="Afficher()" name="afficher">Afficher le mot de passe<br>
            <label for="confirmation"><b>Confirmation :</b></label>
            <input type="password" name="confirmation" id="confirmation" onkeyup="check()" placeholder="Veuillez confirmer votre mot de passe" required>
            <span id="message"></span><br>
            <input type="checkbox" onclick="AfficherConfirmation()" name="afficher">Afficher le mot de passe<br>
            <br>
            <button type="submit" class="btn">S'inscrire</button>
        </form>
        </form>
    </div>
</div>