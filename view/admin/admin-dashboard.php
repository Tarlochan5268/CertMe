<div class="container-fluid">
    <div class="row">
        <?php include("model/database.php");?>
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <h1>Stats</h1>
            <div class="box-container mt-5">
                <div class="box">
                    <h3><?php echo(count(Customer::allRows()));?></h3> <br/>
                    Users Signed Up
                </div>
                <div class="box">
                    <?php
                        $query = "SELECT * FROM register_test where status = 0";
                        
                        $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $res = $stmt->fetchAll();
                            $stmt->closeCursor();
                    ?>
                    <h3><?php echo(count($res));?></h3> <br/>
                    Tests Taken
                </div>
                <div class="box">
                <?php
                        $query = "SELECT * FROM register_test where status = 1";
                        
                        $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $res = $stmt->fetchAll();
                            $stmt->closeCursor();
                    ?>
                    <h3><?php echo(count($res));?></h3></h3> <br/>
                    Tests Active
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>