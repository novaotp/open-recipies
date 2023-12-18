import json
import mysql.connector


def get_meals() -> list[str]:
    """ Returns a list of all the meals stored in the `./data/meals/store.json` file. """
    with open("./data/meals/store.json", "r") as json_file:
        data = json.load(json_file)

    return data

def main():
    """Inserts every meal of the  `./data/meals/store.json` file in the database. """

    try:
        meals = get_meals()

        db = mysql.connector.connect(
            host="localhost",
            user="root",
            password="Pa$$w0rd",
            database="openrecipiesdb",
        )

        cursor = db.cursor()

        for meal in meals:
            query = "INSERT INTO openrecipiesdb.meal (name, instructions, thumbnail_url, ingredients) VALUES (%s, %s, %s, %s);"
            value = (meal["name"], meal["instructions"], meal["thumbnail_url"], str(meal["ingredients"]))
            cursor.execute(query, value)

        db.commit()

    except Exception as e:
        print(e)

if __name__ == "__main__":
    main()
