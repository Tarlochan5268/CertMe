<?php
    include("../../model/database.php");

    if(isset($_GET["id"]))
    {
        if($obj = TestCategory::getObject($_GET["id"]))
        {
            var_dump($obj);
            $obj->delete();
            var_dump($obj);
            header("Location: ../../?action=all-categories&delete=true");
        }
        else
        {
            header("Location: ../../?action=all-categories&delete=false");

        }
    }
?>