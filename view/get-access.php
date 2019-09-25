<div class="container-fluid">
    <div class="row py-5 px-1">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="access-card">
                <h2>Login</h2>
                <form action="" method="post">
                    <br/>
                    <input type="email" name="email" class="form-control my-2" placeholder="Email"/>
                    <input type="password" name="password" class="form-control my-2" placeholder="Password"/>
                    <input type="submit" class="btn btn-light my-2 " value="Login" style="float:right;" />
                    <br/>
                    <a href=".action=forgot-password" >Forgot Password ?</a>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="access-card">
                <h2>SignUp</h2>
                <form action="" onsubmit="return formValidate()" method="post">
                    <br/>
                    <section id="firlas">
                        <input type="text" id="firstName" name="firstname" class="form-control my-2" placeholder="First Name"/>
                        <input type="text" id="lastName" name="lastname" class="form-control my-2" placeholder="Last Name"/>
                        <input type="button" id="btnNext" class="btn btn-light my-2 " value="Next" style="float:right;" />
                    </section>
                    <section id="empas">
                        <input type="email" id="email" name="email" class="form-control my-2" placeholder="Email"/>
                        <input type="password" id="password" name="password" class="form-control my-2" placeholder="Password"/>
                        <input type="submit" id="btnSignUp" class="btn btn-light my-2 " value="Signup" style="float:right;" />
                    </section>
                   
                    <br/>
                    <a href=".action=forgot-password" >Terms & Conditions</a>
                </form>
            </div>
        </div>

        <script>
            $("#empas").slideUp();
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
                if($("#firstName").val()== "" || $("#firstName").val() == "")
                {
                    return false;
                }
                else 
                {
                    return true;
                }
            }
            function formValidate()
            {
               
            }
        </script>
        <div class="col-md-1"></div>
    </div>
</div>