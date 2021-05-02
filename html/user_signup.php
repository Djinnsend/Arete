<!-- This is the sign up page for the user -->
<?php include('../php/userSignConfig.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Sign Up</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../styles/logins.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Navigation Bar -->
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
                        <a class="dropdown-item" href = "../php/orgLogin.php">Login</a>
                        <a class="dropdown-item" href="../html/org_signup.php">Sign Up</a>
                    </div>
                </li>
                <a class="nav-link" href="../php/logout.php">Logout</a>
        </div>
    </nav>
     
    <div class="login" id="register">
        <h1>SIGN UP</h1>
        <h1><?php echo $exist; ?></h1>
        <form method="POST" action="user_signup.php">
            <!-- <form> -->
            <div>
                <input id="fname" type="text" name="fname" placeholder="First Name" required><br>
            </div></br>
            <div>
                <input id="lname" type="text" name="lname" placeholder="Last Name" required><br>
            </div></br>
            <div>
                <input id="username" type="text" name="username" placeholder="Username" required><br>
            </div></br>
            <div>
                <input id="DoB" name="DoB" type="date" placeholder="Date of Birth" required><br>
            </div></br>
            <div>
                <input id="userMail" name="userMail" type="email" placeholder="Email Address" required><br>
            </div></br>
            <div>
                <input id="userNum" name="userNum" type="tel" placeholder="Phone Number" required><br>
            </div></br>
            <div>
                <input id="userJob" name="userJob" type='text' placeholder="Occupation" required><br>
            </div></br>
            <div>
                <input id="userPass1" name="userPass1" type="password" placeholder="Enter Password" required><br>
            </div></br>
            <div>
                <input id="userPass2" name="userPass2" type="password" placeholder="Confirm Password" required><br>
            </div></br>
            <div>
                <textarea id="user_describe" name="user_describe" placeholder="Please describe yourself in 500 characters or less" required></textarea><br>
            </div></br>
            <input id = "userSubmit" type="submit" name="userSubmit" placeholder="submit">
        </form>'
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../js/userSignups.js"></script>
</html>