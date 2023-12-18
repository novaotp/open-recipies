
import mysql.connector

def generate_ingredients() -> list[str]:
  ingredients = []

  with open('./src/data/ingredients/raw_ingredients.csv', "r", encoding="utf-8") as file:
    raw_ingredients = file.readlines()

    raw_ingredients.pop(0)

    for raw_ingredient in raw_ingredients:
      name, *_ = raw_ingredient.split(",")
      name = name.strip("\"")
      ingredients.append(f"{name}\n")

  return list(set(ingredients))

def main():
  """ Inserts the first row of the ./raw_ingredients.csv file to the ingredient table in mysql. """
  
  try:
    ingredients = generate_ingredients()

    db = mysql.connector.connect(
      host="localhost",
      user="root",
      password="Pa$$w0rd",
      database="openrecipiesdb"
    )

    cursor = db.cursor()

    for ingredient in ingredients:
      query = "INSERT INTO openrecipiesdb.ingredient (name) VALUES (%s)"
      value = (ingredient, )
      cursor.execute(query, value)

    db.commit()
  except Exception as e:
    print(e)

if __name__ == '__main__':
  main()
