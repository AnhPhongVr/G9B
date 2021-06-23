<?php
session_start();
define( "SEND" , "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Bb&TRAME=" );

function create_trame() {
    $tra = "1";
    $obj = "G9Bb";
    $req = "1";
    $typ = "3";
    $num = "01";
    $ans = "0000";
    $short = $tra . $obj . $req . $typ . $num . $ans;
    $trame = $short . createChk($short);
    return $trame;
}

function createChk($short_trame){
    $resultDec = 0;
    for ($i = 0; $i < 17; $i++){
        $resultDec += ord(substr($short_trame,$i,1));
    }
    $resultHex = dechex($resultDec);
    $len = strlen($resultHex);
    $chk = substr($resultHex,$len-2,$len);
    return $chk;
}

function sendTrame($trame){
    $url = SEND . $trame;
    echo $url . "<br />";
    /* die(header('Location: ' . $url)); */
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
}

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre; charset=utf8', 'root', 'root');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="../../css/FaireTests.css" />
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <meta charset="utf-8">
        <link href="../../css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">

	</head>

<body>

    <div class="main">

<!-- barre de navigation transparente à gauche -->
        <div class="menu">
            <a href="<?php echo "menu.php?id=" .$_SESSION['id'];?>">Menu</a>
            <a href="<?php echo "profil.php?id=" .$_SESSION['id'];?>">Mon profil</a>
            <a href="<?php echo "données.php?id=" .$_SESSION['id'];?>">Mes données</a>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <a href="<?php echo "test.php?id=" .$_SESSION['id'];?>">Faire un test</a>
                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
                {
                    ?>
                    <a href="../deconnexion.php">Se déconnecter</a>
                    <?php
                }
                ?>
        </div>

<!-- partie de droite -->
        <div class="encadre">
            <div class = "phrase"> Sélectionnez le(s) test(s) que vous voulez réaliser :</div>

                <table class="table-test">
             
                    <tr>
                        <td>
                            <ion-icon name="pulse" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="frequence" value="frequence" /> Mesurer ma fréquence cardiaque 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <ion-icon name="thermometer" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="temperature" value="temperature" /> Mesurer la température superficielle de ma peau
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ion-icon name="musical-notes" class="icon"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="oreille" value="oreille" class="checkbox"/> Mesurer mes troubles auditifs
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ion-icon name="eye" class="icon2"></ion-icon>
                            <ion-icon name="ear" class="icon2"></ion-icon>
                        </td>
                        <td>
                            <input class="checkbox" type="checkbox" name="frequence" value="frequence" /> Mesurer mes réflexes (visuels et sonore)
                        </td>
                    </tr> 
                </table>
                <button class="btn-test" onclick="<?php echo sendTrame(create_trame());?>"> Commencer le Test </button>
                <button class="btn-test" onclick="refreshPage()">Refresh</button>
            </div>
        </div>


</div>
</body>
<script>
function refreshPage(){
    window.location.reload();
}
</script>
</html>
<?php
}
else
{
    header("Location : ../../public/index.php");
}
?>
