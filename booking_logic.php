
<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // We use 'name' to match your DB column
    $name = mysqli_real_escape_string($conn, $_POST['name']); 
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
    $status = "Pending";

    if (empty($doctor_name)) {
        header("Location: book_appointment.php?error=Please select a doctor");
        exit();
    }

    $sql = "INSERT INTO appointments (name, age, doctor_name, status) 
            VALUES ('$name', '$age', '$doctor_name', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php?success=Appointment booked with Dr. $doctor_name");
        exit();
    } else {
        header("Location: book_appointment.php?error=Database Error: " . mysqli_error($conn));
        exit();
    }
}
?>