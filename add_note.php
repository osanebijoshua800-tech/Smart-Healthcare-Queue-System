<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['doctor_logged_in'])) { header("Location: doctor_dashboard.php"); exit(); }

$appointment_id = $_GET['id'];
$sql = "SELECT appointments.*, patients.name FROM appointments 
        JOIN patients ON appointments.patient_id = patients.id 
        WHERE appointments.id = $appointment_id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultant Notes | Momentum Pro</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
    <div class="container">
        <h2>Consultant Note</h2>
        <p style="opacity: 0.7;">Patient: <strong><?php echo $data['name']; ?></strong></p>
        <hr style="border: 0.5px solid var(--glass-border); margin: 20px 0;">

        <form action="save_note.php" method="POST">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
            
            <textarea name="doctor_notes" placeholder="Enter diagnosis, prescription, or follow-up instructions..." 
                      style="width: 100%; height: 200px; background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); border-radius: 15px; color: white; padding: 15px; font-family: sans-serif; outline: none;" required></textarea>

            <button type="submit" style="margin-top: 20px;">Save & Complete Appointment</button>
        </form>
        <br>
        <a href="doctor_dashboard.php" style="color: #888; text-decoration: none; font-size: 13px;">Cancel</a>
    </div>
</body>
</html>