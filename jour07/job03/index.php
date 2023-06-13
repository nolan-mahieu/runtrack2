<?php
session_start();

// Vérifie si la variable de session "prenoms" n'existe pas ou si le bouton de réinitialisation a été soumis
if (!isset($_SESSION['prenoms']) || isset($_POST['reset'])) {
    $_SESSION['prenoms'] = array();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];

        // Ajoute le prénom à la liste des prénoms
        array_push($_SESSION['prenoms'], $prenom);
    }

    // Redirige vers la même page pour éviter de renvoyer les données du formulaire lors du rechargement
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de prénoms</title>
</head>
<body>
    <h1>Ajouter un prénom</h1>

    <!-- Formulaire -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="prenom" placeholder="Prénom" required>
        <button type="submit">Ajouter</button>
    </form>

    <h1>Liste des prénoms</h1>

    <!-- Affichage des prénoms -->
    <?php if (!empty($_SESSION['prenoms'])) : ?>
        <?php foreach ($_SESSION['prenoms'] as $prenom) : ?>
            <p><?php echo $prenom; ?></p>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun prénom ajouté.</p>
    <?php endif; ?>

    <!-- Bouton de réinitialisation -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>

</body>
</html>
