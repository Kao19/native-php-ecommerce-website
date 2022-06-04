<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}


include_once("../connect.php");


if(isset($_GET['did'])) {
    $delete_id = $_GET['did'];
    $sql = $conn->query("update produit set stock=0 WHERE id_prod = $delete_id");
    if($sql) {
        header("Location: adminPage.php");
    } 
}



?>