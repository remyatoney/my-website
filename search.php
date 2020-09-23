<?php 
    include_once './includes/navbar-header.inc.php';
?>

<div class="container">
    <h2 style="color: #2A858A" class="mr-auto">Search Page</h2>
    <?php
        if(isset($_POST['submit-search'])) {
            $mysqli = new mysqli("localhost1", "root", "", "sampledb");
            $search = $mysqli->real_escape_string($_POST['search']);
            $recipesearchObj = new RecipesView();
            $recipesearchObj->searchrecipe($search);
        }
    ?>
</div>

<?php include_once './includes/footer.inc.php';?>