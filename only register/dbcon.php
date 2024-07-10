<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "intramz");
if($con) {
   //echo "SUCCESS CONNECTED";
}else{
   echo "FAILED TO CONNECT";
}
?>
