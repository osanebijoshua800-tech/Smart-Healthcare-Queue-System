<?php
session_start();
// Security Check
if(!isset($_SESSION['patient_id'])){
    header("Location: login.php");
    exit();
}
$user_name = $_SESSION['patient_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Medical Records | MedPrime</title>
    <link rel="stylesheet" href="style.css?v=14">
    <style>
        :root {
            --primary-neon: #00f2ff;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            display: flex;
            background: #0a0b10;
            color: white;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: rgba(0, 0, 0, 0.3);
            border-right: 1px solid var(--glass-border);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar a {
            padding: 15px 20px;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s;
            font-size: 14px;
        }

        .sidebar a:hover, .sidebar a.active {
            background: var(--glass);
            color: var(--primary-neon);
            border: 1px solid var(--glass-border);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 60px;
            overflow-y: auto;
        }

        h1 {
            font-size: 2.2rem;
            background: linear-gradient(to right, #fff, var(--primary-neon));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px;
        }

        /* Records Table Style */
        .records-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
        }

        .records-table th {
            text-align: left;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-neon);
        }

        .records-table td {
            padding: 20px;
            border-bottom: 1px solid var(--glass-border);
            font-size: 14px;
            color: rgba(255,255,255,0.8);
        }

        .records-table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            background: rgba(0, 242, 255, 0.1);
            color: var(--primary-neon);
            border: 1px solid var(--primary-neon);
        }

        .download-link {
            color: white;
            text-decoration: none;
            opacity: 0.5;
            transition: 0.3s;
        }

        .download-link:hover {
            opacity: 1;
            color: var(--primary-neon);
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div style="display: flex; align-items: center; gap: 12px; padding-left: 10px; margin-bottom: 40px;">
            <svg width="32" height="32" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 50H30L40 20L60 80L70 50H90" stroke="#00f2ff" stroke-width="12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div style="font-weight: 900; font-size: 1.4rem; letter-spacing: -1px;">
                <span style="color: #00f2ff;">MED</span>PRIME
            </div>
        </div>

        <a href="dashboard.php">Dashboard</a>
        <a href="book_appointment.php">Book Appointment</a>
        <a href="records.php" class="active">Medical Records</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php" style="color: #ff4b4b; margin-top: auto;">Log Out</a>
    </div>

    <div class="main-content">
        <h1>Your Medical History</h1>

        <table class="records-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Diagnosis / Visit</th>
                    <th>Specialist</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Oct 24, 2025</td>
                    <td>Annual Checkup</td>
                    <td>Dr. Adebayo</td>
                    <td><span class="status-badge">COMPLETED</span></td>
                    <td><a href="#" class="download-link">View Report</a></td>
                </tr>
                <tr>
                    <td>Aug 12, 2025</td>
                    <td>Flu & Viral Infection</td>
                    <td>Dr. Ibrahim</td>
                    <td><span class="status-badge">COMPLETED</span></td>
                    <td><a href="#" class="download-link">View Report</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>