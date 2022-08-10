<?php
session_start()??null;

include('../connection/connect.php');

$id = $_SESSION['id']??null;
$appointment_id=$_GET['appointment_id']??null;


$sql = "SELECT hospital.hospital_name, hospital_appointment.* FROM hospital_appointment LEFT JOIN hospital ON hospital.hospital_id = hospital_appointment.hospital_id WHERE appointment_id = $appointment_id ";

$result = $connection->query($sql);
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Appointment Booking</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/blitzer/jquery-ui.css" rel = "stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link href = "../css/styles.css" rel = "stylesheet">
        <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">
        <script type="text/javascript" src = "../scripts/sidebar.js"></script>

       
    </head>
    <body>
    <script src = 'https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/build/jquery.datetimepicker.full.min.js'></script>
        <header>     
            <nav>
            <img id="logo" src="../images/Logo.png" width="80"height="80"> 
            <a href="../homepage.php" style="margin-left:15px;">Home</a> 
            <a href="../donation_requirements.php" style="margin-left:15px;">Eligibility</a> 
            <a href="../RegisteredHospitals.php" style="margin-left:15px;">Partnered Hospitals</a> 

                <a href = ''style = "float: right;margin-right: 20px; padding-top:20px;" class = 'dropdown-toggle password' id = 'user' data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>&nbsp;<?php echo $_SESSION['name']??null;?></a>

               <ul class="dropdown-menu" aria-labelledby="user">
                    <li><a id = 'user_profile'class="dropdown-item" href="#">My Profile</a></li>
                    <li><a id = 'log_out' class="dropdown-item" href="../connection/logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
           <main class="donor_land">

<div class="flex-shrink-1 p-3 bg-white" id="dash">
<a href="../donor_page.php" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
<span class="fs-5 fw-semibold">Dashboard</span>
</a>
<ul class="list-unstyled ps-0">
<li class="mb-1">

<button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#donate-collapse" aria-expanded="false">
  Donate
</button>
<div class="collapse" id="donate-collapse">
  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
    <li><a href="../blood_drive/viewDrives.php" class="link-dark d-inline-flex text-decoration-none rounded">Register for Blood Drives</a></li>
    <li><a href="book_appointment.php" class="link-dark d-inline-flex text-decoration-none rounded">Book Hospital Appointment </a></li>
  </ul>
</div>
</li>
<li class="mb-1">
<button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#appointment-collapse" aria-expanded="false">
  Appointments
</button>
<div class="collapse" id="appointment-collapse">
  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
    <li><a href="donorViewAppointments.php" class="link-dark d-inline-flex text-decoration-none rounded">Upcoming Appointments</a></li>
    <li><a href="donorViewPastAppointments.php" class="link-dark d-inline-flex text-decoration-none rounded">Past Appointments</a></li>
  </ul>
</div>
</li>
<li class="mb-1">
<button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#drive-collapse" aria-expanded="false">
  Blood Drives
</button>
<div class="collapse" id="drive-collapse">
  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
    <li><a href="../blood_drive/viewDrives.php" class="link-dark d-inline-flex text-decoration-none rounded">View Upcoming Drives</a></li>
    <li><a href="../blood_drive/driveDonorView.php" class="link-dark d-inline-flex text-decoration-none rounded">View Registered Drives</a></li>
    <li><a href="../blood_drive/pastDriveDonorView.php" class="link-dark d-inline-flex text-decoration-none rounded">View Attended Drives</a></li>
  </ul>
</div>
</li>
<li class="mb-1">
<button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#donations-collapse" aria-expanded="false">
  Blood Donations
</button>
<div class="collapse" id="donations-collapse">
  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
    <li><a href="../donate/donorDonationDetails.php" class="link-dark d-inline-flex text-decoration-none rounded">View Blood Details</a></li>
    <li><a href="../donate/donorTestResults.php" class="link-dark d-inline-flex text-decoration-none rounded">View Test Results</a></li>
  </ul>
</div>
</li>
</ul>
</div>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-auto">
                   
                        <form class = 'box-shadow' id = 'edit_appointment_form' method = 'POST' action = '../connection/HospitalAppointment.php?appointment_id=<?php echo $appointment_id?>' >
                            <h4 id = 'hospital_edit_appointment_heading'>Hospital Appointment Booking</h4>
                            <label>Hospital</label>

                            
                          <?php

                        $sql1 = "SELECT hospital_id,hospital_name FROM hospital"; 

                        $result1 = $connection->query($sql1);
                        if(mysqli_num_rows($result1) > 0){  
                          echo"<select id='hospital' name='hospital' value=' ". $row['hospital_id']. "'>";
                        while($row1 = mysqli_fetch_assoc($result1))
                         { 
                              echo  "<option value='" .$row1['hospital_id']."'> ".$row1['hospital_name']. "  </option>" ; 
                                 }
                                }
?>
                            </select> 
                            <br/><br/>
                            <label>Date</label>
                            <input type = 'date' name = 'app_date' id = 'app_date' value='<?php echo $row['date']?>' required autocomplete = 'off'>
                            <br/><br/>
                            <label>Time</label>
                            <input type="time" id="app_time" name="app_time" value='<?php echo $row['time']?>'>
                            <br/><br/>
                            

                            <br/><br/>
                            <input id = 'submit' type = 'submit' name = 'update' value = 'Update'>
                            <br/><br/>
                            <input id = 'submit' type = 'submit' name = 'cancel_app' value = 'Delete booking'>

                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
           
        </main>
        <footer>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>