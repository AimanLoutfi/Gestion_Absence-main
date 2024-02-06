<?php
include('./include/config.php'); 

$id_student = $_GET['id_student'];
$class_name = $_GET['class_name'];
$id_class = $_GET['id_class'];
@$id_module = $_GET['id_module'];  
$sql = "INSERT INTO `absence`(`id_absence`, `id_student`, `id_module`) VALUES (NULL,'$id_student','$id_module')";
$res = mysqli_query($conn,$sql);
if($res){

    $msg = ' <script>alert("L\'absence est bien ajouter!!");</script>';
    header("location:".$_SERVER['HTTP_REFERER']."&msg=".$msg); 
}
else{
    $msg = ' <script>alert("error d\'ajouter!!");</script>';
    header("location:".$_SERVER['HTTP_REFERER']."&msg=".$msg); 
}




?>
