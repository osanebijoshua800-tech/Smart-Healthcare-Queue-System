<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Blog Post | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding: 40px;">

    <div class="container" style="max-width: 800px;">
        <nav>
            <a href="index.php" class="brand">Med<span>Prime</span></a>
            <a href="blog.php" style="color: #00f2ff; text-decoration: none;">View Blog</a>
        </nav>

        <h2 style="color: var(--primary-cyan); margin-bottom: 30px;">PUBLISH NEW ARTICLE</h2>

        <form action="save_post_logic.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:8px; opacity:0.6;">Article Title</label>
                <input type="text" name="title" placeholder="e.g. 5 Tips for a Healthy Heart" required 
                       style="width:100%; padding:15px; background:rgba(10,11,30,0.5); border:1px solid #333; border-radius:8px; color:white;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display:block; margin-bottom:8px; opacity:0.6;">Category</label>
                    <select name="category" style="width:100%; padding:15px; background:rgba(10,11,30,0.5); border:1px solid #333; border-radius:8px; color:white;">
                        <option value="Health Tips">Health Tips</option>
                        <option value="Hospital News">Hospital News</option>
                        <option value="Medical Research">Medical Research</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; opacity:0.6;">Author Name</label>
                    <input type="text" name="author" placeholder="Dr. Joshua" required 
                           style="width:100%; padding:15px; background:rgba(10,11,30,0.5); border:1px solid #333; border-radius:8px; color:white;">
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display:block; margin-bottom:8px; opacity:0.6;">Content</label>
                <textarea name="content" rows="10" placeholder="Write your article here..." required 
                          style="width:100%; padding:15px; background:rgba(10,11,30,0.5); border:1px solid #333; border-radius:8px; color:white; line-height: 1.6;"></textarea>
            </div>

            <button type="submit" class="btn-action" style="width: 100%; padding: 18px; font-size: 16px;">Publish to MedPrime Blog</button>
        </form>
    </div>

</body>
</html>