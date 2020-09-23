<?php

class ContactContr extends ContactModel {
    public function insertquestion ($name, $email, $question) {
        $this->setquestion($name, $email, $question);
    }
}