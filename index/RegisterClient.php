<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<!--Stylesheet-->
<style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #080710;
    }

    .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    .shape:first-child {
        background: linear-gradient(#1845ad,
                #23a2f6);
        left: -80px;
        top: -80px;
    }

    .shape:last-child {
        background: linear-gradient(to right,
                #ff512f,
                #f09819);
        right: -30px;
        bottom: -80px;
    }

    form {
        height: 800px;
        width: 500px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 77%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    ::placeholder {
        color: #e5e5e5;
    }

    button,
    .lastInput {
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .social {
        margin-top: 30px;
        display: flex;
    }

    .social div {
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255, 255, 255, 0.27);
        color: #eaf0fb;
        text-align: center;
    }

    .social div:hover {
        background-color: rgba(255, 255, 255, 0.47);
    }

    .social .fb {
        margin-left: 25px;
    }

    .social i {
        margin-right: 4px;
    }
</style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form action="" method="post">
        <h3>Register Here</h3>

        <label for="nm">Last Name</label>
        <input type="text" name="nc" required id="nm">

        <label for="pr">First Name:</label>
        <input type="text" name="prc" required id="pr">

        <label for="e">Email:</label>
        <input type="email" name="ec" required id="e">

        <label for="p">Phone number:</label>
        <input type="text" name="pc" required id="p">

        <label for="a">Adresse:</label>
        <input type="text" name="ac" required id="a">

        <label for="pass">Password:</label>
        <input type="text" name="passc" required id="pass">

        <input type="submit" name="submit" value="Register" class="lastInput"><br>

        <p style="color: white;">Already have an account? <a href="LoginClient.php">Log in</a></p>

    </form>


    <?php

    include_once("../connect.php");

    if (isset($_POST['submit'])) {
        $nclt = $_POST['nc'];
        $prclt = $_POST['prc'];
        $eclt = $_POST['ec'];
        $addclt = $_POST['ac'];
        $numclt = $_POST['pc'];
        $passwdclt = $_POST['passc'];


        $stmt = $conn->prepare("SELECT * FROM client WHERE emailClt=?");
        //execute the statement
        $stmt->execute([$eclt]);
        //fetch result
        $user = $stmt->fetch();

        if ($user) {
            echo "<script>alert('email already exists')</script>";
        } else {
            
            $stmt1 = $conn->prepare("insert into client(nomClt,prenomClt,emailClt,addresseClt,numClt,passwdClt) values(?,?,?,?,?,?)");

            $stmt1->execute([$nclt, $prclt, $eclt, $addclt, $numclt, $passwdclt]);

            echo "<script>window.location.href='LoginClient.php';</script>";
        }

    }
    ?>


</body>

</html>