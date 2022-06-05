<?php 

session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}

include_once("../connect.php");

$payStmt = $conn->prepare("insert into payment(idClt,Total) values(?,?)");
$payStmt->execute([$_GET['idClt'],$_GET['Total']]);

$valStmt2 = $conn->prepare("update client set Total = 0 where idClt = {$_GET['idClt']}");
$valStmt2->execute();
$valtotal2 = $valStmt2->fetch(PDO::FETCH_ASSOC);


$stmt11 = $conn->prepare("DELETE FROM commande where idClt = {$_GET['idClt']} ");

$stmt11->execute();

header("Location: cart.php?idClt=" . $_GET['idClt']);

?>