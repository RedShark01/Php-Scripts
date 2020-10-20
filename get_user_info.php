<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id = $_POST['id'];
	
	require_once 'connect.php';
	$sql = "SELECT * FROM users WHERE id = '$id'";
	
	$responce = mysqli_query($link,$sql);
	
	$result = array();
	$result['read'] = array();
	
	if(mysqli_num_rows($responce) === 1)
	{
		if($row = mysqli_fetch_assoc($responce))
		{
			$h['name'] = $row['name'];
			$h['email'] = $row['email'];
			$h['level'] = $row['level'];
			$h['currentXP'] = $row['currentXP'];
			$h['info'] = $row['info'];
			
			array_push($result[$read], $h);
			
			$result["success"] = "1";
			$result["message"] = "Success";
			echo json_encode($result);
			
			mysqli_close();
		}
		
	}
	
	else
	{
		$result["success"] = "1";
		$result["message"] = "Err";
		echo json_encode($result);
			
		mysqli_close();
	}
}





?>