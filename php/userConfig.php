<?php
session_start();
require_once "database_connect.php";        //Setting up the database connection

$emptyError = "";
$incorrectError = "";
//Get the login details 
if (isset($_POST['userLoginSubmit'])) {
    $userName = $_POST['username'];           //The username entered 
    $userLoginMail = $_POST['userMail'];      //The login mail entered
    $tempPass = $_POST['userPass'];          //The password not yet converted to md5

    if (empty($userLoginMail) || empty($tempPass) || empty($userName)) {
        $emptyError = "Email,Username and Password Required";   //Error
    }

    //Setting up the password conversion
    $userLoginPass = md5($tempPass);             //Contains the converted password

    //Retrieving information from database that corresponds with the login details
    $loginQuery = "SELECT * FROM userLogin where userMail = '$userLoginMail' AND userPass = '$userLoginPass' AND username = '$userName' ";

    //Executing query
    $exec = mysqli_query($conn, $loginQuery);

    if ($exec !== false) {
        $numRows = (mysqli_num_rows($exec) !== 0) ? true : false;
        if ($numRows) {
            $_SESSION['username'] = $userName;
            $_SESSION['userEntry'] = "User Entry Granted";
            echo $_SESSION['userEntry'];
            header('location:userRead.php');                  //From the successful login here the organization will now view their events and can edit them                
        } else {
            $incorrectError = "Password / Email / Username Incorrect";  //Error
        }
    } else {
        header("location:../html/noUserRead.html");
    }
}
