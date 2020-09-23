<?php

class RecipesView extends RecipesModel {
    public function showrecipe($id) {
        $result = $this->getrecipe($id);
        echo '<p>'.$result['descRecipe'].'</p>
            <div class="col-8">
                <h4 class="mt-0">'.$result['title'].'</h4>
                <p class="d-none d-sm-block">'.$result['recipe'].'</p>
            </div>
            <div class="media col-4">
                <img class="d-flex mr-3 img-thumbnail" src="../img1/'.$result['imgname'].'" height="350" width="350" alt="'.$result['title'].'">
            </div>';
    }
    public function showrecipeimg() {
        $results = $this->getrecipeimg();
        $row = count($results);
        for ($i=0; $i<$row; $i++) {
            echo '<div class="text-center col-12 col-sm-6 col-md-4"><a href="showrecipe.php?id='.$results[$i]["id"].'">
                <img src="img1/'.$results[$i]["imgname"].'" height="250" width="250" class="mr-2 ml-2">
                <p class="text-center" style="text-decoration: none; color: #0B6A6F;">'.$results[$i]["title"].'</p></a></div>';
        }   
    }
    public function searchrecipe($search) {
        $results = $this->getrecipesearch($search);
        $queryResult = count($results);
        if($queryResult <=1) {
            echo "There is ".$queryResult," result<br>";
        } else {
            echo "There are ".$queryResult." results<br><br><br>";
        }
        for ($i=0; $i<$queryResult; $i++) {
            echo '<a href="showrecipe.php?id='.$results[$i]["id"].'">';
            echo '<div class="row">
                        <div class="offset-sm-1 col-4">
                            <img src="img1/'.$results[$i]["imgname"].'" height="250" width="250" class="mr-2 ml-2">
                        </div>
                        <div class="col-7">
                            <p class="text-center" style="text-decoration: none; color: #0B6A6F;">'.$results[$i]["title"].'</p>
                            <p class="text-center" style="text-decoration: none; color: #0B6A6F;">'.$results[$i]["descRecipe"].'</p>
                        </div>
                    </div>
                </a><br><br>';                       
        }
    }
    public function numberofrecipes() {
        $results = $this->getrecipenumber();
        $noofrecipes = count($results);
        return $noofrecipes;
    }
}