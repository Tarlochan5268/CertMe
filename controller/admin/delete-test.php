<?php
    include("../../model/database.php");

    if(isset($_GET["id"]) )
    {
        if($obj = Test::getObject($_GET["id"]))
        {
            var_dump($obj);
            $obj->delete();
            var_dump($obj);

        $tid = $_GET['test-id'];
        header("Location: ../../?action=all-tests");
        }
        else
        {
            $tid = $_GET['test-id'];
            header("Location: ../../?action=all-tests");

        }
    }
?>