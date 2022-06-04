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

    $stmt1 = $conn->prepare("update commande set quantity=quantity+1 where idCmd=$idCmd and idClt=$idClt");

    $stmt1->execute([$idClt, $idProd, 1]);

    
    $stmtprod = $conn->prepare("select * from produit where id_prod= {$idProd}");
    $stmtprod->execute();
    $valProd = $stmtprod->fetch(PDO::FETCH_ASSOC);

    $valStmt = $conn->prepare("update client set Total = Total + ( {$valProd['prix_prod']}) where idClt = {$_GET['idClt']}");
    $valStmt->execute();
    $valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);

    header("Location: cart.php?idClt=$idClt");

?>