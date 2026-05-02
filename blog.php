<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog | MedPrime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="padding: 40px;">

<div class="container">
    <nav>
        <a href="index.php" class="brand">Med<span>Prime</span></a>
        <a href="create_post.php" class="btn-action" style="background: var(--primary-cyan); color: #000;">+ New Post</a>
    </nav>

    <h1 style="margin-bottom: 40px;">Health & <span style="color: var(--primary-cyan);">Insights</span></h1>

    <?php
    $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="glass-panel" style="margin-bottom: 30px; padding: 25px;">
                <span class="badge-pending" style="margin-bottom: 10px; display: inline-block;">
                    <?php echo $row['category']; ?>
                </span>
                <h2 style="margin-bottom: 10px;"><?php echo $row['title']; ?></h2>
                <p style="opacity: 0.7; font-size: 14px; margin-bottom: 15px;">
                    By <?php echo $row['author']; ?> | <?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                </p>
                <p style="line-height: 1.6; opacity: 0.9;">
                    <?php echo nl2br(substr($row['content'], 0, 300)); ?>...
                </p>
                <a href="view_post.php?id=<?php echo $row['id']; ?>" style="color: var(--primary-cyan); text-decoration: none; display: inline-block; margin-top: 15px; font-weight: bold;">Read More →</a>
            </div>
        <?php }
    } else {
        echo "<p style='opacity: 0.5;'>No articles published yet.</p>";
    }
    ?>
</div>

</body>
</html>