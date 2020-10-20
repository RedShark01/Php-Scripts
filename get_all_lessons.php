<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	$response = array();

     require_once 'connect.php';

     $result = mysqli_query($link, "SELECT * FROM lessons") or die(mysqli_error());

     if (mysqli_num_rows($result) > 0) {
   
     $response["lessons"] = array();

    while ($row = mysqli_fetch_array($result)) {
		
        $lesson = array();
        $lesson["id"] = $row["id"];
        $lesson["title"] = $row["title"];
        $lesson["text"] = $row["text"];
        $lesson["author"] = $row["author"];

        array_push($response["lessons"], $lesson);
    }
	
    $response["success"] = 1;

    echo json_encode($response);
	
	
} else {
    $response["success"] = 0;
    $response["message"] = "No lessons found";

    echo json_encode($response);
}
}
else
{
	$response["success"] = 0;
    $response["message"] = "No lessons found";

    echo json_encode($response);
}
?>
	







?>