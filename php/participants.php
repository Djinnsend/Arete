<?php
session_start();
include_once('database_connect.php');

//This is for making sure that a signed in organization is able to read it.
if (!(isset($_SESSION['orgName']))) {
    echo "Organization has not logged in";
    header("location:orgLogin.php");
}
elseif(isset($_SESSION['orgName']) && isset($_GET['title']))
{
    $host = $_SESSION['orgName'];
    $title = $_GET['title'];
    $participantQuery = "SELECT * FROM requests WHERE host = '$host' AND title = '$title'";
    $firstExec = mysqli_query($conn,$participantQuery);
}

else {

    // Query to get all the information about events from the events table
    $orgInfoQuery = "SELECT * FROM events WHERE host = '$_SESSION[orgName]'";
    $firstExec = mysqli_query($conn, $orgInfoQuery);     //Executing the query

    if (!$exec) {
        header('location:../html/noOrgRead.html');             //Redirecting the organization to an error webpage.

    }

    $numRows = mysqli_num_rows($exec);
    if ($numRows === 0) {
        // die("No information retrieved from database");
        header('location:../html/noEventOrg.html');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['title'] . "'s Participants" ?> </title>
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
    <div class="table-responsive-lg">
        <table class="table table-dark table-borderless table-hover table-responsive-lg">
            <caption>List of Participants Available</caption>
            <thead class="thead-dark">
                <tr>
                    <!-- <th hidden>Hiding ID</th> -->
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_assoc($firstExec)) {    //Each row contains a participant's username
                    $unique_name = $row['participantUsername'];
                    $individualsQuery = "SELECT * FROM users WHERE username = '$unique_name'";
                    $exec = mysqli_query($conn,$individualsQuery);
                    if($exec->num_rows == 0){
                        echo <<<EOT
                    <tr>
                        <td>No participants Found</td>
                        <td>No participants Found</td>
                    </tr>
                    EOT; 
                    }else{
                        while ($person = mysqli_fetch_assoc($exec)){
                            echo <<<EOT
                        <tr>
                            <td>$person[fname]</td>
                            <td>$person[lname]</td>
                            <td>$person[user_describe]</td>
                            <td>$person[occupation]</td>
                            <td>$person[birthDate]</td>
                            <td>$person[userMail]</td>
                            <td>$person[phoneNum]</td>
                            <td><a href = requestAccept.php?title=$title&name=$unique_name>Accept</a> 
                            || <a href = deleteRequest.php?title=$title&name=$unique_name>Decline</a></td>
                        </tr>
                        EOT;
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="../js/eventVerify.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>