<?php
session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <title>Memory Game</title>
</head>
<body style="background-color: blue;">
    <h1>Find the matchings and get a 15% discount</h1>
    <h3>Score:<spanv id='result'></span></h3>
    <div class="grid"></div>
</body>
</html>