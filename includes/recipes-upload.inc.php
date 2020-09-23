<?php
    include_once 'navbar-header.inc.php';
    if (isset($_POST['submit'])) {
        $newFileName = $_POST['filename'];
        if (empty($newFileName)) {
            $newFileName = "recipeImg";
        }
        else {
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $imageTitle = $_POST['title'];
        $imageDesc = $_POST['descRecipe'];
        $recipe = $_POST['recipe'];
        $file = $_FILES['file'];
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array("jpg", "jpeg", "png");
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 2000000) {
                    $imageFullName = $newFileName.".".uniqid("",true).".".$fileActualExt;
                    $fileDestination = "../img1/".$imageFullName;
                    if (empty($imageTitle) || empty($imageDesc)) {
                        header("Location: ../recipes.php?error=emptyfields");
                        exit();
                    } else {
                        /*$sql = "SELECT * FROM recipes;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed!";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rowcount = mysqli_num_rows($result);
                            $setImageOrder = $rowcount + 1;
                            $sql = "INSERT INTO recipes (title, descRecipe, recipe, imgname, orderRecipe) VALUES (?,?,?,?,?)";
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "SQL error";
                            } else {
                                mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder);
                                mysqli_stmt_execute($stmt);
                                move_uploaded_file($fileTempName, $fileDestination);
                                header("Location: ../recipes.php?upload=success");
                            }
                        }*/
                        $recipenumber = new RecipesView();
                        $rowcount = $recipenumber->numberofrecipes();
                        $setImageOrder = $rowcount + 1;
                        $recipeInsert = new RecipesContr();
                        $recipeInsert->insertrecipes($imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder);
                        move_uploaded_file($fileTempName, $fileDestination);
                        header("Location: ../recipes.php?upload=success");
                    }
                } else {
                    header("Location: ../recipes.php?error=bigfile");
                    exit();
                }
            } else {
                header("Location: ../recipes.php?error=fileerror");
                exit();
            }
        } else {
            header("Location: ../recipes.php?error=improperfiletype");
            exit();
        }
    }