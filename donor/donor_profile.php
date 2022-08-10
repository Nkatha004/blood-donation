<?php
include('../connection/connect.php');
session_start()??null;
$id = $_SESSION['id']??null;

$sql = "SELECT * FROM donor WHERE donor_id = '$id'";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Donor Profile</title>
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
        <header>     
            <nav>
                <img id="logo" src="../images/Logo.png" width="80"height="80"> 
                <a href="../hospital_page.php" style="margin-left:15px;">Home</a> 
                <a href="../donation_requirements.php" style="margin-left:15px;">Eligibility</a> 
            <a href="../RegisteredHospitals.php" style="margin-left:15px;">Partnered Hospitals</a> 

                <a href = ''style = "float: right;margin-right: 20px; padding-top:20px;" class = 'dropdown-toggle password' id = 'user' data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>&nbsp;<?php echo $_SESSION['name']??null;?></a>

               <ul class="dropdown-menu" aria-labelledby="user">
                    <li><a id = 'user_profile'class="dropdown-item" href="donor_profile.php">My Profile</a></li>
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
                    <div class = 'col'></div>
                    <div class = 'col-md-auto box-shadow'><?php
                    if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $donor_id = $row['donor_id'];?>
                        <form method = 'post' action = '../connection/updatedonor.php?id=<?php echo $donor_id?>'>
                        <h4 style = 'padding-bottom:10px;text-align:center'>Donor Profile</h4>
                        <?php
                       
                                echo "
                                <p><b><label>Donor ID: </label></b><input autocomplete = 'off' type = 'number' name = 'id'readonly value = ". $row['donor_id']."></p>";
                                echo "<p><b><label>First Name: </label></b><input autocomplete = 'off' type = 'text' name = 'first_name' value = '". $row['first_name']."'></p>";
                                echo "<p><b><label>Last Name: </label></b><input autocomplete = 'off' type = 'text' name = 'last_name' value = '". $row['last_name']."'></p>";
                                echo "<p><b><label>Email: </label></b><input autocomplete = 'off' type = 'email' name = 'email' value = ". $row['donor_email']."></p>";
                                echo "<p><b><label>Phone Number: </label></b><input autocomplete = 'off' type = 'number' min = 0 name = 'phoneNo' value = ". $row['donor_phoneNo']."></p>";
                                echo "<p><b><label>Gender: </label></b><input autocomplete = 'off' type = 'text' name = 'gender' value = '". $row['gender']."'></p>";
                                echo "<p><b><label>Date of Birth: </label></b><input autocomplete = 'off' type = 'date' name = 'dob' value = '". $row['date_of_birth']."'></p>";
                               echo "<div style = 'text-align:center'>";?>
                                <a href = ''><button id = 'form-btn' class = 'btn btn-dark'>Update</button></a></div><?php
                            }
                        }else{
                            echo "<script >alert('Donor not found! Please login');window.location.href = '../login.php'</script>";
                        }
                        ?>
                        </form>
                    </div>
                    <div class = 'col'></div>
                </div>
            </div>
        </main>
        <footer>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
</html>
