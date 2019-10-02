<?php
    if(isset($_POST["category_name"]))
    {
        include("../../model/database.php");
        $category_name = $_POST["category_name"];
        $object = new TestCategory($category_name);
        $object->save();
        header("Location: ../../?action=all-categories");
    }
?>