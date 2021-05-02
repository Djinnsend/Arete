<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

// This api needs to recieve the username, title of event and the host
$response = array();
$username = $_POST['username'];
$title = $_POST['title'];
$host = $_POST['host'];

if(isset($title) && isset($username) && isset($host)){
    //Searching
    $search = "SELECT * WHERE host = '$host' AND title = '$title' AND participantUsername = '$username'";
    $exec_search = mysqli_query($conn,$search);
    if($exec_search && $exec_search->num_rows > 0){
        $response['success'] = true;
        echo json_encode($response);
    }else{
        $insert = "INSERT INTO requests VALUES(0,'$host','$title','$username')";
        $exec = mysqli_query($conn,$insert);
        if($exec){
            $response['success'] = true;
            echo json_encode($response);
        }else{
            $response['success'] = false;
            echo json_encode($response);
        }
    }
}else{
    $response['success'] = false;
    echo json_encode($response);
}

?>
