<?php
$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";

$dic = array(
    "consonnes" => 0,
    "voyelles" => 0
);

$caracteres = str_replace(" ", "", strtolower($str));

for ($i = 0; $i < strlen($caracteres); $i++) {
    $caractere = $caracteres[$i];

    if (ctype_alpha($caractere)) {
        if (in_array($caractere, array('a', 'e', 'i', 'o', 'u', 'y'))) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}

echo "<table style='border-collapse: collapse;'>
        <thead>
            <tr style='border-bottom: 1px solid #000;'>
                <th style='border: 1px solid #000; padding: 10px;'>Voyelles</th>
                <th style='border: 1px solid #000; padding: 10px;'>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style='border: 1px solid #000; padding: 10px;'>" . $dic["voyelles"] . "</td>
                <td style='border: 1px solid #000; padding: 10px;'>" . $dic["consonnes"] . "</td>
            </tr>
        </tbody>
      </table>";
?>
