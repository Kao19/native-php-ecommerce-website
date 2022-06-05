<?php
 
include_once("../connect.php");

$dataPoints = array();

$stmt = $conn->prepare('SELECT payment.Total as total,nomClt,prenomClt FROM payment,client where client.idClt=payment.idClt group by payment.idClt');

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    array_push($dataPoints, array("label" => $row['nomClt'], "fn" => $row['prenomClt'], "y" => $row['total']));
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
                    text: "Payments"
                },
                data: [{
                    type: "pyramid",
                    indexLabel: "{label} {fn} - {y}",
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