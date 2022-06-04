<?php 
session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}
    include_once("../connect.php");

    $idProd= $_GET['did'];
    $idClt= $_GET['idClt'];
    $idCmd= $_GET['idCmd'];

    $stmt1 = $conn->prepare("update commande set quantity=quantity-1 where idCmd=$idCmd and quantity>=2");

    $stmt1->execute([$idClt, $idProd, 1]);

    $stmtQ = $conn->prepare("select * from commande where idCmd=$idCmd and idProd= $idProd");
    $stmtQ->execute();
    $q = $stmtQ->fetch(PDO::FETCH_ASSOC);

    $stmtprod = $conn->prepare("select * from produit where id_prod= {$idProd}");
    $stmtprod->execute();
    $valProd = $stmtprod->fetch(PDO::FETCH_ASSOC);

    $valStmt = $conn->prepare("update client set Total = Total - ( {$valProd['prix_prod']}) where Total>= Total-({$valProd['prix_prod']} * 2) and idClt = {$_GET['idClt']}");
    $valStmt->execute();
    $valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);
    
    header("Location: cart.php?idClt=$idClt");

?>