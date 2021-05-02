<?php
    //This file is solely for connecting to the local database on Xampp
    
    //These are the details for the connection
    $username="epiz_28524495";
    $server="sql305.epizy.com";
    // $pass= getenv('MYSQLPASS'??"");
    $pass = "Gu1MCmAidHkd";
    $dbName="epiz_28524495_arete";

    //This is for executing the database connection
    $conn = mysqli_connect($server,$username,$pass,$dbName);

    //This is to check for errorsl
    if(mysqli_connect_error() !== null){
        die("Connection to Database failed");
    }
?>