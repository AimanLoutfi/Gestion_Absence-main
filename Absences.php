<?php
include('./include/config.php'); 

$idClass = $_GET['id_class'] ;
$id_module = $_GET['id_module'];  
@$id_user = $_GET['id_user'];  
@$label = $_GET['label'];  
$sql = "SELECT id_student, cne, first_name, last_name, class_name FROM student NATURAL JOIN student_class NATURAL JOIN class  WHERE id_class = '$idClass'; ";
$res = mysqli_query($conn,$sql);
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ESEFA</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      charset="utf-8"
    ></script>
  </head>
  <body>
    <input type="checkbox" id="check" />
    <!--header area start-->
    <header>
      <label for="check">
        <i
          class="fas fa-bars"
          id="sidebar_btn"
          style="position: absolute; top: 22px"
        ></i>
      </label>
      <div class="left_area">
        <img src="./img/download.jpg" alt="logo">
      </div>
      <div class="right_area">
        <a href="logout.php"
         class="btn" style="color: #fff;background-color: #f1672c;border-color: #f1ae87;">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
      <a href="home.php?id_module=<?php echo $id_module;?>&id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>Mes Classes</span></a
        >
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
    <a href="home.php?id_module=<?php echo $id_module;?>&id_user=<?php echo $id_user;?>"
        ><i class="fas fa-desktop"></i><span>Mes Classes</span>
        </a>
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="card1">
        <div id ="ClassName" class="alert alert-success" role="alert">
        <h3><?php  
        $class_name = $_GET['class_name'];
        @$msg = $_GET['msg'];
        echo 'Module : '.$label.' /  Class : '.$class_name.'</h3>'; echo'  </div>';
        if(!empty($msg))
        echo $msg;
        else
        echo '';
            echo'  
        </div>
        <div class="container">
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Num</th>
        <th scope="col">CNE</th>
        <th scope="col">Nom</th>
        <th scope="col">prenom</th>
        <th scope="col"></th>
        <th scope="col"></th> 
      </tr>
    </thead>
    ';
    if(mysqli_num_rows($res) > 0){
      $i= 1;
      while($rows = mysqli_fetch_assoc($res)){
  echo'
    <tbody>
        <tr>
          <th scope="row">'.$i.'</th>
          <td>'.$rows["cne"].'</td>
          <td>'.$rows["last_name"].'</td>
          <td>'.$rows["first_name"].'</td>
          <td><a name="absences" class="btnx btn-danger" href="AbsencesCheck.php?id_student='.$rows["id_student"].'&class_name='.$class_name.'&id_class='.$idClass.'&id_module='.$id_module.'" style="border-radius: 5px;text-decoration: none;padding: 7px;cursor: pointer;">Abs</a></td>
          <td><a onclick="return confirm(\' Vous avez sur que tu veut supprimer L absence\');" 
          name="modifier" class="btnx btn-success" href="AbsencesEdit.php?id_student='.$rows["id_student"].'&class_name='.$class_name.'&id_class='.$idClass.'&id_module='.$id_module.'" style="border-radius: 5px;text-decoration: none;padding: 7px;cursor: pointer;">Edi</a></td>
          </tr>
    </tbody>
    ';
        $i= $i + 1;
      }
       echo' </table>';
      }
      else{
        echo'<div class="alert alert-danger">les etudiant n\'exist pas dans se class </div>';
      }
    ?>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function () {
        $(".nav_btn").click(function () {
          $(".mobile_nav_items").toggleClass("active");
        });
      });
    </script>
  </body>
</html>
