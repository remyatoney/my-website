<?php

class RecipesContr extends RecipesModel {
    public function insertrecipes ($imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder) {
        $this->setrecipe($imageTitle, $imageDesc, $recipe, $imageFullName, $setImageOrder);
    }
}