<?php
include('database_connect.php');            //Establishing database connection
$updateQuery = "SELECT * FROM events WHERE eventID = '$_GET[orgID]' LIMIT 1";           //Query meant to retrieve from the database

$exec = mysqli_query($conn, $updateQuery);       //Executing the query
if (!$exec) {                                     //Making sure that should the query fail, the person is relocated
    header("location:../html/noOrgRead.html");
}
$numRows = mysqli_num_rows($exec);              //Finding the number of rows retrieved upon execution of the query.
if ($numRows === 0) {                             //If the number is 0, then there was no info retrieved and so redirection is done.
    header("location:../html/noOrgRead.html");
} else {
    while ($row = mysqli_fetch_assoc($exec)) {    //Here the information from the query, if present is retrieved and assigned.
        $id = $row['eventID'];
        $title = $row['title'];
        $obj = $row['objective'];
        $goal = $row['goal'];
        $requirements = $row['requirements'];
        $location = $row['location'];
        $mail = $row['eventMail'];
        $reward = $row['eventReward'];
        $acco = $row['accomodation'];
        $link = $row['applicationLink'];
        $date = $row['eventEndDate'];
    }
}
// Within the following HTML code we take in the data from the variables and allocate them to their inputs. That is not possible for the text areas which will require
// that they are refilled. The individual may type in their new data into any of the fields and click submit, sending the server to updateConfig.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Sign Up</title>
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
                        <a class="dropdown-item" href="userLogin.php">Login</a>
                        <a class="dropdown-item" href="../html/user_signup.php">Sign Up</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Organization
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="orgLogin.php">Login</a>
                        <a class="dropdown-item" href="../html/org_signup.php">Sign Up</a>
                    </div>
                </li>
                <a class="nav-link" href="../php/logout.php">Logout</a>
        </div>
    </nav>

    <div class="login" id="register">
        <h1>EVENT ADDITION</h1>
        <form method="POST" action="updateConfig.php">
            <input id="hideId" name="hideId" type="hidden" value="<?php echo $id ?>">
            <input id="eventTitle" name="eventTitle" type="text" value="<?php echo $title ?>" placeholder="Event Title"><br>
            <textarea id="eventObj" name="eventObj" value="<?php echo $obj ?>" placeholder="Objectives of Event (500 Characters)"></textarea><br>
            <textarea id="eventGoal" name="eventGoal" value="<?php echo $goal ?>" placeholder="Goals of Event (150 characters)" required></textarea><br>
            <textarea id="eventReq" name="eventReq" value="<?php echo $requirements ?>" placeholder="Requirements/Skillset of Event (500 characters)" required></textarea><br>
            <textarea id="eventLoc" name="eventLoc" value="<?php echo $location ?>" placeholder="Location of Event (100 characters)" required></textarea><br>
            <input id="eventEmail" name="eventEmail" type="email" value="<?php echo $mail ?>" placeholder="Contact Email" required><br>
            <textarea id="rewards" name="rewards" value="<?php echo $reward ?>" placeholder="Rewards of Event (500 characters)"></textarea><br>
            <label for="arrangements">
                <i class="fas fa-user"></i>
            </label>
            <select name="arrangements" id="arrangements" value="<?php echo $acco ?>"><br>
                <option id="Yes" value="accommodations">Accommodations Will Be Provided</option>
                <option id="No" value="no_accommodations">Accommodations Will Not Be Provided</option>
            </select><br>
            <input id="applicationLink" name="applicationLink" type="url" value="<?php echo $link ?>" placeholder="Link for Applicants Application"><br>
            <input id="deadline" name="deadline" type="date" value="<?php echo $date ?>"><br>
            <input type="submit" name="eventSubmit" id="eventSubmit">
        </form>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>