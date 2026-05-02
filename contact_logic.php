<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert into database
    $sql = "INSERT INTO contact_messages (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to contact page with a success message
        header("Location: contact.php?success=Thank you! Your message has been sent.");
        exit();
    } else {
        // Handle database errors
        header("Location: contact.php?error=Something went wrong. Please try again.");
        exit();
    }
} else {
    // If accessed directly, send them back to the form
    header("Location: contact.php");
    exit();
}
?>