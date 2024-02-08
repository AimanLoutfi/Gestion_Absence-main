<?php
include('../include/config.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `upload` WHERE `id` = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}
// Check if the form is submitted
if(isset($_POST['EditRegister'])){
    $discPdf = $_POST['discPdf'];
    $id = $_POST['id'];
    // File upload handling
    $targetDirectory = "./upload/";
    $pdfEmplye = $_FILES['pdfEmplye']['name'];
    $targetFile = $targetDirectory . basename($pdfEmplye);
    // Move uploaded file to desired location
    if(!empty($pdfEmplye)){
        if (move_uploaded_file($_FILES['pdfEmplye']['tmp_name'], $targetFile)) {
        // Database update
          $sql = "UPDATE `upload` SET `desc`='$discPdf', `name_pdf`='$pdfEmplye' WHERE `id` = $id"; // Change this to your appropriate identifier for the record to be updated
        }
    }else{
        $sql = "UPDATE `upload` SET `desc`='$discPdf' WHERE `id` = $id"; // Change this to your appropriate identifier for the record to be updated
    }
    if ($conn->query($sql) === TRUE) {
            $message=1;
            header("Location: /Gestion_Absence-main/responsable_scolarite/ListFile.php?check=" . urlencode($message));
    } else {
            echo "Error updating user: " . $conn->error;
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
                    <h4 class="text-right">Edit File  </h4>
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
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                        <label class="labels mt-2">description :</label>
                        <input class="form-control" type="text" value="<?php echo $row['desc']; ?>" name="discPdf" required >                      
                        <label class="labels mt-2">pdf employe  : </label>
                        <input class="form-control mb-5" type="file"  name="pdfEmplye"  >
                        <br>
                        <!-- Change 'Register' to 'EditRegister' -->
                        <input type="submit" name="EditRegister" value="EditRegister" class="right_area btn nt-"  style="color: #fff;background-color: #f1672c;border-color: #f1ae87;" >
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
