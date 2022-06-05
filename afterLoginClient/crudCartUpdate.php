<?php 
session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}
    include_once("../connect.php");

    $q=$_GET['quan'];
    $prix=$_GET['prix_prod'];
    $idCmd = $_GET['idCmd'];
    $idProd= $_GET['did'];
    $idClt= $_GET['idClt'];
    $quantity= $_GET['quant'];
    

    $valStmt = $conn->prepare("update client set Total = 0 where idClt = {$_GET['idClt']}");
    $valStmt->execute();
    $valtotal = $valStmt->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("update commande set idClt={$idClt}, idProd={$idProd}, quantity={$quantity}  where idCmd={$idCmd}");

    $stmt1->execute();



    $stmt11 = $conn->prepare("SELECT * FROM commande where idClt = {$_GET['idClt']} order by idCmd desc");

    $stmt11->execute();

            while ($ligne = $stmt11->fetch(PDO::FETCH_ASSOC)) {

                $stmtGetProd = $conn->prepare("select * from produit,commande where idProd=id_prod and id_prod = {$ligne['idProd']} and idClt = {$ligne['idClt']} ");

                $stmtGetProd->execute();

                $ligneProd = $stmtGetProd->fetch(PDO::FETCH_ASSOC);


                
                $valStmt2 = $conn->prepare("update client set Total = Total + {$ligneProd['prix_prod']} * {$ligneProd['quantity']} where idClt = {$_GET['idClt']}");
                $valStmt2->execute();
                $valtotal2 = $valStmt2->fetch(PDO::FETCH_ASSOC);

    
            }



    header("Location: cart.php?idClt=$idClt");


?>