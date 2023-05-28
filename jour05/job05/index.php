<!DOCTYPE html>
<html>
<head>
    <title>Formulaire avec styles</title>
    <link id="style-link" rel="stylesheet" type="text/css" href="">
</head>
<body>
    <h1>Formulaire avec styles</h1>
    <form id="style-form">
        <label for="style-select">Style :</label>
        <select id="style-select">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select>
        <br>
        <button type="submit">Valider</button>
    </form>

    <script>
        document.getElementById("style-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            var styleSelect = document.getElementById("style-select");
            var selectedStyle = styleSelect.value;

            var styleLink = document.getElementById("style-link");
            styleLink.href = selectedStyle + ".css";

            // Recharge les styles pour appliquer les changements
            styleLink.href = styleLink.href;

            // Facultatif : Affiche un message de confirmation
            alert("Style " + selectedStyle + " appliqué !");
        });
    </script>
</body>
</html>
