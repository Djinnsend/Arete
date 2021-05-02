<?php
header('content-Type: JSON');
require("database_connect.php");

$response = array();

if (
    isset($_GET['orgName']) && isset($_GET['orgMail']) &&
    isset($_GET['orgPhone']) && isset($_GET['orgAddress']) &&
    isset($_GET['orgPostal']) && isset($_GET['orgLink']) && isset($_GET['orgPass'])
) {

    $orgName = $_GET['orgName'];
    $orgPhone = $_GET['orgPhone'];
    $orgAddress = $_GET['orgAddress'];
    $orgEmail = $_GET['orgMail'];
    $orgPostal = $_GET['orgPostal'];
    $orgLink = $_GET['orgLink'];
    $orgPass1 = md5($_GET['orgPass']);

    //Checking if email or name already exists in database
    $orgQuery = "SELECT * FROM orgLogin WHERE orgMail = '$orgEmail' OR orgName = '$orgName'";   //Query for checking        
    $execOrg = mysqli_query($conn, $orgQuery);                      //Executing the query
    if ($execOrg) {                                                  //Finding number of rows to determine if info was retrieved
        //If execution successful
        $checkNumRows = mysqli_num_rows($execOrg);
        if ($checkNumRows !== 0) {
            //Org already exists
            $response['error'] = true;
            $response['errorMessage'] = "Identity already exists. Please log in";
        }else{
            //Org doesn't exist
            $query = "INSERT INTO organization(organisationID, orgName, orgPhone, orgAddress, orgMail, orgPostal,
            orgWebsiteLink) VALUES (0,'$orgName','$orgPhone','$orgAddress','$orgEmail','$orgPostal','$orgLink')";
            $query2 = "INSERT INTO orgLogin(orgMail,orgName,orgPass) VALUES ('$orgEmail','$orgName','$orgPass')";
            $queryOne = mysqli_query($conn, $query);
            $queryTwo = mysqli_query($conn, $query2);
            if ($queryOne && $queryTwo){
                $response['error'] = false;
                $response['errorMessage'] = "";
            }else{
                $response['error'] = true;
                $response['errorMessage'] = "Query failed. Try again";    
            }
        }
    }else{
        //If execution fails
        $response['error'] = true;
        $response['errorMessage'] = "Couldn't process data. Try again later";
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
    /* 
    With this api, it sends back a response with error and the message. 
    Only upon succession, is the error false and no message and the data is added to the table
    */
}
