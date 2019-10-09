<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <h1>Users</h1>
            <?php
                include("model/database.php");

                if(count(Customer::allRows()) == 0)
                {
                    echo("No Users Signed Up Yet");
                }
                else
                {
            ?>
            <table class="table table-warning table-hovered table-striped table-bordered">
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Test Taken</th>
                    <th>View Details</th>
                </tr>
            <?php
                foreach(Customer::allRows() as $row)
                {
            ?>
            <tr>
                    <td><?php echo($row["customer_id"]); ?></td>
                    <td><?php echo($row["first_name"]); ?>  <?php echo($row["last_name"]); ?></td>
                    <td>TBA</td>
                    <td><a href=".?action=view-customer&customer-id=<?php echo($row['customer_id']); ?>"><i class="fas fa-eye"></i></a></td>
            </tr>
            <?php        
                }
            ?>
            </table>
            <?php        
                }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>