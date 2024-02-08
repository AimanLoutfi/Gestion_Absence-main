<?php
 
include('../include/config.php'); 

  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    // Delete user from the database
    $deleteQuery = "DELETE FROM `upload` WHERE `id`='$id'";
    if ($conn->query($deleteQuery) === TRUE) {
        $message=2;
        header("Location: /Gestion_Absence-main/responsable_scolarite/ListFile.php?check=" . urlencode($message));
    }
  }
?>