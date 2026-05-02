<?php
session_start();
include "db_conn.php";

// 1. SESSION CHECK: Ensures only the logged-in patient can access this
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['id'];
$patient_name = $_SESSION['name'];

// 2. FETCH PERSONAL APPOINTMENTS: Shows only this patient's visits
$appt_sql = "SELECT * FROM appointments WHERE patient_id = '$patient_id' ORDER BY appointment_date DESC";
$appt_result = mysqli_query($conn, $appt_sql);

// 3. FETCH MEDICAL RECORDS: Retrieves the clinical history for this user
// Note: Ensure you have created the 'medical_records' table in phpMyAdmin first.
$record_sql = "SELECT * FROM medical_records WHERE patient_id = '$patient_id' ORDER BY record_date DESC";
$record_result = mysqli_query($conn, $record_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MedPrime | My Patient Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Professional Dark Theme Layout */
        .main-content {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr; /* Sidebar for Appts, Wide for Records */
            gap: 25px;
        }

        .card {
            background: #1a1b21;
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .card h2 {
            font-size: 20px;
            color: #00f2ff; /* Signature Cyan */
            margin-bottom: 25px;
            letter-spacing: -0.5px;
        }

        /* Medical Record Item Styling */
        .record-entry {
            background: rgba(255, 255, 255, 0.02);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            border-left: 4px solid #7000ff; /* Purple accent */
        }

        .record-date {
            font-size: 12px;
            opacity: 0.5;
            text-transform: uppercase;
        }

        .diagnosis-title {
            font-size: 17px;
            font-weight: 600;
            margin: 5px 0;
            color: #ffffff;
        }

        .prescription-box {
            margin-top: 10px;
            padding: 10px;
            background: rgba(112, 0, 255, 0.1);
            border-radius: 8px;
            font-size: 14px;
            color: #b380ff;
        }

        .btn-new {
            display: inline-block;
            background: #00f2ff;
            color: #000;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="dashboard-header">
        <h1 style="color:white; font-size: 28px;">Welcome back, <span style="color:#00f2ff;"><?php echo htmlspecialchars($patient_name); ?></span></h1>
        <a href="logout.php" style="color: #ff4b4b; text-decoration: none; font-weight: 500;">Logout</a>
    </div>

    <div class="dashboard-grid">
        
        <div class="card">
            <h2>Upcoming Visits</h2>
            <?php if(mysqli_num_rows($appt_result) > 0): ?>
                <?php while($appt = mysqli_fetch_assoc($appt_result)): ?>
                    <div style="border-bottom: 1px solid rgba(255,255,255,0.05); padding: 10px 0;">
                        <div style="font-weight:bold;"><?php echo date("D, M d", strtotime($appt['appointment_date'])); ?></div>
                        <small style="color: #00f2ff;">Status: <?php echo htmlspecialchars($appt['status']); ?></small>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="opacity:0.5;">No scheduled appointments.</p>
            <?php endif; ?>
            <a href="book_appointment.php" class="btn-new">Book Appointment</a>
        </div>

        <div class="card">
            <h2>Medical History & Records</h2>
            <?php if(mysqli_num_rows($record_result) > 0): ?>
                <?php while($record = mysqli_fetch_assoc($record_result)): ?>
                    <div class="record-entry">
                        <div class="record-date"><?php echo date("F d, Y", strtotime($record['record_date'])); ?></div>
                        <div class="diagnosis-title"><?php echo htmlspecialchars($record['diagnosis']); ?></div>
                        <p style="font-size: 14px; opacity: 0.8;"><?php echo htmlspecialchars($record['treatment']); ?></p>
                        
                        <div class="prescription-box">
                            <strong>Prescription:</strong> <?php echo htmlspecialchars($record['prescription']); ?>
                        </div>
                        <div style="margin-top:10px; font-size:12px; opacity:0.5;">
                            Doctor: <?php echo htmlspecialchars($record['doctor_name']); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; opacity: 0.3;">
                    <p>No medical records found.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

</body>
</html>