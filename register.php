<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join MedPrime | Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px;">

    <div class="glass-panel" style="width: 100%; max-width: 500px; padding: 40px;">
        <div style="text-align: center; margin-bottom: 35px;">
            <h1 style="color: var(--primary-cyan); font-size: 32px; letter-spacing: 1px; text-transform: uppercase;">Join MedPrime</h1>
            <p style="opacity: 0.6; font-size: 14px; margin-top: 5px;">Create your secure patient profile</p>
        </div>

        <?php if (isset($_GET['error'])) { ?>
            <div style="background: rgba(255, 75, 75, 0.1); color: #ff4b4b; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-size: 13px; border: 1px solid rgba(255, 75, 75, 0.2);">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>

        <form action="signup_logic.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase; letter-spacing: 1px;">Full Name</label>
                <input type="text" name="name" required placeholder="John Doe" 
                       style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase; letter-spacing: 1px;">Age</label>
                <input type="number" name="age" required placeholder="Enter your age" 
                       style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase; letter-spacing: 1px;">Phone Number</label>
                <input type="text" name="phone" required placeholder="080..." 
                       style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase; letter-spacing: 1px;">Password</label>
                <input type="password" name="password" required placeholder="Min. 8 chars (A-z, 0-9, @)" 
                       style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
                <small style="display:block; margin-top:10px; font-size:10px; opacity:0.4; line-height: 1.4;">
                    Use uppercase, lowercase, numbers, and symbols for a secure account.
                </small>
            </div>

            <button type="submit" class="btn-action" style="width:100%; padding: 18px; border: none; font-size: 16px; font-weight: 600; cursor: pointer; border-radius: 12px;">
                Register Account
            </button>
        </form>

        <p style="text-align: center; margin-top: 30px; font-size: 14px; opacity: 0.6;">
            Already have an account? <a href="login.php" style="color: var(--primary-cyan); text-decoration: none; font-weight: 600;">Login here</a>
        </p>
    </div>

</body>
</html>