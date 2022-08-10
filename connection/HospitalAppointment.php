<?php

include('connect.php');
session_start()??null;
$donor_id = $_SESSION['id']??null;

if(isset($_POST['bookApp'])){
    if($donor_id??null != null){

        $sqldonate="SELECT TIMESTAMPDIFF(MONTH, donation_date, CURDATE()) as `time_apart`
        FROM donation WHERE donation_date =(SELECT max(donation_date) FROM donation LEFT JOIN blood_details ON blood_details.blood_details_id=donation.blood_details_id WHERE donor_id=$donor_id) ";


if ($result = $connection->query($sqldonate))
{
    if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    { 
       
    if($row['time_apart'] > 3) {
        
        $hospital_id= $_POST['hospital'];
        $date= $_POST['app_date'];
        $time= $_POST['app_time'];

        $sql = "INSERT INTO hospital_appointment(donor_id, hospital_id, `date`, `time`) VALUES('$donor_id', '$hospital_id', '$date', '$time' )";
        
    if ($connection->query($sql))
    {
        echo '<script>alert("Appointment created."); window.location.href ="../donor_page.php" </script>';

    }else{
        echo mysqli_error($connection);
    }
    }else{
         echo '<script>alert("You must wait a period of 3 months from your last donation to donate."); window.location.href ="../donor_page.php" </script>';
}
    }
}else{
    $hospital_id= $_POST['hospital'];
        $date= $_POST['app_date'];
        $time= $_POST['app_time'];

        $sql = "INSERT INTO hospital_appointment(donor_id, hospital_id, `date`, `time`) VALUES('$donor_id', '$hospital_id', '$date', '$time' )";
        
    if ($connection->query($sql))
    {
        echo '<script>alert("Appointment created."); window.location.href ="../donor_page.php" </script>';

    }else{
        echo mysqli_error($connection);
    }
}
}else{
    echo mysqli_error($connection);
}
    
      
    }else{
        echo '<script>alert("Please login first then book an appointment"); window.location.href="../login.php";
        </script>';
    }
}
if(isset($_POST['update'])){
    $appointment_id=$_GET['appointment_id'];
    $hospital_id= $_POST['hospital'];
    $date= $_POST['app_date'];
    $time= $_POST['app_time'];


        $sqlupdate = "UPDATE hospital_appointment set hospital_id= '$hospital_id', `date`= '$date', `time`='$time' WHERE appointment_id=$appointment_id";
        
        if ($connection->query($sqlupdate))
        {
            echo '<script>alert("Appointment updated."); window.location.href ="../hospital_appointment/donorViewAppointments.php" </script>';

        }else{
            echo mysqli_error($connection);

        }
  
  }
  if(isset($_POST['cancel_app'])){
    $appointment_id = $_GET['appointment_id']??null;

    $sql_delete = "DELETE FROM hospital_appointment WHERE appointment_id = '$appointment_id'";

if($connection->query($sql_delete))
{
    echo "<script>alert('Appointment Canceled');window.location.href = '../hospital_appointment/donorViewAppointments.php'</script>";
}else{
    echo "<script>alert('Failed to cancel appointment');window.location.href = '../hospital_appointment/donorViewAppointments.php'</script>";
}
  }
?>