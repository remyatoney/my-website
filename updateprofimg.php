<?php 
    include_once './includes/navbar-header.inc.php';
    if (isset($_POST['submit-update'])) {
        $username = $_SESSION['userUid'];
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 2000000) {
                    $fileNameNew = "profile".$username.".".$fileActualExt;
                    $fileDestination = 'img1/'.$fileNameNew;    
                    move_uploaded_file($fileTmpName, $fileDestination);      
                    $adminObj = new AdminContr();                 
                    $adminObj->insertprofileimg($fileNameNew);
                    header("Location: AboutMe.php?upload=success");     
                } else {
                    header("Location: AboutMe.php?error=bigfile");
                    exit();
                }
            } else {
                header("Location: AboutMe.php?error=fileerror");
                exit();
            }
        } else {
            header("Location: AboutMe.php?error=improperfiletype");
            exit();
        }
    }
?>

