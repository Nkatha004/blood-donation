<?php
session_start()??null;

include('../connection/connect.php');

$id = $_SESSION['id']??null;

$sql = "SELECT donation.donation_id, donation.hospital_id, test_results.* FROM test_results LEFT JOIN donation ON donation.donation_id = test_results.donation_id WHERE donation.hospital_id= $id AND donation.results_status='released' ";
$result = $connection->query($sql);   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Donor Blood details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/blitzer/jquery-ui.css" rel = "stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link href = "../css/styles.css" rel = "stylesheet">
        <link rel="shortcut icon" href="../images/Logo.png" type="image/x-icon">

       
    </head>
    <body>
        <header>     
        <nav>
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
            <a href="../blood_drive/drive_scheduling.php">Schedule a drive</a>
            <a href="../blood_drive/driveHospitalView.php">Scheduled drives</a>
            <a href="../blood_drive/hospital_drive.php">Drive bookings and donations</a>
            <a href="../hospital_appointment/hospitalViewPendingAppointment.php">Pending hospital appointments</a>
            <a href="../hospital_appointment/hospitalViewConfirmedAppointment.php">Confirmed hospital appointments</a>
            <a href="../donate/hospitalViewDonationDetails.php">View donation details</a>
            <a href="../donate/hospitalViewDonations.php">View donations</a>
            <a href="HospitalViewReleasedResults.php">View Blood Test Results</a>
            <a href="../hospital/requestBlood.php">Send alert for donation</a>
        </div>
        <main class="main">
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div id = 'confirmedAppointments'class="col-md-auto box-shadow">
                                
                        <?php
                        if (mysqli_num_rows($result) > 0)
                        {?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Results ID</th>
                                        <th>Donation ID</th>
                                        <th>Blood Group</th>
                                        <th>Rh Type</th>
                                        <th>Hepatitis B</th>
                                        <th>Hepatitis C</th>
                                        <th>HIV</th>
                                        <th>Syphilis</th>
                                        <th>Bacterial Contamination</th>
                                        <th>T Lymphotropic Virus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr><?php
                            while($row = mysqli_fetch_assoc($result))
                            {

                                echo "<td>".$row['results_id']."</td>";
                                echo "<td>".$row['donation_id']."</td>";
                                echo "<td>".$row['blood_group']."</td>";
                                echo "<td>".$row['Rh_type']."</td>";
                                echo "<td>".$row['hepatitis_B']."</td>";
                                echo "<td>".$row['hepatitis_C']."</td>";
                                echo "<td>".$row['HIV']."</td>";
                                echo "<td>".$row['Syphilis']."</td>";
                                echo "<td>".$row['bacterial_contamination']."</td>";
                                echo "<td>".$row['t_lymphotropic_virus']."</td>";
                                ?>
                                </tr>
                                <?php
                            }?>
                        </tbody>
                        </table><br/>
                        <?php
                        }else {
                           ?><script>alert('No Results have been released');window.location.href = '../hospital_page.php';</script>
                        <?php
                        }?>

                    </div><div class="col"></div>
                    </div>
                           
               
                
            </div>
            
        </main>
        <footer class = 'sidenav_footer' style="margin-top:24px;">
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
      
    </body>
    
</html>