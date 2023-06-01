<?php
// Vérifie si le cookie "nbvisites" existe
if(isset($_COOKIE['nbvisites'])){
    // Incrémenter le nombre de visites
    $nbVisites = $_COOKIE['nbvisites'] + 1;
} else {
    // Si le cookie n'existe pas, initialiser le compteur à 1
    $nbVisites = 1;
}

// Définir le cookie pour stocker le nombre de visites
setcookie('nbvisites', $nbVisites, time() + (86400 * 30), '/'); // Cookie valide pendant 30 jours

// Affichier le nombre de visites
echo "Nombre de visites : " . $nbVisites;

// Vérifier si le bouton "reset a été cliqué
if(isset($_POST['reset'])){
    /// Réinitialiser le compteur en supprimant le cookie
    setcookie('nbvisites', '', time() - 3600, '/');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compteur de visites</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>