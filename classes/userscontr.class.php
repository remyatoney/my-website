<?php

class UsersContr extends UsersModel {
    public function createuser($username, $email, $password) {
        $this->setuser($username, $email, $password);
        header("Location: ../signup.php?signup=success");
        exit();
    }
}