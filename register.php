<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	require_once 'connect.php';
	
	$sql_check = "SELECT FROM users WHERE email = '$email'";
	$sql = "INSERT INTO users(name, email,password) VALUES ('$name','$email','$password')";
	
	if(mysqli_query($link,$sql_check))
	{
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($link);
	}
	
	if(mysqli_query($link, $sql) )
	{
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($link);
		
	}
	else
	{
		$result["success"] = "1";
		$result["message"] = "success";
		
		echo json_encode($result);
		mysqli_close($link);
	}
}

?>