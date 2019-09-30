<?php
    include("../model/database.php");
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(Customer::login($email, $password))
    {
        $_SESSION["login"] = $email;
        echo("Login Complete");
        header("Location: ..?action=dashboard");
    }
    else
    {
        echo("Login Fail");

        header("Location: ..?action=get-access&login=false");
    }
?>