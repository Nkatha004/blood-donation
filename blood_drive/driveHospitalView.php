<?php
session_start()??null;

include('../connection/connect.php');

$id = $_SESSION['id']??null;

$sql = "SELECT * FROM blood_drive WHERE hospital_id = '$id' ORDER BY date_from";
$result = $connection->query($sql);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scheduled Blood Drives</title>
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
                    <div id = 'drivehospitalview'class="col-md-auto box-shadow">
                                
                        <?php
                        if (mysqli_num_rows($result) > 0)
                        {?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Date From</th>
                                        <th>Time From</th>
                                        <th>Date To</th>
                                        <th>Time To</th>
                                        <th>Blood Drive ID</th>
                                        <th>Blood Drive Name</th>
                                        <th>Blood Drive Location</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr><?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $drive_id = $row['blood_drive_id'];
                                echo 
                                    "<td>".date('d/m/Y',strtotime($row['date_from']))."</td>";
                                    echo "<td>".date('h:i a',strtotime($row['date_from']))."</td>
                                    <td>".date('d/m/Y',strtotime($row['date_to']))."</td>
                                    <td>".date('h:i a',strtotime($row['date_to']))."</td>
                                    <td>".$row['blood_drive_id']."</td>
                                    <td>".$row['blood_drive_name']."</td>
                                    <td>".$row['blood_drive_location']."</td>
                                    
                                    <td><a href = 'editDrive.php?id=".$drive_id."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                    <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg></a>";?>&nbsp;&nbsp;<a href = '../connection/deleteDrive.php?id=<?php echo $drive_id;?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg></a></td>
                                </tr>
                                <?php
                            }?>
                        </tbody>
                        
                        </table><br/><div style = 'text-align:center'>
                        <a href = '../blood_drive/drive_scheduling.php'><button class = 'btn btn-primary'>Schedule a drive</button></a>&nbsp;
                        <a href = '../hospital_page.php'><button class = 'btn btn-primary'>Done</button></a></div>
                        <?php
                        }else {
                           ?><script>alert('No blood drives scheduled');window.location.href = 'drive_scheduling.php';</script>
                        <?php
                        }?>

                    </div><div class="col"></div>
                    
                    </div>
                           
               
                
            </div>
            
        </main>
        <footer class = 'sidenav_footer'>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>