<?php
   $RegUsername = $_POST['RegUsername'];
   $RegEmail = $_POST['RegEmail'];
   $RegPassword = $_POST['RegPassword'];
   $RegConfirmPassword = $_POST['RegConfirmPassword'];


//Database connection

$conn = new mysqli('localhost','root','','simplistic');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into registration(RegUsername,RegEmail,RegPassword,RegConfirmPassword)
	VALUES('$RegUsername','$RegEmail','$RegPassword','$RegConfirmPassword')");
	$stmt->bind_param("ssss",$RegUsername,$RegEmail,$RegPassword,$RegConfirmPassword);
	$stmt->execute();
	echo "Welcome";
	$stmt->close();
	$conn->close();
	
}






?>