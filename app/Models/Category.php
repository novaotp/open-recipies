<?php

namespace App\Models;

use App\Providers\Database;
use Exception;

class Category
{
    /**
     * Reads a category based on its ID and return its name.
     * @param int $id The ID of the category to read
     * @return string|null The name of the category, or null if the category could not be found
     */
    public static function where(int $id): string|null
    {
        try {
            $db = Database::getInstance();
            $query = $db->prepare('SELECT * FROM openrecipesdb.category WHERE id = ? LIMIT 1;');
            $query->bindValue(1, $id);
            $query->execute();
            $result = $query->fetch();

            if ($result === false) {
                return null;
            } else {
                return $result['name'];
            }
        } catch (Exception $e) {
            var_dump("Something went wrong while reading a category via its ID: " . $e->getMessage());
            return null;
        }
    }
}
