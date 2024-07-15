<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Data Table</h1>
            <p>Table to display mechanics details</p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NA</th>
                                    <th>Fullname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Registered At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $cnt = 1; // Initialize the counter
                                        $select_users =
                                            "SELECT * FROM users  WHERE usertype = 'Mechanics'";
                                        $result = mysqli_query($connect, $select_users) or die(mysqli_error($connect));
                                        $number = mysqli_num_rows($result);
                                        if ($number > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>


                                    <td><?php echo $row['created']; ?></td>
                                    <td>

                                        <span>
                                            <a href="./update.php?user_id=<?php echo $row['user_id'] ?>">
                                                <button class="btn btn-success" style="width: 40px;">
                                                    <i class="bi bi-pen"></i>
                                                    <!-- Eye icon for view -->
                                                </button>
                                            </a>
                                        </span>




                                        <span>
                                            <button class="btn btn-danger" style="width: 40px;"
                                                onclick="confirmDelete(<?php echo $row['user_id'] ?>)">
                                                <i class="bi bi-trash"></i>
                                                <!-- Trash icon for delete -->
                                            </button>
                                        </span>



                                    </td>
                                </tr>
                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>0 results</td></tr>";
                                        }
                                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../include/footer.php'; ?>

<script>
function confirmDelete(userId) {
    // Display confirmation dialog
    if (confirm("Are you sure you want to delete?")) {
        // If user confirms, redirect to delete script
        window.location.href = "./delete.php?user_id=" + userId;
    }
}
</script>