<?php

include('connect.php');
session_start()??null;

$id=$_GET['id'];
$sql="SELECT * FROM donor WHERE donor_id=$id";
if(isset($_POST)){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $gender=$_POST['gender'];
    $phoneNo = $_POST['phoneNo'];
    $dob = $_POST['dob'];


    if($result = mysqli_query($connection, $sql)){

        $sql_update= "UPDATE donor SET `first_name` =  '$fname', `last_name` =  '$lname', `gender`= '$gender', `donor_email` =  '$email', `donor_phoneNo` =  '$phoneNo', `date_of_birth` = '$dob' WHERE donor_id = '$id' ";
        $update= mysqli_query($connection, $sql_update);
        if($update){
            echo '<script>alert("Successfully updated."); window.location.href ="../donor/donor_profile.php" </script>';

        }else{
            echo mysqli_error($connection);
        }

    } else {
        echo "ERROR " . mysqli_error($connection);
    }
}
   
?>