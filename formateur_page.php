<?php
include('./include/config.php');

@$id_user = $_GET['id_user'];

$sql = "SELECT * FROM user WHERE type='stagiaire'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Formateur</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="js/bootstrap.bundle.min.js"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        <a href="javascript:void(0);" onclick="toggleStagiaires()">
            <i class="fas fa-desktop"></i><span>Liste des Stagiaires</span>
        </a>
        <a href="javascript:void(0);" onclick="toggleEDT()">
            <i class="fas fa-laptop"></i><span>Emploi du Temps (EDT)</span>
        </a>
        <a href="javascript:void(0);" onclick="toggleABS()">
            <i class="fas fa-desktop"></i><span>Marquer l'Absence</span>
        </a>
        <a href="javascript:void(0);" onclick="togglerapp()">
            <i class="fas fa-desktop"></i><span>Rapport</span>
        </a>
    </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <a href="javascript:void(0);" onclick="togglehome()">
        <i class="fas fa-home"></i><span>Accueil</span>
        </a>
    <a href="javascript:void(0);" onclick="toggleStagiaires()">
        <i class="fas fa-list"></i><span>Liste des Stagiaires</span>
    </a>
    <a href="javascript:void(0);" onclick="toggleEDT()">
        <i class="fas fa-clock"></i><span>Emploi du Temps (EDT)</span>
    </a>
    <a href="javascript:void(0);" onclick="toggleABS()">
        <i class="fas fa-calendar-times"></i><span>Marquer l'Absence</span>
    </a>
    <a href="javascript:void(0);" onclick="afficherapp()">
        <i class="fas fa-file-alt"></i><span>Rapport</span>
    </a>
</div>
<!--sidebar end-->
<!--content start-->
<div class="content">
            <div class="col-md-12">
                <div class="card bg-transparent border-0 bvn-container">
                    <div class="card-header">
                        <h4 style="color: #F87119;">Accueil</h4>
                    </div>
                    <div class="card bnv-container" style="background-image: url('./img/xx.jpg'); background-size: cover; background-position: center; height: 600px;">
                        <div class="card bg-transparent border-0 bvn-container" class="card-body">
                            <div style="text-align: center; color: #fff; padding-top: 50px;">
                                <h2>Bienvenue dans votre espace formateur</h2>
                                <p><?php echo date('Y-m-d'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                
                <div class="card bg-transparent border-0 stagiaires-container stagiaires-container">
                    <div class="card-header">
                        <h4 style="color: #F87119;">Liste des Stagiaires</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Prénom</th>
                                    <th>Email</th>
                                    <th>CIN</th>
                                    
                                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['id_user'] . '</td>';
                                    echo '<td>' . $row['user'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['cin'] . '</td>';
                                    
                                    // Ajoutez d'autres colonnes selon vos besoins
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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
                <div class="col-md-12">
                    <div class="card bg-transparent border-0 abs-container" class="card abs-container" style="display:none;">
                        <div class="card-header">
                                <h4 style=" color: #F87119;">Marquer l'Absence</h4>
                            </div>
                            <div class="card-body">
                                <!-- Contenu du formulaire de marquage de l'absence -->
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Prénom</th>
                                    <th>Email</th>
                                    <th>CIN</th>
                                    <th class="align-middle text-center">Marquer l'Absence</th>
            
                                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Réexécutez la requête SQL pour récupérer les stagiaires
                            $result = mysqli_query($conn, $sql);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['id_user'] . '</td>';
                                echo '<td>' . $row['user'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['cin'] . '</td>';
                                
                                echo '<td class="align-middle text-center">';
                                
                                echo '<button type="button" onclick="marquerAbsence(' . $row['id_user'] . ')" class="btn btn-danger mt-auto">Absent</button>';
                                
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                                </table>
                        </div>
                    </div>
                <div class="col-md-12">    
                </div>
                        <div class="card bg-transparent border-0 rapp-container card rapp-container">
                        <div class="card-header">
                            <h4 style=" color: #F87119;">Rapport des Absences générés</h4>
                        </div>
                        <div class="card-body">
                                <!-- Contenu du formulaire de marquage de l'absence -->
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Prénom</th>
                                    <th>Date de l'absence</th>
                                    <th class="align-middle text-center">Supprimer l'absence</th>
            
                                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Réexécutez la requête SQL pour récupérer les stagiaires
                            $sql = "SELECT absence.id_absence, user.user, absence.date_absence
                            FROM absence
                            INNER JOIN user ON user.id_user = absence.id_user;
                            ";
                            $res = mysqli_query($conn, $sql);
                            
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo '<tr>';
                                echo '<td>' . $row['id_absence'] . '</td>';
                                echo '<td>' . $row['user'] . '</td>';
                                echo '<td>' . $row['date_absence'] . '</td>';
                                
                                
                                echo '<td class="align-middle text-center">';
                                
                                echo '<button type="button" onclick="suppAbsence(' . $row['id_absence'] . ')" class="btn btn-success mt-auto">Supprimer l\'absence</button>';
                                
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                                </table>
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
    // Vérifiez si un des conteneurs spécifiques (par exemple, stagiaires-container ou edt-container) est visible
    if ($(".stagiaires-container").is(":visible") || $(".edt-container").is(":visible")) {
        // Si l'un des conteneurs spécifiques est visible, masquez le conteneur bvn-container
        $(".bvn-container").hide();
    } else {
        // Si aucun des conteneurs spécifiques n'est visible, affichez le conteneur bvn-container
        $(".bvn-container").show();
    }
    // Assurez-vous que les autres conteneurs sont masqués
    $(".stagiaires-container, .edt-container, .rapp-container").hide();
}

  // Fonction pour afficher/masquer le conteneur de l'bvn
  function togglehome() {
        $(".bvn-container").show();
        // Assurez-vous que l'autre conteneur est masqué
        $(".stagiaires-container").hide();
        // Masquer le conteneur bvn-container
        $(".edt-container").hide();
        // Masquer le conteneur abs-container
        $(".abs-container").hide();
        $(".rapp-container").hide();
    }

    // Fonction pour afficher/masquer le conteneur de l'EDT
    function toggleEDT() {
        $(".edt-container").show();
        // Assurez-vous que l'autre conteneur est masqué
        $(".stagiaires-container").hide();
        // Masquer le conteneur bvn-container
        $(".bvn-container").hide();
        // Masquer le conteneur abs-container
        $(".abs-container").hide();
        $(".rapp-container").hide();
    }

    // Fonction pour afficher/masquer la liste des stagiaires
    function toggleStagiaires() {
        $(".stagiaires-container").show();
        // Assurez-vous que l'autre conteneur est masqué
        $(".edt-container").hide();
        // Masquer le conteneur bvn-container
        $(".bvn-container").hide();
        // Masquer le conteneur abs-container
        $(".abs-container").hide();
        $(".rapp-container").hide();
    }

    // Fonction pour afficher/masquer le conteneur de l'abs
    function toggleABS() {
    $(".abs-container").show(); // Affiche ou masque le conteneur de marquage de l'absence
    $(".stagiaires-container").hide(); // Masque le conteneur de la liste des stagiaires
    $(".edt-container").hide(); // Masque le conteneur de l'emploi du temps
    $(".bvn-container").hide(); // Masque le conteneur de bienvenue
    $(".rapp-container").hide();
    }


    function afficherapp() {
    $(".rapp-container").show(); // Affiche ou masque le conteneur de rapport
    $(".stagiaires-container").hide(); // Masque le conteneur de la liste des stagiaires
    $(".edt-container").hide(); // Masque le conteneur de l'emploi du temps
    $(".bvn-container").hide(); // Masque le conteneur de bienvenue
    $(".abs-container").hide();
    }

    function marquerAbsence(id_user) {
    // Effectuer une requête AJAX avec jQuery
    $.ajax({
        type: 'POST',
        url: 'AbsenceMar.php',  // Remplacez ceci par le chemin de votre script PHP
        data: { absent: id_user },
        success: function(response) {
            // Gérer la réponse de la requête ici
            alert(response);
        },
        error: function() {
            // Gérer les erreurs ici
            alert("Erreur lors de la requête AJAX");
        }
    });
    }
    function suppAbsence(id_absence) {
    // Effectuer une requête AJAX avec jQuery
    $.ajax({
        type: 'POST',
        url: 'AbsenceSup.php',
        data: { id_absence: id_absence }, // Utilisez id_absence ici
        success: function(response) {
            // Gérer la réponse de la requête ici
            alert(response);
        },
        error: function() {
            // Gérer les erreurs ici
            alert("Erreur lors de la requête AJAX");
        }
    });
}

</script>
</body>
</html>
