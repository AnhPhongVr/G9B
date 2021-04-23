<!--Bandeau avec la partie "nous contacter"-->
<div class="pied">
    <span class="contact">Vous souhaitez nous contacter?</span><br>
    <br>
    <button class="appeler"><b>Nous appeler</b></button>
    <button id="popmail" class="mail"><b>Envoyer un e-mail</b></button>
</div>

<!--popup pour l'envoi de mail-->
<div id="popupMail" class="modal">
    <div class="modal-content">
        <span class="fermer">&times;</span>
        <form class="contenuMail">
            <h1 class="titre">Envoyer un e-mail</h1>
            <input class="email" type="email" class="email" placeholder="E-mail"><br>
            <input class="objet" type="text" name="objet" placeholder="Objet"><br>
            <textarea cols="139" rows="15" placeholder="Écrivez votre message"></textarea><br>
            <br>
            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>
</div>