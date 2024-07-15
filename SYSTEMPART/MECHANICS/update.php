 <?php include '../include/header.php'; ?>
 <?php include '../include/sidebar.php'; ?>

 <?php 


$AddStatus = "";

if (isset($_POST['update_data'])) {
    $user_id = $_GET['user_id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password =md5($_POST['password']) ;
  
    $errors = array(); 

  
    if (empty($errors)) {
        $update = "UPDATE users SET fullname='$fullname', phone='$phone', email='$email', password='$password'
        WHERE user_id = '$user_id'";

        if (mysqli_query($connect, $update)) {
          
            $AddStatus = "Mechanics updated successfully";
        } else {
         
            $AddStatus = "Error occurred while updating User";
        }
    } else {
     
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
                                        $select_user = "SELECT * FROM users WHERE user_id = '" . $_GET['user_id'] . "'";
                                        $result = mysqli_query($connect, $select_user);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                         <div class="mb-3">
                             <label class="form-label">Fullname</label>
                             <input required="true" name="fullname" class="form-control" type="text"
                                 value="<?php echo $row['fullname'] ?>" style="height: 50px;border-radius: 10px;">
                         </div>


                         <div class="mb-3">
                             <label class="form-label">Phone</label>
                             <input required="true" name="phone" class="form-control" type="number"
                                 value="<?php echo $row['phone'] ?>" style="height: 50px;border-radius: 10px;">
                         </div>

                         <div class="mb-3">
                             <label class="form-label">Email</label>
                             <input required="true" name="email" class="form-control" type="email"
                                 value="<?php echo $row['email'] ?>" style="height: 50px;border-radius: 10px;">
                         </div>

                         <div class="mb-3">
                             <label class="form-label">Password</label>
                             <input required="true" name="password" class="form-control" type="password"
                                 value="<?php echo $row['password'] ?>" style="height: 50px;border-radius: 10px;">
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