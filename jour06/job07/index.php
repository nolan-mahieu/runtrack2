<!DOCTYPE html>
<html>
<head>
    <title>Transformations de texte</title>
</head>
<body>
    <form method="POST" action="">
        <label for="str">Texte :</label>
        <input type="text" name="str" id="str" required><br><br>
        
        <label for="fonction">Fonction :</label>
        <select name="fonction" id="fonction" required>
            <option value="gras">Gras</option>
            <option value="cesar">Cesar</option>
            <option value="plateforme">Plateforme</option>
        </select><br><br>
        
        <input type="submit" value="Valider">
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if (isset($_POST['str']) && isset($_POST['fonction'])) {
        $str = $_POST['str'];
        $fonction = $_POST['fonction'];

        // Appliquer la transformation en fonction de l'option choisie
        if ($fonction === 'gras') {
            echo '<p>' . transformToBold($str) . '</p>';
        } elseif ($fonction === 'cesar') {
            echo '<p>' . cesarCipher($str) . '</p>';
        } elseif ($fonction === 'plateforme') {
            echo '<p>' . addUnderscore($str) . '</p>';
        }
    }

    // Fonction pour mettre en gras les mots commençant par une lettre majuscule
    function transformToBold($str) {
        $words = explode(' ', $str);
        $result = '';

        foreach ($words as $word) {
            if (ctype_upper(substr($word, 0, 1))) {
                $result .= '<b>' . $word . '</b> ';
            } else {
                $result .= $word . ' ';
            }
        }

        return trim($result);
    }

    // Fonction pour effectuer le chiffrement César
    function cesarCipher($str, $shift = 2) {
        $result = '';

        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            if (ctype_alpha($char)) {
                $ascii = ord($char);
                $asciiShifted = ($ascii - ord('a') + $shift) % 26 + ord('a');
                $result .= chr($asciiShifted);
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    // Fonction pour ajouter un "_" aux mots finissant par "me"
    function addUnderscore($str) {
        $words = explode(' ', $str);
        $result = '';

        foreach ($words as $word) {
            if (substr($word, -2) === 'me') {
                $result .= $word . '_ ';
            } else {
                $result .= $word . ' ';
            }
        }

        return trim($result);
    }
    ?>
</body>
</html>
