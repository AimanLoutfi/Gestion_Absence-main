<?php
include('../include/config.php'); 

if(isset($_POST['Register'])){
    $discPdf=$_POST['discPdf'];
    // File upload handling
    $targetDirectory = "./upload/";
    $pdfEmplye = $_FILES['pdfEmplye']['name'];
    $targetFile = $targetDirectory . basename($pdfEmplye);

    // Move uploaded file to desired location
    if (move_uploaded_file($_FILES['pdfEmplye']['tmp_name'], $targetFile)) {
        // Database insertion
        $sql = "INSERT INTO `upload`(`desc`, `name_pdf`) VALUES ('$discPdf', '$pdfEmplye')";
        if ($conn->query($sql) === TRUE) {
            $messageSuccess = "Record inserted successfully";
        } else {
            $messageError = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $messageError = "Error uploading file";
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
                        <h4 class="text-right">Upload File  </h4>
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
                            <form method="POST"  enctype="multipart/form-data">
                                <label class="labels mt-2">description :</label>
                                <input class="form-control" type="text" name="discPdf" required >                      
                                <label class="labels mt-2">pdf employe  : </label>
                                <input class="form-control mb-5" type="file" name="pdfEmplye"  required>
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
