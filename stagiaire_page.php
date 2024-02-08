<?php
include('./include/config.php');

@$id_user = $_GET['id_user'];

$sql = "SELECT * FROM stagiaire";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Stagiaire</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"
    />
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            charset="utf-8"
    ></script>

    <!-- Ajoutez cette balise <style> pour masquer les deux listes initialement -->
    <style>
        .stagiaires-container,
        .edt-container {
            display: none;
        }
    </style>
</head>
<body>

<input type="checkbox" id="check"/>
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
        <img src="./img/log.jpg" alt="logo">
    </div>
    <div class="right_area">
        <a href="logout.php"
           class="btn"
           style="color: #fff;background-color: #f1672c;border-color: #f1ae87;">Logout</a>
    </div>
</header>
<!--header area end-->

<!--mobile navigation bar start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a href="javascript:void(0);" onclick="togglehome()">
            <i class="fas fa-home"></i><span>Accueil</span>
        </a>
        
        <a href="javascript:void(0);" onclick="toggleEDT()">
            <i class="fas fa-laptop"></i><span>Emploi du Temps (EDT)</span>
        </a>
       
    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <a href="javascript:void(0);" onclick="togglehome()">
        <i class="fas fa-home"></i><span>Accueil</span>
        </a>
   
    <a href="javascript:void(0);" onclick="toggleEDT()">
        <i class="fas fa-clock"></i><span>Emploi du Temps (EDT)</span>
    </a>
    
</div>
<!--sidebar end-->
<!--mobile navigation bar start-->
<div class="content">
            <div class="col-md-12">
                <div class="card bg-transparent border-0 bvn-container">
                    <div class="card-header">
                        <h4 style="color: #F87119;">Accueil</h4>
                    </div>
                    <div class="card bnv-container" style="background-image: url('./img/happy.jpeg'); background-size: cover; background-position: center; height: 600px;">
                        <div class="card bg-transparent border-0 bvn-container" class="card-body">
                            <div style="text-align: center; color: #fff; padding-top: 50px;">
                                <h2>Bienvenue dans votre espace stagiaire</h2>
                                <p><?php echo date('Y-m-d'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
                <!-- Ajoutez le conteneur pour l'EDT -->
                <div class="card bg-transparent border-0 edt-container card edt-container">
                    <div class="card-header">
                        <h4 style=" color: #F87119;">Emploi du Temps</h4>
                    </div>
                    <div class="card-body">
                        <!-- Utilisez l'élément img pour afficher l'image -->
                        <!--img src="./img/edtS2.jpg" alt="Emploi du Temps" style="width: 100%; height: auto;"-->
                        <embed src="./img/EDT_2024_S2.pdf" width="100%" height="550px"/>
                    </div>
                    
                </div>
            </div>
                

            
</div>
<!--content end-->

<script type="text/javascript">
    $(document).ready(function () {
        $(".nav_btn").click(function () {
            $(".mobile_nav_items").toggleClass("active");
        });

        // Afficher le message de bienvenue par défaut
        showWelcomeContainer();
    });

    /// Fonction pour afficher/masquer le conteneur de l'bvn
  function togglehome() {
        $(".bvn-container").show();
        $(".edt-container").hide();
        
    }
    // Fonction pour afficher/masquer le conteneur de l'EDT
    function toggleEDT() {
        $(".edt-container").toggle();
       
        // Masquer le conteneur bvn-container
        $(".bvn-container").hide();
    }

  
</script>
</body>
</html>
