<?php
    if(isset($_GET["fname"]))
    {
        session_start();
        include("../model/database.php");
        $fname = $_GET["fname"];
        $lname = $_GET["lname"];
        $id = $_SESSION["id"];
        $query = "UPDATE CUSTOMER SET first_name='$fname' , last_name='$lname' where customer_id = $id";
        echo($query);
        $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->closeCursor();
        echo("DONE");
    }
?>