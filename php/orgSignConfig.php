<?php
include("database_connect.php");        //Establishing database connection
$exist = "";                            //Variable to contain any future errors

if (isset($_POST['orgSubmit'])) {
    $orgName = $_POST['orgName'];
    $orgEmail = $_POST['orgEmail'];
    $pass1 = $_POST['orgPass1'];
    $pass2 = $_POST['orgPass2'];


    //Checking if email or name already exists in database
    $orgQuery = "SELECT * FROM orgLogin WHERE orgMail = '$orgEmail' OR orgName = '$orgName'";   //Query for checking
    $execOrg = mysqli_query($conn, $orgQuery);                      //Executing the query
    if ($execOrg)                                                   //Finding number of rows to determine if info was retrieved
        $checkNumRows = mysqli_num_rows($execOrg);

    if ($checkNumRows !== 0) {
        $exist = "Organization/Email already exists";               //Updating error variable
    }elseif($pass1 !== $pass2){
        $exist = "Passwords do not match";
    }else{ 
        echo "Username/Email permissible for entry";
        $orgName = $_POST['orgName'];
        $orgPhone = $_POST['orgPhone'];
        $orgAddress = $_POST['orgAddress'];
        $orgEmail = $_POST['orgEmail'];
        $orgPostal = $_POST['orgPostal'];
        $orgLink = $_POST['orgLink'];
        $orgPass1 = $_POST['orgPass1'];
        $orgPass2 = $_POST['orgPass2'];

        //Checking password
        if ($orgPass1 === $orgPass2) {
            $orgPass = md5($orgPass1);
            //Checking if email or name already exists in database
            $checkQuery = "SELECT * FROM orgLogin WHERE orgMail = '$orgEmail' OR orgName = '$orgName'";
            $execCheck = mysqli_query($conn, $checkQuery);
            $checkNumRows = mysqli_num_rows($execCheck) === 0 ? true : false;

            if (!$checkNumRows) {
                $exist = "Username already exists";
            }


            //Adding form data to database table
            //First, creating a query
            $query = "INSERT INTO organization(organisationID, orgName, orgPhone, orgAddress, orgMail, orgPostal, orgWebsiteLink) VALUES (0,'$orgName','$orgPhone','$orgAddress','$orgEmail','$orgPostal','$orgLink')";
            $query2 = "INSERT INTO orgLogin(orgMail,orgName,orgPass) VALUES ('$orgEmail','$orgName','$orgPass')";
            //Executing query
            $exec = mysqli_query($conn, $query);
            $exec2 = mysqli_query($conn, $query2);

            //Validating
            if ($exec && $exec2) {
                echo "Addition successful.<br>";
                echo $orgName . " is now a user of our website as an ORGANIZATION.";
                header("location:../php/orgLogin.php");
            } else {
                die("Query failed to execute.");
            }

            $conn_close = mysqli_close($conn);
        } else {
            die("Passwords do not match.");
        }
    }
}
