<?php
session_start();

// Vérifie si la variable de session existe et l'incrémente
if(isset($_SESSION['nbvisites'])) {
    $_SESSION['nbvisites']++;
} else {
    //Si la variable de session n'existe pas, on l'initialise à 1
    $_SESSION['nbvisites'] = 1;
}

// Affiche le contenu de la variable de session
echo "Nombre de visites : " . $_SESSION['nbvisites'];

// Vérifie si le bouton reset a été cliqué
if(isset($_POST['reset'])) {
    //Réinitialise la cariable de session à 0
    $_SESSION['nbvisites'] = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur de visites</title>
</head>
<body>
    <!-- Affiche le bouton reset -->
    <form method="post">
        <input type="submit" name="reset" value="Reset">
    </form>
</body>
</html>