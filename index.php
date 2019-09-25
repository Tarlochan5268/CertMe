<?php include("view/header.php");?>
<?php
    $action = "home";
    if(isset($_GET["action"]))
    {
        $action = $_GET["action"];
        if($action == "get-access")
        {
            include("view/get-access.php");
        }
    }
    else
    {
        include("view/home.php");
    }

?>
<?php include("view/footer.php");?>