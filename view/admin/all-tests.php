<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
        <h1>Tests</h1>
            <?php
                include("model/database.php");

                if(count(Test::allRows()) == 0) 
                {
            ?>
             <h5 class="mt-5">No Tests Created Yet</h5>
            <a href="#" data-toggle="modal" data-target="#exampleModalLong">
            Add first Test here.
        
            </a>
            <?php        
                }
                else
                {
                    ?>
                 <a href="#" data-toggle="modal" data-target="#exampleModalLong">
            Add  test here.
                </a>
            <table class="table mt-5 table-dark table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Delete Test</th>
                        <th>View More</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                    $rows = Test::allRows();
                    foreach($rows as $row)
                    {
            ?>
                    <tr>
                        <td><?php echo($row["test_id"]);?></td>
                        <td><?php echo($row["test_name"]);?></td>
                        <td><a href="controller/admin/delete-test.php?id=<?php echo($row["test_id"]); ?>" class="text-danger"><i class="fas fa-trash"></i></a></td>
                        <td><a href=".?action=view-test&test-id=<?php echo($row["test_id"]);?>"><i class="fas fa-eye"></i></td>
                    </tr>
            <?php
                    }

                }
            ?>
            </tbody>
            </table>
            
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form onsubmit="return validate()"  action="controller/admin/add-test.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add a new Test</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="tName" class="form-control my-2" name="test_name" placeholder="Enter Test Name"/>
                            <input type="number" id="TMaxMin" class="form-control my-2"  name="test_max_mins" placeholder="Maximum Minutes"/>
                            <input type="number" id="tMaxQues" class="form-control my-2"  name="test_max_questions" placeholder="No. Of Compulsory Questions"/>

                            <select class="form-control my-2" id="tCat" name="test_category">
                                <option selected="selected" disabled="disabled" value="">Select Category </option>
                                <?php
                                    foreach(TestCategory::allRows() as $row)
                                    {
                                ?>
                                <option value="<?php echo($row["category_id"]);?>"><?php echo($row["category_name"]);?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <textarea class="form-control my-2" id="tDesc" placeholder="Test Description" name="test_description" ></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                                </form>
                        </div>
                    </div>
                    </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<script>
    function validate()
    {
        //var tName = document.getElementById("tName");
        //var tName = $("#tName");
        if($("#tName").val()=="" || $("#tMaxMin").val()=="" || $("#tMaxQues").val()=="" || $("#tCat").val()==null || $("#tDesc").val()=="")
        {
            alert("Please Enter The Values in All Fields." ;
            return false;
        }
        else
        {
            return true;
        }
    }
</script>