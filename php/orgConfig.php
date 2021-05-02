<?php
    session_start();
    include("database_connect.php");        //Establishing database connection

    //Error variables
    $emptyError = "";
    $incorrectError = "";
    
    //Get the login details 
    if(isset($_POST['orgLoginSubmit'])){
        $orgName = $_POST['orgName'];           //The organization's name entered 
        $orgLoginMail = $_POST['orgMail'];      //The login mail entered
        $tempPass = $_POST['orgPass'];          //The password not yet converted to md5
    
        if(empty($orgLoginMail) || empty($tempPass) || empty($orgName)){
            $emptyError = "Email,Username and Password Required";   //Error
        }
    
        //Setting up the password conversion
        $orgLoginPass = md5($tempPass);             //Contains the converted password
    
    
        //Retrieving information from database that corresponds with the login details
        $loginQuery = "SELECT * FROM orgLogin where orgMail = '$orgLoginMail' AND orgPass = '$orgLoginPass' AND orgName = '$orgName' ";
    
        //Executing query
        $exec = mysqli_query($conn,$loginQuery);
    
        //Checking if any information was passed
        $numRows = (mysqli_num_rows($exec) !== 0) ? true:false;
        if($numRows){
            $_SESSION['orgName'] = $orgName;
            $_SESSION['orgEntry'] = "Org Entry Granted";
            echo $_SESSION['orgEntry'];
            header('location:../php/orgRead.php');                  //From the successful login here the organization will now view their events and can edit them
        }else{
            $incorrectError = "Password / Email / Username Incorrect";  //Error
        }
    }