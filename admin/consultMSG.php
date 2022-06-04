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
    <title>admin page</title>
    <style>
        #msgs {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #msgs td,
        #msgs th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #msgs tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #msgs tr:hover {
            background-color: #ddd;
        }

        #msgs th {
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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
</head>

<body>

    <h1 style="margin: auto; width:30%;">newly messages</h1>

    <button class="button" style="vertical-align:middle"><span><a href="adminPage.php" style="text-decoration: none; color:#f2f2f2;"> back to admin page </a></span></button><br><br>


    <?php

    include_once("../connect.php");

    $stmt = $conn->prepare("SELECT * FROM clientmessages ORDER by idClt desc");

    $stmt->execute();

    echo "<table id='msgs'>";
    echo "<tr><th>Client</th>" . "<th>email</th>" . "<th>subject</th>" . "<th>message</th>" . "<th>response</th>";
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "<tr><td>{$ligne['nomClt']}</td>" .  "<td>{$ligne['email']}</td>" . "<td>{$ligne['subject']}</td>" . "<td>{$ligne['message']}</td>" . "<td><button style='background-color: yellow;' ><a style='text-decoration: none;' href='mailto:{$ligne['email']}'>send email to client</a></button><a style='text-decoration: none; margin-left:20px' href='deleteMSG.php?did=" . $ligne['idClt'] . "'><i class='fa fa-trash' aria-hidden='true' style='color: red;'></i></a></td></th>";
    }
    echo "</table>";

    ?>
</body>

</html>