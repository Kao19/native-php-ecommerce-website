<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste products</title>
    <style>
        #prods {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #prods td,
        #prods th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #prods tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #prods tr:hover {
            background-color: #ddd;
        }

        #prods th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: black;
            color: white;
        }


        .button {
            background-color: black;
            color: #FFFFFF;
            text-align: center;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }


        .button {
            background-color: black;
            color: #FFFFFF;
            text-align: center;
            width: 200px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>

<body>

<br><br>

    <?php

    include_once("../connect.php");

    $stmt = $conn->prepare("SELECT * FROM produit order by id_prod desc");

    $stmt->execute();

    echo "<table id='prods'>";
    echo "<tr><th>id_prod</th>" . "<th>nom_prod</th>" . "<th>img_prod</th>" . "<th>desc_prod</th>" . "<th>prix_prod</th>" . "<th>stock (0=> out of stock)</th>" . "<th>modifier_prod</th></tr>";
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr><td>{$ligne['id_prod']}</td>" .  "<td>{$ligne['nom_prod']}</td>" . "<td> <img src='../imgProducts/" .  $ligne['img_prod']  . "' width=50px; height=50px;'/>    </td>" . "<td>{$ligne['desc_prod']}</td>" . "<td>{$ligne['prix_prod']}</td>" .  "<td>{$ligne['stock']}</td>" . "<td><button style='background-color: red;' ><a href='delete.php?did=" . $ligne['id_prod'] . "' style='text-decoration: none;'>out of stock</a></button><button style='background-color: greenyellow;'><a href='update.php?did=" . $ligne['id_prod'] . "' style='text-decoration: none;'>update</a></button></td></tr>";
    }
    echo "</table>";

    ?>
</body>

</html>