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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

  <input type="checkbox" id="check" />
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn" style="position: absolute; top: 22px"></i>
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
      <a href="RespoFilHome.php?id_user=<?php echo $id_user; ?>"><i class="fas fa-desktop"></i><span>Mes Modules</span></a>
      <a href="RespoFilProfile.php?id_user=<?php echo $id_user; ?>"><i class="fa fa-user"></i><span>profil</span></a>
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <a href="RespoFilHome.php?id_user=<?php echo $id_user; ?>"> <i class="fas fa-desktop"></i><span>Dashboard</span>
    </a>
    <a href="RespoEDT.php?id_user=<?php echo $id_user; ?>"> <i class="fas fa-clock"></i><span>Emploi du Temps (EDT)</span>
    </a>
    <a href="RespoFilProfile.php?id_user=<?php echo $id_user; ?>"><i class="fa fa-user"></i><span>Mon Profil</span></a>
    <a href="RespoAbse.php?id_user=<?php echo $id_user; ?>"><i class="fas fa-calendar-times"></i><span>Marquer l'Absence</span></a>
  </div>
  <!--sidebar end-->
  <div class="content">
    <div class="container">
      <div class="row">
        <?php

        // Récupérer tous les utilisateurs de type "stagiaire" depuis la base de données
        $sql = "SELECT id_user , user FROM user WHERE type = 'stagiaire'";
        $result = mysqli_query($conn, $sql);



        // Vérifiez si le formulaire a été soumis


        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title style="color: #F87119;">Tableau de bord de suivi des absences</title>
        </head>

        <body>
          <h4 style="color: #F87119;">Tableau de bord de suivi des absences</h4>
          <div class="center-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <label style="color: #F87119;" for="stagiaire">Stagiaire :</label>


              <!-- Afficher une liste déroulante pour sélectionner le stagiaire -->
              <select name="stagiaire">
                <option value="">Choisissez un stagiaire</option>
                <?php
                // Parcourir les résultats et afficher chaque utilisateur dans la liste déroulante
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['id_user'] . "'>" . $row['user'] . "</option>";
                }
                ?>
              </select>
              <input type="submit" value="Afficher les absences">
            </form>
          </div>
          <?php

          // Convertir la date au format DD/MM/AAAA
          function formatDate($date)
          {
            return date('d/m/Y', strtotime($date));
          }

          // Vérifiez si le formulaire a été soumis
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérifiez si l'ID du stagiaire a été sélectionné et n'est pas vide
            if (!empty($_POST["stagiaire"])) {
              // Récupérez l'ID du stagiaire sélectionné à partir du formulaire
              $id_stagiaire = $_POST["stagiaire"];

              // Requête SQL pour récupérer les absences du stagiaire sélectionné
              $sql = "SELECT * FROM absence WHERE id_user = $id_stagiaire";
              $result = mysqli_query($conn, $sql);

              // Vérifiez si des absences ont été trouvées pour ce stagiaire
              if (mysqli_num_rows($result) > 0) {
                // Afficher les absences dans un tableau

                echo "<table class='absence-table'>";
                echo "<thead ><tr><th style='color: #F87119;'>Date d'absence</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>" . formatDate($row["date_absence"]) . "</td></tr>";
                }
                echo "</tbody>";
                echo "</table>";
              } else {
                echo "<span style='color: darkgreen;'>Aucune absence trouvée pour ce stagiaire.</span>";
              }
            } else {
              echo "<span style='color: red;'>Veuillez sélectionner un stagiaire.</span>";
            }
          }
          ?>
        </body>

        </html>

      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      $(".nav_btn").click(function() {
        $(".mobile_nav_items").toggleClass("active");
      });
    });
  </script>

</body>

</html>
<style>
  form {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
  }

  select,
  input[type="submit"] {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  select {
    width: 100%;
  }

  ul {
    list-style: none;
    padding: 0;
  }

  li {
    margin-bottom: 10px;
  }

  .center-form {
    text-align: center;
    margin-top: 20px;
  }

  .absence-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid white;
  }

  .absence-table th,
  .absence-table td {
    border: 1px solid white;
    padding: 8px;
    text-align: left;
  }

  .absence-table th {
    background-color: white;
    color: #333;
  }