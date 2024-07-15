<?php include '.././include/mech_header.php'; ?>
<div class="container shadow fixed-top" style="background-color:teal; height:100px">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <img src="./assets/images/logo.jpg" style="height:100px; width:100px; border-radius:20px">
        </div>
        <div class="col-md-6 d-flex justify-content-between align-items-center">
            <h2 style="color:white; font-family:Georgia, 'Times New Roman', Times, serif; font-size:35px; margin:0">
                Garage management system
            </h2>
            <a href="../../index.php"><button class="btn btn-light" style="height:40px; margin-top:15px">Log
                    Out</button></a>
        </div>
    </div>
</div>


<div class="owl-carousel slide-one-item" style="margin-top:100px">
    <div class="d-md-flex testimony-29101 align-items-stretch" style="height:300px">
        <div class="image" style="background-image: url('./assets/images/garage.jpg');"></div>
        <div class="text" style="background-color:teal">
            <blockquote>
                <p style="color:white">&ldquo;Car maintenance is crucial for ensuring the longevity and optimal
                    performance of your vehicle. Regular check-ups and servicing from a reputable garage can help
                    identify and address potential issues before they become major problems.&rdquo;</p>
            </blockquote>
        </div>
    </div>
    <div class="d-md-flex testimony-29101 align-items-stretch" style="height:300px">
        <div class="image" style="background-image: url('./assets/images/g2.png');"></div>
        <div class="text" style="background-color:teal">
            <blockquote>
                <p style="color:white">&ldquo;A professional garage provides a range of services tailored to meet your
                    car’s specific needs. Skilled mechanics utilize advanced diagnostic tools to pinpoint issues
                    accurately, ensuring effective and efficient repairs.&rdquo;</p>
            </blockquote>
        </div>
    </div>
    <div class="d-md-flex testimony-29101 align-items-stretch" style="height:300px">
        <div class="image" style="background-image: url('./assets/images/g4.jpg');"></div>
        <div class="text" style="background-color:teal">
            <blockquote>
                <p style="color:white">&ldquo;Whether it’s addressing engine troubles, fixing transmission problems, or
                    performing comprehensive inspections, a garage offers the expertise necessary to keep your car in
                    top condition. Additionally, regular maintenance from a certified garage can help maintain your
                    vehicle’s warranty and resale value.&rdquo;</p>
            </blockquote>
        </div>
    </div>
</div>

<div class="container-fluid" style="background-color:teal; margin-top:20px; padding:20px;">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-white">Search Car Problems</h2>
            <form method="GET" action="" class="form-inline">
                <div class="input-group mb-3" style="width: 100%;">
                    <input type="text" class="form-control" name="search" placeholder="Search for car problems..."
                        aria-label="Search for car problems">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
   
    // Search logic
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if (isset($_GET['problem_id'])) {
        // Fetch details for a specific problem
        $problem_id = $_GET['problem_id'];

        echo '<div class="row mb-4">';
        echo '<div class="col-md-12">';
        echo '<h2 class="text-white">Possible solutions</h2>';
        echo '</div>';
        echo '</div>';

        // SQL query to fetch data
        $sql = "SELECT i.description FROM info i JOIN car_problems p ON i.problem_id = p.problem_id WHERE p.problem_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $problem_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row mb-2">';
                echo '<div class="col-md-12">';
                echo '<div class="card bg-dark text-white">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . htmlspecialchars($row["description"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-warning">No possible solutions found.</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Display list of problems
        echo '<div class="row mb-4">';
        echo '<div class="col-md-6">';
        echo '<h2 class="text-white">Car Problems</h2>';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<h2 class="text-white">Descriptions</h2>';
        echo '</div>';
        echo '</div>';

        // SQL query to fetch data
        $sql = "SELECT problem_id, name, description FROM car_problems WHERE name LIKE ? OR description LIKE ?";
        $searchTerm = '%' . $search . '%';
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="row mb-2">';
                echo '<div class="col-md-6">';
                echo '<a href="?problem_id=' . htmlspecialchars($row["problem_id"]) . '" class="text-white">';
                echo '<div class="card bg-dark text-white">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<div class="card bg-dark text-white">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . htmlspecialchars($row["description"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-warning">Car problem is not found please go to xxxxxxxx.</div>';
            echo '</div>';
            echo '</div>';
        }
    }

    // Close connection
    $connect->close();
    ?>
</div>

<?php include '.././include/mech_footer.php'; ?>