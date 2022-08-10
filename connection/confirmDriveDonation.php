<?php

include('connect.php');
session_start()??null;

$id=$_GET['id']??null;
$sql="SELECT * FROM drive_booking WHERE drive_booking_id=$id";

$drive = "SELECT blood_drive_id FROM drive_booking WHERE drive_booking_id = $id";
$result_drive = $connection->query($drive);

if (mysqli_num_rows($result_drive) > 0)
{
    while($row_drive = mysqli_fetch_assoc($result_drive))
    {
        $blood_drive_id = $row_drive['blood_drive_id'];
    }
}

date_default_timezone_set('Africa/Nairobi');
$date = date('Y-m-d H:i:s');

if($result = mysqli_query($connection, $sql)){

    $sql_quantity= "UPDATE drive_booking SET `status` = 'seen' WHERE drive_booking_id = '$id' ";
    $update= mysqli_query($connection, $sql_quantity);
    if($update){
        echo '<script>alert("Drive Donation Confirmed."); window.location.href ="../donate/driveDonationDetails.php?id='.$blood_drive_id.'" </script>';

    }else{
        echo mysqli_error($connection);
    }
} else {
    echo "ERROR " . mysqli_error($connection);
}

   
?>