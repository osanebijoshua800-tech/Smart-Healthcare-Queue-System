<?php
include "db_conn.php";

// 1. Fetch today's appointments and join with patients to get their names
$today = date("Y-m-d");
$sql = "SELECT a.*, p.name AS patient_name 
        FROM appointments a 
        JOIN patients p ON a.patient_id = p.id 
        WHERE a.appointment_date = '$today' 
        ORDER BY a.queue_number ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Queue | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #0a0b10; color: white; font-family: sans-serif; padding: 40px;">

    <div style="max-width: 1000px; margin: auto; background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 30px;">
        <h2 style="color: #00f2ff; margin-bottom: 30px;">Live Queue</h2>
        
        <div style="display: flex; justify-content: space-between; padding: 15px 20px; background: rgba(0,242,255,0.05); border-radius: 10px; font-weight: bold; color: #00f2ff; font-size: 13px; text-transform: uppercase;">
            <div style="width: 10%;">Queue #</div>
            <div style="width: 25%;">Patient Name</div>
            <div style="width: 20%;">Doctor</div>
            <div style="width: 20%;">Date</div>
            <div style="width: 20%;">Action</div>
        </div>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                // 2. Map the doctor_id to a Name (The Fix)
                $doc_id = $row['doctor_id'];
                $doctor_name = "";

                if ($doc_id == 1) {
                    $doctor_name = "Dr. Okoro";
                } elseif ($doc_id == 2) {
                    $doctor_name = "Dr. Adebayo";
                } elseif ($doc_id == 3) {
                    $doctor_name = "Dr. Nwosu";
                } else {
                    // This shows if the ID is 0 or something else
                    $doctor_name = "Medical Officer"; 
                }

                // 3. Output the Row
                ?>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <div style="color: #00f2ff; font-weight: 800; width: 10%;">#<?php echo $row['queue_number']; ?></div>
                    <div style="width: 25%;"><?php echo htmlspecialchars($row['patient_name']); ?></div>
                    <div style="width: 20%; opacity: 0.8;"><?php echo $doctor_name; ?></div>
                    <div style="width: 20%; opacity: 0.5; font-size: 14px;"><?php echo $row['appointment_date']; ?></div>
                    <div style="width: 20%;">
                        <button style="background: #00f2ff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: bold; cursor: pointer; color: #000;">Add Note</button>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; padding: 40px; opacity: 0.5;'>No patients in the queue today.</p>";
        }
        ?>
    </div>

</body>
</html>