<?php
include('./include/config.php');

@$id_user = $_GET['id_user'];

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CRMEF</title>
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
    <img src="./img/download.jpg" alt="logo">
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
        <a href="javascript:void(0);" onclick="toggleStagiaires()">
            <i class="fas fa-desktop"></i><span>Liste des Stagiaires</span>
        </a>
        <a href="javascript:void(0);" onclick="toggleEDT()">
            <i class="fas fa-laptop"></i><span>Emploi du Temps (EDT)</span>
        </a>
        <a href="AbsenceMar.php?id_abs=<?php echo $id_abs; ?>&id_user=<?php echo $id_user; ?>">
            <i class="fas fa-desktop"></i><span>Marquer l'Absence</span>
        </a>
        <a href="RapportGen.php?id_rap=<?php echo $id_rap; ?>&id_user=<?php echo $id_user; ?>">
            <i class="fas fa-desktop"></i><span>Rapport Hebdomadaires </span>
        </a>
    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
        <a href="RespoFilHome.php?id_user=<?php echo $id_user;?>"
          >   <i class="fas fa-desktop"></i><span>Dashboard</span>
        </a>
        <a href="RespoEDT.php?id_user=<?php echo $id_user;?>"
        >  <i class="fas fa-clock"></i><span>Emploi du Temps (EDT)</span>
        </a>
        <a href="RespoFilProfile.php?id_user=<?php echo $id_user;?>"
          ><i class="fa fa-user"></i><span>Mon Profil</span></a >
          <a href="RespoAbse.php?id_user=<?php echo $id_user;?>"
          ><i class="fas fa-calendar-times"></i><span>Marquer l'Absence</span></a >
    </div>
<!--sidebar end-->
<!--content start-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bvn-container">
                    <div class="card-header">
                        <h4 style="color: #F87119;">Emploi du Temps</h4>
                    </div>
                    <div class="card bnv-container">
                    <div class="card-body">
    <div class="edt-image-container">
        <!-- Utilisez l'élément img pour afficher l'image -->
        <img src="./img/EDT.png" alt="Emploi du Temps" class="edt-image">
    </div>
</div>

                    </div>
                </div>
                <div class="card stagiaires-container">
                  
                    <div class="card-body">
                    <div class="content">
                    <h4 style="color: #F87119;">Liste des Stagiaires</h4>
                            <div class="card1">
                                <div id="ClassName" class="alert alert-success" role="alert">
                                <h3>
                                    <?php  

                                    echo '
                                </div>
                                <div class="container">
                                    <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Num</th>
                                        <th scope="col">Nom Prénom</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">CIN</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th> 
                                        </tr>
                                    </thead>';

                                $sql = "SELECT * FROM user WHERE type = 'stagiaire'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tbody>
                                        <tr>
                                        <th scope="row">' . $i . '</th>
                                        <td>' . $rows["id_user"] . '</td>
                                        <td>' . $rows["user"] . '</td>
                                        <td>' . $rows["cin"] . '</td>
                                        
                                        </tr>
                                    </tbody>';
                                    $i = $i + 1;
                                }
                                echo '</table>';
                                } else {
                                echo '<div class="alert alert-danger">Aucun utilisateur trouvé.</div>';
                                }
                                ?>
                            </div>
                            </div>

                </div>
                <!-- Ajoutez le conteneur pour l'EDT -->
                <div class="card edt-container">
                    <div class="card-header">
                        <h4 style=" color: #F87119;">Emploi du Temps</h4>
                    </div>
                    <div class="card-body">
                        <!-- Utilisez l'élément img pour afficher l'image -->
                        <!--img src="./img/edtS2.jpg" alt="Emploi du Temps" style="width: 100%; height: auto;"-->
                        <embed src="./img/EDT.png" width="100%" height="550px"/>
                    </div>
                </div>
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

    // Fonction pour afficher le conteneur bvn-container
    function showWelcomeContainer() {
    // Vérifiez si les conteneurs stagiaires-container et edt-container ne sont pas affichés
    if (!$(".stagiaires-container").is(":visible") && !$(".edt-container").is(":visible")) {
        $(".bvn-container").show();
    } else {
        $(".bvn-container").hide();
    }
    // Assurez-vous que les autres conteneurs sont masqués
    $(".stagiaires-container, .edt-container").hide();
}


    // Fonction pour afficher/masquer le conteneur de l'EDT
    function toggleEDT() {
        $(".edt-container").toggle();
        // Assurez-vous que l'autre conteneur est masqué
        $(".stagiaires-container").hide();
        // Masquer le conteneur bvn-container
        $(".bvn-container").hide();
    }

    // Fonction pour afficher/masquer la liste des stagiaires
    function toggleStagiaires() {
        $(".stagiaires-container").toggle();
        // Assurez-vous que l'autre conteneur est masqué
        $(".edt-container").hide();
        // Masquer le conteneur bvn-container
        $(".bvn-container").hide();
    }
</script>
<html lang="en">
<head>
    <!-- Vos balises meta, liens CSS et scripts JavaScript ici -->
    <style>
        .edt-image-container {
            max-width: 1000px; /* ou toute autre largeur souhaitée */
            margin: 0 auto; /* Centrer l'image horizontalement */
        }

        .edt-image {
            width: 100%; /* Pour que l'image occupe toute la largeur du conteneur */
            height: auto; /* Pour conserver les proportions de l'image */
        }
    </style>
</head>
<body>
    <!-- Votre contenu HTML ici -->
</body>
</html>
<style>
.edt-image-container {
    max-width: 850px; /* ou toute autre largeur souhaitée */
    margin: 0 auto; /* Centrer l'image horizontalement */
}

.edt-image {
    width: 100%; /* Pour que l'image occupe toute la largeur du conteneur */
    height: auto; /* Pour conserver les proportions de l'image */
    
}
</style>
</body>
</html>
