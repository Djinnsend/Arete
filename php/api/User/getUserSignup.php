<?php   
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
require("../../database_connect.php");

$response = array();

if (
    isset($_POST['username']) && isset($_POST['userMail'])
    && isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['DoB']) && isset($_POST['userNum'])
    && isset($_POST['userJob']) && isset($_POST['user_describe'])
    && isset($_POST['pass1']) && isset($_POST['pass2'])
) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $userName = $_POST['username'];
    $dateOfBirth = $_POST['DoB'];
    $userMail = $_POST['userMail'];
    $userNumber = $_POST['userNum'];
    $userJob = $_POST['userJob'];
    $userDescribe = $_POST['user_describe'];
    if($_POST['pass1'] == $_POST['pass2']){
        $userPass = md5($_POST['pass1']);
    }else{
        $response['error'] = true;
        $response['errorMessage'] = "Passwords don't match";
        echo json_encode($response);
    }


    //Checking if email or name already exists in database
    $userQuery = "SELECT * FROM userLogin WHERE userMail = '$userMail' OR username = '$userName'";
    $execUser = mysqli_query($conn, $userQuery);                      //Executing the query
    if ($execUser) {                                                  //Finding number of rows to determine if info was retrieved
        //If execution successful
        $checkNumRows = mysqli_num_rows($execUser);
        if ($checkNumRows !== 0) {
            //Org already exists
            $response['error'] = true;
            $response['errorMessage'] = "Identity already exists. Please log in";
            echo json_encode($response);
        } else {
            //Org doesn't exist
            $query = "INSERT INTO users(userID,username,phoneNum,userMail,fname,lname,birthDate,occupation,user_describe)VALUES (0,'$username','$userNumber','$userMail','$fname','$lname','$dateOfBirth','$userJob','$userDescribe')";
            $query2 = "INSERT INTO userLogin(userMail,username,userPass) VALUES('$userMail','$userName','$userPass')";
            $queryOne = mysqli_query($conn, $query);
            $queryTwo = mysqli_query($conn, $query2);
            if ($queryOne && $queryTwo){
                $response['error'] = false;
                $response['errorMessage'] = "";
                echo json_encode($response);
            }else{
                $response['error'] = true;
                $response['errorMessage'] = "Query failed. Try again"; 
                echo json_encode($response);   
            }
        }
    } else {
        //If execution fails
        $response['error'] = true;
        $response['errorMessage'] = "Couldn't process data. Try again later";
        echo json_encode($response);
    }

   
}else{
    $response['error'] = true;
    $response['errorMessage'] = "Couldn't process data. Try again later";
    echo json_encode($response);

}
