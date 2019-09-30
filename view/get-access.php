<div class="container-fluid">
    <div class="row py-5 px-1">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="access-card">
                <h2>Login</h2>
                <form action="controller/customer-login.php" method="post">
                    <br/>
                    <input type="email" name="email" class="form-control my-2" placeholder="Email"/>
                    <input type="password" name="password" class="form-control my-2" placeholder="Password"/>
                    <input type="submit" class="btn btn-light my-2 " value="Login" style="float:right;" />
                    <br/>
                    <a href=".?action=forgot-password" >Forgot Password ?</a>
                    <?php if(isset($_GET["login"])) 
                        {
                            if($_GET["login"] == "false")
                            {
                                echo("<p class='text-danger'>Invalid Email/Password Combination</p>");
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="access-card">
                <h2>SignUp</h2>
                <form action="controller/customer-signup.php" onsubmit="return formValidate()" method="post">
                    <br/>
                    <?php if(isset($_GET["account"])) 
                        {
                            if($_GET["account"] == "created")
                            {
                                echo("<center>");
                                    echo("<img src='/certme/static/imgs/tick.png' width='50px'/>");
                                    echo("<p class='text-success mt-1'>Account Created | Try Login</p>");
                                echo("</center>");

                            }
                        }
                            else
                            {

                            
                            
                        ?>
                    <section id="firlas">
                        <input type="text" id="firstName" name="firstname" class="form-control my-2" placeholder="First Name"/>
                        <input type="text" id="lastName" name="lastname" class="form-control my-2" placeholder="Last Name"/>
                        <input type="button" id="btnNext" class="btn btn-light my-2 " value="Next" style="float:right;" />
                    </section>
                    <section id="empas">
                        <input type="email" id="email" name="email" class="form-control my-2" placeholder="Email"/>
                        <input type="password" id="password" name="password" class="form-control my-2" placeholder="Password"/>
                        <input type="submit" id="btnSignUp" name="signup" class="btn btn-light my-2 " value="Signup" style="float:right;" />
                    </section>
                            <?php } ?>
                    <br/>
                    <a href=".?action=forgot-password" >Terms & Conditions</a>
                </form>
            </div>
        </div>

        <script>
            $("#empas").hide();
            $("#btnNext").click(function(){
                if(firlasValidate())
                {
                    $("#firlas").slideUp();  
                    $("#empas").slideDown(); 
                }
                else
                {
                    alert("Please Enter All The Required Fields");
                }
               
            });
            function firlasValidate()
            {
                //console.log($("#firstName").val());
                if($("#firstName").val()!= "" && $("#lastName").val() != "")
                {
                    return true;
                }
                else 
                {
                    return false;
                }
            }
            function formValidate()
            {
                if($("#email").val()!= "" && $("#password").val() != "")
                {
                    return true;
                }
                else 
                {
                    
                    alert("Please Enter All The Required Fields");
                }
            }
        </script>
        <div class="col-md-1"></div>
    </div>
</div>