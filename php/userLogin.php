<?php include('userConfig.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

    <div class="login">
        <h1>LOGIN</h1>
        <form method="POST" action="userLogin.php">
            <label for="userMail">
                <i class="fas fa-user"></i>
            </label>
            <input id="userMail" name="userMail" type="email" placeholder="User's Registered Email" required><br><br>
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input id="username" name="username" type="text" placeholder="Username" required><br><br>
            <label for="userPass">
                <i class="fas fa-lock"></i>
            </label>
            <input id="userPass" name="userPass" type="password" placeholder="Password" required>
            <input id="userLoginSubmit" name="userLoginSubmit" type="submit" placeholder="Login">
            <?php echo $emptyError ?>
            <?php echo $incorrectError ?>
            <a class="link" href="../html/user_signup.php">Sign Up<a><br>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>