<?php
session_start();
include "db_conn.php";

if (isset($_POST['patient_id']) && isset($_POST['diagnosis'])) {
    
    $p_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
    $diag = mysqli_real_escape_string($conn, $_POST['diagnosis']);
    $treat = mysqli_real_escape_string($conn, $_POST['treatment']);
    $presc = mysqli_real_escape_string($conn, $_POST['prescription']);
    $doc_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);

    // 1. Insert the medical record
    $sql_record = "INSERT INTO medical_records (patient_id, diagnosis, treatment, prescription, doctor_name) 
                   VALUES ('$p_id', '$diag', '$treat', '$presc', '$doc_name')";
    
    if (mysqli_query($conn, $sql_record)) {
        
        // 2. THE FIX: Update the appointment status to 'Completed'
        // This makes them stop showing as 'Pending' on your dashboard
        $sql_update = "UPDATE appointments SET status='Completed' WHERE patient_id='$p_id' AND status='Pending'";
        mysqli_query($conn, $sql_update);

        header("Location: doctor_dashboard.php?success=Patient treated successfully");
        exit();
    } else {
        echo "Error saving record: " . mysqli_error($conn);
    }
}