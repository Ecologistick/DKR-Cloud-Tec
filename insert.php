<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($username)||!empty($email)||!empty($password))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "root";
	$dbName = "accounts";
	
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbName);
	
	if (mysqli_connect_error()) 
	{
	}
	else
	{
		$INSERT = "INSERT INTO accounts (username, password, email) VALUES (?,?,?)";
		//$INSERT = "INSERT INTO `accounts`( `username`, `password`, `email`) VALUES (?,?,?)"
		
		$stmt = $conn->prepare($INSERT);
		$stmt ->bind_param("sss",$username,$password,$email);
		$stmt->execute();
		echo "вы успешно зарегистрировались";
	}
	$stmt->close();
	$conn->close();
	//
}
else{
	
	die();
}
?>