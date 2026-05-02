<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding: 20px;">

    <nav style="display: flex; align-items: center; margin-bottom: 30px; padding: 10px 5%;">
        <a href="index.php" class="btn-cyan" style="text-decoration: none; padding: 10px 25px; border-radius: 8px; font-size: 14px; font-weight: 600;">
            ← Home
        </a>
    </nav>

    <div class="container" style="max-width: 900px; margin-top: 10px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 36px; color: var(--primary-cyan); letter-spacing: 1px;">GET IN TOUCH</h1>
            <p style="opacity: 0.6; margin-top: 10px;">Have questions? Our team is ready to assist you.</p>
        </div>

        <?php if (isset($_GET['success'])) { ?>
            <div style="background: rgba(0, 242, 255, 0.1); color: #00f2ff; padding: 15px; border-radius: 8px; margin-bottom: 25px; text-align: center; border: 1px solid rgba(0, 242, 255, 0.3);">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php } ?>

        <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 30px;">
            
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="glass-panel" style="padding: 25px;">
                    <h4 style="color: var(--primary-cyan); margin-bottom: 12px; font-size: 18px;">Our Location</h4>
                    <p style="font-size: 14px; opacity: 0.8; line-height: 1.6;">
                        123 Healthcare Way,<br>
                        Victoria Island, Lagos,<br>
                        Nigeria
                    </p>
                </div>
                
                <div class="glass-panel" style="padding: 25px;">
                    <h4 style="color: var(--primary-cyan); margin-bottom: 12px; font-size: 18px;">Direct Contact</h4>
                    <p style="font-size: 14px; opacity: 0.8;">Email: support@medprime.com</p>
                    <p style="font-size: 14px; opacity: 0.8; margin-top: 8px;">Phone: +234 800 MED PRIME</p>
                </div>
            </div>

            <div class="glass-panel" style="padding: 30px;">
                <form action="contact_logic.php" method="POST">
                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase;">Full Name</label>
                        <input type="text" name="name" required placeholder="Your Name" 
                               style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase;">Email Address</label>
                        <input type="email" name="email" required placeholder="email@example.com" 
                               style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none;">
                    </div>

                    <div style="margin-bottom: 25px;">
                        <label style="display:block; margin-bottom:8px; font-size:11px; opacity:0.6; text-transform: uppercase;">Message</label>
                        <textarea name="message" rows="5" required placeholder="How can we help you?" 
                                  style="width:100%; padding:14px; background: rgba(10, 11, 30, 0.7); border:1px solid rgba(255,255,255,0.1); border-radius:10px; color:white; outline: none; resize: none;"></textarea>
                    </div>

                    <button type="submit" class="btn-action" style="width:100%; padding: 18px; border: none; font-size: 16px; cursor: pointer;">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>