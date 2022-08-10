<?php
include('connect.php');

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
       $sql_update = "UPDATE donor SET donor_password = '$password' WHERE donor_email = '$username'";
    }

    if($connection->query($sql_update))
    {
        echo "<script>window.location.href='../login.php';alert('Password changed successfully. Use your new password to login.'); </script>";
    }
    else{
        header("location: ../forgot_password.php");
    }
}

else if(mysqli_num_rows($result_hospital) > 0){
    while($row = mysqli_fetch_assoc($result_hospital))
    {
        $sql_update_hosp = "UPDATE donor SET donor_password = '$password' WHERE donor_email = '$username'";
    }

    if($connection->query($sql_update_hosp))
    {
        echo "<script>window.location.href='../login.php';alert('Password changed successfully. Use your new password to login.'); </script>";
    }
    else{
        header("location: ../forgot_password.php");
    }
}

else{
    echo("User not found!Update failed!");
}
?>
