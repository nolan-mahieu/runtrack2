<?php
function calcule($nombre1, $operateur, $nombre2) {
    $resultat = 0;
    
    switch ($operateur) {
        case '+':
            $resultat = $nombre1 + $nombre2;
            break;
        case '-':
            $resultat = $nombre1 - $nombre2;
            break;
        case '*':
            $resultat = $nombre1 * $nombre2;
            break;
        case '/':
            if ($nombre2 != 0) {
                $resultat = $nombre1 / $nombre2;
            } else {
                $resultat = "Division par zéro impossible";
            }
            break;
        case '%':
            $resultat = $nombre1 % $nombre2;
            break;
        default:
            $resultat = "Opérateur invalide";
            break;
    }
    
    return $resultat;
}

$nombre1 = 5;
$operateur = '+';
$nombre2 = 3;

$resultat = calcule($nombre1, $operateur, $nombre2);
echo "Le résultat est : " . $resultat;
?>
