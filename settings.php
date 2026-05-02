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
    <title>Account Settings | MedPrime</title>
    <link rel="stylesheet" href="style.css?v=15">
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

        .settings-grid {
            max-width: 800px;
            display: grid;
            gap: 30px;
        }

        .settings-section {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 30px;
            border-radius: 24px;
        }

        .settings-section h3 {
            margin-top: 0;
            color: var(--primary-neon);
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-size: 12px;
            opacity: 0.5;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            padding: 12px;
            border-radius: 10px;
            color: white;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-neon);
        }

        .save-btn {
            background: linear-gradient(90deg, #00f2ff, #7000ff);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .save-btn:hover {
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.4);
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
        <a href="records.php">Medical Records</a>
        <a href="settings.php" class="active">Settings</a>
        <a href="logout.php" style="color: #ff4b4b; margin-top: auto;">Log Out</a>
    </div>

    <div class="main-content">
        <h1>Account Settings</h1>

        <div class="settings-grid">
            <form action="update_settings.php" method="POST" class="settings-section">
                <h3>Personal Information</h3>
                <div class="form-row">
                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($user_name); ?>">
                    </div>
                    <div class="input-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="080XXXXXXXX">
                    </div>
                </div>
                <button type="submit" class="save-btn">Update Profile</button>
            </form>

            <form action="change_password.php" method="POST" class="settings-section">
                <h3>Security & Password</h3>
                <div class="input-group" style="margin-bottom: 20px;">
                    <label>Current Password</label>
                    <input type="password" name="old_password">
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label>New Password</label>
                        <input type="password" name="new_password">
                    </div>
                    <div class="input-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirm_password">
                    </div>
                </div>
                <button type="submit" class="save-btn" style="background: rgba(255,255,255,0.1); border: 1px solid var(--glass-border);">Change Password</button>
            </form>
        </div>
    </div>

</body>
</html>