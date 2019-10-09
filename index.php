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
        else if($action=="register-for-test")
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
            include("view/register-for-test.php");
        }
        else if($action=="start-test")
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
            if(!isset($_GET['test-id']))
            {
                header("Location: .?action=dashboard");
            }
            $test_id = $_GET['test-id'];
            
            include("view/start-test.php");
        }
        else if($action=="results")
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
            if(!isset($_GET['test-id']))
            {
                header("Location: .?action=dashboard");
            }
            $test_id = $_GET['test-id'];
         
            include("view/results.php");
        }
        else if($action=="profile")
        {
            if(!isset($_SESSION["login"]))
            {
                header("Location: .?action=get-access");
            }
           
         
            include("view/profile.php");
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
               var myWindow =  window.open("view/admin/get-access.html","myWindow","height=640,width=960,toolbar=no,menubar=no,scrollbars=no,location=no,status=no");
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
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/all-users.php");
        }
        else if($action=="view-customer")
        {
            if(!isset($_SESSION["admin"]))
            {
                header("Location: .?action=admin");
            }
            include("view/admin/view-customer.php");
        }
        
        
    
    }

    else
    {
        include("view/home.php");
    }

?>
<?php include("view/footer.php");?>