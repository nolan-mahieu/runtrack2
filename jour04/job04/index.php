<!DOCTYPE html>
<html>
<head>
    <title>Tableau des arguments POST</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <input type="submit" value="Envoyer">
    </form>

    <?php
    // Vérifie si des données ont été envoyées via la méthode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les arguments $_POST sont définis
        if (isset($_POST['prenom']) && isset($_POST['nom'])) {
            // Récupère les valeurs des arguments $_POST
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];

            // Échappe les caractères spéciaux pour éviter les problèmes de sécurité
            $prenom = htmlspecialchars($prenom);
            $nom = htmlspecialchars($nom);

            // Affiche le tableau HTML
            echo '<table>';
            echo '<tr><th>Argument</th><th>Valeur</th></tr>';
            echo '<tr><td>Prénom</td><td>' . $prenom . '</td></tr>';
            echo '<tr><td>Nom</td><td>' . $nom . '</td></tr>';
            echo '</table>';
        }
    }
    ?>
</body>
</html>
