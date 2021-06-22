<?php
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


sendTrame(create_trame());
