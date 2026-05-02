<?php
session_start();
include "db_conn.php";

// Redirect if not logged in as a patient
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Fetch doctors for the dropdown
$doctor_sql = "SELECT id, doctor_name, specialty FROM doctors";
$doctors = mysqli_query($conn, $doctor_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; padding: 40px 0;">

    <div class="glass-panel" style="width: 100%; max-width: 500px; margin: 20px;">
        <nav style="margin-bottom: 30px;">
            <a href="dashboard.php" style="color: var(--primary-cyan); text-decoration: none; font-size: 14px; font-weight: 600;">
                ← Back to Dashboard
            </a>
        </nav>

        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: var(--primary-cyan); letter-spacing: 1px;">BOOK APPOINTMENT</h2>
            <p style="opacity: 0.6; font-size: 14px; margin-top: 8px;">Schedule your consultation with our specialists.</p>
        </div>

        <form action="booking_logic.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Choose a Specialist</label>
                <select name="doctor_id" required style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none; appearance: none;">
                    <option value="" disabled selected>Select a Doctor</option>
                    <?php while($doc = mysqli_fetch_assoc($doctors)) { ?>
                        <option value="<?php echo $doc['id']; ?>">
                            Dr. <?php echo $doc['doctor_name']; ?> (<?php echo $doc['specialty']; ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Preferred Date</label>
                <input type="date" name="appointment_date" required style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none; color-scheme: dark;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; font-size: 11px; opacity: 0.6; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Preferred Time</label>
                <input type="time" name="appointment_time" required style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.7); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none; color-scheme: dark;">
            </div>
            
            <button type="submit" class="btn-action" style="width: 100%; padding: 16px; font-size: 16px; border: none; cursor: pointer;">
                Confirm Appointment
            </button>
        </form>
    </div>

</body>
</html>