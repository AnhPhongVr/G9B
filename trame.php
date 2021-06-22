<?php
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9Bb");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
echo"<table>";
for($i=0, $size=count($data_tab); $i<$size; $i++){
    $trame = $data_tab[$i];
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    echo "
            <tr>
                <td style='border: solid black; border-collapse: collapse;'>
                    Trame $i:
                </td>
                <td>
                    $t
                </td>
                <td>
                    $o
                </td>
                <td>
                    $r
                </td>
                <td>
                    $c
                </td>
                <td>
                    $n
                </td>
                <td>
                    $v
                </td>
                <td>    
                    $a
                </td>
                <td>
                    $x
                </td>
                <td>
                    $year
                </td>
                <td>
                    $month
                </td>
                <td>
                    $day
                </td>
                <td>
                    $hour
                </td>
                <td>
                    $min
                </td>
                <td>
                    $sec
                </td>
            </tr>
        ";
}
echo "</table>";
?>
