<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['appointment_id'];
    $notes = mysqli_real_escape_string($conn, $_POST['doctor_notes']);

    // Update the note AND set status to Completed
    $sql = "UPDATE appointments SET doctor_notes='$notes', status='Completed' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: doctor_dashboard.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>