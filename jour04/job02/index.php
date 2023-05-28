<!DOCTYPE html>
<html>
<head>
    <title>Tableau des arguments GET</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Prénom et nom prédéfinis
    $prenom = "Stephane";
    $nom = "Dupont";
    ?>

    <table>
        <tr>
            <th>Argument</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><?php echo $prenom; ?></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo $nom; ?></td>
        </tr>
    </table>
</body>
</html>
