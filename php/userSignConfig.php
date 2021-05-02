<?php
require_once "database_connect.php";        //Establishing database connection
$exist = "";                                //This variable will contain the error to be displayed if the username/mail already exists

/*Working on the form data when the submit button is clicked*/
if (isset($_POST['userSubmit'])) {
    $checkUsername = $_POST['username'];    //This variable will contain the username of the user when signing up
    $checkUserMail = $_POST['userMail'];    //This variable will contain the mail of the user when signing up

    /* This query will call all records that match the username and email that is about to be entered into the database */
    $userQuery = "SELECT * FROM userLogin WHERE userMail = '$checkUserMail' OR username = '$checkUsername'";

    /* Executing the query */
    $execUser = mysqli_query($conn, $userQuery);
    if (!$execUser) {     //Checking that the query was made
        die("Query failed to be executed");
    }

    /* Checking if there is information that has been retrieved. 
    ** If so then the name/mail is in use and so the addition can't be made
    */

    $checkNumRows = mysqli_num_rows($execUser);     //Finding the number of rows. 
    if ($checkNumRows !== 0) {
        $exist = "Username/Email already exists";   //The number of rows from the query will only be greater/ not equal to 0 if information is retrieved.
        //Therefore the $exist error is updated to be displayed.
    }else{ 

        //Proceeding to retrieve the form data for updating the database.
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
        //Checking password
        if ($userPass1 === $userPass2) {
            $userPass = md5($userPass1);
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
                header("location:../php/userLogin.php");
            } else {
                die("Query failed to execute.");
            }

            $conn_close = mysqli_close($conn);
        } else {
            $exist = "Passwords do not match.";
        }
    }
}
