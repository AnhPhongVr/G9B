<meta charset="utf-8" />
<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root','root');

$membre = $bdd->query('SELECT nom FROM membre ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);

    $membre = $bdd->query('SELECT nom FROM membre WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');
    if($membre->rowCount() == 0) {
        $membre = $bdd->query('SELECT nom FROM membre WHERE CONCAT(nom, prenom, mail) LIKE "%'.$q.'%" ORDER BY id DESC');
    }
}
?>
<form method="GET">
    <input type="search" name="q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>
<?php if($membre->rowCount() > 0) { ?>
    <ul>
        <?php while($a = $membre->fetch()) { ?>
            <li><?= $a['titre'] ?></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>...
<?php } ?>