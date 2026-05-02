<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "INSERT INTO blog_posts (title, author, category, content) 
            VALUES ('$title', '$author', '$category', '$content')";

    if (mysqli_query($conn, $sql)) {
        header("Location: blog.php?success=Post published successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>