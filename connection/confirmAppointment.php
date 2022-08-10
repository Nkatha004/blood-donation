<?php

include('connect.php');
session_start()??null;

$app_id=$_GET['appointment_id'];
$sql="SELECT * FROM hospital_appointment WHERE appointment_id=$app_id";

if($result = mysqli_query($connection, $sql)){

        $sql_quantity= "UPDATE hospital_appointment SET `status` = 'seen' WHERE appointment_id = '$app_id' ";
$update= mysqli_query($connection, $sql_quantity);
if($update){
    echo '<script>alert("Donor Confirmed."); window.location.href ="../hospital_appointment/hospitalViewConfirmedAppointment.php"; </script>';

   }else{
     echo mysqli_error($connection);
   }
    } else {
        echo "ERROR " . mysqli_error($connection);
}

   
?>