<?php
function bonjour($jour) {
    if ($jour) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}

$jour = true; // true pour Bonjour, false pour Bonsoir
bonjour($jour); // Appel de la fonction en passant le paramètre
?>