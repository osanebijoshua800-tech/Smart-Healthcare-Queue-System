<?php
session_start();
include "db_conn.php";

// 1. Security: Ensure a patient is logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$p_id = $_SESSION['patient_id'];

// 2. Fetch records and the name of the doctor who wrote them
$sql = "SELECT medical_records.*, doctors.name as doc_name 
        FROM medical_records 
        JOIN doctors ON medical_records.doctor_id = doctors.id 
        WHERE medical_records.patient_id = '$p_id' 
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Medical History | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #0b0c10; color: white; padding: 40px; font-family: sans-serif;">

    <div style="max-width: 900px; margin: 0 auto;">
        <header style="margin-bottom: 40px; display: flex; justify-content: space-between; align-items: center;">
            <h1>My <span style="color: #7000ff;">Medical Records</span></h1>
            <a href="patient_dashboard.php" style="color: #00f2ff; text-decoration: none;">← Dashboard</a>
        </header>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div style="background: rgba(255,255,255,0.05); padding: 30px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); margin-bottom: 25px;">
                    <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #333; padding-bottom: 15px; margin-bottom: 20px;">
                        <div>
                            <span style="opacity: 0.5; font-size: 12px; text-transform: uppercase;">Doctor</span>
                            <h3 style="margin: 5px 0; color: #7000ff;"><?php echo htmlspecialchars($row['doc_name']); ?></h3>
                        </div>
                        <div style="text-align: right;">
                            <span style="opacity: 0.5; font-size: 12px; text-transform: uppercase;">Date</span>
                            <p style="margin: 5px 0; font-weight: bold;"><?php echo date("F j, Y", strtotime($row['created_at'])); ?></p>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <h4 style="color: #00f2ff; margin-bottom: 10px;">Diagnosis & Notes</h4>
                        <p style="line-height: 1.6; opacity: 0.9;"><?php echo nl2br(htmlspecialchars($row['diagnosis'])); ?></p>
                    </div>

                    <div style="background: rgba(112, 0, 255, 0.05); padding: 20px; border-radius: 10px; border-left: 4px solid #7000ff;">
                        <h4 style="margin-top: 0; color: #7000ff;">Prescription</h4>
                        <p style="margin-bottom: 0; font-style: italic;"><?php echo nl2br(htmlspecialchars($row['prescription'])); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 100px; opacity: 0.3;">
                <p>You don't have any medical records yet.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>