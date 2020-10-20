<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$level = $_POST['level'];
	$currentXP = $_POST['currentXP'];
	$accountPhoto = $_POST['accountPhoto'];
	
	require_once 'connect.php';
	
	$sql = "UPDATE users SET name = '$name', email = '$email', password= '$password', currentXP='$currentXP', level='$level', accountPhoto='$accountPhoto' WHERE id = '$id'";
	
	$responce = mysqli_query($link,$sql);
	
	mysqli_close($link);
	
}	



?>