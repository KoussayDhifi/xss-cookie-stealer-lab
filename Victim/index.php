<?php
include 'auth.php';
$posts = json_decode(file_get_contents("data.json"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSSLab - Home</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div id="welcome-box" class="card"></div>
<script src="assets/script.js"></script>
<div class="container">
    <h1>Mini Social Network</h1>
    <a class="btn" href="post.php">Create a new post</a>

    <h2>Timeline</h2>
    <?php foreach(array_reverse($posts) as $post): ?>
        <div class="card">
            <h3><?= $post["author"] ?></h3>
            <!-- STORED XSS VULNERABILITY -->
            <p><?= $post["content"] ?></p>
            <small><?= $post["date"] ?></small>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
