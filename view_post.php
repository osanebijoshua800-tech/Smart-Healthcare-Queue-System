<?php 
include "db_conn.php"; 

// Check if an ID was actually sent in the URL
if (!isset($_GET['id'])) {
    header("Location: blog.php");
    exit();
}

$post_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM blog_posts WHERE id = '$post_id'";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

// If the post doesn't exist in the database
if (!$post) {
    echo "Post not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $post['title']; ?> | MedPrime Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding: 40px;">

<div class="container" style="max-width: 900px;">
    <nav>
        <a href="index.php" class="brand">Med<span>Prime</span></a>
        <a href="blog.php" style="color: var(--primary-cyan); text-decoration: none;">← Back to Blog</a>
    </nav>

    <div class="glass-panel" style="margin-top: 30px; padding: 40px;">
        <span class="badge-pending" style="margin-bottom: 20px; display: inline-block;">
            <?php echo $post['category']; ?>
        </span>
        
        <h1 style="font-size: 42px; margin-bottom: 15px; color: var(--primary-cyan);">
            <?php echo $post['title']; ?>
        </h1>
        
        <p style="opacity: 0.6; margin-bottom: 40px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 20px;">
            Published by <strong><?php echo $post['author']; ?></strong> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
        </p>

        <div style="line-height: 1.8; font-size: 18px; opacity: 0.9;">
            <?php echo nl2br($post['content']); ?>
        </div>
    </div>
</div>

</body>
</html>