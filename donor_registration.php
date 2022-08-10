<?php
session_start()??null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Donor Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/blitzer/jquery-ui.css" rel = "stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src = 'scripts/date.js'></script>
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
            <br>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                        <form class = 'box-shadow' id = 'registration_form' method = 'post' action = 'connection/registrationConnect.php'>
                            <h4 id = 'donor_reg_heading'>Donor Registration</h4>
                            <label>First Name</label>
                            <input type = 'text' name = 'fname' id = 'fname' required autofocus autocomplete = 'off'>
                            <br/><br/>
                            <label>Last Name</label>
                            <input type = 'text' name = 'lname' id = 'lname' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Email Address</label>
                            <input type = 'email' name = 'donor_email' id = 'donor_email' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Phone Number</label>
                            <input type = 'number' name = 'donor_phoneNo' id = 'donor_phoneNo' min = 0 max = '9999999999' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Password</label>
                           
                            <input type = 'password' name = 'donor_password' id = 'donor_password' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Gender</label>
                            <select name = 'gender' id = 'gender'>
                                <option disabled selected>Select Gender</option>
                                <option id = 'male' value = 'male' name = 'gender'>Male</option>
                                <option id = 'female' value = 'female' name = 'gender'>Female</option>
                            </select>
                            <br/><br/>
                            <label>Date of birth</label>
                            <input type = 'text' name = 'date_of_birth' id = 'date_of_birth' required autocomplete = 'off'>
                            
                            <br/><br/>
                            <input id = 'submit'type = 'submit' name = 'donor_reg' value = 'Register'>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            
        </main>
        <script>
            $(function() {
               $("#date_of_birth").datepicker()
            });
        </script>
        <footer>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>