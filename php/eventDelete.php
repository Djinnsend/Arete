<?php
    include("database_connect.php");
    if(isset($_GET['orgID'])){
        $deleteQuery = "DELETE FROM events WHERE eventID = '$_GET[orgID]'";

        $exec = mysqli_query($conn,$deleteQuery);
        if(!$exec){
            echo "Delete failed";
            header("location:../html/noOrgRead.html");
        }else{
            echo "Delete successful";
            header('location:orgRead.php');
        }
    }
    

?>