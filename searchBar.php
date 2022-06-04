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
    <link href="./style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./style/assets/css/fontawesome.css">
    <link rel="stylesheet" href="./style/mycss.css">
    <link rel="stylesheet" href="./style/assets/css/owl.css">

</head>

<body>

    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Products Found</h2>
                        <?php echo "<a href='". $_SERVER['HTTP_REFERER']."'>return <i class='fa fa-angle-right'></i></a>" ?>
                    </div>
                </div>



                <?php
                include_once("connect.php");
                if (isset($_POST["submit"])) {
                    $str = $_POST["search"];

                    $sth = $conn->prepare("SELECT * FROM produit WHERE nom_prod like '%$str%'");

                    $sth->execute();

                    while ($ligne = $sth->fetch(PDO::FETCH_ASSOC)) {

                ?>
                        <div class="col-md-4">
                            <div class="product-item">

                                <a href="#"><?php echo "<img width='300' height='300' src='imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                                    </a>
                                    <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                                    <p><?php echo "{$ligne['desc_prod']}" ?></p>


                                </div>
                            </div>
                        </div>
                <?php
                    }
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

                            - Design: <a rel="" href="index.php" target="_blank">itShop</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="./style/vendor/jquery/jquery.min.js"></script>
    <script src="./style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="./style/assets/js/custom.js"></script>
    <script src="./style/assets/js/owl.js"></script>
    <script src="./style/assets/js/slick.js"></script>
    <script src="./style/assets/js/isotope.js"></script>
    <script src="./style/assets/js/accordions.js"></script>


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