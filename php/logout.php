<?php
    //This file is purely for the sake of destroying the session when clicked and rightly redirecting the user to their respective login/home page
    include('database_connect.php');
    include('setLogout.php');

    $orgLogout = new Setlogout();
    $orgCondition = $orgLogout->setCheckee('orgName');
    $orgLocation = $orgLogout->setLocation("../php/orgLogin.php");
    $orgCheck = $orgLogout->check();
    
    $userLogout = new Setlogout();
    $userCondition = $userLogout->setCheckee('username');
    $userLocation = $userLogout->setLocation('../php/userLogin.php');
    $userCheck = $userLogout->check();

    if($orgCheck){
        $orgLogout->logout();
    }elseif($userCheck){
        $userLogout->logout();
    }else{
        session_destroy();
        header('location:../index.html');
    }
?>