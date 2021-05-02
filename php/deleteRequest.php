<?php
    session_start();
    include("database_connect.php");
    if(isset($_GET['name']) && isset($_GET['title']) && ISSET($_SESSION['orgName'])){
        $host = $_SESSION['orgName'];
        $title = $_GET['title'];
        $username = $_GET['name'];
        $removeQuery = "DELETE FROM requests WHERE host = '$host' AND title = '$title' AND participantUsername = '$username' ";
        $exec = mysqli_query($conn,$removeQuery);
        if($removeQuery == true){
            echo "Deletion successful";
            header("location:participants.php?title=$title");            
        }else{
            echo "Approval failed";
        }
    }else{
        echo "Approval failed";
    }
    

?>