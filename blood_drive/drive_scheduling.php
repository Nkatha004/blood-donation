<?php
session_start()??null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blood Drive Scheduling</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/blitzer/jquery-ui.css" rel = "stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script type="text/javascript" src = "../scripts/validate.js"></script>
        <link href = "../css/styles.css" rel = "stylesheet">
        <link rel="shortcut icon" href="..\images\Logo.png" type="image/x-icon">

       
    </head>
    <body>
    <script src = 'https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/build/jquery.datetimepicker.full.min.js'></script>
        <header>     
            <nav style = 'position:fixed'>
            <img id="logo" src="../images/Logo.png" width="80"height="80"> 
            <a href="../hospital_page.php" style="margin-left:15px;">Home</a> 

                <a href = ''style = "float: right;margin-right: 20px; padding-top:20px;" class = 'dropdown-toggle password' id = 'user' data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>&nbsp;<?php echo $_SESSION['name']??null;?></a>

               <ul class="dropdown-menu" aria-labelledby="user">
                    <li><a id = 'user_profile'class="dropdown-item" href="../hospital/hospital_profile.php">My Profile</a></li>
                    <li><a id = 'log_out' class="dropdown-item" href="../connection/logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <div class="sidenav box-shadow">
            <a href="drive_scheduling.php">Schedule a drive</a>
            <a href="driveHospitalView.php">Scheduled drives</a>
            <a href="hospital_drive.php">Drive bookings and donations</a>
            <a href="../hospital_appointment/hospitalViewPendingAppointment.php">Pending hospital appointments</a>
            <a href="../hospital_appointment/hospitalViewConfirmedAppointment.php">Confirmed hospital appointments</a>
            <a href="../donate/hospitalViewDonationDetails.php">View donation details</a>
            <a href="../donate/hospitalViewDonations.php">View donations</a>
            <a href="../test_results/HospitalViewReleasedResults.php">View Blood Test Results</a>
            <a href="../hospital/requestBlood.php">Send alert for donation</a>
        </div>
        <main class = 'main'>
            
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                        <form class = 'box-shadow' id = 'drive_scheduling_form' method = 'post' action = '../connection/driveSchedulingConnect.php'>
                            <h4 id = 'drive_scheduling_heading'>Blood Drive Scheduling</h4>
                            <label>Blood Drive Name</label>
                            <input type = 'text' name = 'drive_name' id = 'drive_name' required autofocus autocomplete = 'off'>
                            <br/><br/>
                            <label>Location</label>
                            <input type = 'text' name = 'drive_location' id = 'drive_location' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Date From</label>
                            <input type="datetime-local" id="date_from" name="date_from">
                            <br/><br/>
                            <label>Date To</label>
                            <input type="datetime-local" id="date_to" name="date_to">
                            <br/><br/>

                            <br/><br/>
                            <input id = 'submit'type = 'submit' name = 'schedule_drive' value = 'Schedule Drive'>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <script src = '../scripts/date.js'></script>
        </main>
        <footer class = 'sidenav_footer' style="margin-top:24px;">
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>