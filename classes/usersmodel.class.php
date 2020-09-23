<?php

class UsersModel extends Dbh {
    protected function getuser($uid) {
        $sql = "SELECT * FROM users WHERE username=? OR email_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid, $uid]);
        $result = $stmt->fetch();
        return $result;
    }
    protected function setuser($username, $email, $password) {
        $sql = "INSERT INTO users (username, email_id, pwd) VALUES(?,?,?)";
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $hashedPwd]);
    }
}