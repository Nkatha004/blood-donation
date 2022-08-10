<?php
    $servername = "localhost";
	$user = "root";
	$password = "";
	$database = "blood_donation";
	
	$connection = new mysqli($servername, $user, $password, $database) or die("Not connected".$connection->error);
?>