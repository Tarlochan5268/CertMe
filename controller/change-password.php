<?php
    if(isset($_GET["password"]))
    {
        session_start();
        include("../model/database.php");
        $fname = $_GET["password"];
    
        $id = $_SESSION["id"];
        $query = "UPDATE CUSTOMER SET password='$fname' where customer_id = $id";
        echo($query);
        $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->closeCursor();
        echo("DONE");
    }
?>