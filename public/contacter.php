<!--Bandeau avec la partie "nous contacter"-->
<div id="contact" class="pied">
    <span class="contact">Vous souhaitez nous contacter?</span><br>
    <br>
    <button class="appeler"><b>Nous appeler</b></button>
    <button id="popmail" class="mail"><b>Envoyer un e-mail</b></button>
</div>

<!--popup pour l'envoi de mail-->
<div id="popupMail" class="modal">
    <div class="modal-content">
        <span class="fermer">&times;</span>
        <form method="POST" class="contenuMail">
            <h1 class="titre">Envoyer un e-mail</h1>
            <input class="email" type="email" name="email" placeholder="E-mail"><br>
            <input class="objet" type="text" name="objet" placeholder="Objet"><br>
            <textarea cols="139" rows="15" name="message" placeholder="Écrivez votre message"></textarea><br>
            <br>
            <button type="submit" class="btn">Envoyer</button>
        </form>
        <?php
        if (isset($_POST['message'])) {
            $position_arobase = strpos($_POST['email'], '@');
            if ($position_arobase === false)
                echo '<p>Votre email doit comporter un arobase.</p>';
            else {
                $retour = mail('williamphong77@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
                if($retour)
                    echo '<p>Votre message a été envoyé.</p>';
                else
                    echo '<p>Erreur.</p>';
            }
        }
        ?>
    </div>
</div>