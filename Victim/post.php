<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Create a Post</h1>

    <form action="save_post.php" method="POST">
        <input class="input" type="text" name="author" placeholder="Your name" required>
        <textarea class="input" name="content" placeholder="Write something..." required></textarea>
        <button class="btn">Publish</button>
    </form>

    <a href="index.php">⬅ Back</a>
</div>
</body>
</html>
