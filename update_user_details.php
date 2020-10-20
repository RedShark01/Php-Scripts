<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require_once 'connect.php';
	
	$id = $_POST['id'];
	$name = $_POST['title'];
	$email = $_POST['description'];
	$info = $_POST['info'];
	$vk_url = $POST['vk_url'];
	
	$sql = "UPDATE users SET name = '$name', email = '$email', info = '$info', vk_url = '$vk_url' WHERE id = '$id'";
	
	$result = mysqli_query($link,$sql);
	$responce = array();
	
	if($result)
	{
		$responce['success'] = 1;
		$responce['massage'] = "Successful";
		
		echo json_encode($responce);
	}
	else
	{
		$responce['success'] = 0;
		$responce['massage'] = "Error : Invalid request";
		
		echo json_encode($responce);
	}
}
else
{
	$responce['success'] = 0;
	$responce['massage'] = "Error : Invalid method";
		
	echo json_encode($responce);
}
?>