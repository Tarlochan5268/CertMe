<?php
    if(isset($_POST["test_name"]) && isset($_POST["test_max_mins"]) && isset($_POST["test_max_questions"]) && isset($_POST["test_category"]) && isset($_POST["test_description"]))
    {
        include("../../model/database.php");
        $test_name = $_POST["test_name"];
        $test_max_mins = $_POST["test_max_mins"];
        $test_max_questions = $_POST["test_max_questions"];
        $test_category = $_POST["test_category"];
        $test_description = $_POST["test_description"];

        $object = new Test($test_name, TestCategory::getObject($test_category), $test_description, $test_max_mins,$test_max_questions );
        $object->save();
        header("Location: ../../?action=view-test&test-id=$object->id");

    }
    else
    {
        header("Location: ../../?action=oops");
    }

    

?>