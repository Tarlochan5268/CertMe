<script>
    function ajaxCaller(element)
    {
        var elementId = element.id;
        elementId = elementId.substring(1);
        //alert(elementId);
        $.ajax({
            url:"controller/registerfortest.php",
            method: "GET",
            data: {
                "test-id":elementId
            },
            success:function(data){
                //alert(data);
                if(data == 1)
                {
                    $("#t"+elementId).removeClass("btn-outline-primary");
                    $("#t"+elementId).addClass("btn-outline-success");
                    $("#t"+elementId).text("Test Activated");

                }
                else 
                {
                    console.log(data);
                    $("#t"+elementId).removeClass("btn-outline-primary");
                    $("#t"+elementId).addClass("btn-outline-warning");
                    $("#t"+elementId).text("Already Registered");

                }
            },
            error:function(){
                alert("500 Internal Server Error");
            }
        });
    }
</script>
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

                        <a href="#" onclick="ajaxCaller(this)" id="t<?php echo($test['test_id'])?>" class="btn btn-outline-primary">Register</a>
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
