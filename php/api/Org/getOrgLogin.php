<?php   
header('content-Type: JSON');
require("database_connect.php");

if(isset($_GET['orgName']) && isset($_GET['orgMail']) && isset($_GET['orgPass'])) {
    $response = array();

    $orgName = $_GET['orgName'];
    $orgLoginMail = $_GET['orgMail'];
    $orgLoginPass = md5($_GET['orgPass']); 

    $loginQuery = "SELECT * FROM orgLogin where orgMail = '$orgLoginMail' AND orgPass = '$orgLoginPass' AND orgName = '$orgName' ";

    //Executing query
    $exec = mysqli_query($conn, $loginQuery);

    if ($exec !== false) {
        $numRows = (mysqli_num_rows($exec) !== 0) ? true : false;
        if ($numRows) {
            $response['success'] = true;
            $response['message'] = "Login successful";
        } else {
            $response['success'] = false;
            $response['message'] = "Login failed";
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    else{
        echo "Login Failed";
        $response[0] = 0;
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

}

?>