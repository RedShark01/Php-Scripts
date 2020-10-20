<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$id = $_POST['id'];
	
	require_once 'connect.php';
	
	$sql = "SELECT FROM lessons WHERE id = '$id'";
	$result = mysqli_query($link,$sql);
	
	$responce = array();
	
	if($result)
	{
		if(mysqli_num_rows($result) === 1)
		{
			
		    if($row = mysqli_fetch_assoc($result))
		    {
			    $h['title'] = $row['title'];
			    $h['text'] = $row['text'];
		
			    array_push($responce[$read], $h);
			
			    $responce["success"] = "1";
			    $responce["message"] = "Success";
				
			    echo json_encode($responce);
			    mysqli_close($link);
		    }
	    }
	else
	{
		$responce["success"] = "1";
		$responce["massage"] = "Err: cant get sql responce";
		
		echo json_encode($responce);
		mysqli_close($link);
	}
}







?>