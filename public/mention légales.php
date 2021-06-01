<?php
session_start();

include ('/publicmodel/modelhomelink.php');
?>

<?php
// Model
require '/publicmodel/modelhomelink.php';
try
{
    $userinfo = idverif();
    // View
    require 'publicview/viewmention.php';
}
catch(Exception $e)
{
    echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
}
?>