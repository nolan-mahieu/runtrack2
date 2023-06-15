<?php
$serveur = 'localhost';
$utilisateur = 'root';
$motDePasse = 'Azerty01';
$nomBaseDeDonnees = 'jour08';


try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8", $nomUtilisateur, $motDePasse);

    // Requête SQL pour récupérer les informations de la table étudiants
    $requete = "SELECT salles.nom AS nom_salle, etage.nom AS nom_etage FROM salles JOIN etage ON salles.id_etage = etage.id";

    $resultat = $bdd->query($requete);

// Affichage du résultat dans un tableau HTML
    echo "<table>";
    echo "<table border = '1'>"; // afficher les lignes du tableau
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nom salles</th>";
    echo "<th>Nom étages</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $ligne['nom_salle'] . "</td>";
        echo "<td>" . $ligne['nom_etage'] . "</td>";
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