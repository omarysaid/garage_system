 <?php include '../include/header.php'; ?>
 <?php include '../include/sidebar.php'; ?>

 <?php 


$AddStatus = "";

if (isset($_POST['update_data'])) {
    $problem_id = $_GET['problem_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
  
  
    $errors = array(); 

  
    if (empty($errors)) {
        $update_student = "UPDATE car_problems SET name='$name', description='$description'
        WHERE problem_id = '$problem_id'";

        if (mysqli_query($connect, $update_student)) {
            // Set user addition status
            $AddStatus = "Data updated successfully";
        } else {
            // Set role addition status
            $AddStatus = "Error occurred while updating User";
        }
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
}

?>



 <main class="app-content">
     <div class="app-title">
         <div>
             <h1><i class="bi bi-ui-checks"></i> FORM </h1>
         </div>
     </div>
     <div class="row">
         <div class="col-md-12">
             <div class="tile shadow-lg">
                 <h3 class="tile-title">Mechanics Update form </h3>
                 <div class="tile-body">
                     <hr style="background-color:teal; height:20px">
                     <form method="POST">
                         <div class="alert <?php echo !empty($AddStatus) && strpos($AddStatus, 'successfully') !== false ? 'alert-success' : ''; ?>"
                             id="successMessage" style="text-align:center">
                             <?php echo $AddStatus; ?>
                         </div>


                         <?php
                                        $select = "SELECT * FROM car_problems WHERE problem_id = '" . $_GET['problem_id'] . "'";
                                        $result = mysqli_query($connect, $select);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                         <div class="mb-3">
                             <label class="form-label">Fullname</label>
                             <input required="true" name="name" class="form-control" type="text"
                                 value="<?php echo $row['name'] ?>" style="height: 50px;border-radius: 10px;">
                         </div>


                         <div class="mb-3">
                             <label class="form-label">Description</label>
                             <textarea required="true" name="description" class="form-control"
                                 style="height: 100px; border-radius: 10px;"><?php echo $row['description']; ?></textarea>
                         </div>


                 </div>
                 <div class="tile-footer">
                     <button class="btn btn-primary" type="submit" name="update_data"><i
                             class="bi bi-check-circle-fill me-2"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a
                         class="btn btn-secondary" href="./view.php"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                 </div>
                 <?php
                                            }
                                        }
                                        ?>
                 </form>
             </div>
         </div>
     </div>
 </main>

 <?php include '../include/footer.php'; ?>