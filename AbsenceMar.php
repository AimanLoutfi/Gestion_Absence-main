<?php
include('./include/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['absent'])) {
    $id_user = $_POST['absent'];

    // Vérifier si l'id_user existe déjà dans la table absence
    $checkQuery = "SELECT * FROM absence WHERE id_user = '$id_user'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // L'id_user existe déjà dans la table absence, renvoyer un message
        echo "L'absence a déjà été marquée pour cet utilisateur.";
    } else {
        // L'id_user n'existe pas, procéder à l'insertion
        $insertQuery = "INSERT INTO absence (id_user) VALUES ('$id_user')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "Absence marquée avec succès";
        } else {
            echo "Erreur lors de l'insertion de l'absence : " . mysqli_error($conn);
        }
    }
} else {
    echo "Méthode non autorisée ou absence de données post.";
}
?>
