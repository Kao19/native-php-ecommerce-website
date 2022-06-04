<?php
 
include_once("../connect.php");

$dataPoints = array();

$stmt = $conn->prepare('SELECT category_prod,count(idProd) FROM commande,produit where id_prod=idProd group by idProd');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    array_push($dataPoints, array("label" => $row['category_prod'], "y" => $row['count(idProd)']));
}
 
?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Order Fulfillment"
                },
                data: [{
                    type: "pyramid",
                    indexLabel: "{label} - {y}",
                    yValueFormatString: "#,##0",
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