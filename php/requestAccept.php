<?php
session_start();

    include("database_connect.php");
    if(isset($_GET['name']) && isset($_GET['title']) && ISSET($_SESSION['orgName'])){
        $host = $_SESSION['orgName'];
        $title = $_GET['title'];
        $username = $_GET['name'];

        //Verifying that there won't be repititions
        $check = "SELECT * FROM approvals WHERE host = '$host' AND title = '$title' AND participantUsername = '$username'";
        $checkExec = mysqli_query($conn,$check);
        if($checkExec){
            if($checkExec->num_rows > 0){
                $removeQuery = "DELETE FROM requests WHERE host = '$host' AND title = '$title' AND participantUsername = '$username'";
                $exec2 = mysqli_query($conn,$removeQuery);
                if($exec2){
                    echo "Approval successful";
                    header("location:participants.php?title=$title");
                }else{
                    echo "Approval failed";
                }
            }else{
                $Query = "INSERT INTO approvals VALUES ('0','$host','$title','$username')";
                $removeQuery = "DELETE FROM requests WHERE host = '$host' AND title = '$title' AND participantUsername = '$username'";
                $exec = mysqli_query($conn,$Query);
                $exec2 = mysqli_query($conn,$removeQuery);
                if($exec && $removeQuery){
                    echo "Approval successful";
                    header("location:participants.php?title=$title");
                    
                }else{
                    echo "Approval failed";
                }
            }
        }else{
            echo "Approval failed";
        }
        
    }else{
        echo "Approval failed";
    }
