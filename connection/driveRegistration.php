<?php

include('connect.php');
session_start()??null;

if(isset($_POST['register'])){
    $drive_id = $_GET['id']??null;
    $user_id = $_SESSION['id']??null;

    if($user_id??null != null){

        $sqldonate="SELECT TIMESTAMPDIFF(MONTH, donation_date, CURDATE()) as `time_apart`
        FROM donation WHERE donation_date =(SELECT max(donation_date) FROM donation LEFT JOIN blood_details ON blood_details.blood_details_id=donation.blood_details_id WHERE donor_id=$user_id) ";


if ($result = $connection->query($sqldonate))
{
    if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    { 
       
    if($row['time_apart'] > 3) {
 $sql = "INSERT INTO drive_booking(donor_id, blood_drive_id) VALUES('$user_id', '$drive_id')";

       // echo $row['time_apart'];
    if ($connection->query($sql))
    {
        echo '<script>alert("Registration successful! See you then."); window.location.href ="../blood_drive/driveDonorView.php" </script>';

    }else{
        echo "Failed to insert";
    }
    }else{
         echo '<script>alert("You must wait a period of 3 months from your last donation to donate."); window.location.href ="../donor_page.php" </script>';
}
    }
} else{
    $sql = "INSERT INTO drive_booking(donor_id, blood_drive_id) VALUES('$user_id', '$drive_id')";
        
    if ($connection->query($sql))
    {
        echo '<script>alert("Registration successful! See you then."); window.location.href ="../blood_drive/driveDonorView.php" </script>';

    }else{
        echo "Failed to insert";
    }
} 
   
}else{
    echo mysqli_error($connection);
}
        
    }
    else{
        echo '<script>alert("Please login first then register for the drive"); window.location.href="../login.php";
        </script>';
    }
   
}
?>