<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM users WHERE email='$email'";
	
	$responce = mysqli_query($link,$sql);
	
	$result = array();
	$result['login'] = array();
	
	if(mysqli_num_rows($responce) === 1)
	{
		$row = mysqli_fetch_assoc($responce);
		
		if(password_verify($password, $row['password']))
		{
			$index['name'] = $row['name'];
			$index['email'] = $row['email'];
			
			array_push($result['login'], $index);
			
			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);
			
			mysqli_close($link);
		}
		else
		{
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result);
			
			mysqli_close($link);
		}
	}
}



?>