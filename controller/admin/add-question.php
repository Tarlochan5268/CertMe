<?php
    if(!isset($_POST["question"]) || !isset($_POST["ans"]) || !isset($_POST["correct"]))
    {
        header("Location: ../../?action=oops");
    }
    else
    {
        include("../../model/database.php");
        $question = $_POST["question"];
        $ansArray = $_POST["ans"];
        $correctAnsArray = $_POST["correct"];

        $questionObject = new Question($_POST["test-id"],$question);
        $questionObject->save();
        var_dump($ansArray);
        for($i=0; $i<count($ansArray);$i++)
        {
            if(in_array($i, $correctAnsArray))
            {
                $answerObject = new Answer($ansArray[$i], $questionObject, true);
                $answerObject->save();
            }
            else
            {
                $answerObject = new Answer($ansArray[$i], $questionObject, 0);
                $answerObject->save();


            }
        }
       header("Location: ../../?action=view-test&test-id=".$_POST["test-id"]);

    }
?>