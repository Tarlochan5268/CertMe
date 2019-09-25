<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = null;
    try
    {
        $conn = new PDO("mysql:host=$servername;db=certme", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
        header("Location: .?action=404&message=nodb");
    }    
?>