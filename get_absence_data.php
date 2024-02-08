<?php
include('./include/config.php');

// Requête pour récupérer les données d'absence
$sql = "SELECT * FROM absence";
$result = mysqli_query($conn, $sql);

// Tableau pour stocker les données d'absence
$absence_data = array();

// Vérifier si la requête a réussi
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Ajouter les données d'absence au tableau
        $absence_data[] = $row;
    }
}

// Renvoyer les données d'absence au format JSON
echo json_encode($absence_data);
?>
