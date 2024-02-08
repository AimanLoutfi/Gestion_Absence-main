<?php
include('../include/config.php'); 

 // Check if the email already exists
 $emailExistsQuery = "SELECT * FROM `user`";
  $result = $conn->query($emailExistsQuery);


?>
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
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Liste des utilisateurs</h4>
                    </div>
                    <?php
               if(isset($_GET['check'])){
                $check=$_GET['check'];
                $message=($check==1)?" Record updated successfully ":" Delete successfully ";
                echo ' <div class="alert alert-success" role="alert">'.
                $message
                .'</div>';
               }
            ?>
                    <div class="row mt-3">
                        <div class="col-md-12">
                        <div class="table-responsive card pmd-card">
	<table class="table pmd-table">
		<thead>
			<tr>
				<th>Nom et prénom</th>
				<th>Email</th>
				<th>Role</th>
				<th>Actions</th>
			</tr>
		</thead>
   
		<tbody>
            <?php
                if ($result->num_rows > 0) {
                    foreach($result as $row){
                      echo '
                        <tr>
                            <td data-title="Month">'. (isset($row['user']) ? $row['user'] : '') .'</td>
                            <td data-title="Month">'. (isset($row['email']) ? $row['email'] : '') .'</td>
                            <td data-title="Total" class="text-success">'. (isset($row['type']) ? $row['type'] : '') .'</td>
                            <td data-title="action">
                                <a href="delete.php?user_id='. (isset($row['id_user']) ? $row['id_user'] : '') .'">
                                <i class="fa fa-trash" style="color: red; margin-right: 30px;"></i> 
                                </a>
                                <a href="edit.php?id_user='. (isset($row['id_user']) ? $row['id_user'] : '') .'">
                                <i class="fa fa-edit" style="color: green; margin-right: 30px;"></i> 
                                </a>
                            </td>
                        </tr>
                    ';
                    }
                } 
             ?>
		
			
		</tbody>
	</table>
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
