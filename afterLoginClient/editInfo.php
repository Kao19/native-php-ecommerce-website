<?php 
    session_start();
    if (!isset($_SESSION["logclt"])) {
        header('Location: ../index/LoginClient.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>update info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../style/css/style.css">
    <style>
        body{
            background-color: #383838;
        }
    </style>
</head>

<body>

    <?php


    include_once("../connect.php");

    $idClt = $_GET['idClt'];

    $stmt = $conn->prepare("SELECT * FROM client WHERE idClt=$idClt");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    ?>

    <section class="ftco-section">
        <div class="container">
            <form action="" method="GET" id="contactForm" name="contactForm" class="contactForm">

                <input type="hidden" name="id" value="<?php echo $_GET['idClt']; ?>" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pnclt">First Name</label>
                            <input type="text" class="form-control" name="pnclt" required id="pnclt" value="<?php echo $row["prenomClt"] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="nclt">Last Name</label>
                            <input type="text" name="nclt" class="form-control" required id="nclt" value="<?php echo $row["nomClt"] ?>"><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="eclt">email</label>
                            <input type="text" class="form-control" name="eclt" required id="eclt" value="<?php echo $row["emailClt"] ?>"><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="numclt">phone number</label>
                            <input type="text" class="form-control" name="numclt" required id="numclt" value="<?php echo $row["numClt"] ?>"><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="aclt">addresse</label>
                            <input type="text" class="form-control" name="aclt" required id="aclt" value="<?php echo $row["addresseClt"] ?>"><br>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="submit" style="background-color:gray ;">
                            <div class="submitting"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php

    if (!empty($_GET["nclt"]) && !empty($_GET["pnclt"]) && !empty($_GET["eclt"]) && !empty($_GET["numclt"]) && !empty($_GET["aclt"])) {

        $idClt = $_GET['id'];
        $nclt =  $_GET['nclt'];
        $pnclt =  $_GET['pnclt'];
        $eclt =  $_GET['eclt'];
        $numclt =  $_GET['numclt'];
        $aclt =  $_GET['aclt'];

        $sql = $conn->query("UPDATE client SET nomClt = '" . $nclt . "' , prenomClt = '" . $pnclt . "' , emailClt = '" . $eclt  . "' , numClt = '" . $numclt  . "' , addresseClt = '" . $aclt . "'  WHERE idClt = '" . $idClt . "'");
        if ($sql) {
            header("Location: indexToOrder.php?idClt=" .  $_GET['id']);
        } else {
            echo "err";
        }
    }



    ?>


</body>

</html>