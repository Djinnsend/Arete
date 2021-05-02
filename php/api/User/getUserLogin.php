<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['Password'])) {
    $response = array();

    $userName = $_POST['Username'];
    $userLoginMail = $_POST['Email'];
    $userLoginPass = md5($_POST['Password']); 

    $loginQuery = "SELECT * FROM userLogin where userMail = '$userLoginMail' AND userPass = '$userLoginPass' AND username = '$userName' ";

    //Executing query
    $exec = mysqli_query($conn, $loginQuery);

    if ($exec !== false) {
        $numRows = (mysqli_num_rows($exec) !== 0) ? true : false;
        if ($numRows) {
            $response['success'] = true;
            // $response['message'] = "Login successful";
        } else {
            $response['success'] = false;
            // $response['message'] = "Login failed";
        }
        echo json_encode($response);
    }
    else{
        echo "Login Failed";
    }

}else{
    $response['success'] = false;
    $response['message'] = "Login failed";
    echo json_encode($response);
}

// echo json_encode($_POST['Username']);

?>