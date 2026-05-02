<?php
session_start();
include "db_conn.php";

// 1. Security Check: Only doctors should be here
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: doctor_login.php");
    exit();
}

// 2. Get Patient Info
if (isset($_GET['id'])) {
    $p_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT name FROM patients WHERE id = '$p_id'";
    $res = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($res);
    $patient_name = $patient ? $patient['name'] : "Unknown Patient";
} else {
    header("Location: doctor_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Medical Entry | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; padding: 40px 0;">

    <div class="glass-panel" style="width: 100%; max-width: 600px; margin: 20px;">
        <nav style="margin-bottom: 30px;">
            <a href="doctor_dashboard.php" style="color: var(--primary-cyan); text-decoration: none; font-size: 14px; font-weight: 600;">
                ← Back to Queue
            </a>
        </nav>

        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: var(--primary-cyan); letter-spacing: 1px;">NEW MEDICAL ENTRY</h2>
            <p style="opacity: 0.6; font-size: 14px; margin-top: 8px;">Recording consultation for: <strong><?php echo htmlspecialchars($patient_name); ?></strong></p>
        </div>

        <form action="save_record_logic.php" method="POST">
            <input type="hidden" name="patient_id" value="<?php echo $p_id; ?>">
            <input type="hidden" name="doctor_name" value="<?php echo $_SESSION['name']; ?>">

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Diagnosis / Findings</label>
                <input type="text" name="diagnosis" placeholder="What is the patient's condition?" required 
                       style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Treatment Provided</label>
                <textarea name="treatment" rows="4" placeholder="Describe the treatment or procedure..." required 
                          style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none; resize: none;"></textarea>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Prescription (Optional)</label>
                <input type="text" name="prescription" placeholder="Medications and dosage..." 
                       style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none;">
            </div>
            
            <button type="submit" class="btn-action" style="width: 100%; padding: 18px; font-size: 16px; border: none; cursor: pointer;">
                Save Medical Record
            </button>
        </form>
    </div>

</body>
</html>