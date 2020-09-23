<?php

class RecipesModel extends Dbh {
    protected function getrecipe($id) {
        $sql = "SELECT * FROM recipes WHERE id='$id'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    protected function getrecipeimg() {
        $sql = "SELECT * FROM recipes ORDER BY orderRecipe DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }    
    protected function getrecipesearch($find) {
        $sql = "SELECT * FROM recipes WHERE title LIKE '%$find%' OR descRecipe LIKE '%$find%' OR recipe LIKE '%$find%';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    protected function getrecipenumber() {
        $sql = "SELECT * FROM recipes;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    protected function setrecipe($imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder) {
        $sql = "INSERT INTO recipes (title, descRecipe, recipe, imgname, orderRecipe) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder]);
    }
}