 <?php include '../include/header.php'; ?>
 <?php include '../include/sidebar.php'; ?>

 <?php 


$AddStatus = "";

if (isset($_POST["add_data"])) {
    $problem_id = $_POST['problem_id'];
    $description = $_POST['description'];
  
    if (empty($errors)) {
        $insert_new = "INSERT INTO info (problem_id,  description) 
                            VALUES ('$problem_id','$description')";

        if (mysqli_query($connect, $insert_new)) {
            // Set role addition status
            $AddStatus = " data added successfully";
        } else {
            // Set role addition status
            $AddStatus = "Error occurred while adding data";
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
                 <h3 class="tile-title">Car problems Info form </h3>
                 <div class="tile-body">
                     <hr style="background-color:teal; height:20px">
                     <form method="POST">
                         <div class="alert <?php echo !empty($AddStatus) && strpos($AddStatus, 'successfully') !== false ? 'alert-success' : ''; ?>"
                             id="successMessage" style="text-align:center">
                             <?php echo $AddStatus; ?>
                         </div>

                         <?php
                                        $select_book = "SELECT * FROM car_problems WHERE problem_id = '" . $_GET['problem_id'] . "'";
                                        $result = mysqli_query($connect, $select_book);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>


                         <div class="mb-3">

                             <input required="true" name="problem_id" class="form-control" type="hidden"
                                 value="<?php echo $row['problem_id'] ?>" readonly
                                 style="height: 50px;border-radius: 10px;">
                         </div>


                         <div class="mb-3">
                             <label class="form-label">Problem</label>
                             <input required="true" name="name" class="form-control" type="text"
                                 value="<?php echo $row['name'] ?>" readonly style="height: 50px;border-radius: 10px;">
                         </div>


                         <div class="mb-3">
                             <label class="form-label">Possible solution</label>
                             <textarea required="true" name="description" class="form-control"
                                 placeholder="Write possible solution"
                                 style="height: 100px; border-radius: 10px;"></textarea>
                         </div>
                 </div>
                 <div class="tile-footer">
                     <button class="btn btn-primary" type="submit" name="add_data"><i
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