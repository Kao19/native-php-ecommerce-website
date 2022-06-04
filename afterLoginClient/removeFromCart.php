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


    

    $stmtQ = $conn->prepare("select * from commande where idCmd=$idCmd and idProd= $idProd");
    $stmtQ->execute();
    $q = $stmtQ->fetch(PDO::FETCH_ASSOC);

    $stmtprod = $conn->prepare("select * from produit where id_prod= {$idProd}");
    $stmtprod->execute();
    $valProd = $stmtprod->fetch(PDO::FETCH_ASSOC);

    $valStmt = $conn->prepare("update client set Total = Total - ( {$valProd['prix_prod']} * {$q['quantity']}) where idClt = {$_GET['idClt']}");
    $valStmt->execute();
    $valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);


    $stmt1 = $conn->prepare("delete from commande where idCmd=$idCmd");

    $stmt1->execute([$idClt, $idProd, 1]);

    
    header("Location: cart.php?idClt=$idClt");

?>

