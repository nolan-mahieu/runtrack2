<?php
if (isset($_GET)) {
    $count = count($_GET);
    echo "Le nombre d'arguments GET envoyé est : $count";
} else {
    echo "Aucun argument GET n'a été envoyé.";
}
?>
