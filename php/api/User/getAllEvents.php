<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
include("../../database_connect.php");

$response = array();

$sqlQuery = "SELECT * FROM events";
$result = $conn->query($sqlQuery);

if ( $result->num_rows > 0){
    $index = 0;
    while( $row = $result->fetch_assoc()){
        $response[$index]['id'] = $row['eventID'];
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
        $index++;
    }
    echo json_encode($response);
} else {
    echo "Query Failed";
}

$conn->close();
?>