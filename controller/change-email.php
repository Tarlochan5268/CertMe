<?php
    if(isset($_GET["email"]))
    {
        session_start();
        include("../model/database.php");
        $email = $_GET["email"];
     
        $id = $_SESSION["id"];
        $query = "UPDATE CUSTOMER SET email='$email' where customer_id = $id";
        echo($query);
        $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->closeCursor();
        echo("DONE");
    }
?>