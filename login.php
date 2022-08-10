<?php
    session_start()??null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src = "scripts/validate.js"></script>
        <link href = "css/styles.css" rel = "stylesheet">
        <link rel="shortcut icon" href="images\Logo.png" type="image/x-icon">

       
    </head>
    <body>
        <header>     
            <nav>
            <img id="logo" src="images/Logo.png" width="80"height="80"> 
            <a href="homepage.php" style="margin-left:15px;">Home</a>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                        <form class = 'box-shadow' id = 'login_form'>
                            <p id = 'message'><p>
                            <h5 id = 'login_heading'>Welcome. Please Login to proceed!</h5>
                            <label>Email Address</label>
                            <input type = 'email' name = 'email' id = 'email' required autofocus autocomplete = 'off'>
                            <br/><br/><br>
                            <label>Password</label>
                            <input type = 'password' name = 'password' id = 'password' required autocomplete = 'off'>                            
                            <br/><br/>
                            <input id = 'login'type = 'submit' name = 'login_btn' value = 'Login'><br/><br>
                            
                            <div class="dropdown">
                                <a href = '' class = 'dropdown-toggle password' id = 'new_user' data-bs-toggle="dropdown" aria-expanded="false">New user? Create account</a>

                                <ul class="dropdown-menu" aria-labelledby="new_user">
                                    <li><a id = 'donor_reg'class="dropdown-item" href="#">Donor</a></li>
                                    <li><a id = 'hospital_reg' class="dropdown-item" href="#">Hospital</a></li>
                                </ul>
                            </div>
                            <a href = ''><p class = 'password' id = 'forgot_password'>Forgot password?</p></a>
                        </form>
                      
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $("#login").click(function(form){
                        form.preventDefault();
                        var email = $("#email").val().trim();
                        var password = $("#password").val().trim();
                        var msg = "";

                        $.ajax({
                            url: "connection/loginConnect.php",
                            type:'post',
                            data:{email:email,password:password},
                        
                            success:function(data){
                                if(data == 1){
                                    window.location.href="donor_page.php";
                                }else if(data == 2){
                                    window.location.href="hospital_page.php";
                                }
                                else{
                                    document.getElementById("login_form").reset();
                                    msg = "Incorrect username or password";
                                    $('#email').attr('autofocus' , 'true');
                                    $('#password').attr('autofocus' , 'false');
                                    $("#message").addClass('alert alert-danger');
                                    $("#message").html(msg);
                                    
						        }
                                document.getElementById("login_form").reset();
                            },
                            error:function(req, textStatus, errorThrown){
                               
                                document.getElementById("login_form").reset();
                                msg = "Not successful!";
                                $("#message").addClass('alert alert-danger');
                                $("#message").html(msg);
                            }
                        });
                    });
                    $("#donor_reg").click(function(form){
                        form.preventDefault();
                        $.ajax({
                            success:function(data){
                                window.location.href = "donor_registration.php";
                                exit();
                            },
                            error:function(req, textStatus, errorThrown){
                                window.location.href="login.php";
                                exit();
                            }
                        });
                    });
                    $("#hospital_reg").click(function(form){
                        form.preventDefault();
                        $.ajax({
                            success:function(data){
                                window.location.href = "hospital_registration.php";
                                exit();
                            },
                            error:function(req, textStatus, errorThrown){
                                window.location.href="login.php";
                                exit();
                            }
                        });
                    });
                    $("#forgot_password").click(function(form){
                        form.preventDefault();
                        $.ajax({
                            success:function(data){
                                window.location.href = "forgot_password.php";
                                exit();
                            },
                            error:function(req, textStatus, errorThrown){
                                window.location.href="login.php";
                                exit();
                            }
                        });
                    });
                });
            </script>
        </main>
        <footer style="margin-top:22px;">
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>