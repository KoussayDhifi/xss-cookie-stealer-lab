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
<div class="card">
        <form action="search_post.php" method="GET">
        <input class="input" type="text" name="query" placeholder="Search posts..." required>
        <button class="btn">Search</button>
    </form>

</div>
<script src="assets/script.js"></script>



<div class="container">

    <div id="welcome-box">
        <h2>Welcome, <?= $_SESSION['user'] ?>!</h2>
    </div>
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

<div class="notes-box" style="
    position: fixed;
    left: 20px;
    top: 300px;
    width: 300px;
    padding: 15px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
">
    <h3>Quick Notes</h3>

    <input id="note-input" class="input" type="text" placeholder="Write a note..." style="width: 80%; margin-bottom: 10px;">
    <button id="add-note-btn" class="btn" style="width: 100%;">Add</button>

    <p id="notes-list" style="margin-top: 15px; padding-left: 20px;"></p>
</div>

</body>
</html>
