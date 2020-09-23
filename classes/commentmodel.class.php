<?php

class CommentModel extends Dbh {
    protected function setcomment($username, $comment, $recipeid) {
        $sql = "INSERT INTO comments (username, comment, recipeid) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $comment, $recipeid]);
    }    
    protected function getcomment($id) {
        $sql = "SELECT * FROM comments WHERE recipeid=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}