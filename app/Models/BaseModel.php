<?php

namespace App\Models;

use App\Providers\Database;
use Exception;

class BaseModel
{
    /** The database table name. */
    protected const table = "";

    /**
     * Populates the model instance with data.
     *
     * @param array $data Data to populate the model with
     */
    public function __construct(array $data)
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Creates a new record in the database.
     * 
     * @param array $data The associative array containing the key-value pairs for the INSERT command
     * @return bool Whether the creation was successful or not
     */
    public static function create(array $data): bool
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare("INSERT INTO " . static::table . " (" . implode(", ", array_keys($data)) . ") VALUES ('" . implode("', '", array_values($data)) . "')");
            $query->execute();

            return true;
        } catch (Exception $e) {
            var_dump('An error occurred while creating a new record: ', $e->getMessage());
            return false;
        }
    }

    /**
     * Updates the record with the specified ID with the provided data.
     *
     * @param array<string, mixed> $data The key-value pairs representing the data to update
     * @param integer $id The unique identifier of the record to update
     * @return bool Whether the update was successful or not
     */
    public static function update(array $data, int $id): bool
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('UPDATE ' . static::table . ' SET ' . implode(', ', array_map(fn ($k, $v) => $k . ' = :' . $k, array_keys($data), array_values($data))) . ' WHERE id = :id'); // Prepared statement for security

            foreach ($data as $key => $value) { // Bind all data to the prepared statement
                $query->bindParam(':' . $key, $value);
            }

            $query->bindParam(':id', $id); // Bind the ID parameter

            $query->execute(); // Execute the update query

            return true; // Update successful
        } catch (Exception $e) {
            var_dump('An error occurred while updating the record with ID ' . $id . ': ', $e->getMessage());
            return false; // Error occurred, update unsuccessful
        }
    }

    /**
     * Deletes the record with the specified ID.
     *
     * @param integer $id The unique identifier of the record to delete
     * @return bool Whether the delete was successful or not
     */
    public static function delete(int $id): bool
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('DELETE FROM ' . static::table . ' WHERE id = :id'); // Prepared statement for security
            $query->bindParam(':id', $id); // Bind the ID parameter
            $query->execute(); // Execute the delete query

            return true; // Delete successful
        } catch (Exception $e) {
            var_dump('An error occurred while deleting the record with ID ' . $id . ': ', $e->getMessage());
            return false; // Error occurred, delete unsuccessful
        }
    }


    /**
     * Retrieves the record with the specified ID.
     *
     * @param integer $id The unique identifier of the record to fetch
     * @return static|null The retrieved record or `null` if no record is found
     */
    public static function whereId(int $id): ?static
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('SELECT * FROM ' . static::table . ' WHERE id = ? LIMIT 1');
            $query->bindParam(1, $id);
            $query->execute();

            $result = $query->fetch();

            if (empty($result)) {
                return null;
            }

            return new static($result);
                
        } catch (Exception $e) {
            var_dump('An error occurred while searching for the record with ID ' . $id . ' : ', $e->getMessage());
            return null;
        }
    }


    /**
     * Fetches all records from the database.
     *
     * @return array|null An array of all the records, or `null` if an error occurred
     */
    public static function all(): array|null
    {
        try {
            $db = Database::getInstance();

            $query = $db->prepare('SELECT * FROM ' . static::table);
            $query->execute();
            $result = $query->fetchAll();

            $data = [];

            foreach ($result as $row) {
                $data[] = new static($row);
            }

            return $data;
        } catch (Exception $e) {
            var_dump('An error occurred while fetching all the records in the ' . static::table . ' table : ', $e->getMessage());
            return null;
        }
    }
}
