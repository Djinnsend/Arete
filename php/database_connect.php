<?php
    //This file is solely for connecting to the local database on Xampp
    
    //These are the details for the connection
    $username="bfd0f7d9f70940";
    $server="eu-cdbr-west-01.cleardb.com";
    // $pass= getenv('MYSQLPASS'??"");
    $pass = "fa79aa69";
    $dbName="heroku_4cf8f5d4412c58e";

    //This is for executing the database connection
    $conn = mysqli_connect($server,$username,$pass,$dbName);

    //This is to check for errorsl
    if(mysqli_connect_error() !== null){
        die("Connection to Database failed");
    }
?>