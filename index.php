<?php include("view/header.php");?>
<?php

    $action = "home";
    if(isset($_GET["action"]))
    {
        $action = $_GET["action"];
        //user section
        if($action == "get-access" )
        {
            if(isset($_SESSION["login"]))
            {
                header("Location: .?action=dashboard");
            }
            include("view/get-access.php");
        }
        else if($action=="dashboard" )
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
            include("view/dashboard.php");

        }
        else if($action="register-for-test")
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
            include("view/register-for-test.php");
        }
        //admin section
        else if($action=="admin" )
        {
            //include("view/admin/get-access.php");
            if(isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin-dashboard");
            }
            ?>
            <script>
               var myWindow =  window.open("view/admin/get-access.html","myWindow","width=600,height=200");
            </script>
            <?php
        }
        else if($action == "admin-dashboard" )
        {
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/admin-dashboard.php");
        }
        else if($action == "all-tests")
        {
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/all-tests.php");
        }
        else if($action == "all-categories")
        {
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/all-categories.php");
        }
        else if($action == "view-test")
        {
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/view-test.php");
        }
        else if($action == "all-users")
        {
            include("view/admin/all-users.php");
        }
        
        
    
    }

    else
    {
        include("view/home.php");
    }

?>
<?php include("view/footer.php");?>