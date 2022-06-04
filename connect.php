<?php
try {
    $servername="localhost";
    $username="root";
    $password="";
    $database_name="ecomphp";

        $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
       
      } catch(PDOException $e) {
        echo "erreur de connection : " . $e->getMessage();
        exit();
      }

?>