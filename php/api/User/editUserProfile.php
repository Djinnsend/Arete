<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

// This api needs to recieve the update details as well as the id of the 
// that we are updating 

$response = array();

if (
    isset($_POST['newFname']) && isset($_POST['newLname']) && isset($_POST['newUsername'])
    && isset($_POST['newDOB']) && isset($_POST['newEmail']) && isset($_POST['newNum']) 
    && isset($_POST['newOccupation']) && isset($_POST['newDescribe']) && isset($_POST['username'])
) {

    $fname = $_POST['newFname'];
    $lname = $_POST['newLname'];
    $username = $_POST['newUsername'];
    $DoB = $_POST['newDOB'];
    $email = $_POST['newEmail'];
    $phoneNum = $_POST['newNum'];
    $occupation = $_POST['newOccupation'];
    $describe = $_POST['newDescribe'];
    $key = $_POST['username'];

    $userTable = "UPDATE users SET username = '$username', phoneNum = '$phoneNum',
                 userMail = '$email', fname = '$fname', lname = '$lname',
                 birthDate = '$DoB', occupation = '$occupation', user_describe = '$describe' 
                 WHERE username = '$key' ";
    $loginTable = "UPDATE userlogin SET userMail = '$email', username = '$username' WHERE username = '$key'";
    $exec = mysqli_query($conn, $userTable);
    $exec2 = mysqli_query($conn, $loginTable);

    if ($exec && $exec2) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    echo json_encode($response);
} else {
    $response['success'] = false;
    $response['message'] = "Not enough parameters passed";
    echo json_encode($response);
}
