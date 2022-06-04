<?php 

session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}

include_once("../connect.php");

$valStmt = $conn->prepare("update client set Total = Total - (Total * 0.15) where idClt = {$_GET['idClt']}");
$valStmt->execute();
$valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);


header('Location: cart.php?idClt=' . $_GET['idClt']);

?>