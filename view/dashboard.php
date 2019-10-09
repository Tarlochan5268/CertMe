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

            $sql = "SELECT * FROM register_test WHERE status = 1 and customer_id = $id";

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
            }
        ?>
        <h2 class="heading-text"><span>Completed  Tests</span></h2>
        <?php
            $sql = "SELECT * FROM register_test WHERE status = 0 and customer_id = $id";

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
            }

        ?>
        <br/>

    </div>
    <div class="col-md-1"></div>
</div>