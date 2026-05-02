<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'doctor') {
    header("Location: doctor_login.php");
    exit();
}

$sql = "SELECT appointments.*, patients.name, patients.age 
        FROM appointments 
        JOIN patients ON appointments.patient_id = patients.id 
        WHERE appointments.status = 'Pending' 
        ORDER BY appointment_date ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultation Queue | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <nav>
        <a href="#" class="brand">Med<span>Prime</span></a>
        <div>
            <span style="opacity: 0.7; margin-right: 15px;">Dr. <?php echo $_SESSION['name']; ?></span>
            <a href="logout.php" style="color: #ff4b4b; text-decoration: none; font-weight: 600;">Logout</a>
        </div>
    </nav>

    <h2 style="font-size: 32px; color: var(--primary-cyan); margin-bottom: 5px;">CONSULTATION QUEUE</h2>
    <p style="opacity: 0.5; margin-bottom: 40px;">Manage and treat your pending patient appointments.</p>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td style="font-weight: 700;"><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?> yrs</td>
                    <td><span class="badge-pending"><?php echo htmlspecialchars($row['status']); ?></span></td>
                    <td>
                        <a href="add_record.php?id=<?php echo $row['patient_id']; ?>" class="btn-action">Treat Now</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div style="text-align: center; padding: 60px; opacity: 0.4;">
            <h3>Queue is empty</h3>
            <p>All patients have been attended to.</p>
        </div>
    <?php } ?>
</div>

</body>
</html>