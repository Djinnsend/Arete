<?php
session_start();
//Meant to verify if individual accessing the page has signed in or not
include("database_connect.php");
if (!(isset($_SESSION['username']))) {
    echo "User is not logged in";
    header("location:userLogin.php");
}

// Query to get all the information about events from the events table
$allInfoQuery = "SELECT * FROM events";
$exec = mysqli_query($conn, $allInfoQuery);     //Executing the query

if (!$exec) {                                     //Meant to check and end the script from ending if the query was unable to run
    die("Query failed to execute");
}
$numRows = mysqli_num_rows($exec);              //This finds the number of rows. If it is 0 then no info was retrieved and so we end it 
if ($numRows === 0) {
    // die("No information retrieved from database");
    //Place a header link to a page that says no information to display
    header('location:../html/noEventUser.html');
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username'] . "'s Events" ?></title>
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
            <caption>List of Events Available</caption>


            <thead class="thead-dark">
                <tr>
                    <!-- <th hidden>Hiding ID</th> -->
                    <th scope="col">Host</th>
                    <th scope="col">Title</th>
                    <th scope="col">Objective</th>
                    <th scope="col">Goal</th>
                    <th scope="col">Requirements</th>
                    <!-- You need a page telling the organization what each column means. Same for the user -->
                    <th scope="col">Location</th>
                    <th scope="col">Contact Mail</th>
                    <th scope="col">Rewards</th>
                    <th scope="col">Accomodation</th>
                    <th scope="col">Application Link</th>
                    <th scope="col">Deadline Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($exec)) {
                    echo <<<EOT
                    <tr>
                        <td>$row[host]</td>
                        <td>$row[title]</td>
                        <td>$row[objective]</td>
                        <td>$row[goal]</td>
                        <td>$row[requirements]</td>
                        <td>$row[location]</td>
                        <td>$row[eventMail]</td>
                        <td>$row[eventReward]</td>
                        <td>$row[accomodation]</td>
                        <td>$row[applicationLink]</td>
                        <td>$row[eventEndDate]</td>
                    </tr>
                    EOT;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../js/eventVerify.js"></script>
</html>