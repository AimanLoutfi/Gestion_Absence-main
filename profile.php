<?php 
include('./include/config.php'); 

@$id_user = $_GET['id_user'];  
   $select = "SELECT * FROM user WHERE id_user ='$id_user'";
   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_assoc($result);
  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRMEF</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/profile.css" />
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
      <a href="home1.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>Mes Modules</span></a >
        <a href="profile.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>profil</span></a
        >
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
    <a href="home1.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>Mes Modules</span></a >
        <a href="profile.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-desktop"></i><span>profil</span></a
        >
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="./img/profile.jpg"></span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Mon Profil</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form method="POST">
                                <label class="labels">Le nom complet :</label>
                                <input class="form-control" type="text" name="user"
                                    value="<?php echo $row['user'];?>" required readonly>
                                <br>
                                <label class="labels">Email : </label>
                                <input class="form-control" type="email" name="email"
                                    value="<?php echo $row['email'];?>"  readonly>
                                
                                <label class="labels">CIN : </label>
                                <input class="form-control" type="text" name="phone" placeholder="Not set"
                                    value="<?php echo $row['cin'];?>" readonly>
                                <br>
                                <div class="mt-5 text-center">
                                    <script>
                                    function timedRefresh(timeoutPeriod) {
                                        setTimeout("location.reload(true);", timeoutPeriod);
                                    }
                                    </script>
                                      </div>
                            </form>
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

