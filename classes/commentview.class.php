<?php

class CommentView extends CommentModel {
    public function showcomment($id) {
        $results = $this->getcomment($id);
        $row = count($results);
        for ($i=0; $i<$row; $i++) {
            echo '<div class="row offset-sm-1">
            <p style="color: #0B6A6F; font-weight: bold;">'.$results[$i]["username"].'</p>&nbsp;&nbsp;
            <p style="font-style: italic;">'.$results[$i]["comment"].'</p><br>
            </div>';
        }
    }
}