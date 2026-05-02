<?php 
session_start();
include "db_conn.php";

// Get the logged-in doctor's name
$current_doctor = isset($_SESSION['name']) ? $_SESSION['name'] : "Doctor";

// Fetch appointments for this doctor
$sql = "SELECT * FROM appointments WHERE doctor_name = '$current_doctor' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultation Queue | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding: 40px; background: #0a0b1e;">

    <div style="margin-bottom: 40px;">
        <h1 style="color: var(--primary-cyan); text-transform: uppercase; letter-spacing: 2px;">Consultation Queue</h1>
        <p style="opacity: 0.6;">Welcome, <strong>Dr. <?php echo $current_doctor; ?></strong></p>
    </div>

    <div class="glass-panel" style="padding: 20px; border-radius: 20px;">
        <table style="width: 100%; border-collapse: collapse; color: white;">
            <thead>
                <tr style="text-align: left; opacity: 0.5; font-size: 12px; text-transform: uppercase;">
                    <th style="padding: 20px;">Doctor</th>
                    <th style="padding: 20px;">Patient Name</th>
                    <th style="padding: 20px;">Age</th>
                    <th style="padding: 20px;">Status</th>
                    <th style="padding: 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { 
                ?>
                <tr style="border-top: 1px solid rgba(255,255,255,0.05);">
                    <td style="padding: 20px; color: var(--primary-cyan); font-weight: 600;">
                        Dr. <?php echo $row['doctor_name']; ?>
                    </td>
                    <td style="padding: 20px; font-weight: bold;">
                        <?php echo $row['name']; ?> 
                    </td>
                    <td style="padding: 20px; opacity: 0.7;">
                        <?php echo $row['age']; ?> yrs
                    </td>
                    <td style="padding: 20px;">
                        <span style="background: rgba(0, 242, 255, 0.1); color: #00f2ff; padding: 6px 15px; border-radius: 6px; font-size: 11px;">
                            <?php echo $row['status']; ?>
                        </span>
                    </td>
                    <td style="padding: 20px;">
                        <a href="add_record.php?id=<?php echo $row['id']; ?>" class="btn-action" style="padding: 10px 20px; text-decoration: none; font-size: 12px;">
                            Treat Now
                        </a>
                    </td>
                </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='5' style='padding: 40px; text-align: center; opacity: 0.5;'>No patients in your queue.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>