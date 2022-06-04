<?php


session_start();

//$produit_id = $_SESSION['idProd'];

$products = implode(',',$_SESSION['idProd']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Shopping Cart</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style/css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="../style/cartcss/demo.css">

</head>

<body>

    <header class="intro">
        <h1>Shopping Cart</h1>

        <div class="action">
            <a href="index.php" class="btn back">Back to home page</a>
        </div>
    </header>


    <main>
        <!-- Start DEMO HTML (Use the following code into your project)-->
        <div class="container">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal" style="background-color: #1a6692;">
                View Cart
            </button>
        </div>

        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Your Shopping Cart
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-image">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price/Unit</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include_once("../connect.php");

                                $stmt11 = $conn->prepare("SELECT * FROM produit where id_prod in ({$products})");

                                $stmt11->execute();

                                $total = 0;

                                while ($ligne = $stmt11->fetch(PDO::FETCH_ASSOC)) {


                                ?>
                                    <tr>
                                        <td class="w-25">
                                            <?php echo "<img class='img-fluid img-thumbnail' src='../imgProducts/" .  $ligne['img_prod']  . "'" ?>
                                        </td>
                                        <td><?php echo "{$ligne['nom_prod']}" ?></td>
                                        <td><?php echo "{$ligne['prix_prod']}" ?>MAD</td>
                                       
                                       
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <!-- Set up a container element for the button -->
                        <div id="paypal-button-container"></div>

                        <!-- Include the PayPal JavaScript SDK -->
                        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

                        <script>
                            // Render the PayPal button into #paypal-button-container
                            paypal.Buttons({

                                // Set up the transaction
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: '<?php echo "{$cltTotal['Total']}"; ?>'
                                            }
                                        }]
                                    });
                                },

                                // Finalize the transaction
                                onApprove: function(data, actions) {
                                    return actions.order.capture().then(function(orderData) {
                                        // Successful capture! For demo purposes:
                                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                        var transaction = orderData.purchase_units[0].payments.captures[0];
                                        alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                                        // Replace the above to show a success message within this page, e.g.
                                        // const element = document.getElementById('paypal-button-container');
                                        // element.innerHTML = '';
                                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                        // Or go to another URL:  actions.redirect('thank_you.html');
                                    });
                                }


                            }).render('#paypal-button-container');
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial -->

        <!-- END EDMO HTML (Happy Coding!)-->
    </main>


    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src="../js/cartjs/script.js"></script>

</body>

</html>