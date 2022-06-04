<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>IT shop</title>

  <!-- Bootstrap core CSS -->
  <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../style/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../style/mycss.css">
  <link rel="stylesheet" href="../style/assets/css/owl.css">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2>IT <em>Shop</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <div class="icon" style="margin-top: 13px;">
                <a href="cart.php"><i class="fa fa-shopping-cart fa-lg" style="color: #3f60f3;"></i></a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="RegisterClient.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="LoginClient.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h2>Availabe products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters">
            <ul>
              <li data-filter=".des">All Products</li>
              <li data-filter=".dev">new products</li>
              <li data-filter=".ard">arduino kit</li>
              <li data-filter=".ram">RAM</li>
              <li data-filter=".gra">graphics</li>
              <li data-filter=".disk">disks</li>
              <li data-filter=".cables">cables</li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="filters-content">
            <div class="row grid">




              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 and category_prod='CABLE'");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all cables">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>


                    </div>
                  </div>
                </div>
              <?php } ?>






              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 and category_prod='DISK'");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all disk">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>


                    </div>
                  </div>
                </div>
              <?php } ?>





              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 and category_prod='GRAPHIC'");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all gra">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>








              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 and category_prod='RAM'");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all ram">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>








              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 and category_prod='ARDUINO KIT'");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all ard">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>








              <?php

              include_once("../connect.php");

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all des">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>


              <?php

              $stmt = $conn->prepare("SELECT * FROM produit where stock=1 order by id_prod desc LIMIT 5;");

              $stmt->execute();



              while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {

              ?>
                <div class="col-lg-4 col-md-4 all dev">
                  <div class="product-item">

                    <a href="#"><?php echo "<img width='300' height='300' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?></a>
                    <div class="down-content">
                      <a href="#">
                        <h4><?php echo "{$ligne['nom_prod']}" ?></h4>
                      </a>
                      <h6>MAD <?php echo "{$ligne['prix_prod']}" ?></h6>
                      <p><?php echo "{$ligne['desc_prod']}" ?></p>

                      <div class="icon">
                        <?php

                        echo "<a href='addToCart.php?idProd=" . $ligne['id_prod'] . "'><i class='fa fa-plus' aria-hidden='true'></i></a> add product to cart";

                        ?>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>



            </div>

          </div>
        </div>

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