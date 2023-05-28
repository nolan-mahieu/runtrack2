<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET - Nombre pair ou impair</title>
</head>
<body>
    <form method="get" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <input type="submit" value="Valider">
    </form>

    <?php
    // Vérifie si des données ont été envoyées via la méthode GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Vérifie si l'argument GET 'nombre' est défini
        if (isset($_GET['nombre'])) {
            // Récupère la valeur de 'nombre'
            $nombre = $_GET['nombre'];

            // Vérifie si c'est un nombre pair ou impair
            if ($nombre % 2 === 0) {
                echo "Nombre pair";
            } else {
                echo "Nombre impair";
            }
        }
    }
    ?>
</body>
</html>
