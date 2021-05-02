<?php
    session_start();
    include ("database_connect.php");

    //Assigning info to variables if the submit button was clicked....
    if(isset($_POST['eventSubmit'])){
        $id = $_POST['hideId'];
        $eventHost = $_SESSION['orgName'];
        $title = $_POST['eventTitle'];
        $obj = $_POST['eventObj'];
        $require = $_POST['eventReq'];
        $location = $_POST['eventLoc'];
        $mail = $_POST['eventEmail'];
        $rewards = $_POST['rewards'];
        $accomodations = $_POST['arrangements'];
        $link = $_POST['applicationLink'];
        $deadline = $_POST['deadline'];
        $goal = $_POST['eventGoal'];
    }else{
        header("location:../html/noOrgRead.html");          //..., redirecting to error page otherwise
    }

    //Query to update database
    $updateQuery = "UPDATE events SET title = '$title',objective = '$obj',goal = '$goal',
                    requirements = '$require',location = '$location',eventMail = '$mail',
                    eventReward = '$rewards',accomodation = '$accomodations', 
                    applicationLink = '$link', eventEndDate = '$deadline' WHERE eventID = '$id'";

    $update = mysqli_query($conn,$updateQuery);             //Executing the query

    if(!$update){
        header("location:../html/noOrgRead.html");          //In the case of failure, redirecting to an error page...
    }else{
        header("location:orgRead.php");                     //... and back to the events reading page
    }
?>