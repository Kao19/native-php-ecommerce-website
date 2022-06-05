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

        div {
            position: absolute;
            top: 40%;
            left: 40%;
        }

        body,
        html {
            height: 100%;
        }

        body {
            background: url(../imgProducts/adminBG.jpg);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <br><br>
    <h1 style="margin: auto; width:24%;">Welcome admin!</h1>

    <div>
        <button class="button" style="vertical-align:middle"><span><a href="ListeProd.php" style="text-decoration: none; color:#f2f2f2;"> Liste of products </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="addProduit.php" style="text-decoration: none; color:#f2f2f2;"> Add new Product </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="consultMSG.php" style="text-decoration: none; color:#f2f2f2;"> Consult messages </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="dashboardCltCmd.php" style="text-decoration: none; color:#f2f2f2;"> statistics of commands </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="dashboardProd.php" style="text-decoration: none; color:#f2f2f2;"> statistics of products </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="dashbordArea.php" style="text-decoration: none; color:#f2f2f2;"> payments </a></span></button>
        <br><br>
        <button class="button" style="vertical-align:middle"><span><a href="logoutAdmin.php" style="text-decoration: none; color:#f2f2f2;"> Logout </a></span></button>
        <br><br>

    </div>

</body>

</html>