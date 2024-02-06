<?php
include('./include/config.php'); 

$id_user =  $_SESSION['id_user'];  
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRMEF</title>
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
        <a href="logout.php" class="btn" style="color: #fff;background-color: #f1672c;border-color: #f1ae87;">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
      <a href="RespoFilHome.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>Mes Modules</span></a >
      <a href="RespoFilProfile.php?id_user=<?php echo $id_user;?>"
      ><i class="fa fa-user" ></i><span>profil</span></a >
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <a href="RespoFilHome.php?id_user=<?php echo $id_user;?>"
          >   <i class="fas fa-desktop"></i><span>Mes Modules</span>
        </a>
        <a href="RespoFilProfile.php?id_user=<?php echo $id_user;?>"
          ><i class="fa fa-user"></i><span>profil</span></a >
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="container">
      <div class="row">
       <?php 
    $sql = "SELECT label,id_module FROM  module WHERE id_module in (SELECT id_module FROM module_manager WHERE id_user = '$id_user')";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)) {
     echo'
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-3">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    <h3 style="color: black;"> Module : </h3><h4>'.$row["label"].'</h4>
                    </div>
                    <div class="h5 my-2 font-weight-bold text-gray-800">
                      <button class="btn btn-warning">
                      <form method="GET" action="home.php">
                      <a href="home.php?id_module='.$row["id_module"].'&id_user='.$id_user.'&label='.$row["label"].'" style="text-decoration: none; color: white">
                          <h4>Entrer</h4>
                        </a>
                      </form>  
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ';
    }
    } 
else echo' <div class="alert alert-danger">vous avez pas des modules </div>';

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
