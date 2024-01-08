<?php

namespace App\Models;

use App\Providers\Database;
use Exception;

class Recipe {
    public readonly int $id;
    public readonly string $name;
    public readonly string $category;
    public readonly string $instructions;
    public readonly string $thumbnail_url;

    public function __construct(int $id, string $name = "", string $category = "", string $instructions = "", string $thumbnail_url = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->instructions = $instructions;
        $this->thumbnail_url = $thumbnail_url;
    }

    /**
     * Returns all the recipes, sorting with the search param.
     */
    public static function all(string $search = ""): array|null
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare("SELECT * FROM openrecipesdb.recipe;");
            $query->execute();

            $result = $query->fetchAll();

            $recipes = [];

            foreach ($result as $recipe) {
                if ($search === "" || str_contains(strtolower($recipe['name']), strtolower($search))) {
                    array_push($recipes, new Recipe($recipe["id"], $recipe['name'], Category::where($recipe["category_id"]), $recipe['instructions'], $recipe['thumbnail_url']));
                }
            }

            return $recipes;
        } catch (Exception $e) {
            var_dump("Something went wrong while fetching all the recipes : ", $e->getMessage());
            return null;
        }
    }

    /** Returns a random recipe. */
    public static function random(): Recipe|null
    {
        $randomId = rand(1, 100);
        return Recipe::where($randomId);
    }

    /**
     * Returns a recipe via its id.
     * @param int $id The id of the recipe
     * @return Recipe|null A recipe, if an error occurred : `null`.
     */
    public static function where(int $id): Recipe|null
    {
		try {
            $db = Database::getInstance();

            $query = $db->prepare("SELECT * FROM openrecipesdb.recipe WHERE id = ? LIMIT 1;");
            $query->bindValue(1, $id);
            $query->execute();

            $result = $query->fetch();

            if ($result === "FALSE") {
                return null;
            } else {
                return new Recipe($result["id"], $result["name"], Category::where($result["category_id"]), $result["instructions"], $result["thumbnail_url"]);
            }
        } catch (Exception $e) {
            var_dump("Something went wrong while fetching all the recipes : ", $e->getMessage());
            return null;
        }
    }
}
