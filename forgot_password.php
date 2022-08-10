<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forgot Password</title>
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
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                        <form class = 'box-shadow' id = 'login_form' method="post" action = "connection/changePasswordConnect.php">
                            <p id = 'message'></p>
                            <h5 id = 'login_heading'>Change Password</h5>
                            <label>Email Address</label>
                            <input type = 'email' name = 'email' id = 'email' required autofocus autocomplete = 'off'>
                            <br/><br/><br>
                            <label>Password</label>
                            <input type = 'password' name = 'password' id = 'password' required autocomplete = 'off'>                            
                            <br/><br/>
                            <input id = 'login'type = 'submit' name = 'login_btn' value = 'Change Password'><br/><br>
                        </form>
                      
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </main>
         <footer style = 'margin-top:64px'>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
</html>
