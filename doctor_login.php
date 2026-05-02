<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Portal | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;">

    <div class="glass-panel" style="width: 400px;">
        <h2 style="text-align: center; color: #00f2ff; margin-bottom: 30px;">DOCTOR PORTAL</h2>
        
        <?php if (isset($_GET['error'])) { ?>
            <p style="color: #ff4b4b; background: rgba(255,75,75,0.1); padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>

        <form action="doctor_login_logic.php" method="POST">
            <label style="font-size: 12px; opacity: 0.7;">Official Email</label>
            <input type="email" name="email" style="width: 100%; padding: 12px; margin: 8px 0 20px 0; background: #0a0b1e; border: 1px solid #333; color: white; border-radius: 8px;" required>
            
            <label style="font-size: 12px; opacity: 0.7;">Access Password</label>
            <input type="password" name="password" style="width: 100%; padding: 12px; margin: 8px 0 30px 0; background: #0a0b1e; border: 1px solid #333; color: white; border-radius: 8px;" required>
            
            <button type="submit" class="btn-purple" style="width: 100%;">Authorize Login</button>
        </form>
    </div>

</body>
</html>