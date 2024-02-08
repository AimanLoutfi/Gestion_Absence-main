<?php
include('../include/config.php'); 

if(isset($_POST['Register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $cin=$_POST['cin'];
    $password=$_POST['password'];
    $type=$_POST['type']; 
    // Check if the email already exists
    $emailExistsQuery = "SELECT * FROM `user` WHERE `email` = '$email' ";
    $result = $conn->query($emailExistsQuery);
    if ($result->num_rows > 0) {
      $messageError = "Email  already exists.";
    } else {
      //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // SQL query for insertion
      $sql = "INSERT INTO `user`(`user`,`email`, `cin`, `password`, `type`) VALUES ('$username','$email','$cin','$password','$type')";
      // Perform the query
      if ($conn->query($sql) === TRUE) {
        $messageSuccess = "Record inserted successfully";
      } else {
        $messageError = "Error: " . $sql . "<br>" . $db->error;
      }
    }
  }


  include './layout.php';
?>



    <!--sidebar end-->
    <div class="content">
      <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Register </h4>
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
                            <form method="POST">
                                <label class="labels mt-2">username :</label>
                                <input class="form-control" type="text" name="username" required >                      
                                <label class="labels mt-2">Email : </label>
                                <input class="form-control" type="email" name="email"  required>
                                <label class="labels mt-2">CIN : </label>
                                <input class="form-control" type="text" name="cin">
                                <label class="labels mt-2">Password : </label>
                                <input class="form-control" type="password" name="password" >
                                <label class="labels mt-2">Type : </label>
                                <select class="form-control mb-5" name="type" required>
                                    <option value="">Sélectionnez un rôle</option>
                                    <option value="responsable scolarité">Responsable scolarité</option>
                                    <option value="responsable de filière">Responsable de filière</option>
                                    <option value="formateur">Formateur</option>
                                    <option value="stagiaire">Stagiaire</option>
                                </select>

                                <br>
                                <input type="submit" name="Register" value="register" class="right_area btn nt-"  style="color: #fff;background-color: #f1672c;border-color: #f1ae87;" >
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
