<?php

class ContactModel extends Dbh {
    protected function setquestion($name, $email, $question) {
        $sql = "INSERT INTO contact (name, email, question) VALUES(?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $question]);
    }    
}