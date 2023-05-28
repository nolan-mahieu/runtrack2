<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Vérifie si des données ont été envoyées via la méthode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les arguments $_POST sont définis
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // Récupère les valeurs des arguments $_POST
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Vérifie les informations de connexion
            if ($username === 'John' && $password === 'Rambo') {
                echo "C'est pas ma guerre";
            } else {
                echo "Votre pire cauchemar";
            }
        }
    }
    ?>
</body>
</html>
