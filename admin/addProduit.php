<?php
session_start();
if (!isset($_SESSION["logAdmin"])) {
    header('Location: LoginAdmin.php');
    exit;
}
?>

<html>

<head>
    <title>add product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: black;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #1a6692;
        }

        div {
            margin-top: 170px;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

</head>

<body style="background-color: black;">


    <div>
        <form action="" method="POST" enctype="multipart/form-data" id="contactForm" name="contactForm" class="contactForm">

            <input type="text" class="form-control" required name="name" id="name" placeholder="product name">


            <input type="text" class="form-control" required name="desc" id="desc" placeholder="description">

            <input type="text" class="form-control" required name="prix" id="prix" placeholder="price">

            <label for="cat">category:</label>
            <select name="cat" id="cat">
                <option value="">--- Choose a category ---</option>
                <option value="RAM">RAM</option>
                <option value="DISK">DISK</option>
                <option value="CABLE">CABLE</option>
                <option value="GRAPHIC">GRAPHIC</option>
                <option value="ARDUINO KIT">ARDUINO KIT</option>
            </select>

            Select Image File to add:
            <input type="file" name="image" required>

            <input type="submit" name="submit" value="Add produit" class="btn btn-primary">
        </form>
    </div>



    <?php

    include_once("../connect.php");

    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $np = $_POST['name'];
        $dp = $_POST['desc'];
        $pp = $_POST['prix'];
        $cat = $_POST['cat'];

        $stmt1 = $conn->prepare("insert into produit(nom_prod,desc_prod,prix_prod,img_prod,category_prod) values(?,?,?,?,?)");

        $stmt1->execute([$np, $dp, $pp, $file_name, $cat]);

        move_uploaded_file($file_tmp, "../imgProducts/" . $file_name);

        header("Location: adminPage.php");
    }
    ?>
    </div>

    </form>
    </div>
    </section>

</body>

</html>