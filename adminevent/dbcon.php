<?php
	session_start();
$con = mysqli_connect("localhost", "root", "", "intram");
	if($con){
		//echo "SUCCESSFULLY CONNECTED";
	}else{
		echo "CONNECTION FAILED";
		}
?>
