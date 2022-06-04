<?php 

session_start();

if(empty($_SESSION['idProd'])){
    $_SESSION['idProd']=array();
}

array_push($_SESSION['idProd'],$_GET["idProd"]);
    
header("Location: cart.php");

//header("Location:" . $_SERVER['HTTP_REFERER']);

?>

