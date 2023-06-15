<?php
$serveur = 'localhost';
$utilisateur = 'root';
$motDePasse = 'Azerty01';
$nomBaseDeDonnees = 'jour08';

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8", $nomUtilisateur, $motDePasse);

    // Requête SQL pour récupérer les informations de la table étudiants
    $requete = "SELECT * FROM salles ORDER BY capacite DESC";
    $resultat = $bdd->query($requete);
// Affichage du résultat dans un tableau HTML
    echo "<table>";
    echo "<table border = '1'>"; // afficher les lignes du tableau
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom</th>";
    echo "<th>Id-etage</th>";
    echo "<th>capacite</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $ligne['id'] . "</td>";
        echo "<td>" . $ligne['nom'] . "</td>";
        echo "<td>" . $ligne['id_etage'] . "</td>";
        echo "<td>" . $ligne['capacite'] . "</td>";
        echo "</tr>";
    }
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