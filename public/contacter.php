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
                <input type="submit" name="send" class="btn" value="Envoyer" />
            </td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['message'])) {
    $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $retour = mail('blalba@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
        if($retour)
            echo '<p>Votre message a été envoyé.</p>';
        else
            echo '<p>Erreur.</p>';
    }
}
?>