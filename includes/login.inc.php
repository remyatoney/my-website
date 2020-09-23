<?php
    include_once './navbar-header.inc.php';
    if (isset($_POST['login-submit'])) {
        require 'dbh-inc.php';
        
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        if (empty($uid) || empty($pwd)) {
            header("Location: ../login.php?error=emptyfields&uid=".$uid);
            exit();
        }
        else {
            $usersObj = new UsersView();
            $usersObj->loginuser($uid, $pwd);
        }
    }
    else {
        header("Location: ../MainPage.php");
        exit();
    }