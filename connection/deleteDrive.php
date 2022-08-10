<?php 
require_once('connect.php');

$id = $_GET['id'];

$sql_delete = "DELETE FROM blood_drive WHERE blood_drive_id = '$id'";

if($connection->query($sql_delete))
{
	header("location: ../blood_drive/driveHospitalView.php");
}else{
    echo "<script>alert('Failed to delete drive');window.location.href = '../blood_drive/driveHospitalView.php'</script>";
}

?>
