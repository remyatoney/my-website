<?php 
    include_once './includes/navbar-header.inc.php';
    $id = $_GET['id']; 
?>
<div class="container">  
    <div class="row row-content offset-sm-1">
        <?php
            $recipeObj = new RecipesView();
            $recipeObj->showrecipe($id);
        ?>
    </div>
    <?php 
        echo '<form class="ml-3" method="POST" action="processcomment.php">
                <input type="hidden" name="id" value="'.$id.'">
                <textarea name="comment" placeholder="Comment here!" style="width: 700px;"></textarea><br>
                <button type="submit" name="submit-comment" style="background-color: #5AAAAE; color: floralwhite;" 
                class="btn btn-sm ml-1 mb-4">Submit</button>
            </form>';
            $commentObj = new CommentView();
            $commentObj->showcomment($id)
    ?>
</div>
<?php include_once './includes/footer.inc.php';?>
