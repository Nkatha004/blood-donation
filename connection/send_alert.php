<?php

include('../connection/connect.php');

if(isset($_POST['send_alert'])){
    $sql = "SELECT blood_details_id,donation_date FROM donation WHERE  donation_date <= NOW() - INTERVAL 3 MONTH";
    $result = $connection->query($sql);

    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $details_id = $row['blood_details_id'];
            $sql_details = "SELECT donor_id FROM blood_details WHERE blood_details_id = '$details_id'";
            $result_details = $connection->query($sql_details);
            if (mysqli_num_rows($result_details) > 0){
                while($row_details = mysqli_fetch_assoc($result_details)){
                    $donor_id = $row_details['donor_id'].'<br>';
                    
                    $sql_donor = "SELECT donor_email FROM donor WHERE donor_id = '$donor_id'";
                    $result_donor = $connection->query($sql_donor);
                    if (mysqli_num_rows($result_donor) > 0){
                        while($row_donor = mysqli_fetch_assoc($result_donor)){
                            $to_email = $row_donor['donor_email'];
                           // $to_email = "mmuthiore@gmail.com";
                            $subject = $_POST['subject'];
                            $body = $_POST['message'];
                            $headers = "From: bloodaid1@gmail.com";

                            if (mail($to_email, $subject, $body, $headers)) {
                                echo "<script>alert('Email successfully sent') ; window.location.href ='../hospital_page.php'; </script>";
                            } else {
                                echo "<script>alert('Email sending failed...'); window.location.href ='../hospital/requestBlood.php' ;</script>";
                            }
                        }
                    }
                }
            }
            else{
                echo "<script>alert('Donor not found')</script>";
            }
        }
        
    }
    else{
        echo "<script>alert('No donor found whose donation date was 3 months ago or older');window.location.href='../hospital/requestBlood.php'</script>";
    }
}
else{
    echo "<script>alert('No information was passed');window.location.href='../hospital/requestBlood.php'</script>";
}

?>