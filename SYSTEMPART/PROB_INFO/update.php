<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<?php 
$AddStatus = "";

if (isset($_POST['update_data'])) {
    $info_id = $_GET['info_id'];
    $description = $_POST['description'];

    // Validate description
    if (empty($description)) {
        $errors[] = "Description is required.";
    }

    if (empty($errors)) {
        $update = "UPDATE info SET description='$description' WHERE info_id='$info_id'";

        if (mysqli_query($connect, $update)) {
            $AddStatus = "Data updated successfully";
        } else {
            $AddStatus = "Error occurred while updating the data";
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
                <h3 class="tile-title">Mechanics Update Form</h3>
                <div class="tile-body">
                    <hr style="background-color:teal; height:20px">
                    <form method="POST">
                        <div class="alert <?php echo !empty($AddStatus) && strpos($AddStatus, 'successfully') !== false ? 'alert-success' : ''; ?>"
                            id="successMessage" style="text-align:center">
                            <?php echo $AddStatus; ?>
                        </div>

                        <?php
                        // SQL query to join the tables and fetch required fields
                        $select = "
                            SELECT 
                                car_problems.name, 
                                info.description, 
                                info.created 
                            FROM 
                                info 
                            INNER JOIN 
                                car_problems 
                            ON 
                                info.problem_id = car_problems.problem_id 
                            WHERE 
                                info.info_id = '" . $_GET['info_id'] . "'";

                        // Execute the query
                        $result = mysqli_query($connect, $select);

                        // Check if any results were returned
                        if (mysqli_num_rows($result) > 0) {
                            // Fetch and display the results
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="mb-3">
                            <label class="form-label">Problem</label>
                            <input required="true" name="name" class="form-control" type="text"
                                value="<?php echo $row['name'] ?>" readonly style="height: 50px; border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Solution</label>
                            <textarea required="true" name="description" class="form-control"
                                style="height: 100px; border-radius: 10px;"><?php echo $row['description']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Created</label>
                            <input required="true" name="created" class="form-control" type="text"
                                value="<?php echo $row['created']; ?>" readonly
                                style="height: 50px; border-radius: 10px;">
                        </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit" name="update_data"><i
                                    class="bi bi-check-circle-fill me-2"></i>Submit</button>
                            <a class="btn btn-secondary" href="./view.php"><i
                                    class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../include/footer.php'; ?>