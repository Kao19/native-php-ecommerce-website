<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}

 
include_once("../connect.php");

$dataPoints = array();

$stmt = $conn->prepare('SELECT nom_prod,count(idProd) FROM commande,produit where id_prod=idProd group by idProd');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    array_push($dataPoints, array("label" => $row['nom_prod'], "y" => $row['count(idProd)']));
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
                    text: "sells of products"
                },
               
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0\" orders\"",
                    indexLabel: "{label} ({y})",
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