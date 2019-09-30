<?php
    if(isset($_POST["signup"]))
    {
        include("../model/database.php");
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $obj = new Customer($firstName, $lastName, $email, $password);
        $obj->save();

        echo("Customer Created");
        header("Location: ..?action=get-access&account=created");
        
    }

?>