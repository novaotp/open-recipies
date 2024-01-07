-- Initialized / Recreates the database
DROP SCHEMA IF EXISTS openrecipesdb;

CREATE SCHEMA openrecipesdb;

CREATE TABLE openrecipesdb.user (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(80) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE openrecipesdb.category (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE openrecipesdb.recipe (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    name VARCHAR(80) NOT NULL,
    instructions TEXT NOT NULL,
    thumbnail_url TEXT NOT NULL,
    CONSTRAINT fk_recipe_category FOREIGN KEY (category_id) REFERENCES openrecipesdb.category (id)
);

CREATE TABLE openrecipesdb.bookmarked_recipe (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    recipe_id INT NOT NULL,
    CONSTRAINT fk_bookmarked_recipe_user FOREIGN KEY (user_id) REFERENCES openrecipesdb.user (id),
    CONSTRAINT fk_bookmarked_recipe_recipe FOREIGN KEY (recipe_id) REFERENCES openrecipesdb.recipe (id)
);

CREATE TABLE openrecipesdb.ingredient (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE openrecipesdb.recipe_ingredient (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    recipe_id INT NOT NULL,
    ingredient_id INT NOT NULL,
    CONSTRAINT fk_recipe_ingredient_recipe FOREIGN KEY (recipe_id) REFERENCES openrecipesdb.recipe (id),
    CONSTRAINT fk_recipe_ingredient_ingredient FOREIGN KEY (ingredient_id) REFERENCES openrecipesdb.ingredient (id)
);