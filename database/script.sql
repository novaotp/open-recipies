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
