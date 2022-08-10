<?php
    include('connect.php');

    session_start()??null;

    if(isset($_POST['schedule_drive'])){
        $drive_name = $_POST['drive_name'];
        $drive_location = $_POST['drive_location'];
        $date_from = date('Y-m-d H-i-s',strtotime($_POST['date_from']));
        $date_to = date('Y-m-d H-i-s',strtotime($_POST['date_to']));
        $id = $_SESSION['id'] ?? null;
        
        $sql = "INSERT INTO blood_drive(blood_drive_name, blood_drive_location, date_from, date_to, hospital_id) 
        VALUES('$drive_name', '$drive_location', '$date_from', '$date_to', '$id')";

        if($connection->query($sql))
        {
           echo "<script>window.location.href='../blood_drive/driveHospitalView.php';alert('Successful! Blood drive scheduled.'); </script>";
        }
        else{
           echo "<script>window.location.href='../drive_scheduling.php';alert('Error! Kindly try again.'); </script>";

        }
    }else if(isset($_POST['update_drive'])){
        $drive_id = $_POST['drive_id'];
        $update_drive_name = $_POST['drive_name'];
        $update_drive_location = $_POST['drive_location'];
        $update_date_from = date('Y-m-d H-i-s',strtotime($_POST['date_from']));
        $update_date_to = date('Y-m-d H-i-s',strtotime($_POST['date_to']));
        $update_id = $_SESSION['id'] ?? null;
        
        $sql = "UPDATE blood_drive SET blood_drive_name = '$update_drive_name', blood_drive_location = '$update_drive_location', date_from = '$update_date_from', date_to = '$update_date_to', hospital_id = '$update_id'
        WHERE blood_drive_id = '$drive_id'"; 
        
        if($connection->query($sql))
        {
           echo "<script>window.location.href='../blood_drive/driveHospitalView.php';alert('Successful! Blood drive updated.'); </script>";
        }
        else{
           echo "<script>window.location.href='../editDrive.php';alert('Error! Kindly try again.'); </script>";

        }
    }
    else{
        echo "Data not found!";
    }