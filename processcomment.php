<?php
    include_once './includes/navbar-header.inc.php';
    if (isset($_SESSION['userUid'])) {
        if (isset($_POST['submit-comment'])) {
            $username = $_SESSION['userUid'];
            $comment = $_POST['comment'];
            $recipeid = $_POST['id'];
            if (empty($comment)) {
                header("Location: ../showrecipe.php?id=$recipeid");
                exit();
            }
            else {
                $commentObj = new CommentContr();
                $commentObj->insertcomment($username, $comment, $recipeid);
                header("Location: ../showrecipe.php?id=$recipeid&commentuploaded");                
            }
        }
    }
