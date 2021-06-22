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
    $val = implode(ascii_to_dec($v));
    echo "
            <tr>
                <td style='border: solid black; border-collapse: collapse;'>
                    Trame $i:
                </td>
                <td>
                tra: 
                    $t |
                </td>
                <td>
                grp: 
                    $o |
                </td>
                <td>
                req: 
                    $r |
                </td>
                <td>
                typ: 
                    $c |
                </td>
                <td>
                num: 
                    $n |
                </td>
                <td>
                val: 
                    $val |
                </td>
                <td>
                timestamp:     
                    $a |
                </td>
                <td>
                checksum: 
                    $x |
                </td>
                <td>year: 
                    $year |
                </td>
                <td>month: 
                    $month |
                </td> 
                <td>day: 
                    $day |
                </td>
                <td>h: 
                    $hour |
                </td>
                <td>min: 
                    $min |
                </td>
                <td>
                    sec: 
                    $sec |
                </td>
            </tr>
        ";
}
echo "</table>";

function ascii_to_dec($str)
{
    for ($i=0, $j = strlen($str); $i < $j; $i++){
        $dec_array[] = ord($str{$i});
    }
    return $dec_array;
}
?>
