<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
    if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
        $confirme = (int) $_GET['confirme'];
        $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
        $req->execute(array($confirme));
    }
    if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $req->execute(array($supprime));
    }
}
$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administration</title>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/admin.css" rel="stylesheet">
</head>
<body>
<ul>
    <?php while($m = $membres->fetch()) { ?>
        <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - <a href="../../../APP/G9B/public/index.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="../../../APP/G9B/public/index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
    <?php } ?>
</ul>
</body>
</html>
