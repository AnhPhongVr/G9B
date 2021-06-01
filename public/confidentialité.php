<?php
session_start();

include ('/publicmodel/modelhomelink.php');
?>

<?php
// Model
require '/publicmodel/modelhomelink.php';
try
{
    $req = idverif();
    // View
    require 'publicview/viewconfidentialité.php';
}
catch(Exception $e)
{
    echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
}
?>