<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center;">

    <div class="glass-panel" style="width: 100%; max-width: 400px; margin: 20px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <a href="index.php" class="brand" style="font-size: 32px;">Med<span>Prime</span></a>
            <p style="opacity: 0.6; margin-top: 10px; font-size: 14px;">Welcome back! Please login to your account.</p>
        </div>

        <?php if (isset($_GET['error'])) { ?>
            <p style="color: #ff4b4b; background: rgba(255,75,75,0.1); padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-size: 14px;">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </p>
        <?php } ?>

        <form action="login_logic.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12px; opacity: 0.7; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Phone Number</label>
                <input type="text" name="phone" placeholder="e.g. 08123456789" style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.5); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none;" required>
            </div>
            
            <div style="margin-bottom: 30px;">
                <label style="display: block; font-size: 12px; opacity: 0.7; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Password</label>
                <input type="password" name="password" placeholder="••••••••" style="width: 100%; padding: 14px; background: rgba(10, 11, 30, 0.5); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 10px; outline: none;" required>
            </div>
            
            <button type="submit" class="btn-cyan" style="width: 100%; padding: 15px; font-size: 16px;">Secure Login</button>
        </form>

        <div style="text-align: center; margin-top: 25px; font-size: 14px;">
            <span style="opacity: 0.6;">Don't have an account?</span> 
            <a href="register.php" style="color: #00f2ff; text-decoration: none; font-weight: bold; margin-left: 5px;">Register here</a>
        </div>
    </div>

</body>
</html>