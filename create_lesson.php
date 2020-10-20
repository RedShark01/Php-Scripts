<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require_once 'connect.php';
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$text = $_POST['text'];
	$author = $_POST['author'];
	
	$sql = "INSERT INTO lessons (title, description, text, author) VALUES ('$title','$description','$text','$author')";
	
	if(mysqli_query($link,$sql))
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