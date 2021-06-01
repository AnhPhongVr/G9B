<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');


if(isset($_GET['id']) AND $_GET['id'] > 0)
    {
    if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];
        $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $req->execute(array($supprime));
    }
    $membres = $bdd->query("SELECT * FROM membres ORDER BY id DESC LIMIT 0,5");

    if(isset($_POST['search']) AND !empty($_POST['search'])){
        $q = htmlspecialchars($_POST['search']);
        $membres = $bdd->query('SELECT * FROM membres WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');
        if($membres->rowCount() == 0) {
            $membres = $bdd->query('SELECT * FROM membres WHERE CONCAT(nom, prenom, mail) LIKE "%'.$q.'%" ORDER BY id DESC');
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <title>G9Bwebpage</title>
</head>
<body>
<a  class="accueil" href="<?php echo "admin.php?id=" .$_SESSION['id'];?>">
    <ion-icon name="home" style="color:white; width:50px; height:50px;"></ion-icon>
</a>
    <div id="titre" class="data-box" align="center">
        <form method="POST" action="" class="form-container">
            <table align = center>
                <tr>
                    <td>
                        <h1 align="center" style="color: white;">Gestion des utilisateurs</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" class="form-container">
                            <input type="search" name="search" placeholder="Recherche..."/>
                            <input type="submit" value="valider"/>
                        </form>
                    </td>
                    <td>
                        <a href="<?php echo "inscription.php?id=" .$_SESSION['id']; ?>">Inscrire un utilisateur</a>
                    </td>
                </tr>
                <?php if($membres->rowCount() > 0){
                while($m = $membres->fetch()){ ?>
                <tr>
                    <td>
                        <table class="user-box">
                            <td>
                                <td>nom:<br/><?= $m['nom'] ?></td>
                                <td>prénom:<br/> <?= $m['prenom'] ?></td>
                                <td>mail:<br/> <?= $m['mail'] ?></td>
                                <td>type:<br/> <?= $m['usertype'] ?></td>
                            </tr>
                        </table>
                    </td>
                    <td><a href="gestionuser.php?supprime=<?= $m['id'] ?>&id=<?= $_SESSION['id'] ?>" style="color: red">Supprimer</a></td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td>
                        Aucun résultat pour <?= $q ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php } ?>