<?php 
require_once('connect.php');

$drive_booking_id = $_GET['drive_booking_id'];

$sql_delete = "DELETE FROM drive_booking WHERE drive_booking_id = '$drive_booking_id'";

if($connection->query($sql_delete))
{
    echo "<script>alert('Booking Deleted');window.location.href = '../donor_page.php'</script>";
}else{
    echo "<script>alert('Failed to delete drive booking');window.location.href = '../blood_drive/driveDonorView.php'</script>";
}

?>
