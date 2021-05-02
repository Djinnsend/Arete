<?php
session_start();
include("database_connect.php");        //Establishing database connection

// Getting form data from event_add.html
if(isset($_POST['eventSubmit'])){
    $eventHost = $_SESSION['orgName'];
    $event_title = $_POST['eventTitle'];
    $event_obj = $_POST['eventObj'];
    $event_require = $_POST['eventReq'];
    $event_location = $_POST['eventLoc'];
    $event_mail = $_POST['eventEmail'];
    $event_rewards = $_POST['rewards'];
    $event_accomodations = $_POST['arrangements'];
    $event_link = $_POST['applicationLink'];
    $event_deadline = $_POST['deadline'];
    $event_goal = $_POST['eventGoal'];
}else{
    die("Unable to retrieve all information from form." . "<br>");
}

//Adding form data to database table
//First, creating a query
$query = "INSERT INTO events(eventID,host,title,objective,goal,requirements,location,eventMail,eventReward,accomodation,applicationLink,eventEndDate) VALUES (0,'$eventHost','$event_title','$event_obj','$event_goal','$event_require','$event_location','$event_mail','$event_rewards','$event_accomodations','$event_link','$event_deadline')";

//Executing query
$exec = mysqli_query($conn,$query);

//Validating query and jumping to orgChoice.html for the organization to decide where they shall go next upon success.
// Upon failure the individual is redirected to an error page.
if($exec){
    echo "Addition successful.<br>";
    echo "Event is now added to the list.";
    header("location:../html/orgChoice.html");
}else{
    header('location:../html/noOrgRead');
}

$conn_close = mysqli_close($conn);

?>