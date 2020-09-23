<?php

class CommentContr extends CommentModel {
    public function insertcomment($username, $comment, $recipeid) {
        $this->setcomment($username, $comment, $recipeid);
    }
}