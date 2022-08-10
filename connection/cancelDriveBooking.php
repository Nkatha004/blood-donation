<?php 
require_once('connect.php');

$drive_booking_id = $_GET['id']??null;

$sql_delete = "DELETE FROM drive_booking WHERE drive_booking_id = '$drive_booking_id'";

if($connection->query($sql_delete))
{
    echo "<script>alert('Drive booking Canceled');window.location.href = '../blood_drive/driveDonorView.php'</script>";
}else{
    echo "<script>alert('Failed to cancel booking');window.location.href = '../blood_drive/driveDonorView.php.php'</script>";
}

?>
