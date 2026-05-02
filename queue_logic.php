<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['patient_id'])) {
    $patient_id = $_SESSION['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $today = date("Y-m-d");

    // Map ID to Name
    $doctor_names = [
        1 => "Dr. Okoro (Cardiology)",
        2 => "Dr. Adebayo (General)",
        3 => "Dr. Nwosu (Pediatrics)"
    ];
    $doctor_name = isset($doctor_names[$doctor_id]) ? $doctor_names[$doctor_id] : "Medical Officer";

    // Get next queue number
    $sql_q = "SELECT MAX(queue_number) AS latest FROM appointments WHERE appointment_date = '$today'";
    $res_q = mysqli_query($conn, $sql_q);
    $row_q = mysqli_fetch_assoc($res_q);
    $next_num = ($row_q['latest']) ? $row_q['latest'] + 1 : 1;

    // Save to database
    $insert = "INSERT INTO appointments (patient_id, doctor_id, doctor_name, queue_number, appointment_date, status) 
               VALUES ('$patient_id', '$doctor_id', '$doctor_name', '$next_num', '$today', 'Pending')";

    if(mysqli_query($conn, $insert)){
        header("Location: dashboard.php?success=1");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: book_appointment.php");
    exit();
}
?>