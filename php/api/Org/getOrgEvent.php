<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

$response = array();

if(isset($_POST['eventID'])){
    $id = $_POST['eventID'];
    $sqlQuery = "SELECT * FROM events WHERE eventID = '$id' ";
    $result = $conn->query($sqlQuery);  
    $index = 0;
    if($result && $result->num_rows == 1){
        while( $row = $result->fetch_assoc()){
            $response[$index]['host'] = $row['host'];
            $response[$index]['title'] = $row['title'];
            $response[$index]['objective'] = $row['objective'];
            $response[$index]['goal'] = $row['goal'];
            $response[$index]['requirements'] = $row['requirements'];
            $response[$index]['location'] = $row['location'];
            $response[$index]['eventMail'] = $row['eventMail'];
            $response[$index]['eventReward'] = $row['eventReward'];
            $response[$index]['accomodation'] = $row['accomodation'];
            $response[$index]['applicationLink'] = $row['applicationLink'];
            $response[$index]['eventEndDate'] = $row['eventEndDate'];
        }
        echo json_encode($response);
    }else{
        $response[$index]['success'] = false;
        echo json_encode($response);
    }
}else{
    $response[0]['success'] = false;
    echo json_encode($response);
}

// $conn->close;

?>
