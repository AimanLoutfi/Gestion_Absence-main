<?php
include('./include/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_absence = $_POST['id_absence'];

    // Utilisez des requêtes préparées pour éviter les injections SQL
    $sql = "DELETE FROM absence WHERE id_absence = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Liaison des paramètres
    mysqli_stmt_bind_param($stmt, "i", $id_absence);

    // Exécution de la requête
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "L'absence a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'absence : " . mysqli_error($conn);
    }

    // Fermez la déclaration préparée
    mysqli_stmt_close($stmt);
} else {
    echo "Méthode non autorisée.";
}
?>
