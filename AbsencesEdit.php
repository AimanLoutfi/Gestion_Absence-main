<?php
include('./include/config.php'); 

$id_student = $_GET['id_student'];
$class_name = $_GET['class_name'];
$id_class = $_GET['id_class'];
$sql = "DELETE FROM `absence` WHERE `id_absence` = (SELECT `id_absence` FROM `absence` ORDER BY `id_absence` DESC LIMIT 1)";
$res = mysqli_query($conn,$sql);
if($res){
    $msg = ' <script>alert("L\'absences est bien supprimer !");</script>';
    header("location:".$_SERVER['HTTP_REFERER']."&msg=".$msg); 
}
else{
    $msg = '<script>alert("error d\'effacer l\'absences !!");</script>';
    header("location:".$_SERVER['HTTP_REFERER']."&msg=".$msg); 
}


?>