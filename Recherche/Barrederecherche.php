<meta charset="utf-8" />
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=primfx;charset=utf8','root','');

$nom = $bdd->query('SELECT nom FROM membres ORDER BY id DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
    $nom = $bdd->query('SELECT nom FROM nom WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');

}
?>
<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>
<?php if($nom->rowCount() > 0) { ?>
    <ul>
        <?php while($a = $nom->fetch()) { ?>
            <li><?= $a['nom'] ?></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>...
<?php } ?>

