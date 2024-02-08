<?php
include('../include/config.php'); 

$id_user=$_GET['id_user'];

 // Check if the email already exists
 $emailExistsQuery = "SELECT * FROM `user` WHERE id_user=$id_user";
  $result = $conn->query($emailExistsQuery);

if (isset($_POST['edit'])) {
    // Check if all required fields are filled
    if(isset($_POST['id_user'], $_POST['username'], $_POST['email'], $_POST['type'])) {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $cin = isset($_POST['cin']) ? $_POST['cin'] : NULL;
        $password = isset($_POST['password']) ? $_POST['password'] : NULL;
        $type = $_POST['type'];

        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update user information in the database
        $updateUserQuery = "UPDATE `user` SET user='$username', email='$email', cin='$cin', password='$password', type='$type' WHERE id_user=$id_user";

        if ($conn->query($updateUserQuery) === TRUE) {
            $message=1;
            header("Location: /Gestion_Absence-main/liste.php?check=" . urlencode($message));
        } else {
            echo "Error updating user: " . $conn->error;
        }
    } else {
        echo "All required fields are not filled.";
    }
} else {
    echo "Invalid request method.";
}


  if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
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
      <a href="/Gestion_Absence-main/register.php"
          ><i class="fas fa-user"></i><span>Register</span></a >
        <a href="/Gestion_Absence-main/liste.php"
          ><i class="fas fa-table"></i><span>Utilisateurs</span></a
        >
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
    <a href="/Gestion_Absence-main/register.php"
          ><i class="fas fa-user"></i><span>Register</span></a >
        <a href="/Gestion_Absence-main/liste.php"
          ><i class="fas fa-table"></i><span>Liste</span></a
        >
    </div>
    <!--sidebar end-->
    <div class="content">
      <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit user </h4>
                    </div>
                    <?php
                        if(isset($messageError)){
                            echo ' <div class="alert alert-danger" role="alert">
                                '. $messageError.' 
                            </div>';
                        }else if(isset($messageSuccess)){
                            echo ' <div class="alert alert-success" role="alert">
                            '. $messageSuccess.' 
                            </div>';
                        }
                        ?>
                    <div class="row mt-3">
                        <div class="col-md-12">
                        <form method="POST" >
                            <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                            <label class="labels mt-2">Username :</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $user['user']; ?>" required >                      
                            <label class="labels mt-2">Email : </label>
                            <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" required>
                            <label class="labels mt-2">CIN : </label>
                            <input class="form-control" type="text" name="cin" value="<?php echo $user['cin']; ?>">
                            <label class="labels mt-2">Password : </label>
                            <input class="form-control" type="password" name="password" value="<?php echo $user['password']; ?>">
                            <label class="labels mt-2">Type : </label>
                            <select class="form-control" name="type">
                                <option value="">Select role</option>
                                <option value="responsable scolarité" <?php if($user['type'] == 'responsable scolarité') echo 'selected'; ?>>Responsable Scolarité</option>
                                <option value="responsable de filière" <?php if($user['type'] == 'responsable de filière') echo 'selected'; ?>>Responsable de Filière</option>
                                <option value="formateur" <?php if($user['type'] == 'formateur') echo 'selected'; ?>>Formateur</option>
                                <option value="stagiaire" <?php if($user['type'] == 'stagiaire') echo 'selected'; ?>>Stagiaire</option>
                            </select>
                            <br>
                            <input type="submit" name="edit" value="Edit"  class="btn btn-primary labels mt-2">
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
<?php
    } 
?>
