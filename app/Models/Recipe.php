<?php

namespace App\Models;

use App\Providers\Curl;

class Recipe {
    public readonly int $id;
    public readonly string $name;
    public readonly string $category;
    public readonly string $instructions;
    public readonly string $thumbnail_url;
    public readonly array $ingredients;

    public function __construct(int $id, string $name = "", string $category = "", string $instructions = "", string $thumbnail_url = "", array $ingredients = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->instructions = $instructions;
        $this->thumbnail_url = $thumbnail_url;
        $this->ingredients = $ingredients;
    }

    /**
     * Gets an `x` amount of random meals.
     * @return array|null An array of random meals, if an error occurred : `null`.
     */
    public static function random(int $count): array|null
    {
        $recipes = [];

        for ($i = 0; $i < $count; $i++) {
            $response = (array) Curl::get("https://www.themealdb.com/api/json/v1/1/random.php");

            if ($response === null) {
                return null;
            }

            $meal = $response["meals"][0];

            array_push($recipes, Recipe::processRecipe($meal));
        }

        return $recipes;
    }

    /**
     * Gets a meal via it's id.
     * @param int $id The id of the meal
     * @return Recipe|null A meal, if an error occurred : `null`.
     */
    public static function where(int $id): Recipe|null
    {
		$response = (array) Curl::get("https://www.themealdb.com/api/json/v1/1/lookup.php", ['i' => $id]);

        if ($response === null) {
            return null;
        }

        $meal = $response["meals"][0];

        return Recipe::processRecipe($meal);
    }

    /**
     * Processes a meal array into a Recipe object.
     * @param array $meal The meal array
     * @return Recipe The processed meal
     */
    private static function processRecipe(array $meal): Recipe {
        $id = (int) $meal["idMeal"];
        $name = $meal["strMeal"];
        $category = $meal["strCategory"];
        $instructions = $meal["strInstructions"];
        $thumbnail_url = $meal["strMealThumb"];

        $ingredients = [];
        $ingredientIndex = 1;

        $INGREDIENT_ID_LIMIT = 20;

        while ($ingredientIndex <= $INGREDIENT_ID_LIMIT) {
            $ingredientName = $meal["strIngredient$ingredientIndex"];
            $quantity = $meal["strMeasure$ingredientIndex"];

            if ($ingredientName !== null) {
                array_push($ingredients, new Ingredient($ingredientName, $quantity));
                $ingredientIndex += 1;
                continue;
            } 

            break;
        }

        return new Recipe($id, $name, $category, $instructions, $thumbnail_url, $ingredients);
    }
}
