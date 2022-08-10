<?php 
session_start()??null;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Registration</title>
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

                <!-- <a href = ''style = "float: right;margin-right: 20px; padding-top:20px;" class = 'dropdown-toggle password' id = 'user' data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>&nbsp;<?php echo $_SESSION['name']??null;?></a>

               <ul class="dropdown-menu" aria-labelledby="user">
                    <li><a id = 'user_profile'class="dropdown-item" href="#">My Profile</a></li>
                    <li><a id = 'log_out' class="dropdown-item" href="connection/logout.php">Log Out</a></li>
                </ul> -->
            </nav>
        </header>
        <main>
            
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                        <form class = 'box-shadow' id = 'hospital_reg_form' method = 'post' action = 'connection/registrationConnect.php'>
                            <h4 id = 'hospital_reg_heading'>Hospital Registration</h4>
                            <label>Hospital Name</label>
                            <input type = 'text' name = 'hospital_name' id = 'hospital_name' required autofocus autocomplete = 'off'>
                            <br/><br/>
                            <label>Email Address</label>
                            <input type = 'email' name = 'hospital_email' id = 'hospital_email' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Phone Number</label>
                            <input type = 'number' name = 'hospital_phoneNo' id = 'hospital_phoneNo' min = 0 max = '9999999999' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Location</label>
                            <input type = 'text' name = 'hospital_location' id = 'hospital_location' required autofocus autocomplete = 'off'>
                            <br/><br/>
                            <label>Password</label>
                            <input type = 'password' name = 'hospital_password' id = 'hospital_password' required autocomplete = 'off'>                            
                            <br/><br/>
                            <input id = 'submit'type = 'submit' name = 'hospital_reg' value = 'Register'>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            
        </main>
        <footer style="margin-top:11px;">
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>