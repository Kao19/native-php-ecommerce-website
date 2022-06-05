<?php 
session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}
    include_once("../connect.php");

    $idProd= $_GET['did'];
    $idClt= $_GET['idClt'];
    $quantity= $_GET['quant'];

    $stmt1 = $conn->prepare("insert into commande(idClt,idProd,quantity) values(?,?,?)");

    $stmt1->execute([$idClt, $idProd, $quantity]);

    $stmtprod = $conn->prepare("select * from produit where id_prod= {$idProd}");
    $stmtprod->execute();
    $valProd = $stmtprod->fetch(PDO::FETCH_ASSOC);

    $valStmt = $conn->prepare("update client set Total = Total + {$valProd['prix_prod']} * {$quantity} where idClt = {$_GET['idClt']}");
    $valStmt->execute();
    $valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);


    header("Location: cart.php?idClt=$idClt");


?>