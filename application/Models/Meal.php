<?php

namespace App\Models;

use App\Providers\Database;
use Exception;

class Meal {
    public readonly int $id;
    public readonly string $name;
    public readonly string $instructions;
    public readonly string $thumbnail_url;
    public readonly string $ingredients;

    public function __construct(int $id, string $name = "", string $instructions = "", string $thumbnail_url = "", string $ingredients = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->instructions = $instructions;
        $this->thumbnail_url = $thumbnail_url;
        $this->ingredients = $ingredients;
    }

    /**
     * Gets all the meals from the database.
     * @return array|null An array of all the meals, if an error occurred : `null`.
     */
    public static function all(): array|null
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('SELECT * FROM openrecipiesdb.meal;');
            $query->execute();
            $result = $query->fetchAll();

            $meals = [];

            foreach ($result as $meal) {
                array_push($meals, new Meal($meal['id'], $meal['name'], $meal['instructions'], $meal['thumbnail_url'], $meal['instructions']));
            }

            return $meals;

        } catch (Exception $e) {
            var_dump('An error occurred while reading meals : ', $e->getMessage());
            return null;
        
        }
    }

    /**
     * Gets a meal via it's id.
     * @param int $id The id of the meal
     * @return Meal|null A meal, if an error occurred : `null`.
     */
    public static function where(int $id): Meal|null
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('SELECT * FROM openrecipiesdb.meal WHERE id = ?;');
            $query->bindParam(1, $id);
            $query->execute();
            $result = $query->fetch();

            return new Meal($result['id'], $result['name'], $result['instructions'], $result['thumbnail_url'], $result['ingredients']);
            
        } catch (Exception $e) {
            var_dump('An error occurred while reading a meal : ', $e->getMessage());
            return null;

        }
    }
}
