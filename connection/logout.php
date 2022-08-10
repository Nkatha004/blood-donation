<?php

session_start();
if(session_destroy())
{
	unset($_SESSION["id"]);
    unset($_SESSION["name"]);
	header("Location: ../homepage.php");
}