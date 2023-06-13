<?php
session_start();

// Fonction de réinitialisation du jeu
function resetGame() {
    $_SESSION['grid'] = [
        ['-','-','-'],
        ['-','-','-'],
        ['-','-','-']
    ];
    $_SESSION['currentPlayer'] = 'X';
    $_SESSION['gameOver'] = false;
}

// Vérifier si une partie est déjà en cours
if (!isset($_SESSION['grid']) || !isset($_SESSION['currentPlayer']) || !isset($_SESSION['gameOver'])) {
    resetGame();
}

// Fonction pour vérifier si un joueur a gagné
function checkWin($player) {
    $grid = $_SESSION['grid'];

    // Vérification des lignes
    for ($row = 0; $row < 3; $row++) {
        if ($grid[$row][0] === $player && $grid[$row][1] === $player && $grid[$row][2] === $player) {
            return true;
        }
    }

    // Vérification des colonnes
    for ($col = 0; $col < 3; $col++) {
        if ($grid[0][$col] === $player && $grid[1][$col] === $player && $grid[2][$col] === $player) {
            return true;
        }
    }

    // Vérification des diagonales
    if ($grid[0][0] === $player && $grid[1][1] === $player && $grid[2][2] === $player) {
        return true;
    }
    if ($grid[0][2] === $player && $grid[1][1] === $player && $grid[2][0] === $player) {
        return true;
    }

    return false;
}

// Traitement du clic sur une cellule
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cell'])) {
    $cell = $_POST['cell'];
    $row = floor($cell / 3);
    $col = $cell % 3;

    // Vérifier si la cellule est vide et la partie n'est pas terminée
    if ($_SESSION['grid'][$row][$col] === '-' && !$_SESSION['gameOver']) {
        // Mettre à jour la cellule avec le symbole du joueur actuel
        $_SESSION['grid'][$row][$col] = $_SESSION['currentPlayer'];

        // Vérifier si le joueur actuel a gagné
        if (checkWin($_SESSION['currentPlayer'])) {
            $_SESSION['gameOver'] = true;
            $winner = $_SESSION['currentPlayer'];
        } else {
            // Vérifier si toutes les cellules ont été remplies
            $isGridFull = true;
            foreach ($_SESSION['grid'] as $row) {
                if (in_array('-', $row)) {
                    $isGridFull = false;
                    break;
                }
            }
            if ($isGridFull) {
                $_SESSION['gameOver'] = true;
                $winner = 'Match nul';
            } else {
                // Changer de joueur
                $_SESSION['currentPlayer'] = ($_SESSION['currentPlayer'] === 'X') ? 'O' : 'X';
            }
        }
    }
}

// Réinitialisation de la partie
if (isset($_POST['reset'])) {
    resetGame();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu du Morpion</title>
    <style>
table {
border-collapse: collapse;
margin-bottom: 20px;
}
td {
        width: 50px;
        height: 50px;
        text-align: center;
        border: 1px solid black;
    }
</style>
</head>
<body>
    <h1>Jeu du Morpion</h1>
    <table>
        <?php
        $grid = $_SESSION['grid'];
        for ($row = 0; $row < 3; $row++) {
            echo "<tr>";
            for ($col = 0; $col < 3; $col++) {
                echo "<td>";
                if ($grid[$row][$col] === '-') {
                    $cell = $row * 3 + $col;
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='cell' value='$cell'>";
                    echo "<button type='submit'>-</button>";
                    echo "</form>";
                } else {
                    echo $grid[$row][$col];
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    if ($_SESSION['gameOver']) {
        if (isset($winner)) {
            echo "<p>$winner a gagné !</p>";
        } else {
            echo "<p>Match nul</p>";
        }
        echo "<form method='POST'>";
        echo "<input type='hidden' name='reset' value='true'>";
        echo "<button type='submit'>Réinitialiser la partie</button>";
        echo "</form>";
    }
    ?>
</body>
</html>

