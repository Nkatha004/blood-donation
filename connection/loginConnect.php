<?php
include('connect.php');
session_start();

$username = $_POST['email'];
$password = $_POST['password'];

$sql_select = "SELECT * FROM donor WHERE donor_email = '$username'";
$sql_hospital = "SELECT * FROM hospital WHERE hospital_email = '$username'";

$result = $connection->query($sql_select);
$result_hospital = $connection->query($sql_hospital);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
       $donor_password = $row['donor_password'];
       $fname = $row['first_name'];
       $lname = $row['last_name'];
       $donor_id = $row['donor_id'];
    }

    if(password_verify($password, $donor_password)){
        $_SESSION['name'] = $fname.' '.$lname;
        $_SESSION['id']=$donor_id;
        echo 1;
    }
    else{
        echo "<script>alert('Donor Login failed');</script>"; 
    }

}

else if(mysqli_num_rows($result_hospital) > 0){
    while($row = mysqli_fetch_assoc($result_hospital))
    {
       $hospital_password = $row['hospital_password'];
       $hospital_name = $row['hospital_name'];
       $hospital_id = $row['hospital_id'];
    }

    if(password_verify($password, $hospital_password)){
        $_SESSION['name'] = $hospital_name;
        $_SESSION['id'] = $hospital_id;
        echo 2;
    }
    else{
        echo "<script>alert('Hospital Login failed');</script>";
    }
}

else{
    echo "<script>alert('User not found!Login failed!');</script>";
}
?>
