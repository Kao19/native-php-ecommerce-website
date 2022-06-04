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
    <title>update product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../style/css/style.css">
</head>

<body>

    <?php


    include_once("../connect.php");

    $idp = $_GET['did'];

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id_prod=$idp");

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    ?>

    <section class="ftco-section">
        <div class="container">
            <form action="update.php" method="GET" id="contactForm" name="contactForm" class="contactForm">

                <input type="hidden" name="id" value="<?php echo $_GET['did']; ?>" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="n">nom produit</label>
                            <input type="text" class="form-control" name="np" required id="n" value="<?php echo $row["nom_prod"] ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="desc">description Produit</label>
                            <input type="text" name="dp" class="form-control" required id="desc" value="<?php echo $row["desc_prod"] ?>"><br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="prix">prix Produit</label>
                            <input type="text" class="form-control" name="pp" required id="prix" value="<?php echo $row["prix_prod"] ?>"><br>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            <div class="submitting"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php

    if (!empty($_GET["np"]) && !empty($_GET["dp"]) && !empty($_GET["pp"])) {

        $id =  $_GET['id'];
        $np =  $_GET['np'];
        $dp =  $_GET['dp'];
        $pp =  $_GET['pp'];

        $sql = $conn->query("UPDATE produit SET nom_prod = '" . $np . "' , desc_prod = '" . $dp . "' , prix_prod = '" . $pp . "'  WHERE id_prod = '" . $id . "'");
        if ($sql) {
            header("Location: adminPage.php");
        } else {
            echo "err";
        }
    }



    ?>


</body>

</html>