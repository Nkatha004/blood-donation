<?php
    include('connect.php');

    if(isset($_POST['donor_reg'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $donor_email = $_POST['donor_email'];
        $donor_phoneNo = $_POST['donor_phoneNo'];
        $donor_password = password_hash($_POST['donor_password'], PASSWORD_DEFAULT);
        $gender = $_POST['gender']; 

        $dob=strtotime($_POST['date_of_birth']);
        $min_age=strtotime('+16 years',$dob);
        $max_age=strtotime('+65 years',$dob);
        
         if(time()>$min_age && time()<$max_age){
            $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));

            $sql = "INSERT INTO donor(first_name, last_name, donor_email, donor_password, donor_phoneNo, gender, date_of_birth) 
            VALUES('$fname', '$lname', '$donor_email', '$donor_password', '$donor_phoneNo','$gender', '$date_of_birth')";
    
            if($connection->query($sql))
            {
                echo "<script>window.location.href='../login.php';alert('Registration successfull.'); </script>";
            }
            else{
                header("location: ../donor_registration.php");
            }
            
         }else{
             echo "<script>window.location.href='../homepage.php';alert('Sorry. You must be between 16 and 65 years to be able to donate.'); </script>";
         }
        
    }
    else if(isset($_POST['hospital_reg'])){
        $hospital_name = $_POST['hospital_name'];
        $hospital_email = $_POST['hospital_email'];
        $hospital_phoneNo = $_POST['hospital_phoneNo'];
        $hospital_password = password_hash($_POST['hospital_password'], PASSWORD_DEFAULT);
        $hospital_location=$_POST['hospital_location'];
        
        $sql_hospital = "INSERT INTO hospital(hospital_name, hospital_email, hospital_password, hospital_phoneNo, hospital_location) VALUES
        ('$hospital_name', '$hospital_email', '$hospital_password', '$hospital_phoneNo', '$hospital_location')";

        if($connection->query($sql_hospital))
        {
            echo "<script>window.location.href='../login.php';alert('Registration successfull.'); </script>";
        }
        else{
            header("location: ../hospital_registration.php");
        }
    }
    else{
        echo "Data not found";
    }

    
   
?>