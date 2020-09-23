<?php 
    include_once './includes/navbar-header.inc.php';
    if (isset($_POST['submit-delete'])) {
        $username = $_SESSION['userUid'];
        $imgname = $_POST['imgname'];
        $file = "img1/".$imgname;
        if (!unlink($file)) {
            header("Location: AboutMe.php?profileimgdelete=error");
            exit();
        }
        else {
            $adminObj = new AdminContr();
            $adminObj->deleteprofileimg();
            header("Location: AboutMe.php?profileimgdelete=success");
        }
    }

