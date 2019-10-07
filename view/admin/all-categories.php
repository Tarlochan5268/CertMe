<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <h1>Tests Categories</h1>
            <?php
                include("model/database.php");
          
                if(count(TestCategory::allRows())==0)
                {
            ?>
            <h5 class="mt-5">No Categories Created Yet</h5>
            <a href="#" data-toggle="modal" data-target="#exampleModalLong">
            Add first category here.
                </a>
            <?php
                }
                else
                {
            ?>
            <a href="#" data-toggle="modal" data-target="#exampleModalLong">
            Add  category here.
                </a>
            <table class="table mt-5 table-dark table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Delete Category</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                    $rows = TestCategory::allRows();
                    foreach($rows as $row)
                    {
            ?>                                                                     
                    <tr>
                        <td><?php echo($row["category_id"]);?></td>
                        <td><?php echo($row["category_name"]);?></td>
                        <td><a href="controller/admin/delete-category.php?id=<?php echo($row["category_id"]); ?>" class="text-danger"><i class="fas fa-trash"></i></a></td>
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
                            <form action="controller/admin/add-category.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add a new Test Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                                </form>
                        </div>
                    </div>
                    </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>