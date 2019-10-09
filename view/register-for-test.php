<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <h1>
                Available Tests For Registration
            </h1>
            <?php
                include("model/database.php");
                $tests = Test::allRows();
                if(count($tests)==0)
                {
                    echo("<p>No Test Available. Right Now, Please Check back later.</p>");
                }
                else
                {
            
                    foreach($tests as $test)
                    {
                        if(Question::questionsForTest($test['test_id']) >= $test["test_max_questions"])
                        {

                        
                ?>
                <div class="test">
                        <div class="test-heading"><?php echo($test['test_name']);?></div>
                        <div class="test-description"><?php echo($test['test_description']); ?></div>
                        <div class="test-time-count"><?php echo($test["test_max_mins"]); ?> Mins | <?php echo($test["test_max_questions"]); ?> Questions</div>

                        <a href="#" class="btn btn-outline-primary">Register</a>
                </div>
                <?php        
                        }
                    }

                }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>