<?php
include 'auth.php';
$posts = json_decode(file_get_contents("data.json"), true);

$posts[] = [
    "author" => $_POST["author"],
    "content" => $_POST["content"], // NO SANITIZATION — Stored XSS!
    "date" => date("Y-m-d H:i")
];

file_put_contents("data.json", json_encode($posts, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
