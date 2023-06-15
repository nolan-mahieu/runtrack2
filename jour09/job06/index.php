<?php
$serveur = 'localhost';
$utilisateur = 'root';
$motDePasse = 'Azerty01';
$nomBaseDeDonnees = 'jour08';


try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8", $nomUtilisateur, $motDePasse);

    // Requête SQL pour récupérer le nombre total d'étudiants
    $requete = "SELECT COUNT(*) AS nb_etudiants FROM etudiants";
    $resultat = $bdd->query($requete);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nbEtudiants = $ligne['nb_etudiants'];

    // Affichage du résultat dans un tableau HTML
    echo "<table>";
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nombre d'étudiants</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $nbEtudiants . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

    // Fermeture de la connexion à la base de données
    $resultat->closeCursor();
    $bdd = null;
} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>