<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            Tests
            <?php
                include("model/database.php");
  
               
                var_dump(Test::allRows());
            
            ?>
            <a href="model/database.php">CLICK</a>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>