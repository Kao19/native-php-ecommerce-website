<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}
    include_once("../connect.php");

    $delete_id = $_GET['did'];
    $stmt = $conn->prepare("delete from clientmessages where idClt = $delete_id");
    $stmt->execute();

    header("Location: consultMSG.php");
?>