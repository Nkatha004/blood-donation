<?php

include('connect.php');
session_start()??null;

$hospital_id = $_SESSION['id'];

$blood_details_id=$_GET['blood_details_id'];
$current_date=date('Y-m-d');

$sql_update="UPDATE blood_details set donation_status='complete' WHERE blood_details_id = $blood_details_id";
$resultUpdate=$connection->query($sql_update);

if ($resultUpdate){

    $sql="INSERT INTO donation (donation_date, blood_details_id, hospital_id) VALUES('$current_date', '$blood_details_id', '$hospital_id') ";
     $result=$connection->query($sql);
     if ($result){
        echo '<script>alert("Donation Complete."); window.location.href ="../donate/hospitalViewDonations.php" </script>';
    }
  else{
    echo mysqli_error($connection);
} 
}else{
    echo mysqli_error($connection);
  }
?>