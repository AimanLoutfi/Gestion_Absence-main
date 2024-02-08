<?php
include('../include/config.php'); 

 // Check if the email already exists
 $emailExistsQuery = "SELECT * FROM `user`";
  $result = $conn->query($emailExistsQuery);



  include './layout.php';
?>
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
