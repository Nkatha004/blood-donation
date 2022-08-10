<?php

include('connect.php');
session_start()??null;

$id=$_GET['id'];
$sql="SELECT * FROM hospital WHERE hospital_id=$id";
if(isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location=$_POST['location'];
    $phoneNo = $_POST['phoneNo'];

    if($result = mysqli_query($connection, $sql)){

        $sql_quantity= "UPDATE hospital SET `hospital_name` =  '$name', `hospital_location`= '$location', `hospital_email` =  '$email', `hospital_phoneNo` =  '$phoneNo' WHERE hospital_id = '$id' ";
        $update= mysqli_query($connection, $sql_quantity);
        if($update){
            echo '<script>alert("Successfully updated."); window.location.href ="../hospital/hospital_profile.php" </script>';

        }else{
            echo mysqli_error($connection);
        }

    } else {
        echo "ERROR " . mysqli_error($connection);
    }
}
   
?>