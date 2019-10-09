<div class="container-fluid">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="password" class="form-control" id="pass" placeholder="Change Password"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="chan">Change</button>
      </div>
    </div>
  </div>
</div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">
            <h1>Profile</h1>
            <?php
                include("model/database.php");
                $id = $_SESSION["id"];
                $customer = Customer::getRow($id);
                
            ?>
            <p>Customer ID: <?php echo($customer["customer_id"]); ?>
            <p id="name">Name : <?php echo($customer["first_name"]); ?> <?php echo($customer["last_name"]); ?> <a href="#changeName" id="changeName"><i class="fas fa-edit text-green"></i></a>
            <p id="email">Email: <?php echo($customer["email"]); ?>  <a href="#changeEmail" id="changeEmail"><i class="fas fa-edit text-green"></i></a>
            <p >Password: ************  <a href="#changePassword" id="changePassword" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit text-green"></i></a>
        </div>
        <div class="col-md-1"></div>
        <script>

            $("#changeName").click(function(){
                var  fname = prompt("Enter Your First Name:");
                var lname = prompt("Enter Last Name: ");
                var conf = confirm("Your Name Will Change to "+fname+" "+lname+". Are You Sure ?");

                $.ajax(
                    {
                        url : 'controller/change-name.php',
                        method : "GET",
                        data:{
                            fname : fname,
                            lname : lname,
                        },
                        success:function(data)
                        {
                            console.log(data);
                            $("#name").text("Name: "+fname+" "+lname);
                        }
                    }
                );
            }
            );
            $("#changeEmail").click(function(){
                var  email = prompt("Enter Your New Email:");

                var conf = confirm("Your Email Will Change to "+email+". Are You Sure ?");

                $.ajax(
                    {
                        url : 'controller/change-email.php',
                        method : "GET",
                        data:{
                            email : email,
                           
                        },
                        success:function(data)
                        {
                            console.log(data);
                            $("#email").text("Email: "+email);
                        }
                    }
                );
            }
            );




            //password change
            $("#chan").click(function(){
            
                if($("#pass").val()=="")
                {
                    alert("Please Enter Password");
                }
                else
                {

                
                $.ajax(
                    {
                        url : 'controller/change-password.php',
                        method : "GET",
                        data:{
                            password : $("#pass").val(),
                            
                        },
                        success:function(data)
                        {
                            console.log(data);
                            //$("name").text("Name: "+fname+" "+lname);
                            $("#exampleModal").modal("hide");
                        }
                    }
                );
                }
            }
            );
         
            

        </script>
      

    </div>
</div>