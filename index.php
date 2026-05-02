<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedPrime | Digital Healthcare Solutions</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5%;
        }
        .hero-content {
            text-align: center;
            max-width: 900px;
        }
        .hero-title {
            font-size: clamp(40px, 8vw, 72px);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            letter-spacing: -2px;
        }
        .hero-title span {
            background: linear-gradient(90deg, #00f2ff, #7000ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-bar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 5%;
            z-index: 100;
        }
        .nav-links {
            display: flex;
            gap: 30px;
        }
        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-weight: 500;
            opacity: 0.7;
            transition: 0.3s;
        }
        .nav-links a:hover { opacity: 1; color: var(--primary-cyan); }
    </style>
</head>
<body>

    <nav class="nav-bar">
        <div class="nav-links">
            <a href="about.php">About Us</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <a href="index.php" class="brand">Med<span>Prime</span></a>
        <div>
             <a href="login.php" class="btn-action" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">Patient Portal</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="glass-panel" style="padding: 60px; border-radius: 40px;">
                <h1 class="hero-title">Healthcare <span>Redefined</span> for the Digital Age.</h1>
                <p style="font-size: 18px; opacity: 0.7; margin-bottom: 40px; line-height: 1.6;">
                    MedPrime connects you with top-tier medical specialists, manages your records securely, 
                    and puts your health journey right at your fingertips.
                </p>
                
                <div style="display: flex; gap: 15px; justify-content: center;">
                    <a href="register.php" class="btn-action" style="padding: 20px 40px; font-size: 18px;">Get Started Now</a>
                    <a href="doctor_login.php" class="btn-action" style="padding: 20px 40px; font-size: 18px; background: #222; border: 1px solid #444;">Doctor Access</a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>