<?php
session_start()??null;

include('../connection/connect.php');

$id = $_SESSION['id']??null;
$current_date = date('Y-m-d');

$sql = "SELECT blood_drive_id,blood_drive_name,blood_drive_location,date_from,date_to,hospital_name FROM 
blood_drive,hospital WHERE hospital.hospital_id = blood_drive.hospital_id AND date_to > '$current_date' ORDER BY date_from";

$result = $connection->query($sql);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blood Drives View</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/blitzer/jquery-ui.css" rel = "stylesheet">
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script type="text/javascript" src = "../scripts/validate.js"></script>
        <link href = "../css/styles.css" rel = "stylesheet">
        <link rel="shortcut icon" href="..\images\Logo.png" type="image/x-icon">
        <script type="text/javascript" src = "../scripts/sidebar.js"></script>

        
       
    </head>
    <body>
        <header>     
        <nav>
            <img id="logo" src="../images/Logo.png" width="80"height="80"> 
            <a href="../homepage.php" style="margin-left:15px;">Home</a> 
            </nav>
        </header>
        <main>

 <main class="donor_land">

    <div class="container">

    
            <h1 style = 'text-align:center; margin-top:15px;'>Blood Drives</h1>
            <div class="container_drive_view">
               
                <?php
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $drive_id = $row['blood_drive_id'];
                            ?><form method = 'post' action = "../connection/driveRegistration.php?id=<?php echo $drive_id;?>"><div id = 'driveview'class="col-md-auto box-shadow" ><?php
                            echo "<h3 style = 'text-align:center'>".$row['blood_drive_name']."</h3>
                            <b><p>Organizer:</b> ".$row['hospital_name']."</p>
                            <b><p>Location:</b> ".$row['blood_drive_location']." </p>";

                            if(date('d/m/Y', strtotime($row['date_from'])) == date('d/m/Y', strtotime($row['date_to']))){
                                echo "<b><p>Date:</b> ".date('d/m/Y', strtotime($row['date_from']))."</p>";
                            }else{
                                echo "<b><p>Date:</b> ".date('d/m/Y', strtotime($row['date_from']))."<b> to</b> ".date('d/m/Y', strtotime($row['date_to']))."</p>";
                            }
                            
                            echo "
                            <b><p>Time:</b> ".date('h:i a', strtotime($row['date_from']))."<b> to</b> ".date('h:i a', strtotime($row['date_to']))."</p>";?>
                            <div style = 'text-align:center'>
                                <a href = ""><input style = 'color:white;background-color:black;width:auto' type = 'submit' value = 'Register' name = 'register'></a>
                            </div>
                            </div></form><?php
                        }
                    }else{
                        echo "<div class = 'col'></div><div style = 'text-align:center; margin-top: 20px;margin-bottom: 371px'class = 'col-md-auto'><h5>No Blood Drives have been Scheduled</h5></div><div class = 'col'></div>";
                    }
                ?>
            </div>
        </div>
            
        </main>
        <footer>
            <p>&#169; Copyright. All Rights reserved</p>
        </footer>
    </body>
    
</html>