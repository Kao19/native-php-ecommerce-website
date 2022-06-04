<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}

include_once("../connect.php");



$dataPoints = array();



$stmt = $conn->prepare('SELECT nomClt,prenomClt,commande.idClt, count(commande.idClt) FROM commande,produit,client where id_prod=idProd and commande.idClt=client.idClt GROUP by commande.idClt');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    array_push($dataPoints, array("x" => $row['idClt'], "y" => $row['count(commande.idClt)'], "prenom" => $row['prenomClt'] , "nom" =>$row['nomClt']));
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                axisX: {
                    title: "Clients",
                    interval: 1,
                },
                axisY: {
                    title: "Orders",
                    interval: 1,
                },
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "sells per client"
                },
                data: [{
                    indexLabel: "{nom} {prenom}",
                    type: "column", //change type to bar, line, area, pie, etc  
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>