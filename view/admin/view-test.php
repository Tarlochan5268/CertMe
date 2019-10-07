<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
        <script>
            function deleteMe(id)
                    {
                        id = "#box"+String(id.id).substr(6);
                        console.log(id);
                        $(id).remove();
                        nextAnswer--;
                        
                    }
        </script>
            <?php
    
                include("model/database.php");
                if(!isset($_GET["test-id"]))
                {
                    header("Location: .?action=all-tests");
                }
                else
                {
                    $id = $_GET["test-id"];
                    $test = Test::getObject($id);
                    //var_dump($test);
                    echo("<h1>$test->testName</h1>");
                    echo("<p>$test->testDescription<br/>");
                    echo("Max Time: $test->testMaxMins:00 Minutes |  Max Questions: $test->testMaxQuestions</p>");
                }
            ?>
           <div id="questions">
                <?php
                    //echo(count(Question::questionsForTest($test->id)) );
                    if(count(Question::questionsForTest($test->id))==0)
                    {
                        echo("<h3>Add Questions For Test.</h3>");
                    }
                    else
                    {

                    
                ?>
                <table class="table table-hovered table-bordered table-warning table-stripedjksl" >
                    <thead class="bg-primary text-light"> 
                        <tr>
                            <td>Question</td>
                            <td>Answers</td>
                            <td>Delete</td>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            foreach(Question::questionsForTest($test->id) as $row) 
                            {
                          ?>
                        <tr>
                                <td><?php echo($row["question"]); ?></td>
                                <td>
                                    <ul>
                                        <?php
                                            foreach(Answer::answersForQuestion($row["question_id"]) as $answer)
                                            {
                                                if($answer["answer_true"]==1)
                                                {
                                                    echo("<li class='text-success'>".$answer["answer"]."</li>");
                                                }
                                                else
                                                {
                                                    echo("<li class='text-danger'>".$answer["answer"]."</li>");

                                                }
                                            }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                            <a href="controller/admin/delete-question.php?test-id=<?php echo($_GET["test-id"]); ?>&question-id=<?php echo($row["question_id"]); ?>"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                        </tr>
                          <?php      
                            }       
                        ?>
                    </tbody>
                </table>
                <?php
                    }
                ?>
           </div>
            <p>Questions: <a href="#" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fas fa-plus"></i> Add
                </a></p>


            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form onsubmit="return validate()"  action="controller/admin/add-question.php" method="POST">
                            <input type="hidden" name="test-id" value="<?php echo($_GET["test-id"]);?>"/>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add question for <?php echo($test->testName);?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="question" class="form-control my-2" name="question" required="required" placeholder="Enter Question "/>
                            <br/>
                            <p>Answers</p>
                            <div class="input-group my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <input type="checkbox" name="correct[]" value="0"/>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Answer Option 1" name="ans[]"  required="required"aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <input type="checkbox" name="correct[]" value="1"/>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Answer Option 2" name="ans[]"  required="required"aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <input type="checkbox" name="correct[]" value="2"/>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Answer Option 3" name="ans[]"  required="required"aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <input type="checkbox" name="correct[]" value="3"/>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Answer Option 4" name="ans[]"  required="required"aria-describedby="basic-addon1">
                            </div>
                         
                            
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="addMore">Add Answer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                                </form>
                        </div>
                    </div>
                    </div>
            <script>
                $(document).ready(function(){
                    var nextAnswer = 5;
                    $("#addMore").click(function(){
                        //var $questionInput = "<input type='text' class='form-control my-2' placeholder='Write your question here' name='questions'"
                        var elementsToAdd = "<div class='input-group my-2' id='box"+nextAnswer+"'> \
                                <div class='input-group-prepend'> \
                                    <span class='input-group-text' id='basic-addon1'> \
                                        <input type='checkbox' name='correct[]' value='"+(nextAnswer-1)+"'/> \
                                    </span> \
                                </div> \
                                <input type='text' class='form-control' placeholder='Enter New Answer Option' name='ans[]'  required='required'aria-describedby='basic-addon1'> \
                                <div class='input-group-append'> \
                                    <span class='input-group-text' id='basic-addon1'> \
                                        <a href='#h' class='remove' onclick='deleteMe(this)' id='remove"+nextAnswer+"'><i class='fas fa-times'></i></a> \
                                    </span> \
                                </div> \
                            </div>";
                            $(".modal-body").append(elementsToAdd);
                            nextAnswer++;
                    });
                    
                    
                });
            </script>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>