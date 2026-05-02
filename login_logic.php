<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['phone']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $phone = validate($_POST['phone']);
    $pass = validate($_POST['password']);

    if (empty($phone)) {
        header("Location: login.php?error=Phone number is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Query matching your updated table structure
        $sql = "SELECT * FROM patients WHERE phone='$phone' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            // Store user info in the session for the dashboard to use
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=Incorect Phone or password");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}