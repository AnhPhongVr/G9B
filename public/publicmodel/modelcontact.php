<?php
if (isset($_POST['message'])) {
    $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $retour = mail('williamphong77@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
        if($retour)
            echo '<p style="color: white">Votre message a été envoyé.</p>';
        else
            echo '<p style="color: white">Erreur.</p>';
    }
}
?>
