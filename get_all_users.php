<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$responce = array();
	require_once 'connect.php';
	
	$sql = "SELECT * FROM users";
	$result = mysqli_query($link, $sql) or die(mysqli_error());
	 
	if (mysqli_num_rows($result) > 0) 
	{
		$response["users"] = array();
		
		while ($row = mysqli_fetch_array($result)) 
	    {
			$user = array();
            $user["id"] = $row["id"];
            $lesson["name"] = $row["name"];
            $lesson["accountPhoto"] = $row["accountPhoto"];

            array_push($response["users"], $user);
        }

        $response["success"] = 1;

        echo json_encode($response);
	
    } 
	else 
	{
    $response["success"] = 0;
    $response["message"] = "No users found";

    echo json_encode($response);
    }
}
else
{
	$response["success"] = 0;
    $response["message"] = "No users found";

    echo json_encode($response);
}
	
?>