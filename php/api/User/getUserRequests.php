<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

$response = array();

if(isset($_POST['username']))
$name = $_POST['username'];
$sqlQuery = "SELECT * FROM requests WHERE participantUsername = '$name'";
$exec = mysqli_query($conn,$sqlQuery);

if($exec){
    $index = 0;
    if($exec->num_rows > 0){ //Thus there would be results as query successful
        $index = 0;
        while( $row = $exec->fetch_assoc()){
            $response[$index]['title'] = $row['title'];
            $response[$index]['host'] = $row['host'];
            $index++;
        }
        echo json_encode($response);
    }else{
        echo json_encode("Query Failed");
    }
}
?>