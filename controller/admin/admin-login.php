<?php
    include("../../model/database.php");
    session_start();
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($email == "admin@certme.com" && $password == "certme")
        {
            echo("1");
            $_SESSION["admin"] = true;
        }
        else{
            echo("0");
        }

    }
?>