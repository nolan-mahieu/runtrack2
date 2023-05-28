<!DOCTYPE html>
<html>
<head>
    <title>Formulaire POST</title>
</head>
<body>
    <form method="post" action="">
        <label for="field1">Champ 1:</label>
        <input type="text" id="field1" name="field1" required><br>

        <label for="field2">Champ 2:</label>
        <input type="text" id="field2" name="field2" required><br>

        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifie si des données ont été envoyées via la méthode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Compte le nombre d'arguments $_POST
        $nombreArguments = count($_POST);

        // Affiche le nombre d'arguments POST envoyés
        echo "Le nombre d'arguments POST envoyé est : " . $nombreArguments;
    }
    ?>
</body>
</html>
