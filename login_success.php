<?php  
include_once 'database.php';
include_once 'session.php';

if(isset($_SESSION["staffid"])) {  
	echo '<script type="text/javascript">'; 
	if($pos==="Admin") {
		echo 'alert("Welcome '.$name.' to Kiyowo BookStore! Your privilege is: Admin");'; 
		echo 'window.location.href = "index.php";';
	}
	else if($pos==="Staff") {
		echo 'alert("Welcome '.$name.' to Kiyowo BookStore! Your privilege is: Normal Staff");'; 
		echo 'window.location.href = "indexx.php";';
	}
	else {
		echo 'alert("Welcome '.$name.' to Kiyowo BookStore! Your privilege is: Supervisor");'; 
		echo 'window.location.href = "indexxx.php";';
	}

	echo '</script>';
}  
else {  
	echo '<script type="text/javascript">'; 
	echo 'alert("Please Login First!");'; 
	echo 'window.location.href = "login.php";';
	echo '</script>';
}
?>  