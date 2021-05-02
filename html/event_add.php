<?php
session_start();                    //Allows access to the SESSION variables.

if (isset($_SESSION['orgName'])) {  //Tests whether or not an organization has signed in. 
} else {                            //If not then send the organization to the login page.
    echo "Organization hasn't signed in";
    header('location:../php/orgLogin.php');
}

?>
<!-- This is for adding an event -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../styles/logins.css" rel="stylesheet" type="text/css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img class="rounded float-left image" src="../images/logo/volunteer.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="nav-link" href="../index.php">Home</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Applicant
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../php/userLogin.php">Login</a>
                        <a class="dropdown-item" href="../html/user_signup.php">Sign Up</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Organization
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../php/orgLogin.php">Login</a>
                        <a class="dropdown-item" href="../html/org_signup.php">Sign Up</a>
                    </div>
                </li>
                <a class="nav-link" href="../php/logout.php">Logout</a>
        </div>
    </nav>
    <div class="login" id="register">
        <h1>EVENT ADDITION</h1>
        <form method="POST" action="../php/eventAdd.php">
            <!-- <form> -->
            <input id="eventTitle" name="eventTitle" type="text" placeholder="Event Title" required><br>
            <textarea id="eventObj" name="eventObj" placeholder="Objectives of Event (100 Characters)" required></textarea><br>
            <textarea id="eventGoal" name="eventGoal" placeholder="Goals of Event (110 characters)" required></textarea><br>
            <textarea id="eventReq" name="eventReq" placeholder="Requirements/Skillset of Event (100 characters)" required></textarea><br>
            <textarea id="eventLoc" name="eventLoc" placeholder="Location of Event (100 characters)" required></textarea><br>
            <input id="eventEmail" name="eventEmail" type="email" placeholder="Contact Email" required><br>
            <textarea id="rewards" name="rewards" placeholder="Rewards of Event (100 characters)" required></textarea><br>
            <!-- <label for="arrangements">
                <i class="fas fa-user"></i>
            </label> -->
            <select name="arrangements" id="arrangements" placeholder = "Accommodations" required><br>
                <option id="Yes" value="accommodations">Accommodations Will Be Provided</option>
                <option id="No" value="no_accommodations">Accommodations Will Not Be Provided</option>
            </select><br>
            <input id="applicationLink" name="applicationLink" type="url" placeholder="Link for Applicants Application" required><br>
            <input id="deadline" name="deadline" type="date" required><br>
            <input type="submit" name="eventSubmit" id="eventSubmit">

        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../js/eventSignups.js"></script>
</html>