<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $pass = mysqli_real_escape_string($conn, trim($_POST['password']));

    if (empty($email) || empty($pass)) {
        header("Location: doctor_login.php?error=All fields are required");
        exit();
    } else {
        // This query matches the table we just ensured exists
        $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$pass' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // This will tell us EXACTLY what is wrong with the database connection
            die("Database Error: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            session_unset(); // Clear any old patient data
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['doctor_name']; 
            $_SESSION['role'] = 'doctor';
            
            header("Location: doctor_dashboard.php");
            exit();
        } else {
            header("Location: doctor_login.php?error=Incorrect Email or Password");
            exit();
        }
    }
} else {
    header("Location: doctor_login.php");
    exit();
}