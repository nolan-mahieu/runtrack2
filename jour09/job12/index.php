<?php
$serveur = 'localhost';
$utilisateur = 'root';
$motDePasse = 'Azerty01';
$nomBaseDeDonnees = 'jour08';

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8", $nomUtilisateur, $motDePasse);

    // Requête SQL pour récupérer les informations de la table étudiants
    $requete = "SELECT prenom, nom, naissance FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'";
    $resultat = $bdd->query($requete);

// Affichage du résultat dans un tableau HTML
    echo "<table>";
    echo "<table border = '1'>"; // afficher les lignes du tableau
    echo "<thead>";
    echo "<tr>";
    echo "<th>Prénom</th>";
    echo "<th>Nom</th>";
    echo "<th>Naissance</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $ligne['prenom'] . "</td>";
        echo "<td>" . $ligne['nom'] . "</td>";
        echo "<td>" . $ligne['naissance'] . "</td>";
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