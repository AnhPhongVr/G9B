<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<html>
<head>
    <title>espace membre</title>
    <meta charset="utf-8">
</head>
<body>
<div align="center">
    <h2>Profil de <?php echo $userinfo['prenom'];?> <?php echo $userinfo['nom']; ?></h2>
    <br /><br />
    <p> Prénom = <?php echo $userinfo['prenom']; ?> </p>
    <p> Nom = <?php echo $userinfo['nom']; ?> </p>
    <p> Type = <?php echo $userinfo['usertype']; ?> </p>
    <p> Date de Naissance = <?php if($userinfo['datedenaissance'] == NULL){echo 'nothing';} else{echo $userinfo['datedenaissance'];} ?> </p>
    <p> Mail = <?php echo $userinfo['mail']; ?> </p>
    <?php
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <a href="editionprofil.php">Editer mon profil</a>
        <a href="../deconnexion.php">Se déconnecter</a>
        <?php
    }
    ?>
</div>
</body>
</html>
<?php
}
?>