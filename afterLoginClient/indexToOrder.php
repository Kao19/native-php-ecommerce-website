<?php
session_start();
if (!isset($_SESSION["logclt"])) {
    header('Location: ../index/LoginClient.php');
    exit;
}

include_once("../connect.php");


$nameUser = $conn->prepare("SELECT nomClt, prenomClt FROM client where idClt=" . $_GET['idClt']);

$nameUser->execute();

$User = $nameUser->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>IT shop index</title>

    <!-- Bootstrap core CSS -->
    <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../style/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../style/mycss.css">
    <link rel="stylesheet" href="../style/assets/css/owl.css">

    <style>
        .item-01 {
            padding: 300px 0px;
            background-image: url(../style/assets/images/s3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .item-02 {
            padding: 300px 0px;
            background-image: url(../style/assets/images/si2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .item-03 {
            padding: 300px 0px;
            background-image: url(../style/assets/images/si3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>

</head>

<body>


    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo "indexToOrder.php?idClt=" . $_GET['idClt'] ?>">
                    <h2>It <em>shop</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo "indexToOrder.php?idClt=" . $_GET['idClt'] ?>">Home

                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left: 0px;">
                            <a class="nav-link" href="<?php echo "productsOrder.php?idClt=" . $_GET['idClt'] ?>">Our Products</a>
                        </li>
                        <li class="nav-item" style="margin-left: 0px;">
                            <a class="nav-link" href="<?php echo "aboutOfOrder.php?idClt=" . $_GET['idClt'] ?>">About Us</a>
                        </li>
                        <li class="nav-item" style="margin-left: 0px;">
                            <a class="nav-link" href="<?php echo "contactOfOrder.php?idClt=" . $_GET['idClt'] ?>">Contact Us</a>
                        </li>
                        <li class="nav-item" style="margin-left: 0px;">
                            <a class="nav-link" href="../index/logoutClt.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <div class="icon" style="margin-top: 13px;">
                                <a href="<?php echo "cart.php?idClt=" . $_GET['idClt'] ?>"><i class="fa fa-shopping-cart fa-lg" style="color: #3f60f3;"></i></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="icon" style="margin-top: 13px; margin-left: 0px;">
                                <a href="<?php echo "editInfo.php?idClt=" . $_GET['idClt'] ?>"><i class="fa fa-user fa-lg" style="color: #3f60f3;"></i></a><span class="nav-item" style="color: #3f60f3;"><?php echo "{$User['prenomClt']} {$User['nomClt']}" ?></span>
                            </div>
                        </li>
                        <li class="nav-item" style="margin-left: 0px;">
                            <form method="post" action="<?php echo "../searchBarOrder.php?idClt=" . $_GET['idClt'] ?>">
                                <div class="input-group">
                                    <div class="form-outline" style="width: 90px;">
                                        <input type="search" name="search" id="form1" class="form-control" width="10%;" placeholder="search" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        <i class="fa fa-search md"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div>
            <img class="mySlides" src="../style/assets/images/s3.jpg" style="width:100%; height:700px;">
            <img class="mySlides" src="../style/assets/images/si2.jpg" style="width:100%; height:700px;">
            <img class="mySlides" src="../style/assets/images/si3.jpg" style="width:100%; height:700px;">
        </div>

        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="<?php echo "productsOrder.php?idClt=" . $_GET['idClt'] ?>">view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                <?php

                include_once("../connect.php");

                $stmt = $conn->prepare("SELECT * FROM produit where stock=1 order by id_prod desc LIMIT 5;");

                $stmt->execute();



                while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <div class="col-md-4">
                        <div class="product-item">

                            <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                            <div class="down-content">
                                <a href="#">
                                    <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                                </a>
                                <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                                <p><?php echo "{$ligne['desc_prod']}" ?></p>
                                <div class="icon">
                                    <form action="crudCart.php" method="GET">
                                        <input type="text" hidden name="idClt" value="<?php echo $_GET['idClt'] ?>">
                                        <input type="text" hidden name="did" value="<?php echo $ligne['id_prod'] ?>">
                                        <input type="number" min="1" name="quant" value="1" placeholder="1">
                                        <input type="submit" value="+">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2022 IT shop

                            - Design: <a rel="" href="../index/index.php" target="_blank">itShop</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="../style/vendor/jquery/jquery.min.js"></script>
    <script src="../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../style/assets/js/custom.js"></script>
    <script src="../style/assets/js/owl.js"></script>
    <script src="../style/assets/js/slick.js"></script>
    <script src="../style/assets/js/isotope.js"></script>
    <script src="../style/assets/js/accordions.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>


</body>

</html>