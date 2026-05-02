<?php
include "db_conn.php";

// Fetch the 'Current' patient for each doctor
$sql = "SELECT doctor_name, MIN(queue_number) as current_ticket 
        FROM appointments 
        WHERE status = 'Pending' 
        GROUP BY doctor_name";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Hospital Queue | Momentum Health</title>
    <link rel="stylesheet" href="style.css?v=2">
    <meta http-equiv="refresh" content="10">
    <style>
        body { 
            display: block; 
            padding-top: 50px;
            text-align: center;
        }
        .display-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            padding: 50px 20px;
            border-radius: 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            animation: pulse 2s infinite;
        }
        .ticket-number {
            font-size: 110px;
            font-weight: 800;
            margin: 15px 0;
            color: var(--primary-neon);
            text-shadow: 0 0 30px rgba(0, 242, 255, 0.5);
        }
        .doctor-label {
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(255, 255, 255, 0.6);
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <h1 style="font-size: 60px; letter-spacing: -2px;">NOW SERVING</h1>
    
    <div class="display-grid">
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <div class="doctor-label"><?php echo $row['doctor_name']; ?></div>
                <div class="ticket-number">#<?php echo $row['current_ticket']; ?></div>
                <div style="color: var(--primary-neon); font-size: 18px; font-weight: 600; text-transform: uppercase;">Proceed to Room</div>
            </div>
        <?php } 
        } else {
            echo "<div class='container'><h2>No active patients at the moment.</h2></div>";
        } ?>
    </div>

    <div style="margin-top: 60px; opacity: 0.4; font-size: 14px; letter-spacing: 1px;">
        LIVE UPDATES EVERY 10 SECONDS
    </div>
</body>
</html>