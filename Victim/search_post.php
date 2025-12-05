<?php
include 'auth.php';
$posts = json_decode(file_get_contents("data.json"), true);
$query = $_GET['query'] ?? '';
$results = array_filter($posts, function ($post) use ($query) {
    return stripos($post['content'], $query) !== false;
})
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title><?= $query ?></title>
</head>
<body>
    <div id="welcome-box" class="card">
        <form action="search_post.php" method="GET">
        <input class="input" type="text" name="query" placeholder="Search posts..." required>
        <button class="btn">Search</button>
    </form>

</div>
<div class="container">
<h1>Search Results for "<?= $query ?>"</h1>
    <?php

    foreach (array_reverse($results) as $post): ?>
    
        <div class="card">
            <h3><?= $post["author"] ?></h3>
            <p><?= $post["content"] ?></p>
            <small><?= $post["date"] ?></small>
        </div>

    <?php endforeach; ?>
</div>
</body>
</html>