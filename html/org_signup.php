<!-- This is the sign up page for the organization -->
<?php include('../php/orgSignConfig.php'); ?>
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
                        <a class="dropdown-item" href = "../php/userLogin.php">Login</a>
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
        <form method="POST" action="org_signup.php">
            <!-- <form> -->
            <div>
                <input id="orgName" name="orgName" type="text" placeholder="Organization Name" required><br>
            </div></br>
            <div>
                <input id="orgPhone" name="orgPhone" type="tel" placeholder="Phone Number" required><br>
            </div></br>
            <div>
                <input id="orgAddress" name="orgAddress" type="text" placeholder="Address" required><br>
            </div></br>
            <div>
                <input id="orgEmail" name="orgEmail" type="email" placeholder="Email" required><br>
            </div></br>
            <div>
                <input id="orgPostal" name="orgPostal" type="postal" placeholder="Postal Address" required><br>
            </div></br>
            <div>
                <input id="orgLink" name="orgLink" type="url" placeholder="Link" required><br>
            </div></br>
            <div>
                <input id="orgPass1" name="orgPass1" type="password" placeholder="Enter Password" required><br>
            </div></br>
            <div>
                <input id="orgPass2" name="orgPass2" type="password" placeholder="Confirm Password" required><br>
            </div></br>
            <input id="orgSubmit" type="submit" name="orgSubmit" placeholder="submit">
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../js/orgSignups.js"></script>
</html>