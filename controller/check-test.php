<?php
    include("../model/database.php");
    session_start();
    if(isset($_GET['testId']))
    {
        //var_dump($_GET["result"]);
        $result = checkTest($_GET["result"]);
        
    }
    else{
        echo("TEST NOT SUBMITTED SUCCESSFULLY");
    }

    function checkTest($array)
    {
        global $conn;
        $marks = 0;
        if(count($array)==0)
        {
            $test_id = $_GET["testId"];
            $login_id = $_SESSION['id'];
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE register_test SET completion_date = '$date' , status=0 , score=0 where test_id = $test_id and customer_id = $login_id ";
            //var_dump(getCorrectAnswers($question['questionId']));
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->closeCursor();
        }
        else
        {

        foreach($array as $question)
        {
            if(count(getCorrectAnswers($question["questionId"])) == count($question["answers"]))
            {
                $df = true;
                for($i=0;$i<count(getCorrectAnswers($question["questionId"]));$i++)
                {
                    //echo(getCorrectAnswers($question["questionId"])[0][$i] . " = = ".$question["answers"][$i]);
                    if(getCorrectAnswers($question["questionId"])[0][$i] != $question["answers"][$i])
                    {
                        //echo(getCorrectAnswers($question["questionId"])[$i] . " = = ".$question["answers"][$i]);
                        $df=false;
                    }
                }
                if($df)
                {
                    $marks+=1;
                }
            }

            $date = date("Y-m-d H:i:s");
            $test_id = $_GET["testId"];
            $login_id = $_SESSION['id'];
            $query = "UPDATE register_test SET completion_date = '$date' , status=0 , score=$marks where test_id = $test_id and customer_id = $login_id ";
            //var_dump(getCorrectAnswers($question['questionId']));
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->closeCursor();
            echo("done");
            
        }
    }
        echo($marks);
    }
    function getCorrectAnswers($questionID)
    {
        global $conn;
        $query = "SELECT answer FROM answers WHERE question_id = $questionID and answer_true = 1";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
?>