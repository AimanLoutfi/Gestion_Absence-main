
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ESEFA</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/profile.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../js/bootstrap.bundle.min.js" />
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
        <img src="./img/logoo.png" alt="logo">
      </div>
      <div class="right_area">
        <a href="./../logout.php"
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
        <a href="/Gestion_Absence-main/responsable_scolarite/register.php"
          ><i class="fas fa-user"></i><span>Register</span></a >
        <a href="/Gestion_Absence-main/responsable_scolarite/liste.php"
          ><i class="fas fa-table"></i><span>Utilisateurs</span></a
        >
        <a href="/Gestion_Absence-main/responsable_scolarite/uploadFile.php"
          ><i class="fas fa-upload"></i><span>Ajouter emploi de temps</span></a
        >
        <a href="/Gestion_Absence-main/responsable_scolarite/ListFile.php"
          ><i class="fas fa-table"></i><span>Liste des emplois</span></a
        >
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <a href="/Gestion_Absence-main/responsable_scolarite/register.php"
          ><i class="fas fa-user"></i><span>Register</span></a >
        <a href="/Gestion_Absence-main/responsable_scolarite/liste.php"
          ><i class="fas fa-table"></i><span>Utilisateurs</span></a
        >
        <a href="/Gestion_Absence-main/responsable_scolarite/uploadFile.php"
          ><i class="fas fa-upload"></i><span>Ajouter emploi de temps</span></a
        >
        <a href="/Gestion_Absence-main/responsable_scolarite/ListFile.php"
          ><i class="fas fa-table"></i><span>Liste des emplois</span></a
        >
    </div>
