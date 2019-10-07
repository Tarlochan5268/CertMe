<?php
    include("../../model/database.php");

    if(isset($_GET["question-id"]) && isset($_GET["test-id"]))
    {
        if($obj = Question::getObject($_GET["question-id"]))
        {
            var_dump($obj);
            $obj->delete();
            var_dump($obj);

        $tid = $_GET['test-id'];
        header("Location: ../../?action=view-test&test-id=$tid&delete=true");
        }
        else
        {
            $tid = $_GET['test-id'];
            header("Location: ../../?action=view-test&test-id=$tid&delete=false");

        }
    }
?>