<?php
// Fonction de déconnexion
function logout() {
    // Supprimer le cookie en le mettant à une date d'expiration passée
    setcookie('prenom', '', time() - 3600, '/');
    header('Location: index.php');
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le prénom a été envoyé
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
        // Ajouter le prénom dans un cookie
        setcookie('prenom', $prenom, time() + (86400 * 30), "/"); // Expire dans 30 jours
        header('Location: index.php');
        exit();
    } elseif (isset($_POST['logout'])) {
        // Si le formulaire de déconnexion a été soumis
        logout();
    }
}

// Vérifier si l'utilisateur est déjà connecté
if (isset($_COOKIE['prenom'])) {
    $prenom = $_COOKIE['prenom'];
    echo "<h1>Bonjour $prenom !</h1>";
    echo "<form method='POST' action='index.php'>";
    echo "<input type='hidden' name='logout' value='true'>";
    echo "<button type='submit'>Déconnexion</button>";
    echo "</form>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
</head>
<body>
    <h1>Formulaire de connexion</h1>
    <form method="POST" action="index.php">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>

