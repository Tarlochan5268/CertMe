<div class="container-fluid">
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 mt-5">
        <h2 class="heading-text"><span>Active Tests</span></h2>
        <br/>
        <?php
            include("model/database.php");
            $email = $_SESSION['login'];
            $sqlforgetid = "SELECT customer_id  FROM  customer WHERE email = '$email' ";
            $stmt = $conn->prepare($sqlforgetid);
            $stmt->execute();
            
            $id = $stmt->fetch()[0];
            $_SESSION["id"] = $id;
            $stmt->closeCursor();

            $sql = "SELECT * FROM register_test , tests WHERE  register_test.test_id = tests.test_id AND status = 1 and customer_id = $id ORDER BY registration_date DESC";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetchALl();
            $stmt->closeCursor();
            if(count($result)==0)
            {
                echo("<p>You have no active tests. Please Register for one.</p>");
            }
            else
            {

                //rest of the code goes here.
                foreach($result as $row)
                {

            ?>
            <div class="test-board">
                <h2><?php echo($row["test_name"]);?></h2>
                <hr/>
                <p>Registered On: <?php 
                $date = date_create($row["registration_date"]);
                echo(date_format($date, "F d, Y h:m:s a")); ?></p>
                <a href=".?action=start-test&test-id=<?php echo($row['test_id']) ?>" class="btn btn-success">Open Test</a>
            </div>
            <?php
                }

            }
        ?>
        <h2 class="heading-text"><span>Completed  Tests</span></h2>
        <?php
          //  $sql = "SELECT * FROM register_test WHERE status = 0 and customer_id = $id";
            $sql = "SELECT * FROM register_test , tests WHERE  register_test.test_id = tests.test_id AND status = 0 and customer_id = $id ORDER BY completion_date DESC ";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetchALl();
            $stmt->closeCursor();
            if(count($result)==0)
            {
                echo("<p>You have no completed tests. Please Register for one.</p>");
            }
            else
            {

                //rest of the code goes here.
                foreach($result as $row)
                {

            ?>
            <div class="test-board">
                <h2><?php echo($row["test_name"]);?></h2>
                <hr/>
                
                <p>Completed On: <?php 
                $date = date_create($row["completion_date"]);
                echo(date_format($date, "F d, Y h:m:s a")); ?></p>
                <a href=".?action=results&test-id=<?php echo($row['test_id']) ?>" class="btn btn-danger">View Result</a>
            </div>
            <?php
                }
            }

        ?>
        <br/>

    </div>
    <div class="col-md-1"></div>
</div>
</div>