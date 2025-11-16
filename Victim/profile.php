<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>User Profile</h1>

    <?php
        // REFLECTED XSS — prints user input directly
        $user = $_GET["user"] ?? "Guest";
    ?>

    <div class="card">
        <h2><?= $user ?></h2>
        <p>This is the profile of <?= $user ?>.</p>
    </div>

    <a href="index.php">⬅ Back</a>
</div>

</body>
</html>
