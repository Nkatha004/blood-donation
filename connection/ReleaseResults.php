<?php

include('connect.php');
session_start()??null;


$donation_id=$_GET['donation_id'];
if(isset($_POST['results'])){
         $donation_id=$_GET['donation_id'];
         $blood_group= $_POST['blood_group'];
         $Rh_type=$_POST['Rh_type'];
         $hepatitis_B= $_POST['hepatitis_B'];
         $hepatitis_C= $_POST['hepatitis_C'];
         $HIV= $_POST['HIV'];
         $Syphilis= $_POST['Syphilis'];
         $bacterial_contamination= $_POST['bacterial_contamination'];
         $t_lymphotropic_virus= $_POST['t_lymphotropic_virus'];


         $sql = "INSERT INTO test_results(donation_id, blood_group, Rh_type, hepatitis_B, hepatitis_C, HIV, Syphilis,
         bacterial_contamination, t_lymphotropic_virus) VALUES('$donation_id', '$blood_group', '$Rh_type', '$hepatitis_B', 
         '$hepatitis_C', '$HIV', '$Syphilis', '$bacterial_contamination', '$t_lymphotropic_virus' )";

if ($connection->query($sql))
{
    $sql_update= "UPDATE donation SET results_status='released' WHERE donation_id=$donation_id";
    if ($connection->query($sql_update)){
        echo '<script>alert("Results successfully entered.");</script>';
        $sql_select = "SELECT blood_details_id FROM donation WHERE donation_id = $donation_id";
        $result_det = $connection->query($sql_select);
        if (mysqli_num_rows($result_det) > 0){
            while($row_det = mysqli_fetch_assoc($result_det)){
                $details_id = $row_det['blood_details_id'];
            

                $sql_details = "SELECT donor_id FROM blood_details WHERE blood_details_id = '$details_id'";
                $result_details = $connection->query($sql_details);
                if (mysqli_num_rows($result_details) > 0){
                    while($row_details = mysqli_fetch_assoc($result_details)){
                        $donor_id = $row_details['donor_id'];
                        
                        $sql_donor = "SELECT donor_email FROM donor WHERE donor_id = '$donor_id'";
                        $result_donor = $connection->query($sql_donor);
                        if (mysqli_num_rows($result_donor) > 0){
                            while($row_donor = mysqli_fetch_assoc($result_donor)){
                                $to_email = $row_donor['donor_email'];
                                
                               //  $to_email = "nkathajoy36@gmail.com";
                             //  $to_email = "mmuthiore@gmail.com";
                                $subject = "Released Test Results";
                                $body = "Hello. Thank you for donating blood. This is to inform you that the test results are now released and you can now view them in your donor dashboard. We say asante sana! For any concerns, contact the respective hospital in charge of your donation.";
                                $headers = "From: bloodaid1@gmail.com";

                                if (mail($to_email, $subject, $body, $headers)) {
                                    echo "<script>alert('Email successfully sent to $to_email...'); window.location.href='../hospital_page.php';</script>";
                                } else {
                                    echo "<script>alert('Email sending failed...');window.location.href='../hospital_page.php';</script>";
                                }
                            }
                        }
                    }
                }
            }
        }
       
    }
    else{
        echo mysqli_error($connection);

    }
}else{
    echo mysqli_error($connection);
}

}
?>