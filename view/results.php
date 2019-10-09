<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <?php
            
                include("model/database.php");
                if(!isset($_GET["test-id"]))
                {
                    header("Location: .?action=dashboard");
                }
                $test_id = $_GET["test-id"];
                $login_id = $_SESSION["id"];
                $query = "SELECT * FROM register_test, tests WHERE register_test.test_id = tests.test_id and register_test.test_id = $test_id and customer_id = $login_id and status = 0";
                $stmt = $conn->prepare($query);
                $result = $stmt->execute();
                $rows = $stmt->fetchAll();
                $stmt->closeCursor();
                if(count($rows)==0)
                {
                    header("Location:.?action=dashboard");
                }
                
            ?>
            <div class="text-center">
                <?php
                  $score = floatval($rows[0]['score']);
                  //var_dump($rows);
                  $score = $score / intval($rows[0]["test_max_questions"]) * 100;
                    if($score>=90)
                    {
                        $query = "SELECT * FROM customer where customer_id = $login_id";
                        $stmt = $conn->prepare($query);
                        $result = $stmt->execute();
                        $ro = $stmt->fetch();
                            
                      echo("<p class='text-success score'>$score </p><p>/100</p>"); 
                      $test_name = $rows[0]['test_name'];
                      $fullame = $ro['first_name'] . " " . $ro['last_name'] ;
                      echo("<p>This is to certify that Mr./Ms. <br/><span style='font-size:28px'><b>$fullame</b></span> <br/>has Completed the below mentioned test with above mentioned grade ");
                      echo("<br/><br/>Test Name: $test_name");
                      $date = date_create($rows[0]["completion_date"]);
                    $date = (date_format($date, "F d, Y h:m:s a")); 
                      echo("<br/>Completion Date &amp; Time: $date");
                      echo("<br/><a href='#' onclick='window.print()'>Print This Page</a>");
                    }
                    else
                    {
                        echo("<p class='text-danger score'>$score </p><p>/100</p>"); 
                        echo("<p>Unfortunately, You did not meet the criteria for passing this test. You cannot take test again.");
                    }
                ?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>