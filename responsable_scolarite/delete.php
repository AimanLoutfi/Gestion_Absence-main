<?php
 
include('../include/config.php'); 

  if(isset($_GET['user_id']))
  {
    $user_id = $_GET['user_id'];
    // Delete user from the database
    $deleteQuery = "DELETE FROM `user` WHERE `id_user`='$user_id'";
    if ($conn->query($deleteQuery) === TRUE) {
        $message=2;
        header("Location: /Gestion_Absence-main/responsable_scolarite/liste.php?check=" . urlencode($message));
    }
  }
?>