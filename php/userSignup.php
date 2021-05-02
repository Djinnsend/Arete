<?php
require_once "database_connect.php";

// Getting form data from event_add.html
if (isset($_POST['userSubmit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $userName = $_POST['username'];
    $dateOfBirth = $_POST['DoB'];
    $userMail = $_POST['userMail'];
    $userNumber = $_POST['userNum'];
    $userJob = $_POST['userJob'];
    $userDescribe = $_POST['user_describe'];
    $userPass1 = $_POST['userPass1'];
    $userPass2 = $_POST['userPass2'];
} else {
    die("Unable to retrieve all information from form." . "<br>");
}

//Checking password
if($userPass1 === $userPass2){
    $userPass = md5($userPass1);
}else{
    die("Passwords do not match.");
}

//Adding form data to database table
//First, creating a query
$query = "INSERT INTO users(userID,username,phoneNum,userMail,fname,lname,birthDate,occupation,user_describe)VALUES (0,'$username','$userNumber','$userMail','$fname','$lname','$dateOfBirth','$userJob','$userDescribe')";
$query2 = "INSERT INTO userLogin(userMail,username,userPass) VALUES('$userMail','$userName','$userPass')";
//Executing query
$exec = mysqli_query($conn, $query);
$exec2 = mysqli_query($conn, $query2);

//Validating
if ($exec && $exec2) {
    echo "Addition successful.<br>";
    echo $fname . " " . $lname . " is now a USER of our website.";
} else{
    die("Query failed to execute.");
}

$conn_close = mysqli_close($conn);

?>
