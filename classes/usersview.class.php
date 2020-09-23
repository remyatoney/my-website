<?php

class UsersView extends UsersModel {
    public function loginuser($uid, $pwd) {
        $result = $this->getuser($uid);
        if ($result) {
            $pwdCheck = password_verify($pwd, $result['pwd']);
            if ($pwdCheck == false) {
                header("Location: ../login.php?error=wrongpassword&uid=".$uid);
                exit();
            }
            else {
                $_SESSION['userId'] = $result['id'];
                $_SESSION['userUid'] = $result['username'];
                header("Location: ../login.php?login=success");
                exit();
            }
        }
        else {
            header("Location: ../login.php?error=userdoesnotexist");
            exit();
        }
    }
    public function checkuser($uid) {
        $result = $this->getuser($uid);
        if ($result) {
            header("Location: ../signup.php?error=usertaken&mail=".$email);
            exit();
        }
    }
}