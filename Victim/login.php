<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";

    // In a real site you check database, but here we accept any username.
    $_SESSION["user"] = $username;

    // Set session cookie manually (NOT HttpOnly for XSS demo)
    setcookie("session_user", $username, time() + 3600, "/");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>

<div class="container">
    <h1>Login</h1>

    <form method="POST">
        <input class="input" type="text" name="username" id = "username" placeholder="Your username">
        <button class="btn" id="loginbtn" onclick="login()">Login</button>
    </form>

    <div class="card">
        <div id="welcome-box">

        </div>
    </div>

</div>

</body>
</html>
