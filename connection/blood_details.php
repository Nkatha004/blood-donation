<?php

include('connect.php');
session_start()??null;


if(isset($_POST['ddetails'])){
   $hospital_id=$_GET['hospital_id'];
        $donor_id= $_POST['donor_id'];
        $eligibility_status=$_POST['eligibility_status'];
        $reason= $_POST['reason'];
        $donor_weight= $_POST['weight'];
        $haemoglobin_levels= $_POST['hb'];
        $blood_pressure= $_POST['bp'];
        $pulse= $_POST['pulse'];
        $date_filled= date('Y-m-d h:i:s');

     
if($reason!=null){
    $sql = "INSERT INTO blood_details(hospital_id, donor_id, eligibility_status, reason, haemoglobin_levels, donor_weight,
    blood_pressure, pulse, date_filled) VALUES('$hospital_id', '$donor_id', '$eligibility_status', '$reason', '$haemoglobin_levels', 
    '$donor_weight', '$blood_pressure', '$pulse','$date_filled' )";
}else{
    $sql = "INSERT INTO blood_details(hospital_id, donor_id, eligibility_status, haemoglobin_levels, donor_weight,
    blood_pressure, pulse, date_filled) VALUES('$hospital_id', '$donor_id', '$eligibility_status', '$haemoglobin_levels', 
    '$donor_weight', '$blood_pressure', '$pulse','$date_filled' )";
}

       
        
        if ($connection->query($sql))
        {
            $sql_update= "UPDATE hospital_appointment SET blood_details_status='complete' WHERE donor_id=$donor_id";
            if ($connection->query($sql_update)){
                echo '<script>alert("Details entered successfully."); window.location.href ="../donate/hospitalViewDonationDetails.php" </script>';
            }
          else{
            echo mysqli_error($connection);

        }
    }else{
            echo mysqli_error($connection);
}
}

?>