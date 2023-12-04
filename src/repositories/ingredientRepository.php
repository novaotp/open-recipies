

<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/ingredient.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/models/response.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/src/services/databaseService.php');

/** A repository to manage CRUD operations on the user table. */
class IngredientRepository
{
  private PDO $db;

  public function __construct()
  {
    $this->db = DatabaseService::getInstance();
  }

  /**
   * Reads from the database and returns an ingredient if the id is set, all ingredients otherwise.
   * @param int $id An optional id that retrieves the specific ingredient instead of every ingredient
   * @return Ingredient | Ingredient[]
   */
  public function read(int $id = null): Ingredient|array
  {
    if ($id === null) {
      $query = $this->db->prepare('SELECT * FROM openrecipiesdb.ingredient;');
      $query->execute();
      $result = $query->fetch();

      $ingredients = [];

      foreach ($result as $ingredient) {
        array_push($ingredients, new Ingredient($ingredient['name']));
      }

      return $ingredients;

    } else {
      $query = $this->db->prepare('SELECT * FROM openrecipiesdb.ingredient WHERE id = ? LIMIT 1;');
      $query->bindValue(1, $id);
      $query->execute();
      $result = $query->fetch();

      return new Ingredient($result['ingredient']);

    }
  }
}
