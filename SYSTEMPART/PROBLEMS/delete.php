<?php
session_start();
include '../../connection/connection.php';
$problem_id = $_REQUEST['problem_id'];
$query = "DELETE FROM car_problems WHERE problem_id=$problem_id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

// Check if deletion was successful
if ($result) {
    // Redirect to view.php with success message
    header("Location: ./view.php?success=1");
} else {
    // Redirect to view.php with failure message
    header("Location: ./view.php?success=0");
}
exit();