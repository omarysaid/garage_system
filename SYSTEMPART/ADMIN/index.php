<?php include '../include/header.php'; ?>
<?php include '../include/sidebar.php'; ?>

<main class="app-content">
    <div class="app-title ">
        <div>
            <p style="font-size:20px">Wellcome: (
                <?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>)</p>
        </div>
    </div>

    <div class="row shadow">
        <div class="col-md-6 col-lg-4" style="margin-top: 30px;">
            <div class="widget-small  coloured-icon" style="height: 150px;background-color:teal">
                <i class="icon bi bi-people fs-1"></i>
                <?php
                                    $sql = "SELECT COUNT(*) AS total_users FROM users WHERE usertype = 'Mechanics'";
                                    $result = $connect->query($sql);
                                    $total_users = 0;
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total_users = $row["total_users"];
                                    }
                                    // Do not close the connection here
                                    ?>
                <div class="info">
                    <h1 style="font-size:25px">Mechanics</h1>
                    <h1><b> 0<?php echo $total_users; ?></b></h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4" style="margin-top: 30px;">
            <div class="widget-small  coloured-icon" style="height: 150px;background-color:teal"><i
                    class="icon bi bi-file-earmark fs-1"></i>
                <?php
                                    $sql = "SELECT COUNT(*) AS total FROM car_problems";
                                    $result = $connect->query($sql);
                                    $total = 0;
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total = $row["total"];
                                    }
                                    // Do not close the connection here
                                    ?>
                <div class="info">
                    <h1 style="font-size:25px">Car_problems</h1>
                    <h1><b> 0<?php echo $total; ?></b></h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4" style="margin-top: 30px;">
            <div class="widget-small  coloured-icon" style="height: 150px;background-color:teal"><i
                    class="icon bi bi-file-earmark fs-1"></i>
                <?php
                                    $sql = "SELECT COUNT(*) AS total FROM info";
                                    $result = $connect->query($sql);
                                    $total = 0;
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total = $row["total"];
                                    }
                                    // Do not close the connection here
                                    ?>
                <div class="info">
                    <h1 style="font-size:25px">Problems_infos</h1>
                    <h1><b> 0<?php echo $total; ?></b></h1>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include '../include/footer.php'; ?>