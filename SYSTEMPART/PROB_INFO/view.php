<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Data Table</h1>
            <p>Table to display car problems details</p>
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
                                    <th>Problem</th>
                                    <th>Possible solution</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1; // Initialize the counter
                                $select_problems = "
                                    SELECT car_problems.name,info.info_id, info.description, info.created 
                                    FROM car_problems 
                                    JOIN info ON car_problems.problem_id = info.problem_id
                                ";
                                $result = mysqli_query($connect, $select_problems) or die(mysqli_error($connect));
                                $number = mysqli_num_rows($result);
                                if ($number > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                        <?php 
        $description = $row['description'];
        $words = explode(" ", $description);
        $wordCount = count($words);
        $lines = ceil($wordCount / 10);
        $maxLines = 10; 

        for ($i = 0; $i < min($lines, $maxLines); $i++) {
            $start = $i * 10;
            $end = min(($i + 1) * 10, $wordCount);
            echo implode(" ", array_slice($words, $start, $end - $start));
            echo "<br>";
        }

        if ($lines > $maxLines) {
            echo " ...";
        }
    ?>
                                    </td>

                                    <td><?php echo $row['created']; ?></td>
                                    <td>
                                        <span>
                                            <a href="./update.php?info_id=<?php echo $row['info_id'] ?>">
                                                <button class="btn btn-success" style="width: 40px;">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </a>
                                        </span>
                                        <span>
                                            <button class="btn btn-danger" style="width: 40px;"
                                                onclick="confirmDelete(<?php echo $row['info_id'] ?>)">
                                                <i class="bi bi-trash"></i>
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
function confirmDelete(problemId) {
    if (confirm("Are you sure you want to delete?")) {
        window.location.href = "./delete.php?info_id=" + problemId;
    }
}
</script>