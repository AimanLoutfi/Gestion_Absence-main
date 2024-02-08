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
            header("Location: /Gestion_Absence-main/responsable_scolarite/liste.php?check=" . urlencode($message));
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



  include './layout.php';
?>

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