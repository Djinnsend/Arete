<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

$response = array();

if (isset($_POST['username'])){
    $username =  $_POST['username'];
    $query = "SELECT * FROM users WHERE username = '$username' ";
    $exec = mysqli_query($conn,$query);

    if($exec){
        if($exec->num_rows > 0){
            $index = 0;
            while ($row = $exec->fetch_assoc()){
                $response[$index]['username'] = $row['username'];
                $response[$index]['phoneNum'] = $row['phoneNum'];
                $response[$index]['email'] = $row['userMail'];
                $response[$index]['fname'] = $row['fname'];
                $response[$index]['lname'] = $row['lname'];
                $response[$index]['birthDate'] = $row['birthDate'];
                $response[$index]['occupation'] = $row['occupation'];
                $response[$index]['user_describe'] = $row['user_describe'];
                $response[$index]['success'] = true;
            }
            echo json_encode($response);
        }else{
            $response['success'] = false;
            $response['message'] = "No user data found";
            echo json_encode($response);
        }
    }else{
        $response['success'] = false;
        $response['message'] = "Database connection failed";
    }
    
}

?>