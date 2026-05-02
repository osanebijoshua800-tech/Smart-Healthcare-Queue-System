<?php
session_start();
include "db_conn.php";

// SECURITY CHECK: Only allow the update if the Doctor is logged in
if (!isset($_SESSION['doctor_logged_in'])) {
    die("Unauthorized access.");
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Professional touch: Clean the data to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    $status = mysqli_real_escape_string($conn, $status);

    $sql = "UPDATE appointments SET status='$status' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the doctor dashboard immediately
        header("Location: doctor_dashboard.php");
        exit();
    } else {
        // Wrap the error in your professional CSS style
        echo "<!DOCTYPE html><html><head><link rel='stylesheet' href='style.css?v=2'></head><body>";
        echo "<div class='container'><h2>Database Error</h2><p>" . mysqli_error($conn) . "</p></div>";
        echo "</body></html>";
    }
}
?>