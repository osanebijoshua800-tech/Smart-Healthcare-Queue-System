<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email already exists in 'patients' table
    $user_check = "SELECT * FROM patients WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check);

    if (mysqli_num_rows($result) > 0) {
        header("Location: register.php?error=Email already taken");
        exit();
    } else {
        // Insert into the correct 'patients' table
        $sql = "INSERT INTO patients(name, email, password) VALUES('$name', '$email', '$pass')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?success=Account created successfully");
            exit();
        } else {
            header("Location: register.php?error=Registration failed");
            exit();
        }
    }
}