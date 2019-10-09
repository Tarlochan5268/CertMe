<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">

            <?php
                if(!isset($_GET["customer-id"]))
                {
                    header("Location: .?action=admin-dashboard");
                }
                $id = $_GET["customer-id"];
                include("model/database.php");
                $row = Customer::getRow($id);
                

            ?>
            <h1>User Details</h1>
            <?php
                if($row)
                {
                    $query = "SELECT * FROM register_test where status = 1 and customer_id = $id";
             
                    $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $res = $stmt->fetchAll();
                        $stmt->closeCursor();
            ?>
            Name: <?php echo($row['first_name']); ?> <?php echo($row['last_name']); ?> <br/>
            Email: <?php echo($row['email']); ?> <br/>
            Test Registered: <?php echo(count($res)); ?> <br/>
            <?php
            $query = "SELECT * FROM register_test where status = 0 and customer_id = $id";
             
            $stmt = $conn->prepare($query);
                $stmt->execute();
                $res = $stmt->fetchAll();
                $stmt->closeCursor();
            ?>
            Test Active: <?php echo(count($res)); ?> <br/>
            <?php        
                }
                else
                {
                    header("Location: .?action=admin-dashboard");
                }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>